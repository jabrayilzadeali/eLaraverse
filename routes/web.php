<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/product', function () {
    return view('product');
});

