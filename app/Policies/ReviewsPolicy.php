<?php

namespace App\Policies;

use App\Models\Reviews;
use App\Models\Users;

class ReviewsPolicy
{
    public function viewAny(Users $users): bool { return true; }
    public function view(Users $users, Reviews $reviews): bool { return true; }
    public function create(Users $users): bool { return true; }
    public function update(Users $users, Reviews $reviews): bool { return true; }
    public function delete(Users $users, Reviews $reviews): bool { return true; }
    public function restore(Users $users, Reviews $reviews): bool { return true; }
    public function forceDelete(Users $users, Reviews $reviews): bool { return true; }
}
