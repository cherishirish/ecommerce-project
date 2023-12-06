<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedCategories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'category_name' => 'apparel'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'furniture'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'toys'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'bedding'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'bathing'
        ]);
        DB::table('categories')->insert([
            'category_name' => 'gear'
        ]);
    }
}
