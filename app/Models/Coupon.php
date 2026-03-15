<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    /** @use HasFactory<\Database\Factories\CouponFactory> */
    use HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'coupons';
    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'description',
        'discount_type',     // 'percentage' or 'fixed'
        'discount_value',    // e.g., 10 for 10% or $100,000
        'max_usage',         // null = unlimited
        'current_usage',     // update each use
        'min_order_value',   // minimum order amount to apply coupon
        'max_discount_amount', // cap for percentage discounts
        'valid_from',
        'valid_to',
        'is_active',
    ];

    protected $casts = [
        'discount_value' => 'float',
        'min_order_value' => 'float',
        'max_discount_amount' => 'float',
        'current_usage' => 'integer',
        'max_usage' => 'integer',
        'is_active' => 'boolean',
        'valid_from' => 'datetime',
        'valid_to' => 'datetime',
    ];

    /**
     * Check if coupon is valid and can be used
     */
    public function isValid(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        if ($this->max_usage && $this->current_usage >= $this->max_usage) {
            return false;
        }

        $now = now();
        if ($this->valid_from && $now->isBefore($this->valid_from)) {
            return false;
        }

        if ($this->valid_to && $now->isAfter($this->valid_to)) {
            return false;
        }

        return true;
    }

    /**
     * Calculate discount amount
     */
    public function calculateDiscount(float $subtotal): float
    {
        if (!$this->isValid() || $subtotal < $this->min_order_value) {
            return 0;
        }

        if ($this->discount_type === 'percentage') {
            $discount = ($subtotal * $this->discount_value) / 100;
            if ($this->max_discount_amount) {
                $discount = min($discount, $this->max_discount_amount);
            }
            return $discount;
        }

        // Fixed discount
        return min($this->discount_value, $subtotal);
    }

    /**
     * Use coupon (increment usage)
     */
    public function use(): void
    {
        $this->increment('current_usage');
    }
}
