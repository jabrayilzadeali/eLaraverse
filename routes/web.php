<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\EnsureAdmin;
use App\Http\Middleware\EnsureAdminGuest;
use App\Http\Middleware\EnsureSeller;
use App\Http\Middleware\EnsureSellerGuest;
use App\Http\Middleware\GuestOrVerifiedUser;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(GuestOrVerifiedUser::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
});



Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [RegisteredUserController::class, 'verifyNotice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [RegisteredUserController::class, 'verifyEmail'])
        ->middleware(['signed'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [RegisteredUserController::class, 'verifyHandler'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/fetch_carts', [ProductController::class, 'fetch']);
    Route::post('/cart', [ProductController::class, 'store_api']);
    Route::delete('/cart', [ProductController::class, 'destroy_api']);
    Route::patch('/change_cart_quantity', [ProductController::class, 'change_cart_quantity']);


    Route::get('/settings', [UserSettingsController::class, 'index'])->name('user.settings');
    Route::get('/settings/edit', [UserSettingsController::class, 'edit'])->name('user.settings.edit');
    // Route::patch('/settings', [UserSettingsController::class, 'updateSettings'])->name('user.settings.edit');
    Route::patch('/settings', [UserSettingsController::class, 'update'])->name('user.settings.update');
    Route::get('/settings/change-email', [UserSettingsController::class, 'changeEmailForm'])->name('settings.change-email');
    Route::post('/settings/update-email', [UserSettingsController::class, 'updateEmail'])->name('settings.update-email');
    Route::get('/settings/change-password', [UserSettingsController::class, 'changePasswordForm'])->name('settings.change-password');
    Route::post('/settings/update-password', [UserSettingsController::class, 'updatePassword'])->name('settings.update-password');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/api/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
});

Route::middleware('guest')->group(function () {
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');
});


Route::get('/cart', [CartController::class, 'index']);

Route::get('/category/{path}', [CategoryController::class, 'show'])
    ->where('path', '.*')
    ->name('category.show');

Route::middleware([EnsureSellerGuest::class])->group(function () {
    // Route::get('/test/wow', function () {
    //     return "okay";
    // });
    Route::get('/sellers/login', [SellerController::class, 'loginForm'])
        ->name('seller.login.form');

    Route::post('/sellers/login', [SellerController::class, 'login'])
        ->name('seller.login.submit');
});

// ->can('create', Product::class)
Route::middleware([EnsureSeller::class])->group(function () {
    Route::post('/sellers/logout', [SellerController::class, 'logout'])
        ->name("sellers.logout");
    Route::get('sellers/dashboard', [SellerController::class, 'index'])
        ->name('sellers.index');
    Route::get('sellers/orders', [SellerController::class, 'orders'])
        ->name('sellers.orders');
    Route::post('sellers/order-status', [SellerController::class, 'orderStatusUpdate'])
        ->name('sellers.orders.status');
    Route::get('sellers/reviews', [SellerController::class, 'reviews'])
        ->name('sellers.reviews');
    Route::get('sellers/create', [SellerController::class, 'create'])
        ->name('sellers.create');
    Route::post('sellers/', [SellerController::class, 'store'])
        ->name('sellers.store');
    Route::get('sellers/{product}/edit', [SellerController::class, 'edit'])
        ->name('sellers.edit');
    Route::patch('sellers/{product}', [SellerController::class, 'update'])
        ->name('sellers.update');
    Route::delete('products/{product}', [SellerController::class, 'destroy'])
        ->name('sellers.destroy');
});
Route::get('/sellers/{seller}', [SellerController::class, 'seller_products'])->name('sellers.seller_products');

Route::middleware([EnsureAdminGuest::class])->group(function () {
    Route::get('/admin/login', [AdminController::class, 'loginForm'])
        ->name('admin.login.form');

    Route::post('/admin/login', [AdminController::class, 'login'])
        ->name('admin.login.submit');
});

Route::middleware([EnsureAdmin::class])->group(function () {
    Route::post('/admin/logout', [AdminController::class, 'logout'])
        ->name("admin.logout");

    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/users', [AdminUserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])
        ->name('admin.categories.index');

    Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])
        ->name('admin.categories.create');

    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])
        ->name('admin.categories.store');

    Route::get('/admin/products', [AdminProductController::class, 'index'])
        ->name('admin.products.index');

    Route::get('/admin/products/create', [AdminProductController::class, 'create'])
        ->name('admin.products.create');

    Route::post('/admin/products', [AdminProductController::class, 'store'])
        ->name('admin.products.store');

    Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])
        ->name('admin.products.edit');

    Route::patch('/admin/products/{product}/edit', [AdminProductController::class, 'update'])
        ->name('admin.products.update');

    Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])
        ->name('admin.products.destroy');
});


// Route::post('admin.dashboard/', [AdminController::class, 'store'])
//     ->name('admin.products.store');
// Route::get('sellers/{product}/edit', [AdminController::class, 'edit'])
//     ->name('sellers.edit');
// Route::patch('sellers/{product}', [AdminController::class, 'update'])
//     ->name('sellers.update');
// Route::delete('products/{product}', [AdminController::class, 'destroy'])
//     ->name('sellers.destroy');
