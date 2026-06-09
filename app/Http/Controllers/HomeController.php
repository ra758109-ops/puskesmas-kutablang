<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\Service;
use App\Models\Program;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil semua poli untuk Section LAYANAN
        $polis = Poli::all();

        // 2. Ambil data Service/Poli yang aktif (Maksimal 4 untuk beranda)
        $services = Service::take(4)->get();

        // 3. Ambil dokter terbaru beserta relasi poli-nya (Maksimal 8) untuk Section DOKTER
        $dokters = Dokter::with('poli')->latest()->take(8)->get();

        // 4. Ambil data program asli dari database
        $programs = Program::latest()->take(3)->get();

        // 5. AMBIL DATA BERITA TERBARU (Maksimal 3 artikel)
        $beritas = Berita::latest()->take(3)->get();

        // Kirim seluruh variabel termasuk $beritas ke view beranda
        return view('beranda', compact('dokters', 'polis', 'services', 'programs', 'beritas'));
    }

    // ==========================================
    // FUNGSI UNTUK HALAMAN JADWAL USER PUBLIK
    // ==========================================
    public function jadwal()
    {
        $dokters = Dokter::with('poli')->get();
        return view('jadwal', compact('dokters'));
    }
}
