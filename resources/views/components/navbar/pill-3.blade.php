    <!-- Pill 3: Profile/Login -->
    <div class="hidden md:flex items-center justify-center relative z-10 transition-all duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group/pill3">

            {{-- Profile / Login --}}
            @if(Auth::guard('pelanggan')->check())
                @php 
                    $user = Auth::guard('pelanggan')->user(); 
                    $isProfilePage = request()->routeIs('profile.*');
                    $userName = $user->getAttribute('nama_lengkap') ?? $user->getAttribute('NAMA_LENGKAP') ?? 'User';
                    $userEmail = $user->getAttribute('email') ?? $user->getAttribute('EMAIL') ?? '';
                    $userFoto = $user->getAttribute('foto') ?? $user->getAttribute('FOTO') ?? null;
                    // Warna avatar dipersonalisasi berdasarkan nama
                    $avatarColors = ['4edea3', '6ee7b7', '34d399', '10b981', '059669', 'a78bfa', '818cf8', 'fb7185', 'f472b6', 'fbbf24'];
                    $avatarBgColor = $avatarColors[abs(crc32($userName)) % count($avatarColors)];
                    $avatarUrl = $userFoto 
                        ? (str_starts_with($userFoto, 'http') ? $userFoto : asset('storage/' . $userFoto))
                        : 'https://ui-avatars.com/api/?name=' . urlencode($userName) . '&background=' . $avatarBgColor . '&color=fff&bold=true&size=128&font-size=0.45';
                @endphp
                @if($isProfilePage)
                    {{-- Profile Page View --}}
                    <div class="group/btn flex-shrink-0 flex items-center gap-0 pl-2.5 pr-2.5 py-2 rounded-full bg-white/5 border border-white/10 shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)] group-hover/btn:gap-2.5 group-hover/btn:pr-5 transition-all duration-500 ease-[cubic-bezier(0.25,1,0.5,1)]">
                        <img src="{{ $avatarUrl }}" 
                             alt="{{ $userName }}"
                             class="w-9 h-9 rounded-full border-2 border-[#{{ $avatarBgColor }}]/60 shadow-[0_0_12px_rgba(78,222,163,0.4)] flex-shrink-0 object-cover">
                        <span class="max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/btn:max-w-[90px] group-hover/btn:opacity-100 transition-all duration-500 ease-[cubic-bezier(0.25,1,0.5,1)] text-[12px] font-bold tracking-wide text-white truncate hidden lg:block">
                            {{ explode(' ', $userName)[0] }}
                        </span>
                    </div>
                @else
                    {{-- Dropdown Trigger --}}
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                        <button @click="open = !open"
                                id="navbar-profile-btn"
                                class="flex-shrink-0 flex items-center gap-0 pl-2.5 pr-2.5 py-2 rounded-full transition-all duration-500 ease-[cubic-bezier(0.25,1,0.5,1)]
                                       border border-transparent hover:border-white/10 glass-btn-hover group group-hover:gap-2.5 group-hover:pr-4"
                                :class="open ? 'bg-white/10 border-white/20 shadow-[inset_0_1px_1px_rgba(255,255,255,0.2)]' : ''">
                            <img src="{{ $avatarUrl }}" 
                                 alt="{{ $userName }}"
                                 class="w-9 h-9 rounded-full border-2 border-[#{{ $avatarBgColor }}]/60 shadow-[0_0_12px_rgba(78,222,163,0.4)] flex-shrink-0 object-cover">
                            <span class="max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover:max-w-[90px] group-hover:opacity-100 transition-all duration-500 ease-[cubic-bezier(0.25,1,0.5,1)] text-[12px] font-bold tracking-wide text-white/80 group-hover:text-white truncate hidden lg:block">
                                {{ explode(' ', $userName)[0] }}
                            </span>
                            <span class="max-w-0 overflow-hidden opacity-0 group-hover:max-w-[24px] group-hover:opacity-100 transition-all duration-500 ease-[cubic-bezier(0.25,1,0.5,1)] material-symbols-outlined text-[18px] text-white/50"
                                  :class="open ? 'rotate-180 text-[#4edea3]' : ''">expand_more</span>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-300 origin-top-right"
                             x-transition:enter-start="opacity-0 scale-90 -translate-y-4"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200 origin-top-right"
                             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-90 -translate-y-4"
                             class="absolute right-0 top-[calc(100%+16px)] w-64 rounded-[2rem] p-2 z-50 glass-dropdown"
                             style="display:none;">

                            <div class="px-4 py-4 mb-2 bg-white/5 rounded-[1.5rem] border border-white/5 shadow-[inset_0_1px_1px_rgba(255,255,255,0.1)]">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="{{ $avatarUrl }}" 
                                         alt="{{ $userName }}"
                                         class="w-10 h-10 rounded-full border-2 border-[#{{ $avatarBgColor }}]/60 shadow-[0_0_12px_rgba(78,222,163,0.4)] flex-shrink-0 object-cover">
                                    <div class="min-w-0">
                                        <p class="text-[9px] font-black uppercase tracking-[0.2em] text-[#4edea3]/80 mb-0.5">Akun Saya</p>
                                        <p class="text-sm font-bold text-white truncate">{{ $userName }}</p>
                                        <p class="text-[10px] text-gray-400 truncate">{{ $userEmail }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-1 mb-2">
                                @foreach([
                                    ['label' => 'Profil Saya',          'icon' => 'account_circle',   'route' => 'profile.show'],
                                    ['label' => 'Pesanan Saya',         'icon' => 'package_2',        'route' => 'profile.pesanan'],
                                    ['label' => 'Metode Pembayaran',    'icon' => 'credit_card',      'route' => 'checkout.pembayaran'],
                                ] as $item)
                                <a href="{{ route($item['route']) }}"
                                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-[13px] font-bold text-gray-300
                                          hover:text-white glass-btn-hover transition-all duration-200 group/item">
                                    <span class="material-symbols-outlined text-[18px] text-[#4edea3]/70 group-hover/item:text-[#4edea3] transition-colors group-hover/item:scale-110">
                                        {{ $item['icon'] }}
                                    </span>
                                    {{ $item['label'] }}
                                </a>
                                @endforeach
                            </div>

                            <button type="button"
                                    onclick="window.dispatchEvent(new CustomEvent('open-user-logout-modal'))"
                                    class="flex items-center gap-3 w-full px-4 py-3 rounded-xl text-[13px] font-bold
                                           text-[#ff7676] hover:bg-[#ff7676]/10 hover:shadow-[inset_0_1px_1px_rgba(255,118,118,0.2)] transition-all duration-200 group/logout border border-transparent hover:border-[#ff7676]/20">
                                <span class="material-symbols-outlined text-[18px] group-hover/logout:scale-110 transition-transform">logout</span>
                                Keluar
                            </button>
                        </div>
                    </div>
                @endif
            @else
                <a href="{{ route('pelanggan.login') }}"
                   id="navbar-login-btn"
                   class="group/btn flex-shrink-0 hidden md:flex items-center justify-center overflow-hidden h-12 ml-2 rounded-full text-[13px] font-black uppercase tracking-[0.15em]
                          bg-[#10b981]/10 text-[#10b981] border border-[#10b981]/30
                          hover:bg-[#10b981] hover:text-[#ffffff] hover:shadow-[0_0_20px_rgba(16,185,129,0.5)]
                          transition-all duration-500 ease-[cubic-bezier(0.25,1,0.5,1)] active:scale-95
                          w-12 hover:w-[130px] hover:justify-start hover:pl-4">
                    <span class="material-symbols-outlined text-[20px] flex-shrink-0">login</span>
                    <span class="max-w-0 overflow-hidden whitespace-nowrap opacity-0 group-hover/btn:max-w-[120px] group-hover/btn:opacity-100 group-hover/btn:ml-2.5 transition-all duration-500 ease-[cubic-bezier(0.25,1,0.5,1)]">Masuk</span>
                </a>
                <a href="{{ route('pelanggan.login') }}"
                   class="md:hidden flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full
                          text-[#10b981] bg-[#10b981]/10 border border-[#10b981]/30 hover:bg-[#10b981] hover:text-[#ffffff] transition-all">
                    <span class="material-symbols-outlined text-[20px]">login</span>
                </a>
            @endif
    </div>

