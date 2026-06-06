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

    public function updateStatus($id, $status)
{
    $pasien = Pasien::findOrFail($id);
    
    // Update kolom status di database pasien
    $pasien->update([
        'status' => $status
    ]);

    return redirect()->back()->with('success', 'Status antrian pasien berhasil diperbarui menjadi ' . $status);
}

// 2. Fungsi Mengarahkan Otomatis ke WhatsApp Link API untuk Review Kepuasan
public function sendWaReview($id)
{
    $pasien = Pasien::findOrFail($id);
    
    // Normalisasi nomor HP agar berawalan kode negara 62
    $nomorHp = $pasien->nomor_hp;
    if (substr($nomorHp, 0, 1) === '0') {
        $nomorHp = '62' . substr($nomorHp, 1);
    } elseif (substr($nomorHp, 0, 2) !== '62') {
        $nomorHp = '62' . $nomorHp;
    }

    // Teks Template Pesan WhatsApp
    $pesan = "Halo Bapak/Ibu *{$pasien->nama}*,\n\nTerima kasih telah melakukan pemeriksaan kesehatan di *Puskesmas Kutablang* hari ini dengan Nomor Antrian *{$pasien->nomor_antrian}*.\n\nDemi meningkatkan kualitas pelayanan kami, mohon kesediaan Bapak/Ibu memberikan penilaian/review singkat pengalaman berobat hari ini melalui link berikut:\n👉 *[MASUKKAN_LINK_GOOGLE_FORM_ATAU_SISTEM_DI_SINI]*\n\nSehat selalu untuk Anda dan keluarga! 😊✨";

    $urlWhatsApp = "https://api.whatsapp.com/send?phone={$nomorHp}&text=" . urlencode($pesan);

    // Buka tab baru mengarah langsung ke WhatsApp Web / Aplikasi WA Pasien
    return redirect()->away($urlWhatsApp);
}
}