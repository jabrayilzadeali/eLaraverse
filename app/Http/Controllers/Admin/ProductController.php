<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function index()
    {
        $columns = [
            ['key' => 'id', 'label' => '#', 'sortable' => false, 'type' => 'text'],
            ['key' => 'user.username', 'label' => 'created_by', 'sortable' => false, 'type' => 'text'],
            ['key' => 'slug', 'label' => 'slug', 'sortable' => false, 'type' => 'text'],
            ['key' => 'title', 'label' => 'title', 'sortable' => true, 'type' => 'text'],
            ['key' => 'description', 'label' => 'description', 'sortable' => false, 'type' => 'text'],
            ['key' => 'img_path', 'label' => 'Img', 'sortable' => false, 'type' => 'img'],
            ['key' => 'rating', 'label' => 'rating', 'sortable' => true, 'type' => 'rating'],
            ['key' => 'is_featured', 'label' => 'is_featured', 'sortable' => false, 'type' => 'boolean'],
            ['key' => 'stock', 'label' => 'stock', 'sortable' => false, 'type' => 'text'],
            ['key' => 'price', 'label' => 'price', 'sortable' => true, 'type' => 'text'],
            ['key' => 'created_at', 'label' => 'date', 'sortable' => false, 'type' => 'date'],
        ];
        $stackedColumns = array_column($columns, 'label');
        $hiddenColumns = request()->get('hiddenColumns', []);
        if ($hiddenColumns) {
            $columns = array_filter($columns, function ($column) use ($hiddenColumns) {
                return !in_array($column['label'], $hiddenColumns);
            });
        }
        $get_columns = array_column($columns, 'key');
        if (in_array('user.username', $get_columns)) {
            $index = array_search('user.username', $get_columns);
            $get_columns[$index] = 'user_id';
        }
        
        
        $products = Product::query(); // Start with the Eloquent query builder

        $sorts = request()->get('sort', []);
        // dd($sorts);
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
        foreach($sorts as $column => $direction) {
            if (Schema::hasColumn('products', $column) && in_array($direction, ['asc', 'desc'])) {
                $products->orderBy($column, $direction);
            }
        }

        if (!in_array('slug', $get_columns)) {
            $get_columns[] = 'slug';
        }
        $products = $products->with('user:id,username')->get($get_columns);
        // dd($products);
        $sellers = User::where('is_seller', true)->get();
        return view('admin.products.index', [
            'stackedColumns' => $stackedColumns,
            'columns' => $columns,
            'sorts' => $sorts,
            'products' => $products,
            'sellers' => $sellers,
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
