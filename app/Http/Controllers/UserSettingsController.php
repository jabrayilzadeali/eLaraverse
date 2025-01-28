<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'username' => 'required',
            'file_upload' => 'file|image|max:10240', // Allow image files up to 10 MB
            'email' => 'required|email|unique:users,email,' . Auth::id(),  // Ignore current user's email
            // 'file_upload' => 'required',
            // 'phone' => 'required',
        ]);
        
        if (request()->email) {
            $validated['email_verified_at'] = null;
        }
        
        if (request()->hasFile('file_upload')) {
            Storage::disk('public')->delete(Auth::user()->img_path);
            $file_upload = Storage::disk('public')->put("/" . Auth::id(), request()->file('file_upload'));
            $validated['img_path'] = $file_upload;
        }
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
