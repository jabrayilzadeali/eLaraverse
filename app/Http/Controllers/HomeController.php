<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        // if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
        //     return Redirect::route('verification.notice')->with('message', 'Please verify your email before continuing.');
        // }
        if (Auth::check() && !Auth::user()->email_verified_at) {
            return redirect()->route('verification.notice');
        }
        $featuredProducts = Product::where('is_featured', 1)->get();
        // $categories = Category;
        $categories = Cache::remember('categories', 3600, function () {
            return Category::with('children')->where('parent_id', null)->take(7)->get();
        });
        // $latestProducts = Product::latest()->take(8)->get();
        $latestProducts = Product::orderBy('created_at', 'desc')
        ->limit(8)
        ->withExists(['wishlist as inWishlist' => function ($query) {
            $query->where('user_id', Auth::id());
        }])
        ->get();

        return view('welcome', [
            'featuredProducts' => $featuredProducts,
            'latestProducts' => $latestProducts,
            'categories' => $categories,
        ]);
    }
    public function userIsVerified()
    {
        $featuredProducts = Product::where('is_featured', 1)->get();
        // $categories = Category;
        $categories = Cache::remember('categories', 3600, function () {
            return Category::with('children')->where('parent_id', null)->take(7)->get();
        });
        // $latestProducts = Product::latest()->take(8)->get();
        $latestProducts = Product::orderBy('created_at', 'desc')->limit(8)->get();
        return view('welcome', [
            'featuredProducts' => $featuredProducts,
            'latestProducts' => $latestProducts,
            'categories' => $categories,
        ]);
    }
}
