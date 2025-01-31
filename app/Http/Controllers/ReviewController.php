<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        Product::where('id', $validated['product_id'])->update([
            'rating' => round(Review::where('product_id', $validated['product_id'])->avg('rating'), 1)
        ]);
        // $review = Review::where('product_id', $validated['product_id'])
        //     ->selectRaw('AVG(rating) as avg_rating')
        //     ->first();
        // dd($review);

        // if ($review) {
        //     Product::where('id', $validated['product_id'])->update(['rating' => number_format($review->avg_rating, 1)]);
        // }
        return redirect()->back();
    }
}
