<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        return view('sellers.index');
    }
    public function create()
    {
        return view('sellers.create');
    }
}