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
        Schema::create('admin', function (Blueprint $table) {
            $table->string('id_admin',30)->primary();
            $table->string('nama');
            $table->string('no_tlp', 20);
            $table->string('email')->unique();
            $table->string('password');
            $table->int('id_peran');
            $table->string('remember_token', 100)->nullable();
            $table->dateTime('dibuat_pada');
            $table->dateTime('dimodif_pada');

            $table->foreign('id_peran')->references('id_peran')->on('peran_admin');
        });

        Schema::create('peran_admin', function (Blueprint $table) {
            $table->integer('id_peran')->primary(); 
            $table->string('nama_peran');
            $table->string('deskripsi_peran');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
        Schema::dropIfExists('peran_admin');
    }
};
