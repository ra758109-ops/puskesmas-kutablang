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

    <div class="bg-gray-50 rounded-[40px] shadow-sm border-0 mb-12 overflow-hidden">
        <div class="p-6 md:p-12">
            <form action="#" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">NIK</label>
                        <input type="text" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" placeholder="Nomor Induk Kependudukan (Opsional)">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" required>
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
                        <textarea class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" rows="3" placeholder="Alamat lengkap saat ini"></textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">Nomor Telepon/WhatsApp <span class="text-red-500">*</span></label>
                        <input type="tel" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" placeholder="0812xxxx" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">Jenis Layanan <span class="text-red-500">*</span></label>
                        <select class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" required>
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
                        <select class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white">
                            <option value="">Pilih Dokter (opsional)</option>
                            <option>Dr. Ahmad Hidayat</option>
                            <option>Dr. Siti Nurhaliza</option>
                            <option>Dr. Budi Santoso</option>
                            <option>Dr. Rini Wijaya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Tanggal Kunjungan <span class="text-red-500">*</span></label>
                        <input type="date" class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Waktu Kunjungan <span class="text-red-500">*</span></label>
                        <select class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" required>
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
                        <textarea class="w-full px-5 py-3 rounded-2xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all bg-white" rows="3" placeholder="Ceritakan keluhan kesehatan Anda"></textarea>
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
@endsection
