    <aside class="sidebar" :class="{ 'open': mobileOpen }">
        <div class="sb-logo" style="padding-left: 16px;">
            <a href="{{ route('admin.dashboard') }}" class="relative flex items-center gap-1 group/logo" style="text-decoration: none;">
                <!-- Collapsed State: Shows 'XD' -->
                <span class="font-['Outfit'] text-2xl font-black tracking-tight text-[#1A2E26] sidebar-collapsed-only">XD</span>
                <!-- Expanded State: Shows 'XDREW' -->
                <span class="font-['Outfit'] text-2xl font-black tracking-tight text-[#1A2E26] sidebar-expanded-only">XDREW</span>
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
