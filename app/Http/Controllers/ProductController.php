<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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
    public function index_api()
    {
        return response()->json([
            'csrf_token' => csrf_token(),
            'xsrf_token' => request()->cookie('XSRF-TOKEN'),
            'message' => 'get request works'
        ]);
    }
    public function store_api()
    {
        return response()->json(['message' => 'post request works']);
    }


}
