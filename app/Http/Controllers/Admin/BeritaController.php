<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // 🚀 Ditambahkan untuk fitur hapus & simpan gambar di storage

class BeritaController extends Controller
{
    // Menampilkan Berita di Dashboard Admin
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('Admin.berita', compact('beritas'));
    }

    // Menampilkan Berita di Landing Page (Masyarakat)
    public function indexPublik()
    {
        $beritas = Berita::latest()->get();
        return view('berita', compact('beritas'));
    }

    // Form Tambah Berita
    public function create()
    {
        // Mengarahkan ke file Admin/beritacreate.blade.php
        return view('Admin.beritacreate');
    }

    // Simpan Berita Baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|max:255',
            'konten'   => 'required',
            'kategori' => 'required',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // 🚀 Validasi gambar
        ]);

        $namaGambar = null;

        // 🚀 Proses upload gambar jika user memilih file
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/berita', $namaGambar); // Disimpan di storage/app/public/berita
        }

        Berita::create([
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul),
            'konten'   => $request->konten,
            'kategori' => $request->kategori,
            'gambar'   => $namaGambar, // 🚀 Simpan nama file gambar ke database
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    // Menampilkan Form Edit
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        // Mengarahkan ke file Admin/beritaedit.blade.php
        return view('Admin.beritaedit', compact('berita'));
    }

    // Memproses Perubahan Data (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'    => 'required|max:255',
            'konten'   => 'required',
            'kategori' => 'required',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // 🚀 Validasi gambar
        ]);

        $berita = Berita::findOrFail($id);
        $namaGambar = $berita->gambar; // Default pakai gambar yang lama

        // 🚀 Cek jika user mengunggah gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari file storage jika ada
            if ($berita->gambar && Storage::exists('public/berita/' . $berita->gambar)) {
                Storage::delete('public/berita/' . $berita->gambar);
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/berita', $namaGambar);
        }

        $berita->update([
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul),
            'konten'   => $request->konten,
            'kategori' => $request->kategori,
            'gambar'   => $namaGambar, // 🚀 Update nama file gambar di database
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // Menghapus Berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // 🚀 Hapus file gambar dari storage sebelum data di DB dihapus
        if ($berita->gambar && Storage::exists('public/berita/' . $berita->gambar)) {
            Storage::delete('public/berita/' . $berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }

    // Menampilkan Detail Berita Secara Publik untuk Pembaca
    public function show($slug)
    {
        // Mencari berita berdasarkan slug di database
        $berita = Berita::where('slug', $slug)->firstOrFail();
        
        // Melempar data ke view halaman detail berita publik
        return view('berita-detail', compact('berita'));
    }
}