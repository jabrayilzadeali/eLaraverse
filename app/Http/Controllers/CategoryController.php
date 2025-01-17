<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CategoryController extends Controller
{
    public function show($path)
    {
        $currentCategory = Category::where('slug', $path)->firstOrFail();
        // $products = Product::where('category_id', $currentCategory->id)->get();
        $sorts = request()->get('sort', []);

        $sortBy = request()->get('sortBy', ''); // Default to 'created_at'
        $sortDirection = request()->get('direction', ''); // Default to 'desc'
        $query = Product::query();

        if (request()->has('min_price')) {
            $query = $query->minPrice(request()->get('min_price'));
        }

        if (request()->has('max_price')) {
            $query = $query->maxPrice(request()->get('max_price'));
        }

        // if ($sortBy) {
        //     // Apply sorting only if sortBy is provided
        //     $query->orderBy($sortBy, $sortDirection);
        // }
        foreach ($sorts as $column => $direction) {
            if (Schema::hasColumn('products', $column) && in_array($direction, ['asc', 'desc'])) {
                $query->orderBy($column, $direction);
            }
        }

        $products = $query->where('category_id', $currentCategory->id)->simplePaginate(3)->appends(['sortBy' => $sortBy, 'direction' => $sortDirection]);
        $categories = Category::where('parent_id', null)->get();

        return view('products.index', [
            'products' => $products,
            'sortBy' => $sortBy,
            'sortDirection' => $sortDirection,
            'categories' => $categories,
            'currentCategory' => $currentCategory,
            'sortUrl' => 'category.show',
        ]);
    }
}
