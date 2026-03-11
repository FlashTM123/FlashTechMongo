<?php

namespace App\Policies;

use App\Models\Orders;
use App\Models\Users;

class OrdersPolicy
{
    public function viewAny(Users $users): bool { return true; }
    public function view(Users $users, Orders $orders): bool { return true; }
    public function create(Users $users): bool { return true; }
    public function update(Users $users, Orders $orders): bool { return true; }
    public function delete(Users $users, Orders $orders): bool { return true; }
    public function restore(Users $users, Orders $orders): bool { return true; }
    public function forceDelete(Users $users, Orders $orders): bool { return true; }
}
