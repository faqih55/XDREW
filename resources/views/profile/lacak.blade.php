@extends('layouts.profile')

@section('title', 'Lacak Pesanan | XDrew Fashion')

@section('content')
<div class="max-w-5xl mx-auto space-y-8 animate-smooth-reveal">
    <header class="mb-8">
        <h1 class="font-['Outfit'] text-3xl font-extrabold text-[#1A2E26] mb-2 tracking-tight">Lacak Pesanan</h1>
        <p class="text-[#1A2E26]/70 text-sm">Cari atau pilih nomor pesanan Anda untuk melacak pengiriman secara real-time.</p>
    </header>

    <div class="bg-white/40 backdrop-blur-md rounded-[2rem] p-8 border border-white/60 shadow-lg space-y-8">
        <!-- Search Form -->
        <form action="{{ route('profile.lacak') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-grow group">
                <label class="text-xs text-[#1A2E26]/70 block mb-2 font-bold group-focus-within:text-[#10b981] transition-colors">Pilih Pesanan Anda</label>
                <select name="order_id" class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#1A2E26] focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] transition-all duration-300">
                    <option value="">-- Pilih Nomor Pesanan --</option>
                    @foreach($orders as $order)
                        @php
                            $dateStr = \Carbon\Carbon::parse($order->created_at ?? $order->TANGGAL_PESANAN ?? $order->CREATED_AT)->format('d M Y');
                            $priceStr = number_format($order->total_harga ?? $order->TOTAL_HARGA, 0, ',', '.');
                            $selected = ($orderId == ($order->id ?? $order->ID)) ? 'selected' : '';
                        @endphp
                        <option value="{{ $order->id ?? $order->ID }}" {{ $selected }}>
                            #ORD-{{ $order->id ?? $order->ID }} — Rp {{ $priceStr }} ({{ $dateStr }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full md:w-auto px-8 py-3 bg-[#10b981] text-white font-bold rounded-xl shadow-[0_4px_15px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_25px_rgba(16,185,129,0.3)] hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">search</span>
                    Lacak
                </button>
            </div>
        </form>

        @if(session('error'))
            <div class="px-4 py-3 bg-[#e11d48]/10 border border-[#e11d48]/30 text-[#e11d48] rounded-xl font-bold flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">error</span>
                {{ session('error') }}
            </div>
        @endif

        <!-- Tracking Result -->
        @if($searchedOrder)
            @php
                $statusRaw = $searchedOrder->status_pesanan ?? $searchedOrder->STATUS_PESANAN ?? 'Pending';
                $status = strtolower(trim($statusRaw));
                
                $step1_active = true;
                $step2_active = in_array($status, ['dikonfirmasi', 'konfirmasi pembayaran', 'diproses', 'dikirim', 'selesai']);
                $step3_active = in_array($status, ['diproses', 'dikirim', 'selesai']);
                $step4_active = in_array($status, ['dikirim', 'selesai']);
                $step5_active = ($status === 'selesai');

                $isPaid = $searchedOrder->pembayaran && in_array(strtolower($searchedOrder->pembayaran->STATUS_BAYAR ?? $searchedOrder->pembayaran->status_bayar ?? ''), ['lunas', 'paid', 'dikonfirmasi', 'selesai']);
                $step2_active = $step2_active || $isPaid;
            @endphp
            
            <div class="border-t border-[#1A2E26]/10 pt-8 grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Left: Timeline -->
                <div class="lg:col-span-7 space-y-6">
                    <h3 class="font-['Outfit'] text-lg font-bold text-[#1A2E26]">Status Perjalanan</h3>
                    <div class="flex flex-col gap-10 pl-2">
                        <!-- Step 1 -->
                        <div class="timeline-step relative active flex gap-5">
                            <div class="relative z-10 w-6 h-6 rounded-full bg-[#10b981] border-4 border-[#EAF3EF] flex items-center justify-center shadow-md">
                                <span class="material-symbols-outlined text-[10px] text-white font-black">check</span>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-[#10b981] mb-1 uppercase tracking-wider">Pesanan Dibuat</h4>
                                <p class="text-[#1A2E26]/50 text-[10px] font-medium">{{ isset($searchedOrder->created_at) ? \Carbon\Carbon::parse($searchedOrder->created_at)->format('d M Y • H:i') : (isset($searchedOrder->tanggal_pesanan) ? \Carbon\Carbon::parse($searchedOrder->tanggal_pesanan)->format('d M Y • H:i') : date('d M Y • H:i')) }}</p>
                                <p class="text-[#1A2E26]/60 mt-1 text-xs leading-relaxed">Pesanan Anda telah diterima sistem kami.</p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="timeline-step relative {{ $step2_active ? 'active' : '' }} flex gap-5">
                            @if($step2_active)
                                <div class="relative z-10 w-6 h-6 rounded-full bg-[#10b981] border-4 border-[#EAF3EF] flex items-center justify-center shadow-md">
                                    <span class="material-symbols-outlined text-[10px] text-white font-black">check</span>
                                </div>
                            @else
                                <div class="relative z-10 w-6 h-6 rounded-full bg-white border-4 border-[#EAF3EF] shadow-sm flex items-center justify-center">
                                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                                </div>
                            @endif
                            <div>
                                <h4 class="text-sm font-bold {{ $step2_active ? 'text-[#10b981]' : 'text-[#1A2E26]/40' }} mb-1 uppercase tracking-wider">Pembayaran Dikonfirmasi</h4>
                                <p class="text-[#1A2E26]/50 text-[10px] font-medium">
                                    {{ $step2_active ? ($searchedOrder->pembayaran && $searchedOrder->pembayaran->updated_at ? \Carbon\Carbon::parse($searchedOrder->pembayaran->updated_at)->format('d M Y • H:i') : \Carbon\Carbon::parse($searchedOrder->updated_at)->format('d M Y • H:i')) : 'Menunggu Pembayaran' }}
                                </p>
                                <p class="text-[#1A2E26]/60 mt-1 text-xs leading-relaxed">Verifikasi transaksi pembayaran Anda berhasil.</p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="timeline-step relative {{ $step3_active ? 'active' : '' }} flex gap-5">
                            @if($step3_active)
                                <div class="relative z-10 w-6 h-6 rounded-full bg-[#10b981] border-4 border-[#EAF3EF] flex items-center justify-center shadow-md">
                                    <span class="material-symbols-outlined text-[10px] text-white font-black">check</span>
                                </div>
                            @else
                                <div class="relative z-10 w-6 h-6 rounded-full bg-white border-4 border-[#EAF3EF] shadow-sm flex items-center justify-center">
                                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                                </div>
                            @endif
                            <div>
                                <h4 class="text-sm font-bold {{ $step3_active ? 'text-[#10b981]' : 'text-[#1A2E26]/40' }} mb-1 uppercase tracking-wider">Sedang Diproses</h4>
                                <p class="text-[#1A2E26]/50 text-[10px] font-medium">
                                    {{ $step3_active ? \Carbon\Carbon::parse($searchedOrder->updated_at)->format('d M Y • H:i') : 'Menunggu' }}
                                </p>
                                <p class="text-[#1A2E26]/60 mt-1 text-xs leading-relaxed">Item Anda sedang dikemas di gudang utama kami.</p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="timeline-step relative {{ $step4_active ? 'active' : '' }} flex gap-5">
                            @if($step4_active)
                                <div class="relative z-10 w-6 h-6 rounded-full bg-[#10b981] border-4 border-[#EAF3EF] flex items-center justify-center shadow-md">
                                    <span class="material-symbols-outlined text-[10px] text-white font-black">check</span>
                                </div>
                            @else
                                <div class="relative z-10 w-6 h-6 rounded-full bg-white border-4 border-[#EAF3EF] shadow-sm flex items-center justify-center">
                                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                                </div>
                            @endif
                            <div>
                                <h4 class="text-sm font-bold {{ $step4_active ? 'text-[#10b981]' : 'text-[#1A2E26]/40' }} mb-1 uppercase tracking-wider">Dikirim</h4>
                                <p class="text-[#1A2E26]/50 text-[10px] font-medium">
                                    {{ $step4_active ? ($searchedOrder->pengiriman && $searchedOrder->pengiriman->updated_at ? \Carbon\Carbon::parse($searchedOrder->pengiriman->updated_at)->format('d M Y • H:i') : \Carbon\Carbon::parse($searchedOrder->updated_at)->format('d M Y • H:i')) : 'Menunggu Kurir' }}
                                </p>
                                <p class="text-[#1A2E26]/60 mt-1 text-xs leading-relaxed">Paket telah diserahkan kepada kurir pengiriman.</p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div class="timeline-step relative {{ $step5_active ? 'active' : '' }} flex gap-5">
                            @if($step5_active)
                                <div class="relative z-10 w-6 h-6 rounded-full bg-[#10b981] border-4 border-[#EAF3EF] flex items-center justify-center shadow-md">
                                    <span class="material-symbols-outlined text-[10px] text-white font-black">check</span>
                                </div>
                            @else
                                <div class="relative z-10 w-6 h-6 rounded-full bg-white border-4 border-[#EAF3EF] shadow-sm flex items-center justify-center">
                                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                                </div>
                            @endif
                            <div>
                                <h4 class="text-sm font-bold {{ $step5_active ? 'text-[#10b981]' : 'text-[#1A2E26]/40' }} mb-1 uppercase tracking-wider">Sampai di Tujuan</h4>
                                <p class="text-[#1A2E26]/50 text-[10px] font-medium">
                                    {{ $step5_active ? ($searchedOrder->pengiriman && $searchedOrder->pengiriman->updated_at ? \Carbon\Carbon::parse($searchedOrder->pengiriman->updated_at)->format('d M Y • H:i') : \Carbon\Carbon::parse($searchedOrder->updated_at)->format('d M Y • H:i')) : 'Menunggu Kedatangan' }}
                                </p>
                                <p class="text-[#1A2E26]/60 mt-1 text-xs leading-relaxed">Paket telah sampai di alamat tujuan pengiriman.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Courier Info -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="bg-white/60 backdrop-blur-md border border-white/80 p-6 rounded-2xl space-y-4 shadow-sm">
                        <h3 class="font-['Outfit'] text-sm font-bold text-[#1A2E26] uppercase tracking-wider">Detail Pengiriman</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b border-[#1A2E26]/5 pb-2 text-xs">
                                <span class="text-[#1A2E26]/60">Kurir</span>
                                <span class="font-bold text-[#1A2E26]">{{ $searchedOrder->pengiriman->KURIR ?? $searchedOrder->pengiriman->kurir ?? 'JNE / J&T / Sicepat' }}</span>
                            </div>
                            <div class="flex justify-between border-b border-[#1A2E26]/5 pb-2 text-xs">
                                <span class="text-[#1A2E26]/60">No. Resi</span>
                                <span class="font-bold text-[#10b981]">{{ $searchedOrder->pengiriman->NOMOR_RESI ?? $searchedOrder->pengiriman->nomor_resi ?? 'Belum Tersedia' }}</span>
                            </div>
                            <div class="flex justify-between pb-1 text-xs">
                                <span class="text-[#1A2E26]/60">Status</span>
                                <span class="font-bold text-white bg-[#10b981] text-[10px] px-2 py-0.5 rounded-full uppercase tracking-wider">{{ $status }}</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('checkout.pesanan.lacak', $searchedOrder->id ?? $searchedOrder->ID) }}" class="w-full bg-[#10b981] text-white py-3 rounded-xl flex items-center justify-center gap-2 font-bold text-xs uppercase tracking-widest hover:bg-[#1A2E26] shadow-[0_4px_12px_rgba(16,185,129,0.2)] hover:shadow-md transition-all duration-300">
                        <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                        Buka Halaman Lacak Penuh
                    </a>
                </div>

            </div>
        @elseif($orderId)
            <div class="text-center py-10">
                <p class="text-[#1A2E26]/50 text-sm">Pilih pesanan Anda di atas untuk melacak.</p>
            </div>
        @else
            <div class="text-center py-12 bg-white/20 border border-dashed border-[#1A2E26]/10 rounded-2xl">
                <span class="material-symbols-outlined text-4xl text-[#1A2E26]/30 mb-2">local_shipping</span>
                <p class="text-[#1A2E26]/60 text-sm font-semibold">Belum Ada Pesanan yang Dilacak</p>
                <p class="text-[#1A2E26]/40 text-xs mt-1">Silakan pilih nomor pesanan pada dropdown untuk melihat status pengiriman.</p>
            </div>
        @endif

    </div>
</div>

<style>
    .timeline-step::before {
        content: '';
        position: absolute;
        left: 11px;
        top: 24px;
        bottom: -24px;
        width: 2px;
        background: rgba(26, 46, 38, 0.08);
    }
    .timeline-step:last-child::before {
        display: none;
    }
    .timeline-step.active::before {
        background: #10b981;
    }
</style>
@endsection
