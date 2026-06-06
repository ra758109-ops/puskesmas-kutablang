<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Mendaftarkan kolom agar bisa diisi oleh ReviewController
    protected $fillable = [
        'pendaftaran_id',
        'rating',
        'komentar'
    ];

    /**
     * Nilai Tambah: Relasi balik ke model Pasien (Pendaftaran)
     * Berguna banget nanti kalau Admin mau menampilkan nama pasien di dashboard review!
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pendaftaran_id');
    }
}
