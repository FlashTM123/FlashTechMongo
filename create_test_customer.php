<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Customer;

$customer = Customer::create([
    'customer_code' => 'KH' . date('Ymd') . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT),
    'full_name' => 'Test User',
    'email' => 'testuser@test.com',
    'password' => bcrypt('password123'),
    'loyalty_points' => 0,
]);

echo "Customer created: " . $customer->email . " with password 'password123'\n";
