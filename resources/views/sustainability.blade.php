<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Keberlanjutan | XDrew Fashion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "tertiary-fixed": "#ffdad7",
                    "on-tertiary-fixed": "#410005",
                    "outline-variant": "#3c4a42",
                    "tertiary": "#ffb3af",
                    "on-secondary-fixed": "#0b1c30",
                    "on-tertiary-container": "#711419",
                    "on-surface-variant": "#bbcabf",
                    "on-background": "#dde4dd",
                    "surface-bright": "#343b36",
                    "primary-fixed": "#6ffbbe",
                    "tertiary-fixed-dim": "#ffb3af",
                    "on-secondary-fixed-variant": "#38485d",
                    "on-secondary-container": "#a9bad3",
                    "surface-container-high": "#242c27",
                    "surface-container-low": "#161d19",
                    "primary": "#4edea3",
                    "outline": "#86948a",
                    "on-tertiary-fixed-variant": "#842225",
                    "inverse-primary": "#006c49",
                    "on-surface": "#dde4dd",
                    "on-primary-fixed-variant": "#005236",
                    "background": "#0e1511",
                    "on-tertiary": "#650911",
                    "surface-tint": "#4edea3",
                    "on-primary-container": "#00422b",
                    "inverse-surface": "#dde4dd",
                    "on-primary-fixed": "#002113",
                    "on-error": "#690005",
                    "surface-container": "#1a211d",
                    "inverse-on-surface": "#2b322d",
                    "on-secondary": "#213145",
                    "surface": "#0e1511",
                    "on-error-container": "#ffdad6",
                    "secondary-fixed-dim": "#b7c8e1",
                    "secondary-container": "#3a4a5f",
                    "primary-fixed-dim": "#4edea3",
                    "tertiary-container": "#fc7c78",
                    "surface-container-highest": "#2f3632",
                    "secondary": "#b7c8e1",
                    "secondary-fixed": "#d3e4fe",
                    "error": "#ffb4ab",
                    "surface-dim": "#0e1511",
                    "on-primary": "#003824",
                    "primary-container": "#10b981",
                    "surface-container-lowest": "#09100c",
                    "surface-variant": "#2f3632",
                    "error-container": "#93000a"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "xs": "8px",
                    "xl": "80px",
                    "gutter": "24px",
                    "base": "4px",
                    "sm": "16px",
                    "md": "24px",
                    "lg": "48px"
            },
            "fontFamily": {
                    "caption": ["Inter"],
                    "body-lg": ["Inter"],
                    "display-lg": ["Montserrat"],
                    "headline-sm": ["Montserrat"],
                    "headline-md": ["Montserrat"],
                    "body-md": ["Inter"],
                    "label-md": ["Inter"],
                    "display-lg-mobile": ["Montserrat"]
            },
            "fontSize": {
                    "caption": ["12px", {"lineHeight": "16px", "fontWeight": "400"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-sm": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "headline-md": ["32px", {"lineHeight": "40px", "fontWeight": "600"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "500"}],
                    "display-lg-mobile": ["36px", {"lineHeight": "42px", "letterSpacing": "-0.02em", "fontWeight": "700"}]
            }
          },
        },
      }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .emerald-glow:hover {
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.15);
            border-color: rgba(16, 185, 129, 0.3);
        }
        [x-cloak] { display: none !important; }
        
        /* Utilitas tambahan untuk memastikan transisi mulus */
        .scroll-reveal {
            will-change: opacity, transform;
        }
    </style>
</head>
<body class="bg-background text-on-background selection:bg-primary selection:text-on-primary">

    @include('components.navbar')

    <main class="pt-24 overflow-hidden">
        
        <section class="relative min-h-[80vh] flex items-center mb-xl">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-r from-background via-background/80 to-transparent z-10"></div>
                <img class="w-full h-full object-cover grayscale opacity-50" data-alt="A cinematic, low-light photograph of high-end sustainable fabric textures" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCedLh2MLsokGIUzVgcPPxoMpFtqsTn5eP7urKm3ZjlSRBBOjuzPCAELbeI_qqCzFnXIIv6pzPGmN4G_T_MmIamcPkdSwR8CpWN4lykHku48UeN85aH12PF7x7uow_gY3J_EM4kKhXFhv82orqr6MAK4hOsNQtDL18T5mn8Piyaxsk_UWE9DHwKAysQ0v_ewUbm8dI0jf7_srz-S3fH2faAK8n96VmcIWPljrAjiLngZ9pgZYMDvOJG5GVaUwbz0p-nIXdbF-bTXomi"/>
            </div>
            
            <div class="relative z-20 w-full max-w-[1440px] mx-auto px-6 md:px-16">
                <div class="max-w-2xl scroll-reveal">
                    <div class="flex items-center gap-xs mb-sm">
                        <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                        <span class="font-label-md text-label-md text-primary tracking-widest uppercase">Ethical Streetwear</span>
                    </div>
                    <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg mb-md leading-tight">Misi Keberlanjutan Kami</h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-lg">
                        Di XDrew Fashion, kami percaya bahwa gaya urban tidak harus mengorbankan bumi. Kami mendefinisikan ulang kemewahan melalui transparansi radikal dan inovasi material yang bertanggung jawab.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <button class="px-8 py-3 bg-primary text-black font-bold text-xs uppercase tracking-widest hover:scale-105 transition-transform duration-300">Laporan {{ date('Y') }}</button>
                        <button class="px-8 py-3 border border-white/20 text-white font-bold text-xs uppercase tracking-widest hover:bg-white/10 transition-colors duration-300">Visi Kami</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-xl w-full max-w-[1440px] mx-auto px-6 md:px-16">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="font-headline-md text-headline-md text-on-surface mb-4">Tiga Pilar Fundamental</h2>
                <div class="h-1 w-24 bg-primary mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass-card p-10 flex flex-col items-center text-center emerald-glow transition-all duration-500 hover:-translate-y-2 scroll-reveal" style="transition-delay: 100ms;">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-primary text-[32px]">eco</span>
                    </div>
                    <h3 class="font-headline-sm text-xl uppercase mb-4">Bahan Organik</h3>
                    <p class="font-body-md text-on-surface-variant text-sm leading-relaxed">Kami hanya menggunakan serat alami bersertifikat GOTS dan poliester daur ulang dari limbah laut untuk setiap jahitan.</p>
                </div>
                <div class="glass-card p-10 flex flex-col items-center text-center emerald-glow transition-all duration-500 hover:-translate-y-2 scroll-reveal" style="transition-delay: 200ms;">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-primary text-[32px]">factory</span>
                    </div>
                    <h3 class="font-headline-sm text-xl uppercase mb-4">Produksi Etis</h3>
                    <p class="font-body-md text-on-surface-variant text-sm leading-relaxed">Keadilan adalah gaya kami. Kami menjamin upah layak dan kondisi kerja yang aman di seluruh jaringan mitra manufaktur kami.</p>
                </div>
                <div class="glass-card p-10 flex flex-col items-center text-center emerald-glow transition-all duration-500 hover:-translate-y-2 scroll-reveal" style="transition-delay: 300ms;">
                    <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-primary text-[32px]">co2</span>
                    </div>
                    <h3 class="font-headline-sm text-xl uppercase mb-4">Jejak Karbon Rendah</h3>
                    <p class="font-body-md text-on-surface-variant text-sm leading-relaxed">Optimalisasi logistik dan penggunaan energi terbarukan membantu kami meminimalkan emisi gas rumah kaca secara drastis.</p>
                </div>
            </div>
        </section>

        <section class="mb-xl w-full max-w-[1440px] mx-auto px-6 md:px-16">
            <div class="mb-12 scroll-reveal">
                <h2 class="font-headline-md text-headline-md text-on-surface">Transparansi Rantai Pasok</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-6 h-auto md:h-[600px]">
                <div class="md:col-span-2 md:row-span-2 relative group overflow-hidden rounded-xl scroll-reveal">
                    <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105 grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100" data-alt="Bahan baku" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkRgIg-Uw8Vsy5kyVBHdUJSoeiu5ZCuiyfXd-pCJHLBEg_JfLxYfy5CFYz2T6UwDf3r9UBgJaULPaTRhiqvI8w6EG-ERTvTYjrQo38c2RQRMeT4e4aCbBVMpmny0PAwYar5Ay37k0K4Pwy5gJ0da_Atn7TLOwYL9i2W8vBevEw6uwITk0JRDTdZMVtgDPK1nDRsVCap2hhGfoXAzYlJdnDKzU-aGx89itpOXnT_L5kRZyOSNrfXU5CPnZLBWN-5OsWfs-kMaRrfr28"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent flex flex-col justify-end p-8">
                        <span class="font-label-md text-xs text-primary mb-2 uppercase tracking-widest">Tahap 1</span>
                        <h4 class="font-headline-sm text-2xl text-white uppercase">Sumber Bahan Baku</h4>
                        <p class="font-body-md text-gray-300 mt-2 text-sm max-w-md transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">Mengambil serat terbaik langsung dari petani kapas organik di Jawa Tengah.</p>
                    </div>
                </div>
                
                <div class="md:col-span-2 relative group overflow-hidden rounded-xl scroll-reveal" style="transition-delay: 150ms;">
                    <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105 grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100" data-alt="Produksi" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDKFgwDsNAiX9wKlVeQp32CLGu9oi2ANqqHMU7dH3nnly0WKNx8c-yg9rEaO9yxfNalggGmDUALofeI-hDOpn_6tZ8U93KhllPciVXl_hQ1o6DdqYJRZ7bkW2Bx74cLluqUTHMBRdGFMRqjNfW82zL3sXy_HB_WxSo-oXy4k4-ZrAhZpD0ratiweU1kAof6uR9eK5XLs_5VimSt6HedoIHVNyUa8h8rNEtcDwUfR-MyMs3kFBUYUcKfXcXpWZ4e4w2JQI7hFi7bR_MR"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent flex flex-col justify-end p-8">
                        <span class="font-label-md text-xs text-primary mb-2 uppercase tracking-widest">Tahap 2</span>
                        <h4 class="font-headline-sm text-2xl text-white uppercase">Produksi Etis</h4>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl scroll-reveal" style="transition-delay: 250ms;">
                    <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105 grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100" data-alt="Quality Control" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIiXnr_5lpdVM7AejY5HANNXjMB81e47Q-EsSppZOdY4aW1loY24cLGkTDr3RaxfaIR5je7mrsMXp8Dp0oyPLtUFoLOV-1y3ZJiNI2dA6TJEglHOSaxkxl8A6alFXjypHzp7of_ZdjUfkltn3_y2q6yqfDVehtk0241wulYWBJjGiC8kczBQ_M5_PC8Ky3fW9f-Nby89aZ0i78toZDEkuVs0TgSvr9VV7iFR0pZ1mEHFuo0lcE-QTAMPsMJwlJAjI3LQ_EZw1T_oFz"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent flex flex-col justify-end p-6">
                        <span class="font-label-md text-[10px] text-primary mb-1 uppercase tracking-widest">Tahap 3</span>
                        <h4 class="font-headline-sm text-lg text-white uppercase">Kontrol Kualitas</h4>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl scroll-reveal" style="transition-delay: 350ms;">
                    <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105 grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100" data-alt="Logistik" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAH_cDjH1N6OGJzO4Rz0fd26sbREnEFALdx9bYcdhZjgV4UXVjTVe21ZCyL4na_Afwd3DinoYfjtvmihqYeKTctEr64a7V-pAuNv4eWhY_zFLtPZkr5iWpmyQ1SFdaklFWUVkEBYG7S_BgLnFId4tNlNelOM-4Huy-QF3Q6iIibBnIZjIqvP__7GHADTot38uv7HiF07IBWfDMgkGkO_dDLZUSh0TXFuFaAA-0a72_dktKmi9mtfnm92c7YWvk_gAatUUbBbevB8ToV"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent flex flex-col justify-end p-6">
                        <span class="font-label-md text-[10px] text-primary mb-1 uppercase tracking-widest">Tahap 4</span>
                        <h4 class="font-headline-sm text-lg text-white uppercase">Logistik Hijau</h4>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-surface-container-low py-24 mb-xl">
            <div class="w-full max-w-[1440px] mx-auto px-6 md:px-16">
                <div class="text-center mb-16 scroll-reveal">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-2">Dampak Nyata Kami</h2>
                    <p class="font-body-md text-on-surface-variant">Angka yang berbicara tentang komitmen kami sejak 2022.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="text-center scroll-reveal" style="transition-delay: 100ms;">
                        <div class="font-display-lg text-5xl md:text-6xl text-primary mb-4 font-bold" id="stat-water">0</div>
                        <p class="font-bold text-xs uppercase tracking-widest text-white">Ltr Air Dihemat</p>
                        <p class="text-xs text-gray-500 mt-2">Per koleksi tahunan</p>
                    </div>
                    <div class="text-center scroll-reveal" style="transition-delay: 200ms;">
                        <div class="font-display-lg text-5xl md:text-6xl text-primary mb-4 font-bold" id="stat-bottles">0</div>
                        <p class="font-bold text-xs uppercase tracking-widest text-white">Botol Plastik Didaur Ulang</p>
                        <p class="text-xs text-gray-500 mt-2">Menjadi serat kain teknis</p>
                    </div>
                    <div class="text-center scroll-reveal" style="transition-delay: 300ms;">
                        <div class="font-display-lg text-5xl md:text-6xl text-primary mb-4 font-bold" id="stat-carbon">0</div>
                        <p class="font-bold text-xs uppercase tracking-widest text-white">Kg Reduksi Emisi CO2</p>
                        <p class="text-xs text-gray-500 mt-2">Melalui logistik efisien</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="w-full max-w-[1440px] mx-auto px-6 md:px-16 mb-24">
            <div class="glass-card rounded-2xl p-8 md:p-16 flex flex-col md:flex-row items-center justify-between gap-12 overflow-hidden relative scroll-reveal">
                <div class="absolute top-0 right-0 w-96 h-96 bg-[#4edea3]/10 rounded-full blur-[100px] pointer-events-none"></div>
                
                <div class="relative z-10 max-w-xl text-center md:text-left">
                    <h2 class="font-headline-md text-3xl md:text-4xl font-bold mb-4 text-white uppercase tracking-tighter">Bergabung dalam Revolusi Mode Lambat</h2>
                    <p class="font-body-md text-gray-400 text-sm leading-relaxed">Dapatkan update eksklusif tentang koleksi berkelanjutan terbaru dan inisiatif ekologi kami langsung di inbox Anda.</p>
                </div>
                
                <div class="relative z-10 w-full md:w-auto">
                    <form class="flex flex-col sm:flex-row gap-0 sm:gap-2">
                        <input class="w-full sm:w-72 bg-white/5 border border-white/10 rounded-full sm:rounded-l-full sm:rounded-r-none px-6 py-4 focus:border-primary outline-none text-white placeholder:text-gray-500 text-xs tracking-widest uppercase transition-colors" placeholder="Alamat Email" type="email"/>
                        <button class="mt-4 sm:mt-0 w-full sm:w-auto bg-primary text-black rounded-full sm:rounded-r-full sm:rounded-l-none px-8 py-4 font-bold text-xs uppercase tracking-widest hover:bg-[#3bc68f] transition-colors">Daftar</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    @include('components.footer')

    <script>
        // 1. Animasi Angka (Counter)
        function animateCounter(id, target, suffix = '') {
            const el = document.getElementById(id);
            if (!el) return;
            let current = 0;
            const duration = 2000;
            const stepTime = 20;
            const increment = target / (duration / stepTime);
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    el.innerText = target.toLocaleString() + suffix;
                    clearInterval(timer);
                } else {
                    el.innerText = Math.floor(current).toLocaleString() + suffix;
                }
            }, stepTime);
        }

        // 2. Logic Scroll Reveal & Pemicu Counter
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Eksekusi animasi reveal
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-12');
                    
                    // Cek jika elemen ini adalah bagian dari statistik (untuk counter)
                    if (entry.target.querySelector('#stat-water') && !entry.target.dataset.counted) {
                        entry.target.dataset.counted = "true"; // Mencegah hitung ulang
                        animateCounter('stat-water', 450000);
                        animateCounter('stat-bottles', 125000);
                        animateCounter('stat-carbon', 8500);
                    }
                    
                    // Unobserve setelah animasi selesai agar tidak berulang-ulang
                    scrollObserver.unobserve(entry.target);
                }
            });
        }, { 
            threshold: 0.1, 
            rootMargin: "0px 0px -50px 0px" 
        });

        // 3. Inisialisasi Elemen Scroll Reveal
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.scroll-reveal').forEach(el => {
                // Set initial state (tersembunyi di bawah)
                el.classList.add('opacity-0', 'translate-y-12', 'transition-all', 'duration-[800ms]', 'ease-out');
                scrollObserver.observe(el);
            });
        });
    </script>
</body>
</html>