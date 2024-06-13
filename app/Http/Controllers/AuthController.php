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

    }

    // new admin registration
    public function registration (Request $request) {

    }
}

