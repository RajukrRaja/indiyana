<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;  // Corrected this line
use App\Mail\RegisterMail;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login'); // Or your desired response
    }

    public function register()
    {
        return view('auth.register'); // Or your desired response
    }

    public function forgot()
    {
        return view('auth.forgot'); // Or your desired response
    }

    public function create_user(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email', // Ensures email is unique
            'password' => 'required|string|min:4',
        ]);
    
        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'remember_token' => Str::random(60), // Generate a unique token
        ]);
    
        // Send a verification email
        Mail::to($user->email)->send(new RegisterMail($user));
    
        // Redirect with success message
        return redirect()->route('login')->with('success', 'Account created successfully. Please verify your email.');
    }
    
    
        
    public function login_user(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
    
        // Attempt to retrieve the user by email
        $user = User::where('email', $request->email)->first();
    
        // Check if the user exists and the password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Authenticate the user
            Auth::login($user);
    
            // Redirect to a dashboard or desired route
            return redirect()->back()->with('success', 'Login successful!');
        }
    
        // If authentication fails
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }



    public function verify($token)
    {
        // Find the user by the remember token
        $user = User::where('remember_token', $token)->first();
    
        // If user not found or token is invalid
        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid or expired verification link.');
        }
    
        // Mark the user's email as verified
        $user->email_verified_at = now();
        $user->remember_token = null; // Reset the token after verification
        $user->save();
    
        // Redirect to login or dashboard with a success message
        return redirect()->route('login')->with('success', 'Your email has been successfully verified. You can now log in.');
    }
    
    
    
}
