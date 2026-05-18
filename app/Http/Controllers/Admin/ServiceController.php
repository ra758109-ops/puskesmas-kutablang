<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        // Mengakomodasi pengecekan dari rute depan maupun admin agar folder Admin/admin tetap aman
        if (request()->routeIs('layanan.index')) {
            return view('layanan', compact('services'));
        }

        return view('Admin.layanan.index', compact('services'));
    }

    public function create()
    {
        return view('Admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'ikon' => 'required',
            'deskripsi_singkat' => 'required',
        ]);

        Service::create([
            'nama_layanan' => $request->nama_layanan,
            'slug' => \Illuminate\Support\Str::slug($request->nama_layanan),
            'ikon' => $request->ikon,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'is_active' => true,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('Admin.layanan.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'ikon' => 'required',
            'deskripsi_singkat' => 'required',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'nama_layanan' => $request->nama_layanan,
            'slug' => \Illuminate\Support\Str::slug($request->nama_layanan),
            'ikon' => $request->ikon,
            'deskripsi_singkat' => $request->deskripsi_singkat,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus!');
    }

    public function landing()
    {
        $services = Service::where('is_active', true)->get();
        return view('layanan', compact('services'));
    }
}
