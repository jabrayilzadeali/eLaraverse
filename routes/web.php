<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

// Route::resource('products', ProductController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
//     ->name('product.edit')
//     ->middleware('auth')
//     ->can('edit', 'product');
//
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::middleware(['auth'])->group(function () {
    Route::get('products/create', [ProductController::class, 'create'])
        ->can('create', Product::class)
        ->name('products.create');
    Route::post('products', [ProductController::class, 'store'])
        ->can('create', Product::class)
        ->name('products.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])
        ->can('update', 'product')
        ->name('products.edit');
    Route::patch('products/{product}', [ProductController::class, 'update'])
        ->can('update', 'product')
        ->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])
        ->can('delete', 'product')
        ->name('products.destroy');
});
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
