<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $discountType = $this->faker->randomElement(['percentage', 'fixed']);

        return [
            'code' => strtoupper($this->faker->unique()->bothify('FLASH-####')),
            'description' => $this->faker->sentence(),
            'discount_type' => $discountType,
            'discount_value' => $discountType === 'percentage' ? $this->faker->numberBetween(5, 50) : $this->faker->numberBetween(50000, 500000),
            'max_usage' => $this->faker->randomElement([null, 100, 500, 1000]),
            'current_usage' => 0,
            'min_order_value' => $this->faker->randomElement([0, 100000, 500000]),
            'max_discount_amount' => $discountType === 'percentage' ? $this->faker->numberBetween(50000, 500000) : null,
            'valid_from' => now(),
            'valid_to' => now()->addDays($this->faker->numberBetween(7, 90)),
            'is_active' => true,
        ];
    }
}
