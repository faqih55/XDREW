<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'XDrew Fashion')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #F9FAFB;
        }
        ::-webkit-scrollbar-thumb {
            background: #CBE3D9;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #4edea3;
        }

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
            box-shadow: 0 15px 35px rgba(78, 222, 163, 0.15) !important;
            border-color: rgba(78, 222, 163, 0.3) !important;
        }

        @keyframes pulse-emerald {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        . {
            animation: pulse-emerald 3s infinite;
        }

        /* Grid Pattern */
        .bg-grid-pattern {
            background-image: 
                linear-gradient(rgba(78, 222, 163, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(78, 222, 163, 0.04) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* Typography */
        .text-outline-dark {
            -webkit-text-stroke: 1.5px #1A2E26;
            color: transparent;
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
        [] {
            animation: float-slow 6s ease-in-out infinite;
        }
        [] {
            animation: float-reverse-slow 7s ease-in-out infinite;
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
                      "on-surface-variant": "#0A1612",
                      "inverse-surface": "#0A1612",
                      "surface-container": "#F9FAFB",
                      "surface-container-highest": "#DDF0E6",
                      "surface-variant": "#F9FAFB",
                      "surface-bright": "#F4FAF7",
                      "on-surface": "#0A1612",
                      "secondary": "#4edea3",
                      "background": "#DDF0E6",
                      "surface-dim": "#F9FAFB",
                      "error-container": "#93000a",
                      "primary-container": "#4edea3",
                      "on-secondary-container": "#0A1612",
                      "outline": "#86948a",
                      "surface-container-high": "#DDF0E6",
                      "on-background": "#0A1612",
                      "on-primary-fixed-variant": "#4edea3",
                      "on-tertiary-fixed-variant": "#581c87",
                      "on-tertiary-fixed": "#2e1065",
                      "surface-tint": "#4edea3",
                      "tertiary-fixed-dim": "#d8b4fe",
                      "secondary-container": "#F9FAFB",
                      "primary-fixed-dim": "#4edea3",
                      "on-tertiary-container": "#f3e8ff",
                      "surface-container-low": "#F4FAF7",
                      "tertiary-fixed": "#e9d5ff",
                      "on-error": "#690005",
                      "tertiary": "#d8b4fe",
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
                      "tertiary-container": "#a855f7",
                      "outline-variant": "#3c4a42",
                      "on-primary-container": "#ffffff",
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
    @stack('styles')
</head>
<body class="bg-[#F9FAFB] text-[#0A1612] font-body-md selection:bg-emerald-100 scroll-smooth relative overflow-x-hidden">

        <!-- Background and Glows (Smooth Emerald & Violet Theme) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-30"></div>
        <div class="absolute left-[-10%] top-[20%] w-[500px] h-[500px] rounded-full bg-[#8b5cf6] blur-[160px] opacity-[0.15] "></div>
        <div class="absolute right-[-10%] top-[40%] w-[600px] h-[600px] rounded-full bg-[#4edea3] blur-[180px] opacity-[0.15]"></div>
        <div class="absolute left-[30%] bottom-[-10%] w-[400px] h-[400px] rounded-full bg-[#c4b5fd] blur-[150px] opacity-[0.15] " style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Left Sidebar (Copyright) -->
    <div class="hidden lg:flex fixed left-8 bottom-24 z-20 flex-col items-center gap-6 pointer-events-none">
        <span class="font-['Outfit'] text-[10px] font-bold text-[#0A1612]/40 tracking-[0.25em] uppercase [writing-mode:vertical-lr] rotate-180">
            © {{ date('Y') }} XDREW FASHION. ALL RIGHTS RESERVED.
        </span>
        <div class="w-[1px] h-16 bg-[#1A2E26]/20"></div>
    </div>

    <!-- Navbar Wrapper -->
    <header id="site-header"
            class="fixed top-0 w-full z-50 transition-all duration-500"
            style="background: transparent;">
        @include('components.navbar')
    </header>

    
<main class="relative z-10">
    @yield('content')
</main>


    <!-- Footer -->
    @include('components.footer')

    <script>
        // ===== NAVBAR SCROLL EFFECT =====
        const header = document.getElementById('site-header');

        function updateNavbar() {
            if (window.scrollY > 60) {
                // Blur & glass effect saat scroll
                header.style.background = 'rgba(234, 243, 239, 0.85)';
                header.style.backdropFilter = 'blur(24px)';
                header.style.webkitBackdropFilter = 'blur(24px)';
                header.style.borderBottom = '1px solid rgba(78, 222, 163, 0.08)';
                header.style.boxShadow = '0 10px 30px rgba(98, 124, 112, 0.04)';
            } else {
                header.style.background = 'transparent';
                header.style.backdropFilter = 'none';
                header.style.webkitBackdropFilter = 'none';
                header.style.borderBottom = 'none';
                header.style.boxShadow = 'none';
            }
        }

        updateNavbar();
        window.addEventListener('scroll', updateNavbar, { passive: true });

        // ===== SECTION REVEAL ANIMATION =====
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                }
            });
        }, { threshold: 0.05 });

        document.querySelectorAll('section, .opacity-0.translate-y-10').forEach(el => {
            if (el.tagName.toLowerCase() === 'section') {
                el.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
            }
            observer.observe(el);
        });

        // ===== WISHLIST TOGGLE SYSTEM =====
        function toggleWishlist(productId, button) {
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            const index = wishlist.indexOf(productId);
            const icon = button.querySelector('span');
            
            if (index > -1) {
                // Remove from wishlist
                wishlist.splice(index, 1);
                icon.style.fontVariationSettings = "'FILL' 0";
                button.classList.remove('text-red-500');
                button.classList.add('text-[#0A1612]/50');
            } else {
                // Add to wishlist
                wishlist.push(productId);
                icon.style.fontVariationSettings = "'FILL' 1";
                button.classList.remove('text-[#0A1612]/50');
                button.classList.add('text-red-500');
            }
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
        }

        document.addEventListener('DOMContentLoaded', () => {
            const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            document.querySelectorAll('.wishlist-btn').forEach(button => {
                const productId = parseInt(button.getAttribute('data-id'));
                if (wishlist.includes(productId)) {
                    const icon = button.querySelector('span');
                    icon.style.fontVariationSettings = "'FILL' 1";
                    button.classList.remove('text-[#0A1612]/50');
                    button.classList.add('text-red-500');
                }
            });
        });
    </script>
{{-- XDrew AI Chat (React) --}}


    @stack('scripts')
</body>
</html>
