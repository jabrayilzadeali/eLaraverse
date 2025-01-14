<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $totalPrice = 0;
        // $products = Product
        $outOfStock = [];
        $insufficientStock = false;
        foreach ($carts as $cart) {
            $product = $cart->product;
            // dd($product->stock, $cart->quantity);
            if($cart->quantity > $product->stock) {
                $outOfStock[] = $cart;
                $insufficientStock = true;
            }
            $totalPrice += $product->price * $cart->quantity;

        }
        if ($insufficientStock) {
            dd('not in stock', $outOfStock);
            return redirect()->route('checkout.index')->with('error', 'not in stock');
        }
        

        
        // calculate total price
        // $totalPrice = $carts->sum(function ($cart) {
        //     return $cart->product->price * $cart->quantity;
        // });
        if ($balance < $totalPrice) {
            dd("balance is too low", $balance, $totalPrice);
            return redirect()->route('checkout.index')->with('error', 'balance is too low');
        }
        // update user balance
        // $user->balance -= $totalPrice;
        DB::transaction(function () use ($user, $carts, $totalPrice) {
            // Deduct the total price from the user's balance
            $user->decrement('balance', $totalPrice);
    
            // Update the stock for each product and clear the cart
            foreach ($carts as $cart) {
                $cart->product->decrement('stock', $cart->quantity);
                $cart->delete(); // Remove the cart item after purchase
            }
        });
        return redirect()->route('checkout.index')->with('success', 'Successfully Purchased');
        // dd($balance, $totalPrice, $user->balance);
        // $user->save();
        
        // update items' stock
        // foreach ($carts as $cart) {
        //     $cart->st
        // }
    }
}
