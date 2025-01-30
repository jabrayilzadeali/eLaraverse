<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'product_id' => 'required',
            'title' => 'required',
            'comment' => 'required',
            'rating' => 'required',
        ]);
        $validated['user_id'] = Auth::id();
        Review::create($validated);
        return redirect()->back();
    }
}
