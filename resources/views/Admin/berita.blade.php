@extends('layouts.admin')

@section('content')
<div class="p-8">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h2 class="text-3xl font-black text-gray-800">Manajemen Berita</h2>
            <p class="text-gray-500 text-sm mt-1">Kelola semua artikel dan pengumuman puskesmas.</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="inline-flex items-center justify-center gap-2 bg-maroon-dark text-white px-6 py-4 rounded-2xl font-bold shadow-lg shadow-maroon-dark/20 hover:scale-[1.02] transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2" /></svg>
            Tulis Berita Baru
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-100 text-green-600 rounded-2xl font-bold text-sm flex items-center gap-3">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" /></svg>
        {{ session('success') }}
    </div>
    @endif

    {{-- Tabel Section --}}
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Berita</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Kategori</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest">Tanggal Post</th>
                        <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($beritas as $b)
                    <tr class="group hover:bg-gray-50/50 transition-all">
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-gray-800 group-hover:text-maroon-dark transition-colors">{{ $b->judul }}</span>
                                <span class="text-[10px] text-gray-400 mt-1">Slug: {{ $b->slug }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="inline-block px-3 py-1 rounded-lg bg-red-50 text-red-600 text-[10px] font-bold uppercase">
                                {{ $b->kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-sm text-gray-500 font-medium">
                            {{ $b->created_at->format('d M Y') }}
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex justify-center items-center gap-2">
                                {{-- Tombol View --}}
                                <a href="{{ route('public.berita.detail', $b->slug) }}" target="_blank" class="p-2 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2"/></svg>
                                </a>
                                {{-- Tombol Edit --}}
                                <a href="#" class="p-2 bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-600 hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2"/></svg>
                                </a>
                                {{-- Tombol Hapus --}}
                                <button class="p-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-20 text-center text-gray-400 italic">
                            Belum ada berita. Klik "Tulis Berita Baru" untuk memulai.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection