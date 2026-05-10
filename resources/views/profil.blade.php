@extends('layouts.app')

@section('content')
<main class="bg-gray-50 min-h-screen">
    {{-- Header Profil --}}
    <section class="relative bg-gradient-to-r from-[#4A0E0E] to-[#800000] py-20 px-6 overflow-hidden">
        <div class="max-w-7xl mx-auto text-center relative z-10" data-aos="zoom-out">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 tracking-tight">Profil Puskesmas</h1>
            <p class="text-pink-100 max-w-2xl mx-auto text-lg leading-relaxed">
                Mengenal lebih dekat sejarah, visi, misi, dan struktur organisasi Puskesmas Kutablang.
            </p>
        </div>
    </section>

    <div class="max-w-5xl mx-auto px-6 -mt-12 pb-24 relative z-20">

        {{-- Bagian Sejarah --}}
        <section class="bg-white p-10 md:p-16 rounded-[3rem] shadow-xl border border-gray-100 mb-12" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-12 h-1 bg-[#4A0E0E] rounded-full"></div>
                <h2 class="text-3xl font-bold text-gray-800">Sejarah</h2>
            </div>
            <p class="text-gray-600 leading-relaxed text-lg">
                Puskesmas Kutablang didirikan pada tahun 1985 sebagai pusat pelayanan kesehatan primer untuk masyarakat Kutablang dan sekitarnya. Selama lebih dari 40 tahun, kami telah melayani ribuan pasien dan terus berkomitmen meningkatkan kualitas layanan kesehatan.
            </p>
        </section>

        {{-- Bagian Visi & Misi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            {{-- Visi --}}
            <section class="bg-[#4A0E0E] p-10 rounded-[3rem] text-white shadow-lg" data-aos="fade-right" data-aos-delay="200">
                <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">Visi</h2>
                <p class="text-pink-50 text-lg leading-relaxed italic">
                    "Menjadi pusat kesehatan masyarakat yang unggul, profesional, dan terpercaya dalam memberikan pelayanan kesehatan primer yang berkualitas di Kutablang."
                </p>
            </section>

            {{-- Misi --}}
            <section class="bg-white p-10 rounded-[3rem] shadow-lg border border-gray-100" data-aos="fade-left" data-aos-delay="400">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Misi</h2>
                <ul class="space-y-4 text-gray-600 text-sm md:text-base">
                    <li class="flex gap-2"><span>•</span> Memberikan pelayanan kesehatan yang berkualitas, ramah, dan terjangkau.</li>
                    <li class="flex gap-2"><span>•</span> Meningkatkan derajat kesehatan masyarakat melalui program promotif dan preventif.</li>
                    <li class="flex gap-2"><span>•</span> Mengembangkan kompetensi tenaga kesehatan secara berkelanjutan.</li>
                    <li class="flex gap-2"><span>•</span> Menyediakan fasilitas dan peralatan kesehatan yang memadai.</li>
                    <li class="flex gap-2"><span>•</span> Menjalin kemitraan dengan berbagai pihak untuk meningkatkan akses layanan kesehatan.</li>
                </ul>
            </section>
        </div>

        {{-- Struktur Organisasi --}}
        <section class="bg-white p-10 md:p-16 rounded-[3rem] shadow-xl border border-gray-100" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Struktur Organisasi</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-8 rounded-[2.5rem] text-center border border-gray-100" data-aos="zoom-in" data-aos-delay="100">
                    <h4 class="font-bold text-[#4A0E0E] text-xl">Kepala Puskesmas</h4>
                    <p class="text-gray-800 mt-2 font-semibold">dr. Ahmad Hidayat, M.Kes</p>
                </div>
                <div class="bg-gray-50 p-8 rounded-[2.5rem] text-center border border-gray-100" data-aos="zoom-in" data-aos-delay="300">
                    <h4 class="font-bold text-[#4A0E0E] text-xl">Kepala TU</h4>
                    <p class="text-gray-800 mt-2 font-semibold">Sri Wahyuni, S.Sos</p>
                </div>
                <div class="bg-gray-50 p-8 rounded-[2.5rem] text-center border border-gray-100" data-aos="zoom-in" data-aos-delay="500">
                    <h4 class="font-bold text-[#4A0E0E] text-xl">Tim Medis</h4>
                    <ul class="text-gray-600 text-sm mt-2">
                        <li>4 Dokter Umum, 8 Perawat</li>
                        <li>2 Bidan, 2 Nutrisionis</li>
                        <li>1 Apoteker</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection
