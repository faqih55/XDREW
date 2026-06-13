<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Jurnal | XDrew Fashion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Inter:wght@300;400;500&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Alpine.js untuk Navbar -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
            border-color: rgba(16, 185, 129, 0.4);
        }
        [x-cloak] { display: none !important; }
        
        /* Animasi Scroll Reveal */
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
    </style>
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#4edea3",
                        "background": "#0e1511",
                        "on-background": "#dde4dd",
                        "surface": "#0e1511",
                        "on-surface": "#dde4dd",
                        "surface-container-low": "#161d19",
                        "surface-container": "#1a211d",
                        "surface-container-highest": "#2f3632",
                        "on-surface-variant": "#bbcabf",
                        "outline": "#86948a"
                    },
                    "fontFamily": {
                        "headline-sm": ["Montserrat"],
                        "headline-md": ["Montserrat"],
                        "display-lg": ["Montserrat"],
                        "caption": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-md": ["Inter"]
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-background text-on-background selection:bg-primary selection:text-black">

    <!-- Memanggil Komponen Navbar Global -->
    @include('components.navbar')

    <main class="pt-28 pb-24 overflow-hidden">
        
        <!-- Hero: Featured Article -->
        <section class="w-full max-w-[1440px] mx-auto px-6 md:px-16 mb-24 scroll-reveal">
            <div class="relative w-full h-[600px] md:h-[716px] overflow-hidden group rounded-2xl">
                <img class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" data-alt="Tekstil masa depan" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0qKE4XvL-enRXQSeBiC4-4mzmYxP-WvaY8GsWNaqyhvxPVnZ4e8p_-RyzzW4J1QBTAkFmnRAJrqrYeTBPpsZE1Qcquxtc4qjqsvsnaP5kwCdWc8z_QXYBFUxVsrEm4Yeh9KXLqeF2zFB0ERrwztbPVYrAlcXJpTdiPCebbXOO5ZGt59y6QiBO8hs-WCsalgiMsa3S07MDVzRqUxuQNZgQE7sYFCw7sxxb7HgBQkINoWlNYmd0CV9n-eJUBvvH5fLEHmnm-7Qw3vbh"/>
                <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent opacity-90"></div>
                
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
            <div class="flex space-x-8 border-b border-white/10 pb-4 min-w-max">
                <button class="text-primary text-sm font-bold uppercase tracking-widest border-b-2 border-primary pb-4">Semua Cerita</button>
                <button class="text-gray-400 hover:text-white text-sm font-bold uppercase tracking-widest pb-4 transition-colors">Inovasi</button>
                <button class="text-gray-400 hover:text-white text-sm font-bold uppercase tracking-widest pb-4 transition-colors">Gaya Hidup</button>
                <button class="text-gray-400 hover:text-white text-sm font-bold uppercase tracking-widest pb-4 transition-colors">Di Balik Desain</button>
            </div>
        </section>

        <!-- Article Grid -->
        <section class="w-full max-w-[1440px] mx-auto px-6 md:px-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
            
            <!-- Card 1 -->
            <article class="flex flex-col group cursor-pointer scroll-reveal" style="transition-delay: 100ms;">
                <div class="relative aspect-[4/5] mb-6 overflow-hidden bg-surface-container-low rounded-xl">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkJwjK4gowdKuzc7DCxxVcwR4jJaDHwJ16vzALVTg1sqDouitgJUppOYBnUtrXVW2-hcyQfkCF0Q4U8mThCcrJbS_9oxSvpEoqaZ8LFr3hxi5ZspDcGOdFIg8A6Tkblbizk59I4nIfmGNRsZ5we0MreDW2-toYm-SxYdXPZlbYByGvNrAJ-Mrktq9YIdLCwNmuivXEk8f3Uw5IeJvfISpo3mT3kP9bAq_LU9T6ItSlOWB2WD3jL8I1uU6OkOVL60yMjeZCsmOYiq8a"/>
                    <div class="absolute top-4 left-4 bg-background/80 backdrop-blur-md px-3 py-1 text-[10px] text-primary uppercase tracking-widest font-bold rounded">Gaya Hidup</div>
                </div>
                <div class="flex items-center space-x-2 text-gray-500 text-xs mb-3">
                    <span>12 Okt {{ date('Y') }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                    <span>5 mnt baca</span>
                </div>
                <h3 class="font-headline-sm text-2xl font-bold mb-3 text-white group-hover:text-primary transition-colors">Panduan Merawat Pakaian Organik</h3>
                <p class="font-body-md text-gray-400 text-sm mb-6 line-clamp-3 leading-relaxed">
                    Memastikan koleksi favorit Anda bertahan seumur hidup dengan teknik pembersihan yang ramah lingkungan dan preservasi serat alami.
                </p>
                <a class="mt-auto flex items-center space-x-2 text-primary text-xs font-bold uppercase tracking-wider group-hover:underline" href="#">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
            </article>

            <!-- Card 2 -->
            <article class="flex flex-col group cursor-pointer scroll-reveal" style="transition-delay: 200ms;">
                <div class="relative aspect-[4/5] mb-6 overflow-hidden bg-surface-container-low rounded-xl">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAISxLpG_DyaUkho_0rUeJJ5MrPkgxj8bshlzaj6BOGanVvHibRFDcr6pVYvrefcwms-ly7VGhWHIDsGdOwykOyCpxbSHnvt46VO7maLSm-570Q15a2pWB2SUn_xtpuC9OVuadVoaMhaCEkgnlOb0odQBsqjvhAR3BPXghbJyQLNeOStiEcgW-_kKV1ymIfmE7QEAwpJAkqnRYnivuk0fw6QRLswljTEgr13DMFj-IoYVIo6QIpEIl8gB2XiZp0GGq521MiUsWtDxjh"/>
                    <div class="absolute top-4 left-4 bg-background/80 backdrop-blur-md px-3 py-1 text-[10px] text-primary uppercase tracking-widest font-bold rounded">Inovasi</div>
                </div>
                <div class="flex items-center space-x-2 text-gray-500 text-xs mb-3">
                    <span>08 Okt {{ date('Y') }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                    <span>8 mnt baca</span>
                </div>
                <h3 class="font-headline-sm text-2xl font-bold mb-3 text-white group-hover:text-primary transition-colors">Evolusi Streetwear di Jakarta</h3>
                <p class="font-body-md text-gray-400 text-sm mb-6 line-clamp-3 leading-relaxed">
                    Melihat kembali bagaimana budaya urban ibu kota beradaptasi dengan gerakan keberlanjutan global tanpa kehilangan identitas lokalnya.
                </p>
                <a class="mt-auto flex items-center space-x-2 text-primary text-xs font-bold uppercase tracking-wider group-hover:underline" href="#">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
            </article>

            <!-- Card 3 -->
            <article class="flex flex-col group cursor-pointer scroll-reveal" style="transition-delay: 300ms;">
                <div class="relative aspect-[4/5] mb-6 overflow-hidden bg-surface-container-low rounded-xl">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxZkm2vb2egqNeIzf-Z7UZbPL5nhTaG60xOz8D1wrSD9bG-U8FEKkH9Km8mtyPNHNIQ0iJ0taP4505o1tyBhKpNe5LhereEBBfG4Y-JcEvTM0OB0q1LXnhrxJpSdDH7BfDlwb4CtNdY0akoXpQR6y-aUxRz6KK1jxcdCJQwc5PjCMMsViUc3k008s2LLJFyEywd_SRECeXW9Q4U2ybIas8R1cNFdHMpE8FZ2lVxWYwwzTP15udD3cozTDzmWLy4MgfzhGFHthJWbrE"/>
                    <div class="absolute top-4 left-4 bg-background/80 backdrop-blur-md px-3 py-1 text-[10px] text-primary uppercase tracking-widest font-bold rounded">Di Balik Desain</div>
                </div>
                <div class="flex items-center space-x-2 text-gray-500 text-xs mb-3">
                    <span>05 Okt {{ date('Y') }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                    <span>6 mnt baca</span>
                </div>
                <h3 class="font-headline-sm text-2xl font-bold mb-3 text-white group-hover:text-primary transition-colors">Mengapa Transparansi Penting</h3>
                <p class="font-body-md text-gray-400 text-sm mb-6 line-clamp-3 leading-relaxed">
                    Mengupas rantai pasokan XDrew Fashion dan mengapa mengetahui asal usul pakaian Anda adalah langkah awal menuju konsumsi yang lebih sadar.
                </p>
                <a class="mt-auto flex items-center space-x-2 text-primary text-xs font-bold uppercase tracking-wider group-hover:underline" href="#">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
            </article>
        </section>

        <!-- Newsletter / CTA Section -->
        <section class="w-full max-w-[1440px] mx-auto px-6 md:px-16 mb-24">
            <div class="glass-card rounded-2xl p-8 md:p-16 flex flex-col md:flex-row items-center justify-between gap-12 overflow-hidden relative scroll-reveal">
                <!-- Dekorasi Latar Belakang -->
                <div class="absolute -right-24 -top-24 w-96 h-96 bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
                
                <div class="relative z-10 max-w-xl text-center md:text-left">
                    <h2 class="font-headline-md text-3xl md:text-4xl font-bold mb-4 text-white uppercase tracking-tighter">Dapatkan Cerita Terbaru</h2>
                    <p class="font-body-md text-gray-400 text-sm leading-relaxed">Langganan jurnal kami untuk mendapatkan insight mingguan tentang fashion berkelanjutan dan rilis koleksi khusus.</p>
                </div>
                
                <div class="relative z-10 w-full md:w-auto">
                    <form class="flex flex-col sm:flex-row gap-0 sm:gap-2">
                        <input class="w-full sm:w-80 bg-white/5 border border-white/10 rounded-full sm:rounded-l-full sm:rounded-r-none px-6 py-4 focus:border-primary outline-none text-white placeholder:text-gray-500 text-xs tracking-widest transition-colors" placeholder="Alamat Email Anda" type="email"/>
                        <button class="mt-4 sm:mt-0 w-full sm:w-auto bg-primary text-black rounded-full sm:rounded-r-full sm:rounded-l-none px-8 py-4 font-bold text-xs uppercase tracking-widest hover:bg-[#3bc68f] transition-colors whitespace-nowrap">Gabung</button>
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