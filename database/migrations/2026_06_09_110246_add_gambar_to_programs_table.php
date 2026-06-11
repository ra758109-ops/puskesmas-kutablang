<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('programs', function (Blueprint $table) {
        // Menambahkan kolom gambar setelah kolom deskripsi
        $table->string('gambar')->nullable()->after('deskripsi');
    });
}

public function down()
{
    Schema::table('programs', function (Blueprint $table) {
        $table->dropColumn('gambar');
    });
}
};