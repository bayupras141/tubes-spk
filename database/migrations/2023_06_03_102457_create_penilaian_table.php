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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            // referen ke kriteria
            $table->foreignId('kriteria_id')->constrained('kriteria');
            $table->foreignId('alternatif_id')->constrained('alternatif');
            $table->Integer('C1');
            $table->Integer('C2');
            $table->Integer('C3');
            $table->Integer('C4');
            $table->Integer('C5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
