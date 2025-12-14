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
    ];

    protected $hidden = [
        'password',
    ];
}
