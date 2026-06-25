@extends('layouts.profile')

@section('title', 'Pesanan Saya | XDrew Fashion')

@section('content')
<div class="max-w-5xl mx-auto space-y-8 animate-smooth-reveal">
    <header class="mb-8 flex flex-col md:flex-row justify-between md:items-center gap-4">
        <div>
            <h1 class="font-['Outfit'] text-3xl font-extrabold text-[#1A2E26] mb-2 tracking-tight">Pesanan Saya</h1>
            <p class="text-[#1A2E26]/70 text-sm">Lacak dan kelola semua riwayat pembelian Anda.</p>
        </div>
        <a href="{{ route('produk.index') }}" class="flex items-center justify-center gap-2 px-6 py-3 bg-[#10b981] text-white rounded-xl hover:bg-[#0ea5e9] shadow-[0_4px_15px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_25px_rgba(16,185,129,0.3)] transform hover:-translate-y-0.5 transition-all font-bold w-full md:w-auto">
            <span class="material-symbols-outlined text-[20px]">add_shopping_cart</span>
            <span>Belanja Lagi</span>
        </a>
    </header>

    <div class="bg-white/40 backdrop-blur-md rounded-[2rem] p-8 border border-white/60 shadow-lg relative overflow-hidden">
        
        <!-- Status Filter -->
        <div class="flex gap-6 border-b border-[#1A2E26]/10 mb-8 overflow-x-auto pb-4 scrollbar-hide">
            <a href="{{ route('profile.pesanan', ['status' => 'semua']) }}" class="text-sm font-bold {{ ($activeTab ?? 'semua') === 'semua' ? 'text-[#10b981] border-b-2 border-[#10b981]' : 'text-[#1A2E26]/50 hover:text-[#1A2E26] transition-colors' }} pb-4 -mb-[17px] whitespace-nowrap px-1">Semua</a>
            <a href="{{ route('profile.pesanan', ['status' => 'Pending']) }}" class="text-sm font-bold {{ ($activeTab ?? '') === 'Pending' ? 'text-[#10b981] border-b-2 border-[#10b981]' : 'text-[#1A2E26]/50 hover:text-[#1A2E26] transition-colors' }} pb-4 -mb-[17px] whitespace-nowrap px-1">Menunggu Pembayaran</a>
            <a href="{{ route('profile.pesanan', ['status' => 'Diproses']) }}" class="text-sm font-bold {{ ($activeTab ?? '') === 'Diproses' ? 'text-[#10b981] border-b-2 border-[#10b981]' : 'text-[#1A2E26]/50 hover:text-[#1A2E26] transition-colors' }} pb-4 -mb-[17px] whitespace-nowrap px-1">Diproses</a>
            <a href="{{ route('profile.pesanan', ['status' => 'Dikirim']) }}" class="text-sm font-bold {{ ($activeTab ?? '') === 'Dikirim' ? 'text-[#10b981] border-b-2 border-[#10b981]' : 'text-[#1A2E26]/50 hover:text-[#1A2E26] transition-colors' }} pb-4 -mb-[17px] whitespace-nowrap px-1">Dikirim</a>
            <a href="{{ route('profile.pesanan', ['status' => 'Selesai']) }}" class="text-sm font-bold {{ ($activeTab ?? '') === 'Selesai' ? 'text-[#10b981] border-b-2 border-[#10b981]' : 'text-[#1A2E26]/50 hover:text-[#1A2E26] transition-colors' }} pb-4 -mb-[17px] whitespace-nowrap px-1">Selesai</a>
        </div>

        <!-- Order List -->
        <div class="flex flex-col gap-4">
            @forelse($orders ?? [] as $order)
                @php
                    $firstDetail = $order->detailPesanan->first();
                    $firstProduct = $firstDetail ? $firstDetail->produk : null;
                    $firstFoto = $firstProduct ? ($firstProduct->foto ?? $firstProduct->FOTO) : 'default.jpg';
                    $firstNama = $firstProduct ? ($firstProduct->nama_produk ?? $firstProduct->NAMA_PRODUK) : 'Produk XDrew';
                    $itemCount = $order->detailPesanan->count();
                @endphp
            <div class="relative group cursor-pointer" onclick="window.location.href='{{ route('checkout.pesanan.show', $order->id ?? $order->ID) }}'">
                <div class="absolute inset-0 bg-gradient-to-r from-[#10b981]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl blur"></div>
                <div class="relative bg-white/60 backdrop-blur-md rounded-2xl p-5 flex flex-col md:flex-row justify-between md:items-center gap-4 hover:-translate-y-1 transition-all duration-300 border border-white/80 group-hover:border-[#10b981]/40 shadow-sm hover:shadow-md">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-full bg-white/80 flex items-center justify-center border border-white shrink-0 overflow-hidden">
                            <img src="{{ asset('images/' . $firstFoto) }}" alt="{{ $firstNama }}" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/100'">
                        </div>
                        <div>
                            <p class="font-bold uppercase tracking-wider text-[#1A2E26] group-hover:text-[#10b981] transition-colors text-sm flex flex-wrap items-center gap-x-2">
                                <span class="normal-case">{{ $firstNama }}@if($itemCount > 1), (+{{ $itemCount - 1 }} lainnya)@endif</span>
                                <span class="text-xs text-slate-500 font-medium normal-case">— #ORD-{{ $order->id ?? $order->ID }}</span>
                            </p>
                            <p class="text-xs text-[#1A2E26]/60 mt-1">{{ \Carbon\Carbon::parse($order->created_at ?? $order->TANGGAL_PESANAN ?? $order->CREATED_AT)->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between md:justify-end gap-4 md:gap-6 border-t md:border-t-0 border-[#1A2E26]/10 pt-4 md:pt-0">
                        <p class="font-['Outfit'] text-xl font-bold text-[#1A2E26] group-hover:text-[#10b981] transition-colors">Rp {{ number_format($order->total_harga ?? $order->TOTAL_HARGA, 0, ',', '.') }}</p>
                        <span class="bg-[#10b981]/10 backdrop-blur-md text-[#10b981] text-[10px] font-bold px-3 py-1.5 rounded-full border border-[#10b981]/30 tracking-widest uppercase shadow-[0_2px_10px_rgba(16,185,129,0.1)]">
                            {{ $order->status_pesanan ?? $order->STATUS_PESANAN ?? 'Diproses' }}
                        </span>
                        <a href="{{ route('checkout.pesanan.lacak', $order->id ?? $order->ID) }}" 
                           onclick="event.stopPropagation();" 
                           class="bg-[#10b981] hover:bg-[#1A2E26] text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all duration-300 shadow-[0_2px_8px_rgba(16,185,129,0.15)] hover:shadow-[0_4px_12px_rgba(26,46,38,0.2)] whitespace-nowrap">
                            Lacak Pesanan
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="py-16 flex flex-col items-center text-center max-w-md mx-auto bg-white/60 backdrop-blur-md rounded-[2rem] border border-white/80">
                <div class="w-24 h-24 rounded-full bg-white/80 flex items-center justify-center mb-6 border border-white text-[#1A2E26]/40">
                    <span class="material-symbols-outlined text-4xl">inventory_2</span>
                </div>
                <h2 class="font-['Outfit'] text-2xl font-bold text-[#1A2E26] mb-2">Anda belum memiliki pesanan</h2>
                <p class="text-[#1A2E26]/70 mb-8 text-sm">{{ ($activeTab ?? 'semua') !== 'semua' ? 'Tidak ada pesanan dengan status ini.' : 'Semua riwayat belanja Anda akan muncul di sini.' }}</p>
                <a class="px-8 py-3 bg-[#10b981] text-white font-bold rounded-xl shadow-[0_4px_15px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_25px_rgba(16,185,129,0.3)] transition-all flex items-center justify-center gap-2 transform hover:-translate-y-0.5" href="{{ route('produk.index') }}">
                    Mulai Belanja
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection