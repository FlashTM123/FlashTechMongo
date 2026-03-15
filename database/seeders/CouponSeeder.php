<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Test coupons for development
        Coupon::create([
            'code' => 'FLASH10',
            'description' => 'Giảm 10% cho tất cả sản phẩm',
            'discount_type' => 'percentage',
            'discount_value' => 10,
            'max_usage' => 100,
            'current_usage' => 0,
            'min_order_value' => 0,
            'max_discount_amount' => null,
            'valid_from' => now(),
            'valid_to' => now()->addDays(30),
            'is_active' => true,
        ]);

        Coupon::create([
            'code' => 'WELCOME100K',
            'description' => 'Giảm 100.000₫ cho đơn hàng đầu tiên',
            'discount_type' => 'fixed',
            'discount_value' => 100000,
            'max_usage' => 50,
            'current_usage' => 0,
            'min_order_value' => 500000,
            'max_discount_amount' => null,
            'valid_from' => now(),
            'valid_to' => now()->addDays(60),
            'is_active' => true,
        ]);

        Coupon::create([
            'code' => 'SUMMER20',
            'description' => 'Khuyến mãi hè - Giảm 20% giới hạn 500K',
            'discount_type' => 'percentage',
            'discount_value' => 20,
            'max_usage' => 200,
            'current_usage' => 5,
            'min_order_value' => 1000000,
            'max_discount_amount' => 500000,
            'valid_from' => now(),
            'valid_to' => now()->addDays(45),
            'is_active' => true,
        ]);

        Coupon::create([
            'code' => 'TECH30',
            'description' => 'Giảm 30% cho Laptop và điện tử',
            'discount_type' => 'percentage',
            'discount_value' => 30,
            'max_usage' => 30,
            'current_usage' => 0,
            'min_order_value' => 2000000,
            'max_discount_amount' => 1000000,
            'valid_from' => now(),
            'valid_to' => now()->addDays(15),
            'is_active' => true,
        ]);

        Coupon::create([
            'code' => 'FLASHVIP',
            'description' => 'Mã dành cho thành viên VIP - Giảm 50%',
            'discount_type' => 'percentage',
            'discount_value' => 50,
            'max_usage' => 10,
            'current_usage' => 2,
            'min_order_value' => 0,
            'max_discount_amount' => 2000000,
            'valid_from' => now(),
            'valid_to' => now()->addDays(90),
            'is_active' => true,
        ]);

        // Inactive coupon (expired)
        Coupon::create([
            'code' => 'OLDCODE',
            'description' => 'Mã cũ - đã hết hạn',
            'discount_type' => 'percentage',
            'discount_value' => 15,
            'max_usage' => null,
            'current_usage' => 150,
            'min_order_value' => 300000,
            'max_discount_amount' => null,
            'valid_from' => now()->subDays(60),
            'valid_to' => now()->subDays(10),
            'is_active' => false,
        ]);
    }
}
