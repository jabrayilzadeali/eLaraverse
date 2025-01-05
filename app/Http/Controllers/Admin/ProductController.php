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
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
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
            'title' => 'required',
            'description' => 'required',
            'file_upload' => 'image',
            'price' => 'required',
        ]);
        
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
