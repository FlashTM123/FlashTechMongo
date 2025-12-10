<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Reviews extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewsFactory> */
    use HasFactory;
    protected $connection = 'mongodb';
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'customer_id',
        'rating',
        'comment',
        'image',
        'is_approved',
        'is_verified',
        'helpful_count',
    ];
    protected $casts = [
        'image' => 'array',
        'is_approved' => 'boolean',
        'is_verified' => 'boolean',
        'helpful_count' => 'integer',
        'rating' => 'integer',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
