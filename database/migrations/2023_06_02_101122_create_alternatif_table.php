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
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('kode_alternatif');
            $table->string('nama_alternatif');
            $table->Integer('c1');
            $table->Integer('c2');
            $table->Integer('c3');
            $table->Integer('c4');
            $table->Integer('c5');
            $table->Integer('c6');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif');
    }
};
