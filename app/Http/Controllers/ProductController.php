<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }
    
    public function create()
    {
        return view('products.create');
    }
    
    public function store()
    {
        dd("wow");
    }
    public function index_api()
    {
        return response()->json([
            'csrf_token' => csrf_token(),
            'xsrf_token' => request()->cookie('XSRF-TOKEN'),
            'message' => 'get request works'
        ]);
    }
    public function some_api()
    {
        return response()->json([
            'message' => 'okay cool',
            'csrf_token' => csrf_token(),
            'xsrf_token' => request()->cookie('XSRF-TOKEN'),
        ]);
    }
    public function store_api()
    {
        foreach (request()->all() as $obj) {
            $cartItem = Cart::firstOrNew([
                'user_id' => Auth::id(),
                'product_id' => $obj['id'],
            ]);
            // Increment quantity if item exists, or set it for new items
            $cartItem->quantity = $obj['quantity'] ?? 1;
            // Save the cart item
            $cartItem->save();
        }
        return response()->json([
            'message' => 'post request works',
            'request' => request()->all(),
            'id' => request()->all()[0]['id'],
            'quantity' => request()->all()[0]['quantity'],
        ]);
    }

    public function change_cart_quantity()
    {
        $cartItem = Cart::firstWhere([
            ['user_id', '=', Auth::id()],
            ['product_id', '=', request()->id],
        ]);
        $cartItem->quantity = request()->quantity;
        $cartItem->save();

        return response()->json([
            'message' => 'trying to increase quantity',
        ]);
    }

    public function destroy_api()
    {
        $cartItem = Cart::firstWhere([
            ['user_id', '=', Auth::id()],
            ['product_id', '=', request()->id],
        ]);

        $cartItem->delete();
        return response()->json([
            'message' => 'trying to delete',
        ]);
    }
}
