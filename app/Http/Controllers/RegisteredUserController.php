<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    
    public function store(Request $request)
    {
        $attrs = request()->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);
        
        $user = User::create($attrs);

        Auth::login($user);
        
        event(new Registered(($user)));

        return redirect('/');
    }
    public function verifyNotice()
    {
        return view('auth.verify-email');
    }
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
     
        return redirect('/')->with('message', 'Please verify your email');
    }
    public function verifyHandler(Request $request) {
            $request->user()->sendEmailVerificationNotification();
         
            return back()->with('message', 'Verification link sent!');
        }
    }
