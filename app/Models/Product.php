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
        'color',
        'category',
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
    public function reviews()
    {
        return $this->hasMany(Reviews::class)->approved()->latest();
    }
    public function getAverageRatingAttribute(): float
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
    public function getReviewCountAttribute(): int
    {
        return $this->reviews()->count();
    }
    public function getRatingStarsAttribute(): array
    {
      $stats = [];
      for($i = 5; $i >= 1; $i--) {
          $count = $this->reviews()->where('rating', $i)->count();
          $stats[$i] = [
                'count' => $count,
                'percentage' => $this->review_count > 0 ? round(($count / $this->review_count) * 100) : 0,
          ];
      }
        return $stats;
    }
}
