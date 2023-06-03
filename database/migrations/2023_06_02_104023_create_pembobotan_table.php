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
        Schema::create('pembobotan', function (Blueprint $table) {
            $table->id();
            // referen ke kriteria
            $table->foreignId('kriteria_id')->constrained('kriteria');
            $table->string('nama');
            $table->Integer('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembobotan');
    }
};
