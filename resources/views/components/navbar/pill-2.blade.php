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