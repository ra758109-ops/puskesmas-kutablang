@extends('layouts.app')

@section('title', 'Layanan Medis')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    .custom-service-font {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ⚡ SAMA PERSIS: Gerakan akordeon asli kamu tidak diubah sama sekali */
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
                Layanan Kesehatan Kami
            </h1>
        </div>
    </section>

    {{-- CARD LAYANAN (Struktur flex & tinggi bawaan kamu dipertahankan) --}}
    <div class="flex flex-col md:flex-row h-auto md:h-[550px] w-full gap-2 overflow-hidden rounded-[30px] bg-gray-100 p-2 shadow-2xl">

        @forelse($services ?? [] as $index => $item)

        @php
            $colors = [
                '#967146',
                '#D4A373',
                '#3B426E',
                '#2D4F3B',
                '#1A2A3A',
                '#700B21'
            ];

            $bgColor = $colors[$index % count($colors)];

            // Pilihan gambar medis untuk background transparan di dalam kartu
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

            {{-- 📸 TAMBAHAN: Gambar Background Transparan yang menyatu dengan warna kartu --}}
            <div class="absolute inset-0 z-0 bg-cover bg-center opacity-15 group-hover:opacity-25 mix-blend-luminosity scale-100 group-hover:scale-105 transition-all duration-700"
                 style="background-image: url('{{ $bgImg }}')"></div>

            {{-- Overlay bayangan agar teks putih selalu terbaca jelas --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent z-10"></div>

            {{-- Content --}}
            <div class="absolute inset-0 p-6 flex flex-col justify-end text-white z-20">

                <div class="flex items-end gap-4">

                    {{-- Nomor --}}
                    <span class="text-5xl font-bold opacity-40 leading-none">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    {{-- Judul Vertikal --}}
                    <h2 class="text-xl font-bold vertical-text group-hover:hidden whitespace-nowrap mb-1">
                        {{ $item->nama_layanan }}
                    </h2>

                    {{-- Detail Hover --}}
                    <div class="hidden group-hover:block animate-details pb-2 w-full">

                        {{-- Icon --}}
                        <div class="text-4xl mb-3 filter drop-shadow">
                            <i class="{{ $item->ikon ?? 'fas fa-hospital' }}"></i>
                        </div>

                        <h2 class="text-3xl font-black mb-2 uppercase tracking-tight">
                            {{ $item->nama_layanan }}
                        </h2>

                        <p class="text-sm opacity-80 mb-4 max-w-xs leading-relaxed font-medium">
                            {{ $item->deskripsi_singkat }}
                        </p>

                        <div class="mb-4 text-[10px] font-bold tracking-widest uppercase opacity-60">
                            Online & Walk-in Registration
                        </div>

                        {{-- Tombol glassmorphism keren --}}
                        <a href="/pendaftaran?poli={{ $item->id }}"
                           class="inline-block bg-white/90 backdrop-blur border border-white/20 px-6 py-2.5 rounded-xl font-extrabold text-xs uppercase tracking-wider shadow-md hover:bg-white hover:scale-105 transition-all duration-200"
                           style="color: {{ $bgColor }}">
                            Daftar Sekarang <i class="fa-solid fa-arrow-right-long ml-1 text-[10px]"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        @empty
        {{-- Jika Tidak Ada Data --}}
        <div class="w-full flex items-center justify-center py-20">
            <p class="text-gray-400 italic">
                Maaf, saat ini belum ada layanan yang tersedia.
            </p>
        </div>
        @endforelse

    </div>
</main>
@endsection