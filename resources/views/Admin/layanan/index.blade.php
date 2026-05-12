@extends('layouts.admin')

@section('title', 'Kelola Layanan')

@section('content')
<div class="container mx-auto px-6 py-8 max-w-7xl">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
        <div class="space-y-1">
            <h2 class="text-3xl font-black text-gray-900 tracking-tight flex items-center gap-3">
                <span class="w-2.5 h-10 bg-maroon-dark rounded-full"></span>
                Manajemen Layanan
            </h2>
            <p class="text-gray-500 font-medium ml-5">Kelola poli dan unit layanan kesehatan Puskesmas Kuta Blang.</p>
        </div>
    
        <a href="{{ route('admin.services.create') }}" class="group bg-maroon-dark text-white px-8 py-4 rounded-2xl font-bold text-sm hover:shadow-[0_20px_40px_rgba(128,0,0,0.2)] transition-all duration-300 flex items-center gap-3 active:scale-95">
            <div class="bg-white/20 p-1 rounded-lg group-hover:rotate-90 transition-transform duration-500">
                <i class="fas fa-plus"></i>
            </div>
            Tambah Layanan Baru
        </a>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 flex items-center gap-5">
            <div class="w-16 h-16 bg-maroon-dark/10 text-maroon-dark rounded-[1.5rem] flex items-center justify-center text-2xl">
                <i class="fas fa-hospital-user"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Total Layanan</p>
                <h4 class="text-2xl font-black text-gray-800">{{ $services->count() }} Poli</h4>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 flex items-center gap-5">
            <div class="w-16 h-16 bg-teal-50 text-teal-600 rounded-[1.5rem] flex items-center justify-center text-2xl">
                <i class="fas fa-check-circle"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Status Sistem</p>
                <h4 class="text-2xl font-black text-gray-800">Aktif & Publik</h4>
            </div>
        </div>

        <div class="bg-maroon-dark p-6 rounded-[2.5rem] shadow-xl shadow-maroon-900/20 flex items-center gap-5 text-white">
            <div class="w-16 h-16 bg-white/20 rounded-[1.5rem] flex items-center justify-center text-2xl">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-maroon-200 uppercase tracking-widest">Akses Admin</p>
                <h4 class="text-xl font-bold">Terproteksi</h4>
            </div>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="bg-white rounded-[3rem] shadow-2xl shadow-gray-200/60 overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th class="p-8 text-[11px] font-black text-gray-400 uppercase tracking-[0.2em]">Info Layanan</th>
                        <th class="p-8 text-[11px] font-black text-gray-400 uppercase tracking-[0.2em]">Deskripsi Layanan</th>
                        <th class="p-8 text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($services as $item)
                    <tr class="group hover:bg-maroon-dark/[0.01] transition-all duration-300">
                        <td class="p-8">
                            <div class="flex items-center gap-5">
                                <div class="w-14 h-14 bg-gray-50 text-maroon-dark rounded-2xl flex items-center justify-center text-2xl shadow-sm group-hover:bg-maroon-dark group-hover:text-white group-hover:rotate-6 transition-all duration-500">
                                    <i class="{{ $item->ikon ?? 'fas fa-briefcase-medical' }}"></i>
                                </div>
                                <div>
                                    <h5 class="font-black text-gray-800 text-lg group-hover:text-maroon-dark transition-colors">{{ $item->nama_layanan }}</h5>
                                    <span class="text-[10px] font-bold text-teal-600 bg-teal-50 px-3 py-1 rounded-full uppercase tracking-wider">Layanan Internal</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-8 max-w-xs">
                            <p class="text-sm text-gray-500 leading-relaxed font-medium line-clamp-2">
                                {{ $item->deskripsi_singkat }}
                            </p>
                        </td>
                        <td class="p-8">
                            <div class="flex justify-center items-center gap-3">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.services.edit', $item->id) }}" 
                                   class="w-11 h-11 flex items-center justify-center bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-600 hover:text-white transition-all duration-300 shadow-sm hover:shadow-amber-200" 
                                   title="Edit Layanan">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.services.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-11 h-11 flex items-center justify-center bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition-all duration-300 shadow-sm hover:shadow-rose-200" 
                                            title="Hapus Layanan">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="p-20 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center text-gray-300 text-3xl">
                                    <i class="fas fa-folder-open"></i>
                                </div>
                                <p class="text-gray-400 font-bold tracking-wide italic">Belum ada data layanan yang tersimpan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    /* Haluskan scroll dan transisi */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection