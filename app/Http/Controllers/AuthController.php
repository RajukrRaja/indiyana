<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;  // Corrected this line
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login'); // Or your desired response
    }

    public function login_account()
    {
        return view('auth.login_account'); // Adjust the view path if necessary
    }
    public function Register_account()
    {
        return view('auth.Register_account'); // Adjust the view path if necessary
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
    

        $save = new User();
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->remember_token = Str::random(40);


        $save->save(); // Save initial user data




    
    
        // Send a verification email
        Mail::to($save->email)->send(new RegisterMail($save));
    
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
            return redirect('panel/dashboard')->with('success', 'Login successful!');

        }
    
        // If authentication fails
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }



    public function verify($token)
    {
        Log::info('Verification attempt with token: ' . $token);
    
        $user = User::where('remember_token', $token)->first();
    
        if ($user) {
            Log::info('User found: ' . $user->email);
    
            $user->email_verified_at = Carbon::now();
            $user->remember_token = null;
            $user->save();
    
            return redirect()->route('login')->with('success', 'Email Verified.');
        }
    
        Log::warning('Invalid verification token: ' . $token);
        return abort(404);
    }
    

    public function logout()
    {
        // Log out the currently authenticated user
        Auth::logout();

        // Redirect the user to the login page
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
