<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $produk->nama_produk ?? $produk->NAMA_PRODUK }} | XDrew Fashion</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>
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
                      "label-md": ["Inter"]
              }
            }
          }
        }
    </script>
    <style>
        body { background-color: #0e1511; color: #dde4dd; overflow-x: hidden; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .product-thumb:hover, .product-thumb.active { border-color: #4edea3; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0e1511; }
        ::-webkit-scrollbar-thumb { background: #3c4a42; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #4edea3; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-body-md text-body-md selection:bg-primary selection:text-black">

    @include('components.navbar')

    <main class="pt-32 pb-24 px-6 md:px-16 w-full max-w-[1440px] mx-auto">
        
        @if(session('success'))
            <div class="mb-6 p-4 bg-primary/20 border border-primary text-primary rounded-lg flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <a href="#" class="font-bold underline hover:text-white">Lihat Keranjang</a>
            </div>
        @endif

        <nav class="mb-12 flex items-center gap-2 text-on-surface-variant font-label-md text-sm">
            <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Beranda</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <a class="hover:text-primary transition-colors" href="{{ route('produk') }}">Koleksi</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="text-white">{{ $produk->nama_produk ?? $produk->NAMA_PRODUK }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <section class="space-y-4">
                <div class="aspect-[4/5] overflow-hidden bg-surface-container rounded-xl relative group">
                    <img id="mainImage" alt="{{ $produk->nama_produk ?? $produk->NAMA_PRODUK }}" class="w-full h-full object-cover transition-transform duration-500" 
                         src="{{ asset('images/' . ($produk->foto ?? $produk->FOTO)) }}"/>
                </div>
                
                <div class="grid grid-cols-4 gap-4">
                    <button class="aspect-square bg-surface-container rounded-lg border border-primary product-thumb overflow-hidden transition-all active">
                        <img class="w-full h-full object-cover" src="{{ asset('images/' . ($produk->foto ?? $produk->FOTO)) }}"/>
                    </button>
                    <button class="aspect-square bg-surface-container rounded-lg border border-outline-variant product-thumb overflow-hidden transition-all">
                        <img class="w-full h-full object-cover opacity-80" src="{{ asset('images/' . ($produk->foto ?? $produk->FOTO)) }}"/>
                    </button>
                    <button class="aspect-square bg-surface-container rounded-lg border border-outline-variant product-thumb overflow-hidden transition-all">
                        <img class="w-full h-full object-cover opacity-60" src="{{ asset('images/' . ($produk->foto ?? $produk->FOTO)) }}"/>
                    </button>
                    <button class="aspect-square bg-surface-container rounded-lg border border-outline-variant product-thumb overflow-hidden transition-all">
                        <img class="w-full h-full object-cover opacity-40" src="{{ asset('images/' . ($produk->foto ?? $produk->FOTO)) }}"/>
                    </button>
                </div>
            </section>

            <section class="flex flex-col">
                <div class="mb-4">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-primary/10 text-primary border border-primary/20 font-label-md text-xs uppercase tracking-widest font-bold">
                        {{ $produk->kategori ?? $produk->KATEGORI ?? 'Koleksi Terbaru' }}
                    </span>
                </div>
                
                <h1 class="font-headline-md text-4xl mb-2 text-white">{{ $produk->nama_produk ?? $produk->NAMA_PRODUK }}</h1>
                <p class="font-headline-sm text-2xl text-primary mb-8 font-bold">Rp {{ number_format($produk->harga ?? $produk->HARGA, 0, ',', '.') }}</p>
                
                <div class="mb-8">
                    <p class="font-body-md text-on-surface-variant leading-relaxed mb-6">
                        {{ $produk->keterangan ?? $produk->deskripsi ?? 'Pakaian premium ini dibuat dengan teknologi ramah lingkungan yang memadukan estetika modern dan kenyamanan optimal.' }}
                    </p>
                </div>

                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produk->id ?? $produk->ID }}">

                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-label-md text-xs font-bold uppercase tracking-widest text-on-surface-variant">Pilih Ukuran</span>
                            <button type="button" class="text-primary font-label-md text-xs font-bold uppercase tracking-widest hover:underline">Panduan Ukuran</button>
                        </div>
                        
                        @php
                            // Mengambil data ukuran dari Oracle
                            $dataUkuran = $produk->ukuran ?? $produk->UKURAN;
                        @endphp
                        
                        @if(!empty($dataUkuran))
                            @php
                                // Memecah string "XL,L,M,S" menjadi Array
                                $arrayUkuran = explode(',', $dataUkuran);
                            @endphp
                            
                            <div class="grid grid-cols-4 gap-4">
                                @foreach($arrayUkuran as $index => $size)
                                    @php $size = trim($size); @endphp
                                    <button type="button" class="size-btn py-3 border {{ $index == 0 ? 'border-primary bg-primary/5 text-primary' : 'border-outline-variant text-white' }} rounded-lg hover:border-primary transition-all font-bold">
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                            
                            <input type="hidden" name="ukuran_terpilih" id="ukuran_terpilih" value="{{ trim($arrayUkuran[0]) }}">
                        @else
                            <p class="text-gray-500 text-sm italic">Ukuran tunggal (All Size)</p>
                            <input type="hidden" name="ukuran_terpilih" id="ukuran_terpilih" value="All Size">
                        @endif
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mb-12">
                        <div class="flex items-center border border-outline-variant rounded-lg bg-surface-container-low">
                            <button type="button" class="px-4 py-3 hover:text-primary transition-colors text-white" onclick="this.nextElementSibling.stepDown()">
                                <span class="material-symbols-outlined">remove</span>
                            </button>
                            <input name="jumlah" class="w-12 bg-transparent text-center border-none focus:ring-0 font-bold text-white" max="{{ $produk->stok ?? $produk->STOK ?? 10 }}" min="1" type="number" value="1"/>
                            <button type="button" class="px-4 py-3 hover:text-primary transition-colors text-white" onclick="this.previousElementSibling.stepUp()">
                                <span class="material-symbols-outlined">add</span>
                            </button>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4 flex-1">
                            <button type="submit" class="flex-1 bg-surface-container-low border border-primary text-primary font-bold uppercase tracking-widest text-sm py-4 rounded-lg hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2 hover:bg-primary/10">
                                <span class="material-symbols-outlined">shopping_cart</span>
                                Tambah ke Keranjang
                            </button>
                            <button type="button" onclick="beliSekarang()" class="flex-1 bg-primary text-black font-bold uppercase tracking-widest text-sm py-4 rounded-lg hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2 shadow-lg shadow-primary/10">
                                <span class="material-symbols-outlined">local_mall</span>
                                Beli Sekarang
                            </button>
                        </div>
                    </div>
                </form>

                <div class="space-y-px bg-outline-variant/30 rounded-lg overflow-hidden border border-white/5">
                    <details class="group bg-surface-container-low" open>
                        <summary class="flex justify-between items-center p-6 cursor-pointer hover:bg-surface-container-highest transition-colors list-none outline-none">
                            <span class="font-label-md text-xs font-bold uppercase tracking-widest text-white">Material & Perawatan</span>
                            <span class="material-symbols-outlined group-open:rotate-180 transition-transform text-white">expand_more</span>
                        </summary>
                        <div class="p-6 text-on-surface-variant font-body-md border-t border-outline-variant/30 bg-surface-container-highest/20">
                            Cuci dengan suhu dingin dan jangan gunakan pemutih untuk menjaga kualitas kain.
                        </div>
                    </details>
                </div>
            </section>
        </div>

        <section class="mt-24 pt-16 border-t border-outline-variant/30">
            <h2 class="font-headline-md text-3xl mb-10 text-white font-bold">Lengkapi Gaya Anda</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                @foreach($related_products as $related)
                <a href="{{ route('produk.show', $related->id ?? $related->ID) }}" class="group cursor-pointer block">
                    <div class="aspect-[3/4] rounded-xl overflow-hidden bg-surface-container relative mb-4">
                        <img alt="{{ $related->nama_produk ?? $related->NAMA_PRODUK }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                             src="{{ asset('images/' . ($related->foto ?? $related->FOTO)) }}"/>
                        
                        <button class="absolute bottom-4 right-4 w-12 h-12 rounded-full bg-surface/80 backdrop-blur-md border border-white/10 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:bg-primary/20" 
                                onclick="event.preventDefault(); window.location.href='{{ route('produk.show', $related->id ?? $related->ID) }}'">
                            <span class="material-symbols-outlined text-primary">visibility</span>
                        </button>
                    </div>
                    <h3 class="font-bold text-white text-lg">{{ $related->nama_produk ?? $related->NAMA_PRODUK }}</h3>
                    <p class="font-bold text-primary mt-1">Rp {{ number_format($related->harga ?? $related->HARGA, 0, ',', '.') }}</p>
                </a>
                @endforeach
                
            </div>
        </section>

    </main>

    @include('components.footer')

    <script>
        // Interaksi Size (Otomatis Mengubah Input Form Tersembunyi)
        const sizeButtons = document.querySelectorAll('.size-btn');
        const hiddenSizeInput = document.getElementById('ukuran_terpilih');
        
        sizeButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                // Reset semua warna tombol
                sizeButtons.forEach(b => {
                    b.classList.remove('border-primary', 'bg-primary/5', 'text-primary');
                    b.classList.add('border-outline-variant', 'text-white');
                });
                
                // Set warna tombol yang diklik
                btn.classList.add('border-primary', 'bg-primary/5', 'text-primary');
                btn.classList.remove('border-outline-variant', 'text-white');
                
                // Ubah nilai input tersembunyi sesuai dengan tombol yang diklik
                if(hiddenSizeInput) {
                    hiddenSizeInput.value = btn.innerText.trim();
                }
            });
        });

        // Gallery Switcher
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.product-thumb');
        thumbnails.forEach(thumbBtn => {
            thumbBtn.addEventListener('click', () => {
                thumbnails.forEach(b => b.classList.remove('border-primary', 'active'));
                thumbnails.forEach(b => b.classList.add('border-outline-variant'));
                
                thumbBtn.classList.add('border-primary', 'active');
                thumbBtn.classList.remove('border-outline-variant');

                const img = thumbBtn.querySelector('img');
                mainImage.style.opacity = 0; 
                setTimeout(() => {
                    mainImage.src = img.src;
                    mainImage.style.opacity = 1; 
                }, 150);
            });
        });

        // Function untuk tombol Beli Sekarang
        function beliSekarang() {
            const ukuran = document.getElementById('ukuran_terpilih').value;
            const jumlah = document.querySelector('input[name="jumlah"]').value;
            const produkId = {{ $produk->id ?? $produk->ID }};
            
            // Redirect ke halaman pembayaran dengan parameter produk, jumlah, dan ukuran
            window.location.href = `{{ route('pembayaran') }}?produk_id=${produkId}&jumlah=${jumlah}&ukuran=${ukuran}`;
        }
    </script>
</body>
</html>