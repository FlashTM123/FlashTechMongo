<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
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
        'colors',
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
        // Don't use array/json casts for images and colors - handle manually in getAttribute/setAttribute
        // 'images' => 'json',
        // 'colors' => 'json',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'stock_quantity' => 'integer',
        'views_count' => 'integer',
        'sales_count' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name) . '-' . Str::random(5);
            }
            if (empty($product->sku)) {
                $product->sku = null;
            }
        });
    }

    /**
     * ⚡ Override getAttribute to handle JSON parsing for images & colors
     * MongoDB stores these as JSON strings, we need to parse them into arrays
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);
        
        // Parse JSON strings to arrays for images and colors
        if (in_array($key, ['images', 'colors']) && is_string($value)) {
            $value = json_decode($value, true) ?? [];
        }
        
        // Format image URLs
        if ($key === 'images' && is_array($value)) {
            return array_map(function ($img) {
                if (!$img) return null;
                if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://') || str_starts_with($img, '/storage/')) {
                    return $img;
                }
                return '/storage/' . $img;
            }, $value);
        }
        
        if ($key === 'colors' && is_array($value)) {
            return collect($value)->map(function ($color) {
                if (isset($color['images']) && is_array($color['images'])) {
                    $color['images'] = array_map(function ($img) {
                        if (!$img) return null;
                        if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://') || str_starts_with($img, '/storage/')) {
                            return $img;
                        }
                        return '/storage/' . $img;
                    }, $color['images']);
                }
                return $color;
            })->toArray();
        }
        
        return $value;
    }

    protected function castDecimal($value): float
    {
        if ($value instanceof \MongoDB\BSON\Decimal128) {
            return (float) (string) $value;
        }
        return (float) ($value ?? 0);
    }

    public function getPriceAttribute($value): float
    {
        return $this->castDecimal($value);
    }

    public function getSalePriceAttribute($value): float
    {
        return $this->castDecimal($value);
    }

    public function getRatingAttribute($value): float
    {
        return $this->castDecimal($value);
    }

    /**
     * ⚡ IMAGE ACCESSORS - Auto format image URLs
     * Store path: "products/abc123.jpg"
     * Display as: "/storage/products/abc123.jpg"
     */
    public function getImageAttribute($value)
    {
        if (!$value) {
            return null;
        }
        // If already a full URL, return as is
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }
        // If starts with /storage/, return as is
        if (str_starts_with($value, '/storage/')) {
            return $value;
        }
        // Otherwise, prepend /storage/
        return '/storage/' . $value;
    }

    public function getImagesAttribute($value)
    {
        if (!$value || !is_array($value)) {
            return $value ?? [];
        }
        // Format each image path
        return array_map(function($image) {
            if (!$image) {
                return null;
            }
            if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://') || str_starts_with($image, '/storage/')) {
                return $image;
            }
            return '/storage/' . $image;
        }, $value);
    }

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
        if (request()?->is('product/*')) {
            return 'slug';
        }

        return 'id';
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

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    /**
     * Lấy giá cao nhất từ tất cả màu (dùng cho card).
     */
    public function getMaxColorPriceAttribute(): float
    {
        $colors = $this->colors ?? [];
        if (empty($colors)) {
            return $this->price;
        }
        return (float) collect($colors)->max('price') ?: $this->price;
    }

    /**
     * Lấy giá thấp nhất (sale hoặc gốc) từ tất cả màu.
     */
    public function getMinColorPriceAttribute(): float
    {
        $colors = $this->colors ?? [];
        if (empty($colors)) {
            return $this->sale_price ?: $this->price;
        }
        return (float) collect($colors)->min(function ($c) {
            return !empty($c['sale_price']) ? $c['sale_price'] : $c['price'];
        });
    }

    /**
     * Tổng tồn kho tất cả màu.
     */
    public function getTotalColorStockAttribute(): int
    {
        $colors = $this->colors ?? [];
        if (empty($colors)) {
            return $this->stock_quantity ?? 0;
        }
        return (int) collect($colors)->sum('stock');
    }
}
