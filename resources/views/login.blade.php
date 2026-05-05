<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Menambahkan Animate.css untuk animasi masuk -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <title>Login Admin | Puskesmas Teluk Lingga</title>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'maroon-dark': '#800000',
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #800000 0%, #2a0000 100%);
            overflow: hidden;
        }
        /* Efek partikel sederhana di background */
        .bg-blobs {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        .blob {
            position: absolute;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            filter: blur(40px);
        }
    </style>
</head>
<body class="font-[Poppins] flex items-center justify-center min-h-screen p-4">

    <!-- Ornamen Background -->
    <div class="bg-blobs">
        <div class="blob w-64 h-64 -top-10 -left-10 animate-pulse"></div>
        <div class="blob w-96 h-96 -bottom-20 -right-20 animate-pulse-slow"></div>
    </div>

    <div class="animate__animated animate__fadeInUp bg-white/95 backdrop-blur-sm p-8 rounded-[30px] shadow-2xl w-full max-w-md border-b-8 border-maroon-dark transition-all hover:shadow-maroon-dark/20">
        
        <div class="text-center mb-8">
            <div class="relative inline-block">
                <img src="{{ asset('images/logo.png') }}" class="w-20 h-20 mx-auto mb-4 drop-shadow-lg transform hover:scale-110 transition-transform duration-300" alt="Logo">
                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 border-2 border-white rounded-full"></div>
            </div>
            <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">LOGIN <span class="text-maroon-dark">ADMIN</span></h2>
            <div class="h-1 w-12 bg-maroon-dark mx-auto mt-2 rounded-full"></div>
            <p class="text-gray-500 text-sm mt-3 font-medium">Puskesmas Teluk Lingga</p>
        </div>

        <form action="/login" method="POST" class="space-y-5">
            @csrf
            <div class="group">
                <label class="text-xs font-bold text-gray-500 uppercase ml-1 group-focus-within:text-maroon-dark transition-colors">Email Address</label>
                <div class="relative">
                    <input type="email" name="email" required 
                        placeholder="admin@puskesmas.go.id"
                        class="w-full px-4 py-3 mt-1 rounded-xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 bg-gray-50 focus:bg-white">
                </div>
            </div>

            <div class="group">
                <label class="text-xs font-bold text-gray-500 uppercase ml-1 group-focus-within:text-maroon-dark transition-colors">Password</label>
                <input type="password" name="password" required 
                    placeholder="••••••••"
                    class="w-full px-4 py-3 mt-1 rounded-xl border border-gray-200 focus:border-maroon-dark focus:ring-4 focus:ring-maroon-dark/10 outline-none transition-all duration-300 bg-gray-50 focus:bg-white">
            </div>

            <div class="flex items-center justify-between px-1">
                <label class="flex items-center text-xs text-gray-500 cursor-pointer">
                    <input type="checkbox" class="mr-2 accent-maroon-dark"> Ingat Saya
                </label>
                <a href="#" class="text-xs text-maroon-dark font-semibold hover:underline">Lupa Password?</a>
            </div>

            <button type="submit" class="group relative w-full bg-maroon-dark text-white py-4 rounded-xl font-bold overflow-hidden transition-all shadow-lg hover:shadow-maroon-dark/40 active:scale-[0.98]">
                <span class="relative z-10">MASUK KE DASHBOARD</span>
                <div class="absolute inset-0 bg-white/10 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
            </button>

            <a href="/" class="group flex items-center justify-center text-xs text-gray-400 hover:text-maroon-dark transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Beranda
            </a>
        </form>
    </div>

    <footer class="absolute bottom-4 text-white/40 text-[10px] uppercase tracking-widest">
        &copy; 2024 Puskesmas Teluk Lingga - Sistem Informasi Terpadu
    </footer>

</body>
</html>