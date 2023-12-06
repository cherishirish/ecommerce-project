<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        \App\Models\User::factory()->create([
            'last_name' => 'Admin',
            'first_name' => 'User',
            'email' => 'admin@admin.com',
            'is_admin' => '1',
            'password' => Hash::make('mypass')
        ]);
        // Create 10 users
        \App\Models\User::factory(10)->create();

        // Create 36 products
         \App\Models\Product::factory(36)->create();

        // Generate 5 images for each product
        for($i=1; $i<=36; $i++){
            $image_name1 = 'product_' . $i . '_image_01.png';
            $image_name2 = 'product_' . $i . '_image_02.png';
            $image_name3 = 'product_' . $i . '_image_03.png';
            $image_name4 = 'product_' . $i . '_image_05.png';
            $image_name5 = 'product_' . $i . '_image_05.png';
            $image_file1 = fake()->image(width: 600, height: 600, fullPath: false, dir: storage_path('app/public/images/'));
            $image_file2 = fake()->image(width: 600, height: 600, fullPath: false, dir: storage_path('app/public/images/'));
            $image_file3 = fake()->image(width: 600, height: 600, fullPath: false, dir: storage_path('app/public/images/'));
            $image_file4 = fake()->image(width: 600, height: 600, fullPath: false, dir: storage_path('app/public/images/'));
            $image_file5 = fake()->image(width: 600, height: 600, fullPath: false, dir: storage_path('app/public/images/'));
            if(PHP_OS === 'Linux'){
                Storage::disk('images')->put($image_name1, File::get($image_file1));
                Storage::disk('images')->put($image_name2, File::get($image_file2));
                Storage::disk('images')->put($image_name3, File::get($image_file3));
                Storage::disk('images')->put($image_name4, File::get($image_file4));
                Storage::disk('images')->put($image_name5, File::get($image_file5));
            }
            \App\Models\Image::factory()->create([ 'product_id' => $i, 'image' => $image_name1 ]);
            \App\Models\Image::factory()->create([ 'product_id' => $i, 'image' => $image_name2 ]);
            \App\Models\Image::factory()->create([ 'product_id' => $i, 'image' => $image_name3 ]);
            \App\Models\Image::factory()->create([ 'product_id' => $i, 'image' => $image_name4 ]);
            \App\Models\Image::factory()->create([ 'product_id' => $i, 'image' => $image_name5 ]);
        }
    }
}
