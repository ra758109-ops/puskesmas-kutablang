@extends('layouts.admin')

@section('page-title', 'Overview Dashboard')

@section('content')
<!-- STATS CARDS -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl hover:shadow-maroon-dark/5 transition-all group">
        <div class="w-12 h-12 bg-maroon-dark/10 rounded-2xl flex items-center justify-center text-maroon-dark mb-4 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-width="2" /></svg>
        </div>
        <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest">Pasien Terdaftar</h3>
        <p class="text-3xl font-black text-gray-800 mt-1">1,284</p>
        <span class="text-[10px] text-green-500 font-bold">+12% Bulan ini</span>
    </div>

    <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl hover:shadow-maroon-dark/5 transition-all group">
        <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-4 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" /></svg>
        </div>
        <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest">Pendaftaran Baru</h3>
        <p class="text-3xl font-black text-gray-800 mt-1">42</p>
        <span class="text-[10px] text-amber-500 font-bold">Butuh Verifikasi</span>
    </div>

    <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl hover:shadow-maroon-dark/5 transition-all group">
        <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 mb-4 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" stroke-width="2" /></svg>
        </div>
        <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest">Total Berita</h3>
        <p class="text-3xl font-black text-gray-800 mt-1">86</p>
        <span class="text-[10px] text-gray-400 font-bold">Postingan Aktif</span>
    </div>

    <div class="bg-maroon-dark p-6 rounded-[2.5rem] shadow-xl shadow-maroon-dark/20 text-white group">
        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-4 group-hover:rotate-12 transition-transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" /></svg>
        </div>
        <h3 class="text-white/60 text-xs font-bold uppercase tracking-widest">Status Server</h3>
        <p class="text-3xl font-black mt-1">Stable</p>
        <span class="text-[10px] text-green-300 font-bold">100% Online</span>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- TABEL PENDAFTAR TERBARU -->
    <div class="lg:col-span-2 bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <h3 class="font-bold text-gray-800">Antrian Pendaftaran Pasien</h3>
            <a href="#" class="text-xs font-bold text-maroon-dark hover:underline uppercase tracking-tighter">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="text-[10px] text-gray-400 uppercase font-black tracking-widest border-b border-gray-50">
                    <tr>
                        <th class="pb-4">Nama Pasien</th>
                        <th class="pb-4">Layanan</th>
                        <th class="pb-4">Status</th>
                        <th class="pb-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="group hover:bg-gray-50/50">
                        <td class="py-4">
                            <p class="text-sm font-bold text-gray-700">Ahmad Subardjo</p>
                            <p class="text-[10px] text-gray-400">ID: #29482</p>
                        </td>
                        <td class="py-4">
                            <span class="text-xs text-gray-600 bg-gray-100 px-3 py-1 rounded-lg">Poli Umum</span>
                        </td>
                        <td class="py-4">
                            <span class="px-3 py-1 rounded-lg bg-amber-50 text-amber-600 text-[10px] font-bold">Pending</span>
                        </td>
                        <td class="py-4 text-center">
                            <button class="p-2 bg-green-50 text-green-600 rounded-xl hover:bg-green-600 hover:text-white transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="2" /></svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- LOG AKTIVITAS -->
    <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
        <h3 class="font-bold text-gray-800 mb-6">Aktivitas Terakhir</h3>
        <div class="space-y-6">
            <div class="flex gap-4 relative">
                <div class="h-full w-0.5 bg-gray-100 absolute left-2.5 top-7"></div>
                <div class="w-5 h-5 bg-maroon-dark rounded-full border-4 border-white shadow-md relative z-10"></div>
                <div>
                    <p class="text-xs font-bold text-gray-700">Admin Menambahkan Berita</p>
                    <p class="text-[10px] text-gray-400">2 Menit yang lalu</p>
                </div>
            </div>
            <div class="flex gap-4 relative">
                <div class="h-full w-0.5 bg-gray-100 absolute left-2.5 top-7"></div>
                <div class="w-5 h-5 bg-blue-500 rounded-full border-4 border-white shadow-md relative z-10"></div>
                <div>
                    <p class="text-xs font-bold text-gray-700">Pendaftaran Pasien Baru</p>
                    <p class="text-[10px] text-gray-400">15 Menit yang lalu</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection