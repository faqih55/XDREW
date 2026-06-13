@extends('layouts.app') 

@section('content')
<main class="pt-32 pb-xl px-margin-mobile md:px-margin-desktop max-w-2xl mx-auto">
    <div class="glass-panel p-lg rounded-2xl border border-primary/20">
        <div class="text-center mb-xl">
            <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-md">
                <span class="material-symbols-outlined text-primary text-3xl">check_circle</span>
            </div>
            <h1 class="font-headline-md text-2xl">Pesanan Berhasil!</h1>
            <p class="text-on-surface-variant">ID Pesanan: <span class="font-bold text-primary">#XD-{{ $pesanan->id }}</span></p>
        </div>

        <div class="space-y-md border-t border-white/5 pt-lg">
            @foreach($pesanan->details as $item)
            <div class="flex justify-between items-center">
                <p>{{ $item->produk->nama_produk ?? 'Produk' }} x {{ $item->jumlah }}</p>
                <p class="font-bold">Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</p>
            </div>
            @endforeach
        </div>

        <div class="mt-lg pt-lg border-t border-white/5 flex justify-between items-center">
            <span class="text-lg font-bold">Total Pembayaran</span>
            <span class="text-xl font-black text-primary">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
        </div>
    </div>
</main>
@endsection