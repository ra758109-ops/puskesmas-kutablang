<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Berita;
use App\Models\Pasien; // 🛠️ PERBAIKAN 1: Menambahkan titik koma (;) yang kurang

class DashboardController extends Controller
{
    public function index()
    {
        $totalLayanan = Service::count();
        $totalBerita = Berita::count();

        // 🛠️ PERBAIKAN 2: Mengaktifkan perhitungan data pasien asli yang mendaftar HARI INI
        $totalPasienHariIni = Pasien::whereDate('created_at', today())->count();

        // Mengambil data layanan medis untuk tabel
        $services = Service::latest()->take(3)->get();

        // Mengambil berita terbaru untuk timeline feed
        $beritaTerbaru = Berita::latest()->take(4)->get();

        // 🛠️ PERBAIKAN 3: Memasukkan 'totalPasienHariIni' ke dalam compact agar bisa dibaca oleh file Blade
        return view('Admin.dashboard', compact(
            'totalLayanan', 
            'totalBerita', 
            'totalPasienHariIni', 
            'services', 
            'beritaTerbaru'
        ));
    }
}