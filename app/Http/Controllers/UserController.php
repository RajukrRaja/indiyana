<?php

namespace App\Http\Controllers;
use \App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_admin_view()
    {
        // Fetch user records dynamically with pagination (10 records per page)
        $data['getRecord'] = User::orderBy('created_at', 'desc')->paginate(10);
    
        return view('backend.users.user_admin_view', $data);
    }

  

    
    public function add_user_admin(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:2',
           // Ensuring role is either 'admin' or 'user'
        ]);
    
        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
    
        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Assuming role column exists in users table
        ]);
    
        // Return success response
       // Redirect with success message
    return redirect('/panel/user_admin_view')->with('success', 'User added successfully!');
    }


    public function edit_user_admin(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->user_id,
            'is_admin' => 'required|boolean',
        ]);
    
        try {
            // Find user by ID
            $user = User::findOrFail($request->user_id);
    
            // Update user details
            $user->name = $request->name;
            $user->email = $request->email;
            $user->is_admin = $request->is_admin;
            $user->save();
    
            // Redirect with success message
            return redirect('/panel/user_admin_view')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect('/panel/user_admin_view')->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }
    
    
}
