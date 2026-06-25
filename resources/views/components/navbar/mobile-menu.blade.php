        {{-- ===== MOBILE MENU (Liquid Glass Dropdown) ===== --}}
        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4 scale-95 origin-top"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100 origin-top"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100 origin-top"
             x-transition:leave-end="opacity-0 -translate-y-4 scale-95 origin-top"
             class="absolute top-[calc(100%+16px)] left-4 right-4 max-w-[850px] mx-auto md:hidden p-3 glass-dropdown rounded-[2rem] z-50 shadow-[0_20px_50px_rgba(0,0,0,0.8)] pointer-events-auto"
             style="display:none;">

            <div class="flex flex-col gap-1">
                @php $mobileLinks = [
                    ['label' => 'Koleksi',       'route' => 'produk.index',     'icon' => 'styler'],
                    ['label' => 'Berkelanjutan', 'route' => 'sustainability',   'icon' => 'eco'],
                    ['label' => 'Jurnal',        'route' => 'jurnal',           'icon' => 'article'],
                    ['label' => 'Keranjang',     'route' => 'cart.index',       'icon' => 'shopping_bag'],
                ]; @endphp

                @foreach($mobileLinks as $mLink)
                    @php $mActive = str_starts_with($currentRoute, explode('.', $mLink['route'])[0]); @endphp
                    <a href="{{ route($mLink['route']) }}"
                       class="flex items-center gap-4 px-5 py-4 rounded-2xl text-[13px] font-bold uppercase tracking-[0.15em]
                              transition-all duration-300
                              {{ $mActive ? 'text-[#4edea3] bg-white/10 shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)] border border-white/10' : 'text-gray-300 hover:text-white glass-btn-hover' }}">
                        <span class="material-symbols-outlined text-[22px] {{ $mActive ? 'text-[#4edea3]' : 'text-gray-400' }}">{{ $mLink['icon'] }}</span>
                        {{ $mLink['label'] }}
                        @if($mLink['route'] === 'cart.index' && count(session('cart', [])) > 0)
                            <span class="ml-auto px-2.5 py-1 rounded-full bg-[#4edea3] text-[#0a100d] text-[11px] font-black shadow-[0_0_10px_rgba(78,222,163,0.5)]">
                                {{ count(session('cart', [])) }}
                            </span>
                        @endif
                    </a>
                @endforeach

                <div class="mt-2 mb-1 px-3">
                    <div class="h-px w-full bg-white/10"></div>
                </div>

                @if(Auth::guard('pelanggan')->check())
                    <a href="{{ route('profile.show') }}"
                       class="flex items-center gap-4 px-5 py-4 rounded-2xl text-[13px] font-bold uppercase tracking-[0.15em]
                              text-[#4edea3] bg-[#4edea3]/10 border border-[#4edea3]/20 shadow-[inset_0_1px_1px_rgba(78,222,163,0.2)] transition-all duration-300">
                        <span class="material-symbols-outlined text-[22px]">account_circle</span>
                        Profil Saya
                    </a>
                    <button type="button"
                            onclick="window.dispatchEvent(new CustomEvent('open-user-logout-modal'))"
                            class="flex items-center gap-4 w-full px-5 py-4 rounded-2xl text-[13px] font-bold uppercase tracking-[0.15em]
                                   text-[#ff7676] hover:bg-[#ff7676]/10 border border-transparent hover:border-[#ff7676]/20 transition-all duration-300">
                        <span class="material-symbols-outlined text-[22px]">logout</span>
                        Keluar
                    </button>
                @else
                    <a href="{{ route('pelanggan.login') }}"
                       class="flex items-center justify-center gap-3 px-5 py-4 rounded-2xl text-[13px] font-black uppercase tracking-[0.15em]
                              bg-[#4edea3] text-[#0a100d] hover:bg-[#6ffbbe] mt-1
                              shadow-[0_0_20px_rgba(78,222,163,0.3)] transition-all duration-300">
                        <span class="material-symbols-outlined text-[22px]">login</span>
                        Masuk / Daftar
                    </a>
                @endif
            </div>
        </div>
