<div x-data="{ open: false }" class="fixed bottom-6 right-6 z-[9999]">
    <button @click="open = !open" 
            class="bg-[#4edea3] hover:bg-[#3bc68f] text-black w-14 h-14 rounded-full shadow-lg flex items-center justify-center transition-all duration-300 transform hover:scale-105 active:scale-95 z-50">
        <span class="material-symbols-outlined text-2xl" x-text="open ? 'close' : 'chat'">chat</span>
    </button>

    <div x-show="open" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-5"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-5"
         @click.away="open = false"
         class="absolute bottom-20 right-0 w-80 md:w-96 bg-[#1a211d] border border-white/10 rounded-2xl shadow-2xl overflow-hidden glass-panel">
        
        <div class="bg-primary/10 p-4 border-b border-white/10 flex justify-between items-center">
            <div>
                <h3 class="font-bold text-white text-sm uppercase tracking-widest">Customer Service</h3>
                <p class="text-[10px] text-[#4edea3]">Sedang Online</p>
            </div>
            <button @click="open = false" class="text-white hover:text-red-400 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <div class="h-48 p-4 overflow-y-auto space-y-4">
            <div class="text-xs text-gray-300 bg-white/5 p-3 rounded-lg w-[85%] border border-white/5">
                Halo! Perlu akses ke kontrol sistem? Silakan menuju 
                Admin.
            </div>
        </div>

        <div class="p-4 border-t border-white/10 bg-[#161d19]">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center justify-center gap-2 w-full py-3 bg-[#4edea3] text-black font-bold text-xs rounded-lg hover:bg-[#3bc68f] transition-all duration-200 shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined text-sm">admin_panel_settings</span>
                Dashboard Admin
            </a>
        </div>
    </div>
</div>