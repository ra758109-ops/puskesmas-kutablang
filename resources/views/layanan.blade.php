@extends('layouts.app')

@section('title', 'Layanan Kesehatan - Puskesmas Kutablang')

@section('content')
<main class="container mx-auto px-4 py-8 md:py-12">
    <section class="text-center mb-10 bg-maroon-dark/5 py-12 px-6 rounded-[40px]">
        <h1 class="text-maroon-dark text-3xl md:text-4xl font-bold mb-3">Layanan Kesehatan Kami</h1>
        <p class="text-gray-600 text-sm md:text-base max-w-2xl mx-auto">
            Pelayanan kesehatan yang lengkap, berkualitas, dan terjangkau untuk seluruh masyarakat Kutablang.
        </p>
    </section>

    <div class="space-y-8 max-w-5xl mx-auto">
        <section class="bg-maroon-dark/[0.06] rounded-[40px] shadow-md p-6 md:p-10 transition-all hover:shadow-lg border border-maroon-dark/5">
            <div class="flex flex-col md:flex-row gap-6 items-start mb-6">
                <div class="shrink-0 bg-white p-3 rounded-2xl shadow-sm">
                    <img src="{{ asset('images/hospital.png') }}" class="w-16 h-16 object-contain" alt="Icon Rawat Jalan">
                </div>
                <div>
                    <h2 class="text-maroon-dark text-xl md:text-2xl font-bold mb-2">Rawat Jalan</h2>
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed">
                        Layanan pemeriksaan kesehatan umum dan penanganan berbagai penyakit. Kami memiliki dokter umum dan perawat berpengalaman yang siap melayani Anda dengan ramah dan profesional.
                    </p>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-base font-bold mb-4 text-gray-800">Layanan Meliputi:</h3>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <li class="flex items-center gap-3 text-sm md:text-base text-gray-700 group">
                        <img src="{{ asset('images/alatperiksaa.png') }}" class="w-8 h-8 group-hover:scale-110 transition-transform" alt="">
                        Pemeriksaan kesehatan umum
                    </li>
                    <li class="flex items-center gap-3 text-sm md:text-base text-gray-700 group">
                        <img src="{{ asset('images/dokter.png') }}" class="w-8 h-8 group-hover:scale-110 transition-transform" alt="">
                        Konsultasi dokter
                    </li>
                    <li class="flex items-center gap-3 text-sm md:text-base text-gray-700 group">
                        <img src="{{ asset('images/termometer.jpeg') }}" class="w-8 h-8 group-hover:scale-110 transition-transform" alt="">
                        Penanganan penyakit ringan
                    </li>
                    <li class="flex items-center gap-3 text-sm md:text-base text-gray-700 group">
                        <img src="{{ asset('images/cekdarahgula.png') }}" class="w-8 h-8 group-hover:scale-110 transition-transform" alt="">
                        Cek Tekanan & Gula Darah
                    </li>
                </ul>

                <div class="mt-8 p-5 bg-white rounded-2xl shadow-inner border border-gray-100 text-sm">
                    <p class="mb-1"><strong class="text-maroon-dark">Jam Layanan:</strong> Senin-Jumat 08:00-16:00, Sabtu 08:00-12:00</p>
                    <p><strong>Biaya:</strong> BPJS diterima. Biaya umum Rp 15.000 - Rp 30.000</p>
                </div>

                <a href="/pendaftaran" class="inline-block mt-6 bg-maroon-dark text-white px-8 py-3 text-base font-semibold rounded-xl shadow-md hover:brightness-110 transition-all active:scale-95">
                    Daftar Sekarang
                </a>
            </div>
        </section>

        <section class="bg-maroon-dark/[0.06] rounded-[40px] shadow-md p-6 md:p-10 transition-all hover:shadow-lg border border-maroon-dark/5">
            <div class="flex flex-col md:flex-row gap-6 items-start mb-6">
                <div class="shrink-0 bg-white p-3 rounded-2xl shadow-sm">
                    <img src="{{ asset('images/suntik.jpeg') }}" class="w-16 h-16 object-contain" alt="Icon Imunisasi">
                </div>
                <div>
                    <h2 class="text-maroon-dark text-xl md:text-2xl font-bold mb-2">Imunisasi</h2>
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed">
                        Program imunisasi lengkap untuk melindungi bayi, anak, dan dewasa dari berbagai penyakit berbahaya sesuai jadwal Kemenkes RI.
                    </p>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-base font-bold mb-4 text-gray-800">Jenis Imunisasi:</h3>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <li class="flex items-center gap-3 text-sm md:text-base text-gray-700 group">
                        <img src="{{ asset('images/bayi.png') }}" class="w-8 h-8 group-hover:scale-110 transition-transform" alt="">
                        Imunisasi Dasar (BCG, Polio, dll)
                    </li>
                    <li class="flex items-center gap-3 text-sm md:text-base text-gray-700 group">
                        <img src="{{ asset('images/imunisasi lanjutan.jpeg') }}" class="w-8 h-8 group-hover:scale-110 transition-transform" alt="">
                        Imunisasi Lanjutan (Rubella, dll)
                    </li>
                </ul>

                <div class="mt-8 p-5 bg-white rounded-2xl shadow-inner border border-gray-100 text-sm">
                    <p class="mb-1"><strong class="text-maroon-dark">Jadwal:</strong> Setiap hari Selasa dan Kamis, 09:00-12:00</p>
                    <p><strong>Biaya:</strong> Imunisasi dasar <span class="text-green-600 font-bold uppercase">Gratis</span></p>
                </div>

                <a href="/pendaftaran" class="inline-block mt-6 bg-maroon-dark text-white px-8 py-3 text-base font-semibold rounded-xl shadow-md hover:brightness-110 transition-all active:scale-95">
                    Daftar Imunisasi
                </a>
            </div>
        </section>
    </div>
</main>
@endsection