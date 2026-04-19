@extends('layouts.app')

@section('content')
<div class="bg-[#f9f5f6] min-h-screen pb-20 animate-[fadeIn_0.6s_ease-out]">
    <div class="container mx-auto px-4 pt-6 max-w-6xl">
        <div class="bg-maroon-dark text-white text-center py-8 md:py-10 rounded-[35px] shadow-lg mb-8 transition-all duration-500 hover:shadow-maroon-dark/20">
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold uppercase tracking-widest mb-2 px-4">Program & Kegiatan Kesehatan</h1>
            <p class="text-[10px] md:text-xs opacity-80 font-light italic px-6">Berbagai program promotif dan preventif untuk meningkatkan derajat kesehatan masyarakat Kutablang</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10 mx-2">
          <div class="bg-white border-b-4 border-maroon-dark p-5 rounded-[25px] shadow-sm text-center hover:scale-105 hover:shadow-md transition-all duration-300">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Imunisasi Dasar</p>
                <h3 class="text-xl font-black text-maroon-dark">95%</h3>
                <p class="text-[9px] text-gray-500 italic">Capaian Tahun 2025</p>
            </div>
        <div class="bg-white border-b-4 border-maroon-dark p-5 rounded-[25px] shadow-sm text-center hover:scale-105 hover:shadow-md transition-all duration-300">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Gizi Baik Balita</p>
                <h3 class="text-xl font-black text-teal-600">92%</h3>
                <p class="text-[9px] text-gray-500 italic">Kesehatan Anak</p>
            </div>
            <div class="bg-white border-b-4 border-maroon-dark p-5 rounded-[25px] shadow-sm text-center hover:scale-105 hover:shadow-md transition-all duration-300">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Peserta Prolanis</p>
                <h3 class="text-xl font-black text-orange-400">180</h3>
                <p class="text-[9px] text-gray-500 italic">Anggota Aktif</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-6xl">
        <div class="space-y-8">
            <div class="bg-white rounded-[40px] p-6 md:p-8 shadow-sm border border-gray-50 flex flex-col lg:flex-row gap-8 hover:shadow-md transition-all duration-500 group">
                <div class="lg:w-2/5 overflow-hidden rounded-[30px] relative h-64 lg:h-auto">
                    <img src="{{ asset('images/posyanduu.jpg') }}" alt="Posyandu" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute top-4 left-4 bg-maroon-dark text-white px-3 py-1.5 rounded-xl text-[10px] font-bold shadow-lg">
                        Rutin Bulanan
                    </div>
                </div>

                <div class="lg:w-3/5 flex flex-col justify-center">
                    <h3 class="text-xl md:text-2xl font-black text-maroon-dark mb-3 flex items-center gap-2">
                        Posyandu
                        <span class="h-1 w-10 bg-maroon-dark/20 rounded-full"></span>
                    </h3>
                    <p class="text-gray-600 leading-relaxed mb-6 text-xs md:text-sm">
                        Program Pos Pelayanan Terpadu untuk pemantauan kesehatan ibu hamil, bayi, dan balita. Kegiatan meliputi penimbangan berat badan, pengukuran tinggi badan, imunisasi, pemberian vitamin A, konseling gizi, dan pemeriksaan kesehatan ibu hamil.
                    </p>

                    <div class="bg-[#f9f5f6] p-5 rounded-[30px] mb-6 border border-maroon-dark/5">
                        <h4 class="font-bold text-maroon-dark text-[11px] mb-3 uppercase tracking-wider">Aktivitas Utama:</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-2 text-[11px] text-gray-600 font-medium">
                            <li class="flex items-center gap-2"> <span class="text-maroon-dark">✔</span> Penimbangan dan pengukuran balita</li>
                            <li class="flex items-center gap-2"> <span class="text-maroon-dark">✔</span> Imunisasi dasar dan booster</li>
                            <li class="flex items-center gap-2"> <span class="text-maroon-dark">✔</span> Pemberian vitamin A & obat cacing</li>
                            <li class="flex items-center gap-2"> <span class="text-maroon-dark">✔</span> Pemeriksaan ibu hamil (ANC)</li>
                            <li class="flex items-center gap-2"> <span class="text-maroon-dark">✔</span> Konseling KB & Gizi</li>
                            <li class="flex items-center gap-2"> <span class="text-maroon-dark">✔</span> Deteksi dini tumbuh kembang</li>
                        </ul>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <div class="bg-white border border-gray-100 px-3 py-2 rounded-xl shadow-sm flex-1">
                            <span class="text-[9px] text-gray-400 block uppercase font-bold">Jadwal</span>
                            <span class="text-maroon-dark text-[10px] font-bold italic"> Rabu minggu ke-2 dan ke-4, pukul 09:00-12:00</span>
                        </div>
                        <div class="bg-white border border-gray-100 px-3 py-2 rounded-xl shadow-sm flex-1">
                            <span class="text-[9px] text-gray-400 block uppercase font-bold">Lokasi</span>
                            <span class="text-maroon-dark text-[10px] font-bold italic">12 posyandu di Balai RW seluruh kelurahan</span>
                        </div>
                        <div class="bg-white border border-gray-100 px-3 py-2 rounded-xl shadow-sm flex-1">
                            <span class="text-[9px] text-gray-400 block uppercase font-bold">Target</span>
                            <span class="text-maroon-dark text-[10px] font-bold italic"> 850 balita terdaftar, 285 ibu hamil</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="mt-16 bg-[#cce7e8] rounded-[40px] p-10 text-center relative overflow-hidden group border border-teal-50/50">
            <div class="relative z-10">
                <h3 class="text-xl md:text-2xl font-black text-teal-900 mb-2">Ikut Serta dalam Program Kami</h3>
                <p class="text-xs text-gray-600 mb-6 max-w-sm mx-auto">Mari bersama-sama meningkatkan kesehatan masyarakat Kutablang melalui program-program berkualitas</p>
                <div class="flex justify-center">
                    <a href="#" class="bg-maroon-dark text-white px-8 py-3 rounded-2xl font-bold text-xs shadow-md hover:scale-105 active:scale-95 transition-all">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-white/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-1000"></div>
        </section>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endsection
