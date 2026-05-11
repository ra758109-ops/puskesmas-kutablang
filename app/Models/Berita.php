<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Nama tabel di database (pastikan sama dengan migration)
    protected $table = 'beritas';

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'kategori'
    ];
}