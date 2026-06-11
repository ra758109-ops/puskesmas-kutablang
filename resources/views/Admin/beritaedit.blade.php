@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-8 max-w-4xl mx-auto custom-berita-font relative select-none">
    
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute w-[350px] h-[350px] bg-maroon-dark/5 rounded-full filter blur-[70px] top-20 -left-10 animate-pulse"></div>
        <div class="absolute w-[400px] h-[400px] bg-rose-900/5 rounded-full filter blur-[80px] bottom-10 -right-10" style="animation: pulse 5s infinite"></div>
    </div>

    <div class="mb-8 animate__animated animate__fadeInLeft">
        <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center gap-3 text-maroon-dark font-extrabold text-xs tracking-wider uppercase group bg-white px-5 py-3 rounded-full shadow-sm border border-gray-100 hover:shadow-md hover:border-maroon-dark/20 transition-all duration-300">
            <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
            Kembali ke Daftar Berita
        </a>
    </div>

    <div class="bg-white/[0.98] backdrop-blur-md rounded-[2.8rem] p-8 md:p-11 shadow-[0_25px_60px_rgba(74,14,14,0.03)] border border-gray-100/80 relative overflow-hidden z-10 animate__animated animate__fadeInUp">
        
        <div class="absolute top-0 inset-x-0 h-[6px] bg-gradient-to-r from-amber-500 via-maroon-dark to-rose-600"></div>

        <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-gray-100 pb-6">
            <div>
                <span class="inline-flex items-center gap-1.5 bg-rose-50 text-maroon-dark text-[10px] font-black tracking-widest uppercase px-3 py-1 rounded-full border border-maroon-dark/10 mb-2">
                    <i class="fa-solid fa-pen-to-square animate-pulse"></i> Modifikasi Konten
                </span>
                <h2 class="text-3xl font-black text-gray-950 tracking-tight">Edit <span class="bg-gradient-to-r from-maroon-dark to-rose-700 bg-clip-text text-transparent">Berita Puskesmas</span></h2>
            </div>
        </div>

        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="space-y-7">
                
                <div class="space-y-1.5 group">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">
                        Judul Berita Resmi
                    </label>
                    <div class="relative flex items-center">
                        <span class="absolute left-5 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300">
                            <i class="fa-solid fa-heading text-base"></i>
                        </span>
                        <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" required
                            class="w-full pl-12 pr-5 py-4 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-800 shadow-inner focus:bg-white" 
                            placeholder="Contoh: Jadwal Posyandu & Vaksinasi Bulan Ini...">
                    </div>
                    @error('judul') <p class="text-xs text-rose-600 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1.5 group">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">
                        Kategori Publikasi
                    </label>
                    <div class="relative flex items-center">
                        <span class="absolute left-5 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300 z-10 pointer-events-none">
                            <i class="fa-solid fa-tags text-base"></i>
                        </span>
                        <select name="kategori" required
                            class="w-full pl-12 pr-12 py-4 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-700 shadow-inner focus:bg-white appearance-none cursor-pointer relative z-0">
                            <option value="" disabled>Pilih ranah kategori berita...</option>
                            <option value="Kesehatan" {{ old('kategori', $berita->kategori) == 'Kesehatan' ? 'selected' : '' }}>Layanan Kesehatan</option>
                            <option value="Kegiatan" {{ old('kategori', $berita->kategori) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan Puskesmas</option>
                            <option value="Pengumuman" {{ old('kategori', $berita->kategori) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman Penting</option>
                        </select>
                        <span class="absolute right-5 text-gray-400 pointer-events-none">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </span>
                    </div>
                    @error('kategori') <p class="text-xs text-rose-600 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-3 group">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1 group-focus-within:text-maroon-dark transition-colors duration-300">
                        Gambar Utama Berita
                    </label>
                    
                    @if($berita->gambar && file_exists(public_path('storage/berita/' . $berita->gambar)))
                        <div class="flex items-center gap-4 p-4 bg-gray-50/60 rounded-2xl border border-gray-200/60 max-w-md animate__animated animate__fadeIn">
                            <div class="w-24 h-16 rounded-xl overflow-hidden shadow-sm bg-slate-100 flex-shrink-0 border border-gray-200">
                                <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="Current Image" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <span class="text-[10px] font-black text-emerald-700 bg-emerald-50 border border-emerald-200/50 px-2 py-0.5 rounded-md inline-block mb-1"><i class="fa-solid fa-image-portrait"></i> Gambar Aktif</span>
                                <p class="text-[10px] text-gray-400 break-all max-w-[240px] font-medium">{{ $berita->gambar }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="relative flex items-center">
                        <span class="absolute left-5 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300 z-10 pointer-events-none">
                            <i class="fa-solid fa-image text-base"></i>
                        </span>
                        <input type="file" name="gambar" accept="image/*"
                            class="w-full pl-12 pr-5 py-3.5 bg-gray-50/50 border border-gray-200/60 rounded-2xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-600 shadow-inner focus:bg-white file:mr-4 file:py-1.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-black file:uppercase file:tracking-wider file:bg-rose-50 file:text-maroon-dark hover:file:bg-rose-100 file:cursor-pointer cursor-pointer">
                    </div>
                    <p class="text-[10px] text-gray-400 font-medium ml-1">Pilih file baru jika ingin mengganti gambar (Format: JPG, JPEG, PNG, WEBP. Maks 2 MB).</p>
                    @error('gambar') <p class="text-xs text-rose-600 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1.5 group">
                    <div class="flex items-center justify-between px-1">
                        <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block group-focus-within:text-maroon-dark transition-colors duration-300">
                            Isi / Konten Berita Lengkap
                        </label>
                        <span id="counterBadge" class="text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded-md transition-all duration-300">
                            0 Karakter
                        </span>
                    </div>
                    <div class="relative">
                        <textarea name="konten" id="newsTextArea" rows="9" required
                            class="w-full p-5 bg-gray-50/50 border border-gray-200/60 rounded-3xl focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 text-sm font-semibold text-gray-800 shadow-inner focus:bg-white leading-relaxed resize-none" 
                            placeholder="Tuliskan isi atau rincian berita secara lengkap dan jelas di sini...">{{ old('konten', $berita->konten) }}</textarea>
                    </div>
                    @error('konten') <p class="text-xs text-rose-600 font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4 flex flex-col sm:flex-row gap-4">
                    <button type="submit" class="flex-1 relative bg-gradient-to-r from-maroon-dark via-maroon-light to-rose-900 text-white py-4.5 rounded-2xl font-extrabold tracking-wider text-sm overflow-hidden transition-all duration-300 shadow-lg shadow-maroon-dark/20 hover:shadow-xl hover:shadow-maroon-dark/40 hover:scale-[1.01] active:scale-[0.99] group/btn">
                        <span class="relative z-10 flex items-center justify-center gap-2">
                            PERBARUI BERITA SEKARARANG <i class="fa-solid fa-folder-plus text-xs transition-transform group-hover/btn:scale-110"></i>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-amber-500 to-rose-600 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500 mix-blend-screen"></div>
                    </button>
                </div>
                
            </div>
        </form>
    </div>  
</div>

<style>
    .custom-berita-font { font-family: 'Plus Jakarta Sans', sans-serif; }
    .group-focus-within input, .group-focus-within select, .group-focus-within textarea {
        box-shadow: 0 10px 25px -5px rgba(74, 14, 14, 0.04);
    }
    .py-4\.5 { padding-top: 1.125rem; padding-bottom: 1.125rem; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const newsTextArea = document.getElementById('newsTextArea');
        const counterBadge = document.getElementById('counterBadge');

        function updateCounter() {
            const charCount = newsTextArea.value.length;
            counterBadge.textContent = charCount + ' Karakter';

            if(charCount > 0) {
                counterBadge.className = 'text-[10px] font-bold text-maroon-dark bg-rose-50 border border-maroon-dark/10 px-2 py-0.5 rounded-md transition-all duration-300';
            } else {
                counterBadge.className = 'text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded-md transition-all duration-300';
            }
        }

        newsTextArea.addEventListener('input', updateCounter);
        updateCounter();
    });
</script>
@endsection