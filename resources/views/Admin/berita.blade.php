@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-8 max-w-7xl mx-auto space-y-10 custom-dashboard-font overflow-hidden">
    
    {{-- HEADER SECTION (Mewah dengan Ornamen Efek Cahaya) --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 animate-fade-up-premium">
        <div>
            <div class="inline-flex items-center gap-2 bg-maroon-dark/5 text-maroon-dark px-3 py-1 rounded-full text-xs font-extrabold tracking-wider uppercase mb-3 border border-maroon-dark/10">
                <i class="fa-solid fa-folder-gear animate-spin-slow"></i> Workspace Publikasi
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-950 tracking-tight leading-none">
                Manajemen <span class="bg-gradient-to-r from-maroon-dark via-rose-700 to-rose-950 bg-clip-text text-transparent">Berita & Edukasi</span>
            </h2>
            <p class="text-gray-500 text-sm md:text-base mt-3 flex items-center gap-3">
                <span class="w-12 h-[3px] bg-gradient-to-r from-maroon-dark to-rose-500 rounded-full"></span>
                Pusat kendali modern perilis konten artikel kesehatan Puskesmas.
            </p>
        </div>
        
        <a href="{{ route('admin.berita.create') }}" class="group relative inline-flex items-center justify-center gap-3 bg-gradient-to-br from-neutral-900 via-maroon-dark to-rose-950 text-white px-8 py-4.5 rounded-[2rem] font-bold shadow-[0_20px_40px_rgba(159,18,57,0.2)] hover:shadow-[0_25px_50px_rgba(159,18,57,0.35)] hover:-translate-y-1.5 transition-all duration-500 overflow-hidden border border-white/10 self-start lg:self-center">
            <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent transform -translate-x-full group-hover:animate-laser-shine"></div>
            <div class="bg-white/10 w-8 h-8 rounded-xl group-hover:rotate-90 transition-transform duration-700 border border-white/10 flex items-center justify-center shadow-inner">
                <i class="fa-solid fa-plus text-xs"></i>
            </div>
            <span class="tracking-wide">Tulis Artikel Baru</span>
        </a>
    </div>

    {{-- NOTIFIKASI SUKSES (Ultra Clean Toast Style) --}}
    @if(session('success'))
    <div class="p-5 bg-gradient-to-r from-emerald-500/10 via-teal-500/5 to-transparent border border-emerald-500/20 text-emerald-900 rounded-3xl shadow-[0_15px_30px_rgba(16,185,129,0.04)] flex items-center justify-between animate-bounce-in">
        <div class="flex items-center gap-4">
            <div class="bg-gradient-to-br from-emerald-400 to-teal-600 text-white w-12 h-12 rounded-2xl shadow-lg shadow-emerald-500/20 flex items-center justify-center">
                <i class="fa-solid fa-envelope-circle-check text-base animate-pulse"></i>
            </div>
            <div>
                <p class="text-[10px] uppercase font-black tracking-widest text-emerald-600 leading-none">Notifikasi Sistem</p>
                <p class="text-sm font-bold mt-1 text-gray-800">{{ session('success') }}</p>
            </div>
        </div>
        <button onclick="this.parentElement.remove()" class="w-9 h-9 rounded-xl bg-emerald-500/5 text-emerald-600 hover:bg-emerald-500 hover:text-white flex items-center justify-center transition-all duration-300 border border-emerald-500/10">
            <i class="fa-solid fa-xmark text-xs"></i>
        </button>
    </div>
    @endif

    {{-- MODERN LIVE-CARD TABLE REPLACEMENT --}}
    <div class="space-y-4">
        {{-- Custom Pseudo Table Header --}}
        <div class="hidden md:grid grid-cols-12 gap-4 px-8 py-2 text-[11px] font-black text-gray-400 uppercase tracking-[0.25em] animate-fade-up-premium" style="animation-delay: 0.1s;">
            <div class="col-span-6">Informasi Artikel & Konten</div>
            <div class="col-span-2 text-center">Klasifikasi</div>
            <div class="col-span-2 text-center">Tanggal Rilis</div>
            <div class="col-span-2 text-right pr-4">Opsi Manajemen</div>
        </div>

        {{-- Loop Data Content --}}
        @forelse($beritas ?? [] as $index => $b)
        <div class="bg-white rounded-[2.2rem] p-5 md:p-6 shadow-[0_12px_40px_rgba(0,0,0,0.015)] border border-gray-100/80 hover:border-maroon-dark/20 hover:shadow-[0_25px_50px_rgba(159,18,57,0.06)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden grid grid-cols-1 md:grid-cols-12 items-center gap-6 animate-stagger-row" style="--row-idx: {{ $index }};">
            
            <div class="absolute top-0 left-0 w-[4px] h-full bg-gradient-to-b from-maroon-dark to-rose-500 transform -translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>

            {{-- 1. DETAIL ARTIKEL (Menampilkan Gambar Unggahan) --}}
            <div class="col-span-1 md:col-span-6 flex items-center gap-5">
                
                {{-- 🚀 UPDATE: Thumbnail Gambar Dinamis --}}
                <div class="w-16 h-16 rounded-2xl border border-gray-200/50 flex flex-col items-center justify-center group-hover:rotate-[8deg] group-hover:scale-105 group-hover:shadow-xl group-hover:shadow-maroon-dark/10 transition-all duration-500 shadow-inner shrink-0 relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100/50">
                    @if($b->gambar)
                        <img src="{{ asset('storage/berita/' . $b->gambar) }}" alt="Foto {{ $b->judul }}" class="w-full h-full object-cover">
                    @else
                        <div class="text-maroon-dark group-hover:text-maroon-dark transition-colors duration-500 flex flex-col items-center justify-center">
                            <i class="fa-regular fa-newspaper text-xl"></i>
                        </div>
                    @endif
                    <span class="absolute -bottom-1 -right-1 w-5 h-5 rounded-md bg-white border border-gray-100 shadow-sm flex items-center justify-center text-[8px] text-gray-400 group-hover:text-maroon-dark transition-colors font-black z-10">ID</span>
                </div>

                <div class="flex flex-col min-w-0 space-y-1">
                    <span class="text-base md:text-lg font-black text-gray-800 group-hover:text-maroon-dark transition-colors duration-300 line-clamp-1 tracking-tight leading-snug">
                        {{ $b->judul }}
                    </span>
                    <div class="flex items-center gap-2 text-xs text-gray-400 font-medium bg-gray-50 group-hover:bg-maroon-dark/[0.03] px-3 py-1 rounded-xl w-fit transition-colors border border-gray-100/50">
                        <i class="fa-solid fa-link text-[10px] text-gray-300 group-hover:text-maroon-dark/50"></i>
                        <span class="truncate max-w-[200px] sm:max-w-xs font-mono text-[11px]">{{ $b->slug }}</span>
                    </div>
                </div>
            </div>

            {{-- 2. KLASIFIKASI KATEGORI (Pill Glow Interactive) --}}
            <div class="col-span-1 md:col-span-2 text-left md:text-center">
                <span class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-gray-50 to-gray-50/50 text-gray-700 text-[10px] font-black uppercase tracking-widest border border-gray-200/40 shadow-inner group-hover:from-maroon-dark group-hover:to-rose-900 group-hover:text-white group-hover:border-transparent group-hover:shadow-md group-hover:shadow-maroon-dark/20 transition-all duration-500">
                    <span class="w-1.5 h-1.5 rounded-full bg-maroon-dark group-hover:bg-amber-300 mr-2.5 animate-pulse"></span>
                    {{ $b->kategori ?? 'Umum' }}
                </span>
            </div>

            {{-- 3. TANGGAL PUBLIKASI (Timeline Design) --}}
            <div class="col-span-1 md:col-span-2 text-left md:text-center flex md:flex-col justify-between md:justify-center border-t md:border-t-0 pt-4 md:pt-0 border-gray-50">
                <span class="text-[11px] font-bold text-gray-400 md:hidden uppercase tracking-wider">Tanggal Rilis:</span>
                <div class="text-right md:text-center">
                    <p class="text-sm font-extrabold text-gray-800 flex items-center md:justify-center gap-1.5 group-hover:text-maroon-dark transition-colors">
                        <i class="fa-regular fa-clock text-xs text-gray-400 group-hover:rotate-45 transition-transform duration-500"></i>
                        {{ $b->created_at->format('d M Y') }}
                    </p>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tight mt-0.5">
                        {{ $b->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>

            {{-- 4. MANAJEMEN TINDAKAN (Premium Dock Action Buttons) --}}
            <div class="col-span-1 md:col-span-2 flex justify-end items-center gap-3 border-t md:border-t-0 pt-4 md:pt-0 border-gray-50">
                {{-- View Button --}}
                <a href="{{ route('public.berita.detail', $b->slug) }}" target="_blank" class="w-11 h-11 flex items-center justify-center bg-blue-50/50 hover:bg-blue-600 text-blue-600 hover:text-white rounded-xl hover:scale-110 hover:-translate-y-0.5 transition-all duration-300 shadow-sm border border-blue-100/50 hover:shadow-lg hover:shadow-blue-600/20" title="Pratinjau Artikel">
                    <i class="fa-regular fa-eye text-sm"></i>
                </a>

                {{-- Edit Button --}}
                <a href="{{ route('admin.berita.edit', $b->id) }}" class="w-11 h-11 flex items-center justify-center bg-amber-50/50 hover:bg-amber-500 text-amber-600 hover:text-white rounded-xl hover:scale-110 hover:-translate-y-0.5 transition-all duration-300 shadow-sm border border-amber-100/50 hover:shadow-lg hover:shadow-amber-500/20" title="Sunting Data">
                    <i class="fa-regular fa-pen-to-square text-sm"></i>
                </a>

                {{-- Delete Button --}}
                <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Hapus permanen berita ini? Data tidak dapat dikembalikan.')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-11 h-11 flex items-center justify-center bg-rose-50/50 hover:bg-rose-600 text-rose-600 hover:text-white rounded-xl hover:scale-110 hover:-translate-y-0.5 transition-all duration-300 shadow-sm border border-rose-100/50 hover:shadow-lg hover:shadow-rose-600/20" title="Hapus Permanen">
                        <i class="fa-regular fa-trash-can text-sm"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        {{-- EMPTY DATA STATE (Premium Vector Mockup) --}}
        <div class="bg-white rounded-[2.5rem] p-16 text-center border border-gray-100 shadow-sm animate-fade-up-premium">
            <div class="flex flex-col items-center justify-center space-y-4">
                <div class="w-20 h-20 bg-gradient-to-b from-gray-50 to-gray-100 rounded-full flex items-center justify-center text-gray-300 shadow-inner border border-gray-200/40 animate-pulse">
                    <i class="fa-solid fa-box-open text-3xl"></i>
                </div>
                <div class="space-y-1">
                    <h3 class="text-xl font-black text-gray-800 tracking-tight">Belum Ada Artikel Rilis</h3>
                    <p class="text-gray-400 max-w-xs mx-auto text-xs font-medium leading-relaxed">Arsip digital kosong. Tekan tombol "Tulis Artikel Baru" untuk menyebarkan informasi kesehatan terupdate.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>

<style>
    /* CUSTOM LOGIC CORE STYLING & ANIMATIONS */
    .custom-dashboard-font {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    .animate-spin-slow {
        animation: spin 8s linear infinite;
    }

    /* 1. Base Main Entrance Fade-Up */
    @keyframes fadeUpPremium {
        from { opacity: 0; transform: translateY(35px); filter: blur(6px); }
        to { opacity: 1; transform: translateY(0); filter: blur(0); }
    }
    .animate-fade-up-premium {
        animation: fadeUpPremium 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* 2. Laser Shimmer Flash Button Effect */
    @keyframes laserShine {
        100% { transform: translateX(100%); }
    }
    .group-hover\:animate-laser-shine {
        animation: laserShine 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    /* 3. Smooth Toast Pop Bounce In */
    @keyframes bounceIn {
        0% { opacity: 0; transform: scale(0.95) translateY(-10px); }
        70% { transform: scale(1.02) translateY(2px); }
        100% { opacity: 1; transform: scale(1) translateY(0); }
    }
    .animate-bounce-in {
        animation: bounceIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }

    /* 4. Cascade Staggered Card Feed Animation */
    @keyframes staggerRow {
        from { opacity: 0; transform: scale(0.98) translateY(20px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    .animate-stagger-row {
        opacity: 0;
        animation: staggerRow 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        animation-delay: calc(var(--row-idx) * 0.07s + 0.2s);
    }

    /* Text Clamp Multiline Controller */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
</style>
@endsection