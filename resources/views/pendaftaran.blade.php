@extends('layouts.app')

@section('title', 'Pendaftaran Pasien Online')

@section('content')
<div class="container mx-auto px-4 my-12">
    <div class="text-center mb-10">
        <div class="inline-block bg-maroon-dark px-10 py-4 mb-4 rounded-[20px] shadow-lg">
            <h2 class="text-white text-2xl md:text-3xl font-bold mb-0">Pendaftaran Pasien Online</h2>
        </div>
        <p class="text-gray-500">Daftar untuk layanan kesehatan di Puskesmas Kutablang dengan mudah dan cepat.</p>
    </div>

    <div class="bg-red-50 border-l-[8px] border-maroon-dark rounded-2xl p-5 shadow-sm mb-10">
        <p class="text-sm text-gray-800 leading-relaxed">
            <strong class="text-maroon-dark uppercase tracking-wider">Informasi Penting:</strong> Setelah mendaftar online, Anda akan mendapatkan nomor antrian melalui WhatsApp. Harap datang 15 menit sebelum jadwal yang dipilih. Bawa kartu identitas dan kartu BPJS (jika ada).
        </p>
    </div>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 mb-4 rounded-xl">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="bg-gray-50 rounded-[40px] shadow-sm border-0 mb-12 overflow-hidden">
        <div class="p-6 md:p-12">
          <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">NIK <span class="text-red-500">*</span></label>
                        <input type="text" name="nik" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" placeholder="Nomor Induk Kependudukan" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select name="jenis_kelamin" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">Alamat <span class="text-red-500">*</span></label>
                        <textarea name="alamat" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" rows="3" placeholder="Alamat lengkap saat ini"></textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">Nomor Telepon/WhatsApp <span class="text-red-500">*</span></label>
                        <input type="tel" name="nomor_hp" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" placeholder="0812xxxx" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">Jenis Layanan <span class="text-red-500">*</span></label>
                        <select name="jenis_layanan" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" required>
                            <option value="">Pilih Jenis Layanan</option>
                            <option>Rawat Jalan</option>
                            <option>Imunisasi</option>
                            <option>KIA (Kesehatan Ibu & Anak)</option>
                            <option>Konsultasi Gizi</option>
                            <option>Pemeriksaan Laboratorium</option>
                            <option>Keluarga Berencana (KB)</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">Dokter Pilihan</label>
                        <select name="dokter_pilihan" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white">
                            <option value="">Pilih Dokter (opsional)</option>
                            <option>Dr. Ahmad Hidayat</option>
                            <option>Dr. Siti Nurhaliza</option>
                            <option>Dr. Budi Santoso</option>
                            <option>Dr. Rini Wijaya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Tanggal Kunjungan <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_kunjungan" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Waktu Kunjungan <span class="text-red-500">*</span></label>
                        <select name="waktu_kunjungan" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" required>
                            <option value="">Pilih Waktu</option>
                            <option>08:00 - 09:00</option>
                            <option>09:00 - 10:00</option>
                            <option>10:00 - 11:00</option>
                            <option>11:00 - 12:00</option>
                            <option>13:00 - 14:00</option>
                            <option>14:00 - 15:00</option>
                            <option>15:00 - 16:00</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">Keluhan</label>
                        <textarea name="keluhan" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" rows="3" placeholder="Ceritakan keluhan kesehatan Anda"></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Nomor BPJS</label>
                        <input type="text" name="nomor_bpjs" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" placeholder="Nomor Peserta BPJS (Opsional)">
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <label class="block text-gray-700 font-bold mb-2">Unggah Dokumen (Kartu Keluarga / Surat Rujukan)</label>
                        <input type="file" name="dokumen" class="w-full px-5 py-3 rounded-2xl border border-dashed border-gray-300 bg-white outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-maroon-dark hover:file:bg-pink-100 cursor-pointer">
                        <small class="text-gray-400 block mt-1">Format: PDF, JPG, PNG. Maks 2MB. (Diperlukan untuk validasi pasien baru/rujukan)</small>
                    </div>

                    <div class="md:col-span-2 mt-8 flex flex-col md:flex-row gap-4">
                        <button type="submit" class="bg-maroon-dark text-white px-10 py-4 rounded-xl font-bold shadow-lg hover:-translate-y-1 hover:scale-105 transition-all duration-300 active:scale-95">
                            Kirim Pendaftaran
                        </button>
                        <button type="reset" class="border border-gray-300 text-gray-600 px-10 py-4 rounded-xl font-bold hover:bg-gray-100 hover:scale-105 transition-all duration-300 active:scale-95">
                            Reset Form
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-gray-100 p-8 md:p-12 rounded-[40px] shadow-sm mb-16">
        <h3 class="text-2xl font-bold mb-6 text-gray-800">Alternatif Pendaftaran</h3>
        <p class="mb-6 text-gray-600">Anda juga dapat mendaftar melalui:</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-2xl">
            <div class="bg-white p-4 rounded-2xl flex items-center shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 group cursor-pointer">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" class="w-6 h-6 mr-4 group-hover:scale-110 transition-transform duration-300" alt="WA">
                <span class="font-bold text-gray-700">WhatsApp: <span class="text-green-600">0812-3456-7890</span></span>
            </div>
            <div class="bg-white p-4 rounded-2xl flex items-center shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 group cursor-pointer">
                <img src="https://cdn-icons-png.flaticon.com/512/597/597177.png" class="w-6 h-6 mr-4 group-hover:scale-110 transition-transform duration-300" alt="Phone">
                <span class="font-bold text-gray-700">Telepon: <span class="text-maroon-dark">(0771) 123-456</span></span>
            </div>
        </div>
        <p class="mt-4 text-sm text-gray-400 italic">Atau datang langsung ke loket pendaftaran kami.</p>
    </div>

    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-maroon-dark">Alur Pendaftaran</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-transparent hover:border-pink-soft hover:-translate-y-2 transition-all duration-300 group">
            <div class="text-5xl font-extrabold text-maroon-dark/10 group-hover:text-maroon-dark transition-colors leading-none mb-4">1.</div>
            <h5 class="font-bold text-lg mb-2 text-gray-800">Isi Form</h5>
            <p class="text-sm text-gray-500">Lengkapi form pendaftaran online dengan data valid.</p>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-transparent hover:border-pink-soft hover:-translate-y-2 transition-all duration-300 group">
            <div class="text-5xl font-extrabold text-maroon-dark/10 group-hover:text-maroon-dark transition-colors leading-none mb-4">2.</div>
            <h5 class="font-bold text-lg mb-2 text-gray-800">Konfirmasi</h5>
            <p class="text-sm text-gray-500">Terima konfirmasi WA & nomor antrian.</p>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-transparent hover:border-pink-soft hover:-translate-y-2 transition-all duration-300 group">
            <div class="text-5xl font-extrabold text-maroon-dark/10 group-hover:text-maroon-dark transition-colors leading-none mb-4">3.</div>
            <h5 class="font-bold text-lg mb-2 text-gray-800">Datang</h5>
            <p class="text-sm text-gray-500">Datang sesuai jadwal 15 menit sebelumnya.</p>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-transparent hover:border-pink-soft hover:-translate-y-2 transition-all duration-300 group">
            <div class="text-5xl font-extrabold text-maroon-dark/10 group-hover:text-maroon-dark transition-colors leading-none mb-4">4.</div>
            <h5 class="font-bold text-lg mb-2 text-gray-800">Layanan</h5>
            <p class="text-sm text-gray-500">Dapatkan pelayanan dari tenaga medis kami.</p>
        </div>
    </div>
</div>

<!-- Toast Notifikasi Estetik -->
@if(session('sukses'))
<div id="toast-success" class="fixed bottom-10 right-10 flex flex-col w-full max-w-[320px] p-5 text-gray-800 bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.2)] border-t-4 border-red-900 z-50 animate-bounce">

    <div class="flex items-center mb-4">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 text-red-700 bg-red-50 rounded-xl">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="ml-3">
            <div class="text-sm font-bold text-red-900 leading-tight">Pendaftaran Berhasil!</div>
            <div class="text-[10px] text-gray-400 uppercase tracking-wider font-semibold">Status: Terkonfirmasi</div>
        </div>
        <button type="button" onclick="this.parentElement.parentElement.remove()" class="ml-auto text-gray-300 hover:text-gray-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>

    <div class="bg-gray-50 rounded-2xl p-3 mb-4 border border-gray-100">
        <div class="text-[10px] text-gray-400 text-center font-bold">NOMOR ANTRIAN ANDA</div>
        <div class="text-3xl font-black text-red-700 text-center tracking-tighter">{{ session('antrian') }}</div>
    </div>

    <!-- Tombol WA -->
    <a href="https://wa.me/6281264066128?text=Halo%20Puskesmas,%20saya%20sudah%20daftar%20online.%20Nomor%20Antrian:%20{{ session('antrian') }}"
       target="_blank"
       class="flex items-center justify-center gap-2 w-full py-3 px-4 bg-red-900 text-white text-xs font-bold rounded-xl hover:bg-red-800 transition-all shadow-lg shadow-red-900/20 active:scale-95">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.483 8.413-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.308 1.654zm6.749-3.936c1.55.917 3.39 1.403 5.26 1.403 5.514 0 10.002-4.488 10.002-10.002 0-2.673-1.041-5.185-2.93-7.076-1.889-1.891-4.402-2.932-7.075-2.932-5.515 0-10.01 4.496-10.01 10.01 0 2.042.624 4.029 1.805 5.713l-1.011 3.691 3.784-.993z"/></svg>
       Mohon konfirmasi WA agar admin dapat memvalidasi antrian Anda lebih cepat.
    </a>
</div>

    <!-- Tombol Close -->
    <button type="button" onclick="this.parentElement.remove()" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-red-900 rounded-lg p-1.5 inline-flex h-8 w-8">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
</div>
@endif

<!-- Script untuk Loading Button -->
<script>
    const form = document.querySelector('form');
    const btn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function() {
        btn.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Mengirim...
        `;
        btn.classList.add('opacity-70', 'cursor-not-allowed');
    });
</script>
@endsection
