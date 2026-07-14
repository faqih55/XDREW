<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>XDrew Fashion | Streetwear Beretika</title>

    <!-- Optimasi Prioritas Koneksi -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://cdn.tailwindcss.com" />
    <link rel="dns-prefetch" href="https://unpkg.com" />
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net" />
    <link rel="dns-prefetch" href="https://lh3.googleusercontent.com" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transform: translateZ(0);
            will-change: transform, backdrop-filter;
        }

        .emerald-glow:hover {
            box-shadow: 0 0 20px rgba(78, 222, 163, 0.2);
        }

        @keyframes pulse-emerald {
            0%, 100% { opacity: 1; transform: translateZ(0); }
            50% { opacity: 0.7; transform: translateZ(0); }
        }
        . {
            animation: pulse-emerald 3s infinite;
            will-change: opacity;
            transform: translateZ(0);
        }

        @keyframes smoothReveal {
            from { opacity: 0; transform: translateY(15px); filter: blur(4px); }
            to { opacity: 1; transform: translateY(0); filter: blur(0); }
        }
        .animate-smooth-reveal {
            animation: smoothReveal 0.6s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }
    </style>
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "on-tertiary": "#3b0764",
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
                      "on-tertiary-fixed-variant": "#581c87",
                      "on-tertiary-fixed": "#2e1065",
                      "surface-tint": "#4edea3",
                      "tertiary-fixed-dim": "#d8b4fe",
                      "secondary-container": "#3a4a5f",
                      "primary-fixed-dim": "#4edea3",
                      "on-tertiary-container": "#f3e8ff",
                      "surface-container-low": "#161d19",
                      "tertiary-fixed": "#e9d5ff",
                      "on-error": "#690005",
                      "tertiary": "#d8b4fe",
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
                      "tertiary-container": "#a855f7",
                      "outline-variant": "#3c4a42",
                      "on-primary-container": "#00422b",
                      "secondary-fixed-dim": "#b7c8e1",
                      "error": "#ffb4ab",
                      "accent-purple": "#a855f7"
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
                      "body-md": ["Poppins"],
                      "headline-sm": ["Outfit"],
                      "display-lg": ["Outfit"],
                      "caption": ["Poppins"],
                      "body-lg": ["Poppins"],
                      "headline-md": ["Outfit"],
                      "label-md": ["Poppins"],
                      "display-lg-mobile": ["Outfit"]
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
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary/30 scroll-smooth animate-smooth-reveal">

    <!-- Background and Glows (Smooth Emerald & Violet Theme) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-30"></div>
        <div class="absolute left-[-10%] top-[20%] w-[500px] h-[500px] rounded-full bg-[#8b5cf6] blur-[160px] opacity-[0.15] "></div>
        <div class="absolute right-[-10%] top-[40%] w-[600px] h-[600px] rounded-full bg-[#4edea3] blur-[180px] opacity-[0.15]"></div>
        <div class="absolute left-[30%] bottom-[-10%] w-[400px] h-[400px] rounded-full bg-[#c4b5fd] blur-[150px] opacity-[0.15] " style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Navbar -->
    <header class="fixed top-0 w-full z-50 transition-all duration-500 ease-in-out"
            id="site-header"
            style="background: rgba(14,21,17,0.85); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">
        @include('components.navbar')
    </header>
    <main class="relative z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <script>
        // Smooth header animation on scroll
        const header = document.getElementById('site-header');
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.scrollY;
            
            if (currentScroll > 30) {
                header.style.background = 'rgba(14,21,17,0.97)';
                header.style.borderBottom = '1px solid rgba(255,255,255,0.08)';
                header.style.boxShadow = '0 4px 30px rgba(0,0,0,0.4)';
            } else {
                header.style.background = 'rgba(14,21,17,0.85)';
                header.style.borderBottom = '1px solid rgba(255,255,255,0)';
                header.style.boxShadow = 'none';
            }

            lastScroll = currentScroll;
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