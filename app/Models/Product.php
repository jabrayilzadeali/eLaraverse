<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'img_path',
        'rating',
        'is_featured',
        'price',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
