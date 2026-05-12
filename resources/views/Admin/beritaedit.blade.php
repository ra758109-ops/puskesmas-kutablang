@extends('layouts.admin')

@section('content')
<div class="p-8 max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.berita.index') }}" class="text-maroon-dark font-bold text-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="2"/></svg>
            Batal & Kembali
        </a>
    </div>

    <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-gray-100">
        <h2 class="text-3xl font-black text-gray-800 mb-8">Edit Berita</h2>

        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-2">Judul Berita</label>
                    <input type="text" name="judul" value="{{ $berita->judul }}" required
                        class="w-full mt-2 p-5 bg-gray-50 border-none rounded-[2rem] focus:ring-2 focus:ring-maroon-dark/20 transition-all">
                </div>

                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-2">Kategori</label>
                    <select name="kategori" class="w-full mt-2 p-5 bg-gray-50 border-none rounded-[2rem] focus:ring-2 focus:ring-maroon-dark/20">
                        <option value="Kesehatan" {{ $berita->kategori == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                        <option value="Kegiatan" {{ $berita->kategori == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Pengumuman" {{ $berita->kategori == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    </select>
                </div>

                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-2">Isi Berita</label>
                    <textarea name="konten" rows="10" required
                        class="w-full mt-2 p-5 bg-gray-50 border-none rounded-[2rem] focus:ring-2 focus:ring-maroon-dark/20 transition-all">{{ $berita->konten }}</textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-maroon-dark text-white font-black py-5 rounded-[2rem] shadow-xl shadow-maroon-dark/20 hover:scale-[1.02] transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection