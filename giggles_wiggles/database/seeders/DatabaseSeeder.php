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

        // Create 30 products
        // \App\Models\Product::factory()->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
