        {{-- ===== SEARCH OVERLAY (Liquid Glass Dropdown) ===== --}}
        <div x-show="searchOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4 scale-95 origin-top"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100 origin-top"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100 origin-top"
             x-transition:leave-end="opacity-0 -translate-y-4 scale-95 origin-top"
             @click.outside="searchOpen = false"
             class="absolute top-[calc(100%+16px)] left-4 right-4 max-w-[850px] mx-auto p-3 md:p-4 glass-dropdown rounded-[2rem] z-50 shadow-[0_20px_50px_rgba(98,124,112,0.15)] pointer-events-auto"
             style="display:none;">
            
            <form action="{{ route('search') }}" method="GET" class="flex flex-col gap-3">
                <div class="relative flex items-center bg-white/40 shadow-[inset_0_2px_4px_rgba(255,255,255,0.6),0_4px_10px_rgba(98,124,112,0.05)] p-2 rounded-[1.5rem] border border-white/50 focus-within:border-[#10b981]/40 focus-within:bg-white/70 transition-all duration-500 group">
                    <div class="absolute left-6 flex items-center justify-center">
                        <span class="material-symbols-outlined text-[#10b981] text-[22px] transition-transform group-focus-within:scale-110 drop-shadow-[0_2px_4px_rgba(16,185,129,0.2)]">search</span>
                    </div>
                    <input type="text"
                           name="query"
                           id="navbar-search-input"
                           x-ref="searchInput"
                           x-init="$watch('searchOpen', val => { if(val) $nextTick(() => $refs.searchInput?.focus()) })"
                           placeholder="Cari koleksi, kemeja, celana..."
                           class="w-full bg-transparent text-[#0A1612] text-[15px] font-semibold outline-none placeholder-gray-400 font-['Poppins'] py-2.5 pl-14 pr-[100px]"
                           autocomplete="off">
                    <div class="absolute right-2">
                        <button type="submit"
                                class="text-[11px] font-black uppercase tracking-[0.15em] text-white bg-[#10b981] hover:bg-[#059669] transition-colors duration-300 px-6 py-2.5 
                                       rounded-xl shadow-[0_4px_15px_rgba(16,185,129,0.3)] hover:shadow-[0_6px_20px_rgba(16,185,129,0.4)] hover:-translate-y-0.5 active:scale-95">
                            Cari
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-between px-4 pb-1">
                    <div class="flex gap-2 items-center hidden sm:flex">
                        <span class="text-[9px] uppercase tracking-widest text-[#0A1612]/60 font-bold">Populer:</span>
                        <a href="{{ route('search', ['query' => 'Kemeja']) }}" class="text-[10px] font-medium text-[#0A1612]/80 hover:text-[#10b981] px-2.5 py-1 rounded-md bg-white/40 hover:bg-white/60 transition-colors border border-white/40 hover:border-[#10b981]/30">Kemeja</a>
                        <a href="{{ route('search', ['query' => 'Celana']) }}" class="text-[10px] font-medium text-[#0A1612]/80 hover:text-[#10b981] px-2.5 py-1 rounded-md bg-white/40 hover:bg-white/60 transition-colors border border-white/40 hover:border-[#10b981]/30">Celana</a>
                        <a href="{{ route('search', ['query' => 'Jaket']) }}" class="text-[10px] font-medium text-[#0A1612]/80 hover:text-[#10b981] px-2.5 py-1 rounded-md bg-white/40 hover:bg-white/60 transition-colors border border-white/40 hover:border-[#10b981]/30">Jaket</a>
                    </div>
                    <p class="text-[10px] text-[#0A1612]/60 font-['Poppins'] ml-auto">
                        Tekan <kbd class="px-1.5 py-0.5 rounded bg-white/60 border border-white/80 text-[#0A1612]/80 font-mono shadow-sm">ESC</kbd>
                    </p>
                </div>
            </form>
        </div>
