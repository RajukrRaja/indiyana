<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{


    public function transactions()
    {
        $transactions = Transaction::paginate(10);
        return view('backend.payments.transactions', compact('transactions'));
    }
    
    

    public function showPaymentForm()
    {
        return view('backend.payment');
    }

    public function viewSecurity(Request $request)
    {
        $txnId = $request->session()->get('pending_txn');
    
        if (!$txnId) {
            return redirect()->route('dashboard')->with('error', 'No pending transaction found.');
        }
    
        $transaction = Transaction::where('transaction_id', $txnId)->first();
    
        if (!$transaction) {
            return redirect()->route('dashboard')->with('error', 'Transaction not found.');
        }
    
        return view('backend.payments.viewSecurity', compact('transaction'));
    }
    
    

    public function processPayment(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $amount = $request->input('amount');
            $location = $request->input('location');

            // Validate inputs
            if (!is_numeric($amount) || $amount <= 0) {
                return response()->json(['error' => 'Invalid amount'], 400);
            }
            if (empty($location)) {
                return response()->json(['error' => 'Location is required'], 400);
            }

            // Create PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount * 100,
                'currency' => 'usd',
                'description' => 'FraudXpert AI Payment',
            ]);

            // Save transaction with initial status
            $transaction = Transaction::create([
                'transaction_id' => 'TXN' . rand(100000, 999999),
                'amount' => $amount,
                'location' => $location,
                'payment_intent_id' => $paymentIntent->id,
                'status' => 'pending', // Set initial status
            ]);

            $lastTxn = Transaction::where('created_at', '<', $transaction->created_at)
                ->orderBy('created_at', 'desc')->first();
            $time_delta = $lastTxn ? now()->diffInSeconds($lastTxn->created_at) : 600;
            $transaction->time_delta = $time_delta;
            $transaction->save();

            // Call Python API
            $client = new Client(['base_uri' => 'http://localhost:5000']);
            try {
                $response = $client->post('/predict', [
                    'json' => [
                        'amount' => $amount,
                        'location' => $location,
                        'time_delta' => $time_delta,
                    ],
                    'timeout' => 5,
                ]);
                $prediction = json_decode($response->getBody(), true);
            } catch (RequestException $e) {
                Log::error('Python API Error', [
                    'message' => $e->getMessage(),
                    'request' => $e->getRequest() ? $e->getRequest()->getBody()->getContents() : 'N/A',
                    'response' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : 'N/A'
                ]);
                $prediction = [
                    'risk_score' => 0, 
                    'is_fraud' => false, 
                    'details' => ['probability' => 0, 'amount_trigger' => false, 'interval_trigger' => false]
                ];
            }

            $transaction->risk_score = $prediction['risk_score'];
            $transaction->is_fraud = $prediction['is_fraud'];
            $transaction->save();

            Log::info('Fraud Prediction', [
                'transaction_id' => $transaction->transaction_id,
                'amount' => $amount,
                'location' => $location,
                'time_delta' => $time_delta,
                'risk_score' => $prediction['risk_score'],
                'is_fraud' => $prediction['is_fraud'],
                'details' => $prediction['details']
            ]);

            if ($transaction->is_fraud) {
                session(['pending_txn' => $transaction->transaction_id]);
            
                return response()->json([
                    'redirect' => url('/viewSecurity'), // ✅ Using URL helper now
                    'details' => $prediction['details']
                ]);
            }
            

            // Return client_secret and transaction_id for frontend confirmation
            return response()->json([
                'client_secret' => $paymentIntent->client_secret,
                'transaction_id' => $transaction->transaction_id
            ]);
        } catch (\Exception $e) {
            Log::error('Payment Processing Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Internal server error. Please try again.'], 500);
        }
    }

    public function confirmPayment(Request $request)
    {
        try {
            $transactionId = $request->input('transaction_id');
            $transaction = Transaction::where('transaction_id', $transactionId)->firstOrFail();

            // Update status to completed
            $transaction->status = 'completed';
            $transaction->save();

            Log::info('Payment Confirmed', [
                'transaction_id' => $transaction->transaction_id,
                'amount' => $transaction->amount,
                'status' => $transaction->status
            ]);

            return response()->json(['message' => 'Payment confirmed and stored successfully']);
        } catch (\Exception $e) {
            Log::error('Payment Confirmation Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Failed to confirm payment'], 500);
        }
    }

    public function verifySecurity(Request $request)
    {
        $transaction = Transaction::where('transaction_id', $request->session()->get('pending_txn'))->first();
        if (!$transaction) {
            return redirect()->route('dashboard')->with('error', 'Invalid transaction.');
        }

        if ($request->input('answer') === 'correct_answer') {
            $transaction->verified = true;
            $transaction->is_fraud = false;
            $transaction->status = 'completed'; // Mark as completed after verification
            $transaction->save();

            Log::info('Payment Verified and Completed', [
                'transaction_id' => $transaction->transaction_id,
                'amount' => $transaction->amount,
                'status' => $transaction->status
            ]);

            return redirect()->route('dashboard')->with('message', 'Payment verified and processed!');
        }
        return back()->with('error', 'Verification failed.');
    }
}