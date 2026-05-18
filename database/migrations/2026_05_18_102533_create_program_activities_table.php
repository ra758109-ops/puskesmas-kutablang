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
    Schema::create('program_activities', function (Blueprint $table) {
        $table->id();
        // Menghubungkan aktivitas ke tabel program, jika program dihapus, aktivitas ikut terhapus (cascade)
        $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
        $table->string('nama_aktivitas');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_activities');
    }
};
