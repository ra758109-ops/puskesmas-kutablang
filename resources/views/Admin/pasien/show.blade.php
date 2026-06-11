@extends('layouts.admin')

@section('title', 'Detail Rekam Medis')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="container mx-auto px-6 py-8 max-w-5xl space-y-8 animate-fade-in">
    {{-- Header & Navigasi --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.pasien.index') }}" class="group flex items-center gap-2 text-gray-500 hover:text-maroon-dark transition-all">
            <i class="fa-solid fa-arrow-left-long group-hover:-translate-x-1 transition-transform"></i>
            <span class="text-sm font-bold">Kembali ke Daftar</span>
        </a>
        <div class="flex gap-3">
            <button onclick="window.print()" class="px-5 py-2.5 bg-gray-100 text-gray-600 rounded-xl font-bold text-xs hover:bg-gray-200 transition-all flex items-center gap-2">
                <i class="fa-solid fa-print"></i> Cetak Resume
            </button>
            <a href="{{ route('admin.pasien.edit', $patient->id) }}" class="px-5 py-2.5 bg-maroon-dark text-white rounded-xl font-bold text-xs shadow-lg shadow-maroon-dark/20 hover:-translate-y-1 transition-all flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square"></i> Edit Data
            </a>
        </div>
    </div>

    {{-- Kartu Utama Rekam Medis --}}
    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
        {{-- Banner Atas --}}
        <div class="h-32 bg-gradient-to-r from-maroon-dark to-rose-900 relative">
            <div class="absolute -bottom-12 left-10 w-24 h-24 bg-white rounded-3xl shadow-xl flex items-center justify-center text-maroon-dark text-4xl border-4 border-white">
                <i class="fa-solid fa-user-vneck"></i>
            </div>
        </div>

        <div class="pt-16 p-10 space-y-10">
            {{-- Identitas Utama --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-gray-50 pb-8">
                <div>
                    <h2 class="text-3xl font-black text-gray-900">{{ $patient->nama }}</h2>
                    <p class="text-gray-400 font-medium tracking-wide">NIK: {{ $patient->nik }}</p>
                </div>
                <div class="text-right">
                    <span class="px-4 py-2 rounded-2xl bg-emerald-50 text-emerald-600 text-xs font-black uppercase tracking-widest border border-emerald-100">
                        No. Antrian: {{ $patient->nomor_antrian }}
                    </span>
                </div>
            </div>

            {{-- Grid Data Pasien --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="space-y-1">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Jenis Kelamin</p>
                    <p class="text-sm font-bold text-gray-700">{{ $patient->jenis_kelamin }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Tanggal Lahir / Umur</p>
                    <p class="text-sm font-bold text-gray-700">{{ \Carbon\Carbon::parse($patient->tanggal_lahir)->format('d M Y') }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Nomor WhatsApp</p>
                    <p class="text-sm font-bold text-gray-700">{{ $patient->nomor_hp }}</p>
                </div>
                <div class="space-y-1">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Tipe Jaminan</p>
                    <p class="text-sm font-bold text-blue-600">{{ $patient->jenis_layanan }}</p>
                </div>
                <div class="space-y-1 lg:col-span-2">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Alamat Lengkap Pasien</p>
                    <p class="text-sm font-bold text-gray-700 leading-relaxed">{{ $patient->alamat }}</p>
                </div>
            </div>

            {{-- Keluhan Pasien --}}
            <div class="p-8 bg-gray-50 rounded-[2rem] border border-gray-100 space-y-3">
                <h4 class="text-xs font-black text-maroon-dark uppercase tracking-widest flex items-center gap-2">
                    <i class="fa-solid fa-notes-medical"></i> Keluhan Utama Pasien
                </h4>
                <p class="text-gray-600 leading-relaxed italic">
                    "{{ $patient->keluhan ?? 'Tidak ada keluhan tertulis.' }}"
                </p>
            </div>

            {{-- Lampiran Dokumen --}}
            <div class="flex items-center justify-between p-6 border-2 border-dashed border-gray-100 rounded-[2rem]">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-maroon-dark/5 text-maroon-dark rounded-xl flex items-center justify-center text-xl">
                        <i class="fa-solid fa-file-pdf"></i>
                    </div>
                    <div>
                        <p class="text-sm font-black text-gray-800 tracking-tight">Dokumen Penunjang</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">PDF / JPG Pasien</p>
                    </div>
                </div>
                @if($patient->dokumen)
                    <a href="{{ Storage::url($patient->dokumen) }}" target="_blank" class="px-6 py-3 bg-white border border-gray-200 text-gray-700 rounded-xl font-bold text-xs hover:bg-gray-50 transition-all flex items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-download"></i> Unduh Berkas
                    </a>
                @else
                    <span class="text-xs font-bold text-gray-300 italic">Tidak ada lampiran</span>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .animate-fade-in { animation: fadeIn 0.6s ease-out forwards; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
</style>
@endsection