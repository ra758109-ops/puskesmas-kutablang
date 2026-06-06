<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    // 🛠️ SEBELUMNYA: ['nama_program', 'label_waktu', 'deskripsi']
    protected $fillable = ['nama_program', 'label_waktu', 'deskripsi', 'gambar'];

    // Relasi ke tabel aktivitas (One to Many)
    public function activities()
    {
        // Pastikan foreign key merujuk ke id tabel program
        return $this->hasMany(ProgramActivity::class, 'program_id');
    }
}