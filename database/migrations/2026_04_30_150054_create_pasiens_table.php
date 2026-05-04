<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('pasiens', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nik');
        $table->string('jenis_kelamin');
        $table->date('tanggal_lahir');
        $table->string('nomor_hp');
        $table->text('alamat');
        $table->string('jenis_layanan');
        $table->text('keluhan')->nullable();
        $table->string('nomor_antrian');
        $table->string('dokumen')->nullable(); // Simpan path dokumen jika ada
        $table->date('tanggal_daftar');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
