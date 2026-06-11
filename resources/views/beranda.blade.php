@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
{{-- HERO SECTION --}}
<section class="relative min-h-[calc(100vh-75px)] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-[-1] bg-cover bg-center scale-110 animate-[slowZoomOut_3s_ease-out_forwards]"
         style="background-image: url('{{ asset('images/kutablang.png') }}');">
    </div>

    <div class="absolute inset-0 z-0 bg-gradient-to-r from-white/40 to-transparent"></div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <h1 class="text-maroon-dark font-extrabold text-4xl md:text-7xl leading-tight mb-6 drop-shadow-[2px_2px_10px_rgba(255,255,255,0.8)]">
            Generasi Sehat<br>Masyarakat Kutablang
        </h1>

        <div class="bg-white/85 backdrop-blur-md border-[3px] border-blue-border rounded-[30px] p-6 md:px-10 md:py-8 max-w-[850px] shadow-sm mb-8">
            <p class="font-semibold text-lg text-gray-800 mb-2">
                Pelayanan kesehatan primer yang ramah, cepat, dan terjangkau.
            </p>
            <p class="text-gray-700 opacity-75 leading-relaxed">
                Kami menyediakan layanan imunisasi, KIA, gizi, KB, rawat jalan, dan laboratorium untuk kesehatan keluarga Anda.
            </p>
        </div>

        <div class="flex flex-wrap gap-4 items-center">
            <a href="#layanan-section" class="bg-maroon-dark text-white px-8 py-3 rounded-full font-semibold hover:bg-opacity-90 hover:scale-105 hover:-translate-y-1 transition-all duration-300 flex items-center shadow-md active:scale-95">
                Layanan Kami
            </a>

            <a href="{{ url('/pendaftaran') }}" class="bg-pink-soft text-maroon-dark px-8 py-3 rounded-full font-semibold hover:opacity-80 hover:scale-105 hover:-translate-y-1 transition-all duration-300 shadow-md active:scale-95">
                Buat Janji Temu
            </a>

            <button onclick="openModalCek()" class="bg-white border-2 border-maroon-dark text-maroon-dark px-8 py-3 rounded-full font-semibold hover:bg-maroon-dark hover:text-white hover:scale-105 hover:-translate-y-1 transition-all duration-300 shadow-md active:scale-95">
                Cek Antrian Saya
            </button>

            <a href="https://wa.me/+6281234567890" target="_blank" class="bg-maroon-dark text-white px-8 py-3 rounded-full font-semibold hover:bg-opacity-90 hover:scale-105 hover:-translate-y-1 transition-all duration-300 flex items-center gap-3 shadow-md active:scale-95">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" class="w-5 invert brightness-0" alt="WA">
                Hubungi Via WhatsApp
            </a>
        </div>
    </div>
</section>

{{-- SECTION LAYANAN (DINAMIS) --}}
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;600;700;800&display=swap');

#layanan-section {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: #f8f4f0;
    padding: 72px 0;
    position: relative;
    overflow: hidden;
}
#layanan-section::before {
    content: '';
    position: absolute;
    top: -120px; right: -120px;
    width: 400px; height: 400px;
    border-radius: 50%;
    background: rgba(110, 23, 39, 0.06);
    pointer-events: none;
}
#layanan-section::after {
    content: '';
    position: absolute;
    bottom: -80px; left: -80px;
    width: 280px; height: 280px;
    border-radius: 50%;
    background: rgba(15, 110, 86, 0.05);
    pointer-events: none;
}
.ls-eyebrow { display: inline-flex; align-items: center; gap: 8px; margin-bottom: 10px; }
.ls-eyebrow-line { width: 28px; height: 2px; background: linear-gradient(90deg, #6e1727, #0f6e56); border-radius: 2px; }
.ls-eyebrow span { font-size: 11px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: #6e1727; }
.ls-title { font-size: clamp(26px, 4vw, 38px); font-weight: 800; color: #3d0d18; line-height: 1.15; margin: 0; }
.ls-link { display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; color: #6e1727; text-decoration: none; letter-spacing: .05em; text-transform: uppercase; padding: 10px 0; border-bottom: 2px solid transparent; transition: border-color .25s, gap .25s; }
.ls-link:hover { border-bottom-color: #6e1727; gap: 12px; }

.ls-card {
    background: #fff;
    border-radius: 24px;
    padding: 32px 28px;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(110, 23, 39, 0.08);
    transition: box-shadow .4s;
}
.ls-card::before {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(135deg, #6e1727 0%, #3d0d18 100%);
    opacity: 0;
    transition: opacity .4s;
}
.ls-card:hover::before { opacity: 1; }

.ls-card-num {
    position: absolute; top: 18px; right: 22px;
    font-size: 42px; font-weight: 800;
    color: rgba(110, 23, 39, 0.06);
    line-height: 1; transition: color .4s;
}
.ls-card:hover .ls-card-num { color: rgba(255,255,255,0.08); }

.ls-icon-wrap {
    width: 52px; height: 52px;
    border-radius: 16px;
    background: rgba(110, 23, 39, 0.08);
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 20px;
    transition: background .4s, transform .4s;
    position: relative; z-index: 1;
}
.ls-card:hover .ls-icon-wrap { background: rgba(255,255,255,0.15); transform: scale(1.1) rotate(-4deg); }
.ls-icon-wrap i { font-size: 22px; color: #6e1727; transition: color .4s; }
.ls-card:hover .ls-icon-wrap i { color: #fff; }

.ls-card h3 { font-size: 17px; font-weight: 700; color: #3d0d18; margin: 0 0 10px; transition: color .4s; position: relative; z-index: 1; }
.ls-card:hover h3 { color: #fff; }
.ls-card p { font-size: 13px; color: #888; line-height: 1.7; margin: 0 0 24px; transition: color .4s; position: relative; z-index: 1; }
.ls-card:hover p { color: rgba(255,255,255,0.75); }

.ls-cta { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; color: #0f6e56; text-decoration: none; transition: color .4s, gap .4s; position: relative; z-index: 1; }
.ls-card:hover .ls-cta { color: #a7f3d0; gap: 10px; }
.ls-cta-dot { width: 5px; height: 5px; border-radius: 50%; background: currentColor; transition: transform .4s; }
.ls-card:hover .ls-cta-dot { transform: scale(1.5); }

.ls-card-accent { position: absolute; bottom: -30px; right: -30px; width: 100px; height: 100px; border-radius: 50%; background: rgba(15,110,86,0.06); transition: background .4s, transform .4s; }
.ls-card:hover .ls-card-accent { background: rgba(255,255,255,0.05); transform: scale(1.6); }
</style>

<section id="layanan-section" class="py-20">
    <div class="container mx-auto px-4" style="position:relative;z-index:1">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-4">
            <div data-aos="fade-right">
                <div class="ls-eyebrow">
                    <div class="ls-eyebrow-line"></div>
                    <span>Pelayanan Kami</span>
                </div>
                <h2 class="ls-title">Layanan Kesehatan Utama</h2>
            </div>
            <a href="{{ url('/layanan') }}" class="ls-link">
                Lihat Semua Layanan <i class="fas fa-arrow-right" style="font-size:11px"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($polis as $poli)
            @php
                // Mengubah nama poli menjadi huruf kecil untuk mempermudah pencocokan kata kunci
                $namaPoli = strtolower($poli->nama_poli);
                
                // Pemetaan kata kunci nama poli ke ikon Font Awesome yang sesuai
                $icon = match(true) {
                    str_contains($namaPoli, 'umum') => 'fas fa-user-md',
                    str_contains($namaPoli, 'gigi') => 'fas fa-tooth',
                    str_contains($namaPoli, 'anak') => 'fas fa-baby',
                    str_contains($namaPoli, 'kandungan') || str_contains($namaPoli, 'kia') || str_contains($namaPoli, 'kebidanan') => 'fas fa-female',
                    str_contains($namaPoli, 'mata') => 'fas fa-eye',
                    str_contains($namaPoli, 'jantung') => 'fas fa-heartbeat',
                    str_contains($namaPoli, 'dalam') => 'fas fa-stethoscope',
                    str_contains($namaPoli, 'paru') => 'fas fa-lungs',
                    str_contains($namaPoli, 'kulit') || str_contains($namaPoli, 'kelamin') => 'fas fa-allergies',
                    str_contains($namaPoli, 'tht') => 'fas fa-deaf',
                    str_contains($namaPoli, 'saraf') || str_contains($namaPoli, 'neurologi') => 'fas fa-brain',
                    str_contains($namaPoli, 'jiwa') || str_contains($namaPoli, 'psikologi') => 'fas fa-user-shield',
                    str_contains($namaPoli, 'bedah') => 'fas fa-procedures',
                    str_contains($namaPoli, 'lansia') || str_contains($namaPoli, 'geriatri') => 'fas fa-blind',
                    default => 'fas fa-hand-holding-medical' // Ikon cadangan jika tidak ada yang cocok
                };
            @endphp
            <div class="ls-card" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <span class="ls-card-num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                <div class="ls-icon-wrap">
                    <i class="{{ $icon }}"></i>
                </div>
                <h3>{{ $poli->nama_poli }}</h3>
                <p>{{ Str::limit($poli->deskripsi, 100) }}</p>
                <a href="{{ url('/pendaftaran') }}" class="ls-cta">
                    <span class="ls-cta-dot"></span> Daftar Sekarang
                </a>
                <div class="ls-card-accent"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SECTION DOKTER --}}
<section class="py-20 bg-white overflow-hidden"> {{-- Tambah overflow-hidden di section utama agar pas --}}
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div class="text-left">
                <span class="text-teal-600 font-bold tracking-widest uppercase text-xs block">Tenaga Medis</span>
                <h2 class="text-3xl md:text-4xl font-bold text-maroon-dark mt-2">Dokter Spesialis & Umum</h2>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ url('/jadwal') }}" class="text-maroon-dark font-bold hover:underline flex items-center gap-2">
                    Lihat Semua Jadwal <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>

        <div class="text-center mb-12">
            <div class="flex flex-wrap justify-center gap-3 mt-4">
                <button onclick="filterDokter('all')" class="filter-btn active px-6 py-2 rounded-full border-2 border-maroon-dark text-sm font-bold transition-all">Semua</button>
                @foreach($polis as $p)
                <button onclick="filterDokter('{{ $p->nama_poli }}')" class="filter-btn px-6 py-2 rounded-full border-2 border-gray-200 text-gray-500 text-sm font-bold hover:border-maroon-dark hover:text-maroon-dark transition-all">
                    {{ $p->nama_poli }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- 
          🚀 PERUBAHAN UTAMA: 
          - Mengubah 'grid' menjadi 'flex overflow-x-auto' agar card berjejer ke kanan.
          - Menambahkan 'pb-4' supaya efek shadow card tidak terpotong oleh overflow.
          - Menambahkan class kustom 'no-scrollbar' (opsional) agar scrollbar bawaan browser tidak merusak estetika.
        --}}
        <div id="doctor-wrapper" class="flex overflow-x-auto gap-8 pb-6 no-scrollbar snap-x snap-mandatory">
            @php $doktersAktif = collect($dokters ?? [])->where('is_aktif', 1); @endphp

            @foreach($doktersAktif as $dokter)
            {{-- 🚀 PERUBAHAN CARD: Menambahkan 'flex-shrink-0 w-[280px]' agar ukuran kartu konsisten dan 'snap-start' untuk efek bergeser yang smooth --}}
            <div class="doctor-card group flex-shrink-0 w-[280px] sm:w-[320px] snap-start" data-aos="fade-left" data-specialty="{{ $dokter->poli->nama_poli ?? 'Umum' }}">
                <div class="relative overflow-hidden rounded-[40px] mb-4 shadow-lg bg-slate-100">
                    @if($dokter->foto && file_exists(public_path('uploads/dokter/' . $dokter->foto)))
                        <img src="{{ asset('uploads/dokter/' . $dokter->foto) }}" alt="{{ $dokter->nama_dokter }}" class="w-full h-[350px] object-cover group-hover:scale-110 transition-transform duration-700">
                    @elseif($dokter->foto && file_exists(public_path('storage/dokter/' . $dokter->foto)))
                        <img src="{{ asset('storage/dokter/' . $dokter->foto) }}" alt="{{ $dokter->nama_dokter }}" class="w-full h-[350px] object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-[350px] flex items-center justify-center bg-slate-200 text-slate-400">
                            <i class="fas fa-user-md text-6xl"></i>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-maroon-dark/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-8">
                        <p class="text-white text-xs leading-relaxed italic">"Melayani dengan sepenuh hati untuk kesehatan masyarakat Kutablang."</p>
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="text-lg font-extrabold text-maroon-dark">{{ $dokter->nama_dokter }}</h4>
                    <p class="text-teal-600 font-medium text-sm">{{ $dokter->poli->nama_poli ?? 'Umum' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Tambahkan CSS ini di file CSS utama Anda atau di dalam tag <style> halaman Anda --}}
<style>
    /* Menyembunyikan scrollbar bawaan browser tapi fungsi scroll tetap aktif */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;  /* IE dan Edge */
        scrollbar-width: none;  /* Firefox */
    }
</style>

{{-- SECTION PROGRAM PUSKESMAS --}}
{{-- SECTION PROGRAM (DINAMIS) --}}
<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;600;700;800;900&display=swap');

#program-section {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: #fdfbfc; 
    padding: 72px 0;
    position: relative;
    overflow: hidden;
}

/* Orb background transparan lembut */
.ps-orb { position: absolute; border-radius: 50%; pointer-events: none; }
.ps-orb-1 { width: 500px; height: 500px; background: rgba(110,23,39,0.05); top: -150px; right: -150px; animation: orbFloat 8s ease-in-out infinite; }
.ps-orb-2 { width: 320px; height: 320px; background: rgba(15,110,86,0.03); bottom: -80px; left: -80px; animation: orbFloat 11s ease-in-out infinite reverse; }
.ps-orb-3 { width: 180px; height: 180px; background: rgba(110,23,39,0.03); top: 40%; left: 20%; animation: orbFloat 7s ease-in-out infinite 2s; }

@keyframes orbFloat {
    0%,100% { transform: translate(0,0) scale(1); }
    33%      { transform: translate(20px,-30px) scale(1.05); }
    66%      { transform: translate(-15px,20px) scale(0.97); }
}
@keyframes fadeUp { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
@keyframes pulse { 0%,100% { opacity:1; transform:scale(1); } 50% { opacity:.5; transform:scale(.7); } }

/* Tag atas */
.ps-tag { display:inline-flex; align-items:center; gap:8px; background:rgba(110,23,39,0.06); border:1px solid rgba(110,23,39,0.15); border-radius:100px; padding:6px 16px; margin-bottom:20px; }
.ps-tag-dot { width:6px; height:6px; border-radius:50%; background:#6e1727; animation:pulse 2s ease-in-out infinite; }
.ps-tag span { font-size:11px; font-weight:700; letter-spacing:.18em; text-transform:uppercase; color:#6e1727; }

/* Judul Utama */
.ps-title { font-size:clamp(28px,4vw,42px); font-weight:900; color:#1a0509; line-height:1.1; letter-spacing:-.02em; }
.ps-title em { font-style:normal; color:#6e1727; position: relative; }

/* Bento Grid */
.ps-bento { display:grid; grid-template-columns:1fr 1fr 1fr; grid-template-rows:auto auto; gap:20px; }
@media(max-width:768px) { .ps-bento { grid-template-columns:1fr; } .pb-1,.pb-2,.pb-3,.pb-4 { grid-column:1!important; grid-row:auto!important; min-height:260px!important; } }

/* Card Styling */
.pb { border-radius:24px; overflow:hidden; position:relative; cursor:pointer; background:#f5ecea; box-shadow: 0 10px 30px rgba(110,23,39, 0.04); transition:transform .35s cubic-bezier(.22,.68,0,1.2), box-shadow .35s; }
.pb:hover { transform:translateY(-6px); box-shadow: 0 20px 40px rgba(110,23,39, 0.12); }

.pb-1 { grid-column:1/3; grid-row:1/2; min-height:280px; border:1px solid rgba(110,23,39,0.12); animation:fadeUp .6s ease .1s both; }
.pb-2 { grid-column:3/4; grid-row:1/2; min-height:280px; border:1px solid rgba(15,110,86,0.12); animation:fadeUp .6s ease .2s both; }
.pb-3 { grid-column:1/2; grid-row:2/3; min-height:240px; border:1px solid rgba(110,23,39,0.12); animation:fadeUp .6s ease .3s both; }
.pb-4 { grid-column:2/4; grid-row:2/3; min-height:240px; border:1px solid rgba(55,138,221,0.12); animation:fadeUp .6s ease .4s both; }

/* ==========================================================================
   PERUBAHAN OPTIMASI GAMBAR (DI-PERJELAS)
   ========================================================================== */
.pb-img { position:absolute; inset:0; overflow:hidden; background:#1a0509; }
.pb-img img { width:100%; height:100%; object-fit:cover; opacity:.85; transition:opacity .5s, transform .5s; } /* Opacity dinaikkan agar gambar jelas */
.pb:hover .pb-img img { opacity:.95; transform:scale(1.04); }

.pb-initials { position:absolute; inset:0; display:flex; align-items:center; justify-content:center; font-size:80px; font-weight:900; letter-spacing:.1em; color:rgba(255,255,255,0.15); user-select:none; pointer-events:none; }

/* Overlay diubah menjadi gelap transparan di bagian bawah agar teks putih terbaca kontras */
.pb-overlay { position:absolute; inset:0; background:linear-gradient(to top, rgba(15,3,6,0.92) 0%, rgba(15,3,6,0.4) 55%, rgba(15,3,6,0.1) 100%); pointer-events:none; }
/* ========================================================================== */

/* Efek Sorotan Glow saat Hover */
.pb-glow { position:absolute; width:200px; height:200px; border-radius:50%; background:rgba(255,255,255,0.1); bottom:-60px; right:-60px; pointer-events:none; opacity:0; transition:opacity .4s; }
.pb:hover .pb-glow { opacity:1; }

/* Garis Atas Card */
.pb-accentline { position:absolute; top:0; left:0; right:0; height:4px; background:linear-gradient(90deg,#6e1727,transparent); z-index: 3; }
.pb-2 .pb-accentline { background:linear-gradient(90deg,#0f6e56,transparent); }

/* Badge Kategori */
.pb-badge { position:absolute; top:18px; left:18px; background:#6e1727; border:1px solid rgba(255,255,255,0.2); border-radius:100px; padding:5px 14px; font-size:10px; font-weight:700; letter-spacing:.15em; text-transform:uppercase; color:#fff; z-index: 3; }

/* Konten Dalam Card (Teks diubah menjadi Putih agar kontras dengan gambar yang sudah diperjelas) */
.pb-content { position:absolute; bottom:0; left:0; right:0; padding:28px; z-index: 2; }
.pb-date { display:flex; align-items:center; gap:6px; font-size:11px; color:rgba(255,255,255,0.7); margin-bottom:10px; font-weight:600; }
.pb-name { font-size:18px; font-weight:800; color:#ffffff; line-height:1.25; margin-bottom:8px; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; text-shadow: 0 2px 4px rgba(0,0,0,0.2); }
.pb-1 .pb-name { font-size:24px; color:#ffffff; } 
.pb-desc { font-size:13px; color:rgba(255,255,255,0.8); line-height:1.65; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; margin-bottom:16px; }

/* CTA Link */
.pb-cta { display:inline-flex; align-items:center; gap:8px; font-size:11px; font-weight:800; letter-spacing:.12em; text-transform:uppercase; color:#5dcaa5; text-decoration:none; transition:gap .3s, color .3s; }
.pb:hover .pb-cta { gap:12px; color:#9fe1cb; }
.pb-arrow { width:28px; height:28px; border-radius:50%; border:1.5px solid rgba(93,202,165,0.5); display:flex; align-items:center; justify-content:center; transition:background .3s, border-color .3s; }
.pb:hover .pb-arrow { background:#0f6e56; border-color:#0f6e56; }
.pb-arrow i { font-size:12px; color:#5dcaa5; transition:color .3s; }
.pb:hover .pb-arrow i { color:#fff; }

/* Tampilan Kosong */
.ps-empty { border:1px dashed rgba(110,23,39,0.2); border-radius:24px; padding:60px 24px; text-align:center; background:#fff; }
.ps-empty p { font-size:14px; color:#8a7478; font-style:italic; }
</style>

<section id="program-section" class="py-20">
    <div class="ps-orb ps-orb-1"></div>
    <div class="ps-orb ps-orb-2"></div>
    <div class="ps-orb ps-orb-3"></div>

    <div class="container mx-auto px-4" style="position:relative;z-index:1">
        <div class="text-center mb-14" style="animation:fadeUp .7s ease both">
            <div class="ps-tag" style="justify-content:center;display:inline-flex">
                <span class="ps-tag-dot"></span>
                <span>Inovasi &amp; Kegiatan</span>
            </div>
            <h2 class="ps-title">Program Kesehatan <em>Masyarakat</em></h2>
        </div>

        <div class="ps-bento">
            @forelse($programs ?? [] as $program)
            @php
                $colClass = match($loop->iteration) {
                    1 => 'pb-1', 2 => 'pb-2', 3 => 'pb-3', default => 'pb-4'
                };
                $hasImg = $program->gambar && (
                    file_exists(public_path('uploads/program/' . $program->gambar)) ||
                    file_exists(public_path('uploads/' . $program->gambar))
                );
                $imgUrl = '';
                if ($hasImg) {
                    $imgUrl = file_exists(public_path('uploads/program/' . $program->gambar))
                        ? asset('uploads/program/' . $program->gambar)
                        : asset('uploads/' . $program->gambar);
                }
            @endphp
            <div class="pb {{ $colClass }}">
                <div class="pb-accentline"></div>
                <div class="pb-img">
                    @if($hasImg)
                        <img src="{{ $imgUrl }}" alt="{{ $program->nama_program }}">
                    @else
                        <div class="pb-initials">{{ strtoupper(substr($program->nama_program ?? 'PR', 0, 2)) }}</div>
                    @endif
                </div>
                <div class="pb-overlay"></div>
                <div class="pb-glow"></div>
                <span class="pb-badge">Update Terbaru</span>
                <div class="pb-content">
                    <div class="pb-date">
                        <i class="far fa-calendar-alt"></i>
                        &nbsp;{{ $program->created_at ? $program->created_at->format('d M Y') : now()->format('d M Y') }}
                    </div>
                    <h3 class="pb-name">{{ $program->nama_program }}</h3>
                    <p class="pb-desc">{{ $program->deskripsi }}</p>
                    <a href="{{ route('program.index') }}" class="pb-cta">
                        Baca Selengkapnya
                        <span class="pb-arrow"><i class="fas fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 ps-empty">
                <i class="far fa-newspaper" style="font-size:36px;color:#6e1727;opacity:0.4;display:block;margin-bottom:12px"></i>
                <p>Belum ada program atau kegiatan yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
{{-- SECTION BERITA & EDUKASI KESEHATAN --}}

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700;800;900&family=Playfair+Display:wght=700;900&display=swap');

#berita-section {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: #faf9f7;
    padding: 80px 0;
    position: relative;
}
#berita-section::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, #6e1727 0%, #a0253b 40%, #0f6e56 100%);
}

.bs-left { border-left: 3px solid #6e1727; padding-left: 16px; }
.bs-eyebrow { font-size: 10px; font-weight: 700; letter-spacing: .22em; text-transform: uppercase; color: #0f6e56; margin-bottom: 8px; display: flex; align-items: center; gap: 8px; }
.bs-eyebrow::before { content: ''; display: inline-block; width: 20px; height: 1px; background: #0f6e56; }
.bs-title { font-family: 'Playfair Display', serif; font-size: clamp(26px, 3.5vw, 38px); font-weight: 900; color: #1a0509; line-height: 1.1; }
.bs-link { display: inline-flex; align-items: center; gap: 8px; font-size: 12px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: #6e1727; text-decoration: none; padding-bottom: 2px; border-bottom: 1.5px solid #6e1727; transition: gap .25s, opacity .25s; }
.bs-link:hover { gap: 12px; opacity: .7; }

.bs-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; grid-template-rows: auto auto; gap: 0; border: 1px solid #e8e2dc; border-radius: 20px; overflow: hidden; background: #fff; }
@media(max-width: 768px) { .bs-grid { grid-template-columns: 1fr; border-radius: 12px; } .ba-hero { grid-column: 1!important; grid-row: auto!important; } .ba-sm-row { grid-column: 1!important; } }

.ba { position: relative; transition: background .3s; }
.ba:hover { background: #fdf8f5; }
.ba-hero { grid-column: 1/3; grid-row: 1/3; border-right: 1px solid #e8e2dc; display: flex; flex-direction: column; }
.ba-sm { border-bottom: 1px solid #e8e2dc; display: flex; flex-direction: column; }
.ba-sm:last-child { border-bottom: none; }
.ba-sm-row { grid-column: 3/4; grid-row: 1/3; display: flex; flex-direction: column; }

/* Badge Kategori Baru Tanpa Pembungkus Gambar */
.ba-kbadge { display: inline-block; width: max-content; background: #6e1727; color: #fff; font-size: 9px; font-weight: 800; letter-spacing: .15em; text-transform: uppercase; padding: 5px 12px; border-radius: 4px; margin-bottom: 14px; }
.ba-hero .ba-kbadge { font-size: 10px; padding: 6px 14px; }

.ba-body { padding: 24px; flex: 1; display: flex; flex-direction: column; }
.ba-hero .ba-body { padding: 32px; }
.ba-sm .ba-body { padding: 20px; }

.ba-meta { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
.ba-date { font-size: 11px; color: #9e8a7a; font-weight: 500; display: flex; align-items: center; gap: 5px; }
.ba-sep { width: 3px; height: 3px; border-radius: 50%; background: #c8b8af; }

.ba-title { font-family: 'Playfair Display', serif; font-weight: 700; color: #1a0509; line-height: 1.3; margin-bottom: 12px; transition: color .25s; }
.ba:hover .ba-title { color: #6e1727; }
.ba-hero .ba-title { font-size: 24px; }
.ba-sm .ba-title { font-size: 16px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }

.ba-desc { font-size: 13px; color: #7a6a5f; line-height: 1.7; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: 20px; flex: 1; }
.ba-sm .ba-desc { -webkit-line-clamp: 2; margin-bottom: 14px; font-size: 12px; }

.ba-cta { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; color: #0f6e56; text-decoration: none; transition: gap .25s; margin-top: auto; }
.ba:hover .ba-cta { gap: 10px; }
.ba-cta-arrow { width: 22px; height: 22px; border-radius: 50%; border: 1.5px solid #0f6e56; display: flex; align-items: center; justify-content: center; transition: background .25s; }
.ba:hover .ba-cta-arrow { background: #0f6e56; }
.ba-cta-arrow i { font-size: 10px; color: #0f6e56; transition: color .25s; }
.ba:hover .ba-cta-arrow i { color: #fff; }

.bs-empty { border: 1px dashed #d5c8c0; border-radius: 20px; padding: 60px 24px; text-align: center; background: #fff; }
.bs-empty p { font-size: 14px; color: #b0a09a; font-style: italic; }
</style>

<section id="berita-section" class="py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div class="bs-left" data-aos="fade-right">
                <div class="bs-eyebrow">Artikel &amp; Informasi</div>
                <h2 class="bs-title">Kabar &amp; Edukasi Sehat</h2>
            </div>
            <a href="{{ url('/berita') }}" class="bs-link">
                Lihat Semua Artikel <i class="fas fa-arrow-right" style="font-size:11px"></i>
            </a>
        </div>

        @if(($beritas ?? collect())->isNotEmpty())
        <div class="bs-grid">
            @foreach($beritas as $index => $berita)

            @php
                $isHero = $index === 0;
            @endphp

            @if($isHero)
            <div class="ba ba-hero" data-aos="fade-up">
                <div class="ba-body">
                    <span class="ba-kbadge">{{ $berita->kategori ?? 'Info Sehat' }}</span>
                    <div class="ba-meta">
                        <span class="ba-date"><i class="far fa-calendar-alt"></i> {{ $berita->created_at ? $berita->created_at->format('d M Y') : now()->format('d M Y') }}</span>
                        <span class="ba-sep"></span>
                        <span class="ba-date">5 menit baca</span>
                    </div>
                    <h3 class="ba-title">
                        <a href="{{ route('public.berita.detail', $berita->slug) }}" style="text-decoration:none;color:inherit">{{ $berita->judul }}</a>
                    </h3>
                    <p class="ba-desc">{{ strip_tags($berita->konten ?? $berita->isi ?? 'Klik baca selengkapnya untuk mendapatkan informasi detail.') }}</p>
                    <a href="{{ route('public.berita.detail', $berita->slug) }}" class="ba-cta">
                        Baca Selengkapnya
                        <span class="ba-cta-arrow"><i class="fas fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="ba-sm-row" style="grid-column:3/4;grid-row:1/3">
            @elseif($index <= 2)
                <div class="ba ba-sm" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="ba-body">
                        <span class="ba-kbadge">{{ $berita->kategori ?? 'Info Sehat' }}</span>
                        <div class="ba-meta">
                            <span class="ba-date"><i class="far fa-calendar-alt"></i> {{ $berita->created_at ? $berita->created_at->format('d M Y') : now()->format('d M Y') }}</span>
                        </div>
                        <h3 class="ba-title">
                            <a href="{{ route('public.berita.detail', $berita->slug) }}" style="text-decoration:none;color:inherit">{{ $berita->judul }}</a>
                        </h3>
                        <p class="ba-desc">{{ strip_tags($berita->konten ?? $berita->isi ?? '') }}</p>
                        <a href="{{ route('public.berita.detail', $berita->slug) }}" class="ba-cta">
                            Baca <span class="ba-cta-arrow"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                @if($index === 2)</div>@endif
            @endif

            @endforeach
        </div>
        @else
        <div class="col-span-3 bs-empty">
            <p>Belum ada artikel berita atau edukasi kesehatan yang dipublikasikan.</p>
        </div>
        @endif
    </div>
</section>

{{-- MODAL CEK ANTRIAN --}}
<div id="modalCek" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-[999] flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-md rounded-[30px] p-8 shadow-2xl border-t-8 border-maroon-dark">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-maroon-dark">Cek Status</h3>
            <button onclick="closeModalCek()" class="text-gray-400 hover:text-red-500 text-2xl font-bold">&times;</button>
        </div>
        <p class="text-gray-600 text-sm mb-6">Silakan masukkan NIK yang Anda gunakan saat mendaftar untuk melihat nomor antrian.</p>
        <form id="formCekAntrian">
            @csrf
            <div class="mb-5">
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 ml-1">NIK</label>
                <input type="text" id="inputNik" name="nik" placeholder="16 Digit NIK Anda"
                       class="w-full px-5 py-4 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all" required>
            </div>
            <div id="hasilCek" class="hidden mb-5 p-4 bg-red-50 rounded-2xl border-2 border-dashed border-maroon-dark/20 transition-all"></div>
            <button type="submit" id="btnCari" class="w-full bg-maroon-dark text-white py-4 rounded-2xl font-bold hover:bg-opacity-90 shadow-lg transition-all active:scale-95">
                Cari Data Antrian
            </button>
        </form>
    </div>
</div>

<style>
    @keyframes slowZoomOut {
        from { transform: scale(1.1); }
        to { transform: scale(1); }
    }
    .filter-btn.active {
        background-color: #4a0e0e;
        color: white;
        border-color: #4a0e0e;
    }
</style>

<script>
    function openModalCek() {
        document.getElementById('modalCek').classList.remove('hidden');
        document.getElementById('hasilCek').classList.add('hidden');
        document.getElementById('inputNik').value = '';
    }
    function closeModalCek() {
        document.getElementById('modalCek').classList.add('hidden');
    }
    window.onclick = function(event) {
        let modal = document.getElementById('modalCek');
        if (event.target == modal) closeModalCek();
    }

    document.getElementById('formCekAntrian').onsubmit = async (e) => {
        e.preventDefault();

        const nik = document.getElementById('inputNik').value;
        const hasilDiv = document.getElementById('hasilCek');
        const btn = document.getElementById('btnCari');

        if (btn.innerText.includes('Kembali') || !hasilDiv.classList.contains('hidden')) {
            hasilDiv.classList.add('hidden');
            hasilDiv.innerHTML = '';
            document.getElementById('inputNik').value = '';
            btn.innerText = 'Cari Data Antrian';
            return;
        }

        btn.innerText = 'Mencari...';
        btn.disabled = true;

        try {
            const response = await fetch(`/pendaftaran/cek?nik=${nik}`);
            const data = await response.json();
            hasilDiv.classList.remove('hidden');

            if (data.success) {
                let innerHtmlData = `
                    <div class="text-center">
                        <p class="text-[10px] text-gray-500 uppercase font-bold tracking-widest">Nomor Antrian</p>
                        <div class="text-5xl font-black text-maroon-dark my-1">${data.nomor_antrian}</div>
                        <div class="h-[1px] bg-maroon-dark/10 my-3 w-full"></div>
                        <p class="text-sm font-bold text-gray-800">${data.nama}</p>
                        <p class="text-[11px] text-gray-500 mb-3">${data.layanan}</p>
                    </div>
                `;

                // 🚀 FIX REAL: Hanya membaca data status 'Selesai' agar tidak bentrok data berkas pendaftaran
                if (data.status === 'Selesai') {
                    innerHtmlData += `
                        <div class="mt-4 pt-4 border-t border-dashed border-gray-200 text-left">
                            <p class="text-xs font-bold text-center text-green-700 bg-green-50 py-1 rounded-full mb-3">✨ Pelayanan Selesai. Yuk Isi Ulasan!</p>
                            <div id="reviewAlert" class="hidden mb-2 p-2 text-[11px] text-center rounded-xl"></div>
                            <form id="formReviewAjax" class="space-y-3">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="nik" value="${nik}">
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-1">Rating</label>
                                    <select name="rating" required class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 bg-white outline-none">
                                        <option value="5">⭐⭐⭐⭐⭐ (Sangat Puas)</option>
                                        <option value="4">⭐⭐⭐⭐ (Puas)</option>
                                        <option value="3">⭐⭐⭐ (Cukup)</option>
                                        <option value="2">⭐⭐ (Kurang Puas)</option>
                                        <option value="1">⭐ (Buruk)</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-1">Komentar / Saran</label>
                                    <textarea name="komentar" rows="2" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 outline-none" placeholder="Masukkan ulasan Anda..."></textarea>
                                </div>
                                <button type="submit" id="btnKirimReview" class="w-full bg-green-600 text-white py-2 rounded-xl text-xs font-bold hover:bg-green-700 transition-all cursor-pointer">
                                    Kirim Ulasan Pelayanan
                                </button>
                            </form>
                        </div>
                    `;
                } else {
                    innerHtmlData += `
                        <div class="mt-3 p-2 bg-yellow-50 text-yellow-800 text-[11px] rounded-xl text-center border border-yellow-100">
                            ℹ️ Ulasan terbuka otomatis setelah pelayanan Anda dinyatakan "Selesai".
                        </div>
                    `;
                }

                hasilDiv.innerHTML = innerHtmlData;
                btn.innerText = 'Kembali / Cek NIK Lain';

                if (document.getElementById('formReviewAjax')) {
                    document.getElementById('formReviewAjax').onsubmit = async (eEvent) => {
                        eEvent.preventDefault();
                        const btnReview = document.getElementById('btnKirimReview');
                        const alertReview = document.getElementById('reviewAlert');
                        btnReview.innerText = 'Mengirim...';
                        btnReview.disabled = true;

                        try {
                            const resReview = await fetch(`{{ route('review.store') }}`, {
                                method: 'POST',
                                body: new FormData(eEvent.target),
                                headers: { 'X-Requested-With': 'XMLHttpRequest' }
                            });
                            const resData = await resReview.json();
                            alertReview.classList.remove('hidden', 'bg-red-50', 'text-red-700');
                            alertReview.classList.add('bg-green-50', 'text-green-700');
                            alertReview.innerText = '✨ Ulasan berhasil dikirim! Terima kasih.';
                            document.getElementById('formReviewAjax').reset();
                        } catch (err) {
                            alertReview.classList.remove('hidden', 'bg-green-50', 'text-green-700');
                            alertReview.classList.add('bg-red-50', 'text-red-700');
                            alertReview.innerText = '⚠️ Gagal mengirim ulasan.';
                        } finally {
                            btnReview.innerText = 'Kirim Ulasan Pelayanan';
                            btnReview.disabled = false;
                        }
                    };
                }
            } else {
                hasilDiv.innerHTML = `<p class="text-red-500 text-center font-bold text-sm">${data.message || 'Data tidak ditemukan.'}</p>`;
                btn.innerText = 'Kembali';
            }
        } catch (error) {
            hasilDiv.classList.remove('hidden');
            hasilDiv.innerHTML = `<p class="text-red-500 text-center text-sm font-bold">Koneksi bermasalah atau data kosong.</p>`;
            btn.innerText = 'Kembali';
        } finally {
            btn.disabled = false;
        }
    };

    function filterDokter(category) {
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(btn => {
            btn.classList.remove('active', 'bg-maroon-dark', 'text-white');
            btn.classList.add('border-gray-200', 'text-gray-500');
            if(btn.innerText.trim() === category || (category === 'all' && btn.innerText.trim() === 'Semua')) {
                btn.classList.add('active');
            }
        });
        const cards = document.querySelectorAll('.doctor-card');
        cards.forEach(card => {
            if (category === 'all' || card.getAttribute('data-specialty') === category) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endsection
