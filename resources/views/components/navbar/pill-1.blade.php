    <!-- Pill 1: Liquid Glass Navbar (Logo & Menu) -->
    <nav class="flex items-center justify-start gap-4 lg:gap-8 h-[60px] relative z-10 transition-all duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group/pill1 flex-1">
        
        {{-- ===== LOGO ===== --}}
        <div class="relative flex items-center gap-1 group/logo flex-shrink-0 z-10 cursor-default">
            <span class="font-['Outfit'] text-2xl font-black tracking-tight text-white transition-all duration-300 group-hover/logo:text-[#4edea3]"
                  style="text-shadow: 0 0 30px rgba(78,222,163,0);"
                  @mouseenter="$el.style.textShadow='0 0 20px rgba(78,222,163,0.5)'"
                  @mouseleave="$el.style.textShadow='0 0 30px rgba(78,222,163,0)'">
                XDREW
            </span>
            <span class="relative inline-flex items-end mb-[16px] ml-0.5">
                <span class="block w-[8px] h-[8px] rounded-full bg-[#4edea3] shadow-[0_0_10px_rgba(78,222,163,0.8)]"></span>
                <span class="absolute inset-0 rounded-full bg-[#4edea3] opacity-60 animate-ping"></span>
            </span>
        </div>

        {{-- ===== DESKTOP NAV LINKS ===== --}}
        <div class="hidden md:flex items-center gap-2 nav-links-container">
            @php
                $navLinks = [
                    ['label' => 'Beranda',       'route' => 'home',           'icon' => 'home',      'hover_w' => 'hover:w-[130px]', 'active_w' => 'w-[130px]', 'text_hover' => 'group-hover/link:max-w-[85px]',  'text_active' => 'max-w-[85px]'],
                    ['label' => 'Koleksi',       'route' => 'produk.index',   'icon' => 'checkroom', 'hover_w' => 'hover:w-[130px]', 'active_w' => 'w-[130px]', 'text_hover' => 'group-hover/link:max-w-[85px]',  'text_active' => 'max-w-[85px]'],
                    ['label' => 'Berkelanjutan', 'route' => 'sustainability', 'icon' => 'eco',       'hover_w' => 'hover:w-[195px]', 'active_w' => 'w-[195px]', 'text_hover' => 'group-hover/link:max-w-[145px]', 'text_active' => 'max-w-[145px]'],
                    ['label' => 'Jurnal',        'route' => 'jurnal',         'icon' => 'menu_book', 'hover_w' => 'hover:w-[125px]', 'active_w' => 'w-[125px]', 'text_hover' => 'group-hover/link:max-w-[80px]',  'text_active' => 'max-w-[80px]'],
                ];
            @endphp

            @foreach($navLinks as $link)
                @php $isActive = str_starts_with($currentRoute, explode('.', $link['route'])[0]); @endphp
                <a href="{{ route($link['route']) }}"
                   class="group/link flex-shrink-0 relative flex items-center justify-start rounded-full transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)] overflow-hidden whitespace-nowrap
                          h-12 w-12 px-[13px] {{ $isActive ? $link['active_w'] : $link['hover_w'] }}
                          {{ $isActive ? 'text-[#10b981] bg-white/40 shadow-[inset_0_2px_4px_rgba(255,255,255,0.6),0_4px_12px_rgba(98,124,112,0.1)] border border-white/60' : 'text-[#0A1612]/70 hover:text-[#10b981] hover:bg-white/50 border border-transparent hover:border-white/60 shadow-sm' }}">
                    <span class="relative z-10 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-[22px] {{ $isActive ? 'text-[#10b981]' : 'text-[#0A1612]/60 group-hover/link:text-[#10b981]' }} transition-colors" style="font-variation-settings: 'FILL' {{ $isActive ? '1' : '0' }};">{{ $link['icon'] }}</span>
                    </span>
                    <span class="nav-link-text opacity-0 transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)] text-[12px] font-black uppercase tracking-[0.15em]
                                 {{ $isActive ? 'opacity-100 ml-2.5 ' . $link['text_active'] : 'max-w-0 ' . $link['text_hover'] . ' group-hover/link:opacity-100 group-hover/link:ml-2.5' }}">
                        {{ $link['label'] }}
                    </span>
                </a>
            @endforeach
        </div>

            {{-- MENU DUKUNGAN DROPDOWN --}}
    <div class="relative hidden lg:block" @click.outside="supportOpen = false">
        <button @click="supportOpen = !supportOpen"
                class="flex items-center gap-1 text-[11px] font-black uppercase tracking-[0.2em] transition-all duration-300 px-4 py-2 hover:text-[#10b981] {{ request()->is('*dukungan*') ? 'text-[#10b981]' : 'text-[#0A1612]' }}">
            Dukungan
            <span class="material-symbols-outlined text-[16px] transition-transform duration-300" 
                  :class="supportOpen ? 'rotate-180' : ''">expand_more</span>
        </button>

        <div x-show="supportOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0 translate-y-4"
             class="absolute left-0 top-[calc(100%+16px)] w-[240px] bg-white/80 backdrop-blur-xl border border-white/80 shadow-[0_15px_35px_rgba(98,124,112,0.1)] rounded-[1.5rem] p-2 z-50"
             style="display: none;"
             x-cloak>
            <div class="flex flex-col gap-1">
                <a href="{{ route('profile.lacak') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[11px] font-bold text-[#0A1612]/80 uppercase tracking-widest hover:text-[#10b981] hover:bg-white transition-all">
                    <span class="material-symbols-outlined text-[18px]">local_shipping</span> Lacak Pesanan
                </a>
                <a href="{{ route('dukungan.privasi') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[11px] font-bold text-[#0A1612]/80 uppercase tracking-widest hover:text-[#10b981] hover:bg-white transition-all {{ request()->routeIs('dukungan.privasi') ? 'text-[#10b981] bg-white' : '' }}">
                    <span class="material-symbols-outlined text-[18px]">policy</span> Kebijakan Privasi
                </a>
                <a href="{{ route('dukungan.syarat') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[11px] font-bold text-[#0A1612]/80 uppercase tracking-widest hover:text-[#10b981] hover:bg-white transition-all {{ request()->routeIs('dukungan.syarat') ? 'text-[#10b981] bg-white' : '' }}">
                    <span class="material-symbols-outlined text-[18px]">gavel</span> Syarat & Ketentuan
                </a>
                <a href="{{ route('dukungan.kontak') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-[11px] font-bold text-[#0A1612]/80 uppercase tracking-widest hover:text-[#10b981] hover:bg-white transition-all {{ request()->routeIs('dukungan.kontak') ? 'text-[#10b981] bg-white' : '' }}">
                    <span class="material-symbols-outlined text-[18px]">support_agent</span> Hubungi Kami
                </a>
            </div>
        </div>
    </div>
        
    </nav>
