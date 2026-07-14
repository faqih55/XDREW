<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'XDrew Fashion')</title>

    <!-- Optimasi Prioritas Koneksi -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://cdn.tailwindcss.com" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <style>
        .glass-card { 
            background: rgba(30, 41, 59, 0.7); 
            backdrop-filter: blur(12px); 
            border: 1px solid rgba(255, 255, 255, 0.1); 
        }
        body { 
            background-color: #0e1511; 
            color: #dde4dd; 
            font-family: 'Poppins', sans-serif; 
        }
        h1, h2, h3, .font-heading { 
            font-family: 'Outfit', sans-serif; 
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="min-h-screen">

    <!-- Background and Glows (Smooth Emerald & Violet Theme) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-30"></div>
        <div class="absolute left-[-10%] top-[20%] w-[500px] h-[500px] rounded-full bg-[#8b5cf6] blur-[160px] opacity-[0.15] "></div>
        <div class="absolute right-[-10%] top-[40%] w-[600px] h-[600px] rounded-full bg-[#4edea3] blur-[180px] opacity-[0.15]"></div>
        <div class="absolute left-[30%] bottom-[-10%] w-[400px] h-[400px] rounded-full bg-[#c4b5fd] blur-[150px] opacity-[0.15] " style="animation-delay: 1.5s;"></div>
    </div>

    @include('layouts.navigation')

    <main class="relative z-10">
        @yield('content')
    </main>

</body>
</html>