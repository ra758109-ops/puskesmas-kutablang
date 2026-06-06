<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('pasiens', function (Blueprint $table) {
        $table->unsignedBigInteger('dokter_id')->nullable()->after('jenis_layanan');
    });
}

public function down(): void
{
    Schema::table('pasiens', function (Blueprint $table) {
        $table->dropColumn('dokter_id');
    });
}
};
