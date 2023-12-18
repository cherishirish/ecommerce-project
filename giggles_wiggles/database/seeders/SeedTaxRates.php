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
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'AB'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.07', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.12', 'province' => 'BC'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.07', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.12', 'province' => 'MB'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'NB'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'NL'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'NT'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'NS'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'NU'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.13', 'value_added' => '0.13', 'province' => 'ON'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.00', 'hst' => '0.15', 'value_added' => '0.15', 'province' => 'PE'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.09975', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.14975', 'province' => 'QC'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.06', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.11', 'province' => 'SK'
        ]);
        DB::table('tax_rates')->insert([
            'pst' => '0.00', 'gst' => '0.05', 'hst' => '0.00', 'value_added' => '0.05', 'province' => 'YT'
        ]);

    }
}
