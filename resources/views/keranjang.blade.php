<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Keranjang Belanja | XDrew Fashion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "primary": "#10b981",
                      "background": "#F7F9F8",
                      "surface-container-low": "#ffffff",
                      "surface-container": "#f1f5f9",
                      "surface-container-highest": "#e2e8f0",
                      "outline-variant": "#cbd5e1",
                      "on-surface-variant": "#0A1612"
              },
              "fontFamily": {
                      "headline-md": ["Outfit", "sans-serif"],
                      "headline-sm": ["Outfit", "sans-serif"],
                      "display-lg": ["Outfit", "sans-serif"],
                      "body-md": ["Poppins", "sans-serif"],
                      "label-md": ["Poppins", "sans-serif"],
                      "caption": ["Poppins", "sans-serif"]
              }
            }
          }
        }
    </script>
    <style>
        body { background-color: #F7F9F8; color: #1A2E26; overflow-x: hidden; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; display: inline-block; vertical-align: middle; }
        
        /* Premium Liquid Glass Panel */
        .glass-panel { 
            background: rgba(255, 255, 255, 0.4); 
            backdrop-filter: blur(28px) saturate(220%); 
            -webkit-backdrop-filter: blur(28px) saturate(220%); 
            border: 1px solid rgba(255, 255, 255, 0.6); 
            box-shadow: 
                0 16px 40px -10px rgba(98, 124, 112, 0.15), 
                inset 0 1px 3px rgba(255, 255, 255, 0.8);
            transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .glass-panel:hover {
            border-color: rgba(16, 185, 129, 0.4);
            box-shadow: 
                0 20px 50px 0 rgba(98, 124, 112, 0.2), 
                inset 0 1px 3px rgba(255,255,255,0.8), 
                0 0 25px rgba(16, 185, 129, 0.15);
            transform: translateY(-2px);
        }
        
        /* Glass Button Hover */
        .glass-btn {
            background: rgba(255,255,255,0.4);
            border: 1px solid rgba(255,255,255,0.6);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .glass-btn:hover {
            background: rgba(255,255,255,0.8);
            border-color: rgba(16, 185, 129, 0.4);
            box-shadow: 
                inset 0 1px 2px rgba(255,255,255,0.8),
                0 4px 12px rgba(98, 124, 112, 0.15);
            transform: translateY(-1px);
        }

        .emerald-glow:hover { box-shadow: 0 0 25px rgba(16, 185, 129, 0.15); border-color: rgba(16, 185, 129, 0.4); }
        
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #F7F9F8; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #10b981; }
        
        /* Floating Animation for ambient orbs */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.05); }
        }
        .animate-float-slow { animation: float-slow 10s ease-in-out infinite; }
        .animate-float-delayed { animation: float-slow 12s ease-in-out infinite 2s; }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary/30 min-h-screen flex flex-col relative overflow-x-hidden">

    <!-- Background and Glows (Smooth Emerald & Violet Theme) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-30"></div>
        <div class="absolute left-[-10%] top-[20%] w-[500px] h-[500px] rounded-full bg-[#8b5cf6] blur-[160px] opacity-[0.15] "></div>
        <div class="absolute right-[-10%] top-[40%] w-[600px] h-[600px] rounded-full bg-[#4edea3] blur-[180px] opacity-[0.15]"></div>
        <div class="absolute left-[30%] bottom-[-10%] w-[400px] h-[400px] rounded-full bg-[#c4b5fd] blur-[150px] opacity-[0.15] " style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Ambient Glowing Orbs -->
    <div class="fixed top-[-10%] left-[-10%] w-[50vw] h-[50vw] rounded-full bg-[#10b981]/20 blur-[120px] pointer-events-none mix-blend-multiply animate-float-slow z-0"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-[40vw] h-[40vw] rounded-full bg-emerald-300/20 blur-[100px] pointer-events-none mix-blend-multiply animate-float-delayed z-0"></div>
    
    <header class="fixed top-0 w-full z-50 bg-white/40 backdrop-blur-xl border-b border-white/60 transition-all duration-300">
        @include('components.navbar')
    </header>

    <main class="flex-grow pt-32 pb-24 px-6 md:px-16 max-w-[1440px] mx-auto w-full relative z-10">
        
        @if(session('success'))
            <div class="mb-6 p-4 bg-primary/10 border border-primary/30 text-primary rounded-2xl flex items-center justify-between shadow-[0_0_20px_rgba(78,222,163,0.1)] backdrop-blur-md">
                <span class="font-bold flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary drop-shadow-[0_0_8px_rgba(78,222,163,0.8)]">check_circle</span>
                    {{ session('success') }}
                </span>
            </div>
        @endif

        <header class="mb-12 text-center md:text-left">
            <h1 class="font-display-lg text-4xl md:text-5xl mb-2 text-[#0A1612] font-bold tracking-tight uppercase drop-shadow-sm">Keranjang Belanja</h1>
            <p class="font-body-md text-[#0A1612]/70 flex items-center justify-center md:justify-start gap-2">
                <span class="text-primary font-bold">{{ count($cart ?? []) }} Produk</span> pilihan terbaik untuk koleksi Anda
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            
            <div class="lg:col-span-8 space-y-6">
                @php $subtotal = 0; @endphp

                @if(isset($cart) && count($cart) > 0)
                    @foreach($cart as $id_unik => $details)
                        @php 
                            $harga = $details['harga'] ?? $details['HARGA'] ?? 0;
                            $jumlah = $details['jumlah'] ?? $details['KUANTITAS'] ?? 1;
                            $nama_produk = $details['nama_produk'] ?? $details['NAMA_PRODUK'] ?? 'Produk';
                            $foto = $details['foto'] ?? $details['FOTO'] ?? 'default.jpg';
                            $ukuran = $details['ukuran'] ?? $details['UKURAN'] ?? 'All Size';
                            
                            $subtotal += $harga * $jumlah; 
                        @endphp
                        
                        <div class="glass-panel p-5 md:p-6 flex flex-col md:flex-row gap-6 group transition-all duration-500 rounded-[2rem]">
                            <div class="w-full md:w-36 aspect-[3/4] md:aspect-square overflow-hidden bg-white/60 rounded-3xl shrink-0 border border-white/60 shadow-sm">
                                <img src="{{ asset('images/' . $foto) }}" alt="{{ $nama_produk }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" onerror="this.src='https://via.placeholder.com/150'"/>
                            </div>
                            
                            <div class="flex-grow flex flex-col justify-between py-1">
                                <div class="flex flex-col md:flex-row md:justify-between items-start gap-3 md:gap-0">
                                    <div>
                                        <h3 class="font-headline-sm text-xl text-[#0A1612] font-bold mb-2 tracking-wide">{{ $nama_produk }}</h3>
                                        <div class="flex flex-wrap gap-2 mb-2">
                                            <span class="px-3 py-1.5 rounded-full bg-white/60 text-[#0A1612]/80 text-[10px] font-bold uppercase tracking-widest border border-white/60 shadow-sm backdrop-blur-md">Ukuran: {{ $ukuran }}</span>
                                        </div>
                                    </div>
                                    <span class="font-headline-sm text-xl text-primary font-bold whitespace-nowrap drop-shadow-sm">Rp {{ number_format($harga, 0, ',', '.') }}</span>
                                </div>
                                
                                <div class="flex justify-between items-end mt-6">
                                    <form action="{{ route('cart.update') }}" method="POST" class="flex items-center bg-white/40 backdrop-blur-md rounded-full p-1 border border-white/60 shadow-sm">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $id_unik }}">
                                        
                                        <button type="button" class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-black/5 transition-colors text-[#0A1612]/70 hover:text-primary active:scale-90" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); this.form.submit();">
                                            <span class="material-symbols-outlined text-[18px]">remove</span>
                                        </button>
                                        
                                        <input name="jumlah" class="w-10 bg-transparent border-none text-center font-bold text-[#0A1612] focus:ring-0 p-0" min="1" max="10" type="number" value="{{ $jumlah }}" onchange="this.form.submit()"/>
                                        
                                        <button type="button" class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-black/5 transition-colors text-[#0A1612]/70 hover:text-primary active:scale-90" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); this.form.submit();">
                                            <span class="material-symbols-outlined text-[18px]">add</span>
                                        </button>
                                    </form>

                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id_unik }}">
                                        <button type="submit" class="flex items-center gap-1.5 text-[#0A1612]/50 hover:text-[#ff7676] transition-all duration-300 font-bold text-xs uppercase tracking-widest px-3 py-2 rounded-full hover:bg-[#ff7676]/10">
                                            <span class="material-symbols-outlined text-[18px]">delete</span> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-24 glass-panel rounded-[2rem]">
                        <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-white/60 border border-white/60 mb-6 shadow-[0_4px_15px_rgba(98,124,112,0.1)]">
                            <span class="material-symbols-outlined text-5xl text-[#0A1612]/30">production_quantity_limits</span>
                        </div>
                        <h2 class="text-2xl text-[#0A1612] font-bold mb-3 tracking-wide">Keranjang Anda Kosong</h2>
                        <p class="text-[#0A1612]/60 mb-8 max-w-md mx-auto">Tampaknya Anda belum menambahkan karya apapun. Mulai eksplorasi koleksi pakaian terbaik kami.</p>
                        
                        <a href="{{ route('produk.index') }}" class="inline-block px-10 py-4 bg-primary text-white font-black uppercase tracking-[0.15em] text-sm rounded-full hover:bg-[#059669] hover:scale-105 transition-all duration-300 shadow-[0_4px_15px_rgba(16,185,129,0.3)]">Belanja Sekarang</a>
                    </div>
                @endif
            </div>

            <aside class="lg:col-span-4">
                <div class="glass-panel p-8 sticky top-32 rounded-[2rem] border-t border-t-white/60">
                    <h2 class="font-headline-md text-xl mb-6 text-[#0A1612] font-black uppercase tracking-[0.1em] drop-shadow-sm">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-[#0A1612]/70 font-medium">
                            <span>Subtotal Produk</span>
                            <span class="text-[#0A1612] font-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-[#0A1612]/70 font-medium">
                            <span>Biaya Admin</span>
                            <span class="text-[#0A1612] font-bold">Rp 2.000</span>
                        </div>
                        
                        <div class="pt-6 mt-6 border-t border-black/5 flex justify-between items-center text-[#0A1612] text-lg font-bold uppercase tracking-wider">
                            <span>Total Akhir</span>
                            <span class="text-primary text-2xl font-black drop-shadow-sm">Rp {{ number_format($subtotal + 2000, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        @if(isset($cart) && count($cart) > 0)
                            <a href="{{ route('checkout.pembayaran') }}" class="w-full block text-center py-4 px-6 bg-primary text-white font-black uppercase tracking-[0.15em] text-sm rounded-full hover:bg-[#059669] transition-all duration-300 shadow-[0_4px_15px_rgba(16,185,129,0.3)] hover:shadow-[0_6px_20px_rgba(16,185,129,0.4)] hover:scale-[1.02] flex items-center justify-center gap-2 group">
                                Lanjut Pembayaran <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </a>
                        @else
                            <button disabled class="w-full block text-center py-4 px-6 bg-white/40 border border-white/60 text-[#0A1612]/40 font-bold uppercase tracking-widest text-sm rounded-full cursor-not-allowed backdrop-blur-sm shadow-sm">
                                Lanjut Pembayaran
                            </button>
                        @endif
                        <p class="text-center text-[11px] text-[#0A1612]/50 font-medium tracking-wide mt-4 uppercase">Biaya admin & ongkir dihitung saat checkout.</p>
                    </div>

                    <div class="mt-10 space-y-5 pt-8 border-t border-black/5">
                        <div class="flex items-center gap-4 bg-white/40 p-4 rounded-2xl border border-white/60 shadow-sm">
                            <span class="material-symbols-outlined text-primary text-3xl drop-shadow-sm">eco</span>
                            <div>
                                <p class="text-[11px] font-black text-[#0A1612] uppercase tracking-[0.1em]">Kemasan Ramah</p>
                                <p class="text-[10px] text-[#0A1612]/60 mt-1 leading-relaxed">Material 100% dapat terurai.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 bg-white/40 p-4 rounded-2xl border border-white/60 shadow-sm">
                            <span class="material-symbols-outlined text-primary text-3xl drop-shadow-sm">verified</span>
                            <div>
                                <p class="text-[11px] font-black text-[#0A1612] uppercase tracking-[0.1em]">Manufaktur Etis</p>
                                <p class="text-[10px] text-[#0A1612]/60 mt-1 leading-relaxed">Upah adil di seluruh rantai pasokan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        @if(isset($related_products) && count($related_products) > 0)
        <section class="mt-32 pt-16 border-t border-black/5 relative">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-32 h-[1px] bg-gradient-to-r from-transparent via-primary/50 to-transparent"></div>
            
            <h2 class="font-display-lg text-3xl mb-10 text-[#0A1612] font-bold uppercase tracking-tight text-center drop-shadow-sm">Lengkapi Gaya Anda</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                
                @foreach($related_products as $related)
                <a href="{{ route('produk.show', $related->id ?? $related->ID) }}" class="group cursor-pointer block glass-panel p-2 sm:p-3 rounded-[1.2rem] sm:rounded-[2rem] emerald-glow transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-[3/4] rounded-[0.8rem] sm:rounded-3xl overflow-hidden bg-white/60 relative mb-3 sm:mb-4 border border-white/60 shadow-sm">
                        <img alt="{{ $related->nama_produk ?? $related->NAMA_PRODUK }}" class="w-full h-full object-cover group-hover:scale-110 group-hover:rotate-1 transition-all duration-700 ease-out" 
                             src="{{ asset('images/' . ($related->foto ?? $related->FOTO)) }}" onerror="this.src='https://via.placeholder.com/150'"/>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <button class="absolute bottom-3 right-3 sm:bottom-4 sm:right-4 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/80 backdrop-blur-md flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-primary border border-white shadow-md translate-y-4 group-hover:translate-y-0 text-[#0A1612] hover:text-white" 
                                onclick="event.preventDefault(); window.location.href='{{ route('produk.show', $related->id ?? $related->ID) }}'">
                            <span class="material-symbols-outlined text-[18px] sm:text-[20px]">visibility</span>
                        </button>
                    </div>
                    <div class="px-1 pb-1 text-center">
                        <p class="font-bold text-[#0A1612] text-[10px] sm:text-sm truncate tracking-wide">{{ $related->nama_produk ?? $related->NAMA_PRODUK }}</p>
                        <p class="font-black text-primary mt-1.5 text-[11px] sm:text-sm drop-shadow-sm">Rp {{ number_format($related->harga ?? $related->HARGA, 0, ',', '.') }}</p>
                    </div>
                </a>
                @endforeach

            </div>
        </section>
        @endif

    </main>

    @include('components.footer')

</body>
</html>