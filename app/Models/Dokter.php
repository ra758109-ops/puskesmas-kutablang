<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = ['nama_dokter', 'poli_id', 'foto'];

    public function poli()
    {
        // Dokter 'belongsTo' (milik) Poli
        return $this->belongsTo(Poli::class, 'poli_id');
    }
}
