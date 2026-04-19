@extends('layouts.app')

@section('content')
<div class="bg-[#f9f5f6] min-h-screen pb-20 animate-[fadeIn_0.5s_ease-out]">
    <div class="container mx-auto px-4 pt-6">
        <div class="bg-maroon-dark text-white text-center py-8 md:py-10 rounded-[40px] shadow-lg mb-6 transition-all duration-500 hover:shadow-maroon-dark/20">
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold uppercase tracking-widest mb-1">Jadwal Praktek Dokter & Tenaga Medis</h1>
            <p class="text-sm md:text-base opacity-80 font-light italic">Rencanakan kunjungan Anda dengan melihat jadwal praktek tenaga medis kami</p>
        </div>

        <div class="bg-white border-l-4 border-maroon-dark py-3 px-5 rounded-r-2xl text-[10px] md:text-xs mb-8 text-gray-600 mx-2 shadow-sm flex items-center gap-2 transition-all hover:shadow-md">
            <span class="text-blue-500 animate-pulse">ℹ️</span>
            <p><strong>Informasi Penting:</strong> Jadwal dapat berubah sewaktu-waktu. Hubungi (0771) 123-456 sebelum berkunjung.</p>
        </div>
    </div>

    <div class="container mx-auto px-4 space-y-16">
        <section>
            <h2 class="text-center text-maroon-dark font-extrabold text-2xl mb-8 uppercase tracking-tight">Jadwal Dokter Umum</h2>
            <div class="bg-white rounded-[35px] shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-center text-sm">
                        <thead>
                            <tr class="bg-maroon-dark text-white">
                                <th class="p-5 text-left font-semibold">Nama Dokter</th>
                                <th class="p-5 font-semibold">Senin</th>
                                <th class="p-5 font-semibold">Selasa</th>
                                <th class="p-5 font-semibold">Rabu</th>
                                <th class="p-5 font-semibold">Kamis</th>
                                <th class="p-5 font-semibold">Jumat</th>
                                <th class="p-5 font-semibold">Sabtu</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-600">
                            <tr class="hover:bg-maroon-dark/[0.05] transition-colors duration-200 cursor-default">
                                <td class="p-5 text-left font-bold text-maroon-dark">dr. Ahmad Hidayat</td>
                                <td>08:00-14:00</td><td>08:00-14:00</td><td>-</td><td>08:00-14:00</td><td>08:00-12:00</td><td>08:00-12:00</td>
                            </tr>
                            <tr class="hover:bg-maroon-dark/[0.05] transition-colors duration-200 bg-gray-50/30 cursor-default">
                                <td class="p-5 text-left font-bold text-maroon-dark">dr. Siti Nurhaliza</td>
                                <td>-</td><td>14:00-20:00</td><td>08:00-14:00</td><td>14:00-20:00</td><td>08:00-12:00</td><td>-</td>
                            </tr>
                            <tr class="hover:bg-maroon-dark/[0.05] transition-colors duration-200 cursor-default">
                                <td class="p-5 text-left font-bold text-maroon-dark">dr. Budi Santoso</td>
                                <td>14:00-20:00</td><td>14:00-20:00</td><td>14:00-20:00</td><td>-</td><td>14:00-20:00</td><td>-</td>
                            </tr>
                            <tr class="hover:bg-maroon-dark/[0.05] transition-colors duration-200 bg-gray-50/30 cursor-default">
                                <td class="p-5 text-left font-bold text-maroon-dark">dr. Rini Wijaya</td>
                                <td>08:00-14:30</td><td>-</td><td>08:00-14:30</td><td>08:00-14:30</td><td>-</td><td>08:00-12:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section>
            <h2 class="text-center text-maroon-dark font-extrabold text-2xl mb-8 uppercase tracking-tight">Jadwal Bidan</h2>
            <div class="bg-white rounded-[35px] shadow-md border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-center text-sm">
                        <thead>
                            <tr class="bg-maroon-dark text-white">
                                <th class="p-5 text-left font-semibold">Nama Bidan</th>
                                <th class="p-5 font-semibold">Hari</th>
                                <th class="p-5 font-semibold">Jam Layanan</th>
                                <th class="p-4 font-semibold text-right pr-10">Layanan Spesialis</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-600">
                            <tr class="hover:bg-maroon-dark/[0.05] transition-colors duration-200 cursor-default">
                                <td class="p-5 text-left font-bold text-maroon-dark">Bidan Rina, A.Md.Keb</td>
                                <td>Senin - Jumat</td><td>08:00 - 14:00</td><td class="text-right pr-10">KIA, KB, Persalinan</td>
                            </tr>
                            <tr class="hover:bg-maroon-dark/[0.05] transition-colors duration-200 bg-gray-50/30 cursor-default">
                                <td class="p-5 text-left font-bold text-maroon-dark">Bidan Devi, S.Tr.Keb</td>
                                <td>Senin - Sabtu</td><td>08:00 - 14:30</td><td class="text-right pr-10">KIA, Imunisasi, KB</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section>
            <h2 class="text-center text-maroon-dark font-extrabold text-2xl mb-10 tracking-widest">TIM MEDIS KAMI</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $teams = [
                    ['dr. Ahmad Hidayat', 'Dokter Umum', 'Spesialis Penyakit Dalam'],
                    ['dr. Siti Nurhaliza', 'Dokter Umum', 'Spesialis Anak'],
                    ['dr. Budi Santoso', 'Dokter Umum', 'Praktek Sore & Malam'],
                    ['dr. Rini Wijaya', 'Dokter Umum', 'Spesialis Lansia'],
                    ['Bidan Rina, A.Md.Keb', 'Bidan Senior', '10 Tahun Pengalaman'],
                    ['Bidan Devi, S.Tr.Keb', 'Bidan', 'Koordinator Imunisasi']
                ];
                @endphp
                @foreach($teams as $t)
                <div class="bg-white p-6 rounded-[35px] shadow-sm border border-gray-50 flex items-center gap-5 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group cursor-default">
                    <div class="w-16 h-16 bg-maroon-dark/5 group-hover:bg-maroon-dark group-hover:text-white rounded-2xl flex items-center justify-center text-2xl transition-all duration-300 transform group-hover:rotate-6">👤</div>
                    <div>
                        <h4 class="font-bold text-maroon-dark text-base leading-tight">{{ $t[0] }}</h4>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider mt-1 group-hover:text-maroon-dark transition-colors">{{ $t[1] }}</p>
                        <p class="text-xs text-maroon-dark/60 italic mt-0.5">{{ $t[2] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <section class="bg-[#cce7e8] rounded-[50px] p-12 text-center shadow-inner relative overflow-hidden group">
            <div class="relative z-10">
                <h3 class="text-2xl md:text-3xl font-black text-teal-900 mb-3 transition-transform duration-500 group-hover:scale-105">SIAP MELAYANI ANDA</h3>
                <p class="text-gray-600 mb-8 max-w-lg mx-auto font-medium text-sm md:text-base">Dapatkan nomor antrian online tanpa harus menunggu lama di Puskesmas.</p>
                <div class="flex flex-wrap justify-center gap-5">
                    <a href="/pendaftaran" class="bg-[#ffc27a] text-white px-10 py-4 rounded-2xl font-black text-sm shadow-[0_10px_20px_rgba(255,194,122,0.4)] hover:shadow-[0_15px_25px_rgba(255,194,122,0.6)] hover:scale-110 active:scale-95 transition-all duration-200 uppercase tracking-widest">Daftar Online</a>
                    <a href="#" class="bg-white text-gray-600 px-10 py-4 rounded-2xl font-bold text-sm border border-gray-100 hover:bg-gray-50 hover:border-gray-300 active:scale-95 transition-all duration-200">Hubungi Kami</a>
                </div>
            </div>
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/20 rounded-full blur-3xl transition-transform duration-1000 group-hover:scale-150"></div>
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
