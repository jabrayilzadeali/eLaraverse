<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $columns = [
            ['key' => 'id', 'label' => '#', 'sortable' => false, 'type' => 'text'],
            ['key' => 'slug', 'label' => 'slug', 'sortable' => false, 'type' => 'text'],
            ['key' => 'title', 'label' => 'title', 'sortable' => true, 'type' => 'text'],
            ['key' => 'description', 'label' => 'description', 'sortable' => false, 'type' => 'text'],
            ['key' => 'img_path', 'label' => 'Img', 'sortable' => false, 'type' => 'img'],
            ['key' => 'rating', 'label' => 'rating', 'sortable' => true, 'type' => 'rating'],
            ['key' => 'is_featured', 'label' => 'is_featured', 'sortable' => false, 'type' => 'boolean'],
            ['key' => 'stock', 'label' => 'stock', 'sortable' => false, 'type' => 'text'],
            ['key' => 'price', 'label' => 'price', 'sortable' => true, 'type' => 'text'],
            ['key' => 'discount', 'label' => 'discount', 'sortable' => true, 'type' => 'text'],
            // ['key' => 'discount', 'label' => 'discount', 'sortable' => true, 'type' => 'text'],
            ['key' => 'created_at', 'label' => 'date', 'sortable' => false, 'type' => 'date'],
            ['key' => 'category.name', 'label' => 'category', 'sortable' => false, 'type' => 'text'],
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
        if (in_array('category.name', $get_columns)) {
            $index = array_search('category.name', $get_columns);
            $get_columns[$index] = 'category_id';
        }


        // $products = Product::query(); // Start with the Eloquent query builder
        // $products = Product::where('user_id', Auth::id())->query();
        $products = Product::with(['category'])->where('user_id', Auth::id());
        // $products = Auth::user()->products;

        $sorts = request()->get('sort', []);
        // dd($sorts);

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
        foreach ($sorts as $column => $direction) {
            if (Schema::hasColumn('products', $column) && in_array($direction, ['asc', 'desc'])) {
                $products->orderBy($column, $direction);
            }
        }

        if (!in_array('slug', $get_columns)) {
            $get_columns[] = 'slug';
        }
        $products = $products->get($get_columns);
        // dd($products);
        // $products = Auth::user()->products;
        return view('sellers.index', [
            'products' => $products,
            'stackedColumns' => $stackedColumns,
            'columns' => $columns,
            'sorts' => $sorts
        ]);
    }

    public function create()
    {
        // $categories = Category::all();
        $categories = Category::doesntHave('children')->get();
        return view('sellers.create', ['categories' => $categories]);
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'file_upload' => 'image',
            'discount' => 'numeric',
            'category' => 'required',
            'attributes.key' => 'required|array',
            'attributes.value' => 'required|array',
            'price' => 'required',
        ]);
        $attributes = array_combine($validated['attributes']['key'], $validated['attributes']['value']);
        // dd($validated);


        $slug = Str::slug($validated['title']);
        $validated['slug'] = $slug;
        $validated['attributes'] = json_encode($attributes);
        $validated['user_id'] = Auth::id();
        $validated['category_id'] = $validated['category'];
        $validated['discounted_price'] = $validated['price'] - $validated['price'] * $validated['discount'] / 100;
        $sku = Str::uuid();
        $validated['sku'] = $sku;



        if (request()->hasFile('file_upload')) {
            $file_upload = Storage::disk('public')->put("/$sku", request()->file('file_upload'));
            $validated['img_path'] = $file_upload;
        }

        $product = Product::Create($validated);

        return redirect()->route('sellers.index')->with('success', 'Post Created Successfully');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('sellers.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Product $product)
    {

        $validated = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'file_upload' => 'image',
            'category' => 'required',
            'discount' => 'numeric',
            'attributes.key' => 'array',
            'attributes.value' => 'array',
            'price' => 'required',
        ]);

        $slug = Str::slug($validated['title']);
        $validated['category_id'] = $validated['category'];
        if (isset($validated['attributes'])) {
            $attributes = array_combine($validated['attributes']['key'], $validated['attributes']['value']);
            $validated['attributes'] = json_encode($attributes);
        } else {
            $validated['attributes'] = json_encode([]);
        }


        if (request()->hasFile('file_upload')) {
            if ($product->img_path !== "default-img.jpg") {
                Storage::disk('public')->delete($product->img_path);
            }
            $file_upload = Storage::disk('public')->put("/$product->sku", request()->file('file_upload'));
            $validated['img_path'] = $file_upload;
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
