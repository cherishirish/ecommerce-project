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
            'category_name' => 'apparel',
            'is_nav' => true
        ]);
        DB::table('categories')->insert([
            'category_name' => 'furniture',
            'is_nav' => true
        ]);
        DB::table('categories')->insert([
            'category_name' => 'toys',
            'is_nav' => true
        ]);
        DB::table('categories')->insert([
            'category_name' => 'bedding',
            'is_nav' => true
        ]);
        DB::table('categories')->insert([
            'category_name' => 'bathing',
            'is_nav' => true
        ]);
        DB::table('categories')->insert([
            'category_name' => 'gear',
            'is_nav' => true
        ]);
    }
}
