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
            background-image: url('{{ asset("images/login-bg.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
        
        .overlay {
            background: radial-gradient(circle, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.65) 100%);
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

        /* Pill Sign Up Button */
        .glass-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1.5px solid rgba(255, 255, 255, 0.4);
            border-radius: 9999px;
            color: #ffffff;
            font-weight: 500;
            letter-spacing: 0.05em;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .glass-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.6);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.1);
        }

        .glass-btn:active {
            transform: translateY(1px);
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
    </style>
</head>

<body class="min-h-screen flex items-center justify-center font-body-md relative overflow-hidden select-none">
    <!-- Full-screen dark overlay to enhance readability -->
    <div class="absolute inset-0 overlay z-0"></div>

    <!-- Centered Glass Card -->
    <main class="w-full max-w-[460px] p-6 z-10">
        <div class="liquid-glass-card p-10 md:p-12">
            <!-- Header Row -->
            <div class="flex justify-between items-center mb-10 relative z-10">
                <!-- Logo XDREW (perbesar dan samakan seperti dashboard) -->
                <a href="{{ route('home') }}" class="relative flex items-center gap-1 group/logo flex-shrink-0">
                    <span class="logo-text">XDREW</span>
                    <span class="relative inline-flex items-end mb-[16px] ml-0.5">
                        <span class="block w-[8px] h-[8px] rounded-full bg-[#4edea3] shadow-[0_0_10px_rgba(78,222,163,0.8)]"></span>
                        <span class="absolute inset-0 rounded-full bg-[#4edea3] opacity-60 animate-ping"></span>
                    </span>
                </a>
                <a href="#" class="text-[11px] tracking-[0.25em] text-white/50 hover:text-white/80 transition-colors font-medium uppercase font-headline-sm">Tutorial</a>
            </div>

            <!-- Title & Subtitle -->
            <div class="mb-8 relative z-10">
                <h1 class="text-[34px] font-light text-white tracking-wide leading-tight mb-2 font-headline-sm">Daftar</h1>
                <p class="text-white/60 text-xs font-light leading-relaxed">Buat akun baru untuk memulai.</p>
            </div>

            <!-- Error Alerts (styled dynamically with glass look) -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-200 text-xs relative z-10 backdrop-blur-md">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('register') }}" method="POST" class="space-y-5 relative z-10">
                @csrf
                
                <!-- Name Input -->
                <div class="relative">
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                           placeholder="Nama Lengkap"
                           class="glass-input w-full h-[54px] px-5 py-3 outline-none" />
                </div>

                <!-- Email Input -->
                <div class="relative">
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           placeholder="Alamat Email"
                           class="glass-input w-full h-[54px] px-5 py-3 outline-none" />
                </div>

                <!-- Password Input -->
                <div class="relative">
                    <input type="password" name="password" id="password" required 
                           placeholder="Kata Sandi"
                           class="glass-input w-full h-[54px] px-5 py-3 outline-none" />
                </div>

                <!-- Confirm Password Input -->
                <div class="relative">
                    <input type="password" name="password_confirmation" id="password_confirmation" required 
                           placeholder="Konfirmasi Kata Sandi"
                           class="glass-input w-full h-[54px] px-5 py-3 outline-none" />
                </div>

                <!-- Sign Up Button -->
                <button type="submit" class="glass-btn w-full h-[54px] mt-6 text-sm font-medium">
                    Daftar
                </button>
            </form>

            <!-- Log In Footer -->
            <footer class="mt-8 text-center text-xs text-white/50 relative z-10 font-light">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-white hover:underline ml-1 font-medium transition-colors">Masuk</a>
            </footer>
        </div>
    </main>
</body>
</html>
