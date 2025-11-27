<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Users extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $connection = 'mongodb';
    protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'role',

        'is_blocked',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',

            'is_blocked' => 'boolean',
        ];
    }
}
