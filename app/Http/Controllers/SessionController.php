<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    {
        $attr = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        if (Auth::attempt($attr)) {
            request()->session()->regenerate();
            if (request()->user_type === 'seller' && Auth::user()->is_seller) {
                return redirect('/sellers/dashboard');
            }
            if (request()->user_type === 'costumer') {
                return redirect('/');
            }
            Auth::logout();
            return redirect('/login')->withErrors([
                'user_type' => 'You are not authorized to access this section.'
            ]);
        }
    }
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
