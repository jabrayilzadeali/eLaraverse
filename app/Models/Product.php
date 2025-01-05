<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sku', // Stock Keeping Unit
        'slug',
        'title',
        'description',
        'img_path',
        'rating',
        'is_featured',
        'price',
    ];

    protected $casts = [
        'is_featured' => 'boolean', // Cast integer to real boolean
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
