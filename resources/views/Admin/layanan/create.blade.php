@extends('layouts.admin')

@section('page-title', 'Tambah Layanan Baru')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="max-w-3xl mx-auto px-4 py-6 custom-services-font relative select-none">
    
    {{-- ORNAMEN BACKGROUND HALUS --}}
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute w-[300px] h-[300px] bg-maroon-dark/5 rounded-full filter blur-[60px] top-10 -left-10 animate-pulse"></div>
        <div class="absolute w-[350px] h-[350px] bg-rose-900/5 rounded-full filter blur-[70px] bottom-10 -right-10" style="animation: pulse 4s infinite"></div>
    </div>

    {{-- HEADER FORM --}}
    <div class="mb-8 animate__animated animate__fadeInDown">
        <div class="inline-flex items-center gap-2 bg-maroon-dark/5 text-maroon-dark px-3 py-1 rounded-full text-[10px] font-extrabold tracking-widest uppercase mb-3 border border-maroon-dark/10">
            <i class="fa-solid fa-layer-plus animate-bounce"></i> Management Control
        </div>
        <h2 class="text-3xl font-black text-gray-950 tracking-tight">
            Tambah <span class="bg-gradient-to-r from-maroon-dark to-rose-700 bg-clip-text text-transparent">Layanan / Poli</span> Baru
        </h2>
        <p class="text-gray-400 text-xs mt-1.5 font-medium flex items-center gap-2">
            <span class="w-8 h-[2px] bg-maroon-dark/20 rounded-full"></span>
            Konfigurasi unit poli klinis dan modifikasi visual beranda depan Puskesmas.
        </p>
    </div>

    {{-- KARTU UTAMA FORM --}}
    <div class="bg-white/[0.98] backdrop-blur-md rounded-[2.8rem] shadow-[0_20px_50px_rgba(74,14,14,0.04)] border border-gray-100/70 p-8 md:p-10 relative overflow-hidden z-10 animate__animated animate__fadeInUp">
        
        {{-- Garis Aksen Top Bar --}}
        <div class="absolute top-0 inset-x-0 h-[5px] bg-gradient-to-r from-amber-500 via-maroon-dark to-rose-600"></div>

        <form action="{{ route('admin.services.store') }}" method="POST" id="servicesForm">
            @csrf
            
            <div class="space-y-7">
                
                {{-- 1. NAMA LAYANAN --}}
                <div class="space-y-1.5 group">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">
                        Nama Layanan / Poli klinis
                    </label>
                    <div class="relative flex items-center">
                        <span class="absolute left-5 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300">
                            <i class="fa-solid fa-hospital-user text-base"></i>
                        </span>
                        <input type="text" name="nama_layanan" required placeholder="Contoh: Poli KIA, Poli Gigi & Mulut" 
                            class="w-full pl-12 pr-5 py-4 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-800 shadow-inner focus:bg-white">
                    </div>
                </div>

                {{-- 2. INPUT IKON + LIVE PREVIEW JAVASCRIPT --}}
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                    <div class="space-y-1.5 md:col-span-9 group">
                        <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">
                            Ikon Layanan (FontAwesome Class)
                        </label>
                        <div class="relative flex items-center">
                            <span class="absolute left-5 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300">
                                <i class="fa-solid fa-code text-sm"></i>
                            </span>
                            <input type="text" name="ikon" id="iconInput" required placeholder="fa-solid fa-heart-pulse" 
                                class="w-full pl-12 pr-5 py-4 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-800 shadow-inner focus:bg-white font-mono">
                        </div>
                        <p class="text-[10px] text-gray-400 font-medium ml-1 flex items-center gap-1.5">
                            <i class="fa-solid fa-circle-info text-maroon-dark/50"></i>
                            Gunakan class resmi versi 6 dari <a href="https://fontawesome.com/search" target="_blank" class="text-maroon-dark font-extrabold hover:underline">fontawesome.com</a>
                        </p>
                    </div>

                    <div class="md:col-span-3 flex flex-col items-center justify-center space-y-2">
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Live Preview</span>
                        <div class="w-[84px] h-[84px] bg-gradient-to-br from-gray-50 to-gray-100/50 border border-gray-200/60 rounded-2xl text-maroon-dark flex items-center justify-center text-3xl shadow-inner relative overflow-hidden transition-all duration-500 group-hover:scale-105" id="iconPreviewBox">
                            {{-- Ornamen hiasan di dalam preview --}}
                            <div class="absolute -right-2 -bottom-2 text-gray-200/20 text-4xl font-black pointer-events-none"><i class="fa-solid fa-shield-halved"></i></div>
                            <i id="liveIconContainer" class="fa-solid fa-hospital animate-pulse opacity-40"></i>
                        </div>
                    </div>
                </div>

                {{-- 3. DESKRIPSI SINGKAT --}}
                <div class="space-y-1.5 group">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">
                        Deskripsi Singkat Layanan
                    </label>
                    <div class="relative">
                        <textarea name="deskripsi_singkat" rows="4" required placeholder="Jelaskan secara ringkas mengenai fungsi layanan, cakupan pemeriksaan, atau jam operasional khusus poli ini..." 
                            class="w-full p-5 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-800 shadow-inner focus:bg-white leading-relaxed resize-none"></textarea>
                    </div>
                </div>

                {{-- 4. INTERACTIVE ACTIONS SWITCH BUTTON --}}
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    {{-- Simpan Button --}}
                    <button type="submit" class="flex-1 order-1 sm:order-2 relative bg-gradient-to-r from-maroon-dark via-maroon-light to-rose-900 text-white py-4 rounded-2xl font-extrabold tracking-wider text-sm overflow-hidden transition-all duration-300 shadow-lg shadow-maroon-dark/20 hover:shadow-xl hover:shadow-maroon-dark/40 hover:scale-[1.01] active:scale-[0.99] group/btn">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            SIMPAN LAYANAN <i class="fa-solid fa-circle-check text-xs"></i>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-amber-500 to-rose-600 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500 mix-blend-screen"></div>
                    </button>
                    
                    {{-- Batal Button --}}
                    <a href="{{ route('admin.services.index') }}" class="flex-1 order-2 sm:order-1 bg-gray-100 text-gray-500 font-extrabold py-4 rounded-2xl text-center text-sm hover:bg-gray-200/80 hover:text-gray-700 active:scale-[0.99] transition-all duration-300 flex items-center justify-center gap-2 border border-gray-200/30">
                        <i class="fa-solid fa-ban text-xs"></i> BATALKAN
                    </a>
                </div>

            </div>     
        </form>
    </div>
</div>

<style>
    .custom-services-font { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    /* Efek Input Focus Glowing Border Ring */
    .group-focus-within input, .group-focus-within textarea {
        box-shadow: 0 10px 25px -5px rgba(74, 14, 14, 0.05);
    }
</style>

{{-- JAVASCRIPT: FITUR INTERAKTIF LIVE PREVIEW ICON --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const iconInput = document.getElementById('iconInput');
        const liveIconContainer = document.getElementById('liveIconContainer');
        const iconPreviewBox = document.getElementById('iconPreviewBox');

        iconInput.addEventListener('input', function (e) {
            let val = e.target.value.trim();

            if (val.length > 3) {
                // Bersihkan dan pasang class baru ke previewer container
                liveIconContainer.className = ''; 
                
                // Masukkan class inputan user (contoh: fas fa-heart atau fa-solid fa-user)
                liveIconContainer.className = val + ' transition-all duration-300 scale-110';
                liveIconContainer.style.opacity = '1';
                
                // Tambahkan estetika glow pada preview box saat ikon valid
                iconPreviewBox.className = 'w-[84px] h-[84px] bg-gradient-to-br from-maroon-dark to-rose-950 border border-maroon-dark/20 rounded-2xl text-white flex items-center justify-center text-3xl shadow-lg shadow-maroon-dark/20 relative overflow-hidden transition-all duration-500';
            } else {
                // Kembalikan ke model placeholder bawaan jika input kosong
                liveIconContainer.className = 'fa-solid fa-hospital animate-pulse';
                liveIconContainer.style.opacity = '0.4';
                iconPreviewBox.className = 'w-[84px] h-[84px] bg-gradient-to-br from-gray-50 to-gray-100/50 border border-gray-200/60 rounded-2xl text-maroon-dark flex items-center justify-center text-3xl shadow-inner relative overflow-hidden transition-all duration-500';
            }
        });
    });
</script>
@endsection