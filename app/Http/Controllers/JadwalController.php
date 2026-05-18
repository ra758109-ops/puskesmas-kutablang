<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        // Ambil semua 6 data nakes beserta relasi polinya tanpa filter query sama sekali
        $dokters = Dokter::with('poli')->get();

        // Kirim data ke view jadwal
        return view('jadwal', compact('dokters'));
    }
}
