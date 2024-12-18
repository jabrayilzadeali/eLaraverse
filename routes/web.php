<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/api/cart/index', [CartController::class, 'index']);

Route::post('/logout', [SessionController::class, 'destroy']);

// Route::get('/product', function () {
//     return view('product');
// });

Route::resource('products', ProductController::class)->only(['index', 'show', 'create']);
