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
        'avatar',
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

    /**
     * ⚡ AVATAR ACCESSOR - Auto format avatar URL
     * Store path: "users/abc123.jpg"
     * Display as: "/storage/users/abc123.jpg"
     */
    public function getAvatarAttribute($value)
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

    public function canAccessPanel(Panel $panel): bool
    {
        return !$this->is_blocked;
    }
}
