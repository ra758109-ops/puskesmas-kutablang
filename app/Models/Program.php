<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['nama_program', 'label_waktu', 'deskripsi'];

    // Relasi ke tabel aktivitas (One to Many)
    public function activities()
    {
        return $this->hasMany(ProgramActivity::class, 'program_id');
    }
}