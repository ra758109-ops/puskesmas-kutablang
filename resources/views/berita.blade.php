@extends('layouts.app')

@section('content')
<main class="bg-gray-50 min-h-screen"> {{-- Ganti bg-white ke gray-50 biar card putihnya 'pop out' --}}

    <section class="relative bg-gradient-to-br from-[#FDF2F2] to-[#FFE4E6] py-20 px-6 overflow-hidden border-b border-red-50">
        {{-- Background Pattern (Titik-titik halus) --}}
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#4A0E0E 0.5px, transparent 0.5px); background-size: 10px 10px;"></div>

        <div class="absolute right-10 bottom-0 opacity-20 lg:opacity-100 hidden md:block animate-bounce-slow">
            <img src="https://cdn-icons-png.flaticon.com/512/1997/1997972.png" class="w-48 transform -rotate-12" alt="megaphone">
        </div>

        <div class="max-w-7xl mx-auto text-center relative z-10">
            <span class="bg-red-100 text-[#4A0E0E] px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest mb-4 inline-block">Update Terkini</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-[#4A0E0E] mb-6 tracking-tight">Berita & Pengumuman</h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-base md:text-lg leading-relaxed">
                Informasi terbaru seputar layanan dan kegiatan operasional di lingkungan Puskesmas Kutablang untuk masyarakat luas.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            {{-- Template Card Berita --}}
            @php
                $berita = [
                    ['title' => 'Kampanye Imunisasi Campak dan Rubella', 'date' => '15 Sept 2025', 'slug' => 'kampanye-imunisasi', 'desc' => 'Puskesmas Kutablang mengadakan kampanye imunisasi campak dan rubella gratis untuk anak usia 9 bulan hingga 15 tahun.'],
                    ['title' => 'Pemeriksaan Kesehatan Gratis', 'date' => '10 Sept 2025', 'slug' => 'pemeriksaan-kesehatan-gratis', 'desc' => 'Dalam rangka memperingati HUT RI, kami mengadakan pemeriksaan kesehatan gratis meliputi cek gula darah dan kolesterol.'],
                    ['title' => 'Jadwal Posyandu Bulan Oktober', 'date' => '05 Sept 2025', 'slug' => 'jadwal-posyandu-bulan-oktober', 'desc' => 'Simak jadwal lengkap kunjungan posyandu di setiap dusun untuk memantau tumbuh kembang si buah hati.'],
                    ['title' => 'Senam Prolanis Rutin Setiap Jumat', 'date' => '01 Sept 2025', 'slug' => 'Senam-Prolanis-Rutin-Setiap-Jumat', 'desc' => 'Program senam sehat khusus lansia dilakukan setiap Jumat pagi pukul 07:00 di halaman utama Puskesmas.'],
                    ['title' => 'Penyuluhan Kesehatan di SD Negeri 01', 'date' => '25 Agst 2025', 'slug' => 'penyuluhan-kesehatan-di-SD-Negeri-01', 'desc' => 'Tim puskesmas memberikan edukasi tentang PHBS serta pentingnya menjaga kesehatan gigi sejak dini.'],
                    ['title' => 'Layanan BPJS Kini Lebih Mudah', 'date' => '20 Agst 2025', 'slug' => 'layanan-BPJS-kini-lebih-mudah', 'desc' => 'Kini pasien BPJS dapat melakukan pendaftaran online melalui sistem kami agar proses lebih cepat.'],
                ];
            @endphp

            @foreach($berita as $b)
            <div class="group bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
                {{-- Accent Bar --}}
                <div class="absolute top-0 left-0 w-2 h-full bg-[#4A0E0E] opacity-0 group-hover:opacity-100 transition-opacity"></div>

                <div>
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-xs text-red-800 font-bold uppercase tracking-wider bg-red-50 px-3 py-1 rounded-lg">{{ $b['date'] }}</p>
                    </div>
                    <h3 class="font-bold text-xl text-gray-800 mb-3 leading-tight group-hover:text-[#4A0E0E] transition-colors">{{ $b['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-8">
                        {{ $b['desc'] }}
                    </p>
                </div>
                <a href="/berita/{{ $b['slug'] }}" class="inline-flex items-center justify-center w-full bg-[#E9F7F5] text-[#2D7A6E] font-bold py-3 px-6 rounded-2xl text-xs hover:bg-[#2D7A6E] hover:text-white transition-all duration-300 group/btn">
                    Baca Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @endforeach

        </div>
    </section>

    <section class="max-w-5xl mx-auto px-6 py-20 mb-20">
        <div class="bg-white border-2 border-gray-100 p-10 md:p-16 rounded-[3.5rem] shadow-xl relative">
            {{-- Decorative Quote Mark --}}
            <div class="absolute top-10 left-10 text-gray-100 text-8xl font-serif select-none">“</div>

            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-12 relative z-10">Pertanyaan Umum <span class="text-red-900 italic">(FAQ)</span></h2>

            <div class="space-y-6 relative z-10">
                @php
                    $faqs = [
                        ['q' => 'Apakah saya perlu membuat janji untuk berobat?', 'a' => 'Anda bisa datang langsung atau membuat janji online melalui sistem kami untuk mendapat nomor antrean lebih awal.'],
                        ['q' => 'Apakah Puskesmas menerima BPJS?', 'a' => 'Ya, kami melayani pasien BPJS Kesehatan untuk seluruh unit layanan. Pastikan kartu Anda aktif.'],
                        ['q' => 'Berapa lama hasil laboratorium keluar?', 'a' => 'Cek rutin sekitar 15-30 menit, sedangkan pemeriksaan kompleks bisa memakan waktu hingga 24 jam.'],
                    ];
                @endphp

                @foreach($faqs as $faq)
                <div class="group bg-gray-50 p-8 rounded-3xl border border-transparent hover:border-red-100 hover:bg-white transition-all duration-300">
                    <h4 class="font-bold text-gray-800 mb-3 text-lg flex items-center">
                        <span class="w-2 h-2 bg-red-900 rounded-full mr-3"></span>
                        {{ $faq['q'] }}
                    </h4>
                    <p class="text-gray-500 text-sm leading-relaxed pl-5 border-l-2 border-gray-200 group-hover:border-red-200">
                        {{ $faq['a'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

<style>
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0) rotate(-12deg); }
        50% { transform: translateY(-15px) rotate(-8deg); }
    }
    .animate-bounce-slow {
        animation: bounce-slow 4s ease-in-out infinite;
    }
</style>
@endsection
