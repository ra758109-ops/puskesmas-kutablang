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
        // 1. VALIDASI DATA INPUT (Rapat & Keluhan sudah masuk)
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric|digits:16',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required|numeric',
            'alamat' => 'required|string',
            'poli_id' => 'required|exists:polis,id', 
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_lahir' => 'required|date',
            'keluhan' => 'required|string', // 🚀 FIX: Mencegah error database kosong
            'dokumen' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // 2. Cari Nama Poli berdasarkan ID
        $poli = Poli::find($request->poli_id);

        // 3. LOGIKA NOMOR ANTRIAN DINAMIS (Contoh: Gigi = G-001, Anak = A-001)
        $prefix = strtoupper(substr($poli->nama_poli, 0, 1)); 

        $count = Pasien::where('jenis_layanan', $poli->nama_poli)
                       ->whereDate('created_at', date('Y-m-d'))
                       ->count();
                       
        $no_antrian = $prefix . '-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        // 4. Proses Simpan File Dokumen
        $path_dokumen = null;
        if ($request->hasFile('dokumen')) {
            $path_dokumen = $request->file('dokumen')->store('pendaftarans', 'public');
        }

        // 5. Simpan ke Database Pasien
        Pasien::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'jenis_layanan' => $poli->nama_poli,
            'dokter_id' => $request->dokter_id, 
            'keluhan' => $request->keluhan,
            'nomor_antrian' => $no_antrian,
            'dokumen' => $path_dokumen,
            'tanggal_daftar' => now(),
            'status' => 'Mengantri' 
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
            // 🚀 FIX: Sekarang data dokumen dan status ikut dikirim agar JavaScript tidak bingung
            return response()->json([
                'success' => true,
                'nama' => $pasien->nama,
                'nomor_antrian' => $pasien->nomor_antrian,
                'layanan' => $pasien->jenis_layanan,
                'dokumen' => $pasien->dokumen, // Dibaca JS untuk cek file berkas
                'status' => $pasien->status    // Dibaca JS untuk cek status Selesai/Mengantri
            ]);
        }
        
        return response()->json(['success' => false, 'message' => 'Data NIK tidak ditemukan.']);
    }

    public function getDokter($poli_id)
    {
        $dokters = Dokter::where('poli_id', $poli_id)
                         ->where('is_aktif', 1) 
                         ->get();
                         
        return response()->json($dokters);
    }
}