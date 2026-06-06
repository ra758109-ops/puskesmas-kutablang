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
                <i class="fa-solid fa-id-card-clip animate-pulse"></i> Rekam Medis & Antrian Digital
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-950 tracking-tight leading-none">
                Manajemen <span class="bg-gradient-to-r from-maroon-dark via-rose-700 to-rose-950 bg-clip-text text-transparent">Antrian Pasien</span>
            </h2>
            <p class="text-gray-500 text-sm md:text-base mt-3 flex items-center gap-3">
                <span class="w-12 h-[3px] bg-gradient-to-r from-maroon-dark to-rose-500 rounded-full"></span>
                Pusat kendali konfirmasi status kedatangan, pembatalan, dan tindak lanjut review pasien.
            </p>
        </div>
    
        <div class="text-sm font-medium text-gray-400 bg-gray-50 border border-gray-100 px-5 py-3 rounded-2xl flex items-center gap-2 self-start lg:self-center">
            <i class="fa-solid fa-circle text-emerald-500 text-[10px] animate-ping"></i>
            Loket Sinkronisasi Aktif
        </div>
    </div>

    {{-- STATS CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.015)] border border-gray-100 hover:-translate-y-2 hover:shadow-[0_25px_45px_rgba(159,18,57,0.05)] transition-all duration-500 group flex items-center gap-5 animate-fade-up-patient" style="animation-delay: 0.1s;">
            <div class="w-16 h-16 bg-gradient-to-br from-amber-500/10 to-orange-500/5 text-amber-600 rounded-2xl flex items-center justify-center text-2xl group-hover:from-amber-500 group-hover:to-orange-600 group-hover:text-white group-hover:rotate-12 transition-all duration-500 shadow-inner">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest group-hover:text-amber-600 transition-colors">Sedang Mengantri</p>
                <h4 class="text-2xl font-black text-gray-800 mt-0.5 tracking-tight">
                    {{ isset($pasiens) ? $pasiens->where('status', 'Mengantri')->count() : 0 }} Jiwa
                </h4>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.015)] border border-gray-100 hover:-translate-y-2 hover:shadow-[0_25px_45px_rgba(34,197,94,0.05)] transition-all duration-500 group flex items-center gap-5 animate-fade-up-patient" style="animation-delay: 0.15s;">
            <div class="w-16 h-16 bg-gradient-to-br from-emerald-500/10 to-teal-500/5 text-emerald-600 rounded-2xl flex items-center justify-center text-2xl group-hover:from-emerald-600 group-hover:to-teal-600 group-hover:text-white group-hover:rotate-12 transition-all duration-500 shadow-inner">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest group-hover:text-emerald-600 transition-colors">Pelayanan Selesai</p>
                <h4 class="text-2xl font-black text-gray-800 mt-0.5 tracking-tight">
                    {{ isset($pasiens) ? $pasiens->where('status', 'Selesai')->count() : 0 }} Jiwa
                </h4>
            </div>
        </div>

        <div class="bg-gradient-to-br from-maroon-dark via-rose-950 to-neutral-950 p-6 rounded-[2.5rem] shadow-[0_20px_40px_rgba(159,18,57,0.15)] flex items-center gap-5 text-white relative overflow-hidden animate-fade-up-patient" style="animation-delay: 0.2s;">
            <div class="absolute -right-6 -bottom-6 text-white/5 text-7xl font-black"><i class="fa-solid fa-ticket"></i></div>
            <div class="w-16 h-16 bg-white/10 border border-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center text-2xl shadow-inner">
                <i class="fa-solid fa-users text-rose-300"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-rose-300/80 uppercase tracking-widest">Total Registrasi Hari Ini</p>
                <h4 class="text-xl font-black tracking-tight mt-0.5">
                    {{ count($pasiens ?? []) }} Pendaftar
                </h4>
            </div>
        </div>
    </div>

    {{-- KARTU DATA STRIP LIST PASIEN --}}
    <div class="space-y-4">
        {{-- Pseudo Header --}}
        <div class="hidden lg:grid grid-cols-12 gap-4 px-8 py-2 text-[11px] font-black text-gray-400 uppercase tracking-[0.25em] animate-fade-up-patient" style="animation-delay: 0.25s;">
            <div class="col-span-4">Identitas & No. Antrian</div>
            <div class="col-span-3">Kontak Pasien & NIK</div>
            <div class="col-span-2 text-center">Status Antrian</div>
            <div class="col-span-3 text-right pr-6">Akselerasi Alur</div>
        </div>

        {{-- Loop Render Card Strip Pasien --}}
        @forelse($pasiens ?? [] as $index => $p)
        {{-- Default status jika kosong di database dimasukkan sebagai Mengantri --}}
        @php $statusSekarang = $p->status ?? 'Mengantri'; @endphp

        <div class="bg-white rounded-[2.2rem] p-5 md:p-6 shadow-[0_12px_40px_rgba(0,0,0,0.015)] border border-gray-100/80 hover:border-maroon-dark/20 hover:shadow-[0_25px_50px_rgba(159,18,57,0.06)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden grid grid-cols-1 lg:grid-cols-12 items-center gap-6 animate-stagger-patient-row" style="--row-idx: {{ $index }};">
            
            {{-- Garis Indikator Samping Dinamis Mengikuti Status --}}
            <div class="absolute top-0 left-0 w-[5px] h-full transition-transform duration-500
                @if($statusSekarang == 'Selesai') bg-emerald-500 @elseif($statusSekarang == 'Batal') bg-gray-400 @else bg-amber-500 @endif">
            </div>

            {{-- 1. IDENTITAS UTAMA --}}
            <div class="col-span-1 lg:col-span-4 flex items-center gap-5">
                <div class="w-16 h-16 rounded-2xl flex flex-col items-center justify-center text-xl transition-all duration-500 shadow-inner shrink-0 relative
                    @if($statusSekarang == 'Selesai') bg-emerald-50 text-emerald-600 @elseif($statusSekarang == 'Batal') bg-gray-100 text-gray-400 @else bg-amber-50 text-amber-600 animate-pulse @endif">
                    <i class="fa-solid @if($statusSekarang == 'Selesai') fa-circle-check @elseif($statusSekarang == 'Batal') fa-user-slash @else fa-user-clock @endif"></i>
                    <span class="absolute -bottom-1 -right-1 px-1.5 py-0.5 rounded-md bg-white border border-gray-100 shadow-sm text-[8px] font-black text-gray-500">ANTR</span>
                </div>
                <div class="flex flex-col min-w-0 space-y-1">
                    <h5 class="text-base md:text-lg font-black text-gray-800 line-clamp-1 tracking-tight @if($statusSekarang == 'Batal') line-through text-gray-400 @endif">
                        {{ $p->nama }}
                    </h5>
                    <div class="flex items-center gap-2 text-[11px] font-bold font-mono bg-gray-50 px-2.5 py-0.5 rounded-lg w-fit border border-gray-100">
                        <i class="fa-solid fa-ticket text-gray-400"></i>
                        <span>No. Antrian: <strong class="text-gray-900">{{ $p->nomor_antrian ?? '-' }}</strong></span>
                    </div>
                </div>
            </div>

            {{-- 2. KONTAK & NIK PASIEN --}}
            <div class="col-span-1 lg:col-span-3 border-t lg:border-t-0 pt-4 lg:pt-0 border-gray-50 flex flex-col space-y-1">
                <span class="text-sm font-bold text-gray-700 flex items-center gap-2 @if($statusSekarang == 'Batal') text-gray-400 @endif">
                    <i class="fa-regular fa-address-card text-gray-400 text-xs"></i>
                    {{ $p->nik }}
                </span>
                <span class="text-xs text-gray-400 font-medium pl-5">
                    <i class="fa-solid fa-capsules text-[10px] mr-1"></i>{{ $p->jenis_layanan ?? 'Umum' }}
                </span>
            </div>

            {{-- 3. STATUS KEDATANGAN / ANTRIAN (Dinamis Sesuai Alur) --}}
            <div class="col-span-1 lg:col-span-2 text-left lg:text-center border-t lg:border-t-0 pt-4 lg:pt-0 border-gray-50">
                @if($statusSekarang == 'Selesai')
                    <span class="inline-flex items-center px-4 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 text-[10px] font-black uppercase tracking-widest border border-emerald-200/30 shadow-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-2"></span>
                        Selesai
                    </span>
                @elseif($statusSekarang == 'Batal')
                    <span class="inline-flex items-center px-4 py-1.5 rounded-xl bg-gray-100 text-gray-500 text-[10px] font-black uppercase tracking-widest border border-gray-200/50 shadow-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-2"></span>
                        Dibatalkan
                    </span>
                @else
                    <span class="inline-flex items-center px-4 py-1.5 rounded-xl bg-amber-50 text-amber-700 text-[10px] font-black uppercase tracking-widest border border-amber-200/30 shadow-sm animate-bounce">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-2 animate-ping"></span>
                        Mengantri
                    </span>
                @endif
            </div>

            {{-- 4. INTERACTIVE HUB ACTION BUTTONS (Alur Utama Sistem) --}}
            <div class="col-span-1 lg:col-span-3 flex justify-end items-center gap-2 border-t lg:border-t-0 pt-4 lg:pt-0 border-gray-50">
                
                @if($statusSekarang == 'Mengantri')
                    {{-- Tombol Selesaikan Antrian Pasien --}}
                    <form action="{{ route('admin.pasien.update-status', [$p->id, 'Selesai']) }}" method="POST" class="inline">
                        @csrf @method('PATCH')
                        <button type="submit" class="h-11 px-4 flex items-center gap-2 bg-emerald-600 text-white text-xs font-bold rounded-xl hover:bg-emerald-700 hover:scale-105 transition-all duration-300 shadow-md shadow-emerald-600/10" title="Pasien Selesai Diperiksa">
                            <i class="fa-solid fa-check-double text-xs"></i> Selesai
                        </button>
                    </form>

                    {{-- Tombol Batalkan / Orang Tidak Hadir --}}
                    <form action="{{ route('admin.pasien.update-status', [$p->id, 'Batal']) }}" method="POST" class="inline" onsubmit="return confirm('Batalkan nomor antrian pasien karena tidak hadir?')">
                        @csrf @method('PATCH')
                        <button type="submit" class="w-11 h-11 flex items-center justify-center bg-gray-100 text-gray-500 rounded-xl hover:bg-rose-600 hover:text-white hover:scale-110 transition-all duration-300 border border-gray-200" title="Batalkan Antrian (Tidak Hadir)">
                            <i class="fa-solid fa-user-xmark text-sm"></i>
                        </button>
                    </form>
                @endif

                @if($statusSekarang == 'Selesai')
                    {{-- Fitur Kirim WhatsApp Blast Review Pelayanan --}}
                    <a href="{{ route('admin.pasien.wa-review', $p->id) }}" target="_blank" class="h-11 px-4 flex items-center gap-2 bg-teal-600 text-white text-xs font-bold rounded-xl hover:bg-teal-700 hover:scale-105 transition-all duration-300 shadow-md shadow-teal-600/10" title="Kirim WA Penilaian Kepuasan Pelayanan">
                        <i class="fa-brands fa-whatsapp text-sm"></i> Kirim Review
                    </a>
                @endif

                {{-- Pembatas Tipis --}}
                <div class="h-6 w-[1px] bg-gray-200 mx-1"></div>

                {{-- Hapus Registrasi Permanen --}}
                <form action="{{ route('admin.pasien.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus permanen rekam medis pendaftaran ini?')" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-11 h-11 flex items-center justify-center bg-rose-50/30 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition-all duration-300 border border-rose-100/50" title="Hapus Permanen">
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
                    <p class="text-gray-400 max-w-xs mx-auto text-xs font-medium leading-relaxed">Basis data antrian kosong. Ketika pasien mendaftar di halaman depan, data mereka akan langsung muncul di sini.</p>
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