<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $products = Auth::user()->products;
        return view('sellers.index', ['products' => $products]);
    }

    public function create()
    {
        return view('sellers.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'file_upload' => 'image',
            // 'rating' => 'numeric|between:0,5',
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
        return redirect()->route('sellers.index')->with('success', 'Post Created Successfully');
    }
    
    public function edit(Product $product)
    {
        return view('sellers.edit', ['product' => $product]);
    }
    
    public function update(Product $product)
    {
        
        $validated = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'file_upload' => 'image',
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

        return redirect()->route('sellers.index')->with('success', 'Post Edited Successfully');
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
        $directory = dirname($product->img_path);
        Storage::disk('public')->deleteDirectory($directory);
        return redirect()->route('sellers.index')->with('success', 'Post Deleted Successfully');
    }



}
