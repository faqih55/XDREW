<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'XDrew Fashion')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet"/>
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
            font-family: 'Inter', sans-serif; 
        }
        h1, h2, h3, .font-heading { 
            font-family: 'Montserrat', sans-serif; 
        }
        /* Tambahan untuk memastikan widget chat tidak tertutup elemen lain */
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="min-h-screen">

    @include('layouts.navigation')

    <main>
        @yield('content')
    </main>

    <x-chat-widget />

</body>
</html>