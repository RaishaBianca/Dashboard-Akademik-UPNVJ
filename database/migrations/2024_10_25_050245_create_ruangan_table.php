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
        Schema::create('ruangan', function (Blueprint $table) {
            $table->string('id_ruang', 30)->primary();
            $table->string('id_gedung',10);
            $table->string('nama_ruang');
            $table->string('deskripsi');
            $table->timestamp('jam_tersedia');
            $table->int('kapasitas');

            $table->foreign('id_gedung')->references('id_gedung')->on('gedung');
        });

        Schema::create('gedung', function (Blueprint $table) {
            $table->string('id_gedung', 10)->primary();
            $table->string('nama_gedung');
            $table->string('deskripsi');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan');
        Schema::dropIfExists('gedung');
    }
};
