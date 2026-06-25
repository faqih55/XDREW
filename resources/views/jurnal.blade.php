<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Jurnal | XDrew Fashion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Alpine.js untuk Navbar -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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

        .emerald-glow:hover {
            box-shadow: 0 0 20px rgba(78, 222, 163, 0.2);
            border-color: rgba(78, 222, 163, 0.3) !important;
        }

        [x-cloak] { display: none !important; }
        
        .scroll-reveal {
            will-change: opacity, transform;
            opacity: 0;
            transform: translateY(3rem);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .scroll-reveal.is-revealed {
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
<body class="bg-[#EAF3EF] text-[#1A2E26] font-body-md selection:bg-emerald-100 relative">

    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-40"></div>
        <div class="absolute left-[-10%] top-[20%] w-[500px] h-[500px] rounded-full bg-[#6ffbbe] blur-[150px] opacity-40 animate-pulse-slow" data-anime="float"></div>
        <div class="absolute right-[-10%] top-[40%] w-[600px] h-[600px] rounded-full bg-[#4edea3] blur-[180px] opacity-25" data-anime="float-reverse"></div>
        <div class="absolute left-[30%] bottom-[-10%] w-[400px] h-[400px] rounded-full bg-[#3bd58f] blur-[130px] opacity-35 animate-pulse-slow" data-anime="float" style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Memanggil Komponen Navbar Global -->
    <div class="relative z-50">
        @include('components.navbar')
    </div>

    <main class="pt-28 pb-24 overflow-hidden relative z-10">
        
        <!-- Hero: Featured Article -->
        <section class="w-full max-w-[1440px] mx-auto px-6 md:px-16 mb-24 scroll-reveal">
            <div class="relative w-full h-[600px] md:h-[716px] overflow-hidden group rounded-2xl">
                <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="Tekstil masa depan" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0qKE4XvL-enRXQSeBiC4-4mzmYxP-WvaY8GsWNaqyhvxPVnZ4e8p_-RyzzW4J1QBTAkFmnRAJrqrYeTBPpsZE1Qcquxtc4qjqsvsnaP5kwCdWc8z_QXYBFUxVsrEm4Yeh9KXLqeF2zFB0ERrwztbPVYrAlcXJpTdiPCebbXOO5ZGt59y6QiBO8hs-WCsalgiMsa3S07MDVzRqUxuQNZgQE7sYFCw7sxxb7HgBQkINoWlNYmd0CV9n-eJUBvvH5fLEHmnm-7Qw3vbh"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-90"></div>
                
                <div class="absolute bottom-0 left-0 p-8 md:p-12 max-w-3xl">
                    <span class="inline-flex items-center gap-2 px-3 py-1 bg-primary/10 text-primary border border-primary/30 text-xs font-bold uppercase tracking-widest mb-6">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Utama
                    </span>
                    <h1 class="font-display-lg text-4xl md:text-6xl text-white mb-6 leading-tight font-bold tracking-tighter">
                        Masa Depan Tekstil: <br/>Serat Jamur & Gaya Urban
                    </h1>
                    <p class="font-body-lg text-lg text-gray-300 mb-8 line-clamp-2 md:line-clamp-none">
                        Eksplorasi mendalam tentang bagaimana biomaterial mengubah lanskap streetwear modern tanpa mengorbankan estetika agresif yang kita cintai.
                    </p>
                    <button class="group flex items-center space-x-3 text-primary text-sm font-bold tracking-widest uppercase hover:text-white transition-colors">
                        <span>Baca Selengkapnya</span>
                        <span class="material-symbols-outlined transition-transform group-hover:translate-x-2">arrow_forward</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Categories Filter -->
        <section class="w-full max-w-[1440px] mx-auto px-6 md:px-16 mb-12 overflow-x-auto scroll-reveal">
            <div class="flex space-x-8 border-b border-[#1A2E26]/10 pb-4 min-w-max">
                <button class="text-primary text-sm font-bold uppercase tracking-widest border-b-2 border-primary pb-4">Semua Cerita</button>
                <button class="text-[#1A2E26]/60 hover:text-[#1A2E26] text-sm font-bold uppercase tracking-widest pb-4 transition-colors">Inovasi</button>
                <button class="text-[#1A2E26]/60 hover:text-[#1A2E26] text-sm font-bold uppercase tracking-widest pb-4 transition-colors">Gaya Hidup</button>
                <button class="text-[#1A2E26]/60 hover:text-[#1A2E26] text-sm font-bold uppercase tracking-widest pb-4 transition-colors">Di Balik Desain</button>
            </div>
        </section>

        <!-- Article Grid -->
        <section class="w-full max-w-[1440px] mx-auto px-6 md:px-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
            
            <!-- Card 1 -->
            <article class="flex flex-col group cursor-pointer scroll-reveal glass-card rounded-[2rem] p-5 hover:-translate-y-3 transition-all duration-500 hover:shadow-[0_20px_50px_rgba(78,222,163,0.2)] hover:border-[#4edea3]/40" style="transition-delay: 100ms;">
                <div class="relative aspect-[4/5] mb-6 overflow-hidden rounded-[1.5rem] bg-black/50">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkJwjK4gowdKuzc7DCxxVcwR4jJaDHwJ16vzALVTg1sqDouitgJUppOYBnUtrXVW2-hcyQfkCF0Q4U8mThCcrJbS_9oxSvpEoqaZ8LFr3hxi5ZspDcGOdFIg8A6Tkblbizk59I4nIfmGNRsZ5we0MreDW2-toYm-SxYdXPZlbYByGvNrAJ-Mrktq9YIdLCwNmuivXEk8f3Uw5IeJvfISpo3mT3kP9bAq_LU9T6ItSlOWB2WD3jL8I1uU6OkOVL60yMjeZCsmOYiq8a"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-50 group-hover:opacity-80 transition-opacity duration-500"></div>
                    <div class="absolute top-4 left-4 bg-white/60 backdrop-blur-md px-3 py-1.5 text-[10px] text-[#1A2E26] uppercase tracking-widest font-black rounded-full border border-white/80 shadow-[0_4px_15px_rgba(98,124,112,0.1)]">Gaya Hidup</div>
                </div>
                <div class="flex items-center space-x-2 text-[#1A2E26]/70 text-xs mb-3 px-2">
                    <span class="font-bold tracking-widest text-primary/70">12 Okt {{ date('Y') }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-500"></span>
                    <span class="tracking-widest">5 mnt baca</span>
                </div>
                <h3 class="font-headline-sm text-xl font-bold mb-3 text-[#1A2E26] group-hover:text-primary transition-colors px-2 drop-shadow-sm tracking-wider">Panduan Merawat Pakaian Organik</h3>
                <p class="font-body-md text-[#1A2E26]/70 text-sm mb-6 line-clamp-3 leading-relaxed px-2">
                    Memastikan koleksi favorit Anda bertahan seumur hidup dengan teknik pembersihan yang ramah lingkungan dan preservasi serat alami.
                </p>
                <a class="mt-auto flex items-center space-x-2 text-primary text-xs font-black uppercase tracking-[0.2em] group-hover:text-[#1A2E26] transition-colors px-2" href="#">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-[16px] group-hover:translate-x-2 transition-transform">arrow_forward</span>
                </a>
            </article>

            <!-- Card 2 -->
            <article class="flex flex-col group cursor-pointer scroll-reveal glass-card rounded-[2rem] p-5 hover:-translate-y-3 transition-all duration-500 hover:shadow-[0_20px_50px_rgba(78,222,163,0.2)] hover:border-[#4edea3]/40" style="transition-delay: 200ms;">
                <div class="relative aspect-[4/5] mb-6 overflow-hidden rounded-[1.5rem] bg-black/50">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAISxLpG_DyaUkho_0rUeJJ5MrPkgxj8bshlzaj6BOGanVvHibRFDcr6pVYvrefcwms-ly7VGhWHIDsGdOwykOyCpxbSHnvt46VO7maLSm-570Q15a2pWB2SUn_xtpuC9OVuadVoaMhaCEkgnlOb0odQBsqjvhAR3BPXghbJyQLNeOStiEcgW-_kKV1ymIfmE7QEAwpJAkqnRYnivuk0fw6QRLswljTEgr13DMFj-IoYVIo6QIpEIl8gB2XiZp0GGq521MiUsWtDxjh"/>
                    <div class="absolute top-4 left-4 bg-white/60 backdrop-blur-md px-3 py-1 text-[10px] text-[#1A2E26] uppercase tracking-widest font-bold rounded">Inovasi</div>
                </div>
                <div class="flex items-center space-x-2 text-[#1A2E26]/70 text-xs mb-3">
                    <span>08 Okt {{ date('Y') }}</span>
                    <span class="w-1 h-1 rounded-full bg-[#1A2E26]/50"></span>
                    <span>8 mnt baca</span>
                </div>
                <h3 class="font-headline-sm text-2xl font-bold mb-3 text-[#1A2E26] group-hover:text-primary transition-colors">Evolusi Streetwear di Jakarta</h3>
                <p class="font-body-md text-[#1A2E26]/70 text-sm mb-6 line-clamp-3 leading-relaxed">
                    Melihat kembali bagaimana budaya urban ibu kota beradaptasi dengan gerakan keberlanjutan global tanpa kehilangan identitas lokalnya.
                </p>
                <a class="mt-auto flex items-center space-x-2 text-primary text-xs font-bold uppercase tracking-wider group-hover:underline" href="#">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
            </article>

            <!-- Card 3 -->
            <article class="flex flex-col group cursor-pointer scroll-reveal glass-card rounded-[2rem] p-5 hover:-translate-y-3 transition-all duration-500 hover:shadow-[0_20px_50px_rgba(78,222,163,0.2)] hover:border-[#4edea3]/40" style="transition-delay: 300ms;">
                <div class="relative aspect-[4/5] mb-6 overflow-hidden rounded-[1.5rem] bg-black/50">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxZkm2vb2egqNeIzf-Z7UZbPL5nhTaG60xOz8D1wrSD9bG-U8FEKkH9Km8mtyPNHNIQ0iJ0taP4505o1tyBhKpNe5LhereEBBfG4Y-JcEvTM0OB0q1LXnhrxJpSdDH7BfDlwb4CtNdY0akoXpQR6y-aUxRz6KK1jxcdCJQwc5PjCMMsViUc3k008s2LLJFyEywd_SRECeXW9Q4U2ybIas8R1cNFdHMpE8FZ2lVxWYwwzTP15udD3cozTDzmWLy4MgfzhGFHthJWbrE"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-50 group-hover:opacity-80 transition-opacity duration-500"></div>
                    <div class="absolute top-4 left-4 bg-white/60 backdrop-blur-md px-3 py-1.5 text-[10px] text-[#1A2E26] uppercase tracking-widest font-black rounded-full border border-white/80 shadow-[0_4px_15px_rgba(98,124,112,0.1)]">Di Balik Desain</div>
                </div>
                <div class="flex items-center space-x-2 text-[#1A2E26]/70 text-xs mb-3 px-2">
                    <span class="font-bold tracking-widest text-primary/70">05 Okt {{ date('Y') }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-500"></span>
                    <span class="tracking-widest">6 mnt baca</span>
                </div>
                <h3 class="font-headline-sm text-xl font-bold mb-3 text-[#1A2E26] group-hover:text-primary transition-colors px-2 drop-shadow-sm tracking-wider">Mengapa Transparansi Penting</h3>
                <p class="font-body-md text-[#1A2E26]/70 text-sm mb-6 line-clamp-3 leading-relaxed px-2">
                    Mengupas rantai pasokan XDrew Fashion dan mengapa mengetahui asal usul pakaian Anda adalah langkah awal menuju konsumsi yang lebih sadar.
                </p>
                <a class="mt-auto flex items-center space-x-2 text-primary text-xs font-black uppercase tracking-[0.2em] group-hover:text-[#1A2E26] transition-colors px-2" href="#">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-[16px] group-hover:translate-x-2 transition-transform">arrow_forward</span>
                </a>
            </article>
        </section>

        <!-- Newsletter / CTA Section -->
        <section class="w-full max-w-[1440px] mx-auto px-6 md:px-16 mb-24">
            <div class="glass-card rounded-[2rem] p-10 md:p-16 flex flex-col md:flex-row items-center justify-between gap-12 overflow-hidden relative scroll-reveal shadow-[0_30px_60px_rgba(0,0,0,0.8),inset_0_1px_2px_rgba(255,255,255,0.2)]">
                <!-- Dekorasi Latar Belakang -->
                <div class="absolute -right-24 -top-24 w-96 h-96 bg-primary/20 rounded-full blur-[100px] pointer-events-none"></div>
                
                <div class="relative z-10 max-w-xl text-center md:text-left">
                    <h2 class="font-headline-md text-3xl md:text-4xl font-black mb-4 text-[#1A2E26] uppercase tracking-tighter drop-shadow-sm">Dapatkan Cerita Terbaru</h2>
                    <p class="font-body-md text-[#1A2E26]/70 text-sm leading-relaxed tracking-wider">Langganan jurnal kami untuk mendapatkan insight mingguan tentang fashion berkelanjutan dan rilis koleksi khusus.</p>
                </div>
                
                <div class="relative z-10 w-full md:w-auto">
                    <form class="flex flex-col sm:flex-row gap-0 sm:gap-2">
                        <input class="w-full sm:w-80 bg-white/60 backdrop-blur-md border border-white/60 rounded-full sm:rounded-l-full sm:rounded-r-none px-6 py-4 focus:border-[#10b981]/50 focus:shadow-[0_4px_15px_rgba(78,222,163,0.2)] outline-none text-[#1A2E26] placeholder:text-[#1A2E26]/50 text-xs tracking-widest transition-all shadow-[inset_0_2px_4px_rgba(0,0,0,0.05)]" placeholder="ALAMAT EMAIL ANDA" type="email"/>
                        <button class="mt-4 sm:mt-0 w-full sm:w-auto bg-[#10b981] text-white shadow-[0_4px_15px_rgba(78,222,163,0.3)] rounded-full sm:rounded-r-full sm:rounded-l-none px-8 py-4 font-black text-xs uppercase tracking-[0.2em] hover:bg-[#1A2E26] hover:text-white hover:scale-105 transition-all whitespace-nowrap">GABUNG</button>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <!-- Memanggil Komponen Footer Global -->
    @include('components.footer')

    <script>
        // Logika Scroll Reveal yang sama dengan halaman lain untuk konsistensi
        document.addEventListener('DOMContentLoaded', () => {
            const scrollObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        scrollObserver.unobserve(entry.target);
                    }
                });
            }, { 
                threshold: 0.1, 
                rootMargin: "0px 0px -50px 0px" 
            });

            document.querySelectorAll('.scroll-reveal').forEach(el => {
                scrollObserver.observe(el);
            });
        });
    </script>
</body>
</html>