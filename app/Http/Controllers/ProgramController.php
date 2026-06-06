<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        // Statistik dari database
        $capaianImunisasi = Pasien::whereIn('jenis_layanan', ['Imunisasi', 'KIA', 'Kia/Imunisasi'])->count();

        $giziBaikBalita = Pasien::whereIn('jenis_layanan', ['Gizi', 'Anak', 'Poli Anak'])->count();

        $pesertaProlanis = Pasien::whereIn('jenis_layanan', ['Prolanis', 'Lansia', 'Poli Lansia'])->count();

        // Data program utama
        $data_program = (object)[
            'nama' => 'Posyandu',
            'deskripsi' => 'Program Pos Pelayanan Terpadu untuk pemantauan kesehatan ibu hamil, bayi, dan balita. Kegiatan meliputi penimbangan berat badan, pengukuran height badan, imunisasi, pemberian vitamin A, konseling gizi, dan pemeriksaan kesehatan ibu hamil.',
            'jadwal' => 'Rabu minggu ke-2 dan ke-4, pukul 09:00-12:00',
            'lokasi' => '12 posyandu di Balai RW seluruh kelurahan',
            'target' => '850 balita terdaftar, 285 ibu hamil'
        ];

        // Data program dari admin
        $programs = Program::latest()->get();

        return view('program', compact(
            'data_program',
            'capaianImunisasi',
            'giziBaikBalita',
            'pesertaProlanis',
            'programs'
        ));
    }
}