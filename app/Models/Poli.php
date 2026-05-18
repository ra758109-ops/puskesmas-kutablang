<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $fillable = ['nama_poli', 'deskripsi']; // Tambahkan deskripsi jika ada di database

    public function dokters()
    {
        return $this->hasMany(Dokter::class, 'poli_id');
    }
}
