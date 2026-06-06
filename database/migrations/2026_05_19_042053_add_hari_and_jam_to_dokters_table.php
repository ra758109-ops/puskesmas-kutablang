<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHariAndJamToDoktersTable extends Migration
{
    public function up()
    {
        Schema::table('dokters', function (Blueprint $table) {
            // Menambahkan kolom hari dan jam setelah kolom poli_id
            $table->string('hari')->nullable()->after('poli_id');
            $table->string('jam')->nullable()->after('hari');
        });
    }

    public function down()
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->dropColumn(['hari', 'jam']);
        });
    }
}