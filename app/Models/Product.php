<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;
use App\Models\Seller;
use App\Models\Wishlist;


class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, Searchable;

    protected $fillable = [
        'seller_id',
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
        'discount',
        'discounted_price'
    ];

    protected $casts = [
        'is_featured' => 'boolean', // Cast integer to real boolean
    ];
    
    public function wishlist(): HasOne
    {
        return $this->hasOne(Wishlist::class, 'product_id')->where('user_id', Auth::id());
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
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
    
    public function scopeSellerId($query, $id): Builder
    {
        return $query->where('seller_id', $id);
    }

    public function scopeMinDiscountedPrice($query, $minPrice): Builder
    {
        return $query
            ->selectRaw('*, price - (price * discount / 100) as discounted_price')
            ->havingRaw('discounted_price > ?', [$minPrice]);
    }

    public function scopeMaxDiscountedPrice($query, $maxPrice): Builder
    {
        return $query
            ->selectRaw('*, price - (price * discount / 100) as discounted_price')
            ->havingRaw('discounted_price < ?', [$maxPrice]);
    }
    
    public function scopeDiscountedPriceRange($query, $minPrice = null, $maxPrice = null): Builder
    {
        // Calculate the discounted price once
        $query->selectRaw('*, price - (price * discount / 100) as discounted_price');
        
        // Apply minPrice condition if it's provided
        if ($minPrice !== null) {
            $query->havingRaw('discounted_price >= ?', [$minPrice]);
        }
        
        // Apply maxPrice condition if it's provided
        if ($maxPrice !== null) {
            $query->havingRaw('discounted_price <= ?', [$maxPrice]);
        }

        return $query;
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
