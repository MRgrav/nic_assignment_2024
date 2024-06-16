<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index() {
        $userId = auth()->user()->id;

        $user = User::find($userId);

        return view('Profile.index', compact('user'));
    }

    public function update(Request $request) {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^(?:[0-9] ?){6,14}[0-9]$/',
        ], [
            'name'.'required' => 'The name is required.',
            'email.required'  => 'The email address is required.',
            'email.email'     => 'Please enter a valid email address.',
            'phone.required'  => 'The phone number is required.',
            'phone.regex'     => 'Please enter a valid phone number.',
        ]);

        $user = auth()->user();

        $isUpdate = $user->update([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);

        if (!$isUpdate) {
            return back()->with(['icon'=>'error','message'=>'Profile update failed.']);
        }

        return back()->with(['icon'=>'success','message'=>'Profile update successfully.']);
    }
}
