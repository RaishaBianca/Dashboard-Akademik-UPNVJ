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
        Schema::create('gedung', function (Blueprint $table) {
            $table->string('id_gedung', 10)->primary();
            $table->string('nama_gedung');
            $table->string('deskripsi');
        });

        Schema::create('ruangan', function (Blueprint $table) {
            $table->string('id_ruang', 10)->primary();
            $table->string('id_gedung',10);
            $table->string('tipe_ruang');//lab , kelas
            $table->string('nama_ruang');
            $table->string('deskripsi');
            $table->time('jam_buka'); 
            $table->time('jam_tutup');
            $table->integer('kapasitas');

            $table->foreign('id_gedung')->references('id_gedung')->on('gedung');
        });

        Schema::create('pinjam_ruang', function (Blueprint $table) {
            $table->increments('id_pinjam');
            $table->date('tgl_pinjam'); //consider making this a date instead 
            $table->string('id_user', 30);
            $table->string('id_ruang', 10);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('keterangan');
            $table->string('status');
            $table->integer('jumlah_orang');

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_ruang');
        Schema::dropIfExists('ruangan');
        Schema::dropIfExists('gedung');
    }
};
