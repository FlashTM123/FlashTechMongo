<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Users;

class ProductPolicy
{
    public function viewAny(Users $users): bool { return true; }
    public function view(Users $users, Product $product): bool { return true; }
    public function create(Users $users): bool { return true; }
    public function update(Users $users, Product $product): bool { return true; }
    public function delete(Users $users, Product $product): bool { return true; }
    public function restore(Users $users, Product $product): bool { return true; }
    public function forceDelete(Users $users, Product $product): bool { return true; }
}
