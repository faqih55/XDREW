@extends('layouts.admin')

@section('title', 'Daftar Pesanan | XDrew Fashion')

@section('content')
<div class="p-6 lg:p-10 space-y-8">
    <!-- Header & Greeting -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-[#0A1612] tracking-tight">Daftar <span class="text-[#10b981]">Pesanan.</span></h1>
            <p class="text-slate-500 mt-1">Kelola dan pantau semua pesanan yang masuk ke toko Anda.</p>
        </div>
    </div>

    <!-- ALERT PESAN -->
    @if(session('success'))
        <div class="mb-8 p-4 bg-[#4edea3]/10 border border-[#4edea3]/30 text-[#4edea3] rounded-xl flex items-center gap-3 font-medium shadow-[0_0_20px_rgba(78,222,163,0.1)]">
            <span class="material-symbols-outlined text-[24px]">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->has('error'))
        <div class="mb-8 p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl flex items-center gap-3 font-medium shadow-[0_0_20px_rgba(239,68,68,0.1)]">
            <span class="material-symbols-outlined text-[24px]">error</span>
            {{ $errors->first('error') }}
        </div>
    @endif

    <div class="glass-card rounded-3xl overflow-hidden border border-black/5 shadow-2xl">
        <div class="p-6 border-b border-black/5 flex justify-between items-center bg-white/60">
            <h4 class="font-bold text-lg text-[#0A1612] uppercase tracking-wide flex items-center gap-2">
                <span class="material-symbols-outlined text-[#10b981]">receipt_long</span> Semua Pesanan
            </h4>
        </div>

        <!-- Desktop Table -->
        <div class="hidden md:block overflow-x-auto w-full">
            <table class="w-full text-sm text-left whitespace-nowrap">
                <thead class="bg-white/40 text-slate-500 text-[10px] uppercase tracking-widest border-b border-black/5">
                    <tr>
                        <th class="px-6 py-5 font-bold rounded-tl-xl">ID Pesanan</th>
                        <th class="px-6 py-5 font-bold">Pelanggan</th>
                        <th class="px-6 py-5 font-bold">Tanggal</th>
                        <th class="px-6 py-5 font-bold">Pembayaran</th>
                        <th class="px-6 py-5 font-bold">Status</th>
                        <th class="px-6 py-5 font-bold text-right">Total Harga</th>
                        <th class="px-6 py-5 font-bold text-center rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5">
                    @forelse($data_pesanan as $pesanan)
                        @php
                            // Oracle PDO mengembalikan kolom dalam HURUF KECIL
                            $id      = $pesanan->getAttribute('id')              ?? $pesanan->getAttribute('ID');
                            $tanggal = $pesanan->getAttribute('tanggal_pesanan') ?? $pesanan->getAttribute('TANGGAL_PESANAN');
                            $status  = $pesanan->getAttribute('status_pesanan')  ?? $pesanan->getAttribute('STATUS_PESANAN') ?? 'Pending';
                            $total   = $pesanan->getAttribute('total_harga')     ?? $pesanan->getAttribute('TOTAL_HARGA') ?? 0;

                            $pel    = $pesanan->pelanggan;
                            $nama   = $pel ? ($pel->getAttribute('nama_lengkap') ?? $pel->getAttribute('NAMA_LENGKAP') ?? 'Tidak Dikenal') : 'Tidak Dikenal';

                            $tanggalFormat = $tanggal ? \Carbon\Carbon::parse($tanggal)->format('d M Y, H:i') : '-';

                            $pembayaran = $pesanan->pembayaran;
                            $metode_pembayaran = $pembayaran
                                ? ($pembayaran->getAttribute('metode_bayar') ?? $pembayaran->getAttribute('METODE_BAYAR') ?? 'N/A')
                                : 'N/A';

                            $firstDetail = $pesanan->detailPesanan->first();
                            $firstProduct = $firstDetail ? $firstDetail->produk : null;
                            $firstFoto = $firstProduct ? ($firstProduct->foto ?? $firstProduct->FOTO) : 'default.jpg';
                            $firstNama = $firstProduct ? ($firstProduct->nama_produk ?? $firstProduct->NAMA_PRODUK) : 'Produk XDrew';
                            $itemCount = $pesanan->detailPesanan->count();
                        @endphp
                    <tr class="hover:bg-black/5 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-12 bg-black/5 rounded overflow-hidden flex-shrink-0 border border-black/5">
                                    <img src="{{ asset('images/' . $firstFoto) }}" alt="{{ $firstNama }}" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/50'">
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-[#0A1612] font-sans normal-case tracking-normal max-w-[120px] truncate" title="{{ $firstNama }}">{{ $firstNama }}@if($itemCount > 1) (+{{ $itemCount - 1 }})@endif</span>
                                    <span class="text-xs text-[#10b981] font-mono font-bold">#ORD-{{ $id }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-bold text-[#0A1612]">{{ $nama }}</td>
                        <td class="px-6 py-4 text-slate-500 text-xs">{{ $tanggalFormat }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-slate-100 text-slate-600 text-[10px] px-3 py-1.5 rounded-full uppercase tracking-wider font-semibold border border-black/5">
                                {{ str_replace(['va-', 'ewallet-'], '', $metode_pembayaran) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if(strtolower($status) == 'selesai')
                                <span class="bg-emerald-500/10 text-emerald-400 text-[10px] px-3 py-1.5 rounded-full uppercase font-bold tracking-wider border border-emerald-500/20">Selesai</span>
                            @elseif(strtolower($status) == 'dibatalkan' || strtolower($status) == 'batal')
                                <span class="bg-red-500/10 text-red-400 text-[10px] px-3 py-1.5 rounded-full uppercase font-bold tracking-wider border border-red-500/20">Dibatalkan</span>
                            @elseif(strtolower($status) == 'pending')
                                <span class="bg-amber-500/10 text-amber-400 text-[10px] px-3 py-1.5 rounded-full uppercase font-bold tracking-wider border border-amber-500/20">Pending</span>
                            @else
                                <span class="bg-blue-500/10 text-blue-400 text-[10px] px-3 py-1.5 rounded-full uppercase font-bold tracking-wider border border-blue-500/20">{{ $status }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right font-extrabold text-[#0A1612] group-hover:text-[#10b981] transition-colors">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('admin.pesanan.show', $id) }}" class="w-9 h-9 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-400 flex items-center justify-center hover:bg-blue-500 hover:text-white transition-all duration-300 shadow-[0_0_10px_rgba(59,130,246,0.1)] hover:shadow-[0_0_15px_rgba(59,130,246,0.4)]" title="Lihat/Edit Pesanan">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                
                                <form action="{{ route('admin.pesanan.destroy', $id) }}" method="POST" onsubmit="return confirm('PERINGATAN: Apakah Anda yakin ingin menghapus pesanan #ORD-{{ $id }} secara permanen?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-9 h-9 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all duration-300 shadow-[0_0_10px_rgba(239,68,68,0.1)] hover:shadow-[0_0_15px_rgba(239,68,68,0.4)]" title="Hapus Pesanan">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-16 text-center">
                            <div class="flex flex-col items-center justify-center text-slate-400">
                                <span class="material-symbols-outlined text-[64px] mb-4 text-slate-300">inbox</span>
                                <p class="font-bold text-base text-slate-500">Belum ada data pesanan</p>
                                <p class="text-xs mt-1">Pesanan yang masuk akan otomatis tampil di sini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile View -->
        <div class="md:hidden divide-y divide-black/5">
            @forelse($data_pesanan as $pesanan)
                @php
                    // Oracle PDO mengembalikan kolom dalam HURUF KECIL
                    $id      = $pesanan->getAttribute('id')              ?? $pesanan->getAttribute('ID');
                    $tanggal = $pesanan->getAttribute('tanggal_pesanan') ?? $pesanan->getAttribute('TANGGAL_PESANAN');
                    $status  = $pesanan->getAttribute('status_pesanan')  ?? $pesanan->getAttribute('STATUS_PESANAN') ?? 'Pending';
                    $total   = $pesanan->getAttribute('total_harga')     ?? $pesanan->getAttribute('TOTAL_HARGA') ?? 0;

                    $pel    = $pesanan->pelanggan;
                    $nama   = $pel ? ($pel->getAttribute('nama_lengkap') ?? $pel->getAttribute('NAMA_LENGKAP') ?? 'Tidak Dikenal') : 'Tidak Dikenal';

                    $pembayaran = $pesanan->pembayaran;
                    $metode_pembayaran = $pembayaran
                        ? ($pembayaran->getAttribute('metode_bayar') ?? $pembayaran->getAttribute('METODE_BAYAR') ?? 'N/A')
                        : 'N/A';

                    $firstDetail = $pesanan->detailPesanan->first();
                    $firstProduct = $firstDetail ? $firstDetail->produk : null;
                    $firstFoto = $firstProduct ? ($firstProduct->foto ?? $firstProduct->FOTO) : 'default.jpg';
                    $firstNama = $firstProduct ? ($firstProduct->nama_produk ?? $firstProduct->NAMA_PRODUK) : 'Produk XDrew';
                    $itemCount = $pesanan->detailPesanan->count();
                @endphp
            <div class="p-5 flex flex-col gap-4 hover:bg-black/5 transition-colors">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-12 bg-black/5 rounded overflow-hidden flex-shrink-0 border border-black/5">
                            <img src="{{ asset('images/' . $firstFoto) }}" alt="{{ $firstNama }}" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/50'">
                        </div>
                        <div class="flex flex-col">
                            <p class="text-sm font-bold text-[#0A1612] font-sans max-w-[150px] truncate" title="{{ $firstNama }}">{{ $firstNama }}@if($itemCount > 1) (+{{ $itemCount - 1 }})@endif</p>
                            <p class="font-mono text-[#10b981] text-xs font-bold">#ORD-{{ $id }}</p>
                        </div>
                    </div>
                    <p class="text-sm font-extrabold text-[#0A1612]">Rp {{ number_format($total, 0, ',', '.') }}</p>
                </div>
                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-sm font-bold text-[#0A1612]">{{ $nama }}</p>
                        <p class="text-[11px] text-slate-500 mt-1">{{ $tanggal ? \Carbon\Carbon::parse($tanggal)->format('d M Y') : '-' }} • {{ str_replace(['va-', 'ewallet-'], '', $metode_pembayaran) }}</p>
                    </div>
                    @if(strtolower($status) == 'selesai')
                        <span class="bg-emerald-500/10 text-emerald-400 text-[10px] px-3 py-1.5 rounded-full uppercase font-bold tracking-wider border border-emerald-500/20">Selesai</span>
                    @elseif(strtolower($status) == 'dibatalkan' || strtolower($status) == 'batal')
                        <span class="bg-red-500/10 text-red-400 text-[10px] px-3 py-1.5 rounded-full uppercase font-bold tracking-wider border border-red-500/20">Dibatalkan</span>
                    @elseif(strtolower($status) == 'pending')
                        <span class="bg-amber-500/10 text-amber-400 text-[10px] px-3 py-1.5 rounded-full uppercase font-bold tracking-wider border border-amber-500/20">Pending</span>
                    @else
                        <span class="bg-blue-500/10 text-blue-400 text-[10px] px-3 py-1.5 rounded-full uppercase font-bold tracking-wider border border-blue-500/20">{{ $status }}</span>
                    @endif
                </div>
                
                <div class="mt-2 pt-4 border-t border-black/5 flex justify-end gap-3">
                    <a href="{{ route('admin.pesanan.show', $id) }}" class="flex items-center gap-1.5 text-[11px] uppercase font-bold tracking-widest text-blue-400 bg-blue-500/10 border border-blue-500/20 px-5 py-2.5 rounded-xl hover:bg-blue-500 hover:text-white transition-all">
                        <span class="material-symbols-outlined text-[16px]">visibility</span> Lihat Detail
                    </a>
                    <form action="{{ route('admin.pesanan.destroy', $id) }}" method="POST" onsubmit="return confirm('PERINGATAN: Apakah Anda yakin ingin menghapus pesanan #ORD-{{ $id }} secara permanen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center gap-1.5 text-[11px] uppercase font-bold tracking-widest text-red-400 bg-red-500/10 border border-red-500/20 px-5 py-2.5 rounded-xl hover:bg-red-500 hover:text-white transition-all">
                            <span class="material-symbols-outlined text-[16px]">delete</span> Hapus
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="p-12 text-center text-slate-400 flex flex-col items-center">
                <span class="material-symbols-outlined text-5xl mb-3 text-slate-300">inbox</span>
                <p class="font-bold text-slate-500">Belum ada pesanan.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-black/5">
            {{ $data_pesanan->links('vendor.pagination.tailwind') }}
        </div>
    </div>

</div>
@endsection