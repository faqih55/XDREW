@extends('layouts.Front')

@section('title', 'Pesanan Berhasil')

@section('content')
<div class="flex-grow container mx-auto px-4 md:px-6 pt-32 pb-24  max-w-5xl">

        
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-primary/20 border-4 border-primary text-primary mb-6 animate-pulse emerald-glow">
                <span class="material-symbols-outlined text-[48px] font-bold">task_alt</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold font-['Outfit'] text-[#0A1612] tracking-tight mb-3 uppercase drop-shadow-sm">PESANAN BERHASIL</h1>
            <p class="text-[#0A1612]/70 text-lg max-w-2xl mx-auto">Terima kasih telah memilih XDrew Fashion. Langkah kecil Anda hari ini mendukung ekosistem mode yang lebih baik.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 w-full max-w-6xl animate-success" style="animation-delay: 0.2s; opacity: 0;">
            
            <div class="lg:col-span-12 space-y-8">
                <div class="glass-panel p-6 md:p-8 rounded-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-bl-full mix-blend-multiply blur-2xl"></div>
                    <h2 class="text-xs font-bold text-primary uppercase tracking-widest mb-6">Detail Faktur</h2>
                    
                    <div class="space-y-5 relative z-10">
                        <div class="flex justify-between items-end pb-4 border-b border-black/5">
                            <div>
                                <p class="text-[10px] text-[#0A1612]/60 uppercase tracking-widest mb-1">ID Pesanan</p>
                                <p class="text-lg font-bold font-['Outfit'] text-[#0A1612]">#XD-{{ $pesanan->id ?? 'XXXXXX' }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] text-[#0A1612]/60 uppercase tracking-widest mb-1">Tanggal</p>
                                <p class="text-sm font-semibold text-[#0A1612]">{{ isset($pesanan->tanggal_pesanan) ? \Carbon\Carbon::parse($pesanan->tanggal_pesanan)->format('d M Y') : date('d M Y') }}</p>
                            </div>
                        </div>

                        <div class="pb-4 border-b border-black/5">
                            <p class="text-[10px] text-[#0A1612]/60 uppercase tracking-widest mb-2">Metode Pembayaran</p>
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">credit_card</span>
                                <span class="text-sm font-bold text-[#0A1612] uppercase tracking-wider">{{ $pesanan->pembayaran->metode_bayar ?? $pesanan->pembayaran->METODE_BAYAR ?? 'Transfer Bank' }}</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <p class="text-[10px] text-[#0A1612]/60 uppercase tracking-widest mb-4">Item yang Dipesan</p>
                            <div class="space-y-4">
                                @if(isset($pesanan) && $pesanan->detailPesanan)
                                    @foreach($pesanan->detailPesanan as $detail)
                                        <div class="flex items-center gap-4 item-glass p-3 rounded-xl">
                                            <div class="w-16 h-16 bg-black/5 rounded-lg overflow-hidden flex-shrink-0">
                                                <img src="{{ asset('images/' . ($detail->produk->foto ?? 'default.jpg')) }}" alt="Produk" class="w-full h-full object-cover">
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-[#0A1612] text-sm font-bold">{{ $detail->produk->nama_produk ?? 'Produk XDrew' }}</h4>
                                                <p class="text-xs text-[#0A1612]/60 mt-1">{{ $detail->kuantitas ?? 1 }}x @ Rp {{ number_format($detail->harga_satuan ?? 0, 0, ',', '.') }}</p>
                                            </div>
                                            <div class="text-primary text-sm font-bold">
                                                Rp {{ number_format(($detail->kuantitas ?? 1) * ($detail->harga_satuan ?? 0), 0, ',', '.') }}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="flex justify-between items-center pt-6 border-t border-black/5">
                            <span class="text-[#0A1612] font-bold uppercase tracking-widest">Total Akhir</span>
                            <span class="text-primary text-2xl font-black">Rp {{ number_format($pesanan->total_harga ?? 0, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-[10px] text-[#0A1612]/60 uppercase tracking-widest mb-2">Alamat Pengiriman</p>
                        <div class="bg-white/60 p-4 rounded-xl border border-white/60">
                            <p class="text-sm text-[#0A1612] leading-relaxed">
                                {{ $pesanan->pengiriman->alamat_tujuan ?? $pesanan->pengiriman->ALAMAT_TUJUAN ?? 'Alamat pengiriman belum ditentukan.' }}
                            </p>
                        </div>
                    </div>

                    <div class="glass-panel p-6 md:p-8 rounded-2xl relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent"></div>
                        <div class="relative z-10 flex gap-5 items-start">
                            <div class="w-12 h-12 rounded-full bg-white/60 border border-white/60 flex items-center justify-center flex-shrink-0 text-primary">
                                <span class="material-symbols-outlined text-[24px]">eco</span>
                            </div>
                            <div>
                                <h2 class="text-xs font-bold text-[#0A1612]/70 uppercase tracking-widest mb-2">Dampak Positif Anda</h2>
                                <p class="text-[#0A1612] text-sm leading-relaxed mb-4">Melalui pesanan ini, Anda telah berkontribusi pada pengurangan limbah tekstil dan mendukung kemasan 100% biodegradable.</p>
                                <div class="flex gap-4">
                                    <div class="text-center bg-white/60 px-4 py-2 rounded-lg border border-white/60 shadow-sm">
                                        <p class="text-primary font-black text-lg">1.2kg</p>
                                        <p class="text-[#0A1612]/60 text-[9px] uppercase tracking-wider">Karbon Dihemat</p>
                                    </div>
                                    <div class="text-center bg-white/60 px-4 py-2 rounded-lg border border-white/60 shadow-sm">
                                        <p class="text-primary font-black text-lg">1</p>
                                        <p class="text-[#0A1612]/60 text-[9px] uppercase tracking-wider">Pohon Ditanam</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="{{ route('checkout.pesanan.lacak', $pesanan->id ?? $pesanan->ID ?? 0) }}" class="w-full bg-primary text-white py-4 rounded-xl flex items-center justify-center gap-2 font-bold text-sm uppercase tracking-widest hover:scale-[1.02] active:scale-95 transition-all duration-200 emerald-glow shadow-[0_4px_15px_rgba(16,185,129,0.3)]">
                        <span class="material-symbols-outlined text-[20px]">local_shipping</span>
                        Lacak Pesanan Saya
                    </a>
                    <a href="{{ route('produk.index') }}" class="w-full glass-btn-secondary text-[#0A1612] hover:text-primary py-4 rounded-xl flex items-center justify-center gap-2 font-bold text-sm uppercase tracking-widest shadow-sm">
                        <span class="material-symbols-outlined text-[20px]">storefront</span>
                        Kembali Belanja
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

        .glass-panel {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        .emerald-glow {
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.15);
        }

        .item-glass {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.8);
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

        @keyframes success-pop {
            0% { transform: scale(0.8); opacity: 0; }
            70% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }
        .animate-success { animation: success-pop 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F9FAFB; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #10b981; }
    </style>
@endpush
