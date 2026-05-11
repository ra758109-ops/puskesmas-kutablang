@extends('layouts.app')

@section('title', 'Layanan Kesehatan - Puskesmas Kutablang')

@section('content')

<style>
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

<main class="container mx-auto px-4 py-12">

    {{-- HEADER --}}
    <section class="text-center mb-12">
        <div class="inline-block bg-[#700B21] text-white px-10 py-3 rounded-full shadow-xl mb-6">
            <h1 class="text-2xl md:text-3xl font-bold italic">
                Layanan Kesehatan Kami
            </h1>
        </div>
    </section>

    {{-- CARD LAYANAN --}}
    <div class="flex flex-col md:flex-row h-auto md:h-[550px] w-full gap-2 overflow-hidden rounded-[30px] bg-gray-100 p-2 shadow-2xl">

        @forelse($services as $index => $item)

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
        @endphp

        <div class="group relative flex-1 transition-flex hover:flex-[6] overflow-hidden rounded-2xl cursor-pointer"
             style="background-color: {{ $bgColor }}">

            {{-- Overlay --}}
            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-all"></div>

            {{-- Content --}}
            <div class="absolute inset-0 p-6 flex flex-col justify-end text-white">

                <div class="flex items-end gap-4">

                    {{-- Nomor --}}
                    <span class="text-5xl font-bold opacity-40">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    {{-- Judul Vertikal --}}
                    <h2 class="text-xl font-bold vertical-text group-hover:hidden whitespace-nowrap">
                        {{ $item->nama_layanan }}
                    </h2>

                    {{-- Detail Hover --}}
                    <div class="hidden group-hover:block animate-details pb-2">

                        {{-- Icon --}}
                        <div class="text-4xl mb-3">
                            <i class="{{ $item->ikon ?? 'fas fa-hospital' }}"></i>
                        </div>

                        <h2 class="text-3xl font-bold mb-2">
                            {{ $item->nama_layanan }}
                        </h2>

                        <p class="text-sm opacity-90 mb-4 max-w-xs">
                            {{ $item->deskripsi_singkat }}
                        </p>

                        <div class="mb-4 text-xs opacity-80">
                            Online & Walk-in Registration
                        </div>

                        <a href="/pendaftaran?poli={{ $item->id }}"
                           class="bg-white px-5 py-2 rounded-lg font-bold text-xs uppercase tracking-wider"
                           style="color: {{ $bgColor }}">
                            Daftar Sekarang
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