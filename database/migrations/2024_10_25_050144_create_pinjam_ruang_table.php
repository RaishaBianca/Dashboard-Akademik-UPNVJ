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
        Schema::create('pinjam_ruang', function (Blueprint $table) {
            $table->increments('id_pinjam');
            $table->dateTime('tgl_pinjam');
            $table->string('id_user', 30);
            $table->string('id_ruang', 30);
            $table->timestamp('jam_mulai');
            $table->timestamp('jam_selesai');
            $table->string('keterangan');
            $table->string('status');

            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_ruang');
    }
};
