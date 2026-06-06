<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Puskesmas Teluk Lingga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        maroon: { dark: '#4a0e0e', light: '#800000' },
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .sidebar-link-active {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid white;
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <div class="flex min-h-screen">
        <!-- SIDEBAR -->
        <aside class="w-64 bg-maroon-dark text-white fixed h-full z-50 transition-all duration-300 rounded-r-[30px] shadow-2xl hidden lg:block">
            <div class="p-6">
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center border-2 border-maroon-light shadow-lg">
                        <img src="{{ asset('images/logo.png') }}" class="w-8 h-8 object-contain">
                    </div>
                    <div>
                        <h1 class="font-bold text-sm leading-tight uppercase tracking-widest">Admin</h1>
                        <p class="text-[10px] text-white/60">Puskesmas T. Lingga</p>
                    </div>
                </div>

                <nav class="space-y-2">
                    <p class="text-[10px] uppercase font-bold text-white/40 ml-3 mb-2 tracking-[0.2em]">Menu Utama</p>
                    <a href="/admin/dashboard" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition-all text-sm {{ Request::is('admin/dashboard') ? 'sidebar-link-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" stroke-width="2" /></svg>
                        Dashboard
                    </a>
                    <a href="/admin/berita" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition-all text-sm {{ Request::is('admin/berita*') ? 'sidebar-link-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" stroke-width="2" /></svg>
                        Manajemen Berita
                    </a>
                    <a href="/admin/layanan" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition-all text-sm {{ Request::is('admin/layanan*') ? 'sidebar-link-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke-width="2" /></svg>
                        Layanan & Jadwal
                    </a>
                   {{-- 🛠️ MENU PROGRAM & KEGIATAN (SUDAH DISAMAKAN) --}}
<a href="{{ route('admin.program.index') }}"
   class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition-all text-sm {{ Request::is('admin/program*') ? 'sidebar-link-active' : '' }}">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
    </svg>
    Program & Kegiatan
</a>

                    <p class="text-[10px] uppercase font-bold text-white/40 ml-3 mb-2 mt-6 tracking-[0.2em]">User & Pendaftaran</p>
                    <a href="{{ route('admin.pasien.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/10 transition-all text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-width="2" /></svg>
                        Data Pasien
                    </a>
                </nav>
            </div>
            <div class="absolute bottom-0 w-full p-6">
                <a href="/logout" class="flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-red-500 transition-all text-sm text-red-200 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-width="2" /></svg>
                    Keluar Sistem
                </a>
            </div>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="lg:ml-64 w-full min-h-screen">
            <!-- TOP NAVBAR ADMIN -->
            <header class="bg-white/80 backdrop-blur-md sticky top-0 z-40 px-8 h-20 flex items-center justify-between border-b border-gray-100">
                <div class="flex items-center lg:hidden gap-3">
                    <button class="p-2 bg-maroon-dark text-white rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16m-7 6h7" stroke-width="2" /></svg>
                    </button>
                </div>
                <div class="hidden md:block">
                    <h2 class="font-bold text-gray-800">@yield('page-title')</h2>
                    <p class="text-[10px] text-gray-400">Selamat datang kembali, Admin!</p>
                </div>

                <div class="flex items-center gap-4">
                    <button class="relative p-2 bg-gray-50 rounded-full text-gray-400 hover:text-maroon-dark">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke-width="2" /></svg>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                    <div class="flex items-center gap-3 pl-4 border-l border-gray-100">
                        <img src="https://ui-avatars.com/api/?name=Admin+Puskesmas&background=4a0e0e&color=fff" class="w-10 h-10 rounded-full">
                    </div>
                </div>
            </header>

            <div class="p-8 animate__animated animate__fadeIn">
                @yield('content')
            </div>
        </main>
    </div>
    @yield('extra-js')
</body>
</html>
