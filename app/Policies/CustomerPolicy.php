<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\Users;

class CustomerPolicy
{
    public function viewAny(Users $users): bool { return true; }
    public function view(Users $users, Customer $customer): bool { return true; }
    public function create(Users $users): bool { return true; }
    public function update(Users $users, Customer $customer): bool { return true; }
    public function delete(Users $users, Customer $customer): bool { return true; }
    public function restore(Users $users, Customer $customer): bool { return true; }
    public function forceDelete(Users $users, Customer $customer): bool { return true; }
}
