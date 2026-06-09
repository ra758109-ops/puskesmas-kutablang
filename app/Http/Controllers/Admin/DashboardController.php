<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poli; // 🛠️ UPDATE: Menggunakan Model Poli baru
use App\Models\Berita;
use App\Models\Pasien; 
use App\Models\Dokter;
use App\Models\Program; 

class DashboardController extends Controller
{
    public function index()
    {
        // 1. HITUNG STATISTIK UTAMA (Untuk Widget Cards di Atas)
        $totalLayanan       = Poli::count(); // 🛠️ UPDATE: Menggunakan Poli
        $totalBerita        = Berita::count();
        $totalDokter        = Dokter::count();
        $totalPasienHariIni = Pasien::whereDate('created_at', today())->count();

        // 2. AMBIL DATA TERBARU (Untuk Tabel Ringkasan & Feed)
        // Ambil data poliklinik untuk tabel ringkasan layanan
        $servicesData = Poli::latest()->take(5)->get(); // 🛠️ UPDATE: Menggunakan Poli

        // Ambil data dokter beserta relasi poli untuk tabel ringkasan staf medis
        $doktersData  = Dokter::with('poli')->latest()->take(4)->get(); // 🛠️ UPDATE: Eager load 'poli'

        // Ambil berita terbaru untuk timeline feed edukasi
        $beritaTerbaru = Berita::latest()->take(4)->get();

        // Ambil data antrian pasien HARI INI
        $pasienHariIniData = Pasien::with('dokter') 
            ->whereDate('created_at', today())
            ->orderBy('created_at', 'asc')
            ->get();

        // Ambil data program beserta aktivitasnya untuk promkes
        $programs = Program::with('activities')->get(); 

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
            'programs' 
        ));
    }
}