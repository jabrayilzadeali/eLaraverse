<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;


class ProductController extends Controller
{
    public function index()
    {
        // if (Auth::check() && !Auth::user()->email_verified_at) {
        //     return redirect()->route('verification.notice');
        // }
        // $products = Product::orderBy('price', 'desc')->paginate(2);
        // $sortBy = request()->get('sortBy', ''); // Default to 'created_at'
        // $sortDirection = request()->get('direction', ''); // Default to 'desc'
        $query = Product::query();
        $sorts = request()->get('sort', []);
        $appends = [];


        // if (request()->has('min_price') || request()->has('max_price')) {
        //     $query = $query->scopeDiscountedPriceRange($minPrice = request()->get('min_price'), $maxPrice = request()->get('max_price'));
        // }

        if (request()->has('min_price') || request()->has('max_price')) {
            $minPrice = request()->get('min_price');
            $maxPrice = request()->get('max_price');
            $appends['min_price'] = $minPrice;
            $appends['max_price'] = $maxPrice;
            $query = $query->discountedPriceRange($minPrice, $maxPrice);
        }

        // if (request()->has('max_price')) {
        //     $query = $query->maxDiscountedPrice(request()->get('max_price'));
        // }

        // if ($sortBy) {
        //     // Apply sorting only if sortBy is provided
        //     $query->orderBy($sortBy, $sortDirection);
        // }
        foreach ($sorts as $column => $direction) {
            if (Schema::hasColumn('products', $column) && in_array($direction, ['asc', 'desc'])) {
                $query->orderBy($column, $direction);
                $appends["sort[$column]"] = $direction;
            }
        }
        // $products = $query->simplePaginate(3)->appends(['sortBy' => $sortBy, 'direction' => $sortDirection]);
        $products = $query
            ->withExists(['wishlist as inWishlist' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->simplePaginate(3)
            ->appends($appends);

        // $products = $query->paginate(3);
        // $products = Product::orderBy($sortBy, $sortDirection)->simplePaginate(6)->appends(['sortBy' => $sortBy, 'direction' => $sortDirection]);;
        $categories = Category::where('parent_id', null)->get();
        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'sortUrl' => 'products.index'
        ]);
    }
    public function show(Product $product)
    {
        // if (Auth::check() && !Auth::user()->email_verified_at) {
        //     return redirect()->route('verification.notice');
        // }
        $hasPurchased = false;
        if (Auth::check()) {
            $hasPurchased = Order::where('user_id', Auth::id())
                ->with('order_items')
                ->whereHas('order_items', function ($query) use ($product) {
                    $query
                        ->where('product_id', $product->id)
                        ->where('status', 'delivered');
                })
                ->exists();
        }
        $reviews = Review::where('product_id', $product->id)->with('user')->latest()->get();
        $product->load('seller');
        return view('products.show', ['product' => $product, 'reviews' => $reviews, 'hasPurchased' => $hasPurchased]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'file_upload' => 'image',
            'rating' => 'required|numeric|between:0,5',
            'price' => 'required',
        ]);
        $slug = Str::slug($validated['title']);
        $validated['slug'] = $slug;
        $validated['user_id'] = Auth::id();


        if (request()->hasFile('file_upload')) {
            $file_upload = Storage::disk('public')->put("/$slug", request()->file('file_upload'));
            $validated['img_path'] = $file_upload;
        }

        Product::Create($validated);
        return redirect()->route('products.index')->with('success', 'Post Created Successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product)
    {

        $validated = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'file_upload' => 'image',
            'rating' => 'required|numeric|between:0,5',
            'price' => 'required',
        ]);

        $oldSlug = $product->slug;
        $slug = Str::slug($validated['title']);


        if (request()->hasFile('file_upload')) {
            Storage::disk('public')->delete($product->img_path);
            $file_upload = Storage::disk('public')->put("/$slug", request()->file('file_upload'));
            $validated['img_path'] = $file_upload;
        }


        if ($oldSlug !== $slug) {
            Storage::disk('public')->delete($oldSlug);
            // rename(storage_path("app/public/$oldSlug"), storage_path("app/public/$slug"));
            $validated['img_path'] = str_replace($oldSlug, $slug, $product->img_path);
        }
        $validated['slug'] = $slug;
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Post Edited Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        // dd($product->img_path);
        // Storage::disk('public')->delete($product->img_path);
        $directory = dirname($product->img_path);
        Storage::disk('public')->deleteDirectory($directory);
        return redirect()->route('products.index')->with('success', 'Post Deleted Successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%');

        $sorts = request()->get('sort', []);
        $appends = [];
        foreach ($sorts as $column => $direction) {
            if (Schema::hasColumn('products', $column) && in_array($direction, ['asc', 'desc'])) {
                $products->orderBy($column, $direction);
                $appends["sort[$column]"] = $direction;
            }
        }

        if (request()->has('min_price') || request()->has('max_price')) {
            $minPrice = request()->get('min_price');
            $maxPrice = request()->get('max_price');
            $appends['min_price'] = $minPrice;
            $appends['max_price'] = $maxPrice;
            $products = $products->discountedPriceRange($minPrice, $maxPrice);
        }
        $products = $products
            ->withExists(['wishlist as inWishlist' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->simplePaginate(3)
            ->appends($appends);
        return view('products.search', compact('products', 'query'));
    }

    public function index_api()
    {
        return response()->json([
            'csrf_token' => csrf_token(),
            'xsrf_token' => request()->cookie('XSRF-TOKEN'),
            'message' => 'get request works'
        ]);
    }
    public function some_api()
    {
        return response()->json([
            'message' => 'okay cool',
            'csrf_token' => csrf_token(),
            'xsrf_token' => request()->cookie('XSRF-TOKEN'),
        ]);
    }
    public function store_api()
    {
        foreach (request()->all() as $obj) {
            $cartItem = Cart::firstOrNew([
                'user_id' => Auth::id(),
                'product_id' => $obj['id'],
            ]);
            // Increment quantity if item exists, or set it for new items
            $cartItem->quantity = $obj['quantity'] ?? 1;
            // Save the cart item
            $cartItem->save();
        }
        return response()->json([
            'message' => 'post request works',
            'request' => request()->all(),
        ]);
    }

    public function change_cart_quantity()
    {
        $cartItem = Cart::firstWhere([
            ['user_id', '=', Auth::id()],
            ['product_id', '=', request()->id],
        ]);
        $cartItem->quantity = request()->quantity;
        $cartItem->save();

        return response()->json([
            'message' => 'trying to increase quantity',
        ]);
    }

    public function destroy_api()
    {
        $cartItem = Cart::firstWhere([
            ['user_id', '=', Auth::id()],
            ['product_id', '=', request()->id],
        ]);

        $cartItem->delete();
        return response()->json([
            'Auth::id()' => Auth::id(),
            'request_id' => request()->id,
            'message' => 'trying to delete',
        ]);
    }

    public function fetch()
    {
        if (count(request()->all()) > 0) {
            foreach (request()->all() as $obj) {
                $cartItem = Cart::firstOrNew([
                    'user_id' => Auth::id(),
                    'product_id' => $obj['id'],
                ]);
                // Increment quantity if item exists, or set it for new items
                $cartItem->quantity = $obj['quantity'] ?? 1;
                // Save the cart item
                $cartItem->save();
            }
        }
        $carts = Cart::where('user_id', Auth::id())
            ->with(['product:id,title,img_path,price,discount,stock']) // Fetch only the required fields
            ->get()
            ->map(function ($cart) {
                return [
                    'id' => $cart->product->id,
                    'title' => $cart->product->title,
                    'img' => $cart->product->img_path,
                    'price' => $cart->product->price,
                    'discount' => $cart->product->discount,
                    'discounted_price' => $cart->product->price - $cart->product->price * $cart->product->discount / 100,
                    // 'discounted_price' => ,
                    'stock' => $cart->product->stock,
                    'quantity' => $cart->quantity, // Assuming `quantity` exists in the Cart model
                ];
            });

        return response()->json([
            'carts' => $carts,
            'request_all' => request()->all(),
            'message' => 'trying to get carts',
        ]);
    }
}
