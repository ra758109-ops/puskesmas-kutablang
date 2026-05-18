<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        // Data ini yang bakal tampil di halaman program.blade.php kamu
        $data_program = (object)[
            'nama' => 'Posyandu',
            'deskripsi' => 'Program Pos Pelayanan Terpadu untuk pemantauan kesehatan ibu hamil, bayi, dan balita. Kegiatan meliputi penimbangan berat badan, pengukuran tinggi badan, imunisasi, pemberian vitamin A, konseling gizi, dan pemeriksaan kesehatan ibu hamil.',
            'jadwal' => 'Rabu minggu ke-2 dan ke-4, pukul 09:00-12:00',
            'lokasi' => '12 posyandu di Balai RW seluruh kelurahan',
            'target' => '850 balita terdaftar, 285 ibu hamil'
        ];

        return view('program', compact('data_program'));
    }
}
