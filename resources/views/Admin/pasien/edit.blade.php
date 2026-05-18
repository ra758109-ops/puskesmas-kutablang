@extends('layouts.admin')

@section('title', 'Edit Data Pasien')

@section('content')
<div class="container mx-auto px-6 py-8 max-w-4xl space-y-10">
    <div class="space-y-2">
        <h2 class="text-3xl font-black text-gray-900 tracking-tight">Koreksi Data Pasien</h2>
        <p class="text-gray-500 font-medium">Pastikan data sesuai dengan kartu identitas asli pasien.</p>
    </div>

    <form action="{{ route('admin.patients.update', $patient->id) }}" method="POST" class="bg-white p-10 rounded-[2.5rem] shadow-xl border border-gray-100 space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Nama --}}
            <div class="space-y-2">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest pl-2">Nama Lengkap Pasien</label>
                <input type="text" name="nama" value="{{ old('nama', $patient->nama) }}" class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-maroon-dark/5 focus:border-maroon-dark outline-none transition-all font-bold text-gray-700">
            </div>

            {{-- NIK --}}
            <div class="space-y-2">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest pl-2">NIK (16 Digit)</label>
                <input type="text" name="nik" value="{{ old('nik', $patient->nik) }}" class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-maroon-dark/5 focus:border-maroon-dark outline-none transition-all font-bold text-gray-700">
            </div>

            {{-- No HP --}}
            <div class="space-y-2">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest pl-2">Nomor WhatsApp</label>
                <input type="text" name="nomor_hp" value="{{ old('nomor_hp', $patient->nomor_hp) }}" class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-maroon-dark/5 focus:border-maroon-dark outline-none transition-all font-bold text-gray-700">
            </div>

            {{-- Jenis Layanan --}}
            <div class="space-y-2">
                <label class="text-xs font-black text-gray-400 uppercase tracking-widest pl-2">Tipe Jaminan</label>
                <select name="jenis_layanan" class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-maroon-dark/5 focus:border-maroon-dark outline-none transition-all font-bold text-gray-700 appearance-none">
                    <option value="Umum" {{ $patient->jenis_layanan == 'Umum' ? 'selected' : '' }}>Umum / Mandiri</option>
                    <option value="BPJS" {{ $patient->jenis_layanan == 'BPJS' ? 'selected' : '' }}>Pasien BPJS</option>
                </select>
            </div>
        </div>

        {{-- Alamat --}}
        <div class="space-y-2">
            <label class="text-xs font-black text-gray-400 uppercase tracking-widest pl-2">Alamat Domisili</label>
            <textarea name="alamat" rows="3" class="w-full px-6 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-4 focus:ring-maroon-dark/5 focus:border-maroon-dark outline-none transition-all font-bold text-gray-700">{{ old('alamat', $patient->alamat) }}</textarea>
        </div>

        {{-- Tombol Submit --}}
        <div class="flex items-center justify-end gap-4 pt-4">
            <a href="{{ route('admin.patients.index') }}" class="text-sm font-bold text-gray-400 hover:text-gray-600 transition-all">Batalkan Koreksi</a>
            <button type="submit" class="px-10 py-4 bg-maroon-dark text-white rounded-2xl font-black text-sm shadow-xl shadow-maroon-dark/20 hover:-translate-y-1 active:scale-95 transition-all">
                Simpan Perubahan Data
            </button>
        </div>
    </form>
</div>
@endsection