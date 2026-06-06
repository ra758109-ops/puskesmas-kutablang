<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        // --- 1. HITUNG DATA DINAMIS MURNI RIIL DARI DATABASE ---

        // 1. Capaian Imunisasi (Murni jumlah pasien yang terdaftar di database)
        $capaianImunisasi = Pasien::whereIn('jenis_layanan', ['Imunisasi', 'KIA', 'Kia/Imunisasi'])->count();

        // 2. Gizi Baik Balita (Murni jumlah pasien anak/gizi yang terdaftar)
        $giziBaikBalita = Pasien::whereIn('jenis_layanan', ['Gizi', 'Anak', 'Poli Anak'])->count();

        // 3. Peserta Prolanis (Murni jumlah pasien prolanis/lansia)
        $pesertaProlanis = Pasien::whereIn('jenis_layanan', ['Prolanis', 'Lansia', 'Poli Lansia'])->count();


        // --- 2. DATA BAWAAN KAMU SEBELUMNYA ---
        $data_program = (object)[
            'nama' => 'Posyandu',
            'deskripsi' => 'Program Pos Pelayanan Terpadu untuk pemantauan kesehatan ibu hamil, bayi, dan balita. Kegiatan meliputi penimbangan berat badan, pengukuran height badan, imunisasi, pemberian vitamin A, konseling gizi, dan pemeriksaan kesehatan ibu hamil.',
            'jadwal' => 'Rabu minggu ke-2 dan ke-4, pukul 09:00-12:00',
            'lokasi' => '12 posyandu di Balai RW seluruh kelurahan',
            'target' => '850 balita terdaftar, 285 ibu hamil'
        ];

        // Ambil data untuk @forelse ($programs) di bagian bawah blade
        $programs = Program::latest()->get();

        return view('program', compact('data_program', 'capaianImunisasi', 'giziBaikBalita', 'pesertaProlanis', 'programs'));
    }
}
