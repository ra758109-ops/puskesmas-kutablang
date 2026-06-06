<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Berita;
use App\Models\Pasien; 
use App\Models\Dokter;
use App\Models\Program; // 1. TAMBAHKAN INI agar program bisa dipanggil

class DashboardController extends Controller
{
    public function index()
    {
        // 1. HITUNG STATISTIK UTAMA (Untuk Widget Cards di Atas)
        $totalLayanan       = Service::count();
        $totalBerita       = Berita::count();
        $totalDokter       = Dokter::count();
        $totalPasienHariIni = Pasien::whereDate('created_at', today())->count();

        // 2. AMBIL DATA TERBARU (Untuk Tabel Ringkasan & Feed)
        // Ambil data layanan medis untuk tabel ringkasan layanan
        $servicesData = Service::latest()->take(5)->get();

        // Ambil data dokter beserta relasi layanannya untuk tabel ringkasan staf medis
        $doktersData  = Dokter::with('service')->latest()->take(4)->get();

        // Ambil berita terbaru untuk timeline feed edukasi yang sempat hilang
        $beritaTerbaru = Berita::latest()->take(4)->get();

        // Ambil data antrian pasien HARI INI tanpa memanggil relasi 'service' yang tidak ada
        $pasienHariIniData = Pasien::with('dokter') // Kita ganti dengan memuat data dokter yang valid
            ->whereDate('created_at', today())
            ->orderBy('created_at', 'asc')
            ->get();

        // --- TAMBAHAN BARU DI SINI ---
        // Ambil data program beserta aktivitasnya untuk tabel promkes baru kamu
        $programs = Program::with('activities')->get(); 
        // -----------------------------

        // 3. SATUKAN SEMUA VARIABEL KE DALAM COMPACT
        return view('Admin.dashboard', compact(
            'totalLayanan', 
            'totalBerita', 
            'totalDokter', 
            'totalPasienHariIni', 
            'servicesData', 
            'doktersData',
            'beritaTerbaru',
            'pasienHariIniData',
            'programs' // 🛠️ TAMBAHKAN INI agar data program terlempar ke Blade!
        ));
    }
}