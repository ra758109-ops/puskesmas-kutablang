<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        ]);

        Berita::create([
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul),
            'konten'   => $request->konten,
            'kategori' => $request->kategori,
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
        ]);

        $berita = Berita::findOrFail($id);
        $berita->update([
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul),
            'konten'   => $request->konten,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // Menghapus Berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }

    // 🚀 BARU: Menampilkan Detail Berita Secara Publik untuk Pembaca
    public function show($slug)
    {
        // Mencari berita berdasarkan slug di database
        $berita = Berita::where('slug', $slug)->firstOrFail();
        
        // Melempar data ke view halaman detail berita publik
        return view('berita-detail', compact('berita'));
    }
}