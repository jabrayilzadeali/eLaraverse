<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    // protected $policies = [
    //     Product::class => ProductPolicy::class,
    // ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
        // Share cart data globally with all views
        // if (Auth::check()) {
        //     $cartCount = Cart::where('user_id', Auth::id())->count();
        //     View::share('cartCount', $cartCount);
        // } else {
        //     View::share('cartCount', 0);
        // }
        // $carts = Cart::all();
        // View::share('carts', Cart::all());
    }
}
