<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $query = request()->query('query');
        $array = array_map('intval', explode(",", $query));
        return response()->json(['okay' => 'wow', 'request' => $array]);
    }
}
