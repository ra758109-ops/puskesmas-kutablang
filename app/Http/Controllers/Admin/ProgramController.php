<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramActivity;
use Illuminate\Http\Request;

class ProgramController extends Controller
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
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'label_waktu'  => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'aktivitas'    => 'required|array',
        ]);

        // 1. Simpan data program utama
        $program = Program::create([
            'nama_program' => $request->nama_program,
            'label_waktu'  => $request->label_waktu,
            'deskripsi'    => $request->deskripsi,
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
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'label_waktu'  => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'aktivitas'    => 'required|array',
        ]);

        $program = Program::findOrFail($id);
        
        // Update data program utama
        $program->update([
            'nama_program' => $request->nama_program,
            'label_waktu'  => $request->label_waktu,
            'deskripsi'    => $request->deskripsi,
        ]);

        // Hapus dulu aktivitas lama, lalu isi dengan yang baru (cara paling bersih)
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
        $program->delete(); // Otomatis menghapus aktivitas terkait karena setting cascade di migration

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil dihapus!');
    }
}