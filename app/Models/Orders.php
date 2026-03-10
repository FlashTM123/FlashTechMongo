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

    protected $casts = [
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
}
