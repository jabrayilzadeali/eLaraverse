<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query(); // Start with the Eloquent query builder

        if (request()->has('user_id')) {
            $products = Product::userId(request()->get('user_id'));
        }

        if (request()->has('min_price')) {
            $products = $products->minPrice(request()->get('min_price'));
        }

        if (request()->has('max_price')) {
            $products = $products->maxPrice(request()->get('max_price'));
        }

        if (request()->has('min_stock')) {
            $products = $products->maxStock(request()->get('max_stock'));
        }

        if (request()->has('max_stock')) {
            $products = $products->maxStock(request()->get('max_stock'));
        }

        if (request()->has('is_featured')) {
            $products = $products->isFeatured(request()->get('is_featured'));
        }

        if (request()->has('search')) {
            $search = request()->get('search');
            $products->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%")
                  ->orWhere('sku', 'LIKE', "%$search%");
            });
        }
        $products = $products->get();
        $sellers = User::where('is_seller', true)->get();
        return view('admin.products.index', [
            'products' => $products,
            'sellers' => $sellers
        ]);
    }
    
    public function create()
    {
        $sellers = User::where('is_seller', true)->get();
        return view('admin.products.create', ['sellers'=> $sellers]);
    }

    public function store()
    {
        $validated = request()->validate([
            'seller' => 'required|exists:users,id',
            'title' => 'required',
            'description' => 'required',
            'file_upload' => 'image',
            'price' => 'required',
        ]);
        
        
        $slug = Str::slug($validated['title']);
        $validated['slug'] = $slug;
        $validated['user_id'] = $validated['seller'];
        $sku = Str::uuid();
        $validated['sku'] = $sku;


        
        if (request()->hasFile('file_upload')) {
            $file_upload = Storage::disk('public')->put("/$sku", request()->file('file_upload'));
            $validated['img_path'] = $file_upload;
        }

        $product = Product::Create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Post Created Successfully');
    }
    
    public function edit(Product $product)
    {
        $sellers = User::where('is_seller', true)->get();
        return view('admin.products.edit', ['product' => $product, 'sellers' => $sellers]);
    }

    public function update(Product $product)
    {
        $validated = request()->validate([
            'seller' => 'required|exists:users,id',
            'is_featured' => 'nullable|boolean',
            'stock' => 'numeric',
            'title' => 'required',
            'description' => 'required',
            'file_upload' => 'image',
            'price' => 'required',
        ]);
        
        // if (array_key_exists($validated['is_featured'], $validated)) {
        //     $validated['is_featured'] = true;
        // } else {
        //     $validated['is_featured'] = 0;
        // }
        $product->is_featured = $validated['is_featured'] ?? false;  // Default to false if not provided
        
        $slug = Str::slug($validated['title']);
        $validated['user_id'] = $validated['seller'];


        if (request()->hasFile('file_upload')) {
            Storage::disk('public')->delete($product->img_path);
            $file_upload = Storage::disk('public')->put("/$product->sku", request()->file('file_upload'));
            $validated['img_path'] = $file_upload;
        }


        // if ($oldSlug !== $slug) {
        //     Storage::disk('public')->delete($oldSlug);
        //     // rename(storage_path("app/public/$oldSlug"), storage_path("app/public/$slug"));
        //     $validated['img_path'] = str_replace($oldSlug, $slug, $product->img_path);
        // }
        $validated['slug'] = $slug;
        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Post Updated Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        $directory = dirname($product->img_path);
        Storage::disk('public')->deleteDirectory($directory);
        return redirect()->route('admin.products.index')->with('success', 'Post Deleted Successfully');
    }

}
