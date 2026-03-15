<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'mongodb';
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_code',
        'customer_id',
        'full_name',
        'email',
        'phone_number',
        'shipping_address',
        'payment_method',
        'payment_status',
        'order_status',
        'subtotal',
        'discount',
        'total',
        'notes',
    ];

    protected $casts = [];

    protected function castDecimal($value): float
    {
        if ($value instanceof \MongoDB\BSON\Decimal128) {
            return (float) (string) $value;
        }
        return (float) ($value ?? 0);
    }

    public function getSubtotalAttribute($value): float
    {
        return $this->castDecimal($value);
    }

    public function getDiscountAttribute($value): float
    {
        return $this->castDecimal($value);
    }

    public function getTotalAttribute($value): float
    {
        return $this->castDecimal($value);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }

    /**
     * Alias cho orderDetails()
     */
    public function details()
    {
        return $this->orderDetails();
    }
}
