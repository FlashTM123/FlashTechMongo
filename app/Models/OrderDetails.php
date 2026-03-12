<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetails extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'order_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_image',
        'color',
        'price',
        'sale_price',
        'quantity',
        'total',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

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

    public function getTotalAttribute($value): float
    {
        return $this->castDecimal($value);
    }

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
