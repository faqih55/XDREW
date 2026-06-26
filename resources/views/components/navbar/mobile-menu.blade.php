{{-- ===== MOBILE MENU OVERLAY (HANYA MUNCUL SAAT HAMBURGER DIKLIK) ===== --}}
<div x-show="mobileOpen" 
     style="display: none;"
     class="md:hidden fixed inset-0 z-[40] bg-[#1A2E26]/95 backdrop-blur-xl transition-all duration-500 ease-[cubic-bezier(0.25,1,0.5,1)]"
     x-transition:enter="transition ease-out duration-500"
     x-transition:enter-start="opacity-0 -translate-y-8"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 -translate-y-8">
     
    <div class="flex flex-col items-center justify-center min-h-screen px-6 py-24 pb-[100px] gap-8 overflow-y-auto">
        
        {{-- Mobile Nav Links --}}
        @php
            $mobileLinks = [
                ['label' => 'Koleksi Baru',  'route' => 'produk.index',   'icon' => 'checkroom'],
                ['label' => 'Berkelanjutan', 'route' => 'sustainability', 'icon' => 'eco'],
                ['label' => 'Jurnal',        'route' => 'jurnal',         'icon' => 'menu_book'],
            ];
        @endphp

        @foreach($mobileLinks as $link)
            @php $isActive = str_starts_with($currentRoute, explode('.', $link['route'])[0]); @endphp
            <a href="{{ route($link['route']) }}"
               class="relative flex flex-col items-center gap-3 group/mlink w-full max-w-[280px]">
                <div class="w-16 h-16 rounded-full flex items-center justify-center border transition-all duration-300
                            {{ $isActive ? 'bg-[#10b981]/20 border-[#10b981] shadow-[0_0_20px_rgba(16,185,129,0.3)]' : 'bg-white/5 border-white/10 group-hover/mlink:bg-white/10 group-hover/mlink:border-white/30 group-hover/mlink:scale-110' }}">
                    <span class="material-symbols-outlined text-[32px] {{ $isActive ? 'text-[#10b981]' : 'text-white/70 group-hover/mlink:text-[#10b981]' }}" 
                          style="font-variation-settings: 'FILL' {{ $isActive ? '1' : '0' }};">{{ $link['icon'] }}</span>
                </div>
                <span class="text-lg font-black uppercase tracking-[0.2em] {{ $isActive ? 'text-[#10b981]' : 'text-white/70 group-hover/mlink:text-white' }} transition-colors">
                    {{ $link['label'] }}
                </span>
                
                @if($isActive)
                    <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 w-1.5 h-1.5 rounded-full bg-[#10b981] shadow-[0_0_10px_rgba(16,185,129,0.8)]"></div>
                @endif
            </a>
        @endforeach

        <div class="w-full max-w-[200px] h-px bg-gradient-to-r from-transparent via-white/20 to-transparent my-4"></div>

        {{-- Mobile Authentication --}}
        @if(Auth::guard('pelanggan')->check())
            <div class="flex flex-col items-center gap-4 w-full max-w-[280px]">
                <a href="{{ route('profile.show') }}" class="flex items-center justify-center gap-3 w-full py-4 rounded-2xl bg-white/5 border border-white/10 text-white font-bold tracking-widest uppercase text-sm hover:bg-white/10 transition-colors">
                    <span class="material-symbols-outlined">account_circle</span>
                    Profil Saya
                </a>
                <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-user-logout-modal')); mobileOpen = false;" 
                        class="flex items-center justify-center gap-3 w-full py-4 rounded-2xl bg-[#ff7676]/10 border border-[#ff7676]/30 text-[#ff7676] font-bold tracking-widest uppercase text-sm hover:bg-[#ff7676]/20 transition-colors">
                    <span class="material-symbols-outlined">logout</span>
                    Keluar Akun
                </button>
            </div>
        @else
            <a href="{{ route('pelanggan.login') }}"
               class="flex items-center justify-center gap-3 w-full max-w-[280px] py-4 rounded-2xl bg-[#10b981] text-white font-black tracking-widest uppercase text-sm shadow-[0_10px_30px_rgba(16,185,129,0.3)] hover:scale-105 hover:bg-[#0ea5e9] transition-all duration-300">
                <span class="material-symbols-outlined">login</span>
                Masuk / Daftar
            </a>
        @endif
    </div>
</div>