<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        //validation of registration form
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ], [
            'email.required'    => 'The email address is required.',
            'email.email'       => 'Please enter a valid email address.',
            'password.required' => 'The password is required.',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        // auto login after successfull registration
        if (Auth::attempt( $request->only('email','password') )) {
            return redirect()->route('home');
        }

        return back();
    }

    // new admin registration
    public function registration (Request $request) {
        //validation of registration form
        $request->validate([
            'name'              => 'required',
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'required|regex:/^(?:[0-9] ?){6,14}[0-9]$/',
            'password'          => 'required',
            'confirmPassword'   => 'required|same:password',
        ], [
            'name'.'required'           => 'The name is required.',
            'email.required'            => 'The email address is required.',
            'email.email'               => 'Please enter a valid email address.',
            'email.unique'              => 'This email address is already taken.',
            'phone.required'            => 'The phone number is required.',
            'phone.regex'               => 'Please enter a valid phone number.',
            'password.required'         => 'The password is required.',
            'confirmPassword.required'  => 'Please confirm your password.',
            'confirmPassword.same'      => 'The passwords do not match.',
        ]);
        
        // new user creation with User model
        $isUser = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'phone'     => $request->input('phone'),
            'password'  => bcrypt($request->input('password')),      // encryption of password
        ]);

        if ( !$isUser ) {
            return back();
        }

        // auto login after successfull registration
        if (Auth::attempt( $request->only('email','password') )) {
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors($request)->withInput();
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}

