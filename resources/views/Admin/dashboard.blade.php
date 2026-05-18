@extends('layouts.admin')

@section('page-title', 'Overview Dashboard')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-8 max-w-7xl mx-auto space-y-10 custom-font overflow-hidden">
    
    {{-- WELCOME BANNER (Glow & Floating Animation) --}}
    <div class="relative p-8 md:p-10 rounded-[2.5rem] bg-gradient-to-br from-maroon-dark via-rose-950 to-neutral-950 text-white overflow-hidden shadow-[0_20px_50px_rgba(159,18,57,0.15)] border border-white/5 animate-slide-up">
        <div class="absolute -right-10 -top-10 w-60 h-60 bg-gradient-to-br from-rose-500/20 to-amber-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute right-1/3 -bottom-20 w-44 h-44 bg-maroon-dark/20 rounded-full blur-2xl animate-float" style="animation-delay: 2s;"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-3 py-1 rounded-full border border-white/10 text-rose-200 text-xs font-bold tracking-wide">
                    <i class="fa-solid fa-sparkles animate-pulse text-amber-300"></i> Sistem Terintegrasi V2.0
                </div>
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight leading-none">
                    Selamat Datang, <span class="bg-gradient-to-r from-rose-300 via-amber-200 to-white bg-clip-text text-transparent">Super Admin</span> ⚡
                </h2>
                <p class="text-white/70 text-sm md:text-base font-medium max-w-2xl pt-1">
                    Kendali pusat Puskesmas aktif. Semua sistem berjalan normal, data sinkronisasi berjalan lancar di latar belakang.
                </p>
            </div>
            
            <div class="flex items-center gap-4 bg-black/30 backdrop-blur-xl px-6 py-4 rounded-3xl border border-white/10 shadow-2xl self-start lg:self-center group hover:border-emerald-500/30 transition-colors duration-500">
                <div class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                </div>
                <div class="text-left">
                    <p class="text-[10px] uppercase font-black tracking-widest text-emerald-400">Status Server</p>
                    <p class="text-xs font-bold text-white/90">100% Operational</p>
                </div>
            </div>
        </div>
    </div>

    {{-- STATS CARDS (Staggered Animations & High-End Hover Effects) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        {{-- Card 1: Total Layanan --}}
        <a href="{{ route('admin.services.index') }}" class="bg-white p-6 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.02)] border border-gray-100 hover:-translate-y-3 hover:scale-[1.02] hover:shadow-[0_30px_60px_rgba(159,18,57,0.08)] transition-all duration-500 group relative overflow-hidden animate-slide-up block" style="animation-delay: 0.1s;">
            <div class="absolute -right-6 -bottom-6 text-gray-50 text-7xl font-black group-hover:text-maroon-dark/5 group-hover:scale-120 transition-all duration-500">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-maroon-dark/10 to-rose-500/5 rounded-2xl flex items-center justify-center text-maroon-dark mb-6 group-hover:from-maroon-dark group-hover:to-rose-800 group-hover:text-white group-hover:rotate-[12deg] group-hover:shadow-lg group-hover:shadow-maroon-dark/20 transition-all duration-500">
                <i class="fa-solid fa-layer-group text-xl"></i>
            </div>
            <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest group-hover:text-maroon-dark transition-colors duration-300">Total Layanan / Poli</h3>
            <p class="text-4xl font-black text-gray-900 mt-2 tracking-tight">{{ $totalLayanan ?? 0 }}</p>
            <div class="mt-4 pt-4 border-t border-gray-50 flex items-center justify-between">
                <span class="inline-flex items-center gap-1 text-[10px] text-emerald-600 font-bold bg-emerald-50 px-2.5 py-1 rounded-xl">
                    <span class="w-1 h-1 rounded-full bg-emerald-500 animate-pulse"></span> Aktif
                </span>
                <span class="text-[11px] font-bold text-gray-400 group-hover:text-maroon-dark transition-colors">Kelola <i class="fa-solid fa-chevron-right text-[9px] ml-1 group-hover:translate-x-1 transition-transform"></i></span>
            </div>
        </a>

        {{-- Card 2: Total Berita --}}
        <a href="{{ route('admin.berita.index') }}" class="bg-white p-6 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.02)] border border-gray-100 hover:-translate-y-3 hover:scale-[1.02] hover:shadow-[0_30px_60px_rgba(37,99,235,0.08)] transition-all duration-500 group relative overflow-hidden animate-slide-up block" style="animation-delay: 0.2s;">
            <div class="absolute -right-6 -bottom-6 text-gray-50 text-7xl font-black group-hover:text-blue-600/5 group-hover:scale-120 transition-all duration-500">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-blue-600/10 to-indigo-500/5 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:from-blue-600 group-hover:to-indigo-600 group-hover:text-white group-hover:rotate-[12deg] group-hover:shadow-lg group-hover:shadow-blue-600/20 transition-all duration-500">
                <i class="fa-solid fa-newspaper text-xl"></i>
            </div>
            <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest group-hover:text-blue-600 transition-colors duration-300">Artikel Edukasi</h3>
            <p class="text-4xl font-black text-gray-900 mt-2 tracking-tight">{{ $totalBerita ?? 0 }}</p>
            <div class="mt-4 pt-4 border-t border-gray-50 flex items-center justify-between">
                <span class="inline-flex items-center gap-1 text-[10px] text-blue-600 font-bold bg-blue-50 px-2.5 py-1 rounded-xl">
                    <span class="w-1 h-1 rounded-full bg-blue-500 animate-pulse"></span> Publik
                </span>
                <span class="text-[11px] font-bold text-gray-400 group-hover:text-blue-600 transition-colors">Lihat <i class="fa-solid fa-chevron-right text-[9px] ml-1 group-hover:translate-x-1 transition-transform"></i></span>
            </div>
        </a>

        {{-- Card 3: Antrian Hari Ini (SEKARANG BISA DIKLIK & DINAMIS 🚀) --}}
        <a href="{{ route('admin.pasien.index') }}" class="bg-white p-6 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.02)] border border-gray-100 hover:-translate-y-3 hover:scale-[1.02] hover:shadow-[0_30px_60px_rgba(245,158,11,0.08)] transition-all duration-500 group relative overflow-hidden animate-slide-up block" style="animation-delay: 0.3s;">
            <div class="absolute -right-6 -bottom-6 text-gray-50 text-7xl font-black group-hover:text-amber-500/5 group-hover:scale-120 transition-all duration-500">
                <i class="fa-solid fa-hospital-user"></i>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-amber-500/10 to-orange-500/5 rounded-2xl flex items-center justify-center text-amber-600 mb-6 group-hover:from-amber-500 group-hover:to-orange-600 group-hover:text-white group-hover:rotate-[12deg] group-hover:shadow-lg group-hover:shadow-amber-500/20 transition-all duration-500">
                <i class="fa-solid fa-hospital-user text-xl"></i>
            </div>
            <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest group-hover:text-amber-600 transition-colors duration-300">Antrian Hari Ini</h3>
            
            {{-- Menggunakan data asli hitungan dari database --}}
            <p class="text-4xl font-black text-gray-900 mt-2 tracking-tight">{{ $totalPasienHariIni ?? 0 }}</p>
            
            <div class="mt-4 pt-4 border-t border-gray-50 flex items-center justify-between">
                @if(($totalPasienHariIni ?? 0) > 0)
                    <span class="inline-flex items-center gap-1 text-[10px] text-amber-600 font-bold bg-amber-50 px-2.5 py-1 rounded-xl animate-pulse">
                        Perlu Review
                    </span>
                @else
                    <span class="inline-flex items-center gap-1 text-[10px] text-gray-400 font-bold bg-gray-50 px-2.5 py-1 rounded-xl">
                        Kosong
                    </span>
                @endif
                <span class="text-[11px] font-bold text-gray-400 group-hover:text-amber-600 transition-colors">Proses <i class="fa-solid fa-chevron-right text-[9px] ml-1 group-hover:translate-x-1 transition-transform"></i></span>
            </div>
        </a>

        {{-- Card 4: Kunjungan Bulanan --}}
        <div class="bg-white p-6 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.02)] border border-gray-100 hover:-translate-y-3 hover:scale-[1.02] hover:shadow-[0_30px_60px_rgba(16,185,129,0.08)] transition-all duration-500 group relative overflow-hidden animate-slide-up" style="animation-delay: 0.4s;">
            <div class="absolute -right-6 -bottom-6 text-gray-50 text-7xl font-black group-hover:text-emerald-500/5 group-hover:scale-120 transition-all duration-500">
                <i class="fa-solid fa-chart-line"></i>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500/10 to-teal-500/5 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 group-hover:from-emerald-500 group-hover:to-teal-600 group-hover:text-white group-hover:rotate-[12deg] group-hover:shadow-lg group-hover:shadow-emerald-500/20 transition-all duration-500">
                <i class="fa-solid fa-chart-line text-xl"></i>
            </div>
            <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest group-hover:text-emerald-600 transition-colors duration-300">Kunjungan Web</h3>
            <p class="text-4xl font-black text-gray-900 mt-2 tracking-tight">1.2K</p>
            <div class="mt-4 pt-4 border-t border-gray-50 flex items-center justify-between">
                <span class="inline-flex items-center gap-1 text-[10px] text-emerald-600 font-bold bg-emerald-50 px-2.5 py-1 rounded-xl">
                    <i class="fa-solid fa-arrow-trend-up"></i> +12%
                </span>
                <span class="text-[11px] font-bold text-gray-400 group-hover:text-emerald-600 transition-colors">Tren <i class="fa-solid fa-chevron-right text-[9px] ml-1 group-hover:translate-x-1 transition-transform"></i></span>
            </div>
        </div>
    </div>

    {{-- MAIN DATA SECTIONS --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- LAYANAN MEDIS TABLE AREA (Sleek Glassmorphic Minimalist) --}}
        <div class="lg:col-span-2 bg-white rounded-[2.5rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.01)] border border-gray-100 flex flex-col justify-between animate-slide-up" style="animation-delay: 0.5s;">
            <div>
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                    <div>
                        <h3 class="font-extrabold text-2xl text-gray-900 tracking-tight flex items-center gap-3">
                            <span class="w-2.5 h-7 bg-maroon-dark rounded-2xl block shadow-md shadow-maroon-dark/20"></span>
                            Layanan Medis Aktif
                        </h3>
                        <p class="text-xs text-gray-400 mt-1">Konfigurasi data poli klinik yang dapat diakses oleh publik.</p>
                    </div>
                    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-maroon-dark bg-maroon-dark/5 hover:bg-maroon-dark hover:text-white px-5 py-3 rounded-2xl uppercase tracking-wider transition-all duration-300 group self-start sm:self-center shadow-sm">
                        Kelola Modul
                        <i class="fa-solid fa-arrow-right group-hover:translate-x-1.5 transition-transform duration-300"></i>
                    </a>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-gray-50">
                    <table class="w-full text-left border-collapse">
                        <thead class="text-[11px] text-gray-400 uppercase font-black tracking-widest bg-gray-50/70 backdrop-blur-sm border-b border-gray-100">
                            <tr>
                                <th class="p-4">Nama Unit Layanan</th>
                                <th class="p-4">Deskripsi Ringkas</th>
                                <th class="p-4 text-center">Status Akses</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($services ?? [] as $layanan)
                            <tr class="group hover:bg-gradient-to-r hover:from-maroon-dark/[0.02] hover:to-transparent transition-all duration-300">
                                <td class="p-4">
                                    <div class="flex items-center gap-4">
                                        <div class="w-11 h-11 bg-gray-50 border border-gray-200/50 text-maroon-dark rounded-xl flex items-center justify-center text-sm group-hover:bg-gradient-to-br group-hover:from-maroon-dark group-hover:to-rose-900 group-hover:text-white group-hover:scale-105 transition-all duration-500 shadow-inner">
                                            <i class="{{ $layanan->ikon ?? 'fas fa-stethoscope' }}"></i>
                                        </div>
                                        <p class="text-sm font-bold text-gray-800 group-hover:text-maroon-dark transition-colors duration-300">{{ $layanan->nama_layanan }}</p>
                                    </div>
                                </td>
                                <td class="p-4 max-w-xs">
                                    <p class="text-xs text-gray-500 line-clamp-1 font-medium leading-relaxed">{{ $layanan->deskripsi_singkat }}</p>
                                </td>
                                <td class="p-4 text-center">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-600 text-[10px] font-extrabold uppercase tracking-wider border border-emerald-200/40">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Live
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="p-12 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-3 animate-pulse">
                                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-300 shadow-inner">
                                            <i class="fa-solid fa-inbox text-2xl"></i>
                                        </div>
                                        <p class="text-sm text-gray-400 font-bold italic">Belum ada data layanan medik.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- PREMIUM TIMELINE FEED (Interactive Feed) --}}
        <div class="bg-white rounded-[2.5rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.01)] border border-gray-100 flex flex-col justify-between animate-slide-up" style="animation-delay: 0.6s;">
            <div>
                <div class="mb-8">
                    <h3 class="font-extrabold text-2xl text-gray-900 tracking-tight flex items-center gap-3">
                        <span class="w-2.5 h-7 bg-blue-600 rounded-2xl block shadow-md shadow-blue-600/20"></span>
                        Berita Terkini
                    </h3>
                    <p class="text-xs text-gray-400 mt-1">Alur linimasa publikasi konten edukasi kesehatan.</p>
                </div>
                
                <div class="space-y-6 relative before:absolute before:inset-0 before:left-[15px] before:top-2 before:w-[2px] before:bg-gradient-to-b before:from-gray-100 via-gray-100 to-transparent">
                    @forelse($beritaTerbaru ?? [] as $berita)
                    <div class="flex gap-4 relative group">
                        {{-- Timeline Indicator Dot with Glow --}}
                        <div class="w-8 h-8 bg-white rounded-full border-2 border-gray-200 group-hover:border-maroon-dark shadow-sm relative z-10 group-hover:scale-110 group-hover:shadow-md transition-all duration-300 flex items-center justify-center text-xs text-gray-400 group-hover:text-maroon-dark">
                            <i class="fa-solid fa-bullhorn text-[10px] group-hover:animate-bounce"></i>
                        </div>
                        
                        <div class="flex-1 min-w-0 bg-gray-50/60 border border-gray-100 group-hover:bg-gradient-to-br group-hover:from-white group-hover:to-rose-50/20 group-hover:border-maroon-dark/20 p-4 rounded-2xl group-hover:shadow-[0_15px_30px_rgba(159,18,57,0.03)] transition-all duration-300 transform group-hover:translate-x-1">
                            <p class="text-xs font-bold text-gray-800 line-clamp-1 group-hover:text-maroon-dark transition-colors duration-300">{{ $berita->judul }}</p>
                            <div class="flex items-center justify-between mt-2 pt-2 border-t border-gray-100/50">
                                <span class="text-[10px] text-gray-400 font-medium flex items-center gap-1">
                                    <i class="fa-regular fa-clock text-[9px]"></i>
                                    {{ $berita->created_at->diffForHumans() }}
                                </span>
                                <span class="text-[9px] font-extrabold uppercase bg-white px-2 py-0.5 rounded-md border border-gray-200 text-gray-500 group-hover:text-maroon-dark group-hover:border-maroon-dark/20 transition-colors">
                                    {{ $berita->kategori ?? 'Info' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-12 flex flex-col items-center justify-center space-y-3 animate-pulse">
                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-300 shadow-inner">
                            <i class="fa-solid fa-pen-nib textxl"></i>
                        </div>
                        <p class="text-sm text-gray-400 font-bold italic">Belum rilis artikel baru.</p>
                    </div>
                    @endforelse
                </div>
            </div>
            
            <div class="mt-8 pt-4 border-t border-gray-50">
                <a href="{{ route('admin.berita.index') }}" class="group block text-center text-xs font-bold text-gray-400 hover:text-maroon-dark uppercase tracking-widest transition-colors duration-300">
                    Buka Editor Konten 
                    <i class="fa-solid fa-arrow-right text-[10px] ml-1 group-hover:translate-x-1.5 transition-transform duration-300"></i>
                </a>
            </div>
        </div>

    </div>
</div>

<style>
    /* CUSTOM CORE CSS ANIMATIONS */
    .custom-font {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* 1. Entrance Fade & Lift Slide Up */
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(24px); filter: blur(4px); }
        to { opacity: 1; transform: translateY(0); filter: blur(0); }
    }
    .animate-slide-up {
        animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0; /* Keep hidden before animation hits triggers */
    }

    /* 2. Abstract Geometric Background Float */
    @keyframes float {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-15px) scale(1.05); }
    }
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    /* 3. Text & Line Clamp Prevention */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
</style>
@endsection