@extends('layouts.app')

@section('title', 'Program Kesehatan')

@section('content')
{{-- HERO SECTION --}}
<section class="bg-gradient-to-r from-maroon-dark to-slate-900 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-cover bg-center" style="background-image: url('{{ asset('images/kutablang.png') }}');"></div>
    <div class="container mx-auto px-4 relative z-10 text-center" data-aos="fade-down">
        <span class="text-teal-400 font-bold tracking-widest uppercase text-xs">Inovasi & Kegiatan</span>
        <h1 class="text-4xl md:text-5xl font-extrabold mt-2 mb-4">Program Kesehatan Masyarakat</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-sm leading-relaxed">
            Ikuti berbagai program promosi kesehatan dan pencegahan penyakit yang diselenggarakan oleh Puskesmas Kutablang untuk mewujudkan masyarakat yang sehat dan produktif.
        </p>
    </div>
</section>

{{-- SECTION KARTU STATISTIK (PRESET_DATA SEPERTI GAMBAR KEDUA) --}}
<section class="pt-16 pb-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">

            {{-- Kartu 1 --}}
            <div class="bg-white rounded-[30px] p-8 text-center shadow-[0_15px_30px_rgba(0,0,0,0.05)] border-b-[6px] border-maroon-dark transition-transform hover:-translate-y-2 duration-300">
                <span class="text-xs font-black tracking-widest text-slate-400 uppercase">Imunisasi Dasar</span>
                <div class="text-4xl font-black text-maroon-dark my-2 tracking-tight">95%</div>
                <p class="text-xs text-slate-400 italic">Capaian Tahun 2025</p>
            </div>

            {{-- Kartu 2 --}}
            <div class="bg-white rounded-[30px] p-8 text-center shadow-[0_15px_30px_rgba(0,0,0,0.05)] border-b-[6px] border-maroon-dark transition-transform hover:-translate-y-2 duration-300">
                <span class="text-xs font-black tracking-widest text-slate-400 uppercase">Gizi Baik Balita</span>
                <div class="text-4xl font-black text-teal-500 my-2 tracking-tight">92%</div>
                <p class="text-xs text-slate-400 italic">Kesehatan Anak</p>
            </div>

            {{-- Kartu 3 --}}
            <div class="bg-white rounded-[30px] p-8 text-center shadow-[0_15px_30px_rgba(0,0,0,0.05)] border-b-[6px] border-maroon-dark transition-transform hover:-translate-y-2 duration-300">
                <span class="text-xs font-black tracking-widest text-slate-400 uppercase">Peserta Prolanis</span>
                <div class="text-4xl font-black text-orange-400 my-2 tracking-tight">180</div>
                <p class="text-xs text-slate-400 italic">Anggota Aktif</p>
            </div>

        </div>
    </div>
</section>

{{-- LIST PROGRAM (DINAMIS DARI DATABASE) --}}
<section class="pb-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="h-[1px] bg-gray-200 max-w-6xl mx-auto mb-16"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($programs ?? [] as $program)
            <div class="bg-white rounded-[40px] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 group border border-gray-100" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="relative h-64 overflow-hidden">
                    @if($program->gambar)
                        <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <img src="{{ asset('images/kutablang.png') }}" alt="Default" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @endif
                    <div class="absolute top-5 left-5">
                        <span class="bg-maroon-dark text-white text-[10px] font-bold px-4 py-2 rounded-full uppercase tracking-widest">Kegiatan</span>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-maroon-dark mb-4 group-hover:text-teal-600 transition-colors">
                        {{ $program->judul }}
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        {{ Str::limit($program->deskripsi, 150) }}
                    </p>
                    <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                        <span class="text-xs text-gray-400 font-medium">
                            <i class="far fa-calendar-alt mr-2 text-teal-500"></i>
                            {{ $program->created_at ? $program->created_at->format('d M Y') : '18 Mei 2026' }}
                        </span>

                        <button onclick="openModalProgram('{{ $program->judul }}', '{{ e($program->deskripsi) }}', '{{ $program->gambar ? asset('storage/' . $program->gambar) : asset('images/kutablang.png') }}')" class="text-xs font-bold text-teal-600 hover:text-maroon-dark transition-colors flex items-center gap-2">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-4">
                <div class="inline-block p-8 bg-white rounded-3xl shadow-sm border border-dashed border-gray-300 w-full max-w-xl">
                    <i class="fas fa-clipboard-list text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-400 italic text-sm">Belum ada data program kegiatan tambahan yang dimasukkan dari admin.</p>
                </div>
            </div>
            @endforelse

        </div>
    </div>
</section>

{{-- MODAL DETAIL PROGRAM --}}
<div id="modalProgram" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-[2000] flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-2xl rounded-[40px] overflow-hidden shadow-2xl border-t-8 border-maroon-dark animate-[zoomIn_0.3s_ease-out]">
        <div class="relative h-48 sm:h-64 bg-gray-100">
            <img id="modalImg" src="" class="w-full h-full object-cover" alt="Detail">
            <button onclick="closeModalProgram()" class="absolute top-4 right-4 bg-black/50 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold hover:bg-black/80">&times;</button>
        </div>
        <div class="p-8 max-h-[60vh] overflow-y-auto">
            <h3 id="modalTitle" class="text-2xl font-bold text-maroon-dark mb-4"></h3>
            <p id="modalDesc" class="text-gray-600 text-sm leading-relaxed whitespace-pre-line"></p>
        </div>
    </div>
</div>

<script>
    function openModalProgram(title, desc, imgSrc) {
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalDesc').innerText = desc;
        document.getElementById('modalImg').src = imgSrc;
        document.getElementById('modalProgram').classList.remove('hidden');
    }

    function closeModalProgram() {
        document.getElementById('modalProgram').classList.add('hidden');
    }

    window.onclick = function(event) {
        let modal = document.getElementById('modalProgram');
        if (event.target == modal) closeModalProgram();
    }
</script>
@endsection
