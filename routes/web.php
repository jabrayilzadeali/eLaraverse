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
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/cart', [ProductController::class, 'some_api']);
Route::post('/cart', [ProductController::class, 'store_api']);
Route::delete('/cart', [ProductController::class, 'destroy_api']);
Route::patch('/change_cart_quantity', [ProductController::class, 'change_cart_quantity']);

// Route::get('/product', function () {
//     return view('product');
// });

Route::resource('products', ProductController::class)->only(['index', 'show', 'create', 'store']);
