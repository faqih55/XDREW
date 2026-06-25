<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Daftar Pelanggan | XDrew Fashion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#4edea3",
                        "on-background": "#dde4dd",
                        "background": "#0e1511",
                        "surface-container-low": "#161d19",
                        "outline-variant": "#3c4a42",
                        "on-surface-variant": "#bbcabf",
                        "error": "#ffb4ab",
                        "on-primary-container": "#00422b"
                    },
                    fontFamily: {
                        "body-md": ["Poppins", "sans-serif"],
                        "headline-sm": ["Outfit", "sans-serif"],
                        "display-lg": ["Outfit", "sans-serif"]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0e1511;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
        
        .bg-slide {
            position: fixed;
            inset: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 0;
            transition: opacity 2.5s ease-in-out;
        }
        
        .bg-slide-1 {
            background-image: url('{{ asset("images/login-bg.png") }}');
        }
        
        .bg-slide-2 {
            background-image: url('{{ asset("images/login-bg-2.png") }}');
        }
        
        .overlay {
            background: radial-gradient(circle, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.65) 100%);
            z-index: 1;
        }

        .liquid-glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(28px) saturate(140%);
            -webkit-backdrop-filter: blur(28px) saturate(140%);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 40px;
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.6),
                inset 0 1px 1px rgba(255, 255, 255, 0.25),
                inset 0 10px 20px rgba(255, 255, 255, 0.05),
                inset 0 -15px 30px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
        }

        /* Top shine to simulate physical curved glass reflection */
        .liquid-glass-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 38%;
            background: linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.18) 0%,
                rgba(255, 255, 255, 0.05) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            border-radius: 40px 40px 100% 100% / 40px 40px 30px 30px;
            pointer-events: none;
            border-top: 1.5px solid rgba(255, 255, 255, 0.3);
            border-left: 1.5px solid rgba(255, 255, 255, 0.2);
        }

        .glass-input {
            background: rgba(255, 255, 255, 0.07) !important;
            border: 1.5px solid rgba(255, 255, 255, 0.12) !important;
            border-radius: 16px !important;
            color: #ffffff !important;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .glass-input::placeholder {
            color: rgba(255, 255, 255, 0.45) !important;
        }

        .glass-input:focus {
            background: rgba(255, 255, 255, 0.12) !important;
            border-color: rgba(255, 255, 255, 0.35) !important;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1) !important;
            outline: none !important;
            --tw-ring-color: transparent !important;
        }

        /* Pill Sign Up Button - Green Liquid Glass Hover */
        .glass-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1.5px solid rgba(255, 255, 255, 0.4);
            border-radius: 9999px;
            color: #ffffff;
            font-weight: 500;
            letter-spacing: 0.05em;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            width: 140px;
            display: block;
            margin: 0 auto;
        }

        .glass-btn:hover {
            background: rgba(78, 222, 163, 0.12);
            border-color: rgba(78, 222, 163, 0.5);
            color: #4edea3;
            transform: translateY(-1px);
            box-shadow: 
                0 8px 25px rgba(78, 222, 163, 0.25),
                inset 0 0 10px rgba(78, 222, 163, 0.1);
            text-shadow: 0 0 8px rgba(78, 222, 163, 0.3);
            width: 260px;
        }

        .glass-btn:active {
            transform: translateY(1px);
        }

        /* Social Login Buttons */
        .glass-social-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1.5px solid rgba(255, 255, 255, 0.12);
            border-radius: 9999px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            overflow: hidden;
            white-space: nowrap;
            padding: 0 10px;
        }

        .glass-social-text {
            max-width: 0;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.75rem;
            font-weight: 500;
            color: #ffffff;
            margin-left: 0;
            overflow: hidden;
        }

        .glass-social-btn:hover {
            width: 120px;
            justify-content: flex-start;
            padding-left: 12px;
            padding-right: 12px;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.08);
        }

        .glass-social-btn:hover .glass-social-text {
            max-width: 80px;
            opacity: 1;
            margin-left: 6px;
        }

        .logo-text {
            font-family: 'Outfit', sans-serif;
            font-size: 1.75rem;
            font-weight: 900;
            letter-spacing: -0.025em;
            color: #ffffff;
            transition: all 0.3s ease;
            text-shadow: 0 0 30px rgba(78, 222, 163, 0);
            line-height: 1;
        }

        .logo-text:hover {
            color: #4edea3;
            text-shadow: 0 0 20px rgba(78, 222, 163, 0.5);
        }

        @keyframes liquid-glow {
            0% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(40px, -30px) scale(1.1);
            }
            100% {
                transform: translate(-20px, 30px) scale(0.95);
            }
        }
        
        .liquid-glow-1 {
            position: fixed;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(78, 222, 163, 0.22) 0%, rgba(78, 222, 163, 0) 70%);
            filter: blur(60px);
            z-index: 2;
            pointer-events: none;
            animation: liquid-glow 12s infinite alternate ease-in-out;
            top: 25%;
            left: 20%;
        }
        
        .liquid-glow-2 {
            position: fixed;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(234, 179, 8, 0.15) 0%, rgba(234, 179, 8, 0) 70%);
            filter: blur(70px);
            z-index: 2;
            pointer-events: none;
            animation: liquid-glow 15s infinite alternate-reverse ease-in-out;
            bottom: 25%;
            right: 20%;
        }
    </style>
</head>

<body class="min-h-screen font-body-md relative overflow-y-auto select-none">
    <!-- Animated Background slides -->
    <div class="bg-slide bg-slide-1 opacity-100"></div>
    <div class="bg-slide bg-slide-2 opacity-0"></div>

    <!-- Full-screen dark overlay to enhance readability -->
    <div class="fixed inset-0 overlay"></div>

    <!-- Ambient glowing light blobs behind the card -->
    <div class="liquid-glow-1"></div>
    <div class="liquid-glow-2"></div>

    <!-- Centered Wrapper -->
    <div class="min-h-screen w-full flex items-center justify-center py-6 md:py-10 relative z-10">
        <!-- Centered Glass Card -->
        <main class="w-full max-w-[420px] p-4">
            <div class="liquid-glass-card p-6 md:p-8">
                <!-- Header Row -->
                <div class="flex justify-between items-center mb-5 relative z-10">
                    <!-- Logo XDREW (perbesar dan samakan seperti dashboard) -->
                    <a href="{{ route('home') }}" class="relative flex items-center gap-1 group/logo flex-shrink-0">
                        <span class="logo-text">XDREW</span>
                        <span class="relative inline-flex items-end mb-[12px] ml-0.5">
                            <span class="block w-[8px] h-[8px] rounded-full bg-[#4edea3] shadow-[0_0_10px_rgba(78,222,163,0.8)]"></span>
                            <span class="absolute inset-0 rounded-full bg-[#4edea3] opacity-60 animate-ping"></span>
                        </span>
                    </a>
                </div>

                <!-- Title & Subtitle -->
                <div class="mb-4 relative z-10">
                    <h1 class="text-[28px] font-light text-white tracking-wide leading-tight mb-1 font-headline-sm">Daftar</h1>
                    <p class="text-white/60 text-xs font-light leading-relaxed">Buat akun baru untuk memulai.</p>
                </div>

                <!-- Error Alerts (styled dynamically with glass look) -->
                @if ($errors->any())
                    <div class="mb-4 p-3 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-200 text-xs relative z-10 backdrop-blur-md">
                        <ul class="list-disc pl-4 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('pelanggan.register.submit') }}" method="POST" class="space-y-4 relative z-10">
                    @csrf
                    
                    <!-- Name Input -->
                    <div class="relative">
                        <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required autofocus
                               placeholder="Nama Lengkap"
                               class="glass-input w-full h-[46px] px-4 py-2 outline-none" />
                    </div>

                    <!-- Email Input -->
                    <div class="relative">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                               placeholder="Alamat Email"
                               class="glass-input w-full h-[46px] px-4 py-2 outline-none" />
                    </div>

                    <!-- Password Input -->
                    <div class="relative">
                        <input type="password" name="password" id="password" required 
                               placeholder="Kata Sandi"
                               class="glass-input w-full h-[46px] px-4 py-2 outline-none" />
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" required 
                               placeholder="Konfirmasi Kata Sandi"
                               class="glass-input w-full h-[46px] px-4 py-2 outline-none" />
                    </div>

                    <!-- Sign Up Button -->
                    <button type="submit" class="glass-btn h-[46px] mt-4 text-sm font-medium">
                        Daftar
                    </button>
                </form>

                <!-- Separator 'atau masuk dengan' -->
                <div class="relative flex py-1 items-center my-4 relative z-10">
                    <div class="flex-grow border-t border-white/10"></div>
                    <span class="flex-shrink mx-3 text-white/40 text-[9px] uppercase tracking-wider font-light">atau masuk dengan</span>
                    <div class="flex-grow border-t border-white/10"></div>
                </div>

                <!-- Social Login Buttons -->
                <div class="flex justify-center gap-3 mb-4 relative z-10">
                    <!-- Google -->
                    <a href="#" class="glass-social-btn hover:border-red-500/35 hover:bg-red-500/5 group" title="Daftar dengan Google">
                        <svg viewBox="0 0 24 24" class="w-[18px] h-[18px] flex-shrink-0 transition-transform group-hover:scale-110" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"/>
                        </svg>
                        <span class="glass-social-text">Google</span>
                    </a>
                    <!-- Facebook -->
                    <a href="#" class="glass-social-btn hover:border-[#1877F2]/35 hover:bg-[#1877F2]/5 group" title="Daftar dengan Facebook">
                        <svg viewBox="0 0 24 24" class="w-[18px] h-[18px] flex-shrink-0 transition-transform group-hover:scale-110" fill="#1877F2">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span class="glass-social-text">Facebook</span>
                    </a>
                    <!-- Apple -->
                    <a href="#" class="glass-social-btn hover:border-white/35 hover:bg-white/5 group" title="Daftar dengan Apple">
                        <svg viewBox="0 0 24 24" class="w-[18px] h-[18px] flex-shrink-0 transition-transform group-hover:scale-110" fill="#FFFFFF">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 4.17c.66-.81 1.11-1.93.99-3.06-1 .04-2.21.67-2.93 1.49-.62.69-1.16 1.84-1.01 2.96 1.12.09 2.27-.56 2.95-1.39z"/>
                        </svg>
                        <span class="glass-social-text">Apple</span>
                    </a>
                    <!-- Twitter (X) -->
                    <a href="#" class="glass-social-btn hover:border-white/35 hover:bg-white/5 group" title="Daftar dengan Twitter">
                        <svg viewBox="0 0 24 24" class="w-[18px] h-[18px] flex-shrink-0 transition-transform group-hover:scale-110" fill="#FFFFFF">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                        <span class="glass-social-text">Twitter</span>
                    </a>
                </div>

                <!-- Log In Footer -->
                <footer class="mt-4 text-center text-xs text-white/50 relative z-10 font-light">
                    Sudah punya akun? 
                    <a href="{{ route('pelanggan.login') }}" class="text-white hover:underline ml-1 font-medium transition-colors">Masuk</a>
                </footer>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slide1 = document.querySelector('.bg-slide-1');
            const slide2 = document.querySelector('.bg-slide-2');
            let active = 1;
            
            setInterval(function() {
                if (active === 1) {
                    slide1.style.opacity = '0';
                    slide2.style.opacity = '1';
                    active = 2;
                } else {
                    slide1.style.opacity = '1';
                    slide2.style.opacity = '0';
                    active = 1;
                }
            }, 7000); // Ganti gambar setiap 7 detik
        });
    </script>
</body>
</html>
