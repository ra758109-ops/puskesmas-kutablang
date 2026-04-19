<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Puskesmas Teluk Lingga</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
                        blue: {
                            border: '#57a8ff',
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
            border-bottom: 2px solid #4D0013;
            
         }
        .nav-active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 2px;
        background-color: #4a0e0e;
        }
    </style>
    @yield('extra-css')
</head>
<body class="bg-white pt-[75px] overflow-x-hidden">

    <nav class="fixed top-0 w-full h-[75px] bg-white shadow-sm flex items-center z-[1000]">
            <div class="bg-maroon-dark text-white px-6 md:px-10 h-full flex items-center rounded-br-[50px] shrink-0">
            <div class="flex items-center">
                <div class="w-[45px] h-[45px] bg-white rounded-full overflow-hidden mr-3 flex items-center justify-center border-2 border-white">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-cover scale-110">
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="font-bold text-lg tracking-wider uppercase leading-none">Puskesmas</span>
                    <small class="text-[10px] opacity-80">Teluk Lingga</small>
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
                    <li><a href="/kontak" class="px-3 py-2 text-maroon-dark text-[0.85rem] font-medium hover:opacity-70 transition-all {{ Request::is('kontak*') ? 'nav-active' : '' }}">Kontak</a></li>
                </ul>

                <div class="flex items-center gap-3 mt-4 lg:mt-0 lg:ml-4">
                    <div class="bg-gray-100 rounded-full px-4 py-1.5 flex items-center w-40 focus-within:w-48 transition-all duration-300">
                        <img src="https://cdn-icons-png.flaticon.com/512/149/149852.png" class="w-3 opacity-50" alt="search">
                        <input type="text" placeholder="Cari..." class="bg-transparent border-none outline-none text-xs ml-2 w-full">
                    </div>
                    <a href="#" class="shrink-0">
                        <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" class="w-8" alt="profile">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <script>
        const btn = document.getElementById('nav-toggle');
        const menu = document.getElementById('nav-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            menu.classList.toggle('flex');
        });
    </script>
</body>
</html>
