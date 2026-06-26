{{-- ===== MURNI HANYA DROPDOWN SAJA ===== --}}
<div x-show="notifOpen"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 -translate-y-4 scale-95 origin-top"
     x-transition:enter-end="opacity-100 translate-y-0 scale-100 origin-top"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0 scale-100 origin-top"
     x-transition:leave-end="opacity-0 -translate-y-4 scale-95 origin-top"
     @click.outside="notifOpen = false"
     class="absolute top-[calc(100%+12px)] right-0 max-w-[380px] w-screen sm:w-[380px] p-4 glass-dropdown rounded-[2rem] z-50 shadow-[0_20px_50px_rgba(0,0,0,0.8)] pointer-events-auto"
     style="display:none;"
     x-cloak>
    
    <div class="flex items-center justify-between px-2 pb-3 mb-2 border-b border-white/10">
        <div class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[18px] text-[#4edea3]">notifications</span>
            <h3 class="text-sm font-black uppercase tracking-[0.15em] text-white">Notifikasi</h3>
        </div>
        @if(isset($unreadCount) && $unreadCount > 0)
            <span class="text-[10px] bg-[#ff7676]/20 text-[#ff7676] px-2.5 py-1 rounded-full font-black shadow-[0_0_10px_rgba(255,118,118,0.2)] border border-[#ff7676]/20">
                {{ $unreadCount }} Belum Dibaca
            </span>
        @else
            <span class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">Semua Terbaca</span>
        @endif
    </div>

    <div class="flex flex-col gap-1.5 max-h-[320px] overflow-y-auto pr-1 custom-scrollbar">
        @php
            $notifList = isset($allNotifications) && $allNotifications->count() > 0
                ? $allNotifications
                : (isset($unreadNotifications) ? $unreadNotifications : collect([]));
        @endphp

        @if($notifList->count() > 0)
            @foreach($notifList as $notif)
                @php
                    $isUnread = is_null($notif->read_at);
                    $notifColor = $notif->data['color'] ?? '#4edea3';
                    $notifIcon  = $notif->data['icon']  ?? 'notifications'; 
                    $notifImage = $notif->data['image'] ?? null; 
                    $notifTitle = $notif->data['title'] ?? 'Notifikasi';
                    $notifMsg   = $notif->data['message'] ?? '';
                    $notifUrl   = $notif->data['url'] ?? null;
                    $markReadUrl = route('notifications.markOneAsRead', $notif->id);

                    // LOGIKA PINTAR KHUSUS FOLDER "public/images" XDREW
                    $finalImageUrl = null;
                    if ($notifImage) {
                        if (str_starts_with($notifImage, 'http')) {
                            // Jika URL dari luar (misal Google/AWS)
                            $finalImageUrl = $notifImage;
                        } else {
                            // Bersihkan tulisan 'public/' atau 'images/' jika ada di database
                            // Contoh: "public/images/baju.png" atau "images/baju.png" akan menjadi "baju.png"
                            $cleanImageName = str_replace(['public/images/', 'public/', 'images/'], '', $notifImage);
                            
                            // Arahkan dengan tepat ke folder public/images/ milik Anda
                            $finalImageUrl = asset('images/' . $cleanImageName);
                        }
                    }
                @endphp

                <div class="relative group/notif">
                    <a href="{{ $markReadUrl }}"
                       class="flex gap-3 p-3 rounded-2xl transition-all duration-200 border
                              {{ $isUnread
                                  ? 'bg-white/8 border-white/10 hover:bg-white/12 shadow-[inset_0_1px_1px_rgba(255,255,255,0.08)]'
                                  : 'bg-white/3 border-white/5 hover:bg-white/6 opacity-60 hover:opacity-80' }}">
                        
                        {{-- MENAMPILKAN GAMBAR DARI FOLDER IMAGES --}}
                        <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 transition-transform duration-200 group-hover/notif:scale-110 overflow-hidden"
                             style="background-color: {{ $notifColor }}22; border: 1px solid {{ $notifColor }}33;">
                             
                            @if($finalImageUrl)
                                {{-- Render Gambar --}}
                                <img src="{{ $finalImageUrl }}" 
                                     alt="Produk" 
                                     class="w-full h-full object-cover"
                                     onerror="this.onerror=null; this.parentElement.innerHTML='<span class=\'material-symbols-outlined text-[20px]\' style=\'color: {{ $notifColor }}; font-variation-settings: \'FILL\' 1;\'>{{ $notifIcon }}</span>';">
                            @else
                                {{-- Tampilkan ikon tas belanja jika kosong --}}
                                <span class="material-symbols-outlined text-[20px]"
                                      style="color: {{ $notifColor }}; font-variation-settings: 'FILL' 1;">
                                    {{ $notifIcon }}
                                </span>
                            @endif
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2">
                                <p class="text-xs font-bold {{ $isUnread ? 'text-white' : 'text-gray-400' }} leading-tight">
                                    {{ $notifTitle }}
                                </p>
                                @if($isUnread)
                                    <span class="flex-shrink-0 w-2 h-2 rounded-full mt-1 shadow-[0_0_6px_currentColor]"
                                          style="background-color: {{ $notifColor }};"></span>
                                @endif
                            </div>
                            <p class="text-[11px] text-gray-400 line-clamp-2 leading-relaxed mt-0.5">{!! $notifMsg !!}</p>
                            <p class="text-[9px] mt-1.5 font-medium uppercase tracking-wider"
                               style="color: {{ $notifColor }}99;">
                                {{ $notif->created_at->diffForHumans() }}
                                @if(!$isUnread)
                                    · <span class="text-gray-500">Sudah dibaca</span>
                                @endif
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="flex flex-col items-center justify-center py-8 text-center">
                <div class="w-14 h-14 rounded-full bg-white/5 flex items-center justify-center mb-3 border border-white/10">
                    <span class="material-symbols-outlined text-[28px] text-gray-500">notifications_none</span>
                </div>
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest">Belum ada notifikasi</p>
                <p class="text-[10px] text-gray-600 mt-1">Notifikasi pesanan akan muncul di sini</p>
            </div>
        @endif
    </div>

    @if(isset($unreadCount) && $unreadCount > 0)
    <div class="pt-3 mt-2 border-t border-white/10 flex items-center justify-between gap-2">
        <form action="{{ route('notifications.markAllAsRead') }}" method="POST" class="flex-1">
            @csrf
            <button type="submit"
                    class="w-full flex items-center justify-center gap-1.5 text-[11px] font-black uppercase tracking-[0.12em]
                           text-gray-400 hover:text-[#4edea3] transition-all duration-200
                           py-2 px-3 rounded-xl hover:bg-[#4edea3]/10 border border-transparent hover:border-[#4edea3]/20">
                <span class="material-symbols-outlined text-[14px]">done_all</span>
                Tandai semua sudah dibaca
            </button>
        </form>
    </div>
    @elseif($notifList->count() > 0)
    <div class="pt-3 mt-2 border-t border-white/10 text-center">
        <p class="text-[10px] text-gray-600 font-medium uppercase tracking-wider flex items-center justify-center gap-1">
            <span class="material-symbols-outlined text-[12px]">check_circle</span>
            Semua notifikasi sudah dibaca
        </p>
    </div>
    @endif
</div>