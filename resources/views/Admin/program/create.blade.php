@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-8 max-w-4xl mx-auto custom-program-font relative select-none">
    
    {{-- BUTTON BACK --}}
    <div class="mb-8 animate__animated animate__fadeInLeft">
        <a href="{{ route('admin.program.index') }}" class="inline-flex items-center gap-3 text-maroon-dark font-extrabold text-xs tracking-wider uppercase group bg-white px-5 py-3 rounded-full shadow-sm border border-gray-100 hover:shadow-md hover:border-maroon-dark/20 transition-all duration-300">
            <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
            Kembali ke Data Program
        </a>
    </div>

    {{-- MAIN CARD FORM --}}
    <div class="bg-white rounded-[2.8rem] p-8 md:p-11 shadow-[0_25px_60px_rgba(74,14,14,0.03)] border border-gray-100/80 relative overflow-hidden z-10 animate__animated animate__fadeInUp">
        
        {{-- Garis Aksen Top Bar --}}
        <div class="absolute top-0 inset-x-0 h-[6px] bg-gradient-to-r from-amber-500 via-maroon-dark to-rose-600"></div>

        {{-- HEADER --}}
        <div class="mb-10 border-b border-gray-100 pb-6">
            <span class="inline-flex items-center gap-1.5 bg-rose-50 text-maroon-dark text-[10px] font-black tracking-widest uppercase px-3 py-1 rounded-full border border-maroon-dark/10 mb-2">
                <i class="fa-solid fa-star-of-life animate-spin" style="animation-duration: 4s;"></i> Promkes & Preventif
            </span>
            <h2 class="text-3xl font-black text-gray-950 tracking-tight">Tambah <span class="bg-gradient-to-r from-maroon-dark to-rose-700 bg-clip-text text-transparent">Program Baru</span></h2>
            <p class="text-gray-400 text-xs mt-1">Buat program kesehatan baru untuk ditampilkan di halaman depan publik.</p>
        </div>

        {{-- FORM ACTION (🚀 FIX: Menambahkan enctype="multipart/form-data") --}}
        <form action="{{ route('admin.program.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="space-y-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- 1. NAMA PROGRAM --}}
                    <div class="space-y-1.5 group">
                        <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">Nama Program</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-5 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300"><i class="fa-solid fa-notes-medical text-base"></i></span>
                            <input type="text" name="nama_program" required class="w-full pl-12 pr-5 py-4 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-800 focus:bg-white" placeholder="Contoh: Posyandu, Prolanis">
                        </div>
                    </div>

                    {{-- 2. LABEL BADGE (Rutin Bulanan/Mingguan) --}}
                    <div class="space-y-1.5 group">
                        <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">Label Waktu / Badging</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-5 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300"><i class="fa-solid fa-business-time text-base"></i></span>
                            <input type="text" name="label_waktu" required class="w-full pl-12 pr-5 py-4 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-800 focus:bg-white" placeholder="Contoh: Rutin Bulanan, Mingguan">
                        </div>
                    </div>
                </div>

                {{-- 3. DESKRIPSI UTAMA --}}
                <div class="space-y-1.5 group">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">Deskripsi Ringkas Program</label>
                    <textarea name="deskripsi" rows="3" required class="w-full p-5 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-800 focus:bg-white leading-relaxed resize-none" placeholder="Jelaskan secara garis besar tujuan program kerja kesehatan ini..."></textarea>
                </div>

                {{-- 🚀 FIX TAMBAHAN: 4. INPUT FILE GAMBAR (Desain diselaraskan agar rapi) --}}
                <div class="space-y-1.5 group">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">Gambar Cover Program</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-5 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300"><i class="fa-solid fa-image text-base"></i></span>
                        <input type="file" name="gambar" accept="image/*" class="w-full pl-12 pr-5 py-3.5 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-500 focus:bg-white file:mr-4 file:py-1.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-rose-50 file:text-maroon-dark hover:file:bg-rose-100 file:cursor-pointer file:transition-colors">
                    </div>
                    <span class="text-[10px] text-gray-400 font-medium block ml-1">Format: JPG, JPEG, PNG. Maksimal ukuran file: 2 MB.</span>
                </div>

                <hr class="border-gray-100">

                {{-- 5. MULTI-INPUT JAVASCRIPT DINAMIS --}}
                <div class="space-y-3 bg-gray-50/40 border border-gray-200/40 p-6 rounded-3xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <label class="text-[12px] font-black text-gray-800 uppercase tracking-wider block">Aktivitas Utama Program</label>
                            <span class="text-[10px] text-gray-400 font-medium">Daftar checklist kegiatan yang dicakup oleh program ini.</span>
                        </div>
                        <button type="button" id="addActivityBtn" class="bg-gradient-to-r from-maroon-dark to-maroon-light text-white text-xs font-bold px-4 py-2 rounded-xl shadow-md hover:scale-105 active:scale-95 transition-all flex items-center gap-1.5">
                            <i class="fa-solid fa-plus"></i> Tambah List
                        </button>
                    </div>

                    <div id="activitiesContainer" class="space-y-3 pt-2">
                        <div class="flex items-center gap-3 animate__animated animate__fadeIn">
                            <div class="relative flex-1">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-maroon-dark/40 text-xs"><i class="fa-solid fa-circle-dot"></i></span>
                                <input type="text" name="aktivitas[]" required class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200/80 rounded-xl focus:border-maroon-dark focus:ring-2 focus:ring-maroon-dark/10 outline-none text-xs font-semibold text-gray-700" placeholder="Contoh: Penimbangan dan pengukuran balita">
                            </div>
                            <button type="button" class="text-gray-300 p-2 cursor-not-allowed" disabled><i class="fa-regular fa-trash-can text-sm"></i></button>
                        </div>
                    </div>
                </div>

                {{-- BUTTON SUBMIT --}}
                <div class="pt-4">
                    <button type="submit" class="w-full bg-gradient-to-r from-maroon-dark via-maroon-light to-rose-900 text-white py-4 rounded-2xl font-extrabold tracking-wider text-sm transition-all duration-300 shadow-lg shadow-maroon-dark/20 hover:shadow-xl hover:scale-[1.01] active:scale-[0.99]">
                        SIMPAN PROGRAM BARU <i class="fa-solid fa-folder-plus ml-1 text-xs"></i>
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<style>
    .custom-program-font { font-family: 'Plus Jakarta Sans', sans-serif; }
</style>

{{-- SCRIPT INTERAKTIF JAVASCRIPT --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('activitiesContainer');
        const addBtn = document.getElementById('addActivityBtn');

        addBtn.addEventListener('click', function() {
            const div = document.createElement('div');
            div.className = 'flex items-center gap-3 animate__animated animate__slideInDown';
            div.style.animationDuration = '0.2s';
            
            div.innerHTML = `
                <div class="relative flex-1">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-maroon-dark/40 text-xs"><i class="fa-solid fa-circle-dot"></i></span>
                    <input type="text" name="aktivitas[]" required class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200/80 rounded-xl focus:border-maroon-dark focus:ring-2 focus:ring-maroon-dark/10 outline-none text-xs font-semibold text-gray-700" placeholder="Masukkan aktivitas program lainnya...">
                </div>
                <button type="button" class="delete-row-btn text-gray-400 hover:text-rose-600 p-2 transition-colors transform active:scale-90"><i class="fa-regular fa-trash-can text-sm"></i></button>
            `;
            
            container.appendChild(div);

            div.querySelector('.delete-row-btn').addEventListener('click', function() {
                div.remove();
            });
        });
    });
</script>
@endsection