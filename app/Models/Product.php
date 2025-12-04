<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $connection = 'mongodb';
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'sale_price',
        'stock_quantity',
        'brand_id',
        'is_active',
        'image',
        'images',
        'sku',
        'is_featured',
        'views_count',
        'sales_count',
        'rating',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'rating' => 'decimal:2',
        'images' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'stock_quantity' => 'integer',
        'views_count' => 'integer',
        'sales_count' => 'integer',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function specifications()
    {
        return $this->hasMany(Specifications::class);
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getIsOnSaleAttribute(): bool
    {
        return $this->sale_price !== null && $this->sale_price < $this->price;
    }
    public function getDiscountPercentageAttribute(): ?float
    {
        if ($this->is_on_sale) {
            return 0;
        }
        return (int) round((($this->price - $this->sale_price) / $this->price) * 100);
    }
    public function getFinalPriceAttribute(): float
    {
        return $this->is_on_sale ? $this->sale_price : $this->price;
    }
}
