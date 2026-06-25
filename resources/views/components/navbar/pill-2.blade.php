    <!-- Pill 2: Actions (Search, Notification, Cart, Hamburger) -->
    <div class="flex items-center justify-center gap-2 md:gap-3 relative z-10 transition-all duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group/pill2">

            @if(!request()->routeIs('profile.*'))
                {{-- Search Toggle --}}
                <button @click="searchOpen = !searchOpen; notifOpen = false; mobileOpen = false"
                        id="navbar-search-btn"
                        class="group/btn flex-shrink-0 relative flex items-center justify-start rounded-full transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)]
                               w-12 h-12 px-[13px] hover:w-[110px]
                               text-[#1A2E26]/70 hover:text-[#10b981] hover:bg-white/50 active:scale-95 border border-transparent hover:border-white/60 overflow-hidden whitespace-nowrap"
                        :class="searchOpen ? 'w-[110px] bg-[#4edea3]/20 text-[#10b981] border-[#4edea3]/30 shadow-[inset_0_1px_2px_rgba(78,222,163,0.4)]' : ''"
                        aria-label="Cari">
                    <span class="material-symbols-outlined text-[22px] transition-transform duration-300 flex-shrink-0" 
                          :class="searchOpen ? 'scale-110' : ''" 
                          x-text="searchOpen ? 'close' : 'search'">search</span>
                    <span class="max-w-0 opacity-0 group-hover/btn:max-w-[80px] group-hover/btn:opacity-100 group-hover/btn:ml-2.5 transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)] text-[12px] font-black uppercase tracking-[0.15em]"
                          :class="searchOpen ? 'max-w-[80px] opacity-100 ml-2.5' : ''">Cari</span>
                </button>

                {{-- Notification: fungsional jika ada notifikasi apapun, badge hanya jika ada unread --}}
                @if(isset($totalNotifCount) && $totalNotifCount > 0)
                    {{-- Ada notifikasi (read/unread): bisa diklik --}}
                    <button @click="notifOpen = !notifOpen; searchOpen = false; mobileOpen = false"
                            id="navbar-notif-btn"
                            class="group/btn flex-shrink-0 relative flex items-center justify-start rounded-full transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)]
                                   w-12 h-12 px-[13px] hover:w-[125px]
                                   hover:bg-white/50 active:scale-95 overflow-hidden whitespace-nowrap
                                   {{ isset($unreadCount) && $unreadCount > 0
                                       ? 'text-[#ff7676] border border-[#ff7676]/30 hover:border-[#ff7676]/50 bg-[#ff7676]/10'
                                       : 'text-[#1A2E26]/70 hover:text-[#10b981] border border-transparent hover:border-white/60' }}"
                            :class="notifOpen ? ({{ isset($unreadCount) && $unreadCount > 0 ? 'true' : 'false' }} ? 'w-[125px] bg-[#ff7676]/20 border-[#ff7676]/50' : 'w-[125px] bg-[#4edea3]/20 border-[#4edea3]/30') : ''"
                            aria-label="Notifikasi">
                        <span class="relative flex items-center justify-center flex-shrink-0">
                            @if(isset($unreadCount) && $unreadCount > 0)
                                <span class="material-symbols-outlined text-[22px] text-[#ff7676]" style="font-variation-settings: 'FILL' 1;">notifications</span>
                                <span class="absolute -top-1 -right-1 min-w-[16px] h-4 px-1 rounded-full bg-[#ff7676] text-white text-[9px] font-black leading-4 text-center animate-pulse shadow-[0_0_10px_rgba(255,118,118,0.8)]">
                                    {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                                </span>
                            @else
                                <span class="material-symbols-outlined text-[22px]">notifications</span>
                            @endif
                        </span>
                        <span class="max-w-0 opacity-0 group-hover/btn:max-w-[100px] group-hover/btn:opacity-100 group-hover/btn:ml-2.5 transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)] text-[12px] font-black uppercase tracking-[0.15em] {{ isset($unreadCount) && $unreadCount > 0 ? 'text-[#ff7676]' : '' }}"
                              :class="notifOpen ? 'max-w-[100px] opacity-100 ml-2.5' : ''">
                            @if(isset($unreadCount) && $unreadCount > 0)
                                {{ $unreadCount }} Baru
                            @else
                                Notif
                            @endif
                        </span>
                    </button>
                @else
                    {{-- Belum ada notifikasi sama sekali: tampil tapi non-fungsional --}}
                    <div id="navbar-notif-btn"
                         class="group/btn flex-shrink-0 relative flex items-center justify-start rounded-full transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)]
                                w-12 h-12 px-[13px] hover:w-[110px]
                                text-[#1A2E26]/40 cursor-default border border-transparent hover:bg-white/30 overflow-hidden whitespace-nowrap"
                         title="Belum ada notifikasi">
                        <span class="relative flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-[22px]">notifications_none</span>
                        </span>
                        <span class="max-w-0 opacity-0 group-hover/btn:max-w-[80px] group-hover/btn:opacity-100 group-hover/btn:ml-2.5 transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)] text-[12px] font-black uppercase tracking-[0.15em]">Notif</span>
                    </div>
                @endif


                {{-- Cart --}}
                <a href="{{ route('cart.index') }}"
                   id="navbar-cart-btn"
                   class="group/btn flex-shrink-0 relative flex items-center justify-start rounded-full transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)]
                          w-12 h-12 px-[13px] hover:w-[160px]
                          text-[#1A2E26]/70 hover:text-[#10b981] hover:bg-white/50 active:scale-95 border border-transparent hover:border-white/60 overflow-hidden whitespace-nowrap"
                   aria-label="Keranjang">
                    <span class="relative flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-[22px]">shopping_bag</span>
                        <span x-show="cartCount > 0" x-cloak
                              class="absolute -top-1.5 -right-1.5 w-[18px] h-[18px] flex items-center justify-center
                                     rounded-full bg-[#10b981] text-white text-[9px] font-black leading-none shadow-[0_0_12px_rgba(16,185,129,0.5)]"
                              x-text="cartCount > 9 ? '9+' : cartCount">
                        </span>
                    </span>
                    <span class="max-w-0 opacity-0 group-hover/btn:max-w-[120px] group-hover/btn:opacity-100 group-hover/btn:ml-2.5 transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)] text-[12px] font-black uppercase tracking-[0.15em]">Keranjang</span>
                </a>
            @endif

            {{-- Mobile Hamburger --}}
            <button @click="mobileOpen = !mobileOpen; searchOpen = false; notifOpen = false"
                    id="navbar-mobile-btn"
                    class="md:hidden w-12 h-12 flex flex-col items-center justify-center gap-[5px]
                           rounded-full glass-btn-hover transition-colors ml-1 group/menu border border-transparent hover:border-white/10"
                    aria-label="Menu">
                <span class="block w-5 h-[2px] bg-white rounded-full transition-all duration-300 origin-center shadow-[0_0_5px_rgba(255,255,255,0.5)]"
                      :class="mobileOpen ? 'rotate-45 translate-y-[7px]' : ''"></span>
                <span class="block w-5 h-[2px] bg-white rounded-full transition-all duration-300 shadow-[0_0_5px_rgba(255,255,255,0.5)]"
                      :class="mobileOpen ? 'opacity-0 scale-x-0' : ''"></span>
                <span class="block w-5 h-[2px] bg-white rounded-full transition-all duration-300 origin-center shadow-[0_0_5px_rgba(255,255,255,0.5)]"
                      :class="mobileOpen ? '-rotate-45 -translate-y-[7px]' : ''"></span>
            </button>
    </div>
