<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // login page
    public function login_view() {
        return view('Auth.login');
    }

    // registration page
    public function registration_view() {
        return view('Auth.registration');
    }

    // login existing admin
    public function login(Request $request) {
        dd($request);
    }

    // new admin registration
    public function registration (Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^(?:[0-9] ?){6,14}[0-9]$/',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ], [
            'name'.'required' => 'The name is required.',
            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already taken.',
            'phone.required' => 'The phone number is required.',
            'phone.regex' => 'Please enter a valid phone number.',
            'password.required' => 'The password is required.',
            'confirmPassword.required' => 'Please confirm your password.',
            'confirmPassword.same' => 'The passwords do not match.',
        ]);
        
    }
}

