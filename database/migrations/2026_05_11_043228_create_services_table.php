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
    Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('nama_layanan');
        $table->string('slug'); // untuk URL (misal: poli-kia)
        $table->string('ikon'); // untuk simpan class fontawesome (misal: fas fa-baby)
        $table->text('deskripsi_singkat');
        $table->longText('konten_detail')->nullable(); // isi halaman detail
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

