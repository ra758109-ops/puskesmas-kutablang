<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('nik'); // Tempat menyimpan NIK user
            $table->integer('rating'); // Tempat menyimpan angka bintang (1-5)
            $table->text('komentar')->nullable(); // Tempat menyimpan isi ulasan (boleh kosong)
            $table->timestamps(); // Otomatis mencatat tanggal & jam masuk ulasan
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};