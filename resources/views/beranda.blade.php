@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<section class="relative min-h-[calc(100vh-75px)] flex items-center overflow-hidden">

    <div class="absolute inset-0 z-[-1] bg-cover bg-center scale-110 animate-[slowZoomOut_3s_ease-out_forwards]"
         style="background-image: url('{{ asset('images/kutablang.png') }}');">
    </div>

    <div class="absolute inset-0 z-0 bg-gradient-to-r from-white/40 to-transparent"></div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <h1 class="text-maroon-dark font-extrabold text-4xl md:text-7xl leading-tight mb-6 drop-shadow-[2px_2px_10px_rgba(255,255,255,0.8)]">
            Generasi Sehat<br>Masyarakat Kutablang
        </h1>

        <div class="bg-white/85 backdrop-blur-md border-[3px] border-blue-border rounded-[30px] p-6 md:px-10 md:py-8 max-w-[850px] shadow-sm mb-8">
            <p class="font-semibold text-lg text-gray-800 mb-2">
                Pelayanan kesehatan primer yang ramah, cepat, dan terjangkau.
            </p>
            <p class="text-gray-700 opacity-75 leading-relaxed">
                Kami menyediakan layanan imunisasi, KIA, gizi, KB, rawat jalan, dan laboratorium untuk kesehatan keluarga Anda.
            </p>
        </div>
    <div class="flex flex-wrap gap-4 items-center">
        <a href="#" class="bg-maroon-dark text-white px-8 py-3 rounded-full font-semibold hover:bg-opacity-90 hover:scale-105 hover:-translate-y-1 transition-all duration-300 flex items-center shadow-md active:scale-95">
            Layanan Kami
        </a>

        <a href="#" class="bg-pink-soft text-maroon-dark px-8 py-3 rounded-full font-semibold hover:opacity-80 hover:scale-105 hover:-translate-y-1 transition-all duration-300 shadow-md active:scale-95">
            Buat Janji Temu
        </a>

                <a href="https://wa.me/+6281234567890" target="_blank" class="bg-maroon-dark text-white px-8 py-3 rounded-full font-semibold hover:bg-opacity-90 hover:scale-105 hover:-translate-y-1 transition-all duration-300 flex items-center gap-3 shadow-md active:scale-95">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" class="w-5 invert brightness-0" alt="WA">
            Hubungi Via WhatsApp
        </a>
    </div>
</section>

<style>
    @keyframes slowZoomOut {
        from { transform: scale(1.1); }
        to { transform: scale(1); }
    }
</style>
@endsection
