<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; // Tambahkan ini untuk urusan hapus file nanti

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
        // Pastikan nama file blade kamu adalah Admin/berita_create.blade.php
        // atau sesuaikan jika kamu taruh di folder Admin/berita/create.blade.php
        return view('Admin.berita_create');
    }

    // Simpan Berita ke Database
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'judul'   => 'required|max:255',
            'konten'  => 'required',
            'kategori'=> 'required',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Max 2MB
        ]);

        $namaGambar = null;

        // 2. Logika Upload Gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            // Beri nama unik: waktu_namaasli.jpg
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            
            // Simpan ke folder public/uploads/berita
            $file->move(public_path('uploads/berita'), $namaGambar);
        }

        // 3. Simpan ke Database
        Berita::create([
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul),
            'konten'   => $request->konten,
            'kategori' => $request->kategori,
            'gambar'   => $namaGambar, // Nama file yang disimpan
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan!');
    }
}