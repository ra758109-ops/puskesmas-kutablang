@extends('layouts.admin')

@section('page-title', 'Tambah Layanan Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                {{-- Nama Layanan --}}
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Nama Layanan / Poli</label>
                    <input type="text" name="nama_layanan" placeholder="Contoh: Poli KIA" 
                        class="w-full mt-2 p-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-maroon-dark transition-all">
                </div>

                {{-- Ikon --}}
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Ikon (FontAwesome)</label>
                    <input type="text" name="ikon" placeholder="fas fa-heartbeat" 
                        class="w-full mt-2 p-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-maroon-dark transition-all">
                    <p class="text-[10px] text-gray-400 mt-2">*Gunakan class dari fontawesome.com</p>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Deskripsi Singkat</label>
                    <textarea name="deskripsi_singkat" rows="4" placeholder="Jelaskan sedikit tentang layanan ini..." 
                        class="w-full mt-2 p-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-maroon-dark transition-all"></textarea>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-maroon-dark text-white font-bold py-4 rounded-2xl shadow-lg shadow-maroon-dark/20 hover:scale-[1.02] transition-all">
                        Simpan Layanan
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="flex-1 bg-gray-100 text-gray-500 font-bold py-4 rounded-2xl text-center hover:bg-gray-200 transition-all">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection