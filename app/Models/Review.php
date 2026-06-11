<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'pendaftaran_id',
        'nik',
        'rating',
        'komentar',
    ];

    /**
     * Relasi ke tabel pasien
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pendaftaran_id');
    }
}