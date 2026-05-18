@extends('layouts.admin')

@section('title', 'Kelola Data Pasien')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="container mx-auto px-6 py-8 max-w-7xl space-y-10 custom-patient-font overflow-hidden">
    
    {{-- HEADER SECTION --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 animate-fade-up-patient">
        <div>
            <div class="inline-flex items-center gap-2 bg-maroon-dark/5 text-maroon-dark px-3 py-1 rounded-full text-xs font-extrabold tracking-wider uppercase mb-3 border border-maroon-dark/10">
                <i class="fa-solid fa-id-card-clip animate-pulse"></i> Rekam Medis Digital
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-950 tracking-tight leading-none">
                Manajemen <span class="bg-gradient-to-r from-maroon-dark via-rose-700 to-rose-950 bg-clip-text text-transparent">Data Pasien</span>
            </h2>
            <p class="text-gray-500 text-sm md:text-base mt-3 flex items-center gap-3">
                <span class="w-12 h-[3px] bg-gradient-to-r from-maroon-dark to-rose-500 rounded-full"></span>
                Pusat kendali registrasi, rekam medis, dan klasifikasi pasien Puskesmas.
            </p>
        </div>
    
        <div class="text-sm font-medium text-gray-400 bg-gray-50 border border-gray-100 px-5 py-3 rounded-2xl flex items-center gap-2 self-start lg:self-center">
            <i class="fa-solid fa-circle text-emerald-500 text-[10px] animate-ping"></i>
            Sinkronisasi Database Aktif
        </div>
    </div>

    {{-- STATS CARDS (Menggunakan variabel $pasiens yang sudah disinkronkan) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.015)] border border-gray-100 hover:-translate-y-2 hover:shadow-[0_25px_45px_rgba(159,18,57,0.05)] transition-all duration-500 group flex items-center gap-5 animate-fade-up-patient" style="animation-delay: 0.1s;">
            <div class="w-16 h-16 bg-gradient-to-br from-maroon-dark/10 to-rose-500/5 text-maroon-dark rounded-2xl flex items-center justify-center text-2xl group-hover:from-maroon-dark group-hover:to-rose-800 group-hover:text-white group-hover:rotate-12 transition-all duration-500 shadow-inner">
                <i class="fa-solid fa-users-medical"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest group-hover:text-maroon-dark transition-colors">Total Pasien Terdaftar</p>
                <h4 class="text-2xl font-black text-gray-800 mt-0.5 tracking-tight">{{ count($pasiens ?? []) }} Jiwa</h4>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.015)] border border-gray-100 hover:-translate-y-2 hover:shadow-[0_25px_45px_rgba(37,99,235,0.05)] transition-all duration-500 group flex items-center gap-5 animate-fade-up-patient" style="animation-delay: 0.15s;">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500/10 to-indigo-500/5 text-blue-600 rounded-2xl flex items-center justify-center text-2xl group-hover:from-blue-600 group-hover:to-indigo-600 group-hover:text-white group-hover:rotate-12 transition-all duration-500 shadow-inner">
                <i class="fa-solid fa-id-card animate-pulse"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest group-hover:text-blue-600 transition-colors">Pengguna BPJS</p>
                <h4 class="text-2xl font-black text-gray-800 mt-0.5 tracking-tight">
                    {{ isset($pasiens) ? $pasiens->where('jenis_layanan', 'BPJS')->count() : 0 }} Jiwa
                </h4>
            </div>
        </div>

        <div class="bg-gradient-to-br from-maroon-dark via-rose-950 to-neutral-950 p-6 rounded-[2.5rem] shadow-[0_20px_40px_rgba(159,18,57,0.15)] flex items-center gap-5 text-white relative overflow-hidden animate-fade-up-patient" style="animation-delay: 0.2s;">
            <div class="absolute -right-6 -bottom-6 text-white/5 text-7xl font-black"><i class="fa-solid fa-file-shield"></i></div>
            <div class="w-16 h-16 bg-white/10 border border-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center text-2xl shadow-inner animate-float-slow">
                <i class="fa-solid fa-file-shield text-rose-300"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-rose-300/80 uppercase tracking-widest">Enkripsi Medis</p>
                <h4 class="text-xl font-black tracking-tight mt-0.5 flex items-center gap-2">
                    SATUSEHAT Ready <i class="fa-solid fa-circle-check text-xs text-emerald-400"></i>
                </h4>
            </div>
        </div>
    </div>

    {{-- KARTU DATA STRIP LIST PASIEN --}}
    <div class="space-y-4">
        {{-- Pseudo Header --}}
        <div class="hidden lg:grid grid-cols-12 gap-4 px-8 py-2 text-[11px] font-black text-gray-400 uppercase tracking-[0.25em] animate-fade-up-patient" style="animation-delay: 0.25s;">
            <div class="col-span-4">Identitas & No. Antrian Hari Ini</div>
            <div class="col-span-3">Kontak Pasien & NIK</div>
            <div class="col-span-2 text-center">Jaminan Layanan</div>
            <div class="col-span-3 text-right pr-6">Opsi Manajemen</div>
        </div>

        {{-- Loop Render Card Strip Pasien --}}
        @forelse($pasiens ?? [] as $index => $p)
        <div class="bg-white rounded-[2.2rem] p-5 md:p-6 shadow-[0_12px_40px_rgba(0,0,0,0.015)] border border-gray-100/80 hover:border-maroon-dark/20 hover:shadow-[0_25px_50px_rgba(159,18,57,0.06)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden grid grid-cols-1 lg:grid-cols-12 items-center gap-6 animate-stagger-patient-row" style="--row-idx: {{ $index }};">
            
            <div class="absolute top-0 left-0 w-[4px] h-full bg-gradient-to-b from-maroon-dark to-rose-600 transform -translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>

            {{-- 1. IDENTITAS UTAMA --}}
            <div class="col-span-1 lg:col-span-4 flex items-center gap-5">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100/50 border border-gray-200/50 text-maroon-dark flex flex-col items-center justify-center group-hover:from-maroon-dark group-hover:to-rose-950 group-hover:text-white group-hover:rotate-[6deg] group-hover:scale-105 group-hover:shadow-xl group-hover:shadow-maroon-dark/10 transition-all duration-500 shadow-inner shrink-0 relative">
                    <i class="fa-regular fa-user text-xl"></i>
                    <span class="absolute -bottom-1 -right-1 px-1.5 py-0.5 rounded-md bg-white border border-gray-100 shadow-sm text-[8px] text-gray-500 group-hover:text-maroon-dark font-black tracking-tighter uppercase">ANTR</span>
                </div>
                <div class="flex flex-col min-w-0 space-y-1">
                    <h5 class="text-base md:text-lg font-black text-gray-800 group-hover:text-maroon-dark transition-colors duration-300 line-clamp-1 tracking-tight">
                        {{ $p->nama }}
                    </h5>
                    <div class="flex items-center gap-2 text-[11px] text-gray-400 font-bold font-mono bg-gray-50 group-hover:bg-maroon-dark/[0.03] px-2.5 py-0.5 rounded-lg w-fit border border-gray-100 transition-colors">
                        <i class="fa-solid fa-ticket text-gray-300 group-hover:text-maroon-dark/50"></i>
                        <span>{{ $p->nomor_antrian ?? 'Belum Ada' }}</span>
                    </div>
                </div>
            </div>

            {{-- 2. KONTAK & NIK PASIEN --}}
            <div class="col-span-1 lg:col-span-3 border-t lg:border-t-0 pt-4 lg:pt-0 border-gray-50 flex flex-col space-y-1">
                <span class="text-sm font-bold text-gray-700 flex items-center gap-2">
                    <i class="fa-regular fa-address-card text-gray-400 text-xs"></i>
                    {{ $p->nik }}
                </span>
                <span class="text-xs text-gray-400 font-medium pl-5">
                    <i class="fa-regular fa-phone text-[10px] mr-1"></i>{{ $p->nomor_hp }}
                </span>
            </div>

            {{-- 3. JAMINAN KESEHATAN --}}
            <div class="col-span-1 lg:col-span-2 text-left lg:text-center border-t lg:border-t-0 pt-4 lg:pt-0 border-gray-50">
                @if(strtoupper($p->jenis_layanan ?? '') == 'BPJS')
                    <span class="inline-flex items-center px-4 py-1.5 rounded-xl bg-blue-50 text-blue-700 text-[10px] font-black uppercase tracking-widest border border-blue-200/30 shadow-sm group-hover:bg-blue-600 group-hover:text-white group-hover:shadow-md group-hover:shadow-blue-500/20 transition-all duration-500">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 group-hover:bg-white mr-2 animate-pulse"></span>
                        Pasien BPJS
                    </span>
                @else
                    <span class="inline-flex items-center px-4 py-1.5 rounded-xl bg-amber-50 text-amber-700 text-[10px] font-black uppercase tracking-widest border border-amber-200/30 shadow-sm group-hover:bg-amber-500 group-hover:text-white group-hover:shadow-md group-hover:shadow-amber-500/20 transition-all duration-500">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 group-hover:bg-white mr-2 animate-pulse"></span>
                        Umum / Mandiri
                    </span>
                @endif
            </div>

            {{-- 4. INTERACTIVE DOCK ACTION BUTTONS --}}
            <div class="col-span-1 lg:col-span-3 flex justify-end items-center gap-3 border-t lg:border-t-0 pt-4 lg:pt-0 border-gray-50">
                <a href="{{ route('admin.pasien.show', $p->id) }}" 
                   class="w-11 h-11 flex items-center justify-center bg-blue-50/50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white hover:scale-110 hover:-rotate-6 transition-all duration-300 shadow-sm border border-blue-100/50 hover:shadow-lg hover:shadow-blue-600/20" 
                   title="Lihat Histori Lengkap">
                    <i class="fa-regular fa-folder-open text-sm"></i>
                </a>

                <a href="{{ route('admin.pasien.edit', $p->id) }}" 
                   class="w-11 h-11 flex items-center justify-center bg-amber-50/50 text-amber-600 rounded-xl hover:bg-amber-500 hover:text-white hover:scale-110 hover:rotate-6 transition-all duration-300 shadow-sm border border-amber-100/50 hover:shadow-lg hover:shadow-amber-500/20" 
                   title="Edit Profil Pasien">
                    <i class="fa-regular fa-pen-to-square text-sm"></i>
                </a>

                <form action="{{ route('admin.pasien.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pendaftaran pasien ini?')" class="inline">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" 
                            class="w-11 h-11 flex items-center justify-center bg-rose-50/50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white hover:scale-110 hover:rotate-12 transition-all duration-300 shadow-sm border border-rose-100/50 hover:shadow-lg hover:shadow-rose-600/20" 
                            title="Hapus Permanen">
                        <i class="fa-regular fa-trash-can text-sm"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        {{-- EMPTY STATE STATE VIEW --}}
        <div class="bg-white rounded-[2.5rem] p-16 text-center border border-gray-100 shadow-sm animate-fade-up-patient">
            <div class="flex flex-col items-center justify-center space-y-4">
                <div class="w-20 h-20 bg-gradient-to-b from-gray-50 to-gray-100 rounded-full flex items-center justify-center text-gray-300 shadow-inner border border-gray-200/40 animate-pulse">
                    <i class="fa-solid fa-users-slash text-3xl"></i>
                </div>
                <div class="space-y-1">
                    <h3 class="text-xl font-black text-gray-800 tracking-tight">Belum Ada Pendaftaran Hari Ini</h3>
                    <p class="text-gray-400 max-w-xs mx-auto text-xs font-medium leading-relaxed">Basis data kosong. Ketika pasien mendaftar di halaman depan, data mereka akan langsung muncul di sini.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>

<style>
    .custom-patient-font { font-family: 'Plus Jakarta Sans', sans-serif; }
    @keyframes fadeUpPatient {
        from { opacity: 0; transform: translateY(35px); filter: blur(6px); }
        to { opacity: 1; transform: translateY(0); filter: blur(0); }
    }
    .animate-fade-up-patient { animation: fadeUpPatient 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes floatSlow {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-6px) rotate(3deg); }
    }
    .animate-float-slow { animation: floatSlow 5s ease-in-out infinite; }
    @keyframes staggerPatientRow {
        from { opacity: 0; transform: scale(0.98) translateY(20px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    .animate-stagger-patient-row {
        opacity: 0;
        animation: staggerPatientRow 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        animation-delay: calc(var(--row-idx) * 0.07s + 0.25s);
    }
    .line-clamp-1 { display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
</style>
@endsection