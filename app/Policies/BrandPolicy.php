<?php

namespace App\Policies;

use App\Models\Brand;
use App\Models\Users;

class BrandPolicy
{
    public function viewAny(Users $users): bool { return true; }
    public function view(Users $users, Brand $brand): bool { return true; }
    public function create(Users $users): bool { return true; }
    public function update(Users $users, Brand $brand): bool { return true; }
    public function delete(Users $users, Brand $brand): bool { return true; }
    public function restore(Users $users, Brand $brand): bool { return true; }
    public function forceDelete(Users $users, Brand $brand): bool { return true; }
}
