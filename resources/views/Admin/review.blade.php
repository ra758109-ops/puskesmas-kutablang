@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-8 max-w-7xl mx-auto custom-review-font relative select-none">
    
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute w-[400px] h-[400px] bg-maroon-dark/5 rounded-full filter blur-[80px] top-10 -left-20 animate-pulse"></div>
        <div class="absolute w-[450px] h-[450px] bg-rose-900/5 rounded-full filter blur-[90px] bottom-10 -right-20" style="animation: pulse 5s infinite"></div>
    </div>

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10 z-10 relative animate__animated animate__fadeInDown">
        <div>
            <span class="inline-flex items-center gap-1.5 bg-rose-50 text-maroon-dark text-[10px] font-black tracking-widest uppercase px-3 py-1 rounded-full border border-maroon-dark/10 mb-2">
                <i class="fa-solid fa-star"></i> Feedback & Kepuasan Masyarakat
            </span>
            <h2 class="text-3xl font-black text-gray-950 tracking-tight">Daftar <span class="bg-gradient-to-r from-maroon-dark to-rose-700 bg-clip-text text-transparent">Ulasan Layanan</span></h2>
            <p class="text-gray-400 text-xs mt-1">Pantau kritik, saran, dan penilaian bintang yang diberikan oleh pasien Puskesmas Kuta Blang.</p>
        </div>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl text-sm font-bold flex items-center gap-2 animate__animated animate__fadeIn">
        <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white/[0.98] backdrop-blur-md rounded-[2.5rem] shadow-[0_20px_50px_rgba(74,14,14,0.02)] border border-gray-100/80 overflow-hidden z-10 relative animate__animated animate__fadeInUp">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50/50">
                        <th class="px-6 py-5 text-[11px] font-black text-gray-500 uppercase tracking-widest">Identitas Pengirim</th>
                        <th class="px-6 py-5 text-[11px] font-black text-gray-500 uppercase tracking-widest">Penilaian (Rating)</th>
                        <th class="px-6 py-5 text-[11px] font-black text-gray-500 uppercase tracking-widest">Isi Komentar / Saran</th>
                        <th class="px-6 py-5 text-[11px] font-black text-gray-500 uppercase tracking-widest text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 font-medium text-sm text-gray-700">
                    @forelse($reviews as $review)
                    <tr class="hover:bg-gray-50/60 transition-colors duration-200">
                        <td class="px-6 py-5">
                            <div>
                                <h4 class="font-bold text-gray-950 text-sm leading-tight mb-1">
                                    {{ $review->pasien ? $review->pasien->nama : 'Masyarakat Umum' }}
                                </h4>
                                <span class="text-[10px] text-gray-400 font-semibold block">
                                    <i class="fa-solid fa-id-card mr-0.5"></i> NIK: {{ $review->nik }}
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex items-center gap-0.5 text-amber-400">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="fa-solid fa-star text-sm"></i>
                                    @else
                                        <i class="fa-regular fa-star text-sm text-gray-200"></i>
                                    @endif
                                @endfor
                                <span class="text-xs font-black text-gray-800 ml-1.5">({{ $review->rating }}/5)</span>
                            </div>
                            <span class="text-[9px] text-gray-400 font-semibold block mt-1">
                                <i class="fa-regular fa-clock mr-0.5"></i> {{ $review->created_at->format('d M Y - H:i') }}
                            </span>
                        </td>
                        <td class="px-6 py-5 max-w-md">
                            <p class="text-gray-600 font-medium text-xs leading-relaxed italic">
                                "{!! !empty($review->komentar) ? nl2br(e($review->komentar)) : '<span class="text-gray-300">Tidak meninggalkan komentar tertulis.</span>' !!}"
                            </p>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center">
                                <form action="{{ route('admin.review.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2.5 bg-gray-50 hover:bg-rose-600 hover:text-white rounded-xl text-gray-400 transition-all duration-300 transform active:scale-90" title="Hapus Ulasan">
                                        <i class="fa-solid fa-trash-can text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-400 font-semibold italic">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="fa-solid fa-star-half-stroke text-3xl text-gray-300 animate-pulse"></i>
                                <p>Belum ada ulasan atau penilaian yang masuk dari masyarakat.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .custom-review-font { font-family: 'Plus Jakarta Sans', sans-serif; }
</style>
@endsection