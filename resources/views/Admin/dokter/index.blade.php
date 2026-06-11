@extends('layouts.admin')

@section('title', 'Kelola Jadwal Praktik')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="container mx-auto px-6 py-8 max-w-7xl space-y-10 custom-service-font overflow-hidden">
    
    {{-- HEADER SECTION --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 animate-fade-up-service">
        <div>
            <div class="inline-flex items-center gap-2 bg-maroon-dark/5 text-maroon-dark px-3 py-1 rounded-full text-xs font-extrabold tracking-wider uppercase mb-3 border border-maroon-dark/10">
                <i class="fa-solid fa-calendar-check animate-pulse"></i> Modul Internal V2
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-950 tracking-tight leading-none">
                Manajemen <span class="bg-gradient-to-r from-maroon-dark via-rose-700 to-rose-950 bg-clip-text text-transparent">Jadwal Praktik</span>
            </h2>
            <p class="text-gray-500 text-sm md:text-base mt-3 flex items-center gap-3">
                <span class="w-12 h-[3px] bg-gradient-to-r from-maroon-dark to-rose-500 rounded-full"></span>
                Atur waktu penugasan dokter dan bidan Puskesmas Kuta Blang.
            </p>
        </div>
    
        <a href="{{ route('admin.dokter.create') }}" class="group relative inline-flex items-center justify-center gap-3 bg-gradient-to-br from-neutral-900 via-maroon-dark to-rose-950 text-white px-8 py-4.5 rounded-[2rem] font-bold shadow-[0_20px_40px_rgba(159,18,57,0.2)] hover:shadow-[0_25px_50px_rgba(159,18,57,0.35)] hover:-translate-y-1.5 transition-all duration-500 overflow-hidden border border-white/10 self-start lg:self-center">
            <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent transform -translate-x-full group-hover:animate-laser-shine"></div>
            <div class="bg-white/10 w-8 h-8 rounded-xl group-hover:rotate-90 transition-transform duration-700 border border-white/10 flex items-center justify-center shadow-inner">
                <i class="fas fa-plus text-xs"></i>
            </div>
            <span class="tracking-wide">Tambah Jadwal Medis</span>
        </a>
    </div>

    {{-- STATS CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.015)] border border-gray-100 hover:-translate-y-2 hover:shadow-[0_25px_45px_rgba(159,18,57,0.05)] transition-all duration-500 group flex items-center gap-5 animate-fade-up-service" style="animation-delay: 0.1s;">
            <div class="w-16 h-16 bg-gradient-to-br from-maroon-dark/10 to-rose-500/5 text-maroon-dark rounded-2xl flex items-center justify-center text-2xl group-hover:from-maroon-dark group-hover:to-rose-800 group-hover:text-white group-hover:rotate-12 transition-all duration-500 shadow-inner">
                <i class="fas fa-user-md"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest group-hover:text-maroon-dark transition-colors">Total Tenaga Medis</p>
                <h4 class="text-2xl font-black text-gray-800 mt-0.5 tracking-tight">{{ $dokters->count() }} Personel</h4>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.015)] border border-gray-100 hover:-translate-y-2 hover:shadow-[0_25px_45px_rgba(13,148,136,0.05)] transition-all duration-500 group flex items-center gap-5 animate-fade-up-service" style="animation-delay: 0.15s;">
            <div class="w-16 h-16 bg-gradient-to-br from-teal-500/10 to-emerald-500/5 text-teal-600 rounded-2xl flex items-center justify-center text-2xl group-hover:from-teal-600 group-hover:to-emerald-600 group-hover:text-white group-hover:rotate-12 transition-all duration-500 shadow-inner">
                <i class="fas fa-clock animate-pulse"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest group-hover:text-teal-600 transition-colors">Sinkronisasi Berjalan</p>
                <h4 class="text-2xl font-black text-gray-800 mt-0.5 tracking-tight">Otomatis Publik</h4>
            </div>
        </div>

        <div class="bg-gradient-to-br from-maroon-dark via-rose-950 to-neutral-950 p-6 rounded-[2.5rem] shadow-[0_20px_40px_rgba(159,18,57,0.15)] flex items-center gap-5 text-white relative overflow-hidden animate-fade-up-service" style="animation-delay: 0.2s;">
            <div class="absolute -right-6 -bottom-6 text-white/5 text-7xl font-black"><i class="fas fa-shield-alt"></i></div>
            <div class="w-16 h-16 bg-white/10 border border-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center text-2xl shadow-inner animate-float-slow">
                <i class="fas fa-user-shield text-rose-300"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-rose-300/80 uppercase tracking-widest">Enkripsi Data</p>
                <h4 class="text-xl font-black tracking-tight mt-0.5 flex items-center gap-2">
                    Aktif SSL <i class="fa-solid fa-lock text-xs text-emerald-400"></i>
                </h4>
            </div>
        </div>
    </div>

    {{-- LIST CARD STRIP DATA JADWAL DOKTER --}}
    <div class="space-y-4">
        {{-- Pseudo Header (Hanya muncul di PC) --}}
        <div class="hidden lg:grid grid-cols-12 gap-4 px-8 py-2 text-[11px] font-black text-gray-400 uppercase tracking-[0.25em] animate-fade-up-service" style="animation-delay: 0.25s;">
            <div class="col-span-4">Profil Dokter / Bidan</div>
            <div class="col-span-3">Unit Poliklinik</div>
            <div class="col-span-2">Waktu Praktik</div>
            <div class="col-span-3 text-right pr-6">Opsi Manajemen</div>
        </div>

        {{-- Loop Data Dokter --}}
        @forelse($dokters as $index => $dokter)
        <div class="bg-white rounded-[2.2rem] p-5 md:p-6 shadow-[0_12px_40px_rgba(0,0,0,0.015)] border border-gray-100/80 hover:border-maroon-dark/20 hover:shadow-[0_25px_50px_rgba(159,18,57,0.06)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden grid grid-cols-1 lg:grid-cols-12 items-center gap-6 animate-stagger-service-row" style="--row-idx: {{ $index }};">
            
            <div class="absolute top-0 left-0 w-[4px] h-full bg-gradient-to-b from-maroon-dark to-rose-600 transform -translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>

            {{-- 1. FOTO PROFIL DAN NAMA --}}
            <div class="col-span-1 lg:col-span-4 flex items-center gap-5">
                <div class="w-16 h-16 rounded-2xl border border-gray-200/50 overflow-hidden flex items-center justify-center bg-gray-50 shrink-0 shadow-inner group-hover:scale-105 group-hover:rotate-[4deg] transition-all duration-500">
                    @if($dokter->foto && file_exists(public_path('uploads/dokter/' . $dokter->foto)))
                        <img src="{{ asset('uploads/dokter/' . $dokter->foto) }}" alt="Foto" class="w-full h-full object-cover">
                    @else
                        <div class="text-gray-300 text-xl"><i class="fas fa-user-md"></i></div>
                    @endif
                </div>
                <div class="flex flex-col min-w-0 space-y-0.5">
                    <h5 class="text-base md:text-lg font-black text-gray-800 group-hover:text-maroon-dark transition-colors duration-300 line-clamp-1 tracking-tight">
                        {{ $dokter->nama_dokter }}
                    </h5>
                    <span class="text-xs font-semibold text-gray-400 block">
                        @if(str_contains(strtolower($dokter->nama_dokter), 'dr.'))
                            Dokter Puskesmas
                        @elseif(str_contains(strtolower($dokter->nama_dokter), 'bidan'))
                            Tenaga Kebidanan / KIA
                        @else
                            Staf Medis
                        @endif
                    </span>
                </div>
            </div>

            {{-- 2. UNIT POLIKLINIK (SUDAH DIFUNGSIKAN) --}}
            <div class="col-span-1 lg:col-span-3 border-t lg:border-t-0 pt-3 lg:pt-0 border-gray-50">
                <span class="inline-flex items-center gap-1.5 text-[10px] font-extrabold text-maroon-dark bg-rose-50/60 border border-maroon-dark/10 px-3 py-1.5 rounded-xl uppercase tracking-wider shadow-sm group-hover:bg-maroon-dark group-hover:text-white transition-all duration-500">
                    <i class="fa-solid fa-hospital text-[9px]"></i> 
                    {{-- 🚀 Memanggil nama layanan lewat relasi 'poli' di model Dokter --}}
                    {{ $dokter->poli->nama_layanan ?? 'Poli Belum Diatur' }}
                </span>
            </div>

            {{-- 3. HARI & JAM KERJA --}}
            <div class="col-span-1 lg:col-span-2 border-t lg:border-t-0 pt-3 lg:pt-0 border-gray-50 space-y-1">
                <div class="flex items-center gap-2 text-xs font-bold text-gray-700">
                    <i class="far fa-calendar-alt text-maroon-dark text-[11px] w-3.5"></i> {{ $dokter->hari ?? 'Senin - Sabtu' }}
                </div>
                <div class="flex items-center gap-2 text-[11px] font-semibold text-gray-400">
                    <i class="far fa-clock text-gray-400 text-[11px] w-3.5"></i> {{ $dokter->jam ?? '08:00 - 12:00' }}
                </div>
            </div>

            {{-- 4. BUTTON EDIT & HAPUS --}}
            <div class="col-span-1 lg:col-span-3 flex justify-end items-center gap-3 border-t lg:border-t-0 pt-4 lg:pt-0 border-gray-50">
                <a href="{{ route('admin.dokter.edit', $dokter->id) }}" 
                   class="w-11 h-11 flex items-center justify-center bg-amber-50/50 text-amber-600 rounded-xl hover:bg-amber-500 hover:text-white hover:scale-110 hover:rotate-6 transition-all duration-300 shadow-sm border border-amber-100/50 hover:shadow-lg hover:shadow-amber-500/20" 
                   title="Edit Jadwal Praktik">
                    <i class="fa-regular fa-pen-to-square text-sm"></i>
                </a>

                <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal tugas medis ini?')" class="inline">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" 
                            class="w-11 h-11 flex items-center justify-center bg-rose-50/50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white hover:scale-110 hover:-rotate-12 transition-all duration-300 shadow-sm border border-rose-100/50 hover:shadow-lg hover:shadow-rose-600/20" 
                            title="Hapus Jadwal">
                        <i class="fa-regular fa-trash-can text-sm"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        {{-- EMPTY STATE --}}
        <div class="bg-white rounded-[2.5rem] p-16 text-center border border-gray-100 shadow-sm animate-fade-up-service">
            <div class="flex flex-col items-center justify-center space-y-4">
                <div class="w-20 h-20 bg-gradient-to-b from-gray-50 to-gray-100 rounded-full flex items-center justify-center text-gray-300 shadow-inner border border-gray-200/40 animate-pulse">
                    <i class="fa-solid fa-calendar-times text-3xl"></i>
                </div>
                <div class="space-y-1">
                    <h3 class="text-xl font-black text-gray-800 tracking-tight">Belum Ada Jadwal Praktik</h3>
                    <p class="text-gray-400 max-w-xs mx-auto text-xs font-medium leading-relaxed">Sistem basis data kosong. Tekan tombol "Tambah Jadwal Medis" untuk mendaftarkan jam tugas dokter.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>

<style>
    .custom-service-font { font-family: 'Plus Jakarta Sans', sans-serif; }

    @keyframes fadeUpService {
        from { opacity: 0; transform: translateY(35px); filter: blur(6px); }
        to { opacity: 1; transform: translateY(0); filter: blur(0); }
    }
    .animate-fade-up-service { animation: fadeUpService 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

    @keyframes floatSlow {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-6px) rotate(3deg); }
    }
    .animate-float-slow { animation: floatSlow 5s ease-in-out infinite; }

    @keyframes laserShineStripe { 100% { transform: translateX(100%); } }
    .group-hover\:animate-laser-shine { animation: laserShineStripe 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94); }

    @keyframes staggerServiceRow {
        from { opacity: 0; transform: scale(0.98) translateY(20px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    .animate-stagger-service-row {
        opacity: 0;
        animation: staggerServiceRow 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        animation-delay: calc(var(--row-idx) * 0.07s + 0.25s);
    }

    .line-clamp-1 {
        display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;
    }
</style>
@endsection