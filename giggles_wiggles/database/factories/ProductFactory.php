<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'product_name' => trim(fake()->sentence(), '.'),
            // 'category_id' => rand(1,6),
            // 'price' => fake()->randomFloat(2, 1, 999),   // between 1 to 999 with 2 decimal places
            // 'description' => fake()->paragraph(5),
            // 'availability' => fake()->randomElement(['0', '1']),
            // 'quantity' => rand(0,100000),
            // 'gender' => fake()->randomElement(['M', 'F', 'G']),
        ];
    }
}
