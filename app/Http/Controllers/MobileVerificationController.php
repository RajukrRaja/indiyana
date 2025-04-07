<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Http\GuzzleClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class MobileVerificationController extends Controller
{
    // Show the mobile verification form
    public function showVerificationForm()
    {
        return view('auth.verify-mobile');
    }

    // Send OTP to user's mobile number
    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required|digits:10'
        ]);

        $user = Auth::user();
        $mobile = '+91' . $request->mobile_number; // modify as per country

        // Save mobile to user
        $user->mobile_number = $request->mobile_number;
        $user->save();

        // Limit resend to once per 60 seconds
        if (Cache::has("otp_sent_{$user->id}")) {
            return back()->withErrors(['mobile_number' => 'Please wait before requesting another OTP.']);
        }

        // Generate OTP and expiration
        $otp = rand(100000, 999999);
        $expiresAt = now()->addMinutes(5);

        // Save OTP and expiry
        $user->otp_code = $otp;
        $user->otp_expires_at = $expiresAt;
        $user->save();

        // Send OTP
        $this->sendMessage($mobile, $otp);

        // Lock resend for 60 seconds
        Cache::put("otp_sent_{$user->id}", true, 60);

        return back()->with('status', 'OTP sent to your mobile number.');
    }

    // Verify entered OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp_code' => 'required|digits:6',
        ]);

        $user = Auth::user();

        if (!$user->otp_code || !$user->otp_expires_at) {
            return back()->withErrors(['otp_code' => 'No OTP request found.']);
        }

        if (now()->gt(Carbon::parse($user->otp_expires_at))) {
            return back()->withErrors(['otp_code' => 'OTP expired. Please request a new one.']);
        }

        if ($user->otp_code !== $request->otp_code) {
            return back()->withErrors(['otp_code' => 'Invalid OTP.']);
        }

        // OTP verified
        $user->is_mobile_verified = true;
        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect()->route('dashboard')->with('status', 'Mobile number verified successfully.');
    }

    // Send OTP using Twilio with Guzzle client (SSL verify off)
    private function sendMessage($to, $otp)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio_number = env('TWILIO_PHONE_NUMBER');

        try {
            $guzzle = new \GuzzleHttp\Client(['verify' => false]); // Disable SSL only for dev/test
            $httpClient = new GuzzleClient($guzzle);

            $client = new Client($sid, $token, null, $httpClient);
            $client->messages->create($to, [
                'from' => $twilio_number,
                'body' => "Your OTP is: $otp. It expires in 5 minutes.",
            ]);
        } catch (\Exception $e) {
            logger()->error("Twilio error: " . $e->getMessage());
        }
    }
}
