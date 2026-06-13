<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>XDrew Fashion Admin | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                }
            }
        }
    </script>
    <style>
        .glass-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .emerald-glow:hover {
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.15);
        }
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #1d5f39;
        }
        ::-webkit-scrollbar-thumb {
            background: #2f3632;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #4edea3;
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary/30">
    <aside class="h-screen w-64 fixed left-0 top-0 bg-surface-container border-r border-outline-variant flex flex-col py-md z-50">
        <div class="px-md mb-xl">
            <h1 class="font-headline-sm text-headline-sm text-primary">XDrew Fashion Admin</h1>
            <p class="text-on-surface-variant font-label-md text-sm mt-xs opacity-70">
                Halo, {{ Auth::guard('admin')->user()->nama_admin ?? 'Admin' }}
            </p>
        </div>
        <nav class="flex-1 space-y-1">
            <a class="flex items-center gap-sm py-sm px-md bg-secondary-container text-on-secondary-container rounded-lg mx-2 transition-colors duration-200" href="{{ route('admin.dashboard') }}">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                <span class="font-label-md text-label-md">Dasbor</span>
            </a>
            <a class="flex items-center gap-sm py-sm px-md text-on-surface-variant hover:bg-surface-variant rounded-lg mx-2 transition-colors duration-200 group" href="#">
                <span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
                <span class="font-label-md text-label-md">Inventaris</span>
            </a>
            <a class="flex items-center gap-sm py-sm px-md text-on-surface-variant hover:bg-surface-variant rounded-lg mx-2 transition-colors duration-200" href="#">
                <span class="material-symbols-outlined" data-icon="shopping_cart">shopping_cart</span>
                <span class="font-label-md text-label-md">Pesanan</span>
            </a>
            <a class="flex items-center gap-sm py-sm px-md text-on-surface-variant hover:bg-surface-variant rounded-lg mx-2 transition-colors duration-200" href="#">
                <span class="material-symbols-outlined" data-icon="group">group</span>
                <span class="font-label-md text-label-md">Pelanggan</span>
            </a>
            <a class="flex items-center gap-sm py-sm px-md text-on-surface-variant hover:bg-surface-variant rounded-lg mx-2 transition-colors duration-200" href="#">
                <span class="material-symbols-outlined" data-icon="monitoring">monitoring</span>
                <span class="font-label-md text-label-md">Analitik</span>
            </a>
        </nav>
        <div class="mt-auto pt-md border-t border-outline-variant/30 px-2 space-y-1">
            <button class="w-full bg-primary text-on-primary font-label-md py-sm rounded-lg mb-sm flex items-center justify-center gap-xs hover:scale-[1.02] transition-transform">
                <span class="material-symbols-outlined text-[18px]" data-icon="add">add</span>
                Koleksi Baru
            </button>
            <a class="flex items-center gap-sm py-sm px-md text-on-surface-variant hover:bg-surface-variant rounded-lg transition-colors duration-200" href="#">
                <span class="material-symbols-outlined" data-icon="settings">settings</span>
                <span class="font-label-md text-label-md">Pengaturan</span>
            </a>
            
            <form method="POST" action="{{ route('admin.logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-sm py-sm px-md text-on-tertiary hover:bg-error-container/20 rounded-lg transition-colors duration-200">
                    <span class="material-symbols-outlined" data-icon="logout">logout</span>
                    <span class="font-label-md text-label-md">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="ml-64 p-margin-desktop min-h-screen">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>