<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Akun Saya | XDrew Fashion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
        .glass-card { background: rgba(30, 41, 59, 0.4); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .glow-hover:hover { box-shadow: 0 0 20px rgba(16, 185, 129, 0.15); border-color: rgba(16, 185, 129, 0.3); }
        body { background-color: #0e1511; color: #dde4dd; }
    </style>
</head>
<body class="font-body-md text-on-surface selection:bg-primary selection:text-on-primary">
    
    <header class="fixed top-0 w-full z-50 bg-surface/70 backdrop-blur-xl border-b border-white/10 shadow-sm">
        @include('components.navbar')
    </header>

    <main class="pt-32 pb-20 px-6 md:px-16 max-w-[1440px] mx-auto w-full">
        <div class="mb-4 flex items-center gap-2">
            <a href="{{ route('home') }}" class="text-xs text-on-surface-variant hover:text-primary">Beranda</a>
            <span class="material-symbols-outlined text-[14px] text-on-surface-variant">chevron_right</span>
            <span class="text-xs text-primary">Akun Saya</span>
        </div>

        <h1 class="text-4xl md:text-5xl mb-10 tracking-tighter uppercase font-bold">AKUN SAYA</h1>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
            <aside class="md:col-span-3">
                <div class="glass-card rounded-xl p-4 flex flex-col gap-2">
                    <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-primary-container text-on-primary-container">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">person</span>
                        <span class="text-sm">Profil</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:text-primary hover:bg-white/5 transition-all">
                        <span class="material-symbols-outlined">shopping_basket</span>
                        <span class="text-sm">Pesanan Saya</span>
                    </a>
                    <div class="h-[1px] bg-white/10 my-2"></div>
                    <form id="logout-form" action="{{ route('pelanggan.logout') }}" method="POST">
                        @csrf
                        <button type="button" onclick="confirmLogout()" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-error hover:bg-error/10 text-left transition-all">
                            <span class="material-symbols-outlined">logout</span>
                            <span class="text-sm">Keluar</span>
                        </button>
                    </form>
                </div>
            </aside>

            <div class="md:col-span-9 flex flex-col gap-8">
                <section class="glass-card rounded-xl p-8 flex flex-col md:flex-row items-center gap-8">
                    <div class="w-32 h-32 rounded-full overflow-hidden border-2 border-primary/50">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->nama_lengkap ?? 'User') }}&background=10b981&color=fff" alt="Profile" class="w-full h-full object-cover">
                    </div>
                    <div class="text-center md:text-left flex-grow">
                        <h2 class="text-2xl font-bold mb-1">{{ $user->nama_lengkap ?? $user->name }}</h2>
                        <p class="text-on-surface-variant mb-4">{{ $user->email }}</p>
                        <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs border border-primary/20">
                            Bergabung {{ $user->created_at ? $user->created_at->format('F Y') : '2026' }}
                        </span>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="px-8 py-2 rounded-lg bg-transparent border border-white/20 text-on-surface hover:bg-white/5 transition-all text-sm font-bold">
                        Edit Profil
                    </a>
                </section>

                <section>
                    <div class="flex justify-between items-end mb-4">
                        <h3 class="text-xl font-bold tracking-tight">Pesanan Terbaru</h3>
                        <a class="text-primary hover:underline text-sm" href="#">Lihat Semua</a>
                    </div>
                    <div class="flex flex-col gap-4">
                        @forelse($orders as $order)
                        <div class="glass-card rounded-xl p-4 flex justify-between items-center hover:border-primary/30 transition-all emerald-glow">
                            <div>
                                <p class="text-sm font-bold">#ORD-{{ $order->id }}</p>
                                <p class="text-xs text-on-surface-variant">{{ $order->created_at->format('d M Y') }}</p>
                            </div>
                            <span class="bg-primary/10 text-primary px-3 py-1 rounded-lg text-xs">{{ $order->status }}</span>
                            <p class="text-lg font-bold">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                        </div>
                        @empty
                        <p class="text-on-surface-variant text-sm">Belum ada pesanan.</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script>
        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin keluar?")) { document.getElementById('logout-form').submit(); }
        }
    </script>
</body>
</html>