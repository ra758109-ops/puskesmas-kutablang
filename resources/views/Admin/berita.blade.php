@extends('layouts.admin')

@section('content')
<div class="p-8">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">Manajemen Berita</h2>
            <p class="text-gray-500 text-base mt-2 flex items-center gap-2">
                <span class="w-8 h-[2px] bg-maroon-dark"></span>
                Pusat kendali konten dan publikasi Puskesmas
            </p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="group inline-flex items-center justify-center gap-3 bg-maroon-dark text-white px-8 py-4 rounded-2xl font-bold shadow-xl shadow-maroon-dark/30 hover:bg-maroon-800 hover:-translate-y-1 transition-all duration-300">
            <div class="bg-white/20 p-1 rounded-lg group-hover:rotate-90 transition-transform duration-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5" stroke-linecap="round"/></svg>
            </div>
            Tulis Berita Baru
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
    <div class="mb-8 p-5 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-2xl shadow-sm flex items-center justify-between animate-fade-in-down">
        <div class="flex items-center gap-4">
            <div class="bg-emerald-500 text-white p-2 rounded-full shadow-md shadow-emerald-200">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
            </div>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-600 transition-colors">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"/></svg>
        </button>
    </div>
    @endif

    {{-- Tabel Section --}}
    <div class="bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100">
                        <th class="px-10 py-7 text-xs font-black text-gray-400 uppercase tracking-[0.2em]">Detail Artikel</th>
                        <th class="px-10 py-7 text-xs font-black text-gray-400 uppercase tracking-[0.2em] text-center">Klasifikasi</th>
                        <th class="px-10 py-7 text-xs font-black text-gray-400 uppercase tracking-[0.2em]">Publikasi</th>
                        <th class="px-10 py-7 text-xs font-black text-gray-400 uppercase tracking-[0.2em] text-right">Manajemen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($beritas as $b)
                    <tr class="group hover:bg-maroon-dark/[0.02] transition-all duration-300">
                        <td class="px-10 py-8">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-maroon-dark/5 flex items-center justify-center text-maroon-dark group-hover:bg-maroon-dark group-hover:text-white transition-all duration-500 shadow-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l5 5v11a2 2 0 01-2 2z" stroke-width="2"/><path d="M14 3v5h5" stroke-width="2"/></svg>
                                </div>
                                <div class="flex flex-col max-w-md">
                                    <span class="text-lg font-extrabold text-gray-800 group-hover:text-maroon-dark transition-colors line-clamp-1">{{ $b->judul }}</span>
                                    <span class="text-xs text-gray-400 mt-1 flex items-center gap-1 font-medium italic">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101" stroke-width="2"/><path d="M10.172 13.828a4 4 0 015.656 0l4-4a4 4 0 11-5.656-5.656l-1.102 1.101" stroke-width="2"/></svg>
                                        {{ $b->slug }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-8 text-center">
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-maroon-dark/5 text-maroon-dark text-[11px] font-black uppercase tracking-widest border border-maroon-dark/10">
                                <span class="w-1.5 h-1.5 rounded-full bg-maroon-dark mr-2 animate-pulse"></span>
                                {{ $b->kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="px-10 py-8">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-gray-700">{{ $b->created_at->format('d M Y') }}</span>
                                <span class="text-[10px] text-gray-400 font-medium uppercase tracking-tighter">{{ $b->created_at->diffForHumans() }}</span>
                            </div>
                        </td>
                        <td class="px-10 py-8">
                            <div class="flex justify-end items-center gap-3">
                                {{-- Tombol View --}}
                                <a href="{{ route('public.berita', $b->slug) }}" target="_blank" class="w-10 h-10 flex items-center justify-center bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white hover:rotate-12 transition-all duration-300 shadow-sm" title="Lihat di Web">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2"/></svg>
                                </a>

                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.berita.edit', $b->id) }}" class="w-10 h-10 flex items-center justify-center bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-600 hover:text-white hover:-rotate-12 transition-all duration-300 shadow-sm" title="Edit Berita">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2"/></svg>
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini? Data akan hilang permanen.')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-10 h-10 flex items-center justify-center bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white hover:scale-110 transition-all duration-300 shadow-sm" title="Hapus Berita">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-10 py-32 text-center">
                            <div class="flex flex-col items-center justify-center animate-pulse">
                                <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-6 text-gray-200 shadow-inner">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l5 5v11a2 2 0 01-2 2z" stroke-width="2"/><path d="M14 3v5h5" stroke-width="2"/><path d="M9 13h6m-6 4h6" stroke-width="2"/></svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-400 tracking-tight">Arsip Masih Kosong</h3>
                                <p class="text-gray-400 mt-2 max-w-xs mx-auto text-sm">Belum ada berita yang diterbitkan. Yuk, tulis artikel edukasi kesehatan pertama Anda!</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in-down {
        0% { opacity: 0; transform: translateY(-10px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-down {
        animation: fade-in-down 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    /* Mencegah teks kepotong terlalu jelek di mobile */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
</style>
@endsection