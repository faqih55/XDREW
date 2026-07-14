@extends('layouts.admin')

@section('title', 'Detail Pesanan | XDrew Fashion')

@section('content')
@php
    $id           = $pesanan->getAttribute('id') ?? $pesanan->ID;
    $status       = $pesanan->getAttribute('status_pesanan') ?? $pesanan->STATUS_PESANAN ?? 'Pending';
    $tanggal      = $pesanan->getAttribute('tanggal_pesanan') ?? $pesanan->TANGGAL_PESANAN ?? $pesanan->getAttribute('created_at');
    $total        = $pesanan->getAttribute('total_harga') ?? $pesanan->TOTAL_HARGA ?? 0;
    $pengiriman   = $pesanan->pengiriman;
    $alamat       = '-';
    if ($pengiriman) {
        $alamat = $pengiriman->getAttribute('alamat_tujuan') ?? $pengiriman->getAttribute('ALAMAT_TUJUAN') ?? '-';
    } elseif ($pelanggan) {
        $alamat = $pelanggan->getAttribute('alamat') ?? $pelanggan->getAttribute('ALAMAT') ?? '-';
    }
    $catatan      = $pesanan->getAttribute('catatan') ?? $pesanan->CATATAN ?? '-';

    $pelanggan    = $pesanan->pelanggan;
    $namaPelanggan = '-';
    $emailPelanggan = '-';
    $telpPelanggan  = '-';
    if ($pelanggan) {
        $namaPelanggan  = $pelanggan->getAttribute('nama_lengkap') ?? $pelanggan->NAMA_LENGKAP ?? '-';
        $emailPelanggan = $pelanggan->getAttribute('email') ?? $pelanggan->EMAIL ?? '-';
        $telpPelanggan  = $pelanggan->getAttribute('nomor_telepon') ?? $pelanggan->NOMOR_TELEPON ?? '-';
    }

    $pembayaran   = $pesanan->pembayaran;
    $metodeBayar  = '-';
    if ($pembayaran) {
        $metodeBayar = $pembayaran->getAttribute('metode_bayar') ?? $pembayaran->METODE_BAYAR ?? '-';
    }

    $statusColors = [
        'pending'    => 'bg-amber-500/10 text-amber-600 border-amber-500/20',
        'diproses'   => 'bg-blue-500/10 text-blue-600 border-blue-500/20',
        'dikirim'    => 'bg-indigo-500/10 text-indigo-600 border-indigo-500/20',
        'selesai'    => 'bg-emerald-500/10 text-emerald-600 border-emerald-500/20',
        'dibatalkan' => 'bg-red-500/10 text-red-600 border-red-500/20',
        'batal'      => 'bg-red-500/10 text-red-600 border-red-500/20',
    ];
    $statusClass = $statusColors[strtolower($status)] ?? 'bg-slate-100 text-slate-600 border-black/5';
@endphp

<div class="p-4 md:p-8 space-y-6">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="text-slate-500 hover:text-[#10b981] transition-colors font-medium">Dasbor</a>
        <span class="material-symbols-outlined text-slate-400 text-[15px]">chevron_right</span>
        <a href="{{ route('admin.pesanan') }}" class="text-slate-500 hover:text-[#10b981] transition-colors font-medium">Pesanan</a>
        <span class="material-symbols-outlined text-slate-400 text-[15px]">chevron_right</span>
        <span class="text-[#10b981] font-bold uppercase tracking-widest text-[11px]">#ORD-{{ $id }}</span>
    </div>

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b border-black/5 pb-6">
        <div>
            <h1 class="text-3xl font-extrabold text-[#0A1612] tracking-tight">Detail <span class="text-[#10b981]">Pesanan.</span></h1>
            <p class="text-slate-500 mt-1 text-sm">ID: <span class="font-mono text-[#10b981]">#ORD-{{ $id }}</span> &nbsp;·&nbsp; {{ $tanggal ? \Carbon\Carbon::parse($tanggal)->format('d F Y, H:i') : '-' }}</p>
        </div>
        <a href="{{ route('admin.pesanan') }}"
           class="flex items-center gap-2 px-5 py-2.5 rounded-xl border border-black/5 text-slate-500 text-sm font-semibold hover:bg-black/5 hover:text-[#0A1612] bg-white/60 transition-all">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span> Kembali
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="p-4 bg-[#10b981]/10 border border-[#10b981]/30 text-[#10b981] rounded-xl flex items-center gap-3 font-medium">
            <span class="material-symbols-outlined">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kolom Kiri: Info Pesanan --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Ringkasan Pesanan --}}
            <div class="bg-white/60 rounded-2xl border border-black/5 overflow-hidden shadow-sm">
                <div class="px-6 py-4 border-b border-black/5 flex items-center gap-2 bg-white/40">
                    <span class="material-symbols-outlined text-[#10b981] text-[20px]">receipt_long</span>
                    <h3 class="font-bold text-[#0A1612] uppercase tracking-wider text-sm">Ringkasan Pesanan</h3>
                </div>
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Status Pesanan</p>
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-wider border {{ $statusClass }}">
                            {{ ucfirst($status) }}
                        </span>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Metode Pembayaran</p>
                        <p class="text-[#0A1612] font-semibold text-sm">{{ strtoupper(str_replace(['-', '_'], ' ', $metodeBayar)) }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Total Harga</p>
                        <p class="text-[#10b981] font-extrabold text-xl">Rp {{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Tanggal Pesanan</p>
                        <p class="text-[#0A1612] font-semibold text-sm">{{ $tanggal ? \Carbon\Carbon::parse($tanggal)->format('d M Y, H:i') : '-' }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Alamat Pengiriman</p>
                        <p class="text-[#0A1612] font-semibold text-sm">{{ $alamat }}</p>
                    </div>
                    @if($catatan && $catatan !== '-')
                    <div class="sm:col-span-2">
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Catatan</p>
                        <p class="text-slate-600 text-sm italic">{{ $catatan }}</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Daftar Item Pesanan --}}
            <div class="bg-white/60 rounded-2xl border border-black/5 overflow-hidden shadow-sm">
                <div class="px-6 py-4 border-b border-black/5 flex items-center gap-2 bg-white/40">
                    <span class="material-symbols-outlined text-[#10b981] text-[20px]">shopping_bag</span>
                    <h3 class="font-bold text-[#0A1612] uppercase tracking-wider text-sm">Daftar Item Pesanan</h3>
                </div>
                <div class="p-6 divide-y divide-black/5">
                    @if(isset($pesanan) && $pesanan->detailPesanan && $pesanan->detailPesanan->count() > 0)
                        @foreach($pesanan->detailPesanan as $detail)
                            @php
                                $produk = $detail->produk;
                                $nama_produk = $produk->nama_produk ?? $produk->NAMA_PRODUK ?? 'Produk XDrew';
                                $foto = $produk->foto ?? $produk->FOTO ?? 'default.jpg';
                                $qty = $detail->kuantitas ?? $detail->KUANTITAS ?? 1;
                                $harga = $detail->harga_satuan ?? $detail->HARGA_SATUAN ?? 0;
                            @endphp
                            <div class="flex items-center gap-4 py-4 first:pt-0 last:pb-0">
                                <div class="w-16 h-20 bg-black/5 border border-black/5 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('images/' . $foto) }}" alt="{{ $nama_produk }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-300">
                                </div>
                                <div class="flex-grow min-w-0">
                                    <h4 class="text-[#0A1612] font-semibold text-sm truncate uppercase tracking-wider">{{ $nama_produk }}</h4>
                                    <p class="text-xs text-slate-500 mt-1">Ukuran: {{ $detail->ukuran ?? $detail->UKURAN ?? 'Semua Ukuran' }} | Jumlah: {{ $qty }}x</p>
                                    <p class="text-xs text-slate-400 mt-0.5">Harga Satuan: Rp {{ number_format($harga, 0, ',', '.') }}</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <span class="text-[#10b981] font-bold text-sm">Rp {{ number_format($harga * $qty, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-slate-500 text-sm italic text-center py-4">Tidak ada item yang ditemukan.</p>
                    @endif
                </div>
            </div>

            {{-- Update Status Form --}}
            <div class="bg-white/60 rounded-2xl border border-black/5 overflow-hidden shadow-sm">
                <div class="px-6 py-4 border-b border-black/5 flex items-center gap-2 bg-white/40">
                    <span class="material-symbols-outlined text-[#10b981] text-[20px]">edit_note</span>
                    <h3 class="font-bold text-[#0A1612] uppercase tracking-wider text-sm">Update Status Pesanan</h3>
                </div>
                <div class="p-6">
                    <form action="{{ url('admin/pesanan/' . $id . '/status') }}" method="POST" class="flex flex-col sm:flex-row gap-4">
                        @csrf
                        @method('PATCH')
                        <div class="flex-1">
                            <label class="text-[10px] text-slate-500 uppercase tracking-widest mb-2 block">Pilih Status Baru</label>
                            <select name="status_pesanan"
                                    class="w-full bg-white border border-black/10 rounded-xl px-4 py-3 text-[#0A1612] outline-none focus:border-[#10b981] transition-colors">
                                @foreach(['Pending','Konfirmasi Pembayaran','Diproses','Dikirim','Selesai','Dibatalkan'] as $s)
                                    <option value="{{ $s }}" {{ strtolower($status) == strtolower($s) ? 'selected' : '' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit"
                                    class="px-6 py-3 bg-[#10b981] text-white font-bold uppercase tracking-widest text-xs rounded-xl
                                           hover:bg-[#059669] hover:shadow-lg hover:shadow-[#10b981]/20 transition-all duration-300">
                                <span class="material-symbols-outlined text-[16px] align-middle mr-1">save</span>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Hapus Pesanan --}}
            <div class="bg-red-500/5 rounded-2xl border border-red-500/20 p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <p class="font-bold text-red-400 text-sm">Zona Berbahaya</p>
                    <p class="text-gray-500 text-xs mt-1">Menghapus pesanan ini bersifat permanen dan tidak dapat dibatalkan.</p>
                </div>
                <form action="{{ route('admin.pesanan.destroy', $id) }}" method="POST"
                      onsubmit="return confirm('PERINGATAN: Hapus pesanan #ORD-{{ $id }} secara permanen?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="flex items-center gap-2 px-5 py-2.5 rounded-xl bg-red-500/10 border border-red-500/30
                                   text-red-400 text-sm font-bold hover:bg-red-500 hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined text-[18px]">delete</span> Hapus Pesanan
                    </button>
                </form>
            </div>
        </div>

        {{-- Kolom Kanan: Info Pelanggan --}}
        <div class="space-y-6">
            <div class="bg-white/60 rounded-2xl border border-black/5 overflow-hidden shadow-sm">
                <div class="px-6 py-4 border-b border-black/5 flex items-center gap-2 bg-white/40">
                    <span class="material-symbols-outlined text-[#10b981] text-[20px]">person</span>
                    <h3 class="font-bold text-[#0A1612] uppercase tracking-wider text-sm">Info Pelanggan</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-[#10b981]/10 border border-[#10b981]/30 flex items-center justify-center text-[#10b981] font-black text-xl shrink-0">
                            {{ strtoupper(substr($namaPelanggan, 0, 1)) }}
                        </div>
                        <div class="overflow-hidden">
                            <p class="font-bold text-[#0A1612] truncate">{{ $namaPelanggan }}</p>
                            <p class="text-xs text-slate-500 truncate">{{ $emailPelanggan }}</p>
                        </div>
                    </div>
                    <div class="pt-4 border-t border-black/5 space-y-3">
                        <div>
                            <p class="text-[10px] text-slate-500 uppercase tracking-widest">Nomor Telepon</p>
                            <p class="text-[#0A1612] font-semibold text-sm mt-0.5">{{ $telpPelanggan }}</p>
                        </div>
                    </div>
                    @if($pelanggan)
                        <a href="{{ route('admin.pelanggan.show', $pelanggan->getAttribute('id') ?? $pelanggan->ID) }}"
                           class="flex items-center justify-center gap-2 w-full mt-2 px-4 py-2.5 rounded-xl
                                  border border-black/5 text-slate-500 bg-white/60 text-xs font-bold uppercase tracking-widest
                                  hover:bg-black/5 hover:text-[#0A1612] transition-all">
                            <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                            Lihat Profil Pelanggan
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
