@extends('layouts.admin')

@section('title', 'Kelola Layanan')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-extrabold text-maroon-dark uppercase tracking-tight flex items-center gap-3">
                <span class="w-2 h-8 bg-teal-500 rounded-full"></span>
                Daftar Layanan Kesehatan
            </h2>
            <p class="text-sm text-gray-500 mt-1">Kelola informasi poli dan jenis layanan yang tersedia untuk masyarakat.</p>
        </div>
    
        <a href="{{ route('admin.services.create') }}" class="group bg-maroon-dark text-white px-6 py-3 rounded-full font-bold text-sm hover:shadow-xl hover:shadow-maroon-dark/20 transition-all duration-300 flex items-center gap-2 active:scale-95">
            <i class="fas fa-plus"></i> Tambah Layanan
        </a>
    </div>

    {{-- Stats Mini Card --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center text-xl">
                <i class="fas fa-stethoscope"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase">Total Poli</p>
                <h4 class="text-xl font-bold text-gray-800">{{ $services->count() }} Layanan</h4>
            </div>
        </div>
        <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-maroon-dark/10 text-maroon-dark rounded-2xl flex items-center justify-center text-xl">
                <i class="fas fa-eye"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase">Status</p>
                <h4 class="text-xl font-bold text-gray-800">Sistem Online</h4>
            </div>
        </div>
        <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4 text-gray-400 text-xs">
            <i class="fas fa-info-circle text-2xl"></i>
            <p class="leading-tight">Data di bawah diambil langsung dari database Puskesmas.</p>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="bg-white rounded-[30px] shadow-sm overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-maroon-dark uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="p-5 border-b border-gray-100">Info Layanan</th>
                        <th class="p-5 border-b border-gray-100">Deskripsi</th>
                        <th class="p-5 border-b border-gray-100 text-center">Status</th>
                        <th class="p-5 border-b border-gray-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($services as $item)
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="p-5">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 bg-maroon-dark/5 text-maroon-dark rounded-2xl flex items-center justify-center text-2xl shadow-sm group-hover:bg-maroon-dark group-hover:text-white transition-all duration-300">
                                    <i class="{{ $item->ikon ?? 'fas fa-notes-medical' }}"></i>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-800 text-sm">{{ $item->nama_layanan }}</h5>
                                    <span class="text-[9px] bg-teal-100 text-teal-700 px-2 py-0.5 rounded font-bold uppercase tracking-tighter italic">Poli Aktif</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-5 max-w-md">
                            <p class="text-xs text-gray-500 leading-relaxed line-clamp-2">
                                {{ $item->deskripsi_singkat }}
                            </p>
                        </td>
                        <td class="p-5 text-center">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-100 text-green-600 text-[10px] font-bold uppercase">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full {{ $item->is_active ? 'animate-pulse' : '' }}"></span>
                                {{ $item->is_active ? 'AKTIF' : 'NON-AKTIF' }}
                            </span>
                        </td>
                        <td class="p-5">
                            <div class="flex justify-center items-center gap-2">
                                <a href="#" class="w-9 h-9 flex items-center justify-center bg-teal-50 text-teal-600 rounded-xl hover:bg-teal-500 hover:text-white transition-all" title="Edit">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                <form action="/admin/layanan/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-9 h-9 flex items-center justify-center bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all" title="Hapus">
                                        <i class="fas fa-trash-alt text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-10 text-center text-gray-400 italic text-sm">
                            Belum ada data layanan. Silakan tambah layanan baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection