    <!-- Pill 1: Liquid Glass Navbar (Logo & Menu) -->
    <nav class="flex items-center justify-start gap-4 lg:gap-8 h-[60px] relative z-10 transition-all duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group/pill1 flex-1">
        
        {{-- ===== LOGO ===== --}}
        <a href="{{ route('home') }}" class="relative flex items-center gap-1 group/logo flex-shrink-0 z-10">
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
        </a>

        {{-- ===== DESKTOP NAV LINKS ===== --}}
        <div class="hidden md:flex items-center gap-2 nav-links-container">
            @php
                $navLinks = [
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
                          {{ $isActive ? 'text-[#10b981] bg-white/40 shadow-[inset_0_2px_4px_rgba(255,255,255,0.6),0_4px_12px_rgba(98,124,112,0.1)] border border-white/60' : 'text-[#1A2E26]/70 hover:text-[#10b981] hover:bg-white/50 border border-transparent hover:border-white/60 shadow-sm' }}">
                    <span class="relative z-10 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-[22px] {{ $isActive ? 'text-[#10b981]' : 'text-[#1A2E26]/60 group-hover/link:text-[#10b981]' }} transition-colors" style="font-variation-settings: 'FILL' {{ $isActive ? '1' : '0' }};">{{ $link['icon'] }}</span>
                    </span>
                    <span class="nav-link-text opacity-0 transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)] text-[12px] font-black uppercase tracking-[0.15em]
                                 {{ $isActive ? 'opacity-100 ml-2.5 ' . $link['text_active'] : 'max-w-0 ' . $link['text_hover'] . ' group-hover/link:opacity-100 group-hover/link:ml-2.5' }}">
                        {{ $link['label'] }}
                    </span>
                </a>
            @endforeach
        </div>
    </nav>
