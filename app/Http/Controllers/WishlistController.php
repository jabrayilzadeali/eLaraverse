<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->with('product')->paginate(3);
        return view('wishlist.index', ['wishlist' => $wishlist]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function toggle()
    {
        // $validators = request()->validate([
        //     'product_id' => 'required|exists:products,id',
        // ]);
        
        $user = Auth::id();
        $product_id = request()->product_id;
        $wishlist = Wishlist::where('user_id', $user)->where('product_id', $product_id)->first();
        $inWishlist = false;
        if ($wishlist) {
            $wishlist->delete();
        } else {
            Wishlist::create([
                'user_id' => $user,
                'product_id' => $product_id,
            ]);
            $inWishlist = true;
        }
        return response()->json([
            'wishlistHTML' => view('components.in-wishlist', ['inWishlist' => $inWishlist])->render(),
            'product_id' => $product_id,
            'message' => 'trying to get carts',
        ]);
        // return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
