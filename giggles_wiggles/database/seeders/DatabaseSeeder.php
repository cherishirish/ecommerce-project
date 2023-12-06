<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([ SeedCategories::class ]);
        $this->call([ SeedTaxRates::class ]);

        // Create Admin 
        \App\Models\Customer::factory()->create([
            'last_name' => 'Admin',
            'first_name' => 'User',
            'email' => 'admin@admin.com',
            'is_admin' => '1',
            'password' => Hash::make('mypass')
        ]);
        // Create 10 customers
        \App\Models\Customer::factory(10)->create();

        // Create 36 products
         \App\Models\Product::factory(36)->create();

        // Generate 3 images for each product
        for($i=1; $i<=36; $i++){
            \App\Models\Image::factory()->create([
                'product_id' => $i,
                'image' => fake()->image(
                    width: 600, height: 600, dir: storage_path('app/public/images/'), 
                    fullPath: false),
            ]);
            \App\Models\Image::factory()->create([
                'product_id' => $i,
                'image' => fake()->image(
                    width: 600, height: 600, dir: storage_path('app/public/images/'), 
                    fullPath: false),
            ]);
            \App\Models\Image::factory()->create([
                'product_id' => $i,
                'image' => fake()->image(
                    width: 600, height: 600, dir: storage_path('app/public/images/'), 
                    fullPath: false),
            ]);
        }
    }
}
