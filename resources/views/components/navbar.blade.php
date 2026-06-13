<header x-data="{ searchOpen: false, mobileMenuOpen: false }" 
        x-effect="document.body.style.overflow = mobileMenuOpen ? 'hidden' : ''"
        class="fixed top-0 w-full z-50 bg-[#0e1511]/95 backdrop-blur-md border-b border-white/5 shadow-sm transition-all duration-300 ease-in-out">
    
    <nav class="relative z-50 flex justify-between items-center px-6 md:px-16 py-4 w-full max-w-[1440px] mx-auto bg-transparent">
        
        <a class="font-display-lg text-2xl md:text-[26px] text-white font-normal tracking-wide uppercase relative z-50" href="{{ route('home') }}">
            XDREW FASHION
        </a>
        
        <div class="hidden md:flex items-center gap-8 lg:gap-10 text-[11px] md:text-xs font-bold uppercase tracking-[0.15em]">
            <a class="{{ request()->routeIs('home') ? 'text-[#4edea3] border-b-2 border-[#4edea3]' : 'text-gray-300 hover:text-white' }} transition-colors pb-1.5" href="{{ route('home') }}">Beranda</a>
            <a class="{{ request()->routeIs('produk') ? 'text-[#4edea3] border-b-2 border-[#4edea3]' : 'text-gray-300 hover:text-white' }} transition-colors pb-1.5" href="{{ route('produk') }}">Koleksi</a>
            <a class="{{ request()->routeIs('sustainability') ? 'text-[#4edea3] border-b-2 border-[#4edea3]' : 'text-gray-300 hover:text-white' }} transition-colors pb-1.5" href="{{ route('sustainability') }}">Keberlanjutan</a>
            <a class="{{ request()->routeIs('jurnal') ? 'text-[#4edea3] border-b-2 border-[#4edea3]' : 'text-gray-300 hover:text-white' }} transition-colors pb-1.5" href="{{ route('jurnal') }}">Jurnal</a>
        </div>

        <div class="flex items-center gap-4 md:gap-6 relative z-50" @keydown.escape.window="searchOpen = false; mobileMenuOpen = false">
            
            <div x-show="searchOpen" 
                 x-cloak
                 x-transition:enter="transition-all duration-300 ease-out"
                 x-transition:enter-start="w-0 opacity-0 scale-95"
                 x-transition:enter-end="w-48 md:w-64 opacity-100 scale-100"
                 @click.away="searchOpen = false"
                 class="overflow-hidden absolute right-16 md:right-32 top-1/2 -translate-y-1/2 bg-[#0e1511]">
                <form action="{{ route('search') }}" method="GET" class="relative">
                    <input type="text" name="query" x-ref="searchInput"
                           x-init="$watch('searchOpen', value => { if(value) $nextTick(() => $refs.searchInput.focus()) })"
                           placeholder="Cari koleksi..." 
                           class="w-full bg-white/5 border border-white/10 rounded-full px-4 py-1.5 text-xs text-white focus:outline-none focus:border-[#4edea3] transition-colors placeholder:text-gray-500">
                </form>
            </div>

            <button @click="searchOpen = !searchOpen" class="material-symbols-outlined text-gray-300 hover:text-[#4edea3] transition-colors text-[24px]" title="Cari">
                <span x-text="searchOpen ? 'close' : 'search'"></span>
            </button>
            
            <a href="{{ route('keranjang.index') }}" class="relative material-symbols-outlined text-gray-300 hover:text-[#4edea3] transition-colors text-[24px]" title="Keranjang">
                shopping_bag
                @if(session('cart') && count(session('cart')) > 0)
                    <span class="absolute -top-1.5 -right-2 bg-[#4edea3] text-black text-[9px] font-bold px-1 py-0.5 rounded-full min-w-[16px] text-center leading-none">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>
            
            <div class="hidden md:block">
                @auth('pelanggan')
                    <a href="{{ route('profile.show') }}" class="material-symbols-outlined text-gray-300 hover:text-[#4edea3] transition-colors text-[24px]" title="Profil Saya">person</a>
                @else
                    <a href="{{ route('pelanggan.login') }}" class="material-symbols-outlined text-gray-300 hover:text-[#4edea3] transition-colors text-[24px]" title="Login">person</a>
                @endauth
            </div>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden material-symbols-outlined text-gray-300 hover:text-[#4edea3] transition-colors text-[28px] ml-2">
                <span x-text="mobileMenuOpen ? 'close' : 'menu'"></span>
            </button>
        </div>
    </nav>

    <div x-show="mobileMenuOpen" 
         x-cloak
         class="fixed inset-0 z-40 bg-[#0e1511]/95 md:hidden flex flex-col items-center justify-center min-h-screen w-full"
         x-transition:enter="transition-all duration-500 ease-out"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-all duration-300 ease-in"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
         
         <div class="flex flex-col items-center gap-8 text-center w-full px-6">
             <a href="{{ route('home') }}" class="font-display-lg text-2xl uppercase tracking-[0.2em] text-white hover:text-[#4edea3]">Beranda</a>
             <a href="{{ route('produk') }}" class="font-display-lg text-2xl uppercase tracking-[0.2em] text-white hover:text-[#4edea3]">Koleksi</a>
             <a href="{{ route('keranjang.index') }}" class="font-display-lg text-2xl uppercase tracking-[0.2em] text-white hover:text-[#4edea3]">Keranjang</a>
             
             <div class="w-12 h-[1px] bg-white/20 my-4"></div>
             
             @auth('pelanggan')
                 <a href="{{ route('profile.show') }}" class="text-[#4edea3] font-display-lg text-lg uppercase tracking-[0.1em]">Akun Saya</a>
             @else
                 <a href="{{ route('pelanggan.login') }}" class="text-white hover:text-[#4edea3] font-display-lg text-lg uppercase tracking-[0.1em]">Masuk / Daftar</a>
             @endauth
         </div>
    </div>
</header>