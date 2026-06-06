@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-4xl">
        
        {{-- Tombol Kembali --}}
        <div class="mb-6">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-sm font-bold text-maroon-dark hover:underline">
                <i class="fas fa-arrow-left text-xs"></i> Kembali ke Beranda
            </a>
        </div>

        <div class="bg-white rounded-[40px] p-6 md:p-12 shadow-sm border border-gray-100">
            {{-- Kategori & Tanggal --}}
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-teal-600 text-white text-[10px] font-bold px-4 py-1.5 rounded-full uppercase tracking-widest">
                    {{ $berita->kategori }}
                </span>
                <span class="text-xs text-gray-400 font-medium">
                    <i class="far fa-calendar-alt mr-1"></i> {{ $berita->created_at ? $berita->created_at->format('d M Y') : now()->format('d M Y') }}
                </span>
            </div>

            {{-- Judul Utama --}}
            <h1 class="text-2xl md:text-4xl font-extrabold text-maroon-dark mb-8 leading-tight">
                {{ $berita->judul }}
            </h1>

            {{-- Gambar Utama Berita (Jika ada kolom foto/gambar) --}}
            @if(isset($berita->foto) && $berita->foto && file_exists(public_path('uploads/berita/' . $berita->foto)))
                <div class="w-full h-[400px] rounded-[30px] overflow-hidden mb-8 shadow-sm">
                    <img src="{{ asset('uploads/berita/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                </div>
            @elseif(isset($berita->gambar) && $berita->gambar && file_exists(public_path('uploads/berita/' . $berita->gambar)))
                <div class="w-full h-[400px] rounded-[30px] overflow-hidden mb-8 shadow-sm">
                    <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                </div>
            @endif

            {{-- Isi Konten Berita --}}
            <div class="prose max-w-none text-gray-700 leading-relaxed text-base space-y-4">
                {!! nl2br(e($berita->konten)) !!}
            </div>

        </div>
    </div>
</section>
@endsection