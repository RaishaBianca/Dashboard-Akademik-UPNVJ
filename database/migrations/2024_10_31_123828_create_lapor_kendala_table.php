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
        Schema::create('jenis_kendala', function (Blueprint $table) {
            $table->string('id_jenis_kendala', 3)->primary();
            $table->string('nama_jenis_kendala');
        });

        Schema::create('bentuk_kendala', function (Blueprint $table) {
            $table->string('id_bentuk_kendala', 3)->primary();
            $table->string('nama_bentuk_kendala');
        });

        Schema::create('lapor_kendala', function (Blueprint $table) {
            $table->increments('id_lapor');
            $table->dateTime('tgl_lapor');
            $table->string('id_user', 30);
            $table->string('id_ruang', 10);
            $table->string('id_jenis_kendala', 3);
            $table->string('id_bentuk_kendala', 3);
            $table->string('deskripsi_kendala');
            $table->string('status');
            $table->dateTime('tgl_penyelesaian')->nullable();
            $table->string('keterangan_penyelesaian')->nullable();

            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruangan');
            $table->foreign('id_jenis_kendala')->references('id_jenis_kendala')->on('jenis_kendala');
            $table->foreign('id_bentuk_kendala')->references('id_bentuk_kendala')->on('bentuk_kendala');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapor_kendala');
        Schema::dropIfExists('bentuk_kendala');
        Schema::dropIfExists('jenis_kendala');
    }
};
