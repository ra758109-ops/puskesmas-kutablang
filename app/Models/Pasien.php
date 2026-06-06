<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'jenis_kelamin',
        'tanggal_lahir',
        'nomor_hp',
        'alamat',
        'jenis_layanan',
        'dokter_id', 
        'keluhan',
        'nomor_antrian',
        'dokumen',
        'tanggal_daftar',
        'status' // 🚀 AMAN! Ini sudah ditambahkan agar status antrian bisa di-update oleh admin
    ];

    // Relasi ke Dokter agar admin bisa tahu siapa dokternya
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}