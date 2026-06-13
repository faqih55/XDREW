@extends('layouts.admin')

@section('title', 'Dasbor')

@section('content')
    <header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h2 class="font-headline-md text-2xl text-on-surface">Ikhtisar Sistem</h2>
            <p class="text-on-surface-variant text-sm">Selamat datang kembali</p>
        </div>
        <div class="flex items-center gap-2 bg-surface-container rounded-full px-4 py-2 border border-outline-variant w-full md:w-auto justify-between">
            <div class="flex items-center gap-2">
                <img alt="Admin" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBMa_ZGBoO3662A4i_-YblLjawSxK1tHsCClTOgSImoGIUYV8nwJMytgI4eRZntwJ8mPLYoQHmQreCT9a5AJskAKo3LT_f01pqchzpo9XpYSQOFF2YGHhcx-5nNrY14GjTcJEZprRbVOfdDfukUjK405Ixk4PiZomJYS3GKupfpfMvT7M54_Iw3aIf-iiUdlxkKm-k2BKn9RCcocSVOwe1xkY2hZ_cM5vHFM6QfyNuf8w0bBEqPGmyEHz5tVyVrn9fY-gUCL2GSULTG" class="w-8 h-8 rounded-full"/>
                <span class="text-sm font-medium">Admin</span>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="text-error text-xs hover:underline">Logout</button>
            </form>
        </div>
    </header>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        @php
            $stats = [
                ['label' => 'Total Penjualan', 'value' => 'Rp'.number_format($total_penjualan, 0, ',', '.')],
                ['label' => 'Total Pesanan', 'value' => $total_pesanan],
                ['label' => 'Pelanggan', 'value' => $total_pelanggan],
                ['label' => 'Stok Produk', 'value' => $total_stok],
            ];
        @endphp
        @foreach($stats as $stat)
        <div class="glass-card p-4 rounded-2xl border border-outline-variant/20 hover:border-primary/50 transition-all">
            <p class="text-[10px] uppercase tracking-widest text-on-surface-variant font-bold">{{ $stat['label'] }}</p>
            <h3 class="text-lg font-bold mt-1 text-on-surface">{{ $stat['value'] }}</h3>
        </div>
        @endforeach
    </div>

    <div class="glass-card rounded-2xl overflow-hidden border border-outline-variant/20">
        <div class="p-6 border-b border-outline-variant/20">
            <h4 class="font-bold text-lg">Pesanan Terbaru</h4>
        </div>

        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-surface-container-high/50 text-on-surface-variant text-xs uppercase tracking-widest">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Pelanggan</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/10">
                    @forelse($data_pesanan as $pesanan)
                    <tr class="hover:bg-surface-variant/20">
                        <td class="px-6 py-4 font-mono text-primary">#XD-{{ $pesanan->id }}</td>
                        <td class="px-6 py-4 font-medium">{{ $pesanan->pelanggan->nama_lengkap ?? 'Tamu' }}</td>
                        <td class="px-6 py-4 text-on-surface-variant">{{ $pesanan->created_at->format('d M') }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-primary/10 text-primary text-[10px] px-2 py-1 rounded-full uppercase font-bold">{{ $pesanan->status }}</span>
                        </td>
                        <td class="px-6 py-4 text-right font-bold">Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-6 text-center text-on-surface-variant">Belum ada pesanan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden divide-y divide-outline-variant/10">
            @forelse($data_pesanan as $pesanan)
            <div class="p-4 flex justify-between items-center hover:bg-surface-variant/20">
                <div>
                    <p class="font-mono text-primary text-xs font-bold">#XD-{{ $pesanan->id }}</p>
                    <p class="text-sm font-medium mt-1">{{ $pesanan->pelanggan->nama_lengkap ?? 'Tamu' }}</p>
                    <p class="text-[10px] text-on-surface-variant">{{ $pesanan->created_at->format('d M Y') }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold">Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
                    <span class="bg-primary/10 text-primary text-[9px] px-2 py-0.5 rounded-full uppercase font-bold mt-1 block">
                        {{ $pesanan->status }}
                    </span>
                </div>
            </div>
            @empty
            <div class="p-6 text-center text-on-surface-variant text-sm">Belum ada pesanan.</div>
            @endforelse
        </div>
    </div>
@endsection