<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <title>Login Otentikasi Admin | Puskesmas Teluk Lingga</title>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'maroon-dark': '#4a0e0e',
                        'maroon-light': '#7a1f1f',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: radial-gradient(circle at center, #2d0505 0%, #0f0101 100%);
            overflow: hidden;
        }
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-25px) scale(1.05); }
        }
        @keyframes float-reverse {
            0%, 100% { transform: translateY(0px) scale(1.05); }
            50% { transform: translateY(25px) scale(1); }
        }
        .animate-float-1 { animation: float-slow 8s ease-in-out infinite; }
        .animate-float-2 { animation: float-reverse 12s ease-in-out infinite; }
        
        /* 🛠️ TRICK UTAMA: Melumat background putih pada gambar logo */
        .blend-multiply {
            mix-blend-mode: multiply;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4 relative select-none">

    {{-- ORNAMEN BACKGROUND (Blob Neon Dinamis) --}}
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute w-[500px] h-[500px] bg-maroon-light/15 rounded-full filter blur-[90px] -top-20 -left-20 animate-float-1"></div>
        <div class="absolute w-[600px] h-[600px] bg-rose-950/20 rounded-full filter blur-[110px] -bottom-30 -right-20 animate-float-2"></div>
    </div>

    {{-- CARD LOGIN (Cyber Punk & Glassmorphism Fusion) --}}
    <div class="animate__animated animate__fadeInUp w-full max-w-md z-10 mx-auto">
        <div class="bg-white/[0.97] backdrop-blur-lg p-9 rounded-[2.8rem] shadow-[0_0_60px_rgba(74,14,14,0.25)] border border-white/40 relative overflow-hidden">
            
            {{-- Garis Aksen Atas --}}
            <div class="absolute top-0 inset-x-0 h-[6px] bg-gradient-to-r from-amber-500 via-maroon-dark to-rose-600"></div>

            {{-- HEADER AREA --}}
            <div class="text-center mb-8 relative">
                <div class="relative inline-flex items-center justify-center mb-4 group">
                    {{-- Aura Efek Glow di Belakang Logo --}}
                    <div class="absolute inset-0 bg-maroon-dark/15 rounded-full blur-2xl group-hover:scale-125 transition-transform duration-700"></div>
                    
                    {{-- Kontainer Logo Tanpa Box Putih Kaku --}}
                    <div class="w-24 h-24 flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 relative">
                        <img src="{{ asset('images/logo.png') }}" 
                             class="w-full h-full object-contain aspect-square blend-multiply" 
                             alt="Logo"
                             onerror="this.src='https://placehold.co/150x150/ffffff/4a0e0e?text=LOGOPUSK'">
                    </div>

                    {{-- Live Tag Indikator --}}
                    <span class="absolute bottom-1 right-1 flex h-3.5 w-3.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-500 border-2 border-white"></span>
                    </span>
                </div>
                
                <h2 class="text-2xl font-black text-gray-900 tracking-tight uppercase">
                    Gerbang Otentikasi <span class="bg-gradient-to-r from-maroon-dark to-rose-700 bg-clip-text text-transparent">Admin</span>
                </h2>
                <p class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mt-1.5">Puskesmas Teluk Lingga</p>
                
                <div class="flex items-center justify-center gap-1.5 mt-4">
                    <span class="w-10 h-[2px] bg-gradient-to-r from-transparent to-maroon-dark/20 rounded-full"></span>
                    <i class="fa-solid fa-heart-pulse text-maroon-dark/40 text-xs animate-pulse"></i>
                    <span class="w-10 h-[2px] bg-gradient-to-l from-transparent to-maroon-dark/20 rounded-full"></span>
                </div>
            </div>

            {{-- FORM COMPONENT --}}
            <form action="/login" method="POST" class="space-y-5">
                @csrf
                
                {{-- Input Email --}}
                <div class="space-y-1.5">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1">Alamat Email</label>
                    <div class="relative flex items-center group">
                        <span class="absolute left-4 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300">
                            <i class="fa-regular fa-envelope text-base"></i>
                        </span>
                        <input type="email" name="email" required autocomplete="email"
                            placeholder="admin@puskesmas.go.id"
                            class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-gray-200/70 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 bg-gray-50/50 focus:bg-white text-sm font-semibold text-gray-800 shadow-inner">
                    </div>
                </div>

                {{-- Input Password --}}
                <div class="space-y-1.5">
                    <label class="text-[11px] font-black text-gray-500 uppercase tracking-widest block ml-1">Kata Sandi</label>
                    <div class="relative flex items-center group">
                        <span class="absolute left-4 text-gray-400 group-focus-within:text-maroon-dark transition-colors duration-300">
                            <i class="fa-regular fa-lock-keyhole text-base"></i>
                        </span>
                        <input type="password" name="password" id="passwordField" required
                            placeholder="••••••••"
                            class="w-full pl-11 pr-12 py-3.5 rounded-2xl border border-gray-200/70 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 bg-gray-50/50 focus:bg-white text-sm font-semibold text-gray-800 shadow-inner">
                        
                        {{-- Toggle Password Button --}}
                        <button type="button" onclick="togglePasswordVisibility()" 
                                class="absolute right-4 text-gray-400 hover:text-maroon-dark transition-colors p-1 outline-none">
                            <i id="passwordIcon" class="fa-regular fa-eye text-sm"></i>
                        </button>
                    </div>
                </div>

                {{-- Fitur Tambahan --}}
                <div class="flex items-center justify-between px-1 text-xs">
                    <label class="flex items-center text-gray-400 font-bold cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded-md accent-maroon-dark border-gray-300 text-maroon-dark focus:ring-0 mr-2 transition-all"> 
                        <span class="group-hover:text-gray-600 transition-colors">Ingat Sesi Saya</span>
                    </label>
                    <a href="#" class="text-maroon-dark font-extrabold hover:text-rose-700 hover:underline transition-colors">Lupa Password?</a>
                </div>

                {{-- Tombol Login --}}
                <button type="submit" class="relative w-full bg-gradient-to-r from-maroon-dark via-maroon-light to-rose-900 text-white py-4 rounded-2xl font-extrabold tracking-wider text-sm overflow-hidden transition-all duration-300 shadow-lg shadow-maroon-dark/30 hover:shadow-xl hover:shadow-maroon-dark/50 hover:scale-[1.01] active:scale-[0.99] group/btn">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        MASUK KE DASHBOARD <i class="fa-solid fa-arrow-right-to-bracket text-xs transition-transform group-hover/btn:translate-x-1"></i>
                    </span>
                    {{-- Efek Efek Kilatan Cahaya saat Hover --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-amber-500 to-rose-600 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500 mix-blend-screen"></div>
                </button>

                {{-- Tombol Back --}}
                <a href="/" class="flex items-center justify-center gap-1.5 text-xs text-gray-400 font-bold hover:text-maroon-dark transition-colors py-1 group/back">
                    <i class="fa-solid fa-arrow-left text-[10px] transition-transform group-hover/back:-translate-x-1"></i>
                    Kembali ke Beranda Utama
                </a>
            </form>
        </div>
    </div>

    {{-- FOOTER --}}
    <footer class="absolute bottom-4 text-white/20 text-[10px] font-black uppercase tracking-[0.25em] text-center w-full z-10">
        &copy; 2026 Puskesmas Teluk Lingga <span class="text-amber-500/30">•</span> Sistem Informasi Terpadu
    </footer>

    {{-- INTERAKTIF JAVASCRIPT --}}
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('passwordField');
            const passwordIcon = document.getElementById('passwordIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>