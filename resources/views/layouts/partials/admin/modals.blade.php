    <!-- Admin Logout Confirmation Modal -->
    <div x-data="{ showLogoutModal: false }" 
         @open-admin-logout-modal.window="showLogoutModal = true"
         x-show="showLogoutModal" 
         class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;">
        
        <!-- Modal Card -->
        <div @click.outside="showLogoutModal = false"
             class="glass-card w-full max-w-md rounded-3xl p-8 border border-white/20 shadow-2xl relative overflow-hidden"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="scale-95 translate-y-4"
             x-transition:enter-end="scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="scale-100 translate-y-0"
             x-transition:leave-end="scale-95 translate-y-4">
             
            <!-- Accent Glow background element -->
            <div class="absolute -top-12 -left-12 w-32 h-32 rounded-full bg-emerald-500/10 blur-2xl pointer-events-none"></div>

            <div class="flex flex-col items-center text-center">
                <!-- Icon container with pulse -->
                <div class="w-16 h-16 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-500 mb-5 relative">
                    <span class="material-symbols-outlined text-3xl animate-pulse">logout</span>
                </div>

                <h3 class="text-2xl font-black text-[#1A2E26] tracking-tight uppercase mb-2">Keluar Sesi Admin?</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6 font-['Poppins']">
                    Apakah Anda yakin ingin keluar dari panel admin XDrew Fashion? Semua perubahan yang belum disimpan mungkin akan hilang.
                </p>

                <!-- Action Buttons -->
                <div class="flex items-center gap-3 w-full">
                    <button type="button" @click="showLogoutModal = false" 
                            class="flex-1 py-3.5 rounded-xl border border-black/10 text-[#1A2E26] text-xs font-bold uppercase tracking-wider hover:bg-black/5 transition-all font-['Outfit']">
                        Batal
                    </button>
                    
                    <button type="button" 
                            onclick="document.getElementById('logout-form').submit();"
                            class="flex-1 py-3.5 rounded-xl bg-emerald-500 text-white text-xs font-bold uppercase tracking-wider hover:bg-emerald-600 hover:shadow-lg hover:shadow-emerald-500/20 transition-all font-['Outfit']">
                        Log Out
                    </button>
                </div>
            </div>
        </div>
    </div>
