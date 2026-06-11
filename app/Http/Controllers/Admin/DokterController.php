<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poli; 
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    // 1. HALAMAN DAFTAR TIM MEDIS / JADWAL DOKTER
    public function index()
    {
        // Memuat relasi 'service' (jembatan ke Poli) agar pas dengan panggilah di Blade kamu
        $dokters = Dokter::with('service')->get();
        
        // Mengarah ke file index.blade.php di folder resources/views/Admin/dokter/
        return view('Admin.dokter.index', compact('dokters'));
    }

    // 2. HALAMAN FORM TAMBAH JADWAL
    public function create()
    {
        $polis = Poli::all(); 
        return view('Admin.dokter.create', compact('polis')); 
    }

    // 3. PROSES SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'poli_id'     => 'required|exists:polis,id', 
            'hari'        => 'required|string',
            'jam'         => 'required|string',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'nama_dokter' => $request->nama_dokter,
            'poli_id'     => $request->poli_id, 
            'hari'        => $request->hari,
            'jam'         => $request->jam,
            'is_aktif'    => true, // Menggunakan is_aktif agar sinkron dengan tombol toggle
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/dokter'), $nama_foto);
            $data['foto'] = $nama_foto;
        }

        Dokter::create($data);

        return redirect()->route('admin.dokter.index')->with('success', 'Jadwal dokter berhasil ditambahkan!');
    }

    // 4. TOGGLE STATUS AKTIF / NONAKTIF
    public function toggleStatus($id)
    {
        $dokter = Dokter::findOrFail($id);
        
        // Balikkan statusnya (Jika 1 jadi 0, jika 0 jadi 1)
        $dokter->is_aktif = !$dokter->is_aktif;
        $dokter->save();

        return redirect()->back()->with('success', 'Status aktifasi staf medis berhasil diperbarui!');
    }
    public function edit($id)
    {
        // Mencari data dokter, jika tidak ketemu langsung memunculkan error 404
        $dokter = Dokter::findOrFail($id);
        
        // Ambil data poli jika form edit dokter membutuhkan pilihan Poliklinik
        $polis = Poli::all(); 

        // Mengarahkan ke file blade admin/dokteredit.blade.php atau sejenisnya
        return view('Admin.dokter.edit', compact('dokter', 'polis'));
    }

    /**
     * Pastikan fungsi update ini juga ada untuk memproses simpan perubahan form edit
     */
    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            // sesuaikan validasi lainnya seperti foto, hari, jam, dll.
        ]);

        // Logika update data dokter kamu di sini...
        $dokter->update($request->all());

        return redirect()->route('admin.dokter.index')->with('success', 'Data dokter berhasil diperbarui!');
    }
}