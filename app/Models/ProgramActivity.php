<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'nama_aktivitas',
    ];

    /**
     * Relasi balik ke model Program
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}