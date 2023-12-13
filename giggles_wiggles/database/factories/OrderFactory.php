<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1,11),
            'subtotal' => fake()->randomFloat(2, 1, 999),
            'total' => fake()->randomFloat(2, 1, 999),
            'billing_address' => fake()->words(rand(3, 6), true),
            'shipping_address' => fake()->words(rand(3, 6), true),
            'pst' => fake()->randomFloat(2, 0, 1),
            'gst' => fake()->randomFloat(2, 0, 1),
            'status' => rand(0,1)
        ];
    }
}
