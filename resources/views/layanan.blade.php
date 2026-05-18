@extends('layouts.app')

@section('title', 'Layanan Medis')

@section('content')
{{-- HERO SECTION --}}
<section class="bg-gradient-to-r from-maroon-dark to-slate-900 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-cover bg-center" style="background-image: url('{{ asset('images/kutablang.png') }}');"></div>
    <div class="container mx-auto px-4 relative z-10 text-center" data-aos="fade-down">
        <span class="text-teal-400 font-bold tracking-widest uppercase text-xs">Fasilitas & Perawatan</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mt-2 mb-4">Layanan Medis & Poliklinik</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-sm leading-relaxed">
            Puskesmas Kutablang menyediakan berbagai layanan kesehatan dasar yang komprehensif, ditangani oleh tenaga medis profesional untuk menjamin kesehatan Anda dan keluarga.
        </p>
    </div>
</section>

{{-- LIST LAYANAN (DINAMIS DARI DATABASE) --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($services ?? [] as $service)
            <div class="bg-white rounded-[35px] p-8 shadow-[0_10px_25px_rgba(0,0,0,0.02)] border border-gray-100 hover:shadow-xl transition-all duration-300 group" data-aos="fade-up">
                <div class="w-14 h-14 bg-maroon-dark/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-maroon-dark transition-colors duration-300">
                    {{-- Ikon Dinamis sesuai inputan admin kawanmu --}}
                    <i class="{{ $service->ikon ?? 'fas fa-stethoscope' }} text-2xl text-maroon-dark group-hover:text-white transition-colors duration-300"></i>
                </div>

                {{-- Nama Layanan / Poliklinik sesuai DB --}}
                <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-maroon-dark transition-colors">
                    {{ $service->nama_layanan }}
                </h3>

                {{-- Deskripsi Singkat sesuai DB --}}
                <p class="text-gray-500 text-sm leading-relaxed mb-4">
                    {{ $service->deskripsi_singkat }}
                </p>

                <div class="border-t border-gray-50 pt-4 flex items-center justify-between">
                    <span class="text-xs font-semibold text-teal-600 bg-teal-50 px-3 py-1 rounded-full">Tersedia</span>
                    <a href="{{ url('/pendaftaran') }}" class="text-xs font-bold text-slate-400 hover:text-maroon-dark transition-colors flex items-center gap-1">
                        Daftar Antrian <i class="fas fa-chevron-right text-[10px]"></i>
                    </a>
                </div>
            </div>
            @empty
            {{-- Tampilan Fallback jika database masih kosong --}}
            <div class="col-span-3 text-center py-8">
                <div class="inline-block p-8 bg-white rounded-3xl shadow-sm border border-dashed border-gray-300 w-full max-w-xl">
                    <i class="fas fa-briefcase-medical text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-400 italic text-sm">Belum ada data unit layanan medis yang dimasukkan dari admin.</p>
                </div>
            </div>
            @endforelse

        </div>
    </div>
</section>
@endsection
