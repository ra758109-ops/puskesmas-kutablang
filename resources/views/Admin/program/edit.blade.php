@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="p-6 md:p-8 max-w-4xl mx-auto custom-program-font relative">
    <div class="mb-8 animate__animated animate__fadeInLeft">
        <a href="{{ route('admin.program.index') }}" class="inline-flex items-center gap-3 text-maroon-dark font-extrabold text-xs tracking-wider uppercase group bg-white px-5 py-3 rounded-full shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300">
            <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i> Kembali
        </a>
    </div>

    <div class="bg-white rounded-[2.8rem] p-8 md:p-11 shadow-sm border border-gray-100 relative overflow-hidden z-10 animate__animated animate__fadeInUp">
        <div class="absolute top-0 inset-x-0 h-[6px] bg-gradient-to-r from-amber-500 via-maroon-dark to-rose-600"></div>

        <div class="mb-10 border-b border-gray-100 pb-6">
            <h2 class="text-3xl font-black text-gray-950 tracking-tight">Edit <span class="bg-gradient-to-r from-maroon-dark to-rose-700 bg-clip-text text-transparent">Program Kesehatan</span></h2>
        </div>

        <form action="{{ route('admin.program.update', $program->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5 group">
                        <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1">Nama Program</label>
                        <input type="text" name="nama_program" value="{{ $program->nama_program }}" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl outline-none text-sm font-semibold text-gray-800">
                    </div>
                    <div class="space-y-1.5 group">
                        <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1">Label Waktu</label>
                        <input type="text" name="label_waktu" value="{{ $program->label_waktu }}" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl outline-none text-sm font-semibold text-gray-800">
                    </div>
                </div>

                <div class="space-y-1.5 group">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required class="w-full p-5 bg-gray-50 border border-gray-200 rounded-2xl outline-none text-sm font-semibold text-gray-800 resize-none">{{ $program->deskripsi }}</textarea>
                </div>

                <div class="space-y-3 bg-gray-50/40 border border-gray-200/40 p-6 rounded-3xl">
                    <div class="flex items-center justify-between">
                        <label class="text-[12px] font-black text-gray-800 uppercase tracking-wider block">Aktivitas Utama Program</label>
                        <button type="button" id="addActivityBtn" class="bg-maroon-dark text-white text-xs font-bold px-4 py-2 rounded-xl shadow-md hover:bg-maroon-light transition-all"><i class="fa-solid fa-plus"></i> Tambah List</button>
                    </div>

                    <div id="activitiesContainer" class="space-y-3 pt-2">
                        @foreach($program->activities as $activity)
                        <div class="flex items-center gap-3">
                            <div class="relative flex-1">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-maroon-dark/40 text-xs"><i class="fa-solid fa-circle-dot"></i></span>
                                <input type="text" name="aktivitas[]" value="{{ $activity->nama_aktivitas }}" required class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl text-xs font-semibold text-gray-700">
                            </div>
                            <button type="button" class="delete-row-btn text-gray-400 hover:text-rose-600 p-2 transition-colors"><i class="fa-regular fa-trash-can text-sm"></i></button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-gradient-to-r from-maroon-dark via-maroon-light to-rose-900 text-white py-4 rounded-2xl font-extrabold text-sm tracking-wider shadow-lg hover:scale-[1.01] active:scale-[0.99] transition-all">
                        PERBARUI DATA PROGRAM
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('activitiesContainer');
        const addBtn = document.getElementById('addActivityBtn');

        // Daftarkan fungsi hapus untuk data yang sudah ada
        container.addEventListener('click', function(e) {
            if(e.target.closest('.delete-row-btn')) {
                e.target.closest('.flex').remove();
            }
        });

        addBtn.addEventListener('click', function() {
            const div = document.createElement('div');
            div.className = 'flex items-center gap-3 animate__animated animate__slideInDown';
            div.style.animationDuration = '0.2s';
            div.innerHTML = `
                <div class="relative flex-1">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-maroon-dark/40 text-xs"><i class="fa-solid fa-circle-dot"></i></span>
                    <input type="text" name="aktivitas[]" required class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl text-xs font-semibold text-gray-700" placeholder="Masukkan aktivitas program lainnya...">
                </div>
                <button type="button" class="delete-row-btn text-gray-400 hover:text-rose-600 p-2 transition-colors"><i class="fa-regular fa-trash-can text-sm"></i></button>
            `;
            container.appendChild(div);
        });
    });
</script>
@endsection