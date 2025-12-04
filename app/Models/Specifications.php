<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specifications extends Model
{
    /** @use HasFactory<\Database\Factories\SpecificationsFactory> */
    use HasFactory;
    protected $connection = 'mongodb';
    protected $table = 'specifications';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'key',
        'label',
        'value',
        'unit',
        'order',
    ];
    protected $casts = [
        'order' => 'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getDisplayValueAttribute(): string
    {
        return $this->unit ? "{$this->value} {$this->unit}" : $this->value;
    }
}
