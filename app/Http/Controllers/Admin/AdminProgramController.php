<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Tambahkan ini untuk manajemen hapus file fisik

class AdminProgramController extends Controller
{
    public function index()
    {
        // Ambil data program beserta aktivitasnya dari database
        $programs = Program::with('activities')->latest()->get();
        return view('Admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('Admin.program.create');
    }

    public function store(Request $request)
    {
        // 🚀 Perbaikan: Menambahkan validasi gambar (maksimal 2MB)
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'label_waktu'  => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'aktivitas'    => 'required|array',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Proses Upload Gambar jika ada file yang dimasukkan
        $nama_gambar = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            // Membuat nama file unik, misal: 17182938_program.jpg
            $nama_gambar = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            // Pindahkan file fisik ke folder public/uploads/program
            $file->move(public_path('uploads/program'), $nama_gambar);
        }

        // 1. Simpan data program utama (termasuk kolom gambar)
        $program = Program::create([
            'nama_program' => $request->nama_program,
            'label_waktu'  => $request->label_waktu,
            'deskripsi'    => $request->deskripsi,
            'gambar'       => $nama_gambar, // 🚀 Simpan nama file gambar ke DB
        ]);

        // 2. Simpan list aktivitas utamanya
        foreach ($request->aktivitas as $nama_aktivitas) {
            if (!empty($nama_aktivitas)) {
                $program->activities()->create([
                    'nama_aktivitas' => $nama_aktivitas
                ]);
            }
        }

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $program = Program::with('activities')->findOrFail($id);
        return view('Admin.program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        // 🚀 Perbaikan: Validasi gambar pada fungsi update
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'label_waktu'  => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'aktivitas'    => 'required|array',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $program = Program::findOrFail($id);
        
        // Ambil nama gambar lama sebagai default jika tidak ganti gambar
        $nama_gambar = $program->gambar;

        // Jika user mengunggah gambar baru
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_gambar = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/program'), $nama_gambar);

            // Hapus file gambar lama dari server agar tidak membeludak (jika file lamanya ada)
            $gambar_lama = public_path('uploads/program/' . $program->gambar);
            if ($program->gambar && File::exists($gambar_lama)) {
                File::delete($gambar_lama);
            }
        }

        // Update data program utama
        $program->update([
            'nama_program' => $request->nama_program,
            'label_waktu'  => $request->label_waktu,
            'deskripsi'    => $request->deskripsi,
            'gambar'       => $nama_gambar, // 🚀 Update data gambar di DB
        ]);

        // Hapus dulu aktivitas lama, lalu isi dengan yang baru
        $program->activities()->delete();
        foreach ($request->aktivitas as $nama_aktivitas) {
            if (!empty($nama_aktivitas)) {
                $program->activities()->create([
                    'nama_aktivitas' => $nama_aktivitas
                ]);
            }
        }

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        // 🚀 Hapus file fisik gambar dari server saat data dihapus
        $path_gambar = public_path('uploads/program/' . $program->gambar);
        if ($program->gambar && File::exists($path_gambar)) {
            File::delete($path_gambar);
        }

        $program->delete(); 

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil dihapus!');
    }
}