@extends('layouts.app')

@section('title', 'Layanan Medis')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    .custom-service-font {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ⚡ ELEMEN AKORDEON INTERAKTIF */
    .transition-flex {
        transition: flex 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .vertical-text {
        writing-mode: vertical-lr;
        text-orientation: mixed;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-details {
        animation: fadeIn 0.5s ease-out forwards;
    }
</style>

<main class="container mx-auto px-4 py-12 custom-service-font">

    {{-- HEADER --}}
    <section class="text-center mb-12">
        <div class="inline-block bg-[#700B21] text-white px-10 py-3 rounded-full shadow-xl mb-6">
            <h1 class="text-2xl md:text-3xl font-bold italic">
                Layanan Kesehatan Utama
            </h1>
        </div>
    </section>

    {{-- CARD LAYANAN AKORDEON --}}
    <div class="flex flex-col md:flex-row h-auto md:h-[550px] w-full gap-2 overflow-hidden rounded-[30px] bg-gray-100 p-2 shadow-2xl">

        @forelse($polis ?? [] as $index => $poli)

        @php
            // Palet warna latar belakang kartu
            $colors = [
                '#967146', '#D4A373', '#3B426E', '#2D4F3B', '#1A2A3A', '#700B21'
            ];
            $bgColor = $colors[$index % count($colors)];

            // Gambar pelapis medis transparan (Unsplash fallback)
            $bgImages = [
                'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=600&q=80',
                'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=600&q=80',
                'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=600&q=80',
                'https://images.unsplash.com/photo-1516841273335-e39b37888115?auto=format&fit=crop&w=600&q=80',
                'https://images.unsplash.com/photo-1581056771107-24ca5f033842?auto=format&fit=crop&w=600&q=80',
                'https://images.unsplash.com/photo-1579684389782-64d84b5e901a?auto=format&fit=crop&w=600&q=80'
            ];
            $bgImg = $bgImages[$index % count($bgImages)];
        @endphp

        <div class="group relative flex-1 transition-flex hover:flex-[6] overflow-hidden rounded-2xl cursor-pointer"
             style="background-color: {{ $bgColor }}">

            {{-- 🛠️ PERBAIKAN OPTIMALISASI GAMBAR BACKGROUND --}}
            {{-- Opacity dinaikkan dari 15 ke 30 (saat idle) dan 50 (saat hover) agar tekstur gambar terlihat jelas --}}
            <div class="absolute inset-0 z-0 bg-cover bg-center opacity-30 group-hover:opacity-50 mix-blend-multiply scale-100 group-hover:scale-105 transition-all duration-700"
                 style="background-image: url('{{ $bgImg }}')"></div>

            {{-- Overlay bayangan gradasi text --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent z-10"></div>

            {{-- Konten Utama Kartu --}}
            <div class="absolute inset-0 p-6 flex flex-col justify-end text-white z-20">

                <div class="flex items-end gap-4">

                    {{-- Nomor urut pendaftaran --}}
                    <span class="text-5xl font-bold opacity-40 leading-none">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    {{-- Judul Vertikal (Muncul saat kartu mengecil/idle) --}}
                    <h2 class="text-xl font-bold vertical-text group-hover:hidden whitespace-nowrap mb-1 tracking-tight">
                        {{ $poli->nama_poli }}
                    </h2>

                    {{-- Detail Informasi (Mekar saat kursor melakukan hover) --}}
                    <div class="hidden group-hover:block animate-details pb-2 w-full">

                        {{-- 🛠️ PERBAIKAN: IKON GAMBAR INPUTAN ADMIN --}}
                        {{-- Jika admin mengunggah file ikon gambar, tampilkan gambar tersebut, jika tidak ada pakai ikon default font-awesome --}}
                        <div class="mb-3 filter drop-shadow">
                            @if($poli->ikon && file_exists(public_path('uploads/layanan/' . $poli->ikon)))
                                <img src="{{ asset('uploads/layanan/' . $poli->ikon) }}" alt="Ikon {{ $poli->nama_poli }}" class="h-12 w-12 object-contain brightness-0 invert">
                            @else
                                <div class="text-4xl"><i class="fas fa-hand-holding-medical"></i></div>
                            @endif
                        </div>

                        {{-- Nama Poliklinik dari Database --}}
                        <h2 class="text-3xl font-black mb-2 uppercase tracking-tight">
                            {{ $poli->nama_poli }}
                        </h2>

                        {{-- Deskripsi Poliklinik --}}
                        <p class="text-sm opacity-90 mb-4 max-w-md leading-relaxed font-medium">
                            {{ Str::limit($poli->deskripsi, 120) }}
                        </p>

                        <div class="mb-4 text-[10px] font-bold tracking-widest uppercase opacity-60">
                            Online & Walk-in Registration
                        </div>

                        {{-- Tombol Registrasi Terintegrasi --}}
                        <a href="{{ url('/pendaftaran?poli=' . $poli->id) }}"
                           class="inline-block bg-white/90 backdrop-blur border border-white/20 px-6 py-2.5 rounded-xl font-extrabold text-xs uppercase tracking-wider shadow-md hover:bg-white hover:scale-105 transition-all duration-200"
                           style="color: {{ $bgColor }}">
                            Daftar Sekarang <i class="fa-solid fa-arrow-right-long ml-1 text-[10px]"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        @empty
        {{-- Kondisi Cadangan Jika Tabel Poli Masih Kosong --}}
        <div class="w-full flex flex-col items-center justify-center py-20 bg-white rounded-2xl border-2 border-dashed border-gray-200">
            <i class="fas fa-notes-medical text-4xl text-gray-300 mb-3"></i>
            <p class="text-gray-400 italic text-sm font-semibold">
                Maaf, saat ini belum ada data poliklinik yang diinputkan oleh admin.
            </p>
        </div>
        @endforelse

    </div>
</main>
@endsection