<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Keranjang Belanja | XDrew Fashion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "primary": "#4edea3",
                      "background": "#0e1511",
                      "surface-container-low": "#161d19",
                      "surface-container": "#1a211d",
                      "surface-container-highest": "#2f3632",
                      "outline-variant": "#3c4a42",
                      "on-surface-variant": "#bbcabf"
              },
              "fontFamily": {
                      "headline-md": ["Montserrat"],
                      "headline-sm": ["Montserrat"],
                      "display-lg": ["Montserrat"],
                      "body-md": ["Inter"],
                      "label-md": ["Inter"],
                      "caption": ["Inter"]
              }
            }
          }
        }
    </script>
    <style>
        body { background-color: #0e1511; color: #dde4dd; overflow-x: hidden; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; display: inline-block; vertical-align: middle; }
        .glass-panel { background: rgba(30, 41, 59, 0.4); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.08); }
        .emerald-glow:hover { box-shadow: 0 0 20px rgba(16, 185, 129, 0.15); }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #0e1511; }
        ::-webkit-scrollbar-thumb { background: #2f3632; border-radius: 10px; }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary/30 min-h-screen flex flex-col">

    <!-- Memanggil Navbar -->
    @include('components.navbar')

    <main class="flex-grow pt-32 pb-24 px-6 md:px-16 max-w-[1440px] mx-auto w-full">
        
        <!-- Pesan Sukses -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-primary/20 border border-primary text-primary rounded-lg flex items-center justify-between shadow-lg shadow-primary/10">
                <span class="font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <header class="mb-12">
            <h1 class="font-display-lg text-4xl md:text-5xl mb-2 text-white font-bold">Keranjang Belanja</h1>
            <p class="font-body-md text-on-surface-variant flex items-center gap-2">
                <span class="text-primary font-bold">{{ count($cart) }} Produk</span> pilihan terbaik untuk koleksi Anda
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Daftar Produk di Keranjang -->
            <div class="lg:col-span-8 space-y-6">
                @php $subtotal = 0; @endphp

                @if(count($cart) > 0)
                    @foreach($cart as $id_unik => $details)
                        @php $subtotal += $details['harga'] * $details['jumlah']; @endphp
                        
                        <div class="glass-panel p-6 flex flex-col md:flex-row gap-6 group hover:border-primary/30 transition-all duration-300 rounded-xl">
                            <div class="w-full md:w-32 aspect-square overflow-hidden bg-surface-container rounded-lg shrink-0">
                                <img src="{{ asset('images/' . $details['foto']) }}" alt="{{ $details['nama_produk'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                            </div>
                            
                            <div class="flex-grow flex flex-col justify-between">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-headline-sm text-xl text-white font-bold mb-2">{{ $details['nama_produk'] }}</h3>
                                        <div class="flex flex-wrap gap-2 mb-2">
                                            <span class="px-3 py-1 rounded-full bg-white/5 text-gray-400 text-[10px] font-bold uppercase tracking-widest border border-white/10">Ukuran: {{ $details['ukuran'] }}</span>
                                        </div>
                                    </div>
                                    <span class="font-headline-sm text-lg text-primary font-bold">Rp {{ number_format($details['harga'], 0, ',', '.') }}</span>
                                </div>
                                
                                <div class="flex justify-between items-end mt-4">
                                    <!-- Form Update Jumlah -->
                                    <form action="{{ route('cart.update') }}" method="POST" class="flex items-center glass-panel rounded-full p-1 border-white/5">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $id_unik }}">
                                        
                                        <button type="button" class="w-8 h-8 flex items-center justify-center hover:text-primary transition-colors text-white" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); this.form.submit();">
                                            <span class="material-symbols-outlined text-[18px]">remove</span>
                                        </button>
                                        
                                        <input name="jumlah" class="w-10 bg-transparent border-none text-center font-bold text-white focus:ring-0 p-0" min="1" type="number" value="{{ $details['jumlah'] }}" onchange="this.form.submit()"/>
                                        
                                        <button type="button" class="w-8 h-8 flex items-center justify-center hover:text-primary transition-colors text-white" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); this.form.submit();">
                                            <span class="material-symbols-outlined text-[18px]">add</span>
                                        </button>
                                    </form>

                                    <!-- Form Hapus Barang -->
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id_unik }}">
                                        <button type="submit" class="flex items-center gap-1 text-gray-500 hover:text-red-500 transition-colors font-bold text-xs uppercase tracking-wider">
                                            <span class="material-symbols-outlined text-[18px]">delete</span> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-20 bg-surface-container rounded-xl border border-white/5">
                        <span class="material-symbols-outlined text-6xl text-gray-600 mb-4">production_quantity_limits</span>
                        <h2 class="text-2xl text-white font-bold mb-2">Keranjang Anda Kosong</h2>
                        <p class="text-gray-400 mb-6">Mulai eksplorasi koleksi pakaian terbaik kami.</p>
                        <a href="{{ route('produk') }}" class="inline-block px-8 py-3 bg-primary text-black font-bold uppercase tracking-widest rounded-lg hover:bg-[#3bc68f] transition-colors">Belanja Sekarang</a>
                    </div>
                @endif
            </div>

            <!-- Ringkasan Pesanan -->
            <aside class="lg:col-span-4">
                <div class="glass-panel p-8 sticky top-32 rounded-xl">
                    <h2 class="font-headline-md text-2xl mb-6 text-white font-bold">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-gray-400">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-400">
                            <span>Estimasi Pengiriman</span>
                            <span class="text-primary font-medium">Gratis</span>
                        </div>
                        <div class="flex justify-between text-gray-400">
                            <span>Pajak (11%)</span>
                            <span>Rp {{ number_format($subtotal * 0.11, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="pt-4 mt-4 border-t border-white/10 flex justify-between text-white text-xl font-bold">
                            <span>Total</span>
                            <span class="text-primary">Rp {{ number_format($subtotal + ($subtotal * 0.11), 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        @if(count($cart) > 0)
                            <a href="#" class="w-full block text-center py-4 px-6 bg-primary text-black font-bold uppercase tracking-widest rounded-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 emerald-glow">
                                Bayar Sekarang
                            </a>
                        @else
                            <button disabled class="w-full block text-center py-4 px-6 bg-gray-600 text-gray-400 font-bold uppercase tracking-widest rounded-lg cursor-not-allowed">
                                Bayar Sekarang
                            </button>
                        @endif
                        <p class="text-center text-xs text-gray-500">Dengan melanjutkan, Anda menyetujui Ketentuan Layanan kami</p>
                    </div>

                    <div class="mt-12 space-y-6">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-primary text-3xl">eco</span>
                            <div>
                                <p class="text-sm font-bold text-white">Kemasan Ramah Lingkungan</p>
                                <p class="text-xs text-gray-400 mt-1">Pesanan tiba dengan material yang 100% dapat terurai.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-primary text-3xl">verified</span>
                            <div>
                                <p class="text-sm font-bold text-white">Manufaktur Etis</p>
                                <p class="text-xs text-gray-400 mt-1">Upah yang adil dijamin di seluruh rantai pasokan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <!-- ========================================== -->
        <!-- PRODUK TERKAIT (UPSALE) -->
        <!-- ========================================== -->
        <section class="mt-24">
            <h2 class="font-headline-md text-3xl mb-8 text-white font-bold">Lengkapi Gaya Anda</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                
                @foreach($related_products as $related)
                <a href="{{ route('produk.show', $related->id ?? $related->ID) }}" class="group cursor-pointer block">
                    <div class="aspect-[3/4] rounded-xl overflow-hidden bg-surface-container relative mb-4">
                        <img alt="{{ $related->nama_produk ?? $related->NAMA_PRODUK }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                             src="{{ asset('images/' . ($related->foto ?? $related->FOTO)) }}"/>
                        
                        <button class="absolute bottom-4 right-4 w-10 h-10 rounded-full bg-surface/80 backdrop-blur-md border border-white/10 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:bg-primary/20" 
                                onclick="event.preventDefault(); window.location.href='{{ route('produk.show', $related->id ?? $related->ID) }}'">
                            <span class="material-symbols-outlined text-primary text-sm">visibility</span>
                        </button>
                    </div>
                    <p class="font-bold text-white text-sm">{{ $related->nama_produk ?? $related->NAMA_PRODUK }}</p>
                    <p class="font-bold text-primary mt-1 text-xs">Rp {{ number_format($related->harga ?? $related->HARGA, 0, ',', '.') }}</p>
                </a>
                @endforeach

            </div>
        </section>

    </main>

    @include('components.footer')

</body>
</html>