    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: #EAF3EF;
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

        /* ── Ambient glows ── */
        .glow { position:fixed; border-radius:50%; pointer-events:none; z-index:0; filter: blur(60px); }
        .glow-1 { top:-15%;right:-10%;width:520px;height:520px;background:radial-gradient(circle,rgba(111,251,190,0.3) 0%,transparent 70%); }
        .glow-2 { bottom:-15%;left:-8%;width:440px;height:440px;background:radial-gradient(circle,rgba(78,222,163,0.2) 0%,transparent 70%); }
        .glow-3 { top:40%;right:-8%;width:360px;height:360px;background:radial-gradient(circle,rgba(59,213,143,0.25) 0%,transparent 70%); }

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
            height:calc(100% - 2rem);  /* 100% of below-wrap height */
            align-self:flex-start;
            margin:1rem 0 1rem 1rem;
            width:var(--sb-w0);
            overflow:hidden;
            transition:width var(--spd) var(--ease);

            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(28px) saturate(180%);
            -webkit-backdrop-filter: blur(28px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: var(--sb-r);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05), inset 0 1px 1px rgba(255, 255, 255, 0.8);
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
            backdrop-filter: blur(28px) saturate(2);
            -webkit-backdrop-filter: blur(28px) saturate(2);
            border-bottom: 1px solid rgba(0,0,0,.05);
            box-shadow: 0 4px 30px rgba(0,0,0,.05);
            position: relative;
            z-index: 100;              /* tertinggi, selalu di atas sidebar */
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
            background: rgba(255, 255, 255, 0.4) !important;
            backdrop-filter: blur(28px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(28px) saturate(180%) !important;
            border: 1px solid rgba(255, 255, 255, 0.6) !important;
            box-shadow: 
                0 16px 40px -10px rgba(98, 124, 112, 0.15), 
                inset 0 1px 3px rgba(255, 255, 255, 0.8) !important;
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
            backdrop-filter:blur(28px) saturate(1.6);
            -webkit-backdrop-filter:blur(28px) saturate(1.6);
            border:1px solid rgba(0,0,0,.1);
            border-radius:18px;
            box-shadow:0 24px 56px rgba(0,0,0,.15);
            z-index:999;
            overflow:hidden;

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
            background:rgba(255,255,255,.6) !important;
            backdrop-filter:blur(20px) saturate(1.5); -webkit-backdrop-filter:blur(20px) saturate(1.5);
            border:1px solid rgba(0,0,0,.06); border-top-color:rgba(255,255,255,.8);
            box-shadow: 0 4px 20px rgba(0,0,0,.03);
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
