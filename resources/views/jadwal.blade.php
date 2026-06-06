@extends('layouts.app')

@section('title', 'Jadwal Praktik Dokter & Bidan')

@section('content')
<div class="bg-slate-50 min-h-screen font-sans pb-24">

    {{-- HERO SECTION --}}
    <section class="bg-gradient-to-r from-maroon-dark to-slate-900 text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-cover bg-center" style="background-image: url('{{ asset('images/kutablang.png') }}');"></div>
        <div class="container mx-auto px-4 relative z-10 text-center" data-aos="fade-down">
            <span class="text-teal-400 font-bold tracking-widest uppercase text-xs">Waktu Pelayanan</span>
            <h1 class="text-4xl md:text-5xl font-extrabold mt-2 mb-4">Jadwal Praktik Dokter & Bidan</h1>
            <p class="text-slate-300 max-w-2xl mx-auto text-sm leading-relaxed">
                Temukan jadwal pelayanan dokter spesialis, umum, dan bidan di Puskesmas Kutablang untuk memudahkan Anda merencanakan kunjungan berobat.
            </p>
        </div>
    </section>

    {{-- ALERT INFORMASI JADWAL --}}
    <div class="container mx-auto px-4 max-w-5xl mt-8" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-2xl shadow-sm flex items-start space-x-3">
            <div class="bg-blue-500 text-white rounded-md p-1 mt-0.5">
                <i class="fas fa-info-circle text-xs w-4 h-4 flex items-center justify-center"></i>
            </div>
            <p class="text-xs text-blue-700 leading-relaxed">
                <strong class="font-bold">Informasi:</strong> Jadwal dapat berubah sewaktu-waktu. Untuk kepastian, hubungi (0771) 123-456 atau WhatsApp 0812-3456-7890 sebelum berkunjung.
            </p>
        </div>
    </div>

    {{-- LIST JADWAL --}}
    <section class="py-12">
        <div class="container mx-auto px-4 max-w-5xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- FILTER HANYA DOKTER YANG AKTIF YANG DIALIRKAN KE USER --}}
                @php
                    $doktersAktif = collect($dokters ?? [])->where('is_aktif', 1);
                @endphp

                @forelse($doktersAktif as $index => $dokter)
                {{-- Card dengan Efek Hover Lift Naik Up --}}
                <div class="bg-white rounded-[32px] overflow-hidden shadow-[0_10px_25px_rgba(0,0,0,0.015)] border border-slate-100 flex flex-col justify-between transform hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group"
                     data-aos="fade-up"
                     data-aos-duration="1000"
                     data-aos-delay="{{ 100 * ($index % 3) }}">

                    <div>
                        {{-- Area Foto & Badge Kategori (FOLDER PATH FIX) --}}
                        <div class="relative h-72 bg-slate-100 overflow-hidden m-4 rounded-[24px]">
                            {{-- 🛠️ PERBAIKAN: MENYESUAIKAN ALAMAT ASSET FOTO DENGAN DASHBOARD ADMIN --}}
                            @if($dokter->foto && file_exists(public_path('uploads/dokter/' . $dokter->foto)))
                                <img 
                                    src="{{ asset('uploads/dokter/' . $dokter->foto) }}" 
                                    alt="{{ $dokter->nama_dokter }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-200 text-slate-400">
                                    <i class="fas fa-user-md text-6xl"></i>
                                </div>
                            @endif

                            {{-- Badge Poli --}}
                            <div class="absolute bottom-4 left-4">
                                <span class="bg-maroon-dark text-white text-[10px] font-bold px-3 py-1.5 rounded-md uppercase tracking-wider shadow-sm">
                                    {{ $dokter->poli->nama_poli ?? 'Umum' }}
                                </span>
                            </div>
                        </div>

                        {{-- Konten Teks Profil Medis --}}
                        <div class="px-6 pt-2 pb-4">
                            <h3 class="text-lg font-bold text-slate-800 leading-snug group-hover:text-maroon-dark transition-colors">
                                {{ $dokter->nama_dokter }}
                            </h3>
                            <p class="text-xs text-slate-400 font-medium">
                                @if(str_contains(strtolower($dokter->nama_dokter), 'dr.'))
                                    Dokter Puskesmas
                                @elseif(str_contains(strtolower($dokter->nama_dokter), 'bidan'))
                                    Tenaga Kebidanan / KIA
                                @else
                                    Staf Medis Puskesmas
                                @endif
                            </p>

                            <div class="my-4 border-t border-slate-100"></div>

                            {{-- Detail Jam Kerja Berjejer --}}
                            <div class="space-y-2">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-slate-500 font-medium flex items-center">
                                        <i class="fas fa-calendar-alt mr-2 text-maroon-dark"></i> Hari Praktik
                                    </span>
                                    <span class="font-bold text-slate-700">{{ $dokter->hari ?? 'Senin - Sabtu' }}</span>
                                </div>
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-slate-500 font-medium flex items-center">
                                        <i class="far fa-clock mr-2 text-maroon-dark"></i> Jam Tugas
                                    </span>
                                    <span class="font-bold text-slate-700">{{ $dokter->jam ?? '08:00 - 12:00' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Pendaftaran --}}
                    <div class="px-6 pb-6 pt-2 text-center">
                        <a href="{{ url('/pendaftaran') }}" class="inline-flex items-center justify-center text-xs font-bold text-slate-400 hover:text-maroon-dark transition-colors group/btn gap-1">
                            Ambil Antrian Sekarang
                            <i class="fas fa-chevron-right text-[10px] transform group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                </div>
                @empty
                <div class="col-span-3 text-center py-12 bg-white rounded-[32px] border border-dashed border-slate-200" data-aos="fade-up">
                    <p class="text-slate-400 italic text-sm">Belum ada data jadwal praktik tenaga medis yang aktif saat ini.</p>
                </div>
                @endforelse

            </div>
        </div>
    </section>

</div>
@endsection