<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'slug',
        'name',
        'order'
    ];

    // One-to-many relationship: A category can have many subcategories (children)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Inverse of the above relationship: A category belongs to a parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // // Optionally, a method to generate a slug before saving the model (e.g., if it's not set manually)
    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($category) {
    //         if (empty($category->slug)) {
    //             $category->slug = Str::slug($category->name);
    //         }
    //     });
    // }
}
