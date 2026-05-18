@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="bg-white rounded-[40px] shadow-xl border border-gray-100 overflow-hidden">
        <div class="bg-maroon-dark p-8 text-white">
            <h2 class="text-2xl font-black uppercase tracking-tight italic">Update Layanan</h2>
        </div>

        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="p-10 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Nama Layanan</label>
                <input type="text" name="nama_layanan" value="{{ $service->nama_layanan }}" required
                    class="w-full px-8 py-4 bg-gray-50 border-none rounded-[20px] focus:ring-2 focus:ring-maroon-dark/20 transition-all font-bold">
            </div>

            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Ikon (FontAwesome)</label>
                <input type="text" name="ikon" value="{{ $service->ikon }}" required
                    class="w-full px-8 py-4 bg-gray-50 border-none rounded-[20px] focus:ring-2 focus:ring-maroon-dark/20 transition-all font-mono">
            </div>

            <div>
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Deskripsi Singkat</label>
                <textarea name="deskripsi_singkat" rows="4" required
                    class="w-full px-8 py-4 bg-gray-50 border-none rounded-[20px] focus:ring-2 focus:ring-maroon-dark/20 transition-all font-medium">{{ $service->deskripsi_singkat }}</textarea>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit" class="flex-1 bg-maroon-dark text-white py-4 rounded-[20px] font-black uppercase tracking-widest shadow-lg hover:bg-maroon-800 transition-all">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.services.index') }}" class="px-8 py-4 bg-gray-100 text-gray-500 rounded-[20px] font-bold">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection