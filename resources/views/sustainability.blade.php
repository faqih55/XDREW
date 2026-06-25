<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Keberlanjutan | XDrew Fashion</title>
    
    <!-- Alpine.js & Tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Import Font Premium (Outfit & Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "on-tertiary": "#650911",
                      "on-secondary": "#213145",
                      "on-surface-variant": "#1A2E26",
                      "inverse-surface": "#1A2E26",
                      "surface-container": "#EAF3EF",
                      "surface-container-highest": "#DDF0E6",
                      "surface-variant": "#EAF3EF",
                      "surface-bright": "#F4FAF7",
                      "on-surface": "#1A2E26",
                      "secondary": "#4edea3",
                      "background": "#DDF0E6",
                      "surface-dim": "#EAF3EF",
                      "error-container": "#93000a",
                      "primary-container": "#4edea3",
                      "on-secondary-container": "#1A2E26",
                      "outline": "#86948a",
                      "surface-container-high": "#DDF0E6",
                      "on-background": "#1A2E26",
                      "on-primary-fixed-variant": "#4edea3",
                      "on-tertiary-fixed-variant": "#842225",
                      "on-tertiary-fixed": "#410005",
                      "surface-tint": "#4edea3",
                      "tertiary-fixed-dim": "#ffb3af",
                      "secondary-container": "#EAF3EF",
                      "primary-fixed-dim": "#4edea3",
                      "on-tertiary-container": "#711419",
                      "surface-container-low": "#F4FAF7",
                      "tertiary-fixed": "#ffdad7",
                      "on-error": "#690005",
                      "tertiary": "#ffb3af",
                      "secondary-fixed": "#d3e4fe",
                      "on-secondary-fixed": "#0b1c30",
                      "surface-container-lowest": "#F4FAF7",
                      "inverse-on-surface": "#2b322d",
                      "surface": "#DDF0E6",
                      "on-secondary-fixed-variant": "#38485d",
                      "on-error-container": "#ffdad6",
                      "primary": "#4edea3",
                      "on-primary-fixed": "#002113",
                      "primary-fixed": "#6ffbbe",
                      "inverse-primary": "#4edea3",
                      "on-primary": "#003824",
                      "tertiary-container": "#fc7c78",
                      "outline-variant": "#3c4a42",
                      "on-primary-container": "#ffffff",
                      "secondary-fixed-dim": "#b7c8e1",
                      "error": "#ffb4ab"
              },
              "borderRadius": {
                      "DEFAULT": "0.25rem",
                      "lg": "0.5rem",
                      "xl": "0.75rem",
                      "full": "9999px"
              },
              "spacing": {
                      "base": "4px",
                      "xs": "8px",
                      "sm": "16px",
                      "margin-mobile": "16px",
                      "lg": "48px",
                      "xl": "80px",
                      "gutter": "24px",
                      "margin-desktop": "64px",
                      "md": "24px"
              },
              "fontFamily": {
                      "body-md": ["Poppins", "sans-serif"],
                      "headline-sm": ["Outfit", "sans-serif"],
                      "display-lg": ["Outfit", "sans-serif"],
                      "caption": ["Poppins", "sans-serif"],
                      "body-lg": ["Poppins", "sans-serif"],
                      "headline-md": ["Outfit", "sans-serif"],
                      "label-md": ["Poppins", "sans-serif"],
                      "display-lg-mobile": ["Outfit", "sans-serif"]
              },
              "fontSize": {
                      "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                      "headline-sm": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                      "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                      "caption": ["12px", {"lineHeight": "16px", "fontWeight": "400"}],
                      "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                      "headline-md": ["32px", {"lineHeight": "40px", "fontWeight": "600"}],
                      "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "500"}],
                      "display-lg-mobile": ["36px", {"lineHeight": "42px", "letterSpacing": "-0.02em", "fontWeight": "700"}]
              }
            },
          },
        }
    </script>
    
    <style>
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-smoothing: antialiased;
        }
        
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #EAF3EF; }
        ::-webkit-scrollbar-thumb { background: #CBE3D9; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #4edea3; }

        .glass-card {
            background: rgba(255, 255, 255, 0.45) !important;
            backdrop-filter: blur(24px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(24px) saturate(180%) !important;
            border: 1px solid rgba(255, 255, 255, 0.6) !important;
            border-top: 1px solid rgba(255, 255, 255, 0.85) !important;
            border-left: 1px solid rgba(255, 255, 255, 0.75) !important;
            box-shadow: 
                0 15px 35px rgba(98, 124, 112, 0.05),
                inset 0 1px 3px rgba(255, 255, 255, 0.95),
                inset 0 -1px 2px rgba(255, 255, 255, 0.2) !important;
            color: #1A2E26 !important;
        }

        .emerald-glow { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        .emerald-glow:hover { box-shadow: 0 0 20px rgba(78, 222, 163, 0.2); border-color: rgba(78, 222, 163, 0.3) !important; transform: translateY(-8px); }

        .page-enter {
            animation: pageFadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }

        @keyframes pageFadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-bg-anim { animation: slowZoomOut 10s ease-out forwards; }
        @keyframes slowZoomOut {
            from { transform: scale(1.1); }
            to { transform: scale(1); }
        }

        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .scroll-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Grid Pattern */
        .bg-grid-pattern {
            background-image: 
                linear-gradient(rgba(78, 222, 163, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(78, 222, 163, 0.04) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* Smooth Floating Keyframes */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }
        @keyframes float-reverse-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(8px) rotate(-1deg); }
        }
        [data-anime="float"] { animation: float-slow 6s ease-in-out infinite; }
        [data-anime="float-reverse"] { animation: float-reverse-slow 7s ease-in-out infinite; }
    </style>
</head>
<body class="bg-[#EAF3EF] text-[#1A2E26] font-body-md selection:bg-emerald-100 antialiased relative overflow-x-hidden" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 100)">

    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-40"></div>
        <div class="absolute left-[-10%] top-[20%] w-[500px] h-[500px] rounded-full bg-[#6ffbbe] blur-[150px] opacity-40 animate-pulse-slow" data-anime="float"></div>
        <div class="absolute right-[-10%] top-[40%] w-[600px] h-[600px] rounded-full bg-[#4edea3] blur-[180px] opacity-25" data-anime="float-reverse"></div>
        <div class="absolute left-[30%] bottom-[-10%] w-[400px] h-[400px] rounded-full bg-[#3bd58f] blur-[130px] opacity-35 animate-pulse-slow" data-anime="float" style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Navbar -->
    <div class="relative z-50">
        @include('components.navbar')
    </div>

    <!-- Main Wrapper (Fades in smoothly on load) -->
    <main class="pt-24 opacity-0 transition-opacity duration-700 ease-out relative z-10" :class="loaded ? 'opacity-100' : ''">
        
        <!-- Hero Section -->
        <section class="relative min-h-[85vh] flex items-center mb-24 overflow-hidden">
            <div class="absolute inset-0 z-0 bg-[#EAF3EF]">
                <div class="absolute inset-0 bg-gradient-to-r from-[#EAF3EF] via-[#EAF3EF]/80 to-transparent z-10"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#EAF3EF] via-transparent to-transparent z-10"></div>
                <img class="w-full h-full object-cover grayscale opacity-20 hero-bg-anim" alt="Sustainable fabric texture" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCedLh2MLsokGIUzVgcPPxoMpFtqsTn5eP7urKm3ZjlSRBBOjuzPCAELbeI_qqCzFnXIIv6pzPGmN4G_T_MmIamcPkdSwR8CpWN4lykHku48UeN85aH12PF7x7uow_gY3J_EM4kKhXFhv82orqr6MAK4hOsNQtDL18T5mn8Piyaxsk_UWE9DHwKAysQ0v_ewUbm8dI0jf7_srz-S3fH2faAK8n96VmcIWPljrAjiLngZ9pgZYMDvOJG5GVaUwbz0p-nIXdbF-bTXomi"/>
            </div>
            
            <div class="relative z-20 w-full max-w-[1440px] mx-auto px-6 md:px-16">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-3 mb-6 page-enter">
                        <span class="w-2.5 h-2.5 bg-primary rounded-full animate-pulse shadow-[0_0_10px_#4edea3]"></span>
                        <span class="text-[11px] font-semibold text-primary tracking-[0.2em] uppercase">Ethical Streetwear</span>
                    </div>
                    <h1 class="text-5xl md:text-6xl lg:text-7xl mb-6 leading-[1.1] font-extrabold tracking-tight text-[#1A2E26] page-enter delay-100 uppercase">
                        Misi <br/> <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-[#2a855f]">Keberlanjutan</span> Kami
                    </h1>
                    <p class="text-base md:text-lg text-[#1A2E26]/70 mb-10 leading-relaxed font-light page-enter delay-200">
                        Di XDrew Fashion, kami percaya gaya urban sejati tidak mengorbankan bumi. Kami mendefinisikan ulang batas kemewahan melalui transparansi radikal dan inovasi material yang bertanggung jawab untuk masa depan.
                    </p>
                    <div class="flex flex-wrap gap-4 page-enter delay-300">
                        <button class="px-8 py-3.5 bg-primary text-white font-bold text-xs uppercase tracking-widest rounded-none hover:bg-[#1A2E26] transition-colors duration-300">Laporan {{ date('Y') }}</button>
                        <button class="px-8 py-3.5 border border-[#1A2E26]/20 text-[#1A2E26] font-semibold text-xs uppercase tracking-widest rounded-none hover:border-primary hover:text-primary transition-colors duration-300">Visi Kami</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pilar Section -->
        <section class="mb-32 w-full max-w-[1440px] mx-auto px-6 md:px-16">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-3xl md:text-4xl text-[#1A2E26] font-bold tracking-tight uppercase mb-4">Tiga Pilar Fundamental</h2>
                <div class="h-1 w-16 bg-primary mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-10">
                <div class="glass-card p-10 flex flex-col items-center text-center rounded-2xl emerald-glow scroll-reveal">
                    <div class="w-16 h-16 rounded-full bg-primary/10 border border-primary/20 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-primary text-[32px]">eco</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#1A2E26] uppercase tracking-wide mb-4">Bahan Organik</h3>
                    <p class="text-[#1A2E26]/70 text-sm leading-relaxed font-light">Serat alami bersertifikat eksklusif dan poliester daur ulang dari limbah laut, memastikan setiap benang bermakna.</p>
                </div>
                <div class="glass-card p-10 flex flex-col items-center text-center rounded-2xl emerald-glow scroll-reveal delay-[100ms]">
                    <div class="w-16 h-16 rounded-full bg-primary/10 border border-primary/20 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-primary text-[32px]">factory</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#1A2E26] uppercase tracking-wide mb-4">Produksi Etis</h3>
                    <p class="text-[#1A2E26]/70 text-sm leading-relaxed font-light">Menjamin upah yang sangat layak dan lingkungan kerja transparan di seluruh rantai pasok manufaktur kami.</p>
                </div>
                <div class="glass-card p-10 flex flex-col items-center text-center rounded-2xl emerald-glow scroll-reveal delay-[200ms]">
                    <div class="w-16 h-16 rounded-full bg-primary/10 border border-primary/20 flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-primary text-[32px]">co2</span>
                    </div>
                    <h3 class="text-xl font-bold text-[#1A2E26] uppercase tracking-wide mb-4">Jejak Karbon Rendah</h3>
                    <p class="text-[#1A2E26]/70 text-sm leading-relaxed font-light">Optimalisasi rute logistik cerdas dan dominasi energi terbarukan meminimalkan jejak ekologis kami secara drastis.</p>
                </div>
            </div>
        </section>

        <!-- Supply Chain Grid -->
        <section class="mb-32 w-full max-w-[1440px] mx-auto px-6 md:px-16">
            <div class="mb-12 scroll-reveal">
                <h2 class="text-3xl md:text-4xl text-[#1A2E26] font-bold tracking-tight uppercase">Transparansi Rantai Pasok</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 md:gap-6 h-auto md:h-[650px]">
                <!-- Item 1 -->
                <div class="md:col-span-2 md:row-span-2 relative group overflow-hidden rounded-2xl scroll-reveal">
                    <img class="w-full h-full object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110" alt="Bahan baku" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkRgIg-Uw8Vsy5kyVBHdUJSoeiu5ZCuiyfXd-pCJHLBEg_JfLxYfy5CFYz2T6UwDf3r9UBgJaULPaTRhiqvI8w6EG-ERTvTYjrQo38c2RQRMeT4e4aCbBVMpmny0PAwYar5Ay37k0K4Pwy5gJ0da_Atn7TLOwYL9i2W8vBevEw6uwITk0JRDTdZMVtgDPK1nDRsVCap2hhGfoXAzYlJdnDKzU-aGx89itpOXnT_L5kRZyOSNrfXU5CPnZLBWN-5OsWfs-kMaRrfr28"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col justify-end p-8 md:p-12">
                        <span class="text-[10px] font-bold text-primary mb-3 uppercase tracking-[0.2em]">Tahap 1</span>
                        <h4 class="text-2xl md:text-3xl font-bold text-white uppercase tracking-wide">Sumber Bahan Baku</h4>
                        <p class="text-gray-300 mt-3 text-sm max-w-md transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 font-light leading-relaxed">Penyortiran teliti untuk serat premium yang diambil langsung dari mitra petani kapas organik terverifikasi.</p>
                    </div>
                </div>
                
                <!-- Item 2 -->
                <div class="md:col-span-2 relative group overflow-hidden rounded-2xl scroll-reveal delay-[100ms]">
                    <img class="w-full h-full object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110" alt="Produksi" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDKFgwDsNAiX9wKlVeQp32CLGu9oi2ANqqHMU7dH3nnly0WKNx8c-yg9rEaO9yxfNalggGmDUALofeI-hDOpn_6tZ8U93KhllPciVXl_hQ1o6DdqYJRZ7bkW2Bx74cLluqUTHMBRdGFMRqjNfW82zL3sXy_HB_WxSo-oXy4k4-ZrAhZpD0ratiweU1kAof6uR9eK5XLs_5VimSt6HedoIHVNyUa8h8rNEtcDwUfR-MyMs3kFBUYUcKfXcXpWZ4e4w2JQI7hFi7bR_MR"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col justify-end p-8">
                        <span class="text-[10px] font-bold text-primary mb-2 uppercase tracking-[0.2em]">Tahap 2</span>
                        <h4 class="text-xl md:text-2xl font-bold text-white uppercase tracking-wide">Pengerjaan Etis</h4>
                    </div>
                </div>
                
                <!-- Item 3 -->
                <div class="relative group overflow-hidden rounded-2xl scroll-reveal delay-[200ms]">
                    <img class="w-full h-full object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110" alt="Quality Control" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIiXnr_5lpdVM7AejY5HANNXjMB81e47Q-EsSppZOdY4aW1loY24cLGkTDr3RaxfaIR5je7mrsMXp8Dp0oyPLtUFoLOV-1y3ZJiNI2dA6TJEglHOSaxkxl8A6alFXjypHzp7of_ZdjUfkltn3_y2q6yqfDVehtk0241wulYWBJjGiC8kczBQ_M5_PC8Ky3fW9f-Nby89aZ0i78toZDEkuVs0TgSvr9VV7iFR0pZ1mEHFuo0lcE-QTAMPsMJwlJAjI3LQ_EZw1T_oFz"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col justify-end p-6">
                        <span class="text-[10px] font-bold text-primary mb-1 uppercase tracking-[0.2em]">Tahap 3</span>
                        <h4 class="text-lg font-bold text-white uppercase tracking-wide">Kontrol Kualitas</h4>
                    </div>
                </div>
                
                <!-- Item 4 -->
                <div class="relative group overflow-hidden rounded-2xl scroll-reveal delay-[300ms]">
                    <img class="w-full h-full object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-110" alt="Logistik" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAH_cDjH1N6OGJzO4Rz0fd26sbREnEFALdx9bYcdhZjgV4UXVjTVe21ZCyL4na_Afwd3DinoYfjtvmihqYeKTctEr64a7V-pAuNv4eWhY_zFLtPZkr5iWpmyQ1SFdaklFWUVkEBYG7S_BgLnFId4tNlNelOM-4Huy-QF3Q6iIibBnIZjIqvP__7GHADTot38uv7HiF07IBWfDMgkGkO_dDLZUSh0TXFuFaAA-0a72_dktKmi9mtfnm92c7YWvk_gAatUUbBbevB8ToV"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col justify-end p-6">
                        <span class="text-[10px] font-bold text-primary mb-1 uppercase tracking-[0.2em]">Tahap 4</span>
                        <h4 class="text-lg font-bold text-white uppercase tracking-wide">Logistik Hijau</h4>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Counter Section -->
        <section class="bg-white/40 backdrop-blur-md py-24 mb-32 border-y border-white/60 relative overflow-hidden">
            <!-- Subtle Background Glow -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[300px] bg-primary/5 blur-[120px] rounded-full pointer-events-none"></div>

            <div class="w-full max-w-[1440px] mx-auto px-6 md:px-16 relative z-10">
                <div class="text-center mb-16 scroll-reveal">
                    <h2 class="text-3xl md:text-4xl text-[#1A2E26] font-bold tracking-tight uppercase mb-3">Dampak Nyata Kami</h2>
                    <p class="text-[#1A2E26]/70 font-light">Angka yang mendefinisikan komitmen berkelanjutan kami sejak 2022.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-8 divide-y md:divide-y-0 md:divide-x divide-[#1A2E26]/10">
                    <div class="text-center pt-8 md:pt-0 scroll-reveal">
                        <div class="text-5xl md:text-6xl text-primary mb-4 font-bold font-heading" id="stat-water">0</div>
                        <p class="font-bold text-xs uppercase tracking-[0.15em] text-[#1A2E26]">Ltr Air Dihemat</p>
                        <p class="text-xs text-[#1A2E26]/60 mt-2 font-light">Melalui pewarnaan eco-friendly</p>
                    </div>
                    <div class="text-center pt-8 md:pt-0 scroll-reveal delay-[100ms]">
                        <div class="text-5xl md:text-6xl text-primary mb-4 font-bold font-heading" id="stat-bottles">0</div>
                        <p class="font-bold text-xs uppercase tracking-[0.15em] text-[#1A2E26]">Botol Didaur Ulang</p>
                        <p class="text-xs text-[#1A2E26]/60 mt-2 font-light">Menjadi serat kain teknis premium</p>
                    </div>
                    <div class="text-center pt-8 md:pt-0 scroll-reveal delay-[200ms]">
                        <div class="text-5xl md:text-6xl text-primary mb-4 font-bold font-heading" id="stat-carbon">0</div>
                        <p class="font-bold text-xs uppercase tracking-[0.15em] text-[#1A2E26]">Kg Reduksi CO2</p>
                        <p class="text-xs text-[#1A2E26]/60 mt-2 font-light">Melalui efisiensi rantai pasok</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter CTA -->
        <section class="w-full max-w-[1440px] mx-auto px-6 md:px-16 mb-24">
            <div class="glass-card rounded-3xl p-10 md:p-16 flex flex-col lg:flex-row items-center justify-between gap-12 relative overflow-hidden scroll-reveal">
                <!-- Inner Glow -->
                <div class="absolute -top-32 -right-32 w-96 h-96 bg-primary/20 rounded-full blur-[100px] pointer-events-none"></div>
                
                <div class="relative z-10 max-w-xl text-center lg:text-left">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-[#1A2E26] uppercase tracking-tight">Bergabung dalam Revolusi <span class="text-primary">Mode Lambat</span></h2>
                    <p class="text-[#1A2E26]/70 text-sm leading-relaxed font-light">Dapatkan pembaruan eksklusif tentang riset material baru, rilis kapsul berkelanjutan, dan inisiatif ekologi langsung di kotak masuk Anda.</p>
                </div>
                
                <div class="relative z-10 w-full lg:w-auto">
                    <form class="flex flex-col sm:flex-row gap-3 sm:gap-0">
                        <input class="w-full sm:w-80 bg-white/60 border border-white/60 rounded-xl sm:rounded-l-xl sm:rounded-r-none px-6 py-4 focus:border-primary outline-none text-[#1A2E26] placeholder:text-[#1A2E26]/50 text-sm font-light transition-colors" placeholder="Alamat Email Anda..." type="email" required/>
                        <button class="w-full sm:w-auto bg-primary text-white rounded-xl sm:rounded-r-xl sm:rounded-l-none px-8 py-4 font-bold text-xs uppercase tracking-widest hover:bg-[#1A2E26] transition-colors duration-300 shadow-[0_0_15px_rgba(78,222,163,0.3)]">Berlangganan</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Script Animasi Berperforma Tinggi -->
    <script>
        // Animasi Counter Angka
        function animateValue(id, start, end, duration) {
            const obj = document.getElementById(id);
            if (!obj) return;
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                // Fungsi easing easeOutExpo untuk pergerakan angka yang dramatis
                const easeOut = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                const current = Math.floor(easeOut * (end - start) + start);
                
                // Format angka dengan titik
                obj.innerHTML = current.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                } else {
                    obj.innerHTML = end.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    if(id === 'stat-carbon' || id === 'stat-water') obj.innerHTML += '+';
                }
            };
            window.requestAnimationFrame(step);
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Intersection Observer untuk memicu animasi saat elemen masuk ke viewport
            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -10% 0px', // Animasi mulai sedikit sebelum elemen terlihat penuh
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Tambahkan class agar CSS transition berjalan
                        entry.target.classList.add('is-visible');
                        
                        // Cek apakah elemen ini membungkus angka statistik
                        if (entry.target.querySelector('#stat-water') && !entry.target.dataset.animated) {
                            entry.target.dataset.animated = "true";
                            // Delay sedikit agar lebih sinkron dengan animasi scroll
                            setTimeout(() => {
                                animateValue("stat-water", 0, 450000, 2500);
                                animateValue("stat-bottles", 0, 125000, 2500);
                                animateValue("stat-carbon", 0, 8500, 2500);
                            }, 300);
                        }
                        
                        // Berhenti memantau setelah animasi selesai
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observasi semua elemen dengan class scroll-reveal
            document.querySelectorAll('.scroll-reveal').forEach((el) => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>