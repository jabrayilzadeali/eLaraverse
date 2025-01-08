<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // $carts = Auth::user()->carts->with(['product', 'user'])->get();
        $carts = Cart::where('id', Auth::id())->with(['product', 'user'])->get();
        return view("checkout.index");
    }

    public function store()
    {
        // get User Balance 
        $user = Auth::user();
        $balance = $user->balance;
        // check if items in stock
        $carts = Cart::with('product')->where('user_id', $user->id)->get();
        // $products = Product
        $outOfStock = [];
        foreach ($carts as $cart) {
            if($cart->product->stock === 0) {
                $outOfStock[] = $cart;
            }

        }
        if (!count($outOfStock)) {
            dd('not in stock', $outOfStock);
            return redirect()->route('checkout.index')->with('error', 'not in stock');
        }
        

        
        // calculate total price
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });
        if ($balance < $totalPrice) {
            dd("balance is too low", $balance, $totalPrice);
            return redirect()->route('checkout.index')->with('error', 'balance is too low');
        }
        // update user balance
        // $user->balance -= $totalPrice;
        $user->decrement('balance', $totalPrice);
        // dd($balance, $totalPrice, $user->balance);
        // $user->save();
        
        // update items' stock
        // foreach ($carts as $cart) {
        //     $cart->st
        // }
    }
}
