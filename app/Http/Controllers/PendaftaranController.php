<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran');
    }

   public function store(Request $request)
{
    // 1. Validasi Ketat (NIK wajib, Dokumen maksimal 2MB)
    $request->validate([
        'nama' => 'required|string|max:255',
        'nik' => 'required|numeric|digits:16',
        'jenis_kelamin' => 'required',
        'nomor_hp' => 'required|numeric',
        'alamat' => 'required',
        'jenis_layanan' => 'required',
        'dokumen' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Max 2MB
    ]);

    // 2. Logika Nomor Antrian
    $count = \App\Models\Pasien::whereDate('created_at', date('Y-m-d'))->count();
    $no_antrian = 'A-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

    // 3. Proses Simpan File (Opsional)
    $path_dokumen = null;
    if ($request->hasFile('dokumen')) {
        // Disimpan ke folder 'pendaftarans' di storage/app/private (Aman dari publik)
        $path_dokumen = $request->file('dokumen')->store('pendaftarans');
    }

    // 4. Simpan ke Database
    \App\Models\Pasien::create([
        'nama' => $request->nama,
        'nik' => $request->nik,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_lahir' => $request->tanggal_lahir,
        'nomor_hp' => $request->nomor_hp,
        'alamat' => $request->alamat,
        'jenis_layanan' => $request->jenis_layanan,
        'keluhan' => $request->keluhan,
        'nomor_antrian' => $no_antrian,
        'dokumen' => $path_dokumen,
        'tanggal_daftar' => now(),
    ]);

// 5. Kirim data ke Session agar bisa dibaca Blade
return redirect()->back()->with([
    'sukses' => 'Pendaftaran Berhasil!',
    'antrian' => $no_antrian
]);
}

public function cekAntrian(Request $request)
{
    // Cari pasien berdasarkan NIK
    $pasien = \App\Models\Pasien::where('nik', $request->nik)->first();

    if ($pasien) {
        // Kalau ketemu, kirim balik datanya dalam bentuk JSON biar bisa tampil di modal
        return response()->json([
            'success' => true,
            'nama' => $pasien->nama,
            'nomor_antrian' => $pasien->nomor_antrian,
            'layanan' => $pasien->jenis_layanan
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Data NIK tidak ditemukan.']);
}
}
