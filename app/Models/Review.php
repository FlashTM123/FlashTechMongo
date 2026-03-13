<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'reviews';

    protected $fillable = [
        'product_id',
        'customer_id',
        'rating',
        'title',
        'comment',
        'images',
        'is_verified',
        'is_approved',
        'helpful_count'
    ];

    protected $casts = [
        'rating' => 'integer',
        'images' => 'array',
        'is_verified' => 'boolean',
        'is_approved' => 'boolean',
        'helpful_count' => 'integer',
    ];

    /**
     * ⚡ IMAGES ACCESSOR - Auto format review image URLs
     * Store path: ["images/abc123.jpg"]
     * Display as: ["/storage/images/abc123.jpg"]
     */
    public function getImagesAttribute($value)
    {
        if (!$value || !is_array($value)) {
            return $value ?? [];
        }
        return array_map(function ($image) {
            if (!$image) {
                return null;
            }
            if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
                return $image;
            }
            if (str_starts_with($image, '/storage/')) {
                return $image;
            }
            return '/storage/' . $image;
        }, $value);
    }

    /**
     * Review thuộc về Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Review thuộc về Customer
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Scope: Chỉ lấy reviews đã được duyệt
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope: Sắp xếp theo mới nhất
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
