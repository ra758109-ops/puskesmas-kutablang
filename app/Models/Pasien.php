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
        'keluhan',
        'nomor_antrian',
        'dokumen',
        'tanggal_daftar'
    ];
}
