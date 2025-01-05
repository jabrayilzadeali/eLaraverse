<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }
    public function login()
    {
        $attr = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::guard('admin')->attempt($attr)) {
            return redirect()->route('admin.dashboard');
        }
        // Login failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    
    public function index()
    {
        $products = Product::all();
        return view('admin.dashboard', ['products' => $products]);
    }
}
