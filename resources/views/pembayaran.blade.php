<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Pembayaran | XDrew Fashion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              colors: {
                "primary": "#4edea3",
                "background": "#0e1511",
                "surface-container-low": "#161d19",
                "surface-container": "#1a211d",
                "surface-container-highest": "#2f3632",
                "outline-variant": "#3c4a42",
                "on-surface-variant": "#bbcabf",
                "error": "#ffb4ab"
              },
              fontFamily: {
                "headline-md": ["Montserrat"],
                "body-md": ["Inter"],
                "label-md": ["Inter"]
              }
            }
          }
        }
    </script>
    <style>
        body { background-color: #0e1511; color: #dde4dd; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0e1511; }
        ::-webkit-scrollbar-thumb { background: #3c4a42; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #4edea3; }
        
        .glass-card { background: rgba(30, 41, 59, 0.4); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .payment-method { cursor: pointer; transition: all 0.3s ease; }
        .payment-method.active { background-color: rgba(78, 222, 163, 0.1); border-color: #4edea3; }
    </style>
</head>
<body class="font-body-md text-body-md selection:bg-primary selection:text-black">

    @include('components.navbar')

    <main class="pt-32 pb-24 px-6 md:px-16 w-full max-w-[1440px] mx-auto">
        
        <nav class="mb-12 flex items-center gap-2 text-on-surface-variant font-label-md text-sm">
            <a class="hover:text-primary transition-colors" href="{{ route('home') }}">Beranda</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <a class="hover:text-primary transition-colors" href="{{ route('keranjang.index') }}">Keranjang</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="text-white">Pembayaran</span>
        </nav>

        <h1 class="font-headline-md text-4xl mb-12 text-white">Ringkasan Pesanan</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Bagian Kiri - Detail Produk -->
            <div class="lg:col-span-2">
                <div class="glass-card rounded-xl p-8 mb-8">
                    <h2 class="font-bold text-xl mb-6 text-white">Item Pesanan</h2>
                    
                    <div id="produk-list" class="space-y-4">
                        <!-- Produk akan ditampilkan di sini -->
                    </div>
                </div>

                <!-- Bagian Pengiriman -->
                <div class="glass-card rounded-xl p-8 mb-8">
                    <h2 class="font-bold text-xl mb-6 text-white">Alamat Pengiriman</h2>
                    
                    <form id="alamat-form" class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-on-surface-variant mb-2">Nama Penerima</label>
                            <input type="text" placeholder="Masukkan nama lengkap" class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary transition-all" required/>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-on-surface-variant mb-2">Nomor Telepon</label>
                            <input type="tel" placeholder="+62 8xx xxxx xxxx" class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary transition-all" required/>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-on-surface-variant mb-2">Provinsi</label>
                            <input type="text" placeholder="Contoh: Jakarta" class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary transition-all" required/>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-on-surface-variant mb-2">Kota/Kabupaten</label>
                            <input type="text" placeholder="Contoh: Jakarta Selatan" class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary transition-all" required/>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-on-surface-variant mb-2">Alamat Lengkap</label>
                            <textarea placeholder="Jalan, nomor rumah, dll" class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary transition-all h-24 resize-none" required></textarea>
                        </div>
                    </form>
                </div>

                <!-- Metode Pembayaran -->
                <div class="glass-card rounded-xl p-8">
                    <h2 class="font-bold text-xl mb-6 text-white">Metode Pembayaran</h2>
                    
                    <div class="space-y-3">
                        <label class="payment-method active border rounded-lg p-4 flex items-center gap-4">
                            <input type="radio" name="metode_pembayaran" value="transfer-bank" class="w-5 h-5 accent-primary" checked/>
                            <div>
                                <span class="material-symbols-outlined text-primary text-[28px]">account_balance</span>
                            </div>
                            <div>
                                <div class="font-semibold text-white">Transfer Bank</div>
                                <div class="text-xs text-on-surface-variant">Transfer ke rekening XDrew Fashion</div>
                            </div>
                        </label>

                        <label class="payment-method border border-outline-variant rounded-lg p-4 flex items-center gap-4">
                            <input type="radio" name="metode_pembayaran" value="e-wallet" class="w-5 h-5 accent-primary"/>
                            <div>
                                <span class="material-symbols-outlined text-primary text-[28px]">account_balance_wallet</span>
                            </div>
                            <div>
                                <div class="font-semibold text-white">E-Wallet</div>
                                <div class="text-xs text-on-surface-variant">GCash, GoPay, OVO, Dana</div>
                            </div>
                        </label>

                        <label class="payment-method border border-outline-variant rounded-lg p-4 flex items-center gap-4">
                            <input type="radio" name="metode_pembayaran" value="cicilan" class="w-5 h-5 accent-primary"/>
                            <div>
                                <span class="material-symbols-outlined text-primary text-[28px]">credit_card</span>
                            </div>
                            <div>
                                <div class="font-semibold text-white">Cicilan Kartu Kredit</div>
                                <div class="text-xs text-on-surface-variant">0% cicilan hingga 12 bulan</div>
                            </div>
                        </label>

                        <label class="payment-method border border-outline-variant rounded-lg p-4 flex items-center gap-4">
                            <input type="radio" name="metode_pembayaran" value="cod" class="w-5 h-5 accent-primary"/>
                            <div>
                                <span class="material-symbols-outlined text-primary text-[28px]">local_shipping</span>
                            </div>
                            <div>
                                <div class="font-semibold text-white">Bayar di Tempat (COD)</div>
                                <div class="text-xs text-on-surface-variant">Bayar saat barang tiba</div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Bagian Kanan - Ringkasan Harga -->
            <div class="lg:col-span-1">
                <div class="glass-card rounded-xl p-8 sticky top-32">
                    <h2 class="font-bold text-xl mb-6 text-white">Ringkasan Pembayaran</h2>
                    
                    <div class="space-y-4 mb-6 pb-6 border-b border-outline-variant/30">
                        <div class="flex justify-between text-on-surface-variant">
                            <span>Subtotal Produk</span>
                            <span id="subtotal">Rp 0</span>
                        </div>
                        
                        <div class="flex justify-between text-on-surface-variant">
                            <span>Ongkir</span>
                            <span id="ongkir">Rp 0</span>
                        </div>
                        
                        <div class="flex justify-between text-on-surface-variant">
                            <span>Asuransi</span>
                            <span id="asuransi">Rp 0</span>
                        </div>
                        
                        <div class="flex justify-between text-on-surface-variant">
                            <span>Pajak (10%)</span>
                            <span id="pajak">Rp 0</span>
                        </div>
                    </div>

                    <div class="flex justify-between text-lg font-bold text-white mb-8">
                        <span>Total Pembayaran</span>
                        <span id="total" class="text-primary">Rp 0</span>
                    </div>

                    <button onclick="prosesPembayaran()" class="w-full bg-primary text-black font-bold uppercase tracking-widest py-4 rounded-lg hover:scale-[1.02] active:scale-[0.98] transition-all shadow-lg shadow-primary/10 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">check_circle</span>
                        Lanjut Pembayaran
                    </button>

                    <a href="{{ route('keranjang.index') }}" class="w-full mt-3 bg-transparent border border-primary text-primary font-bold uppercase tracking-widest py-4 rounded-lg hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">arrow_back</span>
                        Kembali ke Keranjang
                    </a>
                </div>
            </div>
        </div>

    </main>

    @include('components.footer')

    <script>
        // Data produk dari query parameter atau session
        const queryParams = new URLSearchParams(window.location.search);
        const produkId = queryParams.get('produk_id');
        const jumlah = queryParams.get('jumlah') || 1;
        const ukuran = queryParams.get('ukuran') || 'All Size';

        // Konstanta harga
        const HARGA_ONGKIR = 50000;
        const HARGA_ASURANSI = 10000;
        const PAJAK_PERSEN = 0.1;

        // Update payment method styling
        document.querySelectorAll('input[name="metode_pembayaran"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.payment-method').forEach(el => {
                    el.classList.remove('active');
                    el.classList.add('border-outline-variant');
                });
                this.closest('label').classList.add('active');
                this.closest('label').classList.remove('border-outline-variant');
            });
        });

        // Load produk dari detail.blade.php
        async function loadProdukDetail() {
            if (produkId) {
                try {
                    // Fetch data produk dari database
                    const response = await fetch(`/api/produk/${produkId}`);
                    const produk = await response.json();
                    
                    displayProduk(produk, jumlah, ukuran);
                    hitungTotal(produk.harga * jumlah);
                } catch (error) {
                    console.error('Error loading produk:', error);
                    // Jika API tidak tersedia, tampilkan pesan
                    document.getElementById('produk-list').innerHTML = '<p class="text-error">Gagal memuat data produk</p>';
                }
            } else {
                // Load dari keranjang session atau database
                loadDariKeranjang();
            }
        }

        function displayProduk(produk, qty, size) {
            const htmlProduk = `
                <div class="flex gap-4 pb-4 border-b border-outline-variant/30">
                    <img src="/images/${produk.foto || produk.FOTO}" alt="${produk.nama_produk || produk.NAMA_PRODUK}" class="w-20 h-24 object-cover rounded-lg"/>
                    <div class="flex-1">
                        <h3 class="font-bold text-white">${produk.nama_produk || produk.NAMA_PRODUK}</h3>
                        <p class="text-sm text-on-surface-variant">Ukuran: ${size}</p>
                        <p class="text-sm text-on-surface-variant">Jumlah: ${qty} pcs</p>
                        <p class="font-bold text-primary mt-2">Rp ${formatRupiah(produk.harga * qty)}</p>
                    </div>
                </div>
            `;
            document.getElementById('produk-list').innerHTML = htmlProduk;
        }

        function loadDariKeranjang() {
            // Implementasi jika membayar dari keranjang
            // Ini akan di-handle di controller
            const produkList = document.getElementById('produk-list');
            produkList.innerHTML = `<p class="text-on-surface-variant">Memuat dari keranjang...</p>`;
        }

        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value).replace('Rp', '').trim();
        }

        function hitungTotal(subtotal) {
            const pajak = Math.floor(subtotal * PAJAK_PERSEN);
            const total = subtotal + HARGA_ONGKIR + HARGA_ASURANSI + pajak;

            document.getElementById('subtotal').textContent = 'Rp ' + formatRupiah(subtotal);
            document.getElementById('ongkir').textContent = 'Rp ' + formatRupiah(HARGA_ONGKIR);
            document.getElementById('asuransi').textContent = 'Rp ' + formatRupiah(HARGA_ASURANSI);
            document.getElementById('pajak').textContent = 'Rp ' + formatRupiah(pajak);
            document.getElementById('total').textContent = 'Rp ' + formatRupiah(total);

            // Store untuk digunakan saat submit
            window.totalPembayaran = total;
        }

        function prosesPembayaran() {
            const metode = document.querySelector('input[name="metode_pembayaran"]:checked').value;
            const nama = document.querySelector('input[placeholder="Masukkan nama lengkap"]').value;
            const telepon = document.querySelector('input[placeholder="+62 8xx xxxx xxxx"]').value;
            const provinsi = document.querySelector('input[placeholder="Contoh: Jakarta"]').value;
            const kota = document.querySelector('input[placeholder="Contoh: Jakarta Selatan"]').value;
            const alamat = document.querySelector('textarea').value;

            if (!nama || !telepon || !provinsi || !kota || !alamat) {
                alert('Mohon isi semua data alamat pengiriman');
                return;
            }

            // Create FormData untuk submit
            const formData = new FormData();
            formData.append('metode_pembayaran', metode);
            formData.append('nama_penerima', nama);
            formData.append('nomor_telepon', telepon);
            formData.append('provinsi', provinsi);
            formData.append('kota', kota);
            formData.append('alamat_lengkap', alamat);
            formData.append('total_pembayaran', window.totalPembayaran);
            formData.append('produk_id', produkId);
            formData.append('jumlah', jumlah);
            formData.append('ukuran', ukuran);

            // Submit ke backend untuk proses pembayaran
            fetch('{{ route('checkout.process') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Pembayaran berhasil diproses');
                    window.location.href = data.redirect || '{{ route("home") }}';
                } else {
                    alert(data.message || 'Terjadi kesalahan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal memproses pembayaran');
            });
        }

        // Load data saat halaman dimuat
        document.addEventListener('DOMContentLoaded', loadProdukDetail);
    </script>

</body>
</html>
