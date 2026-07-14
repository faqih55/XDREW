@extends('layouts.profile')

@section('title', 'Profil Saya | XDrew Fashion')

@section('content')
<div class="max-w-5xl mx-auto space-y-8 animate-smooth-reveal">
    <header class="mb-8">
        <h1 class="font-['Outfit'] text-3xl font-extrabold text-[#0A1612] mb-2 tracking-tight">Profil Saya</h1>
        <p class="text-[#0A1612]/70 text-sm">Kelola informasi akun Anda untuk pengalaman yang lebih baik.</p>
    </header>

    <div class="flex flex-col gap-8">
        <!-- Profile Card -->
        <div class="bg-white/40 backdrop-blur-md relative overflow-hidden rounded-[2rem] p-8 flex flex-col md:flex-row items-center gap-8 border border-white/60 shadow-lg group">
            <!-- Subtle Glow -->
            <div class="absolute inset-0 bg-gradient-to-br from-[#10b981]/10 via-transparent to-transparent opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
            
            <!-- FOTO PROFIL DENGAN LOGIKA PINTAR -->
            <div class="relative w-32 h-32 rounded-full overflow-hidden border-2 border-[#10b981]/50 shadow-[0_4px_20px_rgba(16,185,129,0.15)] shrink-0 group-hover:scale-105 transition-transform duration-500 bg-white">
                @php
                    $foto = $user->foto ?? $user->FOTO;
                    $nama = $user->nama_lengkap ?? $user->NAMA_LENGKAP ?? $user->nama_pelanggan ?? $user->NAMA_PELANGGAN ?? 'Pelanggan';
                    
                    // Logika Pintar Deteksi URL Foto
                    $fotoUrl = null;
                    if ($foto) {
                        if (str_starts_with($foto, 'http')) {
                            $fotoUrl = $foto; // Jika dari Google / URL luar
                        } elseif (file_exists(public_path('images/' . $foto))) {
                            $fotoUrl = asset('images/' . $foto); // Jika ada di public/images
                        } else {
                            // Default ke storage Laravel
                            $fotoUrl = asset('storage/' . str_replace('public/', '', $foto)); 
                        }
                    }
                    $defaultAvatar = 'https://ui-avatars.com/api/?name=' . urlencode($nama) . '&background=10b981&color=fff&size=200&bold=true';
                @endphp

                @if($fotoUrl)
                    <img src="{{ $fotoUrl }}" 
                         alt="Profile" 
                         class="w-full h-full object-cover"
                         onerror="this.onerror=null; this.src='{{ $defaultAvatar }}';">
                @else
                    <img src="{{ $defaultAvatar }}" 
                         alt="Profile" 
                         class="w-full h-full object-cover">
                @endif
            </div>
            
            <div class="text-center md:text-left flex-grow relative z-10">
                <h2 class="font-['Outfit'] text-3xl font-bold mb-2 uppercase tracking-wide text-[#0A1612]">{{ $user->nama_lengkap ?? $user->NAMA_LENGKAP ?? 'Pelanggan XDrew' }}</h2>
                <p class="text-[#0A1612]/70 mb-4 flex items-center justify-center md:justify-start gap-2 text-sm">
                    <span class="material-symbols-outlined text-[18px]">mail</span> {{ $user->email ?? $user->EMAIL ?? 'Belum ada email' }}
                </p>
                <span class="inline-flex items-center gap-1.5 bg-[#10b981]/10 backdrop-blur-md text-[#10b981] text-xs font-bold px-3 py-1.5 rounded-full border border-[#10b981]/30 tracking-widest uppercase">
                    <span class="w-2 h-2 rounded-full bg-[#10b981] animate-pulse"></span>
                    Bergabung {{ ($user->created_at ?? $user->CREATED_AT) ? \Carbon\Carbon::parse($user->created_at ?? $user->CREATED_AT)->format('Y') : '2026' }}
                </span>
            </div>
            
            <div class="shrink-0 mt-6 md:mt-0 w-full md:w-auto relative z-10">
                <a href="{{ route('profile.edit') }}" class="w-full md:w-auto py-3 px-6 bg-[#10b981] text-white font-bold rounded-xl shadow-[0_4px_15px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_25px_rgba(16,185,129,0.3)] transition-all flex items-center justify-center gap-2 transform hover:-translate-y-0.5">
                    <span class="material-symbols-outlined text-[20px]">edit</span>
                    Edit Profil
                </a>
            </div>
        </div>

        <!-- Recent Orders -->
        <div>
            <div class="flex justify-between items-end mb-6">
                <h3 class="font-['Outfit'] text-2xl font-bold text-[#0A1612]">Pesanan Terbaru</h3>
                <a class="text-[#10b981] hover:text-[#0A1612] uppercase tracking-widest text-xs font-bold transition-colors border-b border-transparent hover:border-[#1A2E26] pb-1" href="{{ route('profile.pesanan') }}">Lihat Semua</a>
            </div>
            
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
                    <div class="relative bg-white/40 backdrop-blur-md rounded-2xl p-5 flex flex-col md:flex-row justify-between md:items-center gap-4 hover:-translate-y-1 transition-all duration-300 border border-white/60 group-hover:border-[#10b981]/40 shadow-sm hover:shadow-md">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-full bg-white/60 border border-white/80 shrink-0 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('images/' . $firstFoto) }}" alt="{{ $firstNama }}" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/100'">
                            </div>
                            <div>
                                <p class="font-bold uppercase tracking-wider text-[#0A1612] group-hover:text-[#10b981] transition-colors text-sm flex flex-wrap items-center gap-x-2">
                                    <span class="normal-case">{{ $firstNama }}@if($itemCount > 1), (+{{ $itemCount - 1 }} lainnya)@endif</span>
                                    <span class="text-xs text-slate-500 font-medium normal-case">— #ORD-{{ $order->id ?? $order->ID }}</span>
                                </p>
                                <p class="text-xs text-[#0A1612]/60 mt-1">{{ \Carbon\Carbon::parse($order->created_at ?? $order->CREATED_AT ?? $order->TANGGAL_PESANAN)->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between md:justify-end gap-4 md:gap-6 border-t md:border-t-0 border-[#1A2E26]/10 pt-4 md:pt-0">
                            <p class="font-['Outfit'] text-xl font-bold text-[#0A1612] group-hover:text-[#10b981] transition-colors">Rp {{ number_format($order->total_harga ?? $order->TOTAL_HARGA, 0, ',', '.') }}</p>
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
                <div class="py-16 flex flex-col items-center text-center max-w-md mx-auto bg-white/40 backdrop-blur-md rounded-[2rem] border border-white/60">
                    <div class="w-24 h-24 rounded-full bg-white/60 flex items-center justify-center mb-6 border border-white/80 text-[#0A1612]/40">
                        <span class="material-symbols-outlined text-4xl">inventory_2</span>
                    </div>
                    <h2 class="font-['Outfit'] text-2xl font-bold text-[#0A1612] mb-2">Anda belum memiliki pesanan</h2>
                    <p class="text-[#0A1612]/70 mb-8 text-sm">Semua pesanan Anda akan muncul di sini.</p>
                    <a class="px-8 py-3 bg-[#10b981] text-white font-bold rounded-xl shadow-[0_4px_15px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_25px_rgba(16,185,129,0.3)] transition-all flex items-center justify-center gap-2 transform hover:-translate-y-0.5" href="{{ route('produk.index') }}">
                        Mulai Belanja
                    </a>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection