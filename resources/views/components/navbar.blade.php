@php
    $currentRoute = request()->route()?->getName() ?? '';
@endphp

@include('components.navbar.styles')

<div x-data="{
        mobileOpen: false,
        searchOpen: false,
        notifOpen: false,
        cartCount: {{ collect(session('cart', []))->sum('jumlah') }},
    }"
    @keydown.escape.window="searchOpen = false; mobileOpen = false; notifOpen = false"
    class="fixed left-1/2 -translate-x-1/2 z-50 flex items-center justify-between px-6 py-2 w-[calc(100%-2rem)] max-w-[1200px] pointer-events-auto group glass-pill shadow-[0_15px_40px_rgba(0,0,0,0.1)] rounded-[2.5rem]"
    style="top: calc(1.5rem + env(safe-area-inset-top));"
>

    @include('components.navbar.pill-1')

    @if(!isset($hidePill2) || !$hidePill2)
        @include('components.navbar.pill-2')
    @endif

    @if(!isset($hidePill3) || !$hidePill3)
        @include('components.navbar.pill-3')
    @endif

    @include('components.navbar.search-overlay')

    @include('components.navbar.notif-dropdown')

    @include('components.navbar.mobile-menu')
</div>

<!-- User Logout Confirmation Modal -->
<div x-data="{ showLogoutModal: false }" 
     @open-user-logout-modal.window="showLogoutModal = true"
     @keydown.escape.window="showLogoutModal = false"
     x-show="showLogoutModal" 
     class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     style="display: none;">
    
    <!-- Modal Card -->
    <div @click.outside="showLogoutModal = false"
         class="bg-white/95 backdrop-blur-xl w-full max-w-md rounded-[2.5rem] p-8 border border-white/60 shadow-2xl relative overflow-hidden"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="scale-95 translate-y-4"
         x-transition:enter-end="scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="scale-100 translate-y-0"
         x-transition:leave-end="scale-95 translate-y-4">
         
        <!-- Emerald Glow background element -->
        <div class="absolute -top-12 -left-12 w-32 h-32 rounded-full bg-[#10b981]/10 blur-2xl pointer-events-none"></div>

        <div class="flex flex-col items-center text-center">
            <!-- Icon container with pulse -->
            <div class="w-16 h-16 rounded-full bg-[#10b981]/10 border border-[#10b981]/20 flex items-center justify-center text-[#10b981] mb-5 relative">
                <span class="material-symbols-outlined text-3xl animate-pulse">logout</span>
            </div>

            <h3 class="text-2xl font-black text-[#1A2E26] tracking-tight uppercase mb-2 font-['Outfit']">Keluar Akun?</h3>
            <p class="text-slate-500 text-sm leading-relaxed mb-6 font-['Poppins']">
                Apakah Anda yakin ingin keluar dari akun Anda? Keranjang belanja Anda tetap aman tersimpan.
            </p>

            <!-- Hidden form for logging out -->
            <form id="user-logout-form" action="{{ route('pelanggan.logout') }}" method="POST" class="hidden">
                @csrf
            </form>

            <!-- Action Buttons -->
            <div class="flex items-center gap-3 w-full">
                <button type="button" @click="showLogoutModal = false" 
                        class="flex-1 py-3.5 rounded-2xl border border-black/10 text-[#1A2E26] text-xs font-bold uppercase tracking-wider hover:bg-black/5 transition-all font-['Outfit']">
                    Batal
                </button>
                
                <button type="button" 
                        onclick="document.getElementById('user-logout-form').submit();"
                        class="flex-1 py-3.5 rounded-2xl bg-[#10b981] text-white text-xs font-bold uppercase tracking-wider hover:bg-[#059669] hover:shadow-lg hover:shadow-[#10b981]/20 transition-all font-['Outfit']">
                    Log Out
                </button>
            </div>
        </div>
    </div>
</div>