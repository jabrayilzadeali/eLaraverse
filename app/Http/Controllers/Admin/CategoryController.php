<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', null)->get();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        return view('admin.categories.create', ['categories' => $categories]);
    }

    public function store()
    {
        $validated = request()->validate([
            'name' => 'required',
            'parent_id' => 'required',
        ]);
        $validated['slug'] = Str::slug($validated['name']);
        $c = Category::create($validated);
        dd($c);
    }
}
