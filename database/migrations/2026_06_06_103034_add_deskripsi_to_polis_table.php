<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('polis', function (Blueprint $blueprint) {
            // Menambahkan kolom deskripsi (gunakan text karena isinya panjang)
            $blueprint->text('deskripsi')->nullable()->after('nama_poli'); 
        });
    }

    public function down(): void
    {
        Schema::table('polis', function (Blueprint $blueprint) {
            $blueprint->dropColumn('deskripsi');
        });
    }
};