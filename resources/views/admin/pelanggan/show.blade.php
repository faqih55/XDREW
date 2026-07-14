@extends('layouts.admin')

@section('title', 'Detail Pelanggan | XDrew Fashion')

@section('content')
@php
    $id      = $pelanggan->getAttribute('id') ?? $pelanggan->ID;
    $nama    = $pelanggan->getAttribute('nama_lengkap') ?? $pelanggan->NAMA_LENGKAP ?? '-';
    $email   = $pelanggan->getAttribute('email') ?? $pelanggan->EMAIL ?? '-';
    $telp    = $pelanggan->getAttribute('nomor_telepon') ?? $pelanggan->NOMOR_TELEPON ?? '-';
    $alamat  = $pelanggan->getAttribute('alamat') ?? $pelanggan->ALAMAT ?? '-';
    $bio     = $pelanggan->getAttribute('bio') ?? $pelanggan->BIO ?? '-';
    $joinAt  = $pelanggan->getAttribute('created_at') ?? $pelanggan->CREATED_AT;
@endphp

<div class="p-4 md:p-8 space-y-6">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="text-slate-500 hover:text-[#10b981] transition-colors font-medium">Dasbor</a>
        <span class="material-symbols-outlined text-slate-400 text-[15px]">chevron_right</span>
        <a href="{{ route('admin.pelanggan') }}" class="text-slate-500 hover:text-[#10b981] transition-colors font-medium">Pelanggan</a>
        <span class="material-symbols-outlined text-slate-400 text-[15px]">chevron_right</span>
        <span class="text-[#10b981] font-bold uppercase tracking-widest text-[11px]">{{ $nama }}</span>
    </div>

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b border-black/5 pb-6">
        <div>
            <h1 class="text-3xl font-extrabold text-[#0A1612] tracking-tight">Detail <span class="text-[#10b981]">Pelanggan.</span></h1>
            <p class="text-slate-500 mt-1 text-sm">ID: <span class="font-mono text-[#10b981]">#{{ $id }}</span></p>
        </div>
        <a href="{{ route('admin.pelanggan') }}"
           class="flex items-center gap-2 px-5 py-2.5 rounded-xl border border-black/5 text-slate-500 text-sm font-semibold hover:bg-black/5 hover:text-[#0A1612] bg-white/60 transition-all">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span> Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

@php
    $foto = $pelanggan->getAttribute('foto') ?? $pelanggan->FOTO;
    $fotoUrl = null;
    if ($foto) {
        if (str_starts_with($foto, 'http')) {
            $fotoUrl = $foto;
        } elseif (file_exists(public_path('images/' . $foto))) {
            $fotoUrl = asset('images/' . $foto);
        } else {
            $fotoUrl = asset('storage/' . str_replace('public/', '', $foto)); 
        }
    }
    $defaultAvatar = 'https://ui-avatars.com/api/?name=' . urlencode($nama) . '&background=10b981&color=fff&size=200&bold=true';
    $provinsi = $pelanggan->getAttribute('provinsi') ?? $pelanggan->PROVINSI ?? '-';
    $kota = $pelanggan->getAttribute('kota') ?? $pelanggan->KOTA ?? '-';
@endphp

        {{-- Avatar & Nama --}}
        <div class="bg-white/60 rounded-2xl border border-black/5 p-8 flex flex-col items-center gap-4 text-center shadow-sm">
            <div class="w-24 h-24 rounded-3xl bg-white border-2 border-[#10b981]/30 overflow-hidden shadow-lg shadow-[#10b981]/20">
                @if($fotoUrl)
                    <img src="{{ $fotoUrl }}" alt="Profile" class="w-full h-full object-cover" onerror="this.src='{{ $defaultAvatar }}'">
                @else
                    <img src="{{ $defaultAvatar }}" alt="Profile" class="w-full h-full object-cover">
                @endif
            </div>
            <div>
                <h2 class="text-xl font-extrabold text-[#0A1612]">{{ $nama }}</h2>
                <p class="text-sm text-slate-500 mt-1">{{ $email }}</p>
                <p class="text-xs text-[#10b981] font-mono mt-2">ID #{{ $id }}</p>
            </div>
            @if($joinAt)
                <div class="w-full pt-4 border-t border-black/5">
                    <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Bergabung Sejak</p>
                    <p class="text-[#0A1612] font-semibold text-sm">{{ \Carbon\Carbon::parse($joinAt)->format('d F Y') }}</p>
                </div>
            @endif
        </div>

        {{-- Info Detail --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Informasi Pribadi --}}
            <div class="bg-white/60 rounded-2xl border border-black/5 overflow-hidden shadow-sm">
                <div class="px-6 py-4 border-b border-black/5 flex items-center gap-2 bg-white/40">
                    <span class="material-symbols-outlined text-[#10b981] text-[20px]">badge</span>
                    <h3 class="font-bold text-[#0A1612] uppercase tracking-wider text-sm">Informasi Pribadi</h3>
                </div>
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Nama Lengkap</p>
                        <p class="text-[#0A1612] font-semibold text-sm">{{ $nama }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Email</p>
                        <p class="text-[#0A1612] font-semibold text-sm break-all">{{ $email }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Nomor Telepon</p>
                        <p class="text-[#0A1612] font-semibold text-sm">{{ $telp }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Bergabung</p>
                        <p class="text-[#0A1612] font-semibold text-sm">{{ $joinAt ? \Carbon\Carbon::parse($joinAt)->format('d M Y') : '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Provinsi</p>
                        <p class="text-[#0A1612] font-semibold text-sm">{{ $provinsi }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Kota / Kabupaten</p>
                        <p class="text-[#0A1612] font-semibold text-sm">{{ $kota }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Alamat Lengkap</p>
                        <p class="text-[#0A1612] font-semibold text-sm">{{ $alamat }}</p>
                    </div>
                    @if($bio && $bio !== '-')
                    <div class="sm:col-span-2">
                        <p class="text-[10px] text-slate-500 uppercase tracking-widest mb-1">Bio</p>
                        <p class="text-slate-600 text-sm leading-relaxed">{{ $bio }}</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Statistik Pelanggan --}}
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white/60 rounded-2xl border border-black/5 p-5 flex flex-col items-start gap-2 shadow-sm">
                    <span class="material-symbols-outlined text-[#10b981] text-[28px]">shopping_bag</span>
                    <p class="text-[10px] text-slate-500 uppercase tracking-widest">Total Pesanan</p>
                    <p class="text-2xl font-extrabold text-[#0A1612]">
                        {{ \App\Models\Pesanan::where('ID_PELANGGAN', $id)->orWhere('id_pelanggan', $id)->count() }}
                    </p>
                </div>
                <div class="bg-white/60 rounded-2xl border border-black/5 p-5 flex flex-col items-start gap-2 shadow-sm">
                    <span class="material-symbols-outlined text-[#10b981] text-[28px]">payments</span>
                    <p class="text-[10px] text-slate-500 uppercase tracking-widest">Total Belanja</p>
                    <p class="text-lg font-extrabold text-[#0A1612]">
                        Rp {{ number_format(\App\Models\Pesanan::where('ID_PELANGGAN', $id)->orWhere('id_pelanggan', $id)->sum('TOTAL_HARGA'), 0, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
