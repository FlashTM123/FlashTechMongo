<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Customer extends Model implements Authenticatable
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory, AuthenticatableTrait;

    protected $connection = 'mongodb';
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer_code',
        'full_name',
        'email',
        'phone_number',
        'address',
        'password',
        'date_of_birth',
        'gender',
        'profile_picture',
        'loyalty_points',
        'google_id',
        'wishlist',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'wishlist' => 'array',
    ];

    /**
     * ⚡ PROFILE PICTURE ACCESSOR - Auto format profile picture URL
     * Store path: "profile_pictures/abc123.jpg"
     * Display as: "/storage/profile_pictures/abc123.jpg"
     */
    public function getProfilePictureAttribute($value)
    {
        if (!$value) {
            return null;
        }
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }
        if (str_starts_with($value, '/storage/')) {
            return $value;
        }
        return '/storage/' . $value;
    }

    public function getProfilePictureUrlAttribute(): ?string
    {
        return $this->profile_picture;  // Use accessor above
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
