<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien; 
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Menampilkan halaman utama admin pasien (Kartu Mewah)
    public function index()
    {
        // Mengambil data pendaftaran dari yang paling baru mendaftar hari ini
        $pasiens = Pasien::latest()->get();

        // Melempar data ke file view admin mewah
        return view('Admin.pasien.index', compact('pasiens'));
    }

    // Melihat detail lengkap data pasien
    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('Admin.pasien.show', compact('pasien'));
    }

    // Menampilkan halaman edit data pasien
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('Admin.pasien.edit', compact('pasien'));
    }

    // Menyimpan perubahan data pasien yang diedit oleh admin
    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric|digits:16',
            'jenis_layanan' => 'required',
        ]);

        $pasien->update($request->all());

        return redirect()->route('admin.pasien.index')
                         ->with('success', 'Data pasien berhasil diperbarui!');
    }

    // Menghapus data pasien dari sistem
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('admin.pasien.index')
                         ->with('success', 'Data pasien berhasil dihapus dari sistem.');
    }
}