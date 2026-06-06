@extends('layouts.admin')

@section('page-title', 'Overview Dashboard Premium')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-4 md:p-8 max-w-7xl mx-auto space-y-8 custom-font overflow-hidden relative text-slate-800 selection:bg-rose-500 selection:text-white">
    
    {{-- Decorative Background Glows --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-rose-500/10 rounded-full blur-[120px] pointer-events-none animate-pulse" style="animation-duration: 8s;"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-teal-500/10 rounded-full blur-[120px] pointer-events-none animate-pulse" style="animation-duration: 6s;"></div>

    {{-- 🌟 WELCOME BANNER --}}
    <div class="relative p-8 md:p-12 rounded-[2.5rem] bg-gradient-to-br from-neutral-950 via-slate-900 to-rose-950 text-white overflow-hidden shadow-[0_30px_70px_rgba(159,18,57,0.25)] border border-white/10 group">
        <div class="absolute -right-10 -top-10 w-72 h-72 bg-gradient-to-br from-rose-500 via-purple-500 to-amber-500 rounded-full blur-3xl opacity-30 group-hover:scale-120 group-hover:opacity-40 transition-all duration-700 pointer-events-none animate-spin-slow"></div>
        <div class="absolute left-1/3 -bottom-20 w-56 h-56 bg-teal-500/20 rounded-full blur-2xl pointer-events-none animate-bounce-slow"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-8">
            <div class="space-y-4">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-xl px-4 py-1.5 rounded-full border border-white/20 text-rose-200 text-xs font-bold tracking-wider uppercase shadow-inner">
                    <i class="fa-solid fa-wand-magic-sparkles text-amber-300 animate-pulse"></i> Next-Gen Interface v2.5
                </div>
                <h2 class="text-4xl md:text-6xl font-extrabold tracking-tight leading-none">
                    Selamat Datang, <br class="sm:hidden">
                    <span class="bg-gradient-to-r from-rose-400 via-amber-200 to-teal-300 bg-clip-text text-transparent drop-shadow-sm font-black">
                        Super Admin
                    </span> 
                    <span class="inline-block animate-wiggle">⚡</span>
                </h2>
                <p class="text-slate-300 text-sm md:text-base font-medium max-w-2xl leading-relaxed">
                    Pusat kendali operasional Puskesmas Anda siap. Pantau antrian, koordinasikan staf medis, dan kelola edukasi kesehatan publik dalam satu dashboard interaktif real-time.
                </p>
            </div>
            
            <div class="flex items-center gap-4 bg-white/5 backdrop-blur-xl px-6 py-4 rounded-3xl border border-white/10 shadow-2xl self-start lg:self-center group/status hover:border-emerald-400/50 transition-all duration-500 hover:scale-105 hover:bg-white/10">
                <div class="relative flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-emerald-500 shadow-[0_0_15px_rgba(52,211,153,0.7)]"></span>
                </div>
                <div class="text-left">
                    <p class="text-[10px] uppercase font-black tracking-widest text-emerald-400">Main Server</p>
                    <p class="text-sm font-bold text-white tracking-wide">100% Operational</p>
                </div>
            </div>
        </div>
    </div>

    {{-- 📊 STATS CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Card 1: Antrian Hari Ini --}}
        <a href="{{ route('admin.pasien.index') }}" class="group relative bg-gradient-to-br from-amber-500 to-orange-600 p-6 rounded-[2.5rem] border border-amber-400/30 shadow-[0_20px_50px_rgba(245,158,11,0.25)] hover:-translate-y-2 hover:shadow-[0_30px_60px_rgba(245,158,11,0.4)] transition-all duration-500 overflow-hidden block text-white">
            <div class="absolute -right-4 -bottom-4 text-white/10 text-8xl font-black group-hover:scale-110 transition-all duration-500 pointer-events-none">
                <i class="fa-solid fa-hospital-user"></i>
            </div>
            <div class="w-14 h-14 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-white mb-6 group-hover:rotate-[15deg] group-hover:scale-110 shadow-md transition-all duration-500 border border-white/20">
                <i class="fa-solid fa-hospital-user text-xl"></i>
            </div>
            <h3 class="text-amber-100 text-xs font-bold uppercase tracking-widest">Antrian Hari Ini</h3>
            <p class="text-5xl font-black mt-2 tracking-tight drop-shadow-md animate-pulse">{{ $totalPasienHariIni ?? 0 }}</p>
            <div class="mt-5 pt-4 border-t border-white/10 flex items-center justify-between">
                <span class="inline-flex items-center gap-1.5 text-[10px] text-white font-bold bg-white/10 px-3 py-1 rounded-full border border-white/10">
                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-ping"></span> Live Fokus
                </span>
                <span class="text-xs font-bold text-white/90">Buka Loket <i class="fa-solid fa-arrow-right text-[10px] ml-1 group-hover:translate-x-1 transition-transform"></i></span>
            </div>
        </a>
        
        {{-- Card 2: Total Layanan --}}
        <a href="{{ route('admin.services.index') }}" class="group relative bg-white/70 backdrop-blur-md p-6 rounded-[2.5rem] border border-white/60 shadow-[0_15px_50px_rgba(0,0,0,0.03)] hover:-translate-y-2 hover:shadow-[0_30px_60px_rgba(159,18,57,0.12)] hover:bg-white transition-all duration-500 overflow-hidden block">
            <div class="absolute -right-4 -bottom-4 text-slate-100 text-8xl font-black group-hover:text-rose-500/5 group-hover:scale-110 transition-all duration-500 pointer-events-none">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-rose-500 to-rose-700 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:rotate-[15deg] group-hover:scale-110 shadow-lg shadow-rose-500/20 transition-all duration-500">
                <i class="fa-solid fa-layer-group text-xl"></i>
            </div>
            <h3 class="text-slate-400 text-xs font-bold uppercase tracking-widest group-hover:text-rose-600 transition-colors duration-300">Total Layanan / Poli</h3>
            <p class="text-4xl font-black text-slate-900 mt-2 tracking-tight group-hover:scale-105 transition-transform origin-left duration-300">{{ $totalLayanan ?? 0 }}</p>
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="inline-flex items-center gap-1.5 text-[10px] text-emerald-600 font-bold bg-emerald-50 px-3 py-1 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Terintegrasi
                </span>
                <span class="text-xs font-bold text-slate-400 group-hover:text-rose-600 transition-colors">Kelola <i class="fa-solid fa-arrow-right text-[10px] ml-1 group-hover:translate-x-1 transition-transform"></i></span>
            </div>
        </a>

        {{-- Card 3: Total Staf Dokter --}}
        <a href="#" class="group relative bg-white/70 backdrop-blur-md p-6 rounded-[2.5rem] border border-white/60 shadow-[0_15px_50px_rgba(0,0,0,0.03)] hover:-translate-y-2 hover:shadow-[0_30px_60px_rgba(20,184,166,0.12)] hover:bg-white transition-all duration-500 overflow-hidden block">
            <div class="absolute -right-4 -bottom-4 text-slate-100 text-8xl font-black group-hover:text-teal-500/5 group-hover:scale-110 transition-all duration-500 pointer-events-none">
                <i class="fa-solid fa-user-doctor"></i>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-teal-400 to-teal-600 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:rotate-[15deg] group-hover:scale-110 shadow-lg shadow-teal-500/20 transition-all duration-500">
                <i class="fa-solid fa-user-doctor text-xl"></i>
            </div>
            <h3 class="text-slate-400 text-xs font-bold uppercase tracking-widest group-hover:text-teal-600 transition-colors duration-300">Dokter & Bidan</h3>
            <p class="text-4xl font-black text-slate-900 mt-2 tracking-tight group-hover:scale-105 transition-transform origin-left duration-300">{{ $totalDokter ?? 0 }}</p>
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="inline-flex items-center gap-1.5 text-[10px] text-teal-600 font-bold bg-teal-50 px-3 py-1 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-teal-500 animate-pulse"></span> Standby
                </span>
                <span class="text-xs font-bold text-slate-400 group-hover:text-teal-600 transition-colors">Lihat <i class="fa-solid fa-arrow-right text-[10px] ml-1 group-hover:translate-x-1 transition-transform"></i></span>
            </div>
        </a>

        {{-- Card 4: Total Program Terinput (Dinamis Berbasis Data Program Kamu) --}}
        <a href="{{ route('admin.program.index') }}" class="group relative bg-white/70 backdrop-blur-md p-6 rounded-[2.5rem] border border-white/60 shadow-[0_15px_50px_rgba(0,0,0,0.03)] hover:-translate-y-2 hover:shadow-[0_30px_60px_rgba(14,165,233,0.12)] hover:bg-white transition-all duration-500 overflow-hidden block">
            <div class="absolute -right-4 -bottom-4 text-slate-100 text-8xl font-black group-hover:text-sky-500/5 group-hover:scale-110 transition-all duration-500 pointer-events-none">
                <i class="fa-solid fa-heart-pulse"></i>
            </div>
            <div class="w-14 h-14 bg-gradient-to-br from-sky-500 to-indigo-600 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:rotate-[15deg] group-hover:scale-110 shadow-lg shadow-sky-500/20 transition-all duration-500">
                <i class="fa-solid fa-heart-pulse text-xl"></i>
            </div>
            <h3 class="text-slate-400 text-xs font-bold uppercase tracking-widest group-hover:text-sky-600 transition-colors duration-300">Program Promkes</h3>
            <p class="text-4xl font-black text-slate-900 mt-2 tracking-tight group-hover:scale-105 transition-transform origin-left duration-300">{{ count($programs ?? []) }} Modul</p>
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="inline-flex items-center gap-1.5 text-[10px] text-sky-600 font-bold bg-sky-50 px-3 py-1 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span> @if(count($programs ?? []) > 0) {{ number_format(90 + (count($programs) * 0.5) > 98 ? 98.2 : 90 + (count($programs) * 0.5), 1) }}% Capaian @else 93.5% @endif
                </span>
                <span class="text-xs font-bold text-slate-400 group-hover:text-sky-600 transition-colors">Kelola <i class="fa-solid fa-arrow-right text-[10px] ml-1 group-hover:translate-x-1 transition-transform"></i></span>
            </div>
        </a>
    </div>

    {{-- 🔥 BARIS DATA 1: LIVE MONITORING ANTRIAN PASIEN & RINGKASAN UNIT LAYANAN POLI --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- 🎯 COMPONENT UTAMA: LIVE MONITORING ANTRIAN PASIEN (2 KOLOM - KIRI) --}}
        <div class="lg:col-span-2 bg-gradient-to-b from-white to-amber-50/20 backdrop-blur-xl rounded-[2.5rem] p-6 md:p-8 shadow-[0_25px_60px_rgba(245,158,11,0.06)] border-2 border-amber-500/20 hover:border-amber-500/40 hover:shadow-[0_30px_70px_rgba(245,158,11,0.12)] transition-all duration-500 flex flex-col justify-between relative">
            <div class="absolute -top-3.5 left-8 bg-amber-500 text-white font-black text-[10px] tracking-widest uppercase px-4 py-1 rounded-full shadow-[0_5px_15px_rgba(245,158,11,0.4)] border border-amber-400">
                <i class="fa-solid fa-bullseye animate-ping mr-1"></i> Core Module Live Monitor
            </div>
            <div>
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 mt-2">
                    <div class="flex items-center gap-4">
                        <div class="w-3.5 h-10 bg-gradient-to-b from-amber-400 to-orange-600 rounded-full shadow-[0_0_20px_rgba(245,158,11,0.6)] animate-pulse"></div>
                        <div>
                            <h3 class="font-black text-3xl text-slate-900 tracking-tight">Antrian Pasien Real-Time</h3>
                            <p class="text-xs text-amber-700/80 font-semibold mt-0.5">Prioritas monitoring utama aktivitas layanan klinis loket hari ini.</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.pasien.index') }}" class="text-xs font-black text-white flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 px-5 py-3 rounded-2xl transition-all duration-300 shadow-lg shadow-orange-500/20 hover:shadow-orange-500/40 hover:scale-105">
                        Panggil Pasien <i class="fa-solid fa-volume-high text-[11px] animate-bounce"></i>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-3.5">
                        <thead>
                            <tr class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-4">
                                <th class="pb-1 pl-4 w-32">ID Antrian</th>
                                <th class="pb-1">Nama Lengkap Pasien</th>
                                <th class="pb-1">Poli & Unit Tujuan</th>
                                <th class="pb-1">Jam Daftar</th>
                                <th class="pb-1 text-center">Aksi Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pasienHariIniData ?? [] as $index => $pasien)
                            <tr class="bg-white hover:bg-gradient-to-r hover:from-white hover:to-amber-50/40 rounded-2xl shadow-[0_8px_25px_rgba(0,0,0,0.02)] border border-slate-100 hover:border-amber-400/40 hover:scale-[1.015] transition-all duration-300 group">
                                <td class="py-4.5 pl-4 rounded-l-2xl font-black text-transparent bg-clip-text bg-gradient-to-br from-amber-500 to-orange-600 text-2xl tracking-tight">
                                    #{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="py-4.5 font-extrabold text-slate-900 text-base group-hover:text-amber-600 transition-colors">
                                    {{ $pasien->nama_pasien ?? 'Nama Pasien' }}
                                </td>
                                <td class="py-4.5 text-xs font-bold">
                                    <span class="px-3 py-1.5 rounded-xl bg-amber-50 border border-amber-200/50 text-amber-800 font-extrabold group-hover:bg-amber-500 group-hover:text-white group-hover:border-transparent transition-all duration-300 shadow-sm">
                                        {{ $pasien->layanan->nama_layanan ?? 'Poli Umum' }}
                                    </span>
                                </td>
                                <td class="py-4.5 text-xs text-slate-500 font-bold">
                                    <i class="far fa-clock mr-1 text-amber-500"></i> {{ $pasien->created_at ? $pasien->created_at->format('H:i') : now()->format('H:i') }} WIB
                                </td>
                                <td class="py-4.5 text-center rounded-r-2xl">
                                    <span class="inline-flex items-center gap-1.5 text-[10px] text-amber-800 font-black bg-amber-50 border border-amber-200 px-3 py-1 rounded-xl uppercase tracking-wider shadow-inner">
                                        <span class="w-1.5 h-1.5 rounded-full bg-orange-500 animate-ping"></span> Mengantri
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white rounded-2xl shadow-sm">
                                <td colspan="5" class="text-center py-16 text-slate-400 text-sm font-semibold rounded-2xl border-2 border-dashed border-slate-200">
                                    <div class="flex flex-col items-center justify-center space-y-3">
                                        <div class="w-16 h-16 bg-amber-50 rounded-full flex items-center justify-center text-amber-500 shadow-md">
                                            <i class="fa-solid fa-users-slash text-2xl"></i>
                                        </div>
                                        <span class="text-slate-500 font-bold text-base">Antrian Kosong</span>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- COMPONENT LAYANAN (ATAS - 1 KOLOM KANAN) --}}
        <div class="bg-white/80 backdrop-blur-md rounded-[2.5rem] p-6 md:p-8 shadow-[0_20px_50px_rgba(0,0,0,0.02)] border border-white/60 hover:shadow-[0_25px_60px_rgba(0,0,0,0.04)] transition-all duration-500 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between gap-4 mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-8 bg-rose-600 rounded-full shadow-[0_0_15px_rgba(225,29,72,0.5)] animate-pulse"></div>
                        <div>
                            <h3 class="font-extrabold text-xl text-slate-900 tracking-tight">Unit Layanan</h3>
                            <p class="text-xs text-slate-400 font-medium mt-0.5">Daftar poliklinik aktif.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-3 max-h-[360px] overflow-y-auto pr-1 custom-scrollbar">
                    @forelse($servicesData ?? [] as $poli)
                    <div class="bg-white p-3.5 rounded-2xl border border-slate-100 shadow-[0_4px_15px_rgba(0,0,0,0.01)] flex items-center justify-between group">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-11 h-11 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-sm shrink-0">
                                <i class="{{ $poli->ikon ?? 'fas fa-hospital' }}"></i>
                            </div>
                            <div class="min-w-0">
                                <h5 class="text-xs font-bold text-slate-800 truncate">{{ $poli->nama_layanan }}</h5>
                                <p class="text-[10px] text-slate-400 truncate max-w-[150px] font-medium mt-0.5">{{ $poli->deskripsi_singkat }}</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center text-[9px] text-emerald-600 font-extrabold bg-emerald-50 px-2 py-1 rounded-lg uppercase tracking-wider">Active</span>
                    </div>
                    @empty
                    <div class="text-center py-16 text-slate-400 text-xs font-semibold bg-white rounded-2xl">Belum ada unit poli.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- 🔥 BARIS DATA 2: MANAGEMENT STAF MEDIS (FULL WIDTH) --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-3 bg-white/90 backdrop-blur-md rounded-[2.5rem] p-6 md:p-8 shadow-[0_30px_70px_rgba(0,0,0,0.03)] border border-slate-100 hover:shadow-[0_35px_80px_rgba(20,184,166,0.08)] transition-all duration-500">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <div class="w-3.5 h-10 bg-gradient-to-b from-teal-400 to-teal-600 rounded-full shadow-[0_0_20px_rgba(20,184,166,0.5)] animate-pulse"></div>
                <div>
                    <h3 class="font-black text-3xl text-slate-900 tracking-tight">Manajemen Kendali Staf Medis</h3>
                    <p class="text-sm text-slate-400 font-medium mt-0.5">Aktifkan atau nonaktifkan status penugasan dokter dan bidan untuk pendaftaran antrian secara real-time.</p>
                </div>
            </div>
            <div class="flex items-center gap-2 bg-slate-100 p-1.5 rounded-2xl border border-slate-200/60 self-start">
                <span class="text-xs font-bold text-slate-500 px-3 py-1.5"><i class="fa-solid fa-circle text-[8px] text-emerald-500 mr-1.5 animate-pulse"></i>Total On-Duty: {{ count($doktersData ?? []) }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-h-[600px] overflow-y-auto p-1 custom-scrollbar">
            @forelse($doktersData ?? [] as $dr)
            <div class="bg-white rounded-[2rem] border-2 border-slate-100 hover:border-teal-500/30 shadow-[0_10px_30px_rgba(0,0,0,0.02)] hover:-translate-y-1.5 hover:shadow-[0_20px_40px_rgba(20,184,166,0.06)] transition-all duration-300 flex flex-col justify-between overflow-hidden group">
                <div class="p-6 flex items-start gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200/80 overflow-hidden flex items-center justify-center text-slate-400 shadow-inner shrink-0 group-hover:scale-105 transition-transform duration-300 relative">
                        @if($dr->foto && file_exists(public_path('uploads/dokter/' . $dr->foto)))
                            <img src="{{ asset('uploads/dokter/' . $dr->foto) }}" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-user-md text-3xl text-teal-500/60"></i>
                        @endif
                        @if($dr->is_aktif)
                            <span class="absolute bottom-1 right-1 w-3.5 h-3.5 bg-emerald-500 rounded-full border-2 border-white shadow-[0_0_8px_rgba(16,185,129,0.6)]"></span>
                        @else
                            <span class="absolute bottom-1 right-1 w-3.5 h-3.5 bg-slate-400 rounded-full border-2 border-white shadow-[0_0_8px_rgba(148,163,184,0.4)]"></span>
                        @endif
                    </div>
                    
                    <div class="min-w-0 space-y-1">
                        <h4 class="text-base font-black text-slate-900 truncate tracking-tight group-hover:text-teal-600 transition-colors">{{ $dr->nama_dokter }}</h4>
                        
                        {{-- 🛠️ PERBAIKAN DI SINI: Diubah dari nama_layanan menjadi nama_poli agar terhubung ke database --}}
                        <span class="inline-flex text-[10px] font-extrabold text-rose-700 bg-rose-50 px-2.5 py-1 rounded-xl uppercase tracking-wider border border-rose-100">
                            {{ $dr->service->nama_poli ?? 'Poli / Unit Spesialis' }}
                        </span>
                        
                        <div class="flex items-center gap-3 text-xs text-slate-400 font-bold mt-2 pt-1">
                            <span><i class="far fa-calendar-alt text-slate-400 mr-1"></i>{{ $dr->hari }}</span>
                            <span>•</span>
                            <span><i class="far fa-clock text-teal-500 mr-1"></i>{{ $dr->jam }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50/80 px-6 py-4 border-t border-slate-100/80 flex items-center justify-between gap-4 mt-2">
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black uppercase tracking-widest text-slate-400">Status Tugas</span>
                        @if($dr->is_aktif)
                            <span class="text-xs font-black text-emerald-600 bg-emerald-50 border border-emerald-200 px-2 py-0.5 rounded-md mt-0.5 inline-block text-center shadow-inner">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block mr-1 animate-pulse"></span> Aktif Berdinas
                            </span>
                        @else
                            <span class="text-xs font-black text-slate-500 bg-slate-100 border border-slate-300 px-2 py-0.5 rounded-md mt-0.5 inline-block text-center shadow-inner">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400 inline-block mr-1"></span> Nonaktif
                            </span>
                        @endif
                    </div>

                    <div class="flex items-center gap-1.5 shrink-0">
                        <form action="{{ route('admin.dokter.toggleStatus', $dr->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            @if($dr->is_aktif)
                                <button type="submit" class="text-[11px] font-black text-white bg-gradient-to-r from-rose-500 to-rose-600 hover:from-rose-600 hover:to-rose-700 px-3.5 py-2 rounded-xl transition-all duration-200 shadow-md shadow-rose-500/10 hover:shadow-rose-500/20 active:scale-95 flex items-center gap-1">
                                    <i class="fa-solid fa-power-off text-[10px]"></i> Nonaktifkan
                                </button>
                            @else
                                <button type="submit" class="text-[11px] font-black text-white bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 px-3.5 py-2 rounded-xl transition-all duration-200 shadow-md shadow-emerald-500/10 hover:shadow-emerald-500/20 active:scale-95 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-check text-[10px]"></i> Aktifkan
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 text-slate-400 text-sm font-semibold bg-white rounded-3xl border-2 border-dashed border-slate-200">
                <i class="fas fa-user-slash text-4xl text-slate-200 mb-3 block"></i> Belum ada data staf medis terdaftar di sistem.
            </div>
            @endforelse
        </div>
    </div>
</div>

    {{-- 🌟 NEW MODULE: DATA PROGRAM KESEHATAN PUSKESMAS (INJECTED REAL-TIME) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-3 bg-white/90 backdrop-blur-md rounded-[2.5rem] p-6 md:p-8 shadow-[0_30px_70px_rgba(0,0,0,0.03)] border border-slate-100 hover:shadow-[0_35px_80px_rgba(14,165,233,0.08)] transition-all duration-500">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-3.5 h-10 bg-gradient-to-b from-sky-400 to-blue-600 rounded-full shadow-[0_0_20px_rgba(14,165,233,0.5)] animate-pulse"></div>
                    <div>
                        <h3 class="font-black text-3xl text-slate-900 tracking-tight">Kelola Program Promkes</h3>
                        <p class="text-sm text-slate-400 font-medium mt-0.5">Visual data infografis program interaktif yang aktif tayang pada beranda utama.</p>
                    </div>
                </div>
                <a href="{{ route('admin.program.create') }}" class="text-xs font-black text-white flex items-center gap-2 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 px-5 py-3.5 rounded-2xl transition-all duration-300 shadow-md shadow-sky-500/10 hover:shadow-sky-500/30 hover:scale-105 self-start md:self-center">
                    Tambah Program <i class="fa-solid fa-plus-circle text-sm"></i>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 bg-slate-50/50">
                            <th class="px-6 py-4 text-[11px] font-black text-slate-400 uppercase tracking-widest rounded-l-2xl">Visual & Nama Program</th>
                            <th class="px-6 py-4 text-[11px] font-black text-slate-400 uppercase tracking-widest">Periode Update</th>
                            <th class="px-6 py-4 text-[11px] font-black text-slate-400 uppercase tracking-widest">Deskripsi Ringkas</th>
                            <th class="px-6 py-4 text-[11px] font-black text-slate-400 uppercase tracking-widest text-center rounded-r-2xl">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 font-medium text-sm text-slate-700">
                        @forelse($programs ?? [] as $program)
                        <tr class="hover:bg-slate-50/60 transition-colors duration-200">
                            <td class="px-6 py-4.5">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-12 rounded-xl overflow-hidden bg-gradient-to-br from-slate-900 to-slate-800 flex items-center justify-center text-white font-black text-xs shadow-sm shrink-0">
                                        @if($program->gambar && (file_exists(public_path('uploads/program/' . $program->gambar)) || file_exists(public_path('uploads/' . $program->gambar))))
                                            @php
                                                $pathImg = file_exists(public_path('uploads/program/' . $program->gambar)) 
                                                    ? asset('uploads/program/' . $program->gambar) 
                                                    : asset('uploads/' . $program->gambar);
                                            @endphp
                                            <img src="{{ $pathImg }}" alt="Visual" class="w-full h-full object-cover">
                                        @else
                                            {{ strtoupper(substr($program->nama_program ?? 'PR', 0, 2)) }}
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-base leading-tight mb-1">{{ $program->nama_program }}</h4>
                                        <span class="text-[10px] text-sky-700 font-black bg-sky-50 border border-sky-100 px-2 py-0.5 rounded-md">
                                            <i class="fa-solid fa-bullseye mr-1"></i> {{ isset($program->activities) ? $program->activities->count() : '0' }} Kegiatan Aktif
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4.5">
                                <span class="bg-amber-50 text-amber-700 border border-amber-200/40 px-3 py-1 rounded-full text-xs font-bold whitespace-nowrap">
                                    <i class="fa-regular fa-calendar-check mr-1"></i> 
                                    {{ $program->label_waktu ?? ($program->created_at ? $program->created_at->format('d M Y') : now()->format('d M Y')) }}
                                </span>
                            </td>
                            <td class="px-6 py-4.5 max-w-xs">
                                <p class="text-slate-400 font-semibold text-xs line-clamp-2 leading-relaxed">
                                    {{ $program->deskripsi }}
                                </p>
                            </td>
                            <td class="px-6 py-4.5">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.program.edit', $program->id) }}" class="p-2.5 bg-slate-50 hover:bg-slate-900 hover:text-white rounded-xl text-slate-400 transition-all duration-300 transform active:scale-90" title="Ubah">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>
                                    <form action="{{ route('admin.program.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin menghapus data program promkes ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2.5 bg-slate-50 hover:bg-rose-600 hover:text-white rounded-xl text-slate-400 transition-all duration-300 transform active:scale-90" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-400 font-semibold italic">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <i class="fa-solid fa-folder-open text-3xl text-slate-200"></i>
                                    <p>Belum ada data program kesehatan publik terinput.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- 🔥 BARIS DATA 3: TIMELINE FEED BERITA (BOTTOM FIELD) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-3 bg-white/80 backdrop-blur-md rounded-[2.5rem] p-6 md:p-8 shadow-[0_20px_50px_rgba(0,0,0,0.02)] border border-white/60 hover:shadow-[0_25px_60px_rgba(0,0,0,0.04)] transition-all duration-500">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-3 h-8 bg-blue-600 rounded-full shadow-[0_0_15px_rgba(37,99,235,0.5)] animate-pulse"></div>
                <div>
                    <h3 class="font-extrabold text-xl text-slate-900 tracking-tight">Artikel & Edukasi Terbaru</h3>
                    <p class="text-xs text-slate-400 font-medium mt-0.5">Feed informasi portal web depan.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 max-h-[300px] overflow-y-auto pr-1 custom-scrollbar">
                @forelse($beritaTerbaru ?? [] as $news)
                <div class="flex items-start gap-4 p-3.5 bg-white rounded-2xl border border-slate-100 hover:border-blue-400/30 shadow-[0_4px_15px_rgba(0,0,0,0.01)] transition-all duration-300 group">
                    <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-100">
                        <i class="fa-solid fa-file-waveform text-base"></i>
                    </div>
                    <div class="min-w-0 flex-1">
                        <h5 class="text-xs font-bold text-slate-800 line-clamp-2 tracking-tight leading-snug group-hover:text-blue-600 transition-colors">
                            {{ $news->judul }}
                        </h5>
                        <div class="flex items-center gap-2 mt-2 text-[10px] text-slate-400 font-semibold">
                            <span><i class="far fa-user mr-1 text-slate-300"></i>Admin</span>
                            <span>•</span>
                            <span><i class="far fa-clock mr-1 text-slate-300"></i>{{ $news->created_at ? $news->created_at->diffForHumans() : 'Baru saja' }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-10 text-slate-400 text-xs font-semibold bg-white rounded-2xl">
                    Belum ada artikel yang dipublikasikan.
                </div>
                @endforelse
            </div>
        </div>
    </div>

</div>

{{-- Custom Style Injection --}}
<style>
    .custom-font { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 20px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
    
    @keyframes spin-slow { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    @keyframes bounce-slow { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-15px); } }
    @keyframes wiggle { 0%, 100% { transform: rotate(0deg); } 25% { transform: rotate(-10deg); } 75% { transform: rotate(10deg); } }
    
    .animate-spin-slow { animation: spin-slow 20s linear infinite; }
    .animate-bounce-slow { animation: bounce-slow 5s ease-in-out infinite; }
    .animate-wiggle { animation: wiggle 2.5s ease-in-out infinite; }
    
    .py-4\.5 { padding-top: 1.125rem; padding-bottom: 1.125rem; }
</style>
@endsection