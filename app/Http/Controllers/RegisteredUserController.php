<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect('login');
    }
}
