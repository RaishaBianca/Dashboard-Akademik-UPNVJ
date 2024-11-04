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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('id_mk', 10)->primary();
            $table->string('nama_mk');
            $table->integer('sks');
        });

        Schema::create('jadwal_mk', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->string('id_mk', 10);
            $table->string('id_ruang', 10);
            $table->string('id_dosen', 30);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('hari');

            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruangan');
            $table->foreign('id_dosen')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
        Schema::dropIfExists('jadwal_mk');
    }
};
