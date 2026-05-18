@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-8 max-w-4xl mx-auto custom-berita-font relative select-none">
    
    {{-- ORNAMEN BACKGROUND GLOW --}}
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute w-[350px] h-[350px] bg-maroon-dark/5 rounded-full filter blur-[70px] top-20 -left-10 animate-pulse"></div>
        <div class="absolute w-[400px] h-[400px] bg-rose-900/5 rounded-full filter blur-[80px] bottom-10 -right-10" style="animation: pulse 5s infinite"></div>
    </div>

    {{-- TOMBOL KEMBALI INTERAKTIF --}}
    <div class="mb-8 animate__animated animate__fadeInLeft">
        <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center gap-3 text-maroon-dark font-extrabold text-xs tracking-wider uppercase group bg-white px-5 py-3 rounded-full shadow-sm border border-gray-100 hover:shadow-md hover:border-maroon-dark/20 transition-all duration-300">
            <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
            Kembali ke Daftar Berita
        </a>
    </div>

    {{-- CARD UTAMA FORM (Cyber-Glassmorphic View) --}}
    <div class="bg-white/[0.98] backdrop-blur-md rounded-[2.8rem] p-8 md:p-11 shadow-[0_25px_60px_rgba(74,14,14,0.03)] border border-gray-100/80 relative overflow-hidden z-10 animate__animated animate__fadeInUp">
        
        {{-- Garis Aksen Top Bar --}}
        <div class="absolute top-0 inset-x-0 h-[6px] bg-gradient-to-r from-amber-500 via-maroon-dark to-rose-600"></div>

        {{-- HEADER CONTENT --}}
        <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-gray-100 pb-6">
            <div>
                <span class="inline-flex items-center gap-1.5 bg-rose-50 text-maroon-dark text-[10px] font-black tracking-widest uppercase px-3 py-1 rounded-full border border-maroon-dark/10 mb-2">
                    <i class="fa-solid fa-feather-pointed animate-pulse"></i> Ruang Redaksi
                </span>
                <h2 class="text-3xl font-black text-gray-950 tracking-tight">Buat <span class="bg-gradient-to-r from-maroon-dark to-rose-700 bg-clip-text text-transparent">Berita Baru</span></h2>
            </div>
            <div class="text-left md:text-right">
                <p class="text-gray-400 text-[10px] font-black uppercase tracking-widest">Status Penerbitan</p>
                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-600 mt-1">
                    <span class="h-2 w-2 rounded-full bg-amber-500 animate-ping"></span> Draf Otomatis
                </span>
            </div>
        </div>

        {{-- FORM AKSI --}}
        <form action="{{ route('admin.berita.store') }}" method="POST">
            @csrf
            
            <div class="space-y-7">
                
                {{-- 1. JUDUL BERITA --}}
                <div class="space-y-1.5 group">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">
                        Judul Berita Resmi
                    </label>
                    <div class="relative flex items-center">
                        <span class="absolute left-5 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300">
                            <i class="fa-regular fa-heading text-base"></i>
                        </span>
                        <input type="text" name="judul" required
                            class="w-full pl-12 pr-5 py-4 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-800 shadow-inner focus:bg-white" 
                            placeholder="Contoh: Jadwal Posyandu & Vaksinasi Bulan Ini...">
                    </div>
                </div>

                {{-- 2. KATEGORI BERITA --}}
                <div class="space-y-1.5 group">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">
                        Kategori Publikasi
                    </label>
                    <div class="relative flex items-center">
                        <span class="absolute left-5 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300 z-10 pointer-events-none">
                            <i class="fa-regular fa-tags text-base"></i>
                        </span>
                        <select name="kategori" required
                            class="w-full pl-12 pr-12 py-4 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-700 shadow-inner focus:bg-white appearance-none cursor-pointer relative z-0">
                            <option value="" disabled selected>Pilih ranah kategori berita...</option>
                            <option value="Kesehatan">🩺 Layanan Kesehatan</option>
                            <option value="Kegiatan">📅 Kegiatan Puskesmas</option>
                            <option value="Pengumuman">📢 Pengumuman Penting</option>
                        </select>
                        {{-- Custom Arrow Icon --}}
                        <span class="absolute right-5 text-gray-400 pointer-events-none">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </span>
                    </div>
                </div>

                {{-- 3. ISI KONTEN + LIVE COUNTER JAVASCRIPT --}}
                <div class="space-y-1.5 group">
                    <div class="flex items-center justify-between px-1">
                        <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block group-focus-within:text-maroon-dark transition-colors duration-300">
                            Isi / Konten Berita Lengkap
                        </label>
                        {{-- Real-time JavaScript Counter Badge --}}
                        <span id="counterBadge" class="text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded-md transition-all duration-300">
                            0 Karakter
                        </span>
                    </div>
                    <div class="relative">
                        <textarea name="konten" id="newsTextArea" rows="9" required
                            class="w-full p-5 bg-gray-50/50 border border-gray-200/60 rounded-3xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-800 shadow-inner focus:bg-white leading-relaxed resize-none" 
                            placeholder="Tuliskan isi atau rincian berita secara lengkap dan jelas di sini..."></textarea>
                    </div>
                </div>

                {{-- 4. ACTION SUBMIT BUTTON --}}
                <div class="pt-4 flex flex-col sm:flex-row gap-4">
                    <button type="submit" class="flex-1 relative bg-gradient-to-r from-maroon-dark via-maroon-light to-rose-900 text-white py-4.5 rounded-2xl font-extrabold tracking-wider text-sm overflow-hidden transition-all duration-300 shadow-lg shadow-maroon-dark/20 hover:shadow-xl hover:shadow-maroon-dark/40 hover:scale-[1.01] active:scale-[0.99] group/btn">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            TERBITKAN BERITA SEKARANG <i class="fa-solid fa-paper-plane text-xs transition-transform group-hover/btn:translate-x-1 group-hover/btn:-translate-y-0.5"></i>
                        </span>
                        {{-- Glow Hover Wave --}}
                        <div class="absolute inset-0 bg-gradient-to-r from-amber-500 to-rose-600 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500 mix-blend-screen"></div>
                    </button>
                </div>
                
            </div>
        </form>
    </div>  
</div>

<style>
    .custom-berita-font { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    /* Input & Textarea Inner Shadow & Glow Effect */
    .group-focus-within input, .group-focus-within select, .group-focus-within textarea {
        box-shadow: 0 10px 25px -5px rgba(74, 14, 14, 0.04);
    }
    
    /* Pad Tambahan untuk Button Submit */
    .py-4\.5 { padding-top: 1.125rem; padding-bottom: 1.125rem; }
</style>

{{-- INTERAKTIF JAVASCRIPT: LIVE CHARACTER COUNTER --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const newsTextArea = document.getElementById('newsTextArea');
        const counterBadge = document.getElementById('counterBadge');

        newsTextArea.addEventListener('input', function() {
            const charCount = this.value.length;
            
            // Ubah teks counter
            counterBadge.textContent = charCount + ' Karakter';

            // Berikan efek visual dinamis jika tulisan makin panjang
            if(charCount > 0) {
                counterBadge.classList.remove('text-gray-400', 'bg-gray-100');
                counterBadge.classList.add('text-maroon-dark', 'bg-rose-50', 'border', 'border-maroon-dark/10');
            } else {
                counterBadge.className = 'text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded-md transition-all duration-300';
            }
        });
    });
</script>
@endsection