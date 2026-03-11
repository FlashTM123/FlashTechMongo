<?php

namespace App\Policies;

use App\Models\OrderDetails;
use App\Models\Users;

class OrderDetailsPolicy
{
    public function viewAny(Users $users): bool { return true; }
    public function view(Users $users, OrderDetails $orderDetails): bool { return true; }
    public function create(Users $users): bool { return true; }
    public function update(Users $users, OrderDetails $orderDetails): bool { return true; }
    public function delete(Users $users, OrderDetails $orderDetails): bool { return true; }
    public function restore(Users $users, OrderDetails $orderDetails): bool { return true; }
    public function forceDelete(Users $users, OrderDetails $orderDetails): bool { return true; }
}
