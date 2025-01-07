<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // $carts = Auth::user()->carts->with(['product', 'user'])->get();
        $carts = Cart::where('id', Auth::id())->with(['product', 'user'])->get();
        return view("checkout.index", [
            "carts" => $carts,
        ]);
    }
}
