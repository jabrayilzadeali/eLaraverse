<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSettingsController extends Controller
{
    public function index()
    {
        return view('user.settings');
    }
    public function edit()
    {
        return view('user.edit');
    }
    public function update()
    {
        $validated = request()->validate([
            'balance' => 'required',
        ]);
        $user = Auth::user();
        $user->update($validated);
        return redirect()->route('user.settings')->with('success', 'User Updated Successfully');
    }
    public function changePasswordForm()
    {
        return view('user.change-password');
    }
    public function updatePassword()
    {
        $validated = request()->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        if (Hash::check($validated['old_password'], Auth::user()->password)) {
            Auth::user()->update($validated);
            return redirect()->route('user.settings');
        } else {
            return back()->withErrors(['old_password' => 'The provided password does not match our records.']);
        }
    }
}
