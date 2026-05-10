<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Puskesmas Kutablang</title>

    {{-- Fonts & Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- AOS Animation CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        maroon: {
                            dark: '#4a0e0e',
                        },
                        pink: {
                            soft: '#f8c8dc',
                        },
                        teal: {
                            500: '#14b8a6',
                            600: '#0d9488',
                        }
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .nav-active {
            font-weight: 700;
            position: relative;
        }
        .nav-active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #4a0e0e;
        }
    </style>
    @yield('extra-css')
</head>
<body class="bg-white pt-[75px] overflow-x-hidden flex flex-col min-h-screen">

    {{-- Navbar --}}
    <nav class="fixed top-0 w-full h-[75px] bg-white shadow-sm flex items-center z-[1000]">
        <div class="bg-maroon-dark text-white px-6 md:px-10 h-full flex items-center rounded-br-[50px] shrink-0">
            <div class="flex items-center">
                <div class="w-[45px] h-[45px] bg-white rounded-full overflow-hidden mr-3 flex items-center justify-center border-2 border-white">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-cover scale-110">
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="font-bold text-lg tracking-wider uppercase leading-none">Puskesmas</span>
                    <small class="text-[10px] opacity-80 uppercase tracking-widest">Kutablang</small>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 flex justify-end lg:justify-between items-center w-full">
            <button id="nav-toggle" class="lg:hidden p-2 text-maroon-dark">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <div id="nav-menu" class="hidden lg:flex flex-col lg:flex-row absolute lg:relative top-[75px] lg:top-0 left-0 w-full lg:w-auto bg-white lg:bg-transparent shadow-md lg:shadow-none p-5 lg:p-0 items-center gap-4 lg:gap-2 ml-auto">
                <ul class="flex flex-col lg:flex-row items-center list-none gap-1">
                    <li><a href="/" class="px-3 py-2 text-maroon-dark text-[0.85rem] font-medium hover:opacity-70 transition-all {{ Request::is('/') ? 'nav-active' : '' }}">Beranda</a></li>
                    <li><a href="/profil" class="px-3 py-2 text-maroon-dark text-[0.85rem] font-medium hover:opacity-70 transition-all {{ Request::is('profil*') ? 'nav-active' : '' }}">Profil</a></li>
                    <li><a href="/layanan" class="px-3 py-2 text-maroon-dark text-[0.85rem] font-medium hover:opacity-70 transition-all {{ Request::is('layanan*') ? 'nav-active' : '' }}">Layanan</a></li>
                    <li><a href="/jadwal" class="px-3 py-2 text-maroon-dark text-[0.85rem] font-medium hover:opacity-70 transition-all {{ Request::is('jadwal*') ? 'nav-active' : '' }}">Jadwal</a></li>
                    <li><a href="/pendaftaran" class="px-3 py-2 text-maroon-dark text-[0.85rem] font-medium hover:opacity-70 transition-all {{ Request::is('pendaftaran*') ? 'nav-active' : '' }}">Pendaftaran</a></li>
                    <li><a href="/program" class="px-3 py-2 text-maroon-dark text-[0.85rem] font-medium hover:opacity-70 transition-all {{ Request::is('program*') ? 'nav-active' : '' }}">Program</a></li>
                    <li><a href="/berita" class="px-3 py-2 text-maroon-dark text-[0.85rem] font-medium hover:opacity-70 transition-all {{ Request::is('berita*') ? 'nav-active' : '' }}">Berita</a></li>
                </ul>

                <div class="flex items-center gap-3 mt-4 lg:mt-0 lg:ml-4">
                    <div class="bg-gray-100 rounded-full px-4 py-1.5 flex items-center w-40 focus-within:w-48 transition-all duration-300">
                        <i class="fas fa-search text-gray-400 text-xs"></i>
                        <input type="text" placeholder="Cari..." class="bg-transparent border-none outline-none text-xs ml-2 w-full">
                    </div>
                    <a href="/login" class="shrink-0 hover:opacity-80 transition-all">
                        <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" class="w-8" alt="profile">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-[50px] h-[50px] bg-white rounded-full overflow-hidden flex items-center justify-center border-2 border-white shadow-lg shrink-0">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-cover scale-110">
                        </div>
                        <div class="flex flex-col leading-tight">
                            <h2 class="text-xl font-bold tracking-tight uppercase leading-none text-white">Puskesmas</h2>
                            <p class="text-teal-400 text-[10px] font-bold uppercase tracking-widest mt-1">Kutablang</p>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Pusat kesehatan masyarakat yang berkomitmen memberikan pelayanan kesehatan primer berkualitas, ramah, dan terjangkau untuk seluruh masyarakat Kutablang.
                    </p>
                    <div class="flex gap-4 pt-2">
                        <a href="#" class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-teal-500 hover:text-white transition-all"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-teal-500 hover:text-white transition-all"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-teal-500 hover:text-white transition-all"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                        <span class="w-1 h-5 bg-teal-500 rounded-full"></span> Layanan Utama
                    </h3>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li><a href="#" class="hover:text-teal-400 transition-all flex items-center gap-2"><i class="fas fa-chevron-right text-[8px]"></i> Rawat Jalan</a></li>
                        <li><a href="#" class="hover:text-teal-400 transition-all flex items-center gap-2"><i class="fas fa-chevron-right text-[8px]"></i> KIA & Imunisasi</a></li>
                        <li><a href="#" class="hover:text-teal-400 transition-all flex items-center gap-2"><i class="fas fa-chevron-right text-[8px]"></i> Klinik Gizi</a></li>
                        <li><a href="#" class="hover:text-teal-400 transition-all flex items-center gap-2"><i class="fas fa-chevron-right text-[8px]"></i> Laboratorium</a></li>
                        <li><a href="#" class="hover:text-teal-400 transition-all flex items-center gap-2"><i class="fas fa-chevron-right text-[8px]"></i> Farmasi / Apotek</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                        <span class="w-1 h-5 bg-teal-500 rounded-full"></span> Jam Operasional
                    </h3>
                    <div class="bg-slate-800/50 p-5 rounded-2xl border border-slate-700">
                        <div class="space-y-4">
                            <div class="flex justify-between items-center border-b border-slate-700 pb-2">
                                <span class="text-sm text-slate-400">Senin - Jumat</span>
                                <span class="text-sm font-bold text-teal-400">08:00 - 16:00</span>
                            </div>
                            <div class="flex justify-between items-center border-b border-slate-700 pb-2">
                                <span class="text-sm text-slate-400">Sabtu</span>
                                <span class="text-sm font-bold text-teal-400">08:00 - 12:00</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-400">Minggu & Libur</span>
                                <span class="text-xs font-bold text-red-400 bg-red-900/30 px-2 py-1 rounded">Tutup</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                        <span class="w-1 h-5 bg-teal-500 rounded-full"></span> Hubungi Kami
                    </h3>
                    <ul class="space-y-5 text-sm">
                        <li class="flex items-start gap-4">
                            <div class="text-teal-500"><i class="fas fa-map-marker-alt text-lg"></i></div>
                            <span class="text-slate-400 leading-relaxed text-xs">
                                6R57+XW2, Meuse, Kec. Kuta Blang, Kabupaten Bireuen, Aceh 24356
                            </span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div class="text-teal-500"><i class="fas fa-phone-alt"></i></div>
                            <span class="text-slate-400 text-xs">(0771) 123-456</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div class="text-green-500"><i class="fab fa-whatsapp text-lg"></i></div>
                            <span class="text-slate-400 text-xs">0812-3456-7890</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-800 text-center">
                <p class="text-[10px] text-slate-500 uppercase tracking-widest font-bold">
                    &copy; 2026 Puskesmas Kutablang. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Navigasi Mobile Toggle
        const btn = document.getElementById('nav-toggle');
        const menu = document.getElementById('nav-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            menu.classList.toggle('flex');
        });

        // Initialize AOS Animation
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>
</body>
</html>
