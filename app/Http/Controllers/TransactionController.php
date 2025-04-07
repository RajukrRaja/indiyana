<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class TransactionController extends Controller

{
    public function make_payment(){
        return view('auth.make_payment');
    }
    public function fetchTransactions()
    {
        return response()->json(Transaction::orderBy('created_at', 'desc')->take(5)->get());
    }

    public function checkTransaction(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = $request->input('amount');
        $location = $request->input('location');

        // Create a PaymentIntent
        $paymentIntent = PaymentIntent::create([
            'amount' => $amount * 100, // Convert to cents
            'currency' => 'usd',
            'description' => 'FraudXpert AI Payment',
        ]);

        $transaction = Transaction::create([
            'transaction_id' => 'TXN' . rand(100000, 999999),
            'amount' => $amount,
            'location' => $location,
            'payment_intent_id' => $paymentIntent->id,
        ]);

        // Calculate time delta
        $lastTxn = Transaction::where('created_at', '<', $transaction->created_at)
            ->orderBy('created_at', 'desc')->first();
        $time_delta = $lastTxn ? now()->diffInSeconds($lastTxn->created_at) : 600;
        $transaction->time_delta = $time_delta;
        $transaction->save();

        // Analyze with Python model
        $client = new Client(['base_uri' => 'http://localhost:5000']);
        $response = $client->post('/predict', [
            'json' => [
                'amount' => $amount,
                'location' => $location,
                'time_delta' => $time_delta,
            ]
        ]);

        $prediction = json_decode($response->getBody(), true);
        $transaction->risk_score = $prediction['risk_score'];
        $transaction->is_fraud = $prediction['is_fraud'];
        $transaction->save();

        if ($transaction->is_fraud) {
            session(['pending_txn' => $transaction->transaction_id]);
        }

        return response()->json([
            'is_fraud' => $transaction->is_fraud,
            'client_secret' => $paymentIntent->client_secret,
        ]);
    }

    public function verifySecurity(Request $request)
    {
        $transaction = Transaction::where('transaction_id', $request->session()->get('pending_txn'))->first();
        if (!$transaction) {
            return redirect()->route('dashboard')->with('error', 'Invalid transaction.');
        }

        // Simulate security question (replace with real logic)
        if ($request->input('answer') === 'correct_answer') {
            $transaction->verified = true;
            $transaction->is_fraud = false;
            $transaction->save();
            return redirect()->route('dashboard')->with('message', 'Payment verified and processed!');
        }
        return back()->with('error', 'Verification failed.');
    }
}