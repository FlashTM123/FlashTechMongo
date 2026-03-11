<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{

    use HasFactory;
    protected $connection = 'mongodb';
    protected $table = 'brands';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'logo', 'slug', 'description', 'is_active', 'website'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function ($brand) {
            $brand->slug = Str::slug($brand->name);
        });

        static::deleting(function ($brand) {
            Product::where('brand_id', $brand->id)->delete();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }

}
