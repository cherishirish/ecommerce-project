<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('tax_rates', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('province');
        //     $table->decimal('pst', 10, 5);
        //     $table->decimal('gst', 10, 5);
        //     $table->decimal('hst', 10, 5);
        //     $table->decimal('value_added', 10, 5);
        //     $table->timestamps();
        // });

        Schema::create('tax_rates', function (Blueprint $table) {
            $table->id();
            $table->string('province');
            $table->float('pst');
            $table->float('gst');
            $table->float('hst');
            $table->float('value_added');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_rates');
    }
};
