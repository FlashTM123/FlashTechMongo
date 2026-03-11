<?php

namespace App\Policies;

use App\Models\Users;

class UserPolicy
{
    public function viewAny(Users $user): bool { return true; }
    public function view(Users $user, Users $model): bool { return true; }
    public function create(Users $user): bool { return true; }
    public function update(Users $user, Users $model): bool { return true; }
    public function delete(Users $user, Users $model): bool { return true; }
    public function restore(Users $user, Users $model): bool { return true; }
    public function forceDelete(Users $user, Users $model): bool { return true; }
}
