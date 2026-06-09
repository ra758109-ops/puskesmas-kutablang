<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poli;   // 🛠️ UPDATE: Pakai Model Poli
use App\Models\Dokter; // Menambahkan model Dokter agar bisa dipanggil
use Illuminate\Support\Facades\File; // 🛠️ TAMBAHAN: Untuk menghapus gambar lama

class ServiceController extends Controller
{
    public function index()
    {
        // 🛠️ UPDATE: Mengambil data dari model Poli baru
        $polis = Poli::all();
        
        // 🛠️ UPDATE: Ambil data dokter beserta relasi 'poli' yang baru
        $dokters = Dokter::with('poli')->latest()->get();

        // Mengakomodasi pengecekan dari rute depan maupun admin agar folder Admin/admin tetap aman
        if (request()->routeIs('layanan.index')) {
            return view('layanan', compact('polis'));
        }

        // 👈 Mengirimkan variabel $polis (isinya data poli) sekaligus $dokters ke view admin layanan
        return view('Admin.layanan.index', compact('polis', 'dokters'));
    }

    public function create()
    {
        return view('Admin.layanan.create');
    }

    public function store(Request $request)
    {
        // 🛠️ UPDATE: Validasi ikon harus berupa file Gambar
        $request->validate([
            'nama_poli' => 'required',
            'ikon' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048', // Maks 2MB
            'deskripsi' => 'required',
        ]);

        $nama_file = null;
        if ($request->hasFile('ikon')) {
            $file = $request->file('ikon');
            // Membuat nama file unik berdasarkan waktu dan slug nama poli
            $nama_file = time() . '_' . \Illuminate\Support\Str::slug($request->nama_poli) . '.' . $file->getClientOriginalExtension();
            // Simpan ke folder public/uploads/layanan
            $file->move(public_path('uploads/layanan'), $nama_file);
        }

        // 🛠️ UPDATE: Simpan ke tabel polis lewat model Poli
        Poli::create([
            'nama_poli' => $request->nama_poli,
            'slug' => \Illuminate\Support\Str::slug($request->nama_poli),
            'ikon' => $nama_file, // Simpan nama file gambar
            'deskripsi' => $request->deskripsi,
            'is_active' => true,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Poli layanan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // 🛠️ UPDATE: Mencari data berdasarkan Model Poli
        $service = Poli::findOrFail($id);
        return view('Admin.layanan.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // 🛠️ UPDATE: Validasi gambar opsional saat melakukan update
        $request->validate([
            'nama_poli' => 'required',
            'ikon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'deskripsi' => 'required',
        ]);

        $service = Poli::findOrFail($id);
        $nama_file = $service->ikon; // Ambil nama file lama sebagai default

        if ($request->hasFile('ikon')) {
            // Hapus file foto lama di server jika ada fisik filenya
            if ($service->ikon && File::exists(public_path('uploads/layanan/' . $service->ikon))) {
                File::delete(public_path('uploads/layanan/' . $service->ikon));
            }

            $file = $request->file('ikon');
            $nama_file = time() . '_' . \Illuminate\Support\Str::slug($request->nama_poli) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/layanan'), $nama_file);
        }

        $service->update([
            'nama_poli' => $request->nama_poli,
            'slug' => \Illuminate\Support\Str::slug($request->nama_poli),
            'ikon' => $nama_file,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Poli layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // 🛠️ UPDATE: Hapus data beserta file gambarnya dari server
        $service = Poli::findOrFail($id);
        
        if ($service->ikon && File::exists(public_path('uploads/layanan/' . $service->ikon))) {
            File::delete(public_path('uploads/layanan/' . $service->ikon));
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('with', 'Poli layanan berhasil dihapus!');
    }

    public function landing()
    {
        // 🛠️ UPDATE: Halaman depan/landing page
        $polis = Poli::where('is_active', true)->get();
        return view('layanan', compact('polis'));
    }
}