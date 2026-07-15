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

