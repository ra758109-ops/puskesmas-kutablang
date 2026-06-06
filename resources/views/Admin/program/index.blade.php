@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-8 max-w-7xl mx-auto custom-dashboard-font relative select-none">
    
    {{-- ORNAMEN BACKGROUND GLOW --}}
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute w-[400px] h-[400px] bg-maroon-dark/5 rounded-full filter blur-[80px] top-10 -left-20 animate-pulse"></div>
        <div class="absolute w-[450px] h-[450px] bg-rose-900/5 rounded-full filter blur-[90px] bottom-10 -right-20" style="animation: pulse 5s infinite"></div>
    </div>

    {{-- HEADER & TOMBOL TAMBAH PROGRAM --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10 z-10 relative animate__animated animate__fadeInDown">
        <div>
            <span class="inline-flex items-center gap-1.5 bg-rose-50 text-maroon-dark text-[10px] font-black tracking-widest uppercase px-3 py-1 rounded-full border border-maroon-dark/10 mb-2">
                <i class="fa-solid fa-gauge-high"></i> Panel Kontrol Promkes
            </span>
            <h2 class="text-3xl font-black text-gray-950 tracking-tight">Kelola <span class="bg-gradient-to-r from-maroon-dark to-rose-700 bg-clip-text text-transparent">Program Puskesmas</span></h2>
            <p class="text-gray-400 text-xs mt-1">Pantau, tambah, atau modifikasi visual program kesehatan yang tampil di halaman depan.</p>
        </div>
        
        {{-- Tombol Tambah --}}
        <a href="{{ route('admin.program.create') }}" class="relative bg-gradient-to-r from-maroon-dark via-maroon-light to-rose-900 text-white px-6 py-4 rounded-2xl font-extrabold tracking-wider text-xs overflow-hidden transition-all duration-300 shadow-lg shadow-maroon-dark/20 hover:shadow-xl hover:shadow-maroon-dark/40 hover:scale-[1.03] active:scale-[0.98] group/btn flex items-center justify-center gap-2">
            <span class="relative z-10 flex items-center gap-2">
                TAMBAH PROGRAM BARU <i class="fa-solid fa-plus-circle text-sm"></i>
            </span>
            <div class="absolute inset-0 bg-gradient-to-r from-amber-500 to-rose-600 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500 mix-blend-screen"></div>
        </a>
    </div>

    {{-- FLASH MESSAGES NOTIFIKASI --}}
    @if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl text-sm font-bold flex items-center gap-2 animate__animated animate__fadeIn">
        <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
        {{ session('success') }}
    </div>
    @endif

    {{-- KARTU STATISTIK RINGKASAN --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 z-10 relative animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between group hover:border-maroon-dark/20 transition-all duration-300">
            <div>
                <p class="text-gray-400 text-[10px] font-black uppercase tracking-wider">Rata-rata Capaian</p>
                <h3 class="text-3xl font-black text-gray-900 mt-1">93.5%</h3>
                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md mt-2 inline-block"><i class="fa-solid fa-arrow-trend-up"></i> Sangat Baik</span>
            </div>
            <div class="w-14 h-14 bg-rose-50 text-maroon-dark rounded-2xl flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform duration-300"><i class="fa-solid fa-chart-line-up"></i></div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between group hover:border-maroon-dark/20 transition-all duration-300">
            <div>
                <p class="text-gray-400 text-[10px] font-black uppercase tracking-wider">Total Program Input</p>
                <h3 class="text-3xl font-black text-gray-900 mt-1">{{ $programs->count() }} Program</h3>
                <span class="text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded-md mt-2 inline-block">Promotif & Preventif</span>
            </div>
            <div class="w-14 h-14 bg-rose-50 text-maroon-dark rounded-2xl flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform duration-300"><i class="fa-solid fa-layer-group"></i></div>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between group hover:border-maroon-dark/20 transition-all duration-300">
            <div>
                <p class="text-gray-400 text-[10px] font-black uppercase tracking-wider">Total Target Anggota</p>
                <h3 class="text-3xl font-black text-gray-900 mt-1">180 Jiwa</h3>
                <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-md mt-2 inline-block">Peserta Prolanis Aktif</span>
            </div>
            <div class="w-14 h-14 bg-rose-50 text-maroon-dark rounded-2xl flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform duration-300"><i class="fa-solid fa-users-medical"></i></div>
        </div>
    </div>

    {{-- TABEL DATA UTAMA PROGRAM --}}
    <div class="bg-white/[0.98] backdrop-blur-md rounded-[2.5rem] shadow-[0_20px_50px_rgba(74,14,14,0.02)] border border-gray-100/80 overflow-hidden z-10 relative animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50/50">
                        <th class="px-6 py-5 text-[11px] font-black text-gray-500 uppercase tracking-widest">Visual & Nama Program</th>
                        <th class="px-6 py-5 text-[11px] font-black text-gray-500 uppercase tracking-widest">Periode Update</th>
                        <th class="px-6 py-5 text-[11px] font-black text-gray-500 uppercase tracking-widest">Deskripsi Ringkas</th>
                        <th class="px-6 py-5 text-[11px] font-black text-gray-500 uppercase tracking-widest text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 font-medium text-sm text-gray-700">
                    @forelse($programs as $program)
                    <tr class="hover:bg-gray-50/60 transition-colors duration-200">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                {{-- Thumbnail Gambar Program dari Storage/Uploads --}}
                                <div class="w-14 h-12 rounded-xl overflow-hidden bg-gradient-to-br from-maroon-dark to-rose-950 flex items-center justify-center text-white font-black text-xs shadow-sm flex-shrink-0">
                                    @if($program->gambar && (file_exists(public_path('uploads/program/' . $program->gambar)) || file_exists(public_path('uploads/' . $program->gambar))))
                                        @php
                                            $adminProgImg = file_exists(public_path('uploads/program/' . $program->gambar)) 
                                                ? asset('uploads/program/' . $program->gambar) 
                                                : asset('uploads/' . $program->gambar);
                                        @endphp
                                        <img src="{{ $adminProgImg }}" alt="Prog" class="w-full h-full object-cover">
                                    @else
                                        {{ strtoupper(substr($program->nama_program ?? 'PR', 0, 2)) }}
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-950 text-base leading-tight mb-1">{{ $program->nama_program }}</h4>
                                    {{-- Mengamankan error count activities --}}
                                    <span class="text-[10px] text-maroon-dark font-black bg-rose-50 border border-maroon-dark/10 px-2 py-0.5 rounded-md">
                                        <i class="fa-solid fa-bullseye mr-1"></i> {{ isset($program->activities) ? $program->activities->count() : '0' }} Kegiatan Aktif
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-amber-50 text-amber-700 border border-amber-200/50 px-3 py-1 rounded-full text-xs font-bold whitespace-nowrap">
                                <i class="fa-regular fa-calendar-check mr-1"></i> 
                                {{-- Memakai label_waktu jika ada, atau fallback ke tanggal pembuatan --}}
                                {{ $program->label_waktu ?? ($program->created_at ? $program->created_at->format('d M Y') : now()->format('d M Y')) }}
                            </span>
                        </td>
                        <td class="px-6 py-5 max-w-xs">
                            <p class="text-gray-400 font-semibold text-xs line-clamp-2 leading-relaxed">
                                {{ $program->deskripsi }}
                            </p>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center gap-2">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.program.edit', $program->id) }}" class="p-2.5 bg-gray-50 hover:bg-maroon-dark hover:text-white rounded-xl text-gray-400 transition-all duration-300 transform active:scale-90" title="Ubah Program">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </a>
                                
                                {{-- Tombol Hapus dengan Form --}}
                                <form action="{{ route('admin.program.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus program ini dari dashboard publik?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2.5 bg-gray-50 hover:bg-rose-600 hover:text-white rounded-xl text-gray-400 transition-all duration-300 transform active:scale-90" title="Hapus Program">
                                        <i class="fa-solid fa-trash-can text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-400 font-semibold italic">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="fa-solid fa-folder-open text-3xl text-gray-300"></i>
                                <p>Belum ada data program kesehatan. Silakan tambah baru!</p>
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
    .custom-dashboard-font { font-family: 'Plus Jakarta Sans', sans-serif; }
</style>
@endsection