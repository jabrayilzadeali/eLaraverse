<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, Searchable;

    protected $fillable = [
        'user_id',
        'category_id',
        'sku', // Stock Keeping Unit
        'slug',
        'attributes',
        'title',
        'description',
        'img_path',
        'rating',
        'is_featured',
        'stock',
        'price',
        'discount'
    ];

    protected $casts = [
        'is_featured' => 'boolean', // Cast integer to real boolean
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }
    
    public function getCreatedByAttribute()
    {
        return $this->user ? $this->user->username : null;
    }
    
    public function scopeUserId($query, $id): Builder
    {
        return $query->where('user_id', $id);
    }

    public function scopeMinDiscountedPrice($query, $minPrice): Builder
    {
        return $query->where('price', '>', $minPrice);
    }

    public function scopeMaxDiscountedPrice($query, $maxPrice): Builder
    {
        return $query->where('price', '<', $maxPrice);
    }

    public function scopeMinPrice($query, $minPrice): Builder
    {
        return $query->where('price', '>', $minPrice);
    }

    public function scopeMaxPrice($query, $maxPrice): Builder
    {
        return $query->where('price', '<', $maxPrice);
    }

    public function scopeMinStock($query, $minStock): Builder
    {
        return $query->where('stock', '>', $minStock);
    }

    public function scopeMaxStock($query, $maxStock): Builder
    {
        return $query->where('stock', '<', $maxStock);
    }

    public function scopeIsFeatured($query, $is_featured): Builder
    {
        return $query->where('is_featured', $is_featured);
    }
}
