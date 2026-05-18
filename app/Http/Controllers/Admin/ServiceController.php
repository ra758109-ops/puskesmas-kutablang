<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data layanan dari database
        $services = Service::all();

        // 2. Jika diakses dari rute depan user (web.php -> layanan.index)
        if (request()->routeIs('layanan.index')) {
            return view('layanan', compact('services'));
        }

        // 3. Jika diakses dari sisi admin, kirim juga datanya ke kawanmu
        return view('admin.layanan.index', compact('services'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'ikon' => 'required',
            'deskripsi_singkat' => 'required',
        ]);

        Service::create([
            'nama_layanan' => $request->nama_layanan,
            'slug' => str()->slug($request->nama_layanan),
            'ikon' => $request->ikon,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'is_active' => true,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan!');
    }
}
