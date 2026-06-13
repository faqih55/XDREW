<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>XDrew Fashion | Streetwear Beretika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Inter:wght@300;400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <style>
        @font-face {
            font-family: 'Material Symbols Outlined';
            font-style: normal;
        }
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
        
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0e1511;
        }
        ::-webkit-scrollbar-thumb {
            background: #1a211d;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #4edea3;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .emerald-glow:hover {
            box-shadow: 0 0 20px rgba(78, 222, 163, 0.2);
        }

        @keyframes pulse-emerald {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        .animate-pulse-slow {
            animation: pulse-emerald 3s infinite;
        }
    </style>
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "on-tertiary": "#650911",
                      "on-secondary": "#213145",
                      "on-surface-variant": "#bbcabf",
                      "inverse-surface": "#dde4dd",
                      "surface-container": "#1a211d",
                      "surface-container-highest": "#2f3632",
                      "surface-variant": "#2f3632",
                      "surface-bright": "#343b36",
                      "on-surface": "#dde4dd",
                      "secondary": "#b7c8e1",
                      "background": "#0e1511",
                      "surface-dim": "#0e1511",
                      "error-container": "#93000a",
                      "primary-container": "#10b981",
                      "on-secondary-container": "#a9bad3",
                      "outline": "#86948a",
                      "surface-container-high": "#242c27",
                      "on-background": "#dde4dd",
                      "on-primary-fixed-variant": "#005236",
                      "on-tertiary-fixed-variant": "#842225",
                      "on-tertiary-fixed": "#410005",
                      "surface-tint": "#4edea3",
                      "tertiary-fixed-dim": "#ffb3af",
                      "secondary-container": "#3a4a5f",
                      "primary-fixed-dim": "#4edea3",
                      "on-tertiary-container": "#711419",
                      "surface-container-low": "#161d19",
                      "tertiary-fixed": "#ffdad7",
                      "on-error": "#690005",
                      "tertiary": "#ffb3af",
                      "secondary-fixed": "#d3e4fe",
                      "on-secondary-fixed": "#0b1c30",
                      "surface-container-lowest": "#09100c",
                      "inverse-on-surface": "#2b322d",
                      "surface": "#0e1511",
                      "on-secondary-fixed-variant": "#38485d",
                      "on-error-container": "#ffdad6",
                      "primary": "#4edea3",
                      "on-primary-fixed": "#002113",
                      "primary-fixed": "#6ffbbe",
                      "inverse-primary": "#006c49",
                      "on-primary": "#003824",
                      "tertiary-container": "#fc7c78",
                      "outline-variant": "#3c4a42",
                      "on-primary-container": "#00422b",
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
                      "body-md": ["Inter"],
                      "headline-sm": ["Montserrat"],
                      "display-lg": ["Montserrat"],
                      "caption": ["Inter"],
                      "body-lg": ["Inter"],
                      "headline-md": ["Montserrat"],
                      "label-md": ["Inter"],
                      "display-lg-mobile": ["Montserrat"]
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
    <!-- Alpine.js untuk animasi Navbar -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary/30 scroll-smooth">

    <!-- Navbar -->
    <header class="fixed top-0 w-full z-50 bg-surface/70 dark:bg-surface/70 backdrop-blur-xl border-b border-white/10 shadow-sm transition-all duration-300 ease-in-out">
@include('components.navbar')
</header>
    <main>
    <section class="relative min-h-screen flex items-center pt-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover object-center brightness-50" data-alt="A cinematic portrait of a model wearing a high-quality minimalist emerald green sustainable hoodie. The model stands against a dark, industrial urban background with subtle moody lighting that emphasizes the fabric texture and premium streetwear aesthetic. The lighting is low-key with cool teal highlights, creating a sophisticated and atmospheric fashion mood consistent with luxury sustainable branding." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8kI1VYaSFn5BNdwN3LSYnutowsNtiEl0rmmwyprgBoic1Dg-obIe3OKWt-VevB9ExCHAa0n1jGQUczjLP4166Zh8kvp5bDtLQIYkq-5RKtGSmGob1SOZxWixRmPYgaIUbfbNL8lqoUczG_eDU-lIllbU5GQEcO_7C4QS69FSUiXrDDs7EoxKfb4-XW9lQCKw88A8ro5qMxp0OkzcxnB863-X5hKha_lpN0G-c1QAoUKX8-1YT8t3H1DPNtyYFf1JxRSuYWKNaA3DE"/>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-background/20 to-background">
        </div>
        </div>
        <div class="relative z-10 px-margin-desktop w-full max-w-[1440px] mx-auto">
            <div class="max-w-2xl space-y-md">
                <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg uppercase leading-tight">
                                        CONSCIOUSLY <br/> CRAFTED <br/> <span class="text-primary">&amp; SWEATWEAR</span>
                </h1>
                        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">
                                        Bahan ramah lingkungan, Minimalisme modern, Kualitas premium Dan Didesain oleh Sang Engineer Mr. Muhamad Fakih.
                                    </p>
                <div class="pt-sm">
                    <a href="{{ url('/produk') }}">
                            <button class="group relative px-10 py-4 bg-primary text-black font-bold tracking-widest uppercase hover:scale-105 transition-all duration-300 emerald-glow">
                                Koleksi
                                            <div class="absolute -inset-1 border border-primary/30 group-hover:-inset-2 transition-all duration-500 rounded-sm"></div>
                    </button>
                </div>
            </div>
         </div>
                <!-- Scroll Indicator -->
                <div class="absolute bottom-md left-1/2 -translate-x-1/2 flex flex-col items-center gap-xs">
                <span class="font-caption text-caption text-outline uppercase tracking-widest">Gulir</span>
                <div class="w-[1px] h-12 bg-gradient-to-b from-primary to-transparent animate-pulse-slow"></div>
                </div>     
                <!-- Tombol -->
        </section>
        <section class="py-16 bg-[#0e1511]">
    <div class="px-10 w-full max-w-[1440px] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="p-lg glass-card flex flex-col items-start gap-sm hover:translate-y-[-8px] transition-transform duration-300">
<span class="material-symbols-outlined text-primary text-[40px]">eco</span>
<h3 class="font-headline-sm text-headline-sm uppercase">Kapas Organik</h3>
<p class="text-on-surface-variant font-body-md">Gak pakai bahan kimia aneh-aneh. Kapas murni dari tanah yang dirawat sepenuh hati, biar alam dan petaninya tetap happy.</p>
</div>

            <div class="p-lg glass-card flex flex-col items-start gap-sm hover:translate-y-[-8px] transition-transform duration-300">
<span class="material-symbols-outlined text-primary text-[40px]">recycling</span>
<h3 class="font-headline-sm text-headline-sm uppercase">Kain Daur Ulang</h3>
<p class="text-on-surface-variant font-body-md">Bukan cuma soal keren, tapi soal repurposing. Limbah diolah jadi gear berkualitas yang siap nemenin aktivitas harian lo.</p>
</div>

            <div class="p-lg glass-card flex flex-col items-start gap-sm hover:translate-y-[-8px] transition-transform duration-300">
                <span class="material-symbols-outlined text-[#4edea3] text-4xl mb-4">handshake</span>
                <h3 class="font-black text-white uppercase text-xl mb-3">PERDAGANGAN ADIL</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Kita fair dari awal. Transparan soal siapa yang bikin baju lo, biar semua orang dapat haknya dan kerja dengan aman.</p>
            </div>

        </div>
    </div>
</section>
        
            <!-- Categories: Visual Blocks -->
            <section class="py-xl bg-surface-container-lowest">
            <div class="px-margin-desktop w-full max-w-[1440px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-gutter h-[600px]">
            <div class="group relative overflow-hidden h-full cursor-pointer">
            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 brightness-75" data-alt="Close up shot of a high-quality white organic cotton T-shirt hanging in a minimalist studio. The lighting is soft and neutral, showcasing the premium fabric weave and clean construction. The aesthetic is modern and architectural, suitable for a luxury streetwear brand's category visual." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-Eo3DFkyBbMXapfbzePyG1ShZ10Vaygf0MTjx5sXYmjFC7561xwRArpD8jV_0ptcqCxAsvj8Hct7jm1CqUKXOD7H1C02IIkwx-d0XarcFV2l6CcgZ-Z1wD6kgC4fDULgp3z8E6R4mKIFfZNZoWS72aiUGayRM0k-gUDaywlqO7ied9qAchakjbh3Kxdm3AtVi8hZXFnWQOl537hEBHpaWJNbG4nmGqRDkq06mCqxtuKD4cZTP8B-BMNS2Cb--0DpPkc_oyRLH94sh"/>
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors duration-300"></div>
            <div class="absolute bottom-lg left-lg">
            <h2 class="font-display-lg text-headline-md text-white uppercase mb-xs">Kaos</h2>
            <span class="text-primary font-label-md tracking-widest border-b border-primary pb-1">JELAJAHI</span>
            </div>
            </div>
            <div class="group relative overflow-hidden h-full cursor-pointer">
            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 brightness-75" data-alt="A stylish black sustainable hoodie with thick premium fabric texture. The shot is editorial and modern, focusing on the silhouette and construction. The dark-themed studio lighting creates deep shadows and crisp highlights, reflecting a high-end streetwear identity." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8ePTZUIOYVsb0ScDbDgyzWyF1klHG8Xi42XMeR4VJjYL8Atr5LfBWUCoBrJEVTYaQHVXM_5ae_qtEzOoz2zGNAQaUY-DaFnmF-pLhCYFsU2YotwrkglkTGcK1yxwab95tCwCmZvFsLA99fzJ5E9hl1EMsoPRdmyrcwg-cwtjDe7ytPYoiRbKkM-VEtTY0wrdpfQbVbB_Uy6pkrCPfyRlbX9qHwSzO31x44AEti-Q6UoEt7B7e6kOIpB0dN2MLUHrYxvwVb7-ymsO1"/>
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors duration-300"></div>
            <div class="absolute bottom-lg left-lg">
            <h2 class="font-display-lg text-headline-md text-white uppercase mb-xs">Hoodie</h2>
            <span class="text-primary font-label-md tracking-widest border-b border-primary pb-1">JELAJAHI</span>
            </div>
            </div>
            <div class="group relative overflow-hidden h-full cursor-pointer">
            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 brightness-75" data-alt="Editorial fashion photography of dark olive green recycled cargo pants worn by a model. The setting is urban and technical with concrete textures. High-contrast lighting highlights the utilitarian details, pockets, and stitching of the sustainable garment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRLRIfKc5EgwBtOdpPQyFKHqnXPTtPT--ChRqNBdNwjYCpe7PAI1NpSlofC-fdS11gKFHtfUxxgzq8LV45qOrQKltpTep33ZkddCqWORJcrbMAC5ASABHzARNMT7RkZCEvMbsOPRbZJ6OJGJewf8KQMurIkFWxFGXcw4evw_qOiOlClP70YnogW-KmYlYgUNpwuyzISj2YqQ3nFUZrpQ3kpG1OSBeZgIPM8TwEk6ffWYBHdTgsrTfBkgzwfJR8VasxrCpZDEnHNbWL"/>
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors duration-300"></div>
            <div class="absolute bottom-lg left-lg">
            <h2 class="font-display-lg text-headline-md text-white uppercase mb-xs">Cargo</h2>
            <span class="text-primary font-label-md tracking-widest border-b border-primary pb-1">JELAJAHI</span>
            </div>
            </div>
            </div>
            </section>
        <!-- Produk Esensial (Dinamis dari Oracle) -->
        <section class="py-20 px-10 max-w-[1440px] mx-auto">
            <h2 class="font-display-lg text-headline-md uppercase">Produk Esensial</h2> <br>
            <p class="text-on-surface-variant font-body-md mt-xs">Dirancang dengan teliti, dibuat secara berkelanjutan.</p> <br> <br>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach(\App\Models\Produk::limit(4)->get() as $p)
                    <div class="group bg-[#1a211d] p-4 rounded-lg hover:scale-[1.02] transition-all emerald-glow">
                        <div class="aspect-[3/4] overflow-hidden rounded mb-4 bg-gray-800">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform" 
                                 src="{{ asset('images/' . $p->foto) }}" 
                                 alt="{{ $p->nama_produk }}"/>
                        </div>
                        <h3 class="font-bold uppercase text-sm mb-1">{{ $p->nama_produk }}</h3>
                        <p class="text-[#4edea3] font-black text-lg">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
        </section>

<!-- Newsletter Section -->
<section class="py-xl bg-surface-container-lowest">
<div class="px-margin-desktop w-full max-w-[800px] mx-auto text-center border-y border-outline-variant/30 py-xl">
<h2 class="font-display-lg text-headline-md uppercase mb-sm">Bergabung dengan Kolektif</h2>
<p class="text-on-surface-variant font-body-md mb-xl">Berlangganan untuk akses eksklusif ke peluncuran koleksi terbaru, jurnal keberlanjutan, dan diskon 10% untuk pesanan pertama Anda.</p>
<form class="flex flex-col md:flex-row gap-sm">
<input class="flex-1 bg-surface border border-outline-variant px-md py-sm focus:outline-none focus:border-primary transition-colors text-label-md uppercase tracking-widest placeholder:text-outline" placeholder="ALAMAT EMAIL ANDA" type="email"/>
<button class="bg-primary text-on-primary px-xl py-sm font-label-md text-label-md tracking-widest uppercase hover:opacity-90 transition-opacity whitespace-nowrap" type="submit">Berlangganan</button>
</form>
</div>
</section>
</main>
<!-- Footer -->
@include('components.footer')
<script>
        // Smooth header animation on scroll
        const header = document.querySelector('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('py-xs', 'shadow-lg');
                header.classList.remove('py-sm');
            } else {
                header.classList.add('py-sm');
                header.classList.remove('py-xs', 'shadow-lg');
            }
        });

        // Simple revealing animation for sections
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                }
            });
        }, observerOptions);

        document.querySelectorAll('section').forEach(section => {
            section.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
            observer.observe(section);
        });
    </script>
</body>
</html>