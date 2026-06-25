<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $produk->nama_produk ?? $produk->NAMA_PRODUK ?? 'Produk' }} | XDrew Fashion</title>
    
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
                primary: "#10b981",
                surface: "#F7F9F8",
                "surface-container": "#ffffff",
            },
            fontFamily: {
                heading: ["Outfit", "sans-serif"],
                body: ["Poppins", "sans-serif"],
            }
          },
        },
      }
    </script>

    <style>
        body { background-color: #EAF3EF; color: #1A2E26; font-family: 'Poppins', sans-serif; overflow-x: hidden; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; display: inline-block; vertical-align: middle; }
        
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #EAF3EF; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #10b981; }
        [x-cloak] { display: none !important; }

        @keyframes pulse-emerald {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        .animate-pulse-slow {
            animation: pulse-emerald 3s infinite;
        }

        /* Grid Pattern */
        .bg-grid-pattern {
            background-image: 
                linear-gradient(rgba(78, 222, 163, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(78, 222, 163, 0.04) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* Premium Liquid Glass Cards */
        .glass-card {
            background: rgba(255, 255, 255, 0.4) !important;
            backdrop-filter: blur(28px) saturate(220%) !important;
            -webkit-backdrop-filter: blur(28px) saturate(220%) !important;
            border: 1px solid rgba(255, 255, 255, 0.6) !important;
            box-shadow: 
                0 16px 40px -10px rgba(98, 124, 112, 0.15), 
                inset 0 1px 3px rgba(255, 255, 255, 0.8) !important;
            transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .glass-card:hover {
            border-color: rgba(16, 185, 129, 0.4) !important;
            box-shadow: 0 20px 45px rgba(98, 124, 112, 0.2), inset 0 1px 3px rgba(255,255,255,0.8) !important;
            transform: translateY(-2px);
        }

        .glass-card.emerald-glow {
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.15);
        }
        .glass-card.emerald-glow:hover {
            box-shadow: 
                0 20px 50px 0 rgba(98, 124, 112, 0.2), 
                inset 0 1px 3px rgba(255,255,255,0.8), 
                0 0 25px rgba(16, 185, 129, 0.3) !important;
            transform: translateY(-4px);
        }

        /* Glass Image Frame */
        .glass-image-container {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 16px 40px -10px rgba(98, 124, 112, 0.15), inset 0 1px 3px rgba(255, 255, 255, 0.8);
            transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .glass-image-container:hover {
            border-color: rgba(16, 185, 129, 0.4);
            box-shadow: 0 20px 45px rgba(98, 124, 112, 0.2), inset 0 1px 3px rgba(255, 255, 255, 0.8), 0 0 20px rgba(16, 185, 129, 0.15);
        }

        /* Glass Thumbnail Buttons */
        .glass-thumb {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.8);
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .glass-thumb:hover, .glass-thumb.active {
            background: rgba(255, 255, 255, 0.8);
            border-color: #10b981 !important;
            box-shadow: 0 0 10px rgba(16, 185, 129, 0.2);
            transform: scale(1.03);
        }

        /* Premium Buttons */
        .btn-solid-glow {
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        .btn-solid-glow:hover {
            box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4), 0 0 15px rgba(16, 185, 129, 0.2);
            transform: translateY(-2px);
        }
        .btn-solid-glow:active {
            transform: translateY(1px);
        }

        .btn-outline-glow {
            background: rgba(16, 185, 129, 0.05);
            border: 1px solid rgba(16, 185, 129, 0.5) !important;
            box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.8);
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .btn-outline-glow:hover {
            background-color: #10b981;
            color: #ffffff !important;
            box-shadow: 0 12px 25px rgba(16, 185, 129, 0.3), 0 0 15px rgba(16, 185, 129, 0.2);
            transform: translateY(-2px);
        }
        .btn-outline-glow:active {
            transform: translateY(1px);
        }

        /* Glass Qty Selector */
        .glass-qty-container {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        /* Glass Size Selector */
        .size-btn {
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.6);
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
            color: #1A2E26;
        }
        .size-btn:hover {
            background: rgba(255, 255, 255, 0.8);
            border-color: rgba(16, 185, 129, 0.4);
            transform: translateY(-1px);
        }
        .size-btn.active {
            background: rgba(16, 185, 129, 0.1) !important;
            border-color: #10b981 !important;
            color: #10b981 !important;
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.2), inset 0 1px 2px rgba(16, 185, 129, 0.1);
        }

        /* Glass Accordion */
        .glass-accordion {
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .glass-accordion:hover {
            border-color: rgba(16, 185, 129, 0.4);
            background: rgba(255, 255, 255, 0.6);
        }

        /* Page Animations */
        @keyframes pageFadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .page-enter { animation: pageFadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
        
        .scroll-reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
        .scroll-reveal.is-visible { opacity: 1; transform: translateY(0); }

        .product-thumb { transition: all 0.3s ease; }
        .product-thumb:hover, .product-thumb.active { border-color: #10b981; opacity: 1; }
    </style>
</head>
<body class="selection:bg-primary/30 selection:text-primary antialiased flex flex-col min-h-screen relative overflow-x-hidden">

    <!-- Background and Glows (Emerald & Soft Blue Theme) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-40"></div>
        <div class="absolute left-[-10%] top-[20%] w-[500px] h-[500px] rounded-full bg-[#6ffbbe] blur-[150px] opacity-40 animate-pulse-slow"></div>
        <div class="absolute right-[-10%] top-[40%] w-[600px] h-[600px] rounded-full bg-[#4edea3] blur-[180px] opacity-25"></div>
        <div class="absolute left-[30%] bottom-[-10%] w-[400px] h-[400px] rounded-full bg-[#3bd58f] blur-[130px] opacity-35 animate-pulse-slow" style="animation-delay: 1.5s;"></div>
    </div>

    <header class="fixed top-0 w-full z-50 bg-white/40 backdrop-blur-xl border-b border-white/60 shadow-sm transition-all duration-300">
        @include('components.navbar')
    </header>

    <main class="relative z-10 flex-grow pt-32 pb-24 px-6 md:px-16 max-w-[1440px] mx-auto w-full">
        
        @if(session('success'))
            <div class="mb-8 p-4 bg-primary/10 border border-primary/50 text-primary rounded-xl flex items-center justify-between page-enter">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined">check_circle</span>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
                <a href="{{ route('cart.index') }}" class="font-bold text-sm hover:text-[#1A2E26] transition-colors">Lihat Keranjang</a>
            </div>
        @endif

        <nav class="mb-10 flex items-center gap-2 text-[#1A2E26]/60 text-xs font-semibold uppercase tracking-widest page-enter" style="animation-delay: 0.1s;">
            <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Beranda</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <a class="hover:text-primary transition-colors" href="{{ route('produk.index') }}">Koleksi</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="text-[#1A2E26]">{{ $produk->nama_produk ?? $produk->NAMA_PRODUK ?? 'Detail' }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            
            <section class="space-y-5 page-enter" style="animation-delay: 0.2s;">
                <div class="aspect-[4/5] overflow-hidden glass-image-container rounded-[2rem] relative group">
                    <img id="mainImage" alt="{{ $produk->nama_produk ?? $produk->NAMA_PRODUK }}" class="w-full h-full object-cover transition-all duration-700 ease-out group-hover:scale-105" 
                         src="{{ asset('images/' . ($produk->foto ?? $produk->FOTO)) }}"/>
                </div>
                
                <div class="grid grid-cols-4 gap-4">
                    <button class="aspect-square rounded-xl glass-thumb product-thumb overflow-hidden active cursor-pointer">
                        <img class="w-full h-full object-cover" src="{{ asset('images/' . ($produk->foto ?? $produk->FOTO)) }}"/>
                    </button>
                    <button class="aspect-square rounded-xl glass-thumb product-thumb overflow-hidden opacity-60 hover:opacity-100 cursor-pointer">
                        <img class="w-full h-full object-cover" src="{{ asset('images/' . ($produk->foto ?? $produk->FOTO)) }}"/>
                    </button>
                    <button class="aspect-square rounded-xl glass-thumb product-thumb overflow-hidden opacity-60 hover:opacity-100 cursor-pointer">
                        <img class="w-full h-full object-cover" src="{{ asset('images/' . ($produk->foto ?? $produk->FOTO)) }}"/>
                    </button>
                    <button class="aspect-square rounded-xl glass-thumb product-thumb overflow-hidden opacity-60 hover:opacity-100 cursor-pointer">
                        <img class="w-full h-full object-cover" src="{{ asset('images/' . ($produk->foto ?? $produk->FOTO)) }}"/>
                    </button>
                </div>
            </section>

            <section class="flex flex-col page-enter" style="animation-delay: 0.3s;">
                
                <div class="mb-5 flex gap-3 flex-wrap">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-primary/10 text-primary border border-primary/30 text-xs uppercase tracking-widest font-bold shadow-[0_0_10px_rgba(16,185,129,0.1)]">
                        {{ $produk->kategori ?? $produk->KATEGORI ?? 'Koleksi Terbaru' }}
                    </span>
                    @if(($produk->status_produk ?? $produk->STATUS_PRODUK))
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-black/5 text-[#1A2E26] border border-black/10 text-xs uppercase tracking-widest font-bold shadow-sm">
                        {{ $produk->status_produk ?? $produk->STATUS_PRODUK }}
                    </span>
                    @endif
                </div>
                
                <h1 class="text-4xl md:text-5xl mb-3 text-[#1A2E26] font-extrabold uppercase tracking-tight">{{ $produk->nama_produk ?? $produk->NAMA_PRODUK }}</h1>
                <p class="text-3xl text-primary mb-8 font-extrabold tracking-wide drop-shadow-sm">Rp {{ number_format($produk->harga ?? $produk->HARGA, 0, ',', '.') }}</p>
                
                <div class="mb-10">
                    <p class="text-[#1A2E26]/70 font-light leading-relaxed text-sm">
                        {{ $produk->keterangan ?? $produk->deskripsi ?? 'Pakaian premium ini dibuat dengan teknologi ramah lingkungan yang memadukan estetika modern dan kenyamanan optimal. Potongan terstruktur untuk gaya urban yang tak lekang oleh waktu.' }}
                    </p>
                </div>

                <form action="{{ route('cart.add') }}" method="POST" class="mb-10">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produk->id ?? $produk->ID }}">

                    <div class="mb-10">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xs font-bold uppercase tracking-widest text-[#1A2E26]/60">Pilih Ukuran</span>
                            <button type="button" class="text-primary text-xs font-bold uppercase tracking-widest hover:text-[#1A2E26] transition-colors">Panduan Ukuran</button>
                        </div>
                        
                        @php
                            $dataUkuran = $produk->ukuran ?? $produk->UKURAN;
                        @endphp
                        
                        @if(!empty($dataUkuran))
                            @php
                                $arrayUkuran = explode(',', $dataUkuran);
                            @endphp
                            
                            <div class="grid grid-cols-4 gap-3">
                                @foreach($arrayUkuran as $index => $size)
                                    @php $size = trim($size); @endphp
                                    <button type="button" class="size-btn py-3.5 rounded-xl font-bold text-sm tracking-wider cursor-pointer {{ $index == 0 ? 'active' : '' }}">
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                            <input type="hidden" name="ukuran_terpilih" id="ukuran_terpilih" value="{{ trim($arrayUkuran[0]) }}">
                        @else
                            <div class="w-full py-4 border border-black/10 bg-white/60 rounded-xl text-center text-[#1A2E26]/70 font-medium">All Size (Satu Ukuran)</div>
                            <input type="hidden" name="ukuran_terpilih" id="ukuran_terpilih" value="All Size">
                        @endif
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        
                        <div class="flex items-center glass-qty-container rounded-xl h-14 overflow-hidden">
                            <button type="button" class="w-14 h-full hover:bg-black/5 transition-colors text-[#1A2E26]/70 flex items-center justify-center cursor-pointer active:bg-black/10" onclick="this.nextElementSibling.stepDown()">
                                <span class="material-symbols-outlined text-[18px]">remove</span>
                            </button>
                            <input name="jumlah" class="w-12 bg-transparent text-center border-none focus:ring-0 font-bold text-[#1A2E26] text-lg p-0" max="{{ $produk->stok ?? $produk->STOK ?? 10 }}" min="1" type="number" value="1"/>
                            <button type="button" class="w-14 h-full hover:bg-black/5 transition-colors text-[#1A2E26]/70 flex items-center justify-center cursor-pointer active:bg-black/10" onclick="this.previousElementSibling.stepUp()">
                                <span class="material-symbols-outlined text-[18px]">add</span>
                            </button>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4 flex-1">
                            <button type="submit" class="flex-1 h-14 bg-transparent border border-primary text-primary font-bold uppercase tracking-widest text-xs rounded-xl btn-outline-glow flex items-center justify-center gap-2 cursor-pointer">
                                <span class="material-symbols-outlined text-[20px]">shopping_cart</span>
                                Keranjang
                            </button>
                            
                            <button type="button" onclick="beliSekarang()" class="flex-1 h-14 bg-primary text-white font-extrabold uppercase tracking-widest text-xs rounded-xl btn-solid-glow flex items-center justify-center gap-2 cursor-pointer">
                                <span class="material-symbols-outlined text-[20px]">flash_on</span>
                                Beli Sekarang
                            </button>
                        </div>
                    </div>
                </form>

                <div class="space-y-3">
                    <div x-data="{ open: true }" class="glass-accordion rounded-2xl overflow-hidden">
                        <button @click="open = !open" type="button" class="w-full flex justify-between items-center p-5 outline-none text-[#1A2E26] hover:bg-black/5 transition-colors cursor-pointer">
                            <span class="font-bold uppercase tracking-widest text-xs">Material & Perawatan</span>
                            <span class="material-symbols-outlined transition-transform duration-300" :class="open ? 'rotate-180 text-primary' : 'text-[#1A2E26]/60'">expand_more</span>
                        </button>
                        <div x-show="open" x-collapse>
                            <div class="p-5 pt-0 text-sm text-[#1A2E26]/70 font-light leading-relaxed">
                                Ditenun dari kapas organik bersertifikat 100%. Cuci mesin dengan suhu dingin bersama warna senada. Jangan gunakan pemutih. Keringkan di tempat teduh untuk menjaga kualitas pigmen warna eco-friendly.
                            </div>
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="glass-accordion rounded-2xl overflow-hidden">
                        <button @click="open = !open" type="button" class="w-full flex justify-between items-center p-5 outline-none text-[#1A2E26] hover:bg-black/5 transition-colors cursor-pointer">
                            <span class="font-bold uppercase tracking-widest text-xs">Pengiriman & Pengembalian</span>
                            <span class="material-symbols-outlined transition-transform duration-300" :class="open ? 'rotate-180 text-primary' : 'text-[#1A2E26]/60'">expand_more</span>
                        </button>
                        <div x-show="open" x-collapse x-cloak>
                            <div class="p-5 pt-0 text-sm text-[#1A2E26]/70 font-light leading-relaxed">
                                Pengiriman standar gratis untuk pesanan di atas Rp 1.000.000. Pengembalian gratis dalam waktu 14 hari setelah barang diterima, syarat dan ketentuan berlaku.
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>

        <section class="mt-32 pt-16 border-t border-black/5">
            <div class="text-center mb-12 scroll-reveal">
                <h2 class="text-3xl text-[#1A2E26] font-extrabold uppercase tracking-tight">Lengkapi Gaya Anda</h2>
                <div class="h-1 w-16 bg-primary mx-auto rounded-full mt-4 shadow-sm"></div>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                @foreach($related_products as $index => $related)
                <a href="{{ route('produk.show', $related->id ?? $related->ID) }}" class="group block glass-card p-2.5 sm:p-4 rounded-[1.2rem] sm:rounded-3xl emerald-glow scroll-reveal" style="transition-delay: {{ $index * 100 }}ms;">
                    <div class="aspect-[3/4] rounded-[0.8rem] sm:rounded-2xl overflow-hidden bg-white/60 relative mb-3 sm:mb-5 border border-white/60">
                        <img alt="{{ $related->nama_produk ?? $related->NAMA_PRODUK }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" 
                             src="{{ asset('images/' . ($related->foto ?? $related->FOTO)) }}"/>
                        
                        <div class="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <button class="absolute bottom-3 right-3 sm:bottom-4 sm:right-4 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/90 backdrop-blur-md border border-white/60 shadow-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-primary hover:border-primary group/btn translate-y-4 group-hover:translate-y-0 cursor-pointer" 
                                onclick="event.preventDefault(); window.location.href='{{ route('produk.show', $related->id ?? $related->ID) }}'">
                            <span class="material-symbols-outlined text-[#1A2E26] text-[18px] sm:text-[20px] group-hover/btn:text-white">arrow_forward</span>
                        </button>
                    </div>
                    <div class="px-1 pb-1">
                        <h3 class="font-bold text-[#1A2E26] text-[10px] sm:text-base tracking-wide truncate">{{ $related->nama_produk ?? $related->NAMA_PRODUK }}</h3>
                        <p class="font-extrabold text-primary mt-1 text-[11px] sm:text-sm drop-shadow-sm">Rp {{ number_format($related->harga ?? $related->HARGA, 0, ',', '.') }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </section>

    </main>

    @include('components.footer')

    <script>
        // Logika Pilihan Ukuran dengan Efek Glow Baru
        const sizeButtons = document.querySelectorAll('.size-btn');
        const hiddenSizeInput = document.getElementById('ukuran_terpilih');
        
        sizeButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                sizeButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                if(hiddenSizeInput) {
                    hiddenSizeInput.value = btn.innerText.trim();
                }
            });
        });

        // Logika Penggantian Thumbnail Foto
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.product-thumb');
        
        thumbnails.forEach(thumbBtn => {
            thumbBtn.addEventListener('click', () => {
                thumbnails.forEach(b => {
                    b.classList.remove('active');
                    b.classList.add('opacity-60');
                });
                
                thumbBtn.classList.add('active');
                thumbBtn.classList.remove('opacity-60');

                const img = thumbBtn.querySelector('img');
                mainImage.style.opacity = 0; 
                setTimeout(() => {
                    mainImage.src = img.src;
                    mainImage.style.opacity = 1; 
                }, 200);
            });
        });

        function beliSekarang() {
            const ukuran = document.getElementById('ukuran_terpilih').value;
            const jumlah = document.querySelector('input[name="jumlah"]').value;
            const produkId = {{ $produk->id ?? $produk->ID }};
            
            // DIPERBAIKI 3: Menggunakan url() agar tidak terjadi error jika nama rute berbeda
            window.location.href = `{{ url('/checkout/pembayaran') }}?produk_id=${produkId}&jumlah=${jumlah}&ukuran=${ukuran}`;
        }

        // Scroll Reveal Observer
        document.addEventListener('DOMContentLoaded', () => {
            const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>