<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            ['customer_code' => 'CUS000012',
                'full_name' => 'Bùi Thị Ngu',
                'email' => 'buithingu@example.com',
                'phone_number' => '0290123456',
                'address' => '852 Nam Kỳ Khởi Nghĩa',
                'ward' => 'Phường 14',
                'district' => 'Quận 3',
                'city' => 'TP. Hồ Chí Minh',
                'date_of_birth' => '1994-12-05',
                'gender' => 'female',
                'customer_type' => 'individual',
                'membership_tier' => 'silver',
                'status' => 'active',
                'loyalty_points' => 1450,
                'total_orders' => 28,
                'total_spent' => 9200000,
                'is_verified' => true,
        ],
        ];

        foreach ($customers as $customer) {
            \App\Models\Customer::create($customer);
        }
    }
}
