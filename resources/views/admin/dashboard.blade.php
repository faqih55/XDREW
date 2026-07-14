@extends('layouts.admin')

@section('title', 'Dasbor Admin | XDrew Fashion')

@section('content')
@php
    try {
        $recent_customers = \App\Models\Pelanggan::orderBy('id', 'desc')->limit(5)->get();
    } catch(\Exception $e) {
        $recent_customers = collect();
    }
    try {
        $recent_products = \App\Models\Produk::orderBy('id', 'desc')->limit(5)->get();
    } catch(\Exception $e) {
        $recent_products = collect();
    }
    try {
        $recent_orders = \App\Models\Pesanan::with('pelanggan')->orderBy('id', 'desc')->limit(5)->get();
    } catch(\Exception $e) {
        $recent_orders = collect();
    }
@endphp

<style>
    /* ── Dashboard Specific Styles ── */
    .dash-header {
        padding: 28px 32px 20px;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 16px;
    }

    .dash-breadcrumb {
        display: flex;
        align-items: center;
        gap: 4px;
        margin-bottom: 6px;
    }

    .dash-breadcrumb-text {
        font-size: 11px;
        color: #64748b;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
    }

    .dash-breadcrumb-sep {
        font-size: 12px;
        color: #cbd5e1;
    }

    .dash-breadcrumb-active {
        font-size: 11px;
        color: #10b981;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .dash-title {
        font-family: 'Outfit', sans-serif;
        font-size: 26px;
        font-weight: 800;
        color: #1A2E26;
        letter-spacing: -0.03em;
        line-height: 1;
    }

    .dash-subtitle {
        font-size: 12px;
        color: #64748b;
        font-family: 'Poppins', sans-serif;
        margin-top: 4px;
        font-weight: 400;
    }

    .dash-date-chip {
        display: flex;
        align-items: center;
        gap: 7px;
        background: rgba(255,255,255,0.7);
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 12px;
        padding: 8px 14px;
        font-size: 12px;
        color: #475569;
        font-family: 'Poppins', sans-serif;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }

    .dash-refresh-btn {
        background: rgba(255,255,255,0.7);
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 10px;
        padding: 8px 10px;
        color: #64748b;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: all 0.2s;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }
    .dash-refresh-btn:hover { color: #10b981; background: #fff; border-color: rgba(16,185,129,0.2); }

    /* ── Stat Cards ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        padding: 0 32px;
        margin-bottom: 24px;
    }

    @media (max-width: 1200px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 640px)  { .stats-grid { grid-template-columns: 1fr; } }

    .stat-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0.25) 100%);
        backdrop-filter: blur(40px) saturate(250%);
        -webkit-backdrop-filter: blur(40px) saturate(250%);
        border: 1px solid rgba(255, 255, 255, 0.9);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        border-right: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 
            inset 0 1px 1px rgba(255, 255, 255, 1),
            inset 0 0 20px rgba(255, 255, 255, 0.5),
            0 12px 32px rgba(0, 0, 0, 0.05),
            0 2px 6px rgba(0, 0, 0, 0.02);
        border-radius: 32px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.4s ease;
        position: relative;
        overflow: hidden;
        transform: translateZ(0);
        will-change: transform, backdrop-filter;
    }
    .stat-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 0% 0%, rgba(255,255,255,0.8) 0%, transparent 60%);
        pointer-events: none;
        z-index: 0;
    }
    .stat-card > * { position: relative; z-index: 1; }
    .stat-card:hover { 
        transform: translateY(-5px) scale(1.02) translateZ(0); 
        box-shadow: 
            inset 0 1px 1px rgba(255, 255, 255, 1),
            inset 0 0 25px rgba(255, 255, 255, 0.6),
            0 24px 48px rgba(0, 0, 0, 0.08),
            0 8px 16px rgba(0, 0, 0, 0.04);
    }

    .stat-card-green  { border-left: 4px solid #10b981; }
    .stat-card-purple { border-left: 4px solid #8b5cf6; }
    .stat-card-orange { border-left: 4px solid #f97316; }
    .stat-card-rose   { border-left: 4px solid #ec4899; }

    .stat-card-header { display: flex; justify-content: space-between; align-items: center; }
    .stat-label { font-size: 10.5px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.08em; font-family: 'Poppins', sans-serif; }
    .stat-icon  { font-size: 22px !important; font-variation-settings: 'FILL' 1; }
    
    .stat-card-green .stat-icon { color: #10b981; text-shadow: 0 0 10px rgba(16,185,129,0.3); }
    .stat-card-purple .stat-icon { color: #8b5cf6; text-shadow: 0 0 10px rgba(139,92,246,0.3); }
    .stat-card-orange .stat-icon { color: #f97316; text-shadow: 0 0 10px rgba(249,115,22,0.3); }
    .stat-card-rose .stat-icon { color: #ec4899; text-shadow: 0 0 10px rgba(236,72,153,0.3); }

    .stat-card-footer { display: flex; justify-content: space-between; align-items: flex-end; }
    .stat-value { font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 800; color: #1A2E26; line-height: 1; }
    
    .stat-badge { font-size: 9.5px; padding: 3px 8px; border-radius: 20px; font-weight: 700; font-family: 'Poppins', sans-serif; }
    .stat-card-green .stat-badge { color: #10b981; background: rgba(16,185,129,0.1); }
    .stat-card-purple .stat-badge { color: #8b5cf6; background: rgba(139,92,246,0.1); }
    .stat-card-orange .stat-badge { color: #f97316; background: rgba(249,115,22,0.1); }
    .stat-card-rose .stat-badge { color: #ec4899; background: rgba(236,72,153,0.1); }

    /* ── Content Area ── */
    .dash-content {
        padding: 0 32px 32px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* ── Activity Row ── */
    .activity-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }
    @media (max-width: 1024px) { .activity-row { grid-template-columns: 1fr; } }

    /* ── Panel Card ── */
    .panel-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0.25) 100%);
        backdrop-filter: blur(40px) saturate(250%);
        -webkit-backdrop-filter: blur(40px) saturate(250%);
        border: 1px solid rgba(255, 255, 255, 0.9);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        border-right: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 
            inset 0 1px 1px rgba(255, 255, 255, 1),
            inset 0 0 20px rgba(255, 255, 255, 0.5),
            0 12px 32px rgba(0, 0, 0, 0.05),
            0 2px 6px rgba(0, 0, 0, 0.02);
        border-radius: 32px;
        overflow: hidden;
        position: relative;
        transform: translateZ(0);
        will-change: transform, backdrop-filter;
    }
    .panel-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 100% 0%, rgba(255,255,255,0.6) 0%, transparent 60%);
        pointer-events: none;
        z-index: 0;
    }
    .panel-header, .panel-body { position: relative; z-index: 1; }

    .panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px;
        border-bottom: 1px solid rgba(0,0,0,0.04);
        background: rgba(255, 255, 255, 0.4);
    }

    .panel-title {
        font-family: 'Outfit', sans-serif;
        font-size: 13px;
        font-weight: 800;
        color: #1A2E26;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .panel-title-icon {
        width: 32px; height: 32px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px !important;
        box-shadow: 0 4px 10px rgba(0,0,0,0.03);
    }

    .panel-link {
        font-size: 11px;
        color: #10b981;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        transition: opacity 0.2s;
    }
    .panel-link:hover { opacity: 0.7; }

    .panel-body { padding: 16px 24px; display: flex; flex-direction: column; gap: 10px; }

    /* ── List Items ── */
    .list-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid rgba(0,0,0,0.03);
    }
    .list-item:last-child { border-bottom: none; padding-bottom: 0; }
    .list-item:first-child { padding-top: 0; }

    .list-item-left { display: flex; align-items: center; gap: 12px; }
    .list-avatar {
        width: 36px; height: 36px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px !important; flex-shrink: 0;
        box-shadow: inset 0 2px 4px rgba(255,255,255,0.5), 0 2px 8px rgba(0,0,0,0.03);
    }
    .list-name  { font-size: 13px; font-weight: 700; color: #1A2E26; font-family: 'Poppins', sans-serif; }

    /* ── Badges ── */
    .badge {
        font-size: 9px; font-weight: 800; text-transform: uppercase;
        letter-spacing: 0.05em; padding: 4px 10px; border-radius: 20px;
        border: 1px solid; font-family: 'Poppins', sans-serif;
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    }
    .badge-green   { background: rgba(16,185,129,0.15);  color: #10b981; border-color: rgba(16,185,129,0.2); }
    .badge-amber   { background: rgba(245,158,11,0.15); color: #f59e0b; border-color: rgba(245,158,11,0.2); }
    .badge-blue    { background: rgba(59,130,246,0.15); color: #3b82f6; border-color: rgba(59,130,246,0.2); }
    .badge-red     { background: rgba(239,68,68,0.15);  color: #ef4444; border-color: rgba(239,68,68,0.2); }
    .badge-teal    { background: rgba(20,184,166,0.15); color: #14b8a6; border-color: rgba(20,184,166,0.2); }
    .badge-indigo  { background: rgba(99,102,241,0.15); color: #6366f1; border-color: rgba(99,102,241,0.2); }

    /* ── Transaction Table ── */
    .table-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0.25) 100%);
        backdrop-filter: blur(40px) saturate(250%);
        -webkit-backdrop-filter: blur(40px) saturate(250%);
        border: 1px solid rgba(255, 255, 255, 0.9);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        border-right: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 
            inset 0 1px 1px rgba(255, 255, 255, 1),
            inset 0 0 20px rgba(255, 255, 255, 0.5),
            0 12px 32px rgba(0, 0, 0, 0.05),
            0 2px 6px rgba(0, 0, 0, 0.02);
        border-radius: 32px;
        overflow: hidden;
        position: relative;
        transform: translateZ(0);
        will-change: transform, backdrop-filter;
    }
    .table-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 0%, rgba(255,255,255,0.6) 0%, transparent 70%);
        pointer-events: none;
        z-index: 0;
    }
    .table-card > * { position: relative; z-index: 1; }

    .dash-table { width: 100%; border-collapse: collapse; }
    .dash-table thead tr { background: rgba(0,0,0,0.015); }
    .dash-table th {
        padding: 12px 20px;
        font-size: 9.5px; font-weight: 700; text-transform: uppercase;
        letter-spacing: 0.10em; color: #64748b;
        text-align: left; white-space: nowrap;
        font-family: 'Poppins', sans-serif;
    }
    .dash-table th:last-child { text-align: right; }
    .dash-table tbody tr {
        border-top: 1px solid rgba(0,0,0,0.025);
        transition: background 0.15s;
    }
    .dash-table tbody tr:hover { background: rgba(0,0,0,0.015); }
    .dash-table td { padding: 13px 20px; font-size: 12.5px; white-space: nowrap; }
    .dash-table td:last-child { text-align: right; }

    .td-order-id { font-family: 'Outfit', sans-serif; font-weight: 700; color: #10b981; font-size: 13px; }
    .td-name     { color: #1A2E26; font-weight: 600; font-family: 'Poppins', sans-serif; }
    .td-email    { color: #64748b; font-family: 'Poppins', sans-serif; font-size: 11.5px; }
    .td-date     { color: #64748b; font-family: 'Poppins', sans-serif; font-size: 11.5px; }
    .td-center   { text-align: center !important; }

    .action-btn {
        font-size: 10.5px; color: #64748b; font-family: 'Poppins', sans-serif;
        font-weight: 600; text-decoration: none; padding: 4px 10px;
        border-radius: 7px; background: rgba(255,255,255,0.7);
        border: 1px solid rgba(0,0,0,0.05);
        transition: all 0.18s;
        box-shadow: 0 1px 2px rgba(0,0,0,0.02);
    }
    .action-btn:hover { color: #10b981; background: #fff; border-color: rgba(16,185,129,0.3); }

    .empty-state {
        padding: 48px 20px;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        color: #94a3b8; font-family: 'Poppins', sans-serif;
        text-align: center;
    }
    .empty-state .material-symbols-outlined { font-size: 36px; margin-bottom: 10px; opacity: 0.5; }
    .empty-state p { font-size: 12px; }

    /* ── Divider ── */
    .dash-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(0,0,0,0.05) 20%, rgba(0,0,0,0.05) 80%, transparent);
        margin: 0 32px;
    }

    /* ── Background Blobs for Glass Effect ── */
    .dash-bg-blob {
        position: absolute;
        filter: blur(80px);
        opacity: 0.4;
        z-index: 0;
        border-radius: 50%;
        animation: floatBlob 20s infinite ease-in-out;
        pointer-events: none;
        transform: translateZ(0);
        will-change: transform, filter;
    }
    @keyframes floatBlob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    .blob-1 { top: -10%; left: -5%; width: 500px; height: 500px; background: #10b981; animation-delay: 0s; }
    .blob-2 { top: 40%; right: -10%; width: 600px; height: 600px; background: #8b5cf6; animation-delay: -5s; }
    .blob-3 { bottom: -20%; left: 20%; width: 700px; height: 700px; background: #38bdf8; animation-delay: -10s; }
</style>

<div style="position: relative; z-index: 1;">
    <!-- Background Blobs -->
    <div class="dash-bg-blob blob-1"></div>
    <div class="dash-bg-blob blob-2"></div>
    <div class="dash-bg-blob blob-3"></div>

{{-- ══ PAGE HEADER ══ --}}
<div class="dash-header">
    <div>
        <h1 class="text-3xl font-extrabold text-[#0A1612] tracking-tight uppercase">Dasbor <span class="text-[#10b981]">Admin.</span></h1>
        <p class="dash-subtitle">Selamat datang kembali — ringkasan aktivitas terkini XDrew Fashion</p>
    </div>

    <div style="display:flex;align-items:center;gap:8px;flex-shrink:0;">
        <div class="dash-date-chip">
            <span class="material-symbols-outlined" style="font-size:15px;color:#4edea3;">calendar_today</span>
            {{ now()->translatedFormat('d F Y') }}
        </div>
        <button onclick="window.location.reload()" title="Perbarui" class="dash-refresh-btn">
            <span class="material-symbols-outlined" style="font-size:17px;">refresh</span>
        </button>
    </div>
</div>

{{-- ══ STATS GRID ══ --}}
<div class="stats-grid">

    {{-- Total Penjualan --}}
    <div class="stat-card stat-card-green">
        <div class="stat-card-header">
            <span class="stat-label">Total Penjualan</span>
            <span class="material-symbols-outlined stat-icon">payments</span>
        </div>
        <div class="stat-card-footer">
            <div>
                <div class="stat-value" style="font-size:18px;">Rp {{ number_format($total_penjualan, 0, ',', '.') }}</div>
            </div>
            <span class="stat-badge">+2.0%</span>
        </div>
    </div>

    {{-- Pesanan Masuk --}}
    <div class="stat-card stat-card-purple">
        <div class="stat-card-header">
            <span class="stat-label">Pesanan Masuk</span>
            <span class="material-symbols-outlined stat-icon">shopping_bag</span>
        </div>
        <div class="stat-card-footer">
            <div class="stat-value">{{ number_format($total_pesanan) }}</div>
            <span class="stat-badge">+1.0%</span>
        </div>
    </div>

    {{-- Total Pelanggan --}}
    <div class="stat-card stat-card-orange">
        <div class="stat-card-header">
            <span class="stat-label">Total Pelanggan</span>
            <span class="material-symbols-outlined stat-icon">group</span>
        </div>
        <div class="stat-card-footer">
            <div class="stat-value">{{ number_format($total_pelanggan) }}</div>
            <span class="stat-badge">+4.0%</span>
        </div>
    </div>

    {{-- Unit Tersedia --}}
    <div class="stat-card stat-card-rose">
        <div class="stat-card-header">
            <span class="stat-label">Unit Tersedia</span>
            <span class="material-symbols-outlined stat-icon">inventory_2</span>
        </div>
        <div class="stat-card-footer">
            <div class="stat-value">{{ number_format($total_stok) }} <span style="font-size:13px;font-weight:500;">Pcs</span></div>
            <span class="stat-badge">+12%</span>
        </div>
    </div>

</div>

{{-- ══ CONTENT ══ --}}
<div class="dash-content">

    {{-- ── Activity Row ── --}}
    <div class="activity-row">

        {{-- Pesanan Terbaru --}}
        <div class="panel-card">
            <div class="panel-header">
                <div class="panel-title">
                    <div class="panel-title-icon" style="background:rgba(99,102,241,0.15);">
                        <span class="material-symbols-outlined" style="font-size:14px;color:#818cf8;font-variation-settings:'FILL' 1;">receipt_long</span>
                    </div>
                    Pesanan Terbaru
                </div>
                <a href="{{ route('admin.pesanan') }}" class="panel-link">Lihat semua</a>
            </div>
            <div class="panel-body">
                @forelse($data_pesanan->take(5) as $pesanan)
                    @php
                        $pNama = $pesanan->pelanggan ? ($pesanan->pelanggan->getAttribute('nama_lengkap') ?? $pesanan->pelanggan->getAttribute('NAMA_LENGKAP') ?? 'Tidak Dikenal') : 'Pelanggan';
                        $pStatus = strtolower($pesanan->getAttribute('status_pesanan') ?? $pesanan->getAttribute('STATUS_PESANAN') ?? 'pending');
                        $badgeCls = 'badge-amber'; $statusLabel = 'Tertunda';
                        if ($pStatus === 'selesai')               { $badgeCls = 'badge-green';  $statusLabel = 'Selesai'; }
                        elseif (in_array($pStatus, ['batal', 'dibatalkan'])) { $badgeCls = 'badge-red';  $statusLabel = 'Batal'; }
                        elseif (in_array($pStatus, ['diproses', 'proses']))  { $badgeCls = 'badge-blue'; $statusLabel = 'Diproses'; }
                        elseif ($pStatus === 'dikirim')           { $badgeCls = 'badge-indigo'; $statusLabel = 'Dikirim'; }
                    @endphp
                    <div class="list-item">
                        <div class="list-item-left">
                            @php
                                $foto = $pesanan->pelanggan ? ($pesanan->pelanggan->FOTO ?? $pesanan->pelanggan->foto) : null;
                                $fotoUrl = null;
                                if ($foto) {
                                    if (str_starts_with($foto, 'http')) { $fotoUrl = $foto; }
                                    elseif (file_exists(public_path('images/' . $foto))) { $fotoUrl = asset('images/' . $foto); }
                                    else { $fotoUrl = asset('storage/' . str_replace('public/', '', $foto)); }
                                }
                                $defaultAvatar = 'https://ui-avatars.com/api/?name=' . urlencode($pNama) . '&background=818cf8&color=fff&bold=true';
                            @endphp
                            <div class="list-avatar" style="padding:0; overflow:hidden; border:1px solid rgba(99,102,241,0.2);">
                                @if($fotoUrl)
                                    <img src="{{ $fotoUrl }}" alt="Profile" class="w-full h-full object-cover" onerror="this.src='{{ $defaultAvatar }}'">
                                @else
                                    <img src="{{ $defaultAvatar }}" alt="Profile" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <span class="list-name">{{ Str::limit($pNama, 18) }}</span>
                        </div>
                        <span class="badge {{ $badgeCls }}">{{ $statusLabel }}</span>
                    </div>
                @empty
                    <div class="empty-state">
                        <span class="material-symbols-outlined">receipt_long</span>
                        <p>Belum ada pesanan</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Pelanggan Terbaru --}}
        <div class="panel-card">
            <div class="panel-header">
                <div class="panel-title">
                    <div class="panel-title-icon" style="background:rgba(249,115,22,0.12);">
                        <span class="material-symbols-outlined" style="font-size:14px;color:#fb923c;font-variation-settings:'FILL' 1;">group</span>
                    </div>
                    Pelanggan Terbaru
                </div>
                <a href="{{ route('admin.pelanggan') }}" class="panel-link">Lihat semua</a>
            </div>
            <div class="panel-body">
                @forelse($recent_customers as $cust)
                    @php 
                        $cNama = $cust->getAttribute('nama_lengkap') ?? $cust->getAttribute('NAMA_LENGKAP') ?? 'Pelanggan'; 
                        $fotoCust = $cust->FOTO ?? $cust->foto;
                        $fotoCustUrl = null;
                        if ($fotoCust) {
                            if (str_starts_with($fotoCust, 'http')) { $fotoCustUrl = $fotoCust; }
                            elseif (file_exists(public_path('images/' . $fotoCust))) { $fotoCustUrl = asset('images/' . $fotoCust); }
                            else { $fotoCustUrl = asset('storage/' . str_replace('public/', '', $fotoCust)); }
                        }
                        $defaultCustAvatar = 'https://ui-avatars.com/api/?name=' . urlencode($cNama) . '&background=fb923c&color=fff&bold=true';
                    @endphp
                    <div class="list-item">
                        <div class="list-item-left">
                            <div class="list-avatar" style="padding:0; overflow:hidden; border:1px solid rgba(249,115,22,0.2);">
                                @if($fotoCustUrl)
                                    <img src="{{ $fotoCustUrl }}" alt="Profile" class="w-full h-full object-cover" onerror="this.src='{{ $defaultCustAvatar }}'">
                                @else
                                    <img src="{{ $defaultCustAvatar }}" alt="Profile" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <span class="list-name">{{ Str::limit($cNama, 18) }}</span>
                        </div>
                        <span class="badge badge-green">Aktif</span>
                    </div>
                @empty
                    <div class="empty-state">
                        <span class="material-symbols-outlined">group</span>
                        <p>Belum ada pelanggan</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Produk Terbaru --}}
        <div class="panel-card">
            <div class="panel-header">
                <div class="panel-title">
                    <div class="panel-title-icon" style="background:rgba(78,222,163,0.10);">
                        <span class="material-symbols-outlined" style="font-size:14px;color:#4edea3;font-variation-settings:'FILL' 1;">inventory_2</span>
                    </div>
                    Produk Terbaru
                </div>
                <a href="{{ route('admin.inventaris') }}" class="panel-link">Lihat semua</a>
            </div>
            <div class="panel-body">
                @forelse($recent_products as $prod)
                    @php 
                        $pNama = $prod->getAttribute('nama_produk') ?? $prod->getAttribute('NAMA_PRODUK') ?? 'Koleksi Baru'; 
                        $fotoProd = $prod->FOTO ?? $prod->foto;
                        $fotoProdUrl = asset('images/' . $fotoProd);
                        $defaultProdAvatar = 'https://ui-avatars.com/api/?name=' . urlencode(substr($pNama, 0, 1)) . '&background=4edea3&color=fff&bold=true';
                    @endphp
                    <div class="list-item">
                        <div class="list-item-left">
                            <div class="list-avatar" style="padding:0; overflow:hidden; border:1px solid rgba(78,222,163,0.2);">
                                @if($fotoProd)
                                    <img src="{{ $fotoProdUrl }}" alt="Produk" class="w-full h-full object-cover" onerror="this.src='{{ $defaultProdAvatar }}'">
                                @else
                                    <img src="{{ $defaultProdAvatar }}" alt="Produk" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <span class="list-name">{{ Str::limit($pNama, 18) }}</span>
                        </div>
                        <span class="badge badge-teal">Aktif</span>
                    </div>
                @empty
                    <div class="empty-state">
                        <span class="material-symbols-outlined">inventory_2</span>
                        <p>Belum ada produk</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

    {{-- ── Diagram Analisis Penjualan ── --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="table-card" style="padding: 24px 28px; min-height: 420px; display: flex; flex-direction: column; gap: 20px;">
        <div class="panel-header" style="padding: 0 0 16px 0; border-bottom: 1px solid rgba(0,0,0,0.05); margin-bottom: 0;">
            <div class="panel-title">
                <div class="panel-title-icon" style="background:rgba(16, 185, 129, 0.1);">
                    <span class="material-symbols-outlined" style="font-size:14px;color:#10b981;font-variation-settings:'FILL' 1;">trending_up</span>
                </div>
                Grafik Analisis Penjualan
            </div>
            <a href="{{ route('admin.analitik') }}" class="panel-link">Detail Analitik →</a>
        </div>
        <div style="flex: 1; min-height: 320px; position: relative;">
            <canvas id="dashboardSalesChart"></canvas>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('dashboardSalesChart').getContext('2d');
            
            let gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(16, 185, 129, 0.15)'); // Emerald light gradient
            gradient.addColorStop(1, 'rgba(16, 185, 129, 0.0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Pendapatan (Juta Rp)',
                        data: {!! json_encode($chart_data) !!},
                        borderColor: '#10b981', // Emerald green
                        backgroundColor: gradient,
                        borderWidth: 2.5,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#10b981',
                        pointBorderWidth: 2,
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: '#10b981',
                        pointHoverBorderColor: '#fff',
                        pointHoverBorderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false // Sembunyikan legenda agar tidak penuh
                        },
                        tooltip: {
                            backgroundColor: 'rgba(26, 46, 38, 0.95)', // Warna tema gelap (forest green) untuk tooltip
                            titleColor: '#10b981',
                            bodyColor: '#fff',
                            borderColor: 'rgba(255,255,255,0.1)',
                            borderWidth: 1,
                            padding: 12,
                            displayColors: false,
                            titleFont: {
                                family: "'Poppins', sans-serif",
                                weight: '600',
                                size: 11
                            },
                            bodyFont: {
                                family: "'Poppins', sans-serif",
                                size: 12
                            },
                            callbacks: {
                                label: function(context) {
                                    return 'Pendapatan: Rp ' + context.parsed.y.toLocaleString('id-ID') + ' Jt';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#64748b', // Slate-500 ticks
                                font: {
                                    family: "'Poppins', sans-serif",
                                    size: 10
                                }
                            }
                        },
                        y: {
                            border: {
                                dash: [4, 4]
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.04)' // Gridline sangat halus
                            },
                            ticks: {
                                color: '#64748b',
                                font: {
                                    family: "'Poppins', sans-serif",
                                    size: 10
                                },
                                callback: function(value) {
                                    return 'Rp ' + value + ' Jt';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

</div>
</div>
@endsection