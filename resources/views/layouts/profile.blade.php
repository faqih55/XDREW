<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Profil Pelanggan | XDrew Fashion')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700;800&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <style>
        body { background-color: #EAF3EF; color: #1A2E26; font-family: 'Poppins', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; vertical-align: middle; }
        
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #EAF3EF; }
        ::-webkit-scrollbar-thumb { background: #CBE3D9; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #10b981; }

        @keyframes smoothReveal {
            from { opacity: 0; transform: translateY(15px); filter: blur(4px); }
            to { opacity: 1; transform: translateY(0); filter: blur(0); }
        }
        .animate-smooth-reveal {
            animation: smoothReveal 0.6s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }
    </style>
</head>
<body class="bg-[#EAF3EF] antialiased h-screen text-[#1A2E26] overflow-hidden flex flex-col animate-smooth-reveal" 
      x-data="{ 
        mobileOpen: false, 
        isMini: localStorage.getItem('sidebar-mini-profile') === 'true',
        toggleMini() {
            this.isMini = !this.isMini;
            localStorage.setItem('sidebar-mini-profile', this.isMini);
        }
      }">

    @include('components.navbar', ['hideSearch' => true, 'hidePill2' => true, 'hidePill3' => true])

    <div class="flex-1 flex overflow-hidden w-full max-w-[1600px] mx-auto pt-28 relative">
        
        <!-- Mobile Profile Menu Toggle -->
        <div class="lg:hidden absolute top-28 left-0 w-full bg-white/60 backdrop-blur-md border-b border-white/80 z-50 flex justify-between items-center p-4 shadow-sm">
            <h1 class="text-lg font-bold text-[#1A2E26] font-['Outfit']">Menu Profil</h1>
            <button @click="mobileOpen = !mobileOpen" class="text-[#1A2E26] hover:text-[#10b981] focus:outline-none transition-colors">
                <span class="material-symbols-outlined text-3xl" x-text="mobileOpen ? 'close' : 'menu_open'">menu_open</span>
            </button>
        </div>

        <!-- Mobile Overlay -->
        <div x-show="mobileOpen" @click="mobileOpen = false" x-transition.opacity class="fixed inset-0 bg-black/60 z-40 lg:hidden backdrop-blur-sm" style="display: none;"></div>

        <!-- Sidebar -->
        <aside :class="{ 'lg:w-20': isMini, 'lg:w-72': !isMini, 'translate-x-0': mobileOpen, '-translate-x-full lg:translate-x-0': !mobileOpen }" 
               class="fixed inset-y-0 left-0 z-50 w-72 lg:w-auto transform lg:static transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] flex flex-col shrink-0 lg:my-auto lg:ml-6 lg:rounded-[32px] lg:h-[calc(100vh-160px)] border-r lg:border border-white/60"
               style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.45) 0%, rgba(255, 255, 255, 0.2) 100%); backdrop-filter: blur(40px); -webkit-backdrop-filter: blur(40px); border-color: rgba(255, 255, 255, 0.6); box-shadow: inset 0 1px 1px rgba(255,255,255,0.8), 0 8px 32px rgba(98,124,112,0.1);">

            <div class="border-b border-[#1A2E26]/10 flex flex-col justify-center gap-4 transition-all duration-500 relative"
                 :class="isMini ? 'px-4 py-6 items-center' : 'p-6'">
                <div x-show="!isMini" x-transition:enter="transition ease-out duration-200" class="flex flex-col justify-center w-full overflow-hidden">
                    <!-- Brand Logo -->
                    <h1 class="text-2xl font-extrabold uppercase tracking-widest font-['Outfit'] text-[#1A2E26] leading-none mb-5">XDREW<span class="text-[#10b981]">.</span></h1>
                    
                    @auth('pelanggan')
                    @php
                        $user = Auth::guard('pelanggan')->user();
                        $namaLengkap = $user->getAttribute('nama_lengkap') ?? $user->getAttribute('NAMA_LENGKAP') ?? 'Pelanggan';
                        $email = $user->getAttribute('email') ?? $user->getAttribute('EMAIL') ?? '';
                    @endphp
                    <div class="flex items-center gap-3">
                        @if($user->foto ?? $user->FOTO)
                            <img src="{{ asset('storage/' . ($user->foto ?? $user->FOTO)) }}" alt="User" class="w-9 h-9 rounded-full border border-[#10b981]/30 object-cover shrink-0">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($namaLengkap) }}&background=10b981&color=fff&size=100&bold=true" alt="User" class="w-9 h-9 rounded-full border border-[#10b981]/30 object-cover shrink-0">
                        @endif
                        <div class="flex items-center justify-between gap-2 w-full overflow-hidden">
                            <div class="flex flex-col gap-0.5 overflow-hidden">
                                <span class="text-xs font-bold tracking-wider text-[#10b981] uppercase truncate">{{ $namaLengkap }}</span>
                                <span class="text-[10px] font-medium tracking-wide text-[#1A2E26]/50 truncate">{{ $email }}</span>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="w-7 h-7 rounded-lg bg-white/60 border border-white/80 flex items-center justify-center text-[#1A2E26]/70 hover:text-[#10b981] hover:bg-[#10b981]/10 hover:border-[#10b981]/30 transition-all shrink-0 group shadow-sm" title="Edit Profil">
                                <span class="material-symbols-outlined text-[14px] group-hover:scale-110 transition-transform">edit</span>
                            </a>
                        </div>
                    </div>
                    @endauth
                </div>
                <div x-show="isMini" x-transition:enter="transition ease-out duration-200" class="flex flex-col items-center gap-5">
                    <h1 class="text-xl font-extrabold uppercase tracking-widest font-['Outfit'] text-[#10b981]">XD</h1>
                </div>
                <button @click="toggleMini()" class="hidden lg:flex shrink-0 w-8 h-8 bg-white/60 border border-white/80 rounded-full items-center justify-center text-[#1A2E26] hover:bg-white hover:scale-110 transition-all cursor-pointer shadow-[0_4px_12px_rgba(98,124,112,0.1)] z-10" :class="isMini ? 'absolute -right-4 bg-white shadow-[0_4px_15px_rgba(98,124,112,0.2)]' : ''">
                    <span class="material-symbols-outlined text-[18px] transition-transform duration-300" :class="isMini ? 'rotate-180' : ''">chevron_left</span>
                </button>
            </div>

            <nav class="flex-1 overflow-y-auto mt-2 transition-all duration-500"
                 :class="isMini ? 'px-3 py-4' : 'px-4 py-6'">
                
                <!-- MAIN SECTION -->
                <div class="flex flex-col gap-1.5 relative mb-6">
                    <h3 class="text-[10px] font-bold text-[#1A2E26]/50 tracking-[0.2em] uppercase transition-all duration-300 mb-1"
                        :class="isMini ? 'text-center text-[8px] opacity-0 h-0 overflow-hidden' : 'px-4 opacity-100 h-auto'">Akun Saya</h3>
                    
                    @php $isActive = request()->routeIs('profile.show'); @endphp
                    <a href="{{ route('profile.show') }}" 
                       class="flex items-center gap-4 rounded-2xl font-medium tracking-wide transition-all duration-300 relative overflow-hidden group {{ $isActive ? 'bg-gradient-to-r from-white/80 to-white/40 text-[#10b981] shadow-[0_4px_15px_rgba(98,124,112,0.1)] border border-white/80' : 'text-[#1A2E26]/70 hover:bg-white/60 hover:text-[#1A2E26]' }}"
                       :class="isMini ? 'justify-center px-0 py-3' : 'px-4 py-3.5'">
                        @if($isActive)
                            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1.5 bg-[#10b981] rounded-r-full shadow-[0_0_12px_rgba(16,185,129,0.5)] transition-all duration-300" :class="isMini ? 'h-5' : 'h-8'"></div>
                        @endif
                        <span class="material-symbols-outlined shrink-0 transition-transform group-hover:scale-110" style="{{ $isActive ? 'font-variation-settings: \'FILL\' 1;' : '' }}">person</span>
                        <span class="whitespace-nowrap transition-all duration-300" :class="isMini ? 'opacity-0 w-0 hidden' : 'opacity-100 block'">Profil Saya</span>
                    </a>

                    @php $isActive = request()->routeIs('profile.pesanan'); @endphp
                    <a href="{{ route('profile.pesanan') }}" 
                       class="flex items-center gap-4 rounded-2xl font-medium tracking-wide transition-all duration-300 relative overflow-hidden group {{ $isActive ? 'bg-gradient-to-r from-white/80 to-white/40 text-[#10b981] shadow-[0_4px_15px_rgba(98,124,112,0.1)] border border-white/80' : 'text-[#1A2E26]/70 hover:bg-white/60 hover:text-[#1A2E26]' }}"
                       :class="isMini ? 'justify-center px-0 py-3' : 'px-4 py-3.5'">
                        @if($isActive)
                            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1.5 bg-[#10b981] rounded-r-full shadow-[0_0_12px_rgba(16,185,129,0.5)] transition-all duration-300" :class="isMini ? 'h-5' : 'h-8'"></div>
                        @endif
                        <span class="material-symbols-outlined shrink-0 transition-transform group-hover:scale-110" style="{{ $isActive ? 'font-variation-settings: \'FILL\' 1;' : '' }}">shopping_cart</span>
                        <span class="whitespace-nowrap transition-all duration-300" :class="isMini ? 'opacity-0 w-0 hidden' : 'opacity-100 block'">Pesanan Saya</span>
                    </a>

                    @php $isActive = request()->routeIs('profile.lacak'); @endphp
                    <a href="{{ route('profile.lacak') }}" 
                       class="flex items-center gap-4 rounded-2xl font-medium tracking-wide transition-all duration-300 relative overflow-hidden group {{ $isActive ? 'bg-gradient-to-r from-white/80 to-white/40 text-[#10b981] shadow-[0_4px_15px_rgba(98,124,112,0.1)] border border-white/80' : 'text-[#1A2E26]/70 hover:bg-white/60 hover:text-[#1A2E26]' }}"
                       :class="isMini ? 'justify-center px-0 py-3' : 'px-4 py-3.5'">
                        @if($isActive)
                            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1.5 bg-[#10b981] rounded-r-full shadow-[0_0_12px_rgba(16,185,129,0.5)] transition-all duration-300" :class="isMini ? 'h-5' : 'h-8'"></div>
                        @endif
                        <span class="material-symbols-outlined shrink-0 transition-transform group-hover:scale-110" style="{{ $isActive ? 'font-variation-settings: \'FILL\' 1;' : '' }}">local_shipping</span>
                        <span class="whitespace-nowrap transition-all duration-300" :class="isMini ? 'opacity-0 w-0 hidden' : 'opacity-100 block'">Lacak Pesanan</span>
                    </a>

                    @php $isActive = request()->routeIs('profile.wishlist'); @endphp
                    <a href="{{ route('profile.wishlist') }}" 
                       class="flex items-center gap-4 rounded-2xl font-medium tracking-wide transition-all duration-300 relative overflow-hidden group {{ $isActive ? 'bg-gradient-to-r from-white/80 to-white/40 text-[#10b981] shadow-[0_4px_15px_rgba(98,124,112,0.1)] border border-white/80' : 'text-[#1A2E26]/70 hover:bg-white/60 hover:text-[#1A2E26]' }}"
                       :class="isMini ? 'justify-center px-0 py-3' : 'px-4 py-3.5'">
                        @if($isActive)
                            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1.5 bg-[#10b981] rounded-r-full shadow-[0_0_12px_rgba(16,185,129,0.5)] transition-all duration-300" :class="isMini ? 'h-5' : 'h-8'"></div>
                        @endif
                        <span class="material-symbols-outlined shrink-0 transition-transform group-hover:scale-110" style="{{ $isActive ? 'font-variation-settings: \'FILL\' 1;' : '' }}">favorite</span>
                        <span class="whitespace-nowrap transition-all duration-300" :class="isMini ? 'opacity-0 w-0 hidden' : 'opacity-100 block'">Daftar Keinginan</span>
                    </a>
                </div>

                <!-- SETTINGS SECTION -->
                <div class="flex flex-col gap-1.5 relative">
                    <div class="h-px bg-[#1A2E26]/10 mb-3 transition-all duration-300" :class="isMini ? 'mx-2' : 'mx-4'"></div>
                    <h3 class="text-[10px] font-bold text-[#1A2E26]/50 tracking-[0.2em] uppercase transition-all duration-300 mb-1"
                        :class="isMini ? 'text-center text-[8px] opacity-0 h-0 overflow-hidden' : 'px-4 opacity-100 h-auto'">Pengaturan</h3>
                    
                    @php $isActive = request()->routeIs('profile.alamat'); @endphp
                    <a href="{{ route('profile.alamat') }}" 
                       class="flex items-center gap-4 rounded-2xl font-medium tracking-wide transition-all duration-300 relative overflow-hidden group {{ $isActive ? 'bg-gradient-to-r from-white/80 to-white/40 text-[#10b981] shadow-[0_4px_15px_rgba(98,124,112,0.1)] border border-white/80' : 'text-[#1A2E26]/70 hover:bg-white/60 hover:text-[#1A2E26]' }}"
                       :class="isMini ? 'justify-center px-0 py-3' : 'px-4 py-3.5'">
                        @if($isActive)
                            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1.5 bg-[#10b981] rounded-r-full shadow-[0_0_12px_rgba(16,185,129,0.5)] transition-all duration-300" :class="isMini ? 'h-5' : 'h-8'"></div>
                        @endif
                        <span class="material-symbols-outlined shrink-0 transition-transform group-hover:scale-110" style="{{ $isActive ? 'font-variation-settings: \'FILL\' 1;' : '' }}">location_on</span>
                        <span class="whitespace-nowrap transition-all duration-300" :class="isMini ? 'opacity-0 w-0 hidden' : 'opacity-100 block'">Alamat</span>
                    </a>

                    @php $isActive = request()->routeIs('profile.keamanan'); @endphp
                    <a href="{{ route('profile.keamanan') }}" 
                       class="flex items-center gap-4 rounded-2xl font-medium tracking-wide transition-all duration-300 relative overflow-hidden group {{ $isActive ? 'bg-gradient-to-r from-white/80 to-white/40 text-[#10b981] shadow-[0_4px_15px_rgba(98,124,112,0.1)] border border-white/80' : 'text-[#1A2E26]/70 hover:bg-white/60 hover:text-[#1A2E26]' }}"
                       :class="isMini ? 'justify-center px-0 py-3' : 'px-4 py-3.5'">
                        @if($isActive)
                            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1.5 bg-[#10b981] rounded-r-full shadow-[0_0_12px_rgba(16,185,129,0.5)] transition-all duration-300" :class="isMini ? 'h-5' : 'h-8'"></div>
                        @endif
                        <span class="material-symbols-outlined shrink-0 transition-transform group-hover:scale-110" style="{{ $isActive ? 'font-variation-settings: \'FILL\' 1;' : '' }}">security</span>
                        <span class="whitespace-nowrap transition-all duration-300" :class="isMini ? 'opacity-0 w-0 hidden' : 'opacity-100 block'">Keamanan</span>
                    </a>
                </div>

            </nav>
            
            <div class="p-4 border-t border-[#1A2E26]/10 mt-auto">
                <button type="button" 
                        onclick="window.dispatchEvent(new CustomEvent('open-user-logout-modal'))"
                        class="w-full flex items-center gap-4 rounded-2xl font-medium tracking-wide transition-all duration-300 relative overflow-hidden group text-[#e11d48] hover:bg-[#e11d48]/10 border border-transparent hover:border-[#e11d48]/30"
                        :class="isMini ? 'justify-center px-0 py-3' : 'px-4 py-3.5'">
                    <span class="material-symbols-outlined shrink-0 transition-transform group-hover:scale-110" style="font-variation-settings: 'FILL' 1;">logout</span>
                    <span class="whitespace-nowrap transition-all duration-300 font-bold" :class="isMini ? 'opacity-0 w-0 hidden' : 'opacity-100 block'">Keluar</span>
                </button>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 h-full overflow-y-auto bg-[#EAF3EF] pt-16 lg:pt-0 w-full min-w-0 px-4 py-6 lg:p-10">
            @yield('content')
            
            <div class="mt-20">
                @include('components.footer')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
