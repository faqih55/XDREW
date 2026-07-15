<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel | XDrew Fashion')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Optimasi Prioritas Koneksi -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://cdn.tailwindcss.com" />

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800;900&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0&display=swap" rel="stylesheet"/>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: #F9FAFB;
            background-image: 
                linear-gradient(rgba(78, 222, 163, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(78, 222, 163, 0.04) 1px, transparent 1px);
            background-size: 50px 50px;
            color: #1A2E26;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;  /* ← column: topbar di atas, below-wrap di bawah */
            height: 100vh;
            overflow: hidden;
        }
        h1,h2,h3,h4,h5,h6 { font-family: 'Outfit', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            line-height: 1; vertical-align: middle; display: inline-block; flex-shrink: 0;
        }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.07); border-radius: 4px; }

        /* ── Page in ── */
        @keyframes pageIn { from{opacity:0;transform:translateY(8px)} to{opacity:1;transform:translateY(0)} }
        body { animation: pageIn .4s cubic-bezier(.22,1,.36,1) both; }

        /* ════════════════════ SIDEBAR ════════════════════ */
        :root {
            --sb-w0: 68px;
            --sb-w1: 210px;
            --sb-r: 20px;
            --spd: .32s;
            --ease: cubic-bezier(.4,0,.2,1);
            --accent: #4edea3;
        }

        .sidebar {
            position:relative; z-index:40;
            display:flex; flex-direction:column; flex-shrink:0;
            height:calc(100% - 2rem);
            align-self:flex-start;
            margin:1rem 0 1rem 1rem;
            width:var(--sb-w0);
            overflow:hidden;
            transition:width var(--spd) var(--ease);

            background: linear-gradient(135deg, rgba(255, 255, 255, 0.65) 0%, rgba(255, 255, 255, 0.4) 100%);
            backdrop-filter: blur(12px) saturate(180%);
            -webkit-backdrop-filter: blur(12px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: var(--sb-r);
            box-shadow: inset 0 1px 1px rgba(255,255,255,0.8), 0 8px 32px rgba(98,124,112,0.1);
            transform: translateZ(0);
            will-change: width, transform;
        }
        .sidebar:hover { width:var(--sb-w1); }

        /* glass sheens */
        .sidebar::before {
            content:''; position:absolute; inset:0;
            background:linear-gradient(155deg,rgba(255,255,255,.40) 0%,rgba(255,255,255,.10) 45%,transparent 100%);
            border-radius:var(--sb-r); pointer-events:none; z-index:0;
        }
        .sidebar::after {
            content:''; position:absolute; bottom:0;left:0;right:0;height:35%;
            background:linear-gradient(to top,rgba(16,185,129,.05) 0%,transparent 100%);
            border-radius:0 0 var(--sb-r) var(--sb-r); pointer-events:none; z-index:0;
        }

        /* ── Logo ── */
        .sb-logo {
            display:flex; align-items:center; gap:10px;
            padding:18px 12px 14px;
            border-bottom:1px solid rgba(0,0,0,.05);
            position:relative; z-index:1;
            white-space:nowrap; overflow:hidden; flex-shrink:0;
        }

        .sidebar-expanded-only {
            display: none !important;
        }
        .sidebar-collapsed-only {
            display: flex !important;
        }

        .sidebar:hover .sidebar-expanded-only,
        .sidebar.open .sidebar-expanded-only {
            display: block !important;
        }
        .sidebar:hover .sidebar-collapsed-only,
        .sidebar.open .sidebar-collapsed-only {
            display: none !important;
        }

        /* ── Nav ── */
        .sb-nav {
            display:flex; flex-direction:column; gap:3px;
            flex:1; overflow-y:auto; overflow-x:hidden;
            padding:10px 10px; position:relative; z-index:1;
        }
        .sb-section {
            font-size:9px; font-weight:700; letter-spacing:.12em; color:#94a3b8; text-transform:uppercase;
            padding:8px 6px 3px; white-space:nowrap; overflow:hidden;
            opacity:0; max-height:0;
            transition:opacity var(--spd) var(--ease), max-height var(--spd) var(--ease);
        }
        .sidebar:hover .sb-section { opacity:1; max-height:28px; }

        .nav-item {
            display:flex; align-items:center; gap:10px;
            padding:0 6px; height:44px; border-radius:12px;
            color:#475569; text-decoration:none;
            font-size:12.5px; font-weight:500; white-space:nowrap; overflow:hidden;
            position:relative;
            transition:color .18s ease, background .18s ease, box-shadow .18s ease, transform .2s cubic-bezier(.34,1.56,.64,1);
        }
        .nav-item:hover {
            color:#10b981;
            background:rgba(255,255,255,.6);
            box-shadow:inset 0 1px 0 rgba(255,255,255,.8), 0 2px 10px rgba(0,0,0,.05);
            transform:translateX(2px);
        }
        .nav-item.active {
            background:rgba(16,185,129,0.15);
            color:#10b981; font-weight:700;
        }
        .nav-item.active .material-symbols-outlined { font-variation-settings:'FILL' 1,'wght' 500,'GRAD' 0,'opsz' 24; color:#10b981; }
        .nav-item.active:hover { transform:translateX(2px); }

        .nav-icon {
            display:flex; align-items:center; justify-content:center;
            width:46px; min-width:46px; height:100%; flex-shrink:0; font-size:20px;
        }
        .nav-label {
            opacity:0; transform:translateX(-5px);
            transition:opacity var(--spd) var(--ease), transform var(--spd) var(--ease);
            flex:1; overflow:hidden; text-overflow:ellipsis;
        }
        .sidebar:hover .nav-label { opacity:1; transform:translateX(0); }

        .nav-item.danger { color:#ef4444; }
        .nav-item.danger:hover { color:#b91c1c; background:rgba(239,68,68,.10); box-shadow:inset 0 1px 0 rgba(255,255,255,.07),0 2px 10px rgba(239,68,68,.05); }

        /* ── Footer ── */
        .sb-footer { padding:10px; border-top:1px solid rgba(0,0,0,.05); position:relative; z-index:1; flex-shrink:0; }

        /* ════════════════════ TOPBAR ════════════════════ */
        .topbar {
            width: 100%;               /* full width selalu */
            flex-shrink: 0;
            padding: 0 24px;
            display: flex; align-items: center; gap: 14px;
            height: 58px;
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(12px) saturate(2);
            -webkit-backdrop-filter: blur(12px) saturate(2);
            border-bottom: 1px solid rgba(0,0,0,.05);
            box-shadow: 0 4px 30px rgba(0,0,0,.05);
            position: relative;
            z-index: 100;              /* tertinggi, selalu di atas sidebar */
            transform: translateZ(0);
            will-change: transform;
        }
        .topbar-search {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 320px;
        }
        .topbar-search input {
            width:100%;
            background:rgba(255,255,255,.6);
            border:1px solid rgba(0,0,0,.1);
            border-radius:12px;
            padding:9px 14px 9px 38px;
            font-family:'Poppins',sans-serif; font-size:12.5px; color:#1A2E26; outline:none;
            transition:border-color .2s, box-shadow .2s, background .2s;
        }
        .topbar-search input::placeholder { color:#94a3b8; }
        .topbar-search input:focus { border-color:rgba(16,185,129,.4); box-shadow:0 0 0 3px rgba(16,185,129,.10); background:#fff; }
        .topbar-search .si { position:absolute; left:11px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:17px; }

        .glass-card {
            background: #ffffff !important;
            backdrop-filter: blur(12px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(12px) saturate(180%) !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
            border-top: 1px solid rgba(255, 255, 255, 1) !important;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.08),
                0 1px 3px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 1) !important;
        }

        .topbar-right { display:flex; align-items:center; gap:10px; margin-left:auto; }

        /* ── Notif Button ── */
        .notif-wrap { position:relative; }
        .notif-btn {
            position:relative; width:36px; height:36px; border-radius:11px;
            background:rgba(255,255,255,.6);
            border:1px solid rgba(0,0,0,.08);
            display:flex; align-items:center; justify-content:center;
            color:#475569; cursor:pointer;
            transition:color .2s,background .2s,border-color .2s;
        }
        .notif-btn:hover { color:#10b981; background:#fff; }
        .notif-btn.has-unread { border-color:rgba(16,185,129,.3); color:#10b981; }
        .notif-dot {
            position:absolute; top:7px; right:7px;
            width:7px; height:7px; background:#ef4444; border-radius:50%;
            box-shadow:0 0 6px rgba(239,68,68,.9);
        }

        /* ── Notif Dropdown ── */
        .notif-dropdown {
            position:absolute; top:calc(100% + 12px); right:0;
            width:340px;
            background:rgba(255,255,255,.95);
            backdrop-filter:blur(12px) saturate(1.6);
            -webkit-backdrop-filter:blur(12px) saturate(1.6);
            border:1px solid rgba(0,0,0,.1);
            border-radius:18px;
            box-shadow:0 24px 56px rgba(0,0,0,.15);
            z-index:999;
            overflow:hidden;
            transform: translateZ(0);
            will-change: opacity, transform;

            /* hidden by default */
            opacity:0; transform:translateY(-8px) scale(.97);
            pointer-events:none;
            transition:opacity .22s ease, transform .22s cubic-bezier(.34,1.56,.64,1);
        }
        .notif-dropdown.open { opacity:1; transform:translateY(0) scale(1); pointer-events:all; }

        .notif-header {
            display:flex; align-items:center; justify-content:space-between;
            padding:14px 16px 10px;
            border-bottom:1px solid rgba(0,0,0,.05);
        }
        .notif-header-left { display:flex; align-items:center; gap:7px; }
        .notif-header-left h3 { font-size:13px; font-weight:800; color:#1A2E26; font-family:'Outfit',sans-serif; letter-spacing:.02em; }
        .notif-count {
            font-size:10px; font-weight:800;
            background:rgba(239,68,68,.1); color:#ef4444;
            border:1px solid rgba(239,68,68,.2); border-radius:20px;
            padding:2px 8px;
        }
        .notif-mark-all {
            font-size:10px; color:#64748b; font-weight:600;
            background:none; border:none; cursor:pointer; padding:4px 8px; border-radius:8px;
            transition:color .2s, background .2s;
        }
        .notif-mark-all:hover { color:#10b981; background:rgba(16,185,129,.08); }

        .notif-list { max-height:310px; overflow-y:auto; padding:8px; }
        .notif-list::-webkit-scrollbar { width:3px; }
        .notif-list::-webkit-scrollbar-thumb { background:rgba(0,0,0,.1); border-radius:4px; }

        .notif-item {
            display:flex; gap:10px; align-items:flex-start;
            padding:10px 10px; border-radius:12px;
            cursor:pointer; text-decoration:none;
            transition:background .18s;
            border:1px solid transparent;
            margin-bottom:4px;
        }
        .notif-item:last-child { margin-bottom:0; }
        .notif-item.unread { background:rgba(16,185,129,.04); border-color:rgba(16,185,129,.1); }
        .notif-item.read { opacity:.6; }
        .notif-item:hover { background:rgba(0,0,0,.03) !important; opacity:1; }

        .notif-icon-wrap {
            width:36px; height:36px; border-radius:50%; flex-shrink:0;
            display:flex; align-items:center; justify-content:center;
        }
        .notif-content { flex:1; min-width:0; }
        .notif-title { font-size:11.5px; font-weight:700; color:#1A2E26; line-height:1.3; margin-bottom:2px; }
        .notif-msg   { font-size:11px; color:#64748b; line-height:1.45; overflow:hidden; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; }
        .notif-time  { font-size:9.5px; font-weight:600; text-transform:uppercase; letter-spacing:.06em; margin-top:4px; }
        .notif-unread-dot { width:7px; height:7px; border-radius:50%; flex-shrink:0; margin-top:3px; }

        .notif-empty {
            display:flex; flex-direction:column; align-items:center; justify-content:center;
            padding:32px 16px; text-align:center;
        }
        .notif-empty-icon {
            width:48px; height:48px; border-radius:50%;
            background:rgba(0,0,0,.03); border:1px solid rgba(0,0,0,.05);
            display:flex; align-items:center; justify-content:center; margin-bottom:10px;
        }
        .notif-empty p { font-size:11.5px; color:#475569; font-weight:600; }
        .notif-empty span { font-size:10px; color:#94a3b8; margin-top:3px; display:block; }

        .notif-footer {
            padding:10px 14px; border-top:1px solid rgba(0,0,0,.05);
            display:flex; align-items:center; justify-content:center;
        }
        .notif-footer-text { font-size:10px; color:#64748b; display:flex; align-items:center; gap:4px; }

        /* ── User pill ── */
        .topbar-user {
            display:flex; align-items:center; gap:10px;
            padding:6px 12px 6px 6px; border-radius:14px;
            background:rgba(0,0,0,.03);
            border:1px solid rgba(0,0,0,.05);
        }
        .topbar-avatar { width:28px; height:28px; border-radius:50%; object-fit:cover; border:1.5px solid rgba(16,185,129,.3); }
        .topbar-name  { font-size:12px; font-weight:700; color:#1A2E26; max-width:110px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis; line-height:1.2; }
        .topbar-email { font-size:10px; color:#64748b; max-width:140px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis; }

        /* ════════════════════ LAYOUT ════════════════════ */
        /* below-wrap = area di bawah topbar: sidebar + konten */
        .below-wrap {
            flex: 1;
            display: flex;
            flex-direction: row;
            min-height: 0;      /* penting agar flex-child bisa scroll */
            overflow: hidden;
        }
        /* sidebar tetap di dalam below-wrap secara horizontal */
        .page-content { flex: 1; overflow-y: auto; min-width: 0; }

        /* glass-card utility */
        .glass-card {
            background: #ffffff !important;
            backdrop-filter: blur(12px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(12px) saturate(180%) !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
            border-top: 1px solid rgba(255, 255, 255, 1) !important;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.08),
                0 1px 3px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 1) !important;
        }

        /* ── Mobile ── */
        .mobile-header {
            display: none;
            position: fixed; top: 0; left: 0; right: 0;
            height: 54px; z-index: 200;
            background: rgba(255,255,255,.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0,0,0,.08);
            align-items: center; justify-content: space-between;
            padding: 0 16px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
            transform: translateZ(0);
            will-change: transform;
        }
        @media (max-width:1023px) {
            body { flex-direction: column; }
            .mobile-header { display: flex; }
            .topbar { display: none; }      /* sembunyikan topbar desktop di mobile */
            .below-wrap { padding-top: 54px; }
            .sidebar {
                position: fixed; left: 0; top: 54px; bottom: 0;
                height: calc(100% - 54px); margin: 0; border-radius: 0;
                transform: translateX(-100%);
                transition: transform var(--spd) var(--ease), width var(--spd) var(--ease);
                width: var(--sb-w1) !important;
                z-index: 150;
            }
            .sidebar.open { transform: translateX(0); }
            .notif-dropdown { right: -50px; width: 300px; }
        }
        @media (min-width:1024px) {
            .mobile-overlay { display: none !important; }
        }
        .mobile-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,.55); z-index:39; backdrop-filter:blur(3px); }
    </style>
</head>
<body x-data="{ mobileOpen: false }">

    <!-- Background and Glows (Smooth Emerald & Violet Theme) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-30"></div>
        <div class="absolute left-[-10%] top-[20%] w-[500px] h-[500px] rounded-full bg-[#8b5cf6] blur-[160px] opacity-[0.15] "></div>
        <div class="absolute right-[-10%] top-[40%] w-[600px] h-[600px] rounded-full bg-[#4edea3] blur-[180px] opacity-[0.15]"></div>
        <div class="absolute left-[30%] bottom-[-10%] w-[400px] h-[400px] rounded-full bg-[#c4b5fd] blur-[150px] opacity-[0.15] " style="animation-delay: 1.5s;"></div>
    </div>


    {{-- ─── Mobile Header ─── --}}
    <div class="mobile-header">
        <a href="{{ route('admin.dashboard') }}" style="display:flex;align-items:center;gap:8px;text-decoration:none;">
            <div style="display:flex;align-items:center;gap:1px;">
                <span style="font-family:'Outfit',sans-serif;font-weight:900;font-size:17px;color:#1A2E26;">XDREW</span>
                <span class="relative inline-flex items-end mb-[7px] ml-0.5">
                    <span class="block w-[5px] h-[5px] rounded-full bg-[#10b981] shadow-[0_0_8px_rgba(16,185,129,0.8)]"></span>
                    <span class="absolute inset-0 rounded-full bg-[#10b981] opacity-60 animate-ping"></span>
                </span>
            </div>
        </a>
        <button @click="mobileOpen = !mobileOpen" style="background:none;border:none;color:#475569;cursor:pointer;padding:6px;">
            <span class="material-symbols-outlined" x-text="mobileOpen ? 'close' : 'menu'" style="font-size:24px;">menu</span>
        </button>
    </div>
    <div class="mobile-overlay" x-show="mobileOpen" @click="mobileOpen = false" style="display:none;"></div>

    {{-- ─── TOPBAR (full-width, direct child of body) ─── --}}
    <div class="topbar">
        <form action="{{ route(Route::currentRouteName() == 'admin.pelanggan' || Route::currentRouteName() == 'admin.pesanan' ? Route::currentRouteName() : 'admin.inventaris') }}" method="GET" class="topbar-search">
            <button type="submit" class="si border-none bg-transparent cursor-pointer p-0 select-none hover:text-[#10b981] transition-colors flex items-center justify-center" style="position: absolute; left: 11px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 17px; outline: none; line-height: 1;">
                <span class="material-symbols-outlined" style="font-size: 17px;">search</span>
            </button>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari sesuatu...">
        </form>

        <div class="topbar-right">
            @auth('admin')
                @php
                    $adminUser  = Auth::guard('admin')->user();
                    $adminNama  = $adminUser->getAttribute('nama_admin') ?? $adminUser->getAttribute('NAMA_ADMIN') ?? $adminUser->getAttribute('name') ?? 'Admin';
                    $adminEmail = $adminUser->getAttribute('email') ?? $adminUser->getAttribute('EMAIL') ?? 'admin@xdrew.com';
                @endphp

                {{-- ══ NOTIFICATION BELL ══ --}}
                <div class="notif-wrap" id="adminNotifWrap">
                    <button class="notif-btn" id="adminNotifBtn" onclick="toggleNotif()" title="Notifikasi">
                        <span class="material-symbols-outlined" style="font-size:18px;">notifications</span>
                        <span class="notif-dot" id="adminNotifDot" style="display:none;"></span>
                    </button>

                    {{-- Dropdown --}}
                    <div class="notif-dropdown" id="adminNotifDropdown">
                        <div class="notif-header">
                            <div class="notif-header-left">
                                <span class="material-symbols-outlined" style="font-size:16px;color:#10b981;font-variation-settings:'FILL' 1">notifications</span>
                                <h3>Notifikasi</h3>
                                <span class="notif-count" id="adminNotifCount" style="display:none;"></span>
                            </div>
                            <button class="notif-mark-all" id="adminMarkAll" onclick="markAllRead()">
                                <span class="material-symbols-outlined" style="font-size:13px;vertical-align:middle;">done_all</span>
                                Tandai baca
                            </button>
                        </div>

                        <div class="notif-list" id="adminNotifList">
                            <div id="adminNotifLoading" style="display:flex;align-items:center;justify-content:center;padding:32px;">
                                <span class="material-symbols-outlined" style="font-size:22px;color:rgba(255,255,255,.2);animation:spin 1s linear infinite;">refresh</span>
                            </div>
                        </div>

                        <div class="notif-footer" id="adminNotifFooter" style="display:none;">
                            <span class="notif-footer-text">
                                <span class="material-symbols-outlined" style="font-size:13px;color:#10b981;">check_circle</span>
                                Semua notifikasi sudah dibaca
                            </span>
                        </div>
                    </div>
                </div>

                {{-- ══ USER PILL & DROPDOWN ══ --}}
                <div class="relative" x-data="{ userOpen: false }" @click.outside="userOpen = false">
                    <button @click="userOpen = !userOpen" class="topbar-user focus:outline-none transition-all hover:bg-black/5 flex items-center gap-2" style="border: 1px solid rgba(0,0,0,0.05); text-align: left; cursor: pointer; font-family: inherit;">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($adminNama) }}&background=10b981&color=ffffff&size=80&bold=true"
                             alt="Admin" class="topbar-avatar">
                        <div style="display:flex;flex-direction:column;">
                            <span class="topbar-name">{{ $adminNama }}</span>
                            <span class="topbar-email">{{ $adminEmail }}</span>
                        </div>
                        <span class="material-symbols-outlined text-[16px] text-slate-400 transition-transform duration-300"
                              :class="userOpen ? 'rotate-180 text-[#10b981]' : ''" style="margin-left: 4px;">expand_more</span>
                    </button>

                    {{-- Admin Dropdown Menu --}}
                    <div x-show="userOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-[-8px]"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 translate-y-[-8px]"
                         class="absolute right-0 top-[calc(100%+8px)] w-56 rounded-2xl bg-white border border-black/10 shadow-2xl p-2 z-[999] overflow-hidden"
                         style="display:none;">
                        
                        <a href="{{ route('admin.profile.edit') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl text-xs font-bold text-slate-700 hover:text-[#10b981] hover:bg-[#10b981]/5 transition-all duration-200 group/profile-item" style="text-decoration: none;">
                            <span class="material-symbols-outlined text-[18px] text-[#10b981]/70 group-hover/profile-item:text-[#10b981] transition-colors">
                                account_circle
                            </span>
                            Edit Profil
                        </a>

                        <hr class="border-black/5 my-1">

                        <button type="button" onclick="document.getElementById('logout-form').submit();"
                                class="flex items-center gap-3 w-full text-left px-4 py-3 rounded-xl text-xs font-bold text-red-500 hover:bg-red-500/10 border-none bg-transparent cursor-pointer transition-all duration-200 group/logout-item" style="font-family: inherit;">
                            <span class="material-symbols-outlined text-[18px] text-red-400 group-hover/logout-item:text-red-500 transition-colors">
                                logout
                            </span>
                            Keluar
                        </button>
                    </div>
                </div>
            @else
                <div class="topbar-user">
                    <img src="https://ui-avatars.com/api/?name=XDrew&background=10b981&color=ffffff&size=80&bold=true" alt="Admin" class="topbar-avatar">
                    <div style="display:flex;flex-direction:column;">
                        <span class="topbar-name">XDrew Admin</span>
                        <span class="topbar-email">admin@xdrew.com</span>
                    </div>
                </div>
            @endauth
        </div>
    </div>{{-- end topbar --}}

    {{-- ─── BELOW-WRAP: sidebar + content (flex-row) ─── --}}
    <div class="below-wrap">

    <aside class="sidebar" :class="{ 'open': mobileOpen }">
        <div class="sb-logo" style="padding-left: 16px;">
            <a href="{{ route('admin.dashboard') }}" class="relative flex items-center gap-1 group/logo" style="text-decoration: none;">
                <!-- Collapsed State: Shows 'XD' -->
                <span class="font-['Outfit'] text-2xl font-black tracking-tight text-[#0A1612] sidebar-collapsed-only">XD</span>
                <!-- Expanded State: Shows 'XDREW' -->
                <span class="font-['Outfit'] text-2xl font-black tracking-tight text-[#0A1612] sidebar-expanded-only">XDREW</span>
                <!-- Pulse Dot -->
                <span class="relative inline-flex items-end mb-[10px] ml-0.5">
                    <span class="block w-[6px] h-[6px] rounded-full bg-[#10b981] shadow-[0_0_8px_rgba(16,185,129,0.8)]"></span>
                    <span class="absolute inset-0 rounded-full bg-[#10b981] opacity-60 animate-ping"></span>
                </span>
            </a>
        </div>

        <nav class="sb-nav">
            <span class="sb-section">Menu Utama</span>

            @php $act = request()->routeIs('admin.dashboard'); @endphp
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ $act ? 'active' : '' }}">
                <div class="nav-icon"><span class="material-symbols-outlined">dashboard</span></div>
                <span class="nav-label">Dasbor</span>
            </a>

            @php $act = request()->routeIs('admin.pelanggan') || request()->routeIs('admin.pelanggan.*'); @endphp
            <a href="{{ route('admin.pelanggan') }}" class="nav-item {{ $act ? 'active' : '' }}">
                <div class="nav-icon"><span class="material-symbols-outlined">group</span></div>
                <span class="nav-label">Pelanggan</span>
            </a>

            @php $act = request()->routeIs('admin.inventaris') || request()->routeIs('admin.produk.*'); @endphp
            <a href="{{ route('admin.inventaris') }}" class="nav-item {{ $act ? 'active' : '' }}">
                <div class="nav-icon"><span class="material-symbols-outlined">inventory_2</span></div>
                <span class="nav-label">Produk</span>
            </a>

            @php $act = request()->routeIs('admin.pesanan') || request()->routeIs('admin.pesanan.*'); @endphp
            <a href="{{ route('admin.pesanan') }}" class="nav-item {{ $act ? 'active' : '' }}">
                <div class="nav-icon"><span class="material-symbols-outlined">receipt_long</span></div>
                <span class="nav-label">Pesanan</span>
            </a>

            @php $act = request()->routeIs('admin.analitik'); @endphp
            <a href="{{ route('admin.analitik') }}" class="nav-item {{ $act ? 'active' : '' }}">
                <div class="nav-icon"><span class="material-symbols-outlined">insights</span></div>
                <span class="nav-label">Analisis</span>
            </a>
        </nav>

        <div class="sb-footer">
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">@csrf</form>
            <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-admin-logout-modal'))"
                    class="nav-item danger" style="width:100%;background:none;border:none;cursor:pointer;text-align:left;">
                <div class="nav-icon"><span class="material-symbols-outlined">logout</span></div>
                <span class="nav-label">Keluar</span>
            </button>
        </div>
    </aside>

    <!-- Admin Logout Confirmation Modal -->
    <div x-data="{ showLogoutModal: false }" 
         @open-admin-logout-modal.window="showLogoutModal = true"
         x-show="showLogoutModal" 
         class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;">
        
        <!-- Modal Card -->
        <div @click.outside="showLogoutModal = false"
             class="glass-card w-full max-w-md rounded-3xl p-8 border border-white/20 shadow-2xl relative overflow-hidden"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="scale-95 translate-y-4"
             x-transition:enter-end="scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="scale-100 translate-y-0"
             x-transition:leave-end="scale-95 translate-y-4">
             
            <!-- Accent Glow background element -->
            <div class="absolute -top-12 -left-12 w-32 h-32 rounded-full bg-emerald-500/10 blur-2xl pointer-events-none"></div>

            <div class="flex flex-col items-center text-center">
                <!-- Icon container with pulse -->
                <div class="w-16 h-16 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-500 mb-5 relative">
                    <span class="material-symbols-outlined text-3xl animate-pulse">logout</span>
                </div>

                <h3 class="text-2xl font-black text-[#0A1612] tracking-tight uppercase mb-2">Keluar Sesi Admin?</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6 font-['Poppins']">
                    Apakah Anda yakin ingin keluar dari panel admin XDrew Fashion? Semua perubahan yang belum disimpan mungkin akan hilang.
                </p>

                <!-- Action Buttons -->
                <div class="flex items-center gap-3 w-full">
                    <button type="button" @click="showLogoutModal = false" 
                            class="flex-1 py-3.5 rounded-xl border border-black/10 text-[#0A1612] text-xs font-bold uppercase tracking-wider hover:bg-black/5 transition-all font-['Outfit']">
                        Batal
                    </button>
                    
                    <button type="button" 
                            onclick="document.getElementById('logout-form').submit();"
                            class="flex-1 py-3.5 rounded-xl bg-emerald-500 text-white text-xs font-bold uppercase tracking-wider hover:bg-emerald-600 hover:shadow-lg hover:shadow-emerald-500/20 transition-all font-['Outfit']">
                        Log Out
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ─── Page Content ─── --}}
    <div class="page-content">
        @yield('content')
    </div>

    </div>{{-- end below-wrap --}}

    @stack('scripts')

    {{-- ═══════════════════════════════════════════════
         NOTIFICATION JAVASCRIPT
    ═══════════════════════════════════════════════ --}}
    @auth('admin')
    <script>
        const NOTIF_URL      = "{{ route('admin.notifications.index') }}";
        const MARK_ALL_URL   = "{{ route('admin.notifications.markAll') }}";
        const CSRF           = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let notifOpen    = false;
        let notifLoaded  = false;

        /* ── Spin keyframe ── */
        const style = document.createElement('style');
        style.textContent = `@keyframes spin { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }`;
        document.head.appendChild(style);

        /* ── Toggle dropdown ── */
        function toggleNotif() {
            notifOpen = !notifOpen;
            const drop = document.getElementById('adminNotifDropdown');
            drop.classList.toggle('open', notifOpen);

            if (notifOpen && !notifLoaded) {
                loadNotifications();
            }
        }

        /* ── Close when clicking outside ── */
        document.addEventListener('click', function(e) {
            if (notifOpen && !document.getElementById('adminNotifWrap').contains(e.target)) {
                notifOpen = false;
                document.getElementById('adminNotifDropdown').classList.remove('open');
            }
        });

        /* ── Load notifications via AJAX ── */
        async function loadNotifications() {
            try {
                const res  = await fetch(NOTIF_URL, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                const data = await res.json();
                renderNotifications(data);
                notifLoaded = true;
            } catch(err) {
                document.getElementById('adminNotifList').innerHTML = `
                    <div class="notif-empty">
                        <div class="notif-empty-icon"><span class="material-symbols-outlined" style="font-size:22px;color:rgba(255,255,255,.25);">wifi_off</span></div>
                        <p>Gagal memuat notifikasi</p>
                    </div>`;
            }
        }

        /* ── Render notifications ── */
        function renderNotifications(data) {
            const list   = document.getElementById('adminNotifList');
            const dot    = document.getElementById('adminNotifDot');
            const btn    = document.getElementById('adminNotifBtn');
            const count  = document.getElementById('adminNotifCount');
            const footer = document.getElementById('adminNotifFooter');

            const { notifications, unread_count } = data;

            /* Update badge */
            if (unread_count > 0) {
                dot.style.display = 'block';
                btn.classList.add('has-unread');
                count.textContent = unread_count + ' baru';
                count.style.display = 'inline';
                footer.style.display = 'none';
            } else {
                dot.style.display = 'none';
                btn.classList.remove('has-unread');
                count.style.display = 'none';
                if (notifications.length > 0) footer.style.display = 'flex';
            }

            if (notifications.length === 0) {
                list.innerHTML = `
                    <div class="notif-empty">
                        <div class="notif-empty-icon"><span class="material-symbols-outlined" style="font-size:24px;color:rgba(255,255,255,.2);">notifications_none</span></div>
                        <p>Belum ada notifikasi</p>
                        <span>Notifikasi akan muncul di sini</span>
                    </div>`;
                return;
            }

            list.innerHTML = notifications.map(n => `
                <div class="notif-item ${n.is_unread ? 'unread' : 'read'}"
                     onclick="markOneRead('${n.id}', '${n.url || ''}', this)">
                    <div class="notif-icon-wrap" style="background:${n.color}18;border:1px solid ${n.color}28;">
                        <span class="material-symbols-outlined" style="font-size:17px;color:${n.color};font-variation-settings:'FILL' 1">${n.icon}</span>
                    </div>
                    <div class="notif-content">
                        <p class="notif-title">${n.title}</p>
                        <p class="notif-msg">${n.message}</p>
                        <p class="notif-time" style="color:${n.color}88;">${n.time}</p>
                    </div>
                    ${n.is_unread ? `<span class="notif-unread-dot" style="background:${n.color};box-shadow:0 0 5px ${n.color};"></span>` : ''}
                </div>
            `).join('');
        }

        /* ── Mark one as read ── */
        async function markOneRead(id, url, el) {
            const markUrl = `{{ url('/admin/notifications') }}/${id}/read`;
            try {
                await fetch(markUrl, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': CSRF, 'X-Requested-With': 'XMLHttpRequest' }
                });
                el.classList.remove('unread');
                el.classList.add('read');
                /* remove dot */
                const dot = el.querySelector('.notif-unread-dot');
                if (dot) dot.remove();

                /* update badge count */
                const curCount = parseInt(document.getElementById('adminNotifCount').textContent) || 0;
                if (curCount > 0) {
                    const newCount = curCount - 1;
                    if (newCount <= 0) {
                        document.getElementById('adminNotifDot').style.display = 'none';
                        document.getElementById('adminNotifBtn').classList.remove('has-unread');
                        document.getElementById('adminNotifCount').style.display = 'none';
                        document.getElementById('adminNotifFooter').style.display = 'flex';
                    } else {
                        document.getElementById('adminNotifCount').textContent = newCount + ' baru';
                    }
                }
            } catch(e) {}

            if (url && url !== '') {
                setTimeout(() => { window.location.href = url; }, 300);
            }
        }

        /* ── Mark ALL as read ── */
        async function markAllRead() {
            try {
                await fetch(MARK_ALL_URL, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': CSRF, 'X-Requested-With': 'XMLHttpRequest' }
                });
                /* Update UI */
                document.querySelectorAll('.notif-item.unread').forEach(el => {
                    el.classList.remove('unread'); el.classList.add('read');
                    const dot = el.querySelector('.notif-unread-dot');
                    if (dot) dot.remove();
                });
                document.getElementById('adminNotifDot').style.display = 'none';
                document.getElementById('adminNotifBtn').classList.remove('has-unread');
                document.getElementById('adminNotifCount').style.display = 'none';
                document.getElementById('adminNotifFooter').style.display = 'flex';
            } catch(e) {}
        }

        /* ── Auto-load badge count on page load ── */
        window.addEventListener('DOMContentLoaded', async function() {
            try {
                const res  = await fetch(NOTIF_URL, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                const data = await res.json();
                if (data.unread_count > 0) {
                    document.getElementById('adminNotifDot').style.display = 'block';
                    document.getElementById('adminNotifBtn').classList.add('has-unread');
                }
            } catch(e) {}
        });
    </script>
    @endauth

</body>
</html>