<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Masuk Pelanggan | XDrew Fashion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
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
                        "body-md": ["Inter"],
                        "headline-sm": ["Montserrat"],
                        "display-lg": ["Montserrat"]
                    }
                },
            },
        }
    </script>
    <style>
        .glass-card { background: rgba(30, 41, 59, 0.6); backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .auth-bg-overlay { background: linear-gradient(to right, rgba(14, 21, 17, 0.9) 0%, rgba(14, 21, 17, 0.2) 100%); }
    </style>
</head>

<body class="bg-background text-on-background min-h-screen flex font-body-md">
    <main class="flex w-full min-h-screen">
        <section class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
            <div class="absolute inset-0 z-10 auth-bg-overlay"></div>
            <img alt="Lifestyle" class="absolute inset-0 object-cover w-full h-full grayscale-[20%] brightness-75" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNfedLcMsvFxTROkDUu6mGrkL1gthW-y22dHx6NEN2O2yFku7q6fv7iDo397FhqqQMVFgeftN7GmP5LM-fADqpBAnXI5pgOkzc1DTTvs6_ocORN4Xxst91AzKt_F5bSH07icILIb5EBsGwRL6Q6Pkj2618wtT3LGB-Csg2_bywFVYQlGap8gC0xfVD_Adf5O8CnUlpWdDI8SjutJwekajtjbyGCjPH4fjBznuJUweA0gADbdXwsnpvfkmeZ7HWhnw-P8byyAZZUky1"/>
            <div class="relative z-20 flex flex-col justify-between p-16 h-full w-full">
                <div>
                    <h1 class="font-display-lg text-5xl uppercase tracking-tighter text-white mb-4">XDrew<span class="text-primary">.</span></h1>
                    <p class="text-primary tracking-[0.2em] uppercase text-sm">Dibuat Dengan Kesadaran</p>
                </div>
                <div class="max-w-md">
                    <h2 class="text-3xl font-bold mb-4">Masa Depan Etika Berbusana.</h2>
                    <p class="text-on-surface-variant leading-relaxed">
                        Bergabunglah dengan komunitas yang berdedikasi pada transparansi radikal dan gaya tanpa kompromi. Pakaian kami bukan sekadar fashion; itu adalah pernyataan niat.
                    </p>
                </div>
            </div>
        </section>

        <section class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-background">
            <div class="w-full max-w-md">
                <div class="glass-card p-8 rounded-xl shadow-2xl relative">
                    <header class="mb-8">
                        <h2 class="text-2xl font-bold text-white mb-2">Selamat Datang Kembali</h2>
                        <p class="text-on-surface-variant text-sm">Silakan masukkan kredensial Anda untuk mengakses akun.</p>
                    </header>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-900/20 border border-red-500 text-red-200 text-sm rounded-lg">
                            <ul class="list-disc pl-4">
                                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pelanggan.login.submit') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div class="space-y-2">
                            <label class="block text-sm text-on-surface-variant">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required 
                                   class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 text-white outline-none focus:border-primary" />
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm text-on-surface-variant">Kata Sandi</label>
                            <input type="password" name="password" id="password" required 
                                   class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-3 text-white outline-none focus:border-primary" />
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="remember" id="remember" class="rounded border-outline-variant bg-surface-container-low text-primary">
                                <label class="text-sm text-on-surface-variant" for="remember">Ingat saya</label>
                            </div>
                            <a href="#" class="text-sm text-primary hover:underline">Lupa Kata Sandi?</a>
                        </div>

                        <button type="submit" class="w-full bg-primary hover:bg-emerald-600 text-black font-bold py-3 rounded-lg transition-all mt-4">
                            Masuk
                        </button>
                    </form>

                    <footer class="mt-8 text-center border-t border-outline-variant/30 pt-6">
                        <p class="text-on-surface-variant text-sm">
                            Belum punya akun? <a href="#" class="text-primary font-semibold hover:underline">Daftar Sekarang</a>
                        </p>
                    </footer>
                </div>
            </div>
        </section>
    </main>
</body>
</html>