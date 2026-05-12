@extends('layouts.admin')

@section('content')
<div class="p-8 max-w-4xl mx-auto">
    {{-- Tombol Kembali --}}
    <div class="mb-8">
        <a href="{{ route('admin.berita.index') }}" class="text-maroon-dark font-bold text-sm flex items-center gap-2 group">
            <div class="p-2 rounded-full group-hover:bg-maroon-dark/10 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="2"/></svg>
            </div>
            Kembali ke Daftar Berita
        </a>
    </div>

    <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-gray-100">
        <h2 class="text-3xl font-black text-gray-800 mb-8">Buat Berita Baru</h2>

        {{-- Form: Enctype dihapus karena tidak ada upload gambar --}}
        <form action="{{ route('admin.berita.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                {{-- Judul --}}
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-2">Judul Berita</label>
                    <input type="text" name="judul" required
                        class="w-full mt-2 p-5 bg-gray-50 border-none rounded-[2rem] focus:ring-2 focus:ring-maroon-dark/20 transition-all" 
                        placeholder="Contoh: Jadwal Vaksinasi Bulan Mei...">
                </div>

                {{-- Kategori: Dibuat full width karena gambar dihapus --}}
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-2">Kategori</label>
                    <select name="kategori" required
                        class="w-full mt-2 p-5 bg-gray-50 border-none rounded-[2rem] focus:ring-2 focus:ring-maroon-dark/20 transition-all appearance-none">
                        <option value="" disabled selected>Pilih Kategori...</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Kegiatan">Kegiatan</option>
                        <option value="Pengumuman">Pengumuman</option>
                    </select>
                </div>

                {{-- Konten --}}
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-2">Isi Berita</label>
                    <textarea name="konten" rows="8" required
                        class="w-full mt-2 p-5 bg-gray-50 border-none rounded-[2rem] focus:ring-2 focus:ring-maroon-dark/20 transition-all" 
                        placeholder="Tuliskan detail berita di sini..."></textarea>
                </div>

                {{-- Tombol Submit --}}
                <div class="pt-4">
                    <button type="submit" class="w-full bg-maroon-dark text-white font-black py-5 rounded-[2rem] shadow-xl shadow-maroon-dark/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Terbitkan Berita Sekarang
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection