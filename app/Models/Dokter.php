<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    // Tambahkan 'is_aktif' ke fillable agar bisa dimanipulasi statusnya
    protected $fillable = ['nama_dokter', 'poli_id', 'hari', 'jam', 'foto', 'is_aktif'];

    public function poli()
    {
        // Dokter 'belongsTo' (milik) Poli
        return $this->belongsTo(Poli::class, 'poli_id');
    }

    /**
     * Jembatan Penyelamat: Hubungkan panggilan 'service' ke tabel Poli
     * Ini dipasang agar kode $dokter->service di halaman view/blade tidak eror
     */
    public function service()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }
}



