<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserSettingsController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $featuredProducts = Product::where('is_featured', true)->get();
    $latestProducts = Product::latest()->take(8)->get();
    return view('welcome', [
        'featuredProducts' => $featuredProducts,
        'latestProducts' => $latestProducts
    ]);
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy']);

    Route::post('/fetch_carts', [ProductController::class, 'fetch']);
    Route::post('/cart', [ProductController::class, 'store_api']);
    Route::delete('/cart', [ProductController::class, 'destroy_api']);
    Route::patch('/change_cart_quantity', [ProductController::class, 'change_cart_quantity']);

    Route::get('settings', [UserSettingsController::class, 'edit'])->name('user.settings.edit');
    Route::patch('settings', [UserSettingsController::class, 'update'])->name('user.settings.update');
});

Route::get('/cart', [CartController::class, 'index']);


// Route::get('/product', function () {
//     return view('product');
// });

// Route::resource('products', ProductController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
//     ->name('product.edit')
//     ->middleware('auth')
//     ->can('edit', 'product');

// Route::middleware(['auth'])->group(function () {
//     Route::get('products/create', [ProductController::class, 'create'])
//         ->can('create', Product::class)
//         ->name('products.create');
//     Route::post('products', [ProductController::class, 'store'])
//         ->can('create', Product::class)
//         ->name('products.store');
//     Route::get('products/{product}/edit', [ProductController::class, 'edit'])
//         ->can('update', 'product')
//         ->name('products.edit');
//     Route::patch('products/{product}', [ProductController::class, 'update'])
//         ->can('update', 'product')
//         ->name('products.update');
//     Route::delete('products/{product}', [ProductController::class, 'destroy'])
//         ->can('delete', 'product')
//         ->name('products.destroy');
// });

// Route::get('sellers/dashboard', function (User $user) {
//     dd($user);
// });

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function () {
    Route::get('sellers/dashboard', [SellerController::class, 'index'])
        ->can('create', Product::class)
        ->name('sellers.index');
    Route::get('sellers/create', [SellerController::class, 'create'])
        ->can('create', Product::class)
        ->name('sellers.create');
    Route::post('sellers/', [SellerController::class, 'store'])
        ->can('create', Product::class)
        ->name('sellers.store');
    Route::get('sellers/{product}/edit', [SellerController::class, 'edit'])
        ->can('update', 'product')
        ->name('sellers.edit');
    Route::patch('sellers/{product}', [SellerController::class, 'update'])
        ->can('update', 'product')
        ->name('sellers.update');
    Route::delete('products/{product}', [SellerController::class, 'destroy'])
        ->can('delete', 'product')
        ->name('sellers.destroy');
});

Route::get('/admin/login', [AdminController::class, 'loginForm'])
    ->name('admin.login.form');

Route::post('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login.submit');

Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard');

Route::get('admin/products/index', [AdminProductController::class, 'index'])
    ->name('admin.products.index');

Route::get('admin/products/create', [AdminProductController::class, 'create'])
    ->name('admin.products.create');

Route::post('admin/products/index', [AdminProductController::class, 'store'])
    ->name('admin.products.store');

Route::get('admin/products/{product}/edit', [AdminProductController::class, 'edit'])
    ->name('admin.products.edit');

Route::patch('admin/products/{product}/edit', [AdminProductController::class, 'update'])
    ->name('admin.products.update');

Route::delete('admin/products/{product}', [AdminProductController::class, 'destroy'])
    ->name('admin.products.destroy');

// Route::post('admin.dashboard/', [AdminController::class, 'store'])
//     ->name('admin.products.store');
// Route::get('sellers/{product}/edit', [AdminController::class, 'edit'])
//     ->name('sellers.edit');
// Route::patch('sellers/{product}', [AdminController::class, 'update'])
//     ->name('sellers.update');
// Route::delete('products/{product}', [AdminController::class, 'destroy'])
//     ->name('sellers.destroy');
