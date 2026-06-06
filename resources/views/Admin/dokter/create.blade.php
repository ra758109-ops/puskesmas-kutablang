@extends('layouts.admin')

@section('title', 'Tambah Jadwal Dokter')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="container mx-auto px-6 py-8 max-w-4xl custom-font animate-fade-in">
    {{-- BACK BUTTON & HEADER --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.services.index') }}" class="w-10 h-10 flex items-center justify-center bg-white rounded-xl text-gray-500 hover:text-maroon-dark hover:shadow-md transition-all duration-300 border border-gray-100">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>
        <div>
            <span class="text-xs font-extrabold text-maroon-dark uppercase tracking-widest bg-maroon-dark/5 px-2.5 py-1 rounded-md">Formulir Staf</span>
            <h2 class="text-3xl font-black text-gray-950 tracking-tight mt-1">Tambah Jadwal Dokter / Bidan</h2>
        </div>
    </div>

    {{-- MAIN FORM CARD --}}
    <div class="bg-white rounded-[2.5rem] p-8 border border-gray-100 shadow-[0_20px_50px_rgba(0,0,0,0.02)]">
        <form action="{{ route('admin.dokter.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- NAMA DOKTER --}}
                <div class="space-y-2">
                    <label class="text-xs font-black text-gray-500 uppercase tracking-wider block">Nama Lengkap & Gelar</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400"><i class="fas fa-user-md"></i></span>
                        <input type="text" name="nama_dokter" required placeholder="Contoh: dr. Ahmad, Sp.A" class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-sm font-semibold focus:outline-none focus:border-maroon-dark focus:bg-white transition-all duration-300">
                    </div>
                </div>

                            {{-- PILIH POLIKLINIK (DROPDOWN) --}}
                <div class="space-y-2">
                    <label class="text-xs font-black text-gray-500 uppercase tracking-wider block">Penempatan Unit Layanan (Poli)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <i class="fas fa-hospital text-sm"></i>
                        </span>
                        
                        <select name="poli_id" required class="w-full pl-11 pr-10 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-sm font-semibold text-gray-900 focus:outline-none focus:border-maroon-dark focus:bg-white transition-all duration-300 appearance-none cursor-pointer">
                            <option value="" disabled selected class="text-gray-400">-- Pilih Poliklinik --</option>
                            @forelse($polis as $poli)
                                <option value="{{ $poli->id }}" class="text-gray-900 font-medium">
                                    {{ $poli->nama_poli }} </option>
                            @empty
                                <option value="" disabled class="text-rose-600 font-medium">Belum ada data poli di database!</option>
                            @endforelse
                        </select>
                        
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
                {{-- HARI PRAKTIK --}}
                <div class="space-y-2">
                    <label class="text-xs font-black text-gray-500 uppercase tracking-wider block">Hari Kerja / Praktik</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400"><i class="far fa-calendar-alt"></i></span>
                        <input type="text" name="hari" required placeholder="Contoh: Senin s/d Kamis" class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-sm font-semibold focus:outline-none focus:border-maroon-dark focus:bg-white transition-all duration-300">
                    </div>
                </div>

                {{-- JAM PRAKTIK --}}
                <div class="space-y-2">
                    <label class="text-xs font-black text-gray-500 uppercase tracking-wider block">Jam Operasional Shifting</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400"><i class="far fa-clock"></i></span>
                        <input type="text" name="jam" required placeholder="Contoh: 08:00 - 12:00 WIB" class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl text-sm font-semibold focus:outline-none focus:border-maroon-dark focus:bg-white transition-all duration-300">
                    </div>
                </div>
            </div>

            {{-- UPLOAD FOTO DOKTER DENGAN PREVIEW --}}
            <div class="space-y-2 pt-2">
                <label class="text-xs font-black text-gray-500 uppercase tracking-wider block">Foto Resmi Pejabat Medis</label>
                <div class="flex flex-col md:flex-row items-center gap-6 p-6 border border-dashed border-gray-200 rounded-[2rem] bg-gray-50/50">
                    {{-- Box Preview --}}
                    <div id="preview-box" class="w-24 h-24 rounded-2xl bg-white border border-gray-100 flex items-center justify-center text-gray-300 text-3xl shadow-inner shrink-0 overflow-hidden">
                        <i id="placeholder-icon" class="fas fa-user-md"></i>
                        <img id="image-preview" src="#" alt="Preview" class="w-full h-full object-cover hidden">
                    </div>
                    {{-- Input --}}
                    <div class="flex-1 space-y-1 text-center md:text-left">
                        <input type="file" name="foto" id="foto-input" accept="image/*" class="text-xs font-semibold text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-maroon-dark/10 file:text-maroon-dark file:cursor-pointer hover:file:bg-maroon-dark/20 transition-all">
                        <p class="text-[11px] text-gray-400 font-medium">Format: JPG, JPEG, PNG, WEBP. Maksimal ukuran file 2MB.</p>
                    </div>
                </div>
            </div>

            {{-- SUBMIT BUTTONS --}}
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-50">
                <a href="{{ route('admin.services.index') }}" class="px-6 py-3.5 rounded-2xl text-sm font-bold text-gray-500 hover:bg-gray-100 transition-all duration-300">Batal</a>
                <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-neutral-900 via-maroon-dark to-rose-950 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                    Simpan Jadwal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Logika Preview Gambar Live Instan
    document.getElementById('foto-input').onchange = function (evt) {
        const [file] = this.files;
        if (file) {
            document.getElementById('image-preview').src = URL.createObjectURL(file);
            document.getElementById('image-preview').classList.remove('hidden');
            document.getElementById('placeholder-icon').classList.add('hidden');
        }
    };
</script>

<style>
    .custom-font { font-family: 'Plus Jakarta Sans', sans-serif; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fadeIn 0.5s ease-out forwards; }
</style>
@endsection