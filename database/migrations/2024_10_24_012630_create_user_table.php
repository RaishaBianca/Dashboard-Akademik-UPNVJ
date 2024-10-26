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
        Schema::create('peran_user', function (Blueprint $table) {
            $table->integer('id_peran')->primary(); 
            $table->string('nama_peran');
            $table->string('deskripsi_peran');
        });

        Schema::create('user', function (Blueprint $table) {
            $table->string('id_user', 30)->primary();
            $table->string('nama');
            $table->string('no_tlp', 20);
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('id_peran'); 
            $table->string('prodi', 30);
            $table->string('remember_token', 100)->nullable();
            $table->dateTime('dibuat_pada');
            $table->dateTime('dimodif_pada');
            $table->foreign('id_peran')->references('id_peran')->on('peran_user');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('dibuat_pada')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('id_user')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('peran_user');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};