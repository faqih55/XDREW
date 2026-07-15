@php
    $currentRoute = request()->route()?->getName() ?? '';
    $statusRaw = $pesanan->status_pesanan ?? $pesanan->STATUS_PESANAN ?? 'Pending';
    $status = strtolower(trim($statusRaw));
    
    // Status Timeline Step Activations
    $step1_active = true; // Created is always active
    $step2_active = in_array($status, ['dikonfirmasi', 'konfirmasi pembayaran', 'diproses', 'dikirim', 'selesai']);
    $step3_active = in_array($status, ['diproses', 'dikirim', 'selesai']);
    $step4_active = in_array($status, ['dikirim', 'selesai']);
    $step5_active = ($status === 'selesai');

    // Check if pembayaran has been marked as Lunas or Paid
    $isPaid = $pesanan->pembayaran && in_array(strtolower($pesanan->pembayaran->STATUS_BAYAR ?? $pesanan->pembayaran->status_bayar ?? ''), ['lunas', 'paid', 'dikonfirmasi', 'selesai']);
    $step2_active = $step2_active || $isPaid;
@endphp

@extends('layouts.Front')

@section('title', 'Lacak Pesanan')

@section('content')
<div class="flex-grow pt-32 pb-20 px-4 md:px-8 max-w-[1440px] mx-auto w-full">

        <!-- Breadcrumb & Header -->
        <header class="mb-10 text-center md:text-left">
            <div class="flex items-center gap-2 text-[#0A1612]/60 text-xs font-semibold tracking-wider uppercase mb-3 justify-center md:justify-start">
                <a class="hover:text-primary transition-colors" href="{{ route('profile.show') }}">Akun</a>
                <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                <a class="hover:text-primary transition-colors" href="{{ route('profile.pesanan') }}">Pesanan</a>
                <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                <span class="text-[#0A1612]">Lacak Pesanan</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold font-['Outfit'] text-[#0A1612] tracking-tight mb-2 uppercase">LACAK PESANAN</h1>
            <p class="text-[#0A1612]/70 font-['Poppins']">Informasi real-time perjalanan koleksi fashion ramah lingkungan Anda.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Left Column: Timeline -->
            <div class="lg:col-span-7">
                <div class="glass-panel p-6 md:p-8 rounded-2xl">
                    
                    @if($status === 'Dibatalkan')
                        <div class="mb-8 p-4 border border-red-500/20 bg-red-500/5 text-red-400 rounded-xl flex items-center gap-3">
                            <span class="material-symbols-outlined">cancel</span>
                            <div class="text-xs font-semibold tracking-wider uppercase">PESANAN DIBATALKAN: Pesanan ini telah dibatalkan oleh admin atau pelanggan.</div>
                        </div>
                    @endif

                    <div class="flex flex-col gap-10">
                        <!-- Step 1: Pesanan Dibuat -->
                        <div class="timeline-step relative active flex gap-5">
                            <div class="relative z-10 w-6 h-6 rounded-full bg-primary border-4 border-[#F7F9F8] flex items-center justify-center emerald-glow">
                                <span class="material-symbols-outlined text-[10px] text-white font-black">check</span>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold font-['Outfit'] text-primary mb-1 uppercase tracking-wider">Pesanan Dibuat</h3>
                                <p class="text-[#0A1612]/70 text-[11px] font-medium">{{ isset($pesanan->created_at) ? $pesanan->created_at->format('d M Y • H:i') : date('d M Y • H:i') }}</p>
                                <p class="text-[#0A1612]/60 mt-2 text-xs leading-relaxed max-w-md">Pesanan Anda telah masuk ke sistem kami dan menunggu verifikasi pembayaran.</p>
                            </div>
                        </div>

                        <!-- Step 2: Pembayaran Dikonfirmasi -->
                        <div class="timeline-step relative {{ $step2_active ? 'active' : '' }} flex gap-5">
                            @if($step2_active)
                                <div class="relative z-10 w-6 h-6 rounded-full bg-primary border-4 border-[#F7F9F8] flex items-center justify-center emerald-glow">
                                    <span class="material-symbols-outlined text-[10px] text-white font-black">check</span>
                                </div>
                            @else
                                <div class="relative z-10 w-6 h-6 rounded-full bg-white border-4 border-[#F7F9F8] shadow-sm flex items-center justify-center">
                                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                                </div>
                            @endif
                            <div>
                                <h3 class="text-sm font-bold font-['Outfit'] {{ $step2_active ? 'text-primary' : 'text-[#0A1612]/50' }} mb-1 uppercase tracking-wider">Pembayaran Dikonfirmasi</h3>
                                <p class="text-[#0A1612]/70 text-[11px] font-medium">
                                    {{ $step2_active ? ($pesanan->pembayaran && $pesanan->pembayaran->updated_at ? $pesanan->pembayaran->updated_at->format('d M Y • H:i') : $pesanan->updated_at->format('d M Y • H:i')) : 'Menunggu Pembayaran' }}
                                </p>
                                <p class="text-[#0A1612]/60 mt-2 text-xs leading-relaxed max-w-md">Dana telah kami terima. Tim kami mulai mempersiapkan paket busana berkelanjutan Anda.</p>
                            </div>
                        </div>

                        <!-- Step 3: Diproses -->
                        <div class="timeline-step relative {{ $step3_active ? 'active' : '' }} flex gap-5">
                            @if($step3_active)
                                <div class="relative z-10 w-6 h-6 rounded-full bg-primary border-4 border-[#F7F9F8] flex items-center justify-center emerald-glow">
                                    <span class="material-symbols-outlined text-[10px] text-white font-black">check</span>
                                </div>
                            @else
                                <div class="relative z-10 w-6 h-6 rounded-full bg-white border-4 border-[#F7F9F8] shadow-sm flex items-center justify-center">
                                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                                </div>
                            @endif
                            <div>
                                <h3 class="text-sm font-bold font-['Outfit'] {{ $step3_active ? 'text-primary' : 'text-[#0A1612]/50' }} mb-1 uppercase tracking-wider">Sedang Diproses</h3>
                                <p class="text-[#0A1612]/70 text-[11px] font-medium">
                                    {{ $step3_active ? $pesanan->updated_at->format('d M Y • H:i') : 'Menunggu' }}
                                </p>
                                <p class="text-[#0A1612]/60 mt-2 text-xs leading-relaxed max-w-md">Item Anda dikemas dengan hati-hati menggunakan box daur ulang ramah lingkungan.</p>
                            </div>
                        </div>

                        <!-- Step 4: Dikirim -->
                        <div class="timeline-step relative {{ $step4_active ? 'active' : '' }} flex gap-5">
                            @if($step4_active)
                                <div class="relative z-10 w-6 h-6 rounded-full bg-primary border-4 border-[#F7F9F8] flex items-center justify-center emerald-glow">
                                    <span class="material-symbols-outlined text-[10px] text-white font-black">check</span>
                                </div>
                            @else
                                <div class="relative z-10 w-6 h-6 rounded-full bg-white border-4 border-[#F7F9F8] shadow-sm flex items-center justify-center">
                                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                                </div>
                            @endif
                            <div>
                                <h3 class="text-sm font-bold font-['Outfit'] {{ $step4_active ? 'text-primary' : 'text-[#0A1612]/50' }} mb-1 uppercase tracking-wider">Dikirim</h3>
                                <p class="text-[#0A1612]/70 text-[11px] font-medium">
                                    {{ $step4_active ? ($pesanan->pengiriman && $pesanan->pengiriman->updated_at ? $pesanan->pengiriman->updated_at->format('d M Y • H:i') : $pesanan->updated_at->format('d M Y • H:i')) : 'Menunggu Kurir' }}
                                </p>
                                <p class="text-[#0A1612]/60 mt-2 text-xs leading-relaxed max-w-md">Paket diserahkan ke kurir pengiriman. Anda bisa melacak nomor resi di sebelah kanan.</p>
                            </div>
                        </div>

                        <!-- Step 5: Sampai -->
                        <div class="timeline-step relative {{ $step5_active ? 'active' : '' }} flex gap-5">
                            @if($step5_active)
                                <div class="relative z-10 w-6 h-6 rounded-full bg-primary border-4 border-[#F7F9F8] flex items-center justify-center emerald-glow">
                                    <span class="material-symbols-outlined text-[10px] text-white font-black">check</span>
                                </div>
                            @else
                                <div class="relative z-10 w-6 h-6 rounded-full bg-white border-4 border-[#F7F9F8] shadow-sm flex items-center justify-center">
                                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                                </div>
                            @endif
                            <div>
                                <h3 class="text-sm font-bold font-['Outfit'] {{ $step5_active ? 'text-primary' : 'text-[#0A1612]/50' }} mb-1 uppercase tracking-wider">Sampai di Tujuan</h3>
                                <p class="text-[#0A1612]/70 text-[11px] font-medium">
                                    {{ $step5_active ? ($pesanan->pengiriman && $pesanan->pengiriman->updated_at ? $pesanan->pengiriman->updated_at->format('d M Y • H:i') : $pesanan->updated_at->format('d M Y • H:i')) : 'Menunggu Kedatangan' }}
                                </p>
                                <p class="text-[#0A1612]/60 mt-2 text-xs leading-relaxed max-w-md">Koleksi fashion Anda telah sampai di depan pintu rumah dengan selamat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Details & Map -->
            <div class="lg:col-span-5 space-y-6">
                <!-- Order Overview Card -->
                <div class="glass-panel p-6 md:p-8 rounded-2xl border-l-4 border-l-primary">
                    <h2 class="text-xs font-bold text-primary uppercase tracking-widest mb-4">Informasi Faktur</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b border-black/5">
                            <span class="text-[#0A1612]/70 text-xs font-medium">ID Pesanan</span>
                            <span class="font-bold text-sm tracking-wide text-[#0A1612]">#XD-{{ $pesanan->id ?? $pesanan->ID }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-black/5">
                            <span class="text-[#0A1612]/70 text-xs font-medium">Tanggal Pembelian</span>
                            <span class="text-[#0A1612] text-xs font-semibold">{{ isset($pesanan->tanggal_pesanan) ? \Carbon\Carbon::parse($pesanan->tanggal_pesanan)->format('d M Y') : ($pesanan->created_at ? $pesanan->created_at->format('d M Y') : date('d M Y')) }}</span>
                        </div>
                        <div class="py-2">
                            <span class="text-[#0A1612]/70 text-xs font-medium block mb-2">Alamat Penerima</span>
                            <p class="text-[#0A1612] text-xs leading-relaxed whitespace-pre-line font-medium">
                                {{ $pesanan->pengiriman->alamat_tujuan ?? $pesanan->pengiriman->ALAMAT_TUJUAN ?? 'Alamat pengiriman belum ditentukan.' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Product Preview Card -->
                <div class="glass-panel p-6 md:p-8 rounded-2xl">
                    <h2 class="text-xs font-bold text-[#0A1612]/70 uppercase tracking-widest mb-4">Item Pengiriman</h2>
                    <div class="space-y-4 max-h-[220px] overflow-y-auto pr-2">
                        @if(isset($pesanan->detailPesanan) && $pesanan->detailPesanan->count() > 0)
                            @foreach($pesanan->detailPesanan as $detail)
                                <div class="flex gap-4 items-center group border-b border-black/5 pb-3 last:border-0 last:pb-0">
                                    <div class="w-16 h-20 overflow-hidden rounded bg-white/60 border border-white/60 flex-shrink-0">
                                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0" src="{{ asset('images/' . ($detail->produk->foto ?? $detail->produk->FOTO ?? 'default.jpg')) }}" alt="Foto Produk"/>
                                    </div>
                                    <div class="flex-grow min-w-0">
                                        <h4 class="text-[#0A1612] font-bold text-xs truncate uppercase tracking-wider">{{ $detail->produk->nama_produk ?? $detail->produk->NAMA_PRODUK ?? 'Produk XDrew' }}</h4>
                                        <p class="text-[#0A1612]/70 text-[11px] mt-0.5">Ukuran: {{ $detail->ukuran ?? $detail->UKURAN ?? 'Semua Ukuran' }} | {{ $detail->kuantitas ?? $detail->KUANTITAS ?? 1 }}x</p>
                                        <p class="text-primary font-bold text-xs mt-1 drop-shadow-sm">Rp {{ number_format(($detail->harga_satuan ?? $detail->HARGA_SATUAN ?? 0) * ($detail->kuantitas ?? $detail->KUANTITAS ?? 1), 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Map / Location Mockup -->
                <div class="relative h-44 rounded-2xl overflow-hidden glass-panel border border-white/60 group">
                    <img class="w-full h-full object-cover grayscale opacity-40 group-hover:opacity-60 transition-opacity" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcc5UGbwe_jDYMRPd32vrMGQU78Y5PEIFqcD3C97oxYIwTAlhNlS0b84PHV-54fmHO6r3q3bHicfh4ytpAWyWptocWqMvL54Cvc9si3Vu0J9J4vA_SUPsQhkaJCwTBpGNgeH9XdZK1NDtGyyCsf0kv7RYLhsHWFr8kyTmiHvdV9aob4BKr3wotylWDg9KR1T9rpkxdnHE3v3Xzd2luwqcT6P1fiopHr4Sifa5QGX64tLNfLU1DWnf0mo3w1ZpOWGjfKxKkh2r2Gi2O" alt="Peta Lokasi"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-white/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[20px] animate-pulse">location_on</span>
                            <span class="text-[10px] font-bold text-[#0A1612] uppercase tracking-widest truncate">
                                @if($status === 'selesai')
                                    Tiba: Paket telah sampai di alamat tujuan
                                @elseif($status === 'dikirim')
                                    Transit: {{ $pesanan->pengiriman->KURIR ?? 'Kurir' }} (Resi: {{ $pesanan->pengiriman->NOMOR_RESI ?? 'Proses' }})
                                @elseif($status === 'diproses')
                                    Gudang: Sedang dikemas di Fasilitas Utama
                                @elseif($status === 'konfirmasi pembayaran' || $status === 'dikonfirmasi')
                                    Mempersiapkan: Pembayaran terverifikasi, menunggu pengemasan
                                @else
                                    Mempersiapkan: Menunggu konfirmasi pembayaran
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="space-y-4 pt-2">
                    <a class="w-full bg-primary text-white py-4 rounded-xl flex items-center justify-center gap-2 font-bold text-sm uppercase tracking-widest hover:scale-[1.02] active:scale-95 transition-all duration-200 emerald-glow shadow-[0_4px_15px_rgba(16,185,129,0.3)]" href="{{ route('produk.index') }}">
                        <span class="material-symbols-outlined text-[20px]">shopping_bag</span>
                        Kembali Belanja
                    </a>
                    <a href="https://wa.me/6281234567890?text=Halo%20XDrew%20Fashion,%20saya%20butuh%20bantuan%20dengan%20pesanan%20saya%20%23XD-{{ $pesanan->id ?? $pesanan->ID }}" target="_blank" class="w-full block text-center bg-transparent border border-[#1A2E26]/20 text-[#0A1612] py-4 rounded-xl font-bold text-[11px] uppercase tracking-widest hover:bg-[#1A2E26]/5 transition-colors">
                        Butuh Bantuan? Hubungi Dukungan
                    </a>
                </div>
            </div>
        </div>
    
</div>
@endsection


@push('styles')
<style>
        body { background-color: #F9FAFB; color: #1A2E26; font-family: 'Poppins', sans-serif; overflow-x: hidden; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; display: inline-block; vertical-align: middle; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F9FAFB; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #10b981; }

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

        /* Premium Glass Panel */
        .glass-panel {
            background: rgba(255, 255, 255, 0.4) !important; 
            backdrop-filter: blur(28px) saturate(220%) !important; 
            -webkit-backdrop-filter: blur(28px) saturate(220%) !important; 
            border: 1px solid rgba(255, 255, 255, 0.6) !important; 
            box-shadow: 
                0 16px 40px -10px rgba(98, 124, 112, 0.15), 
                inset 0 1px 3px rgba(255, 255, 255, 0.8) !important;
            transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .glass-panel:hover {
            border-color: rgba(16, 185, 129, 0.4) !important;
            box-shadow: 0 20px 45px rgba(98, 124, 112, 0.2), inset 0 1px 3px rgba(255,255,255,0.8) !important;
        }

        .emerald-glow {
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.15);
        }
        
        .timeline-step::before {
            content: '';
            position: absolute;
            left: 11px;
            top: 24px;
            bottom: -24px;
            width: 2px;
            background: rgba(15, 23, 42, 0.1);
        }
        .timeline-step:last-child::before {
            display: none;
        }
        .timeline-step.active::before {
            background: #10b981;
            box-shadow: 0 0 10px rgba(16, 185, 129, 0.2);
        }

        .glass-btn-secondary {
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .glass-btn-secondary:hover {
            background: rgba(255, 255, 255, 0.8);
            border-color: rgba(16, 185, 129, 0.4);
            box-shadow: inset 0 1px 1px rgba(255,255,255,0.8), 0 4px 12px rgba(98, 124, 112, 0.15);
            color: #10b981;
            transform: translateY(-2px);
        }
    </style>
@endpush


@push('scripts')
<script>
        // Micro-interaction for timeline hover
        document.querySelectorAll('.timeline-step').forEach(step => {
            step.addEventListener('mouseenter', () => {
                if(step.classList.contains('active')) {
                    step.querySelector('.emerald-glow')?.style.setProperty('box-shadow', '0 0 30px rgba(16, 185, 129, 0.3)');
                }
            });
            step.addEventListener('mouseleave', () => {
                if(step.classList.contains('active')) {
                    step.querySelector('.emerald-glow')?.style.setProperty('box-shadow', '0 0 20px rgba(16, 185, 129, 0.15)');
                }
            });
        });
    </script>
@endpush
