@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
{{-- HERO SECTION (ASLI) --}}
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

            <a href="{{ route('pendaftaran.store') }}" class="bg-pink-soft text-maroon-dark px-8 py-3 rounded-full font-semibold hover:opacity-80 hover:scale-105 hover:-translate-y-1 transition-all duration-300 shadow-md active:scale-95">
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
<section id="layanan-section" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div data-aos="fade-right">
                <span class="text-teal-600 font-bold tracking-widest uppercase text-xs">Pelayanan Kami</span>
                <h2 class="text-3xl md:text-4xl font-bold text-maroon-dark mt-2">Layanan Kesehatan Unggulan</h2>
            </div>
            <a href="/layanan" class="text-maroon-dark font-bold hover:underline flex items-center gap-2">
                Lihat Semua Layanan <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($polis as $poli)
            <div class="bg-white p-8 rounded-[30px] shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 group" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                <div class="w-14 h-14 bg-pink-soft/30 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-hand-holding-medical text-2xl text-maroon-dark"></i>
                </div>
                <h3 class="text-xl font-bold text-maroon-dark mb-3">{{ $poli->nama_poli }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">
                    {{ Str::limit($poli->deskripsi, 100) }}
                </p>
                <a href="/pendaftaran" class="text-xs font-extrabold uppercase tracking-wider text-teal-600 hover:text-maroon-dark transition-colors">Daftar Sekarang</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SECTION DOKTER (DINAMIS DENGAN FILTER) --}}
<section class="py-20 bg-white">
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

        <div id="doctor-wrapper" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($dokters as $dokter)
            <div class="doctor-card group" data-aos="zoom-in" data-specialty="{{ $dokter->poli->nama_poli }}">
                <div class="relative overflow-hidden rounded-[40px] mb-4 shadow-lg">
                    <img src="{{ asset('storage/' . $dokter->foto) }}" alt="{{ $dokter->nama_dokter }}" class="w-full h-[350px] object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-maroon-dark/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-8">
                        <p class="text-white text-xs leading-relaxed italic">"Melayani dengan sepenuh hati untuk kesehatan masyarakat Kutablang."</p>
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="text-lg font-extrabold text-maroon-dark">{{ $dokter->nama_dokter }}</h4>
                    <p class="text-teal-600 font-medium text-sm">{{ $dokter->poli->nama_poli }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SECTION PROGRAM PUSKESMAS (TAMBAHAN DINAMIS) --}}
<section id="program-section" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-widest uppercase text-xs">Inovasi & Kegiatan</span>
            <h2 class="text-3xl md:text-4xl font-bold text-maroon-dark mt-2">Program Kesehatan Masyarakat</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($programs ?? [] as $program)
            <div class="bg-white rounded-[40px] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 group border border-gray-100">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-5 left-5">
                        <span class="bg-maroon-dark text-white text-[10px] font-bold px-4 py-2 rounded-full uppercase tracking-widest">Update Terbaru</span>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-maroon-dark mb-4 group-hover:text-teal-600 transition-colors">{{ $program->judul }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        {{ Str::limit($program->deskripsi, 120) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-400 font-medium"><i class="far fa-calendar-alt mr-2"></i>{{ $program->created_at->format('d M Y') }}</span>
                        <a href="{{ route('program.index') }}" class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-maroon-dark hover:bg-maroon-dark hover:text-white transition-all">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-10">
                <div class="inline-block p-6 bg-white rounded-3xl shadow-sm border border-dashed border-gray-300">
                    <p class="text-gray-400 italic">Belum ada program atau kegiatan yang dipublikasikan.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- MODAL CEK ANTRIAN (ASLI) --}}
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
    // Modal Functions
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

   // Logic Cek Antrian (KODE ASLI KAMU + ANTI MENTAL)
    document.getElementById('formCekAntrian').onsubmit = async (e) => {
        e.preventDefault(); // Menahan agar tidak refresh halaman

        const nik = document.getElementById('inputNik').value;
        const hasilDiv = document.getElementById('hasilCek');
        const btn = document.getElementById('btnCari');

        // JIKA SEDANG MENAMPILKAN HASIL, TOMBOL UTAMA BERUBAH JADI TOMBOL RESET (ANTI MENTAL)
        if (btn.innerText.includes('Kembali') || !hasilDiv.classList.contains('hidden')) {
            hasilDiv.classList.add('hidden');
            hasilDiv.innerHTML = '';
            document.getElementById('inputNik').value = '';
            btn.innerText = 'Cari Data Antrian';
            return; // Berhenti di sini, gak bakal mental ke server
        }

        btn.innerText = 'Mencari...';
        btn.disabled = true;

        try {
            const response = await fetch(`/cek-antrian?nik=${nik}`);
            const data = await response.json();
            hasilDiv.classList.remove('hidden');

            if (data.success) {
                // Tampilkan info antrian asli kamu
                let innerHtmlData = `
                    <div class="text-center">
                        <p class="text-[10px] text-gray-500 uppercase font-bold tracking-widest">Nomor Antrian</p>
                        <div class="text-5xl font-black text-maroon-dark my-1">${data.nomor_antrian}</div>
                        <div class="h-[1px] bg-maroon-dark/10 my-3 w-full"></div>
                        <p class="text-sm font-bold text-gray-800">${data.nama}</p>
                        <p class="text-[11px] text-gray-500 mb-3">${data.layanan}</p>
                    </div>
                `;

                // Form Review Pelayanan Berbasis AJAX (Jika Selesai)
                if (data.dokumen !== null && data.dokumen !== undefined) {
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
                                    <textarea name="komentar" rows="2" class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 outline-none" placeholder="Masukkan masukan Anda..."></textarea>
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

                // Ubah teks tombol utama biar user tahu kalau ditekan lagi fungsinya untuk kembali
                btn.innerText = 'Kembali / Cek NIK Lain';

                // Eksekusi Submit Review AJAX
                if (data.dokumen !== null && data.dokumen !== undefined) {
                    document.getElementById('formReviewAjax').onsubmit = async (eEvent) => {
                        eEvent.preventDefault(); // Biar kirim ulasan gak mental juga
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
                hasilDiv.innerHTML = `<p class="text-red-500 text-center font-bold text-sm">${data.message}</p>`;
                btn.innerText = 'Kembali';
            }
        } catch (error) {
            hasilDiv.classList.remove('hidden');
            hasilDiv.innerHTML = `<p class="text-red-500 text-center text-sm font-bold">Koneksi bermasalah.</p>`;
            btn.innerText = 'Kembali';
        } finally {
            btn.disabled = false; // Tombol aktif lagi untuk diklik sebagai tombol kembali
        }
    };

    // Logic Filter Dokter
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
