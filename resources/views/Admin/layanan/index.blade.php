@extends('layouts.admin')

@section('title', 'Kelola Layanan')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8" data-aos="fade-down">
        <div>
            <h2 class="text-2xl font-extrabold text-maroon-dark uppercase tracking-tight flex items-center gap-3">
                <span class="w-2 h-8 bg-teal-500 rounded-full"></span>
                Daftar Layanan Kesehatan
            </h2>
            <p class="text-sm text-gray-500 mt-1">Kelola informasi poli dan jenis layanan yang tersedia untuk masyarakat.</p>
        </div>
    
        <a href="{{ route('admin.services.create') }}" class=" class="group bg-maroon-dark text-white px-6 py-3 rounded-full font-bold text-sm hover:shadow-xl hover:shadow-maroon-dark/20 transition-all duration-300 flex items-center gap-2 active:scale-95">">
    <i class="fas fa-plus"></i> Tambah Layanan
</a>
    </div>

    {{-- Stats Mini Card --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8" data-aos="fade-up">
        <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-teal-100 text-teal-600 rounded-2xl flex items-center justify-center text-xl">
                <i class="fas fa-stethoscope"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase">Total Poli</p>
                <h4 class="text-xl font-bold text-gray-800">12 Layanan</h4>
            </div>
        </div>
        <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-maroon-dark/10 text-maroon-dark rounded-2xl flex items-center justify-center text-xl">
                <i class="fas fa-eye"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase">Tampil di Beranda</p>
                <h4 class="text-xl font-bold text-gray-800">6 Poli Utama</h4>
            </div>
        </div>
        <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4 text-gray-400">
            <i class="fas fa-info-circle text-2xl"></i>
            <p class="text-xs leading-tight">Gunakan fitur pencarian untuk menemukan layanan dengan cepat.</p>
        </div>
    </div>

    {{-- Search & Filter --}}
    <div class="bg-white p-4 rounded-t-[30px] border-x border-t border-gray-100 flex flex-col md:flex-row gap-4 items-center justify-between shadow-sm">
        <div class="relative w-full md:w-80 group">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-teal-500 transition-colors"></i>
            <input type="text" placeholder="Cari nama layanan..." class="w-full pl-11 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-2xl text-sm focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 outline-none transition-all">
        </div>
        <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-gray-400 uppercase">Urutkan:</span>
            <select class="bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 text-xs font-bold text-gray-600 outline-none focus:ring-2 focus:ring-teal-500/20">
                <option>Terbaru</option>
                <option>Nama (A-Z)</option>
            </select>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="bg-white rounded-b-[30px] shadow-sm overflow-hidden border border-gray-100" data-aos="fade-up" data-aos-delay="200">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-maroon-dark uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="p-5 border-b border-gray-100">Info Layanan</th>
                        <th class="p-5 border-b border-gray-100">Deskripsi</th>
                        <th class="p-5 border-b border-gray-100 text-center">Status</th>
                        <th class="p-5 border-b border-gray-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    {{-- Row 1 --}}
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="p-5">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 bg-pink-soft/20 text-maroon-dark rounded-2xl flex items-center justify-center text-2xl shadow-sm group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-baby-carriage"></i>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-800 text-sm">Poli KIA & KB</h5>
                                    <span class="text-[10px] bg-teal-100 text-teal-700 px-2 py-0.5 rounded font-bold uppercase tracking-tighter italic">Layanan Ibu & Anak</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-5 max-w-md">
                            <p class="text-xs text-gray-500 leading-relaxed line-clamp-2">
                                Pelayanan kesehatan mencakup imunisasi, pemeriksaan rutin ibu hamil, serta konsultasi program keluarga berencana secara profesional.
                            </p>
                        </td>
                        <td class="p-5 text-center">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-100 text-green-600 text-[10px] font-bold">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                AKTIF
                            </span>
                        </td>
                        <td class="p-5">
                            <div class="flex justify-center items-center gap-2">
                                <a href="#" class="w-9 h-9 flex items-center justify-center bg-teal-50 text-teal-600 rounded-xl hover:bg-teal-500 hover:text-white transition-all shadow-sm" title="Edit">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                <button class="w-9 h-9 flex items-center justify-center bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all shadow-sm" title="Hapus">
                                    <i class="fas fa-trash-alt text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 2 (Contoh Lain) --}}
                    <tr class="hover:bg-gray-50/80 transition-colors group text-sm">
                        <td class="p-5">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 bg-pink-soft/20 text-maroon-dark rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-tooth"></i>
                                </div>
                                <div>
                                    <h5 class="font-bold text-gray-800">Poli Gigi</h5>
                                    <span class="text-[10px] bg-teal-100 text-teal-700 px-2 py-0.5 rounded font-bold uppercase tracking-tighter italic">Kesehatan Gigi</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-5 max-w-md">
                            <p class="text-xs text-gray-500 leading-relaxed line-clamp-2">
                                Perawatan gigi umum, pencabutan, pembersihan karang gigi, dan edukasi kesehatan mulut bagi anak maupun dewasa.
                            </p>
                        </td>
                        <td class="p-5 text-center">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-100 text-green-600 text-[10px] font-bold">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                AKTIF
                            </span>
                        </td>
                        <td class="p-5">
                            <div class="flex justify-center gap-2">
                                <a href="#" class="w-9 h-9 flex items-center justify-center bg-teal-50 text-teal-600 rounded-xl hover:bg-teal-500 hover:text-white transition-all"><i class="fas fa-edit text-xs"></i></a>
                                <button class="w-9 h-9 flex items-center justify-center bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all"><i class="fas fa-trash-alt text-xs"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination Placeholder --}}
        <div class="p-6 bg-gray-50 border-t border-gray-100 flex justify-between items-center text-xs">
            <p class="font-bold text-gray-400 uppercase tracking-widest">Menampilkan 2 dari 12 layanan</p>
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed">Sebelumnya</button>
                <button class="px-4 py-2 bg-white border border-gray-200 rounded-lg text-maroon-dark font-bold hover:bg-maroon-dark hover:text-white transition-all">Selanjutnya</button>
            </div>
        </div>
    </div>
</div>
@endsection