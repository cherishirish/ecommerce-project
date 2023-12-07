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
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'Alberta'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.07', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.12', 'province' => 'British Columbia'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.07', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.12', 'province' => 'Manitoba'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'New Brunswick'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'Newfoundland and Labrador'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'Northwest Territories'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'Nova Scotia'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'Nunavut'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.13', 'value_added' => '0.13', 'province' => 'Ontario'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'Prince Edward Island'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.09975', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.14975', 'province' => 'Quebec'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.06', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.11', 'province' => 'Saskatchewan'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'Yukon'
        ]);

    }
}
