<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Poli;
// use App\Models\Program; // Aktifkan kalau nanti sudah buat model Program

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil semua poli untuk Section LAYANAN
        $polis = Poli::all();

        // 2. Ambil dokter (maksimal 8) untuk Section DOKTER
        $dokters = Dokter::with('poli')->take(8)->get();

        // 3. Data Dummy untuk Section PROGRAM (Biar dinamis tanpa ribet buat tabel dulu)
        $programs = collect([
            (object)[
                'judul' => 'Posyandu Lansia Serentak',
                'deskripsi' => 'Pemeriksaan kesehatan gratis dan pemberian nutrisi tambahan bagi lansia di wilayah Kutablang.',
                'gambar' => 'images/program1.jpg', // Pastikan gambar ada atau ganti link url
                'created_at' => now()
            ],
            (object)[
                'judul' => 'Sosialisasi Pencegahan Stunting',
                'deskripsi' => 'Edukasi pola asuh dan gizi seimbang untuk ibu hamil dan menyusui di balai desa.',
                'gambar' => 'images/program2.jpg',
                'created_at' => now()
            ],
            (object)[
                'judul' => 'Layanan Vaksinasi Booster',
                'deskripsi' => 'Penyediaan stok vaksin lengkap untuk meningkatkan imunitas masyarakat Kutablang.',
                'gambar' => 'images/program3.jpg',
                'created_at' => now()
            ]
        ]);

        // Cukup satu return saja yang mengarah ke beranda
        return view('beranda', compact('dokters', 'polis', 'programs'));
    }
}
