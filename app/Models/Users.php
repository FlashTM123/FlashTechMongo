<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class Users extends Model implements \Illuminate\Contracts\Auth\Authenticatable, FilamentUser
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

    public function canAccessPanel(Panel $panel): bool
    {
        return !$this->is_blocked;
    }
}
