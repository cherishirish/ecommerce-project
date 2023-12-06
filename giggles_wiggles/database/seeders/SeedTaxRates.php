<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedTaxRates extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'Alberta', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.07', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.12', 'province' => 'British Columbia', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.07', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.12', 'province' => 'Manitoba', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'New Brunswick', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'Newfoundland and Labrador', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'Northwest Territories', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'Nova Scotia', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'Nunavut', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.13', 'value_added' => '0.13', 'province' => 'Ontario', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'Prince Edward Island', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.09975', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.14975', 'province' => 'Quebec', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.06', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.11', 'province' => 'Saskatchewan', 'created_at' => now()
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'Yukon', 'created_at' => now()
        ]);

    }
}
