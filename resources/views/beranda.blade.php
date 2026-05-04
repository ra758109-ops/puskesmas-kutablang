@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
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
            <a href="#" class="bg-maroon-dark text-white px-8 py-3 rounded-full font-semibold hover:bg-opacity-90 hover:scale-105 hover:-translate-y-1 transition-all duration-300 flex items-center shadow-md active:scale-95">
                Layanan Kami
            </a>

            <a href="{{ route('pendaftaran.store') }}" class="bg-pink-soft text-maroon-dark px-8 py-3 rounded-full font-semibold hover:opacity-80 hover:scale-105 hover:-translate-y-1 transition-all duration-300 shadow-md active:scale-95">
                Buat Janji Temu
            </a>

            <!-- TOMBOL CEK ANTRIAN -->
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

<!-- STRUKTUR MODAL CEK ANTRIAN -->
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
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 ml-1">Nomor Induk Kependudukan (NIK)</label>
                <input type="text" id="inputNik" name="nik" placeholder="16 Digit NIK Anda"
                       class="w-full px-5 py-4 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all" required>
            </div>

            <!-- Tempat Menampilkan Hasil (Awalnya tersembunyi) -->
            <div id="hasilCek" class="hidden mb-5 p-4 bg-red-50 rounded-2xl border-2 border-dashed border-maroon-dark/20 transition-all">
            </div>

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
</style>

<!-- SCRIPT UNTUK MODAL -->
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
        if (event.target == modal) {
            closeModalCek();
        }
    }

    // LOGIKA PENCARIAN DATA
    document.getElementById('formCekAntrian').onsubmit = async (e) => {
        e.preventDefault();
        const nik = document.getElementById('inputNik').value;
        const hasilDiv = document.getElementById('hasilCek');
        const btn = document.getElementById('btnCari');

        btn.innerText = 'Mencari...';
        btn.disabled = true;

        try {
            const response = await fetch(`/cek-antrian?nik=${nik}`);
            const data = await response.json();

            hasilDiv.classList.remove('hidden');

            if (data.success) {
                hasilDiv.innerHTML = `
                    <div class="text-center">
                        <p class="text-[10px] text-gray-500 uppercase font-bold tracking-widest">Nomor Antrian</p>
                        <div class="text-5xl font-black text-maroon-dark my-1">${data.nomor_antrian}</div>
                        <div class="h-[1px] bg-maroon-dark/10 my-3 w-full"></div>
                        <p class="text-sm font-bold text-gray-800">${data.nama}</p>
                        <p class="text-[11px] text-gray-500">${data.layanan}</p>
                    </div>
                `;
            } else {
                hasilDiv.innerHTML = `<p class="text-red-500 text-center font-bold text-sm">${data.message}</p>`;
            }
        } catch (error) {
            hasilDiv.classList.remove('hidden');
            hasilDiv.innerHTML = `<p class="text-red-500 text-center text-sm font-bold">Koneksi bermasalah.</p>`;
        } finally {
            btn.innerText = 'Cari Data Antrian';
            btn.disabled = false;
        }
    };
</script>
@endsection
