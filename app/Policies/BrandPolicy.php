<?php

namespace App\Policies;

use App\Models\Brand;
use App\Models\Users;
use Illuminate\Auth\Access\Response;

class BrandPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Users $users): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Users $users, Brand $brand): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Users $users): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Users $users, Brand $brand): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Users $users, Brand $brand): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Users $users, Brand $brand): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Users $users, Brand $brand): bool
    {
        return false;
    }
}
