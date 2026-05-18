<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Poli;

class PendaftaranController extends Controller
{
    public function index()
    {
        $polis = Poli::all();
        return view('pendaftaran', compact('polis'));
    }

    public function store(Request $request)
    {
        // 1. Validasi (Nama field disesuaikan dengan input di Blade)
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric|digits:16',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required|numeric',
            'alamat' => 'required',
            'poli_id' => 'required', // Mengikuti name="poli_id" di Blade
            'dokter_id' => 'required',
            'tanggal_lahir' => 'required|date',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // 2. Logika Nomor Antrian
        $count = Pasien::whereDate('created_at', date('Y-m-d'))->count();
        $no_antrian = 'A-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        // 3. Cari Nama Poli berdasarkan ID untuk disimpan ke kolom 'jenis_layanan'
        $poli = Poli::find($request->poli_id);

        // 4. Proses Simpan File
        $path_dokumen = null;
        if ($request->hasFile('dokumen')) {
            $path_dokumen = $request->file('dokumen')->store('pendaftarans');
        }

        // 5. Simpan ke Database
        Pasien::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'jenis_layanan' => $poli->nama_poli, // Nama poli asli masuk ke sini
            'keluhan' => $request->keluhan,
            'nomor_antrian' => $no_antrian,
            'dokumen' => $path_dokumen,
            'tanggal_daftar' => now(),
        ]);

        return redirect()->back()->with([
            'sukses' => 'Pendaftaran Berhasil!',
            'antrian' => $no_antrian
        ]);
    }

    public function cekAntrian(Request $request)
    {
        $pasien = Pasien::where('nik', $request->nik)->first();
        if ($pasien) {
            return response()->json([
                'success' => true,
                'nama' => $pasien->nama,
                'nomor_antrian' => $pasien->nomor_antrian,
                'layanan' => $pasien->jenis_layanan
            ]);
        }
        return response()->json(['success' => false, 'message' => 'Data NIK tidak ditemukan.']);
    }

    public function getDokter($poli_id)
    {
        $dokters = Dokter::where('poli_id', $poli_id)->get();
        return response()->json($dokters);
    }
}
