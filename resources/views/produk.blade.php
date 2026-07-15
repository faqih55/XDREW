@extends('layouts.Front')

@section('title', 'Koleksi Kami')

@section('content')
<div class="pt-[120px] pb-20 min-h-screen px-margin-mobile md:px-margin-desktop w-full max-w-[1440px] mx-auto">

    <header class="flex flex-col md:flex-row md:items-end justify-between gap-md mb-xl transition-all duration-700 opacity-0 translate-y-10">
        <div class="space-y-base w-full">
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg uppercase tracking-tighter text-on-surface">Koleksi Kami</h1>
            <p class="text-on-surface-variant font-body-lg max-w-lg">Setiap jahitan punya cerita. Koleksi apparel yang mindful, no-filter, dan berdampak. Dirancang untuk lo yang tak sekadar mengaspal di tengah hiruk-pikuk kota, tapi juga sadar akan jejak yang ditinggalkan.</p>
        </div>
    </header>

    <div class="flex flex-col md:flex-row gap-xl">
        <aside class="w-full md:w-64 space-y-lg shrink-0 transition-all duration-700 opacity-0 translate-y-10">
            <div class="glass-card rounded-xl p-lg space-y-lg">
                <!-- DIPERBAIKI: Menggunakan produk.index -->
                <form id="filter-form" action="{{ route('produk.index') }}" method="GET" class="space-y-lg">
                    <div x-data="{ open: {{ request('kategori') ? 'true' : 'false' }} }">
                        <button type="button" @click="open = !open" class="flex justify-between items-center w-full mb-md group">
                            <h3 class="font-headline-sm text-label-md uppercase tracking-widest text-primary">Kategori</h3>
                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-primary transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="space-y-sm">
                            <label class="flex items-center gap-sm cursor-pointer group hover:text-primary transition-colors">
                                <!-- DIPERBAIKI: Menggunakan request('kategori') untuk mengecek status centang -->
                                <input type="checkbox" id="all-kategori" class="w-5 h-5 rounded border-outline-variant bg-surface-container text-primary focus:ring-primary/20" {{ empty(request('kategori')) ? 'checked' : '' }} onchange="document.querySelectorAll('input[name=kategori]').forEach(cb => cb.checked = false); this.form.submit();" />
                                <span class="text-on-surface-variant group-hover:text-on-surface transition-colors">Semua Kategori</span>
                            </label>
                             <label class="flex items-center gap-sm cursor-pointer group hover:text-primary transition-colors">
                                <input type="checkbox" name="kategori" value="T-Shirt" class="w-5 h-5 rounded border-outline-variant bg-surface-container text-primary focus:ring-primary/20" {{ request('kategori') === 'T-Shirt' ? 'checked' : '' }} onchange="document.getElementById('all-kategori').checked = false; document.querySelectorAll('input[name=kategori]').forEach(cb => cb.checked = false); this.checked = true; this.form.submit();" />
                                <span class="text-on-surface-variant group-hover:text-on-surface transition-colors">T-shirt</span>
                            </label>
                            <label class="flex items-center gap-sm cursor-pointer group hover:text-primary transition-colors">
                                <input type="checkbox" name="kategori" value="Kemeja" class="w-5 h-5 rounded border-outline-variant bg-surface-container text-primary focus:ring-primary/20" {{ request('kategori') === 'Kemeja' ? 'checked' : '' }} onchange="document.getElementById('all-kategori').checked = false; document.querySelectorAll('input[name=kategori]').forEach(cb => cb.checked = false); this.checked = true; this.form.submit();" />
                                <span class="text-on-surface-variant group-hover:text-on-surface transition-colors">Kemeja</span>
                            </label>
                            <label class="flex items-center gap-sm cursor-pointer group hover:text-primary transition-colors">
                                <input type="checkbox" name="kategori" value="Hoodie" class="w-5 h-5 rounded border-outline-variant bg-surface-container text-primary focus:ring-primary/20" {{ request('kategori') === 'Hoodie' ? 'checked' : '' }} onchange="document.getElementById('all-kategori').checked = false; document.querySelectorAll('input[name=kategori]').forEach(cb => cb.checked = false); this.checked = true; this.form.submit();" />
                                <span class="text-on-surface-variant group-hover:text-on-surface transition-colors">Hoodie</span>
                            </label>
                            <label class="flex items-center gap-sm cursor-pointer group hover:text-primary transition-colors">
                                <input type="checkbox" name="kategori" value="Cargo" class="w-5 h-5 rounded border-outline-variant bg-surface-container text-primary focus:ring-primary/20" {{ request('kategori') === 'Cargo' ? 'checked' : '' }} onchange="document.getElementById('all-kategori').checked = false; document.querySelectorAll('input[name=kategori]').forEach(cb => cb.checked = false); this.checked = true; this.form.submit();" />
                                <span class="text-on-surface-variant group-hover:text-on-surface transition-colors">Celana</span>
                            </label>
                            <label class="flex items-center gap-sm cursor-pointer group hover:text-primary transition-colors">
                                <input type="checkbox" name="kategori" value="Jaket" class="w-5 h-5 rounded border-outline-variant bg-surface-container text-primary focus:ring-primary/20" {{ request('kategori') === 'Jaket' ? 'checked' : '' }} onchange="document.getElementById('all-kategori').checked = false; document.querySelectorAll('input[name=kategori]').forEach(cb => cb.checked = false); this.checked = true; this.form.submit();" />
                                <span class="text-on-surface-variant group-hover:text-on-surface transition-colors">Jaket</span>
                            </label>
                            <label class="flex items-center gap-sm cursor-pointer group hover:text-primary transition-colors">
                                <input type="checkbox" name="kategori" value="Sepatu" class="w-5 h-5 rounded border-outline-variant bg-surface-container text-primary focus:ring-primary/20" {{ request('kategori') === 'Sepatu' ? 'checked' : '' }} onchange="document.getElementById('all-kategori').checked = false; document.querySelectorAll('input[name=kategori]').forEach(cb => cb.checked = false); this.checked = true; this.form.submit();" />
                                <span class="text-on-surface-variant group-hover:text-on-surface transition-colors">Sepatu</span>
                            </label>
                        </div>
                    </div>
                    <div class="h-[1px] bg-[#1A2E26]/10"></div>
                    <div x-data="{ open: {{ request('ukuran') ? 'true' : 'false' }} }">
                        <button type="button" @click="open = !open" class="flex justify-between items-center w-full mb-md group">
                            <div class="flex items-center gap-2">
                                <h3 class="font-headline-sm text-label-md uppercase tracking-widest text-primary">Ukuran</h3>
                                @if(request('ukuran'))
                                    <a href="{{ route('produk.index', request()->except('ukuran')) }}" class="text-[10px] text-gray-500 hover:text-primary uppercase tracking-widest z-10 relative" @click.stop>Reset</a>
                                @endif
                            </div>
                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-primary transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="grid grid-cols-2 gap-xs">
                            <label class="cursor-pointer">
                                <input type="radio" name="ukuran" value="S" class="peer hidden" onchange="this.form.submit()" {{ request('ukuran') === 'S' ? 'checked' : '' }}>
                                <div class="py-xs border border-outline-variant peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary rounded-lg transition-all text-label-md text-center hover:border-primary hover:text-primary hover:scale-105">S</div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="ukuran" value="M" class="peer hidden" onchange="this.form.submit()" {{ request('ukuran') === 'M' ? 'checked' : '' }}>
                                <div class="py-xs border border-outline-variant peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary rounded-lg transition-all text-label-md text-center hover:border-primary hover:text-primary hover:scale-105">M</div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="ukuran" value="L" class="peer hidden" onchange="this.form.submit()" {{ request('ukuran') === 'L' ? 'checked' : '' }}>
                                <div class="py-xs border border-outline-variant peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary rounded-lg transition-all text-label-md text-center hover:border-primary hover:text-primary hover:scale-105">L</div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="ukuran" value="XL" class="peer hidden" onchange="this.form.submit()" {{ request('ukuran') === 'XL' ? 'checked' : '' }}>
                                <div class="py-xs border border-outline-variant peer-checked:border-primary peer-checked:bg-primary/10 peer-checked:text-primary rounded-lg transition-all text-label-md text-center hover:border-primary hover:text-primary hover:scale-105">XL</div>
                            </label>
                        </div>
                    </div>
                    <div class="h-[1px] bg-[#1A2E26]/10"></div>
                    <div x-data="{ open: {{ request('warna') ? 'true' : 'false' }} }">
                        <button type="button" @click="open = !open" class="flex justify-between items-center w-full mb-md group">
                            <div class="flex items-center gap-2">
                                <h3 class="font-headline-sm text-label-md uppercase tracking-widest text-primary">Warna</h3>
                                @if(request('warna'))
                                    <a href="{{ route('produk.index', request()->except('warna')) }}" class="text-[10px] text-gray-500 hover:text-primary uppercase tracking-widest z-10 relative" @click.stop>Reset</a>
                                @endif
                            </div>
                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-primary transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="flex flex-wrap gap-sm">
                            <label class="cursor-pointer">
                                <input type="radio" name="warna" value="Hitam" class="peer hidden" onchange="this.form.submit()" {{ request('warna') === 'Hitam' ? 'checked' : '' }}>
                                <div class="w-8 h-8 rounded-full bg-black ring-offset-2 ring-offset-background hover:scale-110 transition-transform ring-1 ring-white/20 peer-checked:ring-2 peer-checked:ring-primary"></div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="warna" value="Putih" class="peer hidden" onchange="this.form.submit()" {{ request('warna') === 'Putih' ? 'checked' : '' }}>
                                <div class="w-8 h-8 rounded-full bg-white ring-offset-2 ring-offset-background hover:scale-110 transition-transform ring-1 ring-white/20 peer-checked:ring-2 peer-checked:ring-primary"></div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="warna" value="Hijau" class="peer hidden" onchange="this.form.submit()" {{ request('warna') === 'Hijau' ? 'checked' : '' }}>
                                <div class="w-8 h-8 rounded-full bg-primary ring-offset-2 ring-offset-background hover:scale-110 transition-transform ring-1 ring-white/20 peer-checked:ring-2 peer-checked:ring-primary"></div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="warna" value="Abu-Abu" class="peer hidden" onchange="this.form.submit()" {{ request('warna') === 'Abu-Abu' ? 'checked' : '' }}>
                                <div class="w-8 h-8 rounded-full bg-slate-400 ring-offset-2 ring-offset-background hover:scale-110 transition-transform ring-1 ring-white/20 peer-checked:ring-2 peer-checked:ring-primary"></div>
                            </label>
                        </div>
                    </div>
                    <div class="h-[1px] bg-[#1A2E26]/10"></div>
                    <div x-data="{ open: {{ (request('harga_maksimal') && request('harga_maksimal') != 7000000) ? 'true' : 'false' }} }">
                        <button type="button" @click="open = !open" class="flex justify-between items-center w-full mb-md group">
                            <h3 class="font-headline-sm text-label-md uppercase tracking-widest text-primary">Rentang Harga</h3>
                            <svg :class="{'rotate-180': open}" class="w-5 h-5 text-primary transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="space-y-sm pb-2">
                            <input name="harga_maksimal" id="harga_maksimal" class="w-full accent-primary bg-surface-variant h-1 rounded-full cursor-pointer hover:accent-primary/80 transition-all" type="range" min="600000" max="7000000" step="100000" value="{{ request('harga_maksimal', 7000000) }}" onchange="this.form.submit()" oninput="document.getElementById('harga-label').innerText = 'Rp ' + (this.value / 1000000).toFixed(1) + 'jt'"/>
                            <div class="flex justify-between text-caption text-on-surface-variant">
                                <span>Rp 600rb</span>
                                <span id="harga-label">Rp {{ number_format(request('harga_maksimal', 7000000) / 1000000, 1) }}jt</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </aside>
        
        <div class="flex-1">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-md mb-lg transition-all duration-700 opacity-0 translate-y-10">
                <p class="text-caption text-on-surface-variant">Menampilkan <span class="text-primary font-bold">{{ count($produk) }}</span> item</p>
                <div class="flex items-center gap-xs">
                    <span class="text-label-md text-on-surface-variant">Urutkan:</span>
                    <select name="sort" form="filter-form" onchange="this.form.submit()" class="bg-surface-container-low border border-outline-variant text-on-surface text-label-md focus:ring-1 focus:ring-primary/50 focus:border-primary rounded-lg px-sm py-xs cursor-pointer transition-all hover:border-primary/50">
                        <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="price-asc" {{ request('sort') === 'price-asc' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                        <option value="price-desc" {{ request('sort') === 'price-desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                    </select>
                </div>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 sm:gap-6 gap-y-10 sm:gap-y-12">
                @foreach($produk as $p)
                <div onclick="if(!event.target.closest('.card-action-btn')) window.location.href = '{{ route('produk.show', $p->id ?? $p->ID) }}'" class="group flex flex-col glass-card rounded-[1.2rem] sm:rounded-[2rem] overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(78,222,163,0.3)] hover:border-[#4edea3]/40 opacity-0 translate-y-10 animate-slide-in stagger-{{ ($loop->index % 6) + 1 }} cursor-pointer">
                    <div class="aspect-[4/5] relative overflow-hidden bg-black/50">
                        <!-- Status Badge -->
                        @if(($p->status_produk ?? $p->STATUS_PRODUK))
                            <div class="absolute top-2 left-2 sm:top-3 sm:left-3 z-20">
                                <span class="bg-primary/20 backdrop-blur-md text-primary text-[8px] sm:text-[10px] font-bold px-1.5 py-0.5 sm:px-2 sm:py-1 rounded-full border border-primary/30 tracking-widest uppercase shadow-[0_0_10px_rgba(78,222,163,0.2)]">
                                    {{ $p->status_produk ?? $p->STATUS_PRODUK }}
                                </span>
                            </div>
                        @endif
                        <!-- Wishlist Button -->
                        <button type="button" 
                                onclick="event.preventDefault(); event.stopPropagation(); toggleWishlist({{ $p->id ?? $p->ID }}, this);" 
                                class="absolute top-2 right-2 sm:top-3 sm:right-3 z-20 w-8 h-8 rounded-full bg-white/60 backdrop-blur-md flex items-center justify-center text-[#0A1612]/50 hover:text-red-500 hover:scale-110 transition-all duration-300 shadow-sm border border-white/80 card-action-btn wishlist-btn"
                                data-id="{{ $p->id ?? $p->ID }}">
                            <span class="material-symbols-outlined text-[16px] sm:text-[18px] select-none transition-colors">favorite</span>
                        </button>
                        <img class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 opacity-90 group-hover:opacity-100" data-alt="{{ $p->deskripsi ?? $p->DESKRIPSI ?? '' }}" src="{{ asset('images/' . ($p->foto ?? $p->FOTO)) }}" loading="lazy" decoding="async"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-[#F9FAFB] via-transparent to-transparent opacity-40 group-hover:opacity-70 transition-opacity duration-500"></div>
                    </div>
                    <div class="flex flex-col p-3 sm:p-5 bg-white/40 text-center border-t border-white/40 relative">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-[1px] bg-[#4edea3]/50 shadow-[0_0_10px_rgba(78,222,163,0.8)]"></div>
                        <div class="flex justify-center items-center gap-0.5 mb-1.5 sm:mb-2.5">
                            @for($i = 0; $i < 5; $i++)
                                <span class="material-symbols-outlined text-[10px] sm:text-[14px] text-yellow-400 drop-shadow-[0_0_6px_rgba(250,204,21,0.6)]" style="font-variation-settings: 'FILL' 1;">star</span>
                            @endfor
                            <span class="text-[9px] sm:text-xs text-[#0A1612]/60 ml-1 font-body-md">(5.0)</span>
                        </div>
                        <h3 class="font-bold uppercase text-[9px] sm:text-[13px] tracking-[0.12em] sm:tracking-[0.15em] text-[#0A1612]/90 group-hover:text-[#0A1612] transition-colors truncate drop-shadow-sm px-1">{{ $p->nama_produk ?? $p->NAMA_PRODUK }}</h3>
                        <p class="text-[#4edea3] font-black text-[11px] sm:text-[14px] tracking-wider sm:tracking-widest mt-1.5 sm:mt-2 drop-shadow-[0_0_12px_rgba(78,222,163,0.4)] group-hover:drop-shadow-[0_0_15px_rgba(78,222,163,0.8)] transition-all">Rp {{ number_format($p->harga ?? $p->HARGA, 0, ',', '.') }}</p>

                        <!-- Action Buttons -->
                        @php
                            $pUkuran = $p->ukuran ?? $p->UKURAN;
                            $defSize = !empty($pUkuran) ? trim(explode(',', $pUkuran)[0]) : 'All Size';
                        @endphp
                        <div class="flex items-center justify-between gap-2.5 mt-4 border-t border-black/5 pt-4">
                            <form action="{{ route('cart.add') }}" method="POST" class="card-action-btn">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $p->id ?? $p->ID }}">
                                <input type="hidden" name="jumlah" value="1">
                                <input type="hidden" name="ukuran_terpilih" value="{{ $defSize }}">
                                <button type="submit" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white/60 border border-black/10 flex items-center justify-center text-[#0A1612] hover:bg-[#10b981] hover:text-white hover:border-[#10b981] transition-all cursor-pointer shadow-sm active:scale-95" title="Tambah ke Keranjang">
                                    <span class="material-symbols-outlined text-[18px] sm:text-[20px]">shopping_cart</span>
                                </button>
                            </form>
                            <button type="button" 
                                    onclick="event.preventDefault(); event.stopPropagation(); window.location.href = '{{ url('/checkout/pembayaran') }}?produk_id={{ $p->id ?? $p->ID }}&jumlah=1&ukuran={{ $defSize }}'"
                                    class="flex-grow h-9 sm:h-10 px-3 sm:px-4 bg-[#10b981] hover:bg-[#059669] text-white rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-wider flex items-center justify-center gap-1 sm:gap-1.5 transition-all shadow-[0_2px_8px_rgba(16,185,129,0.2)] active:scale-95 cursor-pointer card-action-btn">
                                <span class="material-symbols-outlined text-[16px] sm:text-[18px]">flash_on</span>
                                Beli
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            @if ($produk->hasPages())
            <div class="mt-xl flex justify-center items-center gap-sm opacity-0 translate-y-10 transition-all duration-700">
                
                @foreach ($produk->linkCollection() as $link)
                    @if (str_contains($link['label'], 'Previous'))
                        @if ($link['url'])
                            <a href="{{ $link['url'] }}" class="w-10 h-10 flex items-center justify-center rounded-full glass-panel hover:border-[#4edea3]/50 hover:shadow-[0_0_15px_rgba(78,222,163,0.3)] transition-all group">
                                <span class="material-symbols-outlined text-[#0A1612]/70 group-hover:text-[#10b981]">chevron_left</span>
                            </a>
                        @else
                            <button disabled class="w-10 h-10 flex items-center justify-center rounded-full glass-panel opacity-50 cursor-not-allowed">
                                <span class="material-symbols-outlined text-[#0A1612]/30">chevron_left</span>
                            </button>
                        @endif
                    @elseif (str_contains($link['label'], 'Next'))
                        @if ($link['url'])
                            <a href="{{ $link['url'] }}" class="w-10 h-10 flex items-center justify-center rounded-full glass-panel hover:border-[#4edea3]/50 hover:shadow-[0_0_15px_rgba(78,222,163,0.3)] transition-all group">
                                <span class="material-symbols-outlined text-[#0A1612]/70 group-hover:text-[#10b981]">chevron_right</span>
                            </a>
                        @else
                            <button disabled class="w-10 h-10 flex items-center justify-center rounded-full glass-panel opacity-50 cursor-not-allowed">
                                <span class="material-symbols-outlined text-[#0A1612]/30">chevron_right</span>
                            </button>
                        @endif
                    @elseif ($link['label'] === '...')
                        <span class="text-[#0A1612]/50 px-2">...</span>
                    @else
                        @if ($link['active'])
                            <button class="w-10 h-10 flex items-center justify-center rounded-full bg-[#10b981] text-white font-black shadow-[0_4px_15px_rgba(78,222,163,0.3)] hover:scale-105 transition-transform">{{ $link['label'] }}</button>
                        @else
                            <a href="{{ $link['url'] }}" class="w-10 h-10 flex items-center justify-center rounded-full glass-panel hover:border-[#10b981]/50 hover:text-[#10b981] hover:shadow-[0_4px_15px_rgba(78,222,163,0.15)] transition-all hover:scale-105 text-[#0A1612]/80">{{ $link['label'] }}</a>
                        @endif
                    @endif
                @endforeach
            </div>
            @endif
        </div>
    </div>

</div>
@endsection


@push('styles')
<style>
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-smoothing: antialiased;
        }
        
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F9FAFB; }
        ::-webkit-scrollbar-thumb { background: #CBE3D9; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #4edea3; }

        .glass-card {
            background: #ffffff !important;
            backdrop-filter: blur(24px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(24px) saturate(180%) !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
            border-top: 1px solid rgba(255, 255, 255, 1) !important;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.08),
                0 1px 3px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 1) !important;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.3) !important;
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.5) !important;
        }

        .emerald-glow:hover { box-shadow: 0 0 20px rgba(78, 222, 163, 0.2); border-color: rgba(78, 222, 163, 0.3) !important; }
        
        .product-card { transition: all 0.3s ease; }
        .product-card:hover { transform: translateY(-8px); box-shadow: 0 0 20px rgba(78, 222, 163, 0.15); }
        .product-card:hover .btn-cart { transform: translateY(0); opacity: 1; }
        
        @keyframes pulse-emerald {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        . { animation: pulse-emerald 3s infinite; }
        
        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-slide-in { animation: slideInUp 0.6s ease-out forwards; }
        
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
        .stagger-5 { animation-delay: 0.5s; }
        .stagger-6 { animation-delay: 0.6s; }

        /* Grid Pattern */
        .bg-grid-pattern {
            background-image: 
                linear-gradient(rgba(78, 222, 163, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(78, 222, 163, 0.04) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* Typography */
        .text-outline-dark {
            -webkit-text-stroke: 1.5px #1A2E26;
            color: transparent;
        }

        /* Smooth Floating Keyframes */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }
        @keyframes float-reverse-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(8px) rotate(-1deg); }
        }
        [] { animation: float-slow 6s ease-in-out infinite; }
        [] { animation: float-reverse-slow 7s ease-in-out infinite; }
    </style>
@endpush


@push('scripts')
<script>
    // Smooth header animation on scroll
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header?.classList.add('py-xs', 'shadow-lg');
            header?.classList.remove('py-sm');
        } else {
            header?.classList.add('py-sm');
            header?.classList.remove('py-xs', 'shadow-lg');
        }
    });

    // Simple revealing animation for sections
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
                entry.target.classList.remove('opacity-0', 'translate-y-10');
            }
        });
    }, observerOptions);

    document.querySelectorAll('header, aside, .flex-1 > .flex, .grid').forEach(section => {
        section.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
        observer.observe(section);
    });

    // Product card interactions
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            const img = card.querySelector('img');
            if(img) img.style.transform = 'scale(1.08)';
        });
        card.addEventListener('mouseleave', () => {
            const img = card.querySelector('img');
            if(img) img.style.transform = 'scale(1)';
        });
    });

    const filterButton = document.createElement('button');
    filterButton.className = 'fixed bottom-md right-md z-50 md:hidden bg-primary text-black px-md py-md rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform active:scale-95';
    filterButton.innerHTML = '<span class="material-symbols-outlined">filter_list</span>';
    filterButton.title = 'Toggle Filters';
    document.body.appendChild(filterButton);

    filterButton.addEventListener('click', () => {
        const sidebar = document.querySelector('aside');
        if (sidebar) {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('md:hidden');
        }
    });

    // ===== WISHLIST TOGGLE SYSTEM =====
    function toggleWishlist(productId, button) {
        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        const index = wishlist.indexOf(productId);
        const icon = button.querySelector('span');
        
        if (index > -1) {
            // Remove from wishlist
            wishlist.splice(index, 1);
            icon.style.fontVariationSettings = "'FILL' 0";
            button.classList.remove('text-red-500');
            button.classList.add('text-[#0A1612]/50');
        } else {
            // Add to wishlist
            wishlist.push(productId);
            icon.style.fontVariationSettings = "'FILL' 1";
            button.classList.remove('text-[#0A1612]/50');
            button.classList.add('text-red-500');
        }
        localStorage.setItem('wishlist', JSON.stringify(wishlist));
    }

    document.addEventListener('DOMContentLoaded', () => {
        const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        document.querySelectorAll('.wishlist-btn').forEach(button => {
            const productId = parseInt(button.getAttribute('data-id'));
            if (wishlist.includes(productId)) {
                const icon = button.querySelector('span');
                icon.style.fontVariationSettings = "'FILL' 1";
                button.classList.remove('text-[#0A1612]/50');
                button.classList.add('text-red-500');
            }
        });
    });
</script>
@endpush
