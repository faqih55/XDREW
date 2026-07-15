@extends('layouts.Front')

@section('title', 'Jurnal')

@section('content')
<div class="pt-28 pb-24 overflow-hidden">

        
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
                <button class="text-[#0A1612]/60 hover:text-[#0A1612] text-sm font-bold uppercase tracking-widest pb-4 transition-colors">Inovasi</button>
                <button class="text-[#0A1612]/60 hover:text-[#0A1612] text-sm font-bold uppercase tracking-widest pb-4 transition-colors">Gaya Hidup</button>
                <button class="text-[#0A1612]/60 hover:text-[#0A1612] text-sm font-bold uppercase tracking-widest pb-4 transition-colors">Di Balik Desain</button>
            </div>
        </section>

        <!-- Article Grid -->
        <section class="w-full max-w-[1440px] mx-auto px-6 md:px-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
            
            <!-- Card 1 -->
            <article class="flex flex-col group cursor-pointer scroll-reveal glass-card rounded-[2rem] p-5 hover:-translate-y-3 transition-all duration-500 hover:shadow-[0_20px_50px_rgba(78,222,163,0.2)] hover:border-[#4edea3]/40" style="transition-delay: 100ms;">
                <div class="relative aspect-[4/5] mb-6 overflow-hidden rounded-[1.5rem] bg-black/50">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkJwjK4gowdKuzc7DCxxVcwR4jJaDHwJ16vzALVTg1sqDouitgJUppOYBnUtrXVW2-hcyQfkCF0Q4U8mThCcrJbS_9oxSvpEoqaZ8LFr3hxi5ZspDcGOdFIg8A6Tkblbizk59I4nIfmGNRsZ5we0MreDW2-toYm-SxYdXPZlbYByGvNrAJ-Mrktq9YIdLCwNmuivXEk8f3Uw5IeJvfISpo3mT3kP9bAq_LU9T6ItSlOWB2WD3jL8I1uU6OkOVL60yMjeZCsmOYiq8a"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-50 group-hover:opacity-80 transition-opacity duration-500"></div>
                    <div class="absolute top-4 left-4 bg-white/60 backdrop-blur-md px-3 py-1.5 text-[10px] text-[#0A1612] uppercase tracking-widest font-black rounded-full border border-white/80 shadow-[0_4px_15px_rgba(98,124,112,0.1)]">Gaya Hidup</div>
                </div>
                <div class="flex items-center space-x-2 text-[#0A1612]/70 text-xs mb-3 px-2">
                    <span class="font-bold tracking-widest text-primary/70">12 Okt {{ date('Y') }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-500"></span>
                    <span class="tracking-widest">5 mnt baca</span>
                </div>
                <h3 class="font-headline-sm text-xl font-bold mb-3 text-[#0A1612] group-hover:text-primary transition-colors px-2 drop-shadow-sm tracking-wider">Panduan Merawat Pakaian Organik</h3>
                <p class="font-body-md text-[#0A1612]/70 text-sm mb-6 line-clamp-3 leading-relaxed px-2">
                    Memastikan koleksi favorit Anda bertahan seumur hidup dengan teknik pembersihan yang ramah lingkungan dan preservasi serat alami.
                </p>
                <a class="mt-auto flex items-center space-x-2 text-primary text-xs font-black uppercase tracking-[0.2em] group-hover:text-[#0A1612] transition-colors px-2" href="#">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-[16px] group-hover:translate-x-2 transition-transform">arrow_forward</span>
                </a>
            </article>

            <!-- Card 2 -->
            <article class="flex flex-col group cursor-pointer scroll-reveal glass-card rounded-[2rem] p-5 hover:-translate-y-3 transition-all duration-500 hover:shadow-[0_20px_50px_rgba(78,222,163,0.2)] hover:border-[#4edea3]/40" style="transition-delay: 200ms;">
                <div class="relative aspect-[4/5] mb-6 overflow-hidden rounded-[1.5rem] bg-black/50">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAISxLpG_DyaUkho_0rUeJJ5MrPkgxj8bshlzaj6BOGanVvHibRFDcr6pVYvrefcwms-ly7VGhWHIDsGdOwykOyCpxbSHnvt46VO7maLSm-570Q15a2pWB2SUn_xtpuC9OVuadVoaMhaCEkgnlOb0odQBsqjvhAR3BPXghbJyQLNeOStiEcgW-_kKV1ymIfmE7QEAwpJAkqnRYnivuk0fw6QRLswljTEgr13DMFj-IoYVIo6QIpEIl8gB2XiZp0GGq521MiUsWtDxjh"/>
                    <div class="absolute top-4 left-4 bg-white/60 backdrop-blur-md px-3 py-1 text-[10px] text-[#0A1612] uppercase tracking-widest font-bold rounded">Inovasi</div>
                </div>
                <div class="flex items-center space-x-2 text-[#0A1612]/70 text-xs mb-3">
                    <span>08 Okt {{ date('Y') }}</span>
                    <span class="w-1 h-1 rounded-full bg-[#1A2E26]/50"></span>
                    <span>8 mnt baca</span>
                </div>
                <h3 class="font-headline-sm text-2xl font-bold mb-3 text-[#0A1612] group-hover:text-primary transition-colors">Evolusi Streetwear di Jakarta</h3>
                <p class="font-body-md text-[#0A1612]/70 text-sm mb-6 line-clamp-3 leading-relaxed">
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
                    <div class="absolute top-4 left-4 bg-white/60 backdrop-blur-md px-3 py-1.5 text-[10px] text-[#0A1612] uppercase tracking-widest font-black rounded-full border border-white/80 shadow-[0_4px_15px_rgba(98,124,112,0.1)]">Di Balik Desain</div>
                </div>
                <div class="flex items-center space-x-2 text-[#0A1612]/70 text-xs mb-3 px-2">
                    <span class="font-bold tracking-widest text-primary/70">05 Okt {{ date('Y') }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-500"></span>
                    <span class="tracking-widest">6 mnt baca</span>
                </div>
                <h3 class="font-headline-sm text-xl font-bold mb-3 text-[#0A1612] group-hover:text-primary transition-colors px-2 drop-shadow-sm tracking-wider">Mengapa Transparansi Penting</h3>
                <p class="font-body-md text-[#0A1612]/70 text-sm mb-6 line-clamp-3 leading-relaxed px-2">
                    Mengupas rantai pasokan XDrew Fashion dan mengapa mengetahui asal usul pakaian Anda adalah langkah awal menuju konsumsi yang lebih sadar.
                </p>
                <a class="mt-auto flex items-center space-x-2 text-primary text-xs font-black uppercase tracking-[0.2em] group-hover:text-[#0A1612] transition-colors px-2" href="#">
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
                    <h2 class="font-headline-md text-3xl md:text-4xl font-black mb-4 text-[#0A1612] uppercase tracking-tighter drop-shadow-sm">Dapatkan Cerita Terbaru</h2>
                    <p class="font-body-md text-[#0A1612]/70 text-sm leading-relaxed tracking-wider">Langganan jurnal kami untuk mendapatkan insight mingguan tentang fashion berkelanjutan dan rilis koleksi khusus.</p>
                </div>
                
                <div class="relative z-10 w-full md:w-auto">
                    <form class="flex flex-col sm:flex-row gap-0 sm:gap-2">
                        <input class="w-full sm:w-80 bg-white/60 backdrop-blur-md border border-white/60 rounded-full sm:rounded-l-full sm:rounded-r-none px-6 py-4 focus:border-[#10b981]/50 focus:shadow-[0_4px_15px_rgba(78,222,163,0.2)] outline-none text-[#0A1612] placeholder:text-[#0A1612]/50 text-xs tracking-widest transition-all shadow-[inset_0_2px_4px_rgba(0,0,0,0.05)]" placeholder="ALAMAT EMAIL ANDA" type="email"/>
                        <button class="mt-4 sm:mt-0 w-full sm:w-auto bg-[#10b981] text-white shadow-[0_4px_15px_rgba(78,222,163,0.3)] rounded-full sm:rounded-r-full sm:rounded-l-none px-8 py-4 font-black text-xs uppercase tracking-[0.2em] hover:bg-[#1A2E26] hover:text-white hover:scale-105 transition-all whitespace-nowrap">GABUNG</button>
                    </form>
                </div>
            </div>
        </section>

    
</div>
@endsection


@push('styles')
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
        ::-webkit-scrollbar-track { background: #F9FAFB; }
        ::-webkit-scrollbar-thumb { background: #CBE3D9; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #4edea3; }

        .glass-card {
            background: #ffffff !important;
            backdrop-filter: blur(24px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(24px) saturate(180%) !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
            border-top: 1px solid rgba(255, 255, 255, 1) !important;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.08),
                0 1px 3px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 1) !important;
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
        [] { animation: float-slow 6s ease-in-out infinite; }
        [] { animation: float-reverse-slow 7s ease-in-out infinite; }
    </style>
@endpush


@push('scripts')
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
@endpush
