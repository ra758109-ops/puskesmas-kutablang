@extends('layouts.app')

@section('content')
<main class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-4xl mx-auto px-6">
        <a href="/berita" class="inline-flex items-center text-[#4A0E0E] font-bold mb-8 hover:underline group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Berita
        </a>

        @php
            // Ambil slug dari URL
            $slug = request()->segment(2);

            $dataBerita = [
                'kampanye-imunisasi' => [
                    'title' => 'Kampanye Imunisasi Campak dan Rubella',
                    'date' => '15 September 2025',
                    'content' => 'Puskesmas Kutablang mengadakan kegiatan kampanye imunisasi campak dan rubella gratis untuk anak usia 9 bulan hingga 15 tahun. Kegiatan ini dilaksanakan sebagai upaya pencegahan penyakit campak dan rubella yang masih menjadi masalah kesehatan di Indonesia. <br><br> Imunisasi akan dilaksanakan setiap hari Selasa dan Kamis, pukul 08:00 - 12:00 di Puskesmas Kutablang. Orang tua diharapkan membawa Kartu Menuju Sehat (KMS) atau buku kesehatan anak saat melakukan imunisasi.'
                ],
                'jadwal-posyandu-bulan-oktober' => [
                    'title' => 'Jadwal Posyandu Bulan Oktober',
                    'date' => '5 September 2025',
                    'content' => 'Simak jadwal lengkap kegiatan posyandu di seluruh unit kerja wilayah Kutablang untuk bulan Oktober 2025. Kegiatan ini bertujuan untuk memantau tumbuh kembang si buah hati dan pemberian vitamin tambahan secara rutin. <br><br> Jadwal akan dilaksanakan setiap hari Selasa dan Kamis, pukul 08:00 - 12:00 di Puskesmas Kutablang. Orang tua diharapkan membawa Kartu Menuju Sehat (KMS) atau buku kesehatan anak saat melakukan imunisasi.'
                ],
                'pemeriksaan-kesehatan-gratis' => [
                    'title' => 'Pemeriksaan Kesehatan Gratis',
                    'date' => '10 September 2025',
                    'content' => 'Puskesmas Kutablang mengadakan kegiatan pemeriksaan kesehatan gratis bagi masyarakat umum dalam rangka meningkatkan kesadaran akan pentingnya menjaga kesehatan dan melakukan deteksi dini terhadap berbagai penyakit. <br><br> Pemeriksaan yang tersedia meliputi cek gula darah, kolesterol, dan tekanan darah. Kegiatan ini bertujuan membantu masyarakat mengetahui kondisi kesehatannya sejak awal sehingga dapat melakukan pencegahan dan penanganan lebih cepat.'
                ],
                'Senam-Prolanis-Rutin-Setiap-Jumat' => [
                    'title' => 'Senam Prolanis Rutin Setiap Jumat',
                    'date' => '1 September 2025',
                    'content' => 'Puskesmas Kutablang mengadakan kegiatan Senam Prolanis rutin setiap hari Jumat pukul 07:00 WIB di halaman puskesmas. <br><br> Kegiatan ini ditujukan bagi lansia dan penderita penyakit kronis seperti diabetes dan hipertensi untuk membantu menjaga kebugaran tubuh dan kesehatan secara rutin. Masyarakat diharapkan hadir tepat waktu dengan pakaian olahraga yang nyaman.'
                ],
                'penyuluhan-kesehatan-di-SD-Negeri-01' => [
                    'title' => 'Penyuluhan Kesehatan di SD Negeri 01',
                    'date' => '28 Agustus 2025',
                    'content' => 'Tim Puskesmas Kutablang mengadakan penyuluhan kesehatan di SD Negeri 01 Kutablang mengenai Perilaku Hidup Bersih dan Sehat (PHBS) serta pentingnya menjaga kesehatan gigi. <br><br> Kegiatan ini bertujuan untuk meningkatkan pengetahuan dan kesadaran siswa tentang pola hidup sehat sejak usia dini melalui edukasi dan praktik sederhana sehari-hari.'
                ],
                'layanan-BPJS-kini-lebih-mudah' => [
                    'title' => 'Layanan BPJS Kini Lebih Mudah',
                    'date' => '20 Agustus 2025',
                    'content' => 'Puskesmas Kutablang kini menerapkan sistem pendaftaran online bagi pasien BPJS untuk mempermudah proses pelayanan kesehatan. <br><br> Dengan adanya layanan ini, pasien dapat melakukan pendaftaran lebih cepat dan efisien tanpa harus menunggu lama di lokasi puskesmas. Sistem ini diharapkan dapat meningkatkan kenyamanan dan kualitas pelayanan bagi masyarakat.'
                ]
            ];

            // Ambil data berdasarkan slug, kalau tidak ada balik ke default
            $current = $dataBerita[$slug] ?? $dataBerita['kampanye-imunisasi'];
        @endphp

        <article class="bg-white p-10 md:p-16 rounded-[3rem] shadow-sm border border-gray-100">
            <h1 class="text-3xl md:text-4xl font-extrabold text-[#4A0E0E] mb-4 leading-tight">
                {{ $current['title'] }}
            </h1>

            <p class="text-gray-400 font-bold text-sm uppercase tracking-widest mb-8 pb-8 border-b border-gray-100">
                {{ $current['date'] }}
            </p>

            <div class="prose prose-red max-w-none text-gray-600 leading-relaxed space-y-6 text-lg">
                <p>{!! $current['content'] !!}</p>

                <div class="bg-red-50 p-6 rounded-2xl border-l-4 border-[#4A0E0E] mt-10">
                    <p class="font-bold text-[#4A0E0E] mb-1">Informasi lebih lanjut:</p>
                    <p class="text-sm">Hubungi (0711) 123-456 atau WhatsApp 0812-3456-7890.</p>
                </div>
            </div>
        </article>
    </div>
</main>
@endsection
