<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use App\Mail\EmailChangeVerification;
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
            'phone' => 'nullable|integer',
            'address' => 'nullable|string'
        ]);
        
        $user = Auth::user();

        if (request()->hasFile('file_upload')) {
            if ($user->img_path) {
                Storage::disk('public')->delete(Auth::user()->img_path);
            }
            $file_upload = Storage::disk('public')->put("/" . $user->id, request()->file('file_upload'));
            $validated['img_path'] = $file_upload;
        }
        $user->update($validated);
        dd($validated);
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
    public function changeEmailForm()
    {
        return view('user.change-email');
    }
    public function updateEmail()
    {
        /*         
        $validated = request()->validate([
            'email' => ['required'],
        ]);
        
        $user = Auth::user();
        
        // If email is changing, store it in pending_email and send verification email
        if ($user->email !== $validated['email']) {
            $user->update(['pending_email' => $validated['email']]);

            // Generate a signed URL for email verification
            $verificationUrl = URL::signedRoute('email.change.verify', [
                'id' => $user->id,
                'email' => $validated['email'],
            ]);

            // Send email verification
            Mail::to($validated['email'])->send(new EmailChangeVerification($verificationUrl));

            return redirect()->route('user.settings')->with('success', 'Verification email sent. Please check your inbox.');
        } 
        */
    }

}
