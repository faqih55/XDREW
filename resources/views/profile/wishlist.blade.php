@extends('layouts.profile')

@section('title', 'Daftar Keinginan | XDrew Fashion')

@section('content')
<div class="max-w-5xl mx-auto space-y-8 animate-smooth-reveal">
    <header class="mb-8 flex flex-col md:flex-row justify-between md:items-center gap-4">
        <div>
            <h1 class="font-['Outfit'] text-3xl font-extrabold text-[#1A2E26] mb-2 tracking-tight">Daftar Keinginan Saya</h1>
            <p class="text-[#1A2E26]/70 text-sm">Simpan item favorit Anda untuk petualangan urban berikutnya.</p>
        </div>
        <a href="{{ route('produk.index') }}" class="flex items-center justify-center gap-2 px-6 py-3 bg-[#10b981] text-white rounded-xl hover:bg-[#0ea5e9] shadow-[0_4px_15px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_25px_rgba(16,185,129,0.3)] transform hover:-translate-y-0.5 transition-all font-bold w-full md:w-auto">
            <span class="material-symbols-outlined text-[20px]">add_shopping_cart</span>
            <span>Belanja Sekarang</span>
        </a>rve
    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 shadow-sm" id="wishlist-grid">
        @foreach(\App\Models\Produk::all() as $p)
        <article class="group relative overflow-hidden rounded-[2rem] flex flex-col transition-all duration-300 wishlist-item hidden" data-id="{{ $p->id ?? $p->ID }}">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/40 to-white/60 z-10 pointer-events-none rounded-[2rem]"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#10b981]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-[2rem] blur"></div>
            <div class="relative bg-white/40 backdrop-blur-md rounded-[2rem] overflow-hidden flex flex-col transition-all duration-300 border border-white/60 group-hover:border-[#10b981]/40 group-hover:-translate-y-1 h-full shadow-lg z-20">
                <div class="relative aspect-[4/5] overflow-hidden bg-white/60">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ asset('images/' . ($p->foto ?? $p->FOTO)) }}" alt="{{ $p->nama_produk ?? $p->NAMA_PRODUK }}"/>
                    <button class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/60 backdrop-blur-md flex items-center justify-center text-[#1A2E26]/50 hover:bg-[#e11d48] hover:text-white hover:scale-110 transition-all duration-300 z-30 shadow-sm border border-white/80 remove-wish-btn" data-id="{{ $p->id ?? $p->ID }}">
                        <span class="material-symbols-outlined text-[20px]">delete</span>
                    </button>
                    @if($p->status_produk ?? $p->STATUS_PRODUK)
                    <div class="absolute bottom-4 left-4 z-30">
                        <span class="bg-[#10b981]/10 backdrop-blur-md text-[#10b981] text-[10px] font-bold px-3 py-1.5 rounded-full border border-[#10b981]/30 tracking-widest uppercase shadow-[0_2px_10px_rgba(16,185,129,0.1)]">{{ $p->status_produk ?? $p->STATUS_PRODUK }}</span>
                    </div>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-grow bg-transparent relative z-20">
                    <h3 class="font-bold text-[18px] text-[#1A2E26] group-hover:text-[#10b981] transition-colors mb-2 truncate">{{ $p->nama_produk ?? $p->NAMA_PRODUK }}</h3>
                    <p class="font-['Outfit'] text-[22px] font-bold text-[#10b981] mb-6">Rp {{ number_format($p->harga ?? $p->HARGA, 0, ',', '.') }}</p>
                    
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-auto">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $p->id ?? $p->ID }}">
                        <input type="hidden" name="jumlah" value="1">
                        @php
                            $pUkuran = $p->ukuran ?? $p->UKURAN;
                            $defSize = !empty($pUkuran) ? trim(explode(',', $pUkuran)[0]) : 'All Size';
                        @endphp
                        <input type="hidden" name="ukuran_terpilih" value="{{ $defSize }}">
                        <button type="submit" class="add-to-cart-btn w-full py-3 bg-white/60 border border-white/80 text-[#1A2E26] font-bold rounded-xl shadow-sm hover:bg-[#10b981] hover:text-white hover:border-[#10b981] hover:shadow-[0_4px_20px_rgba(16,185,129,0.2)] hover:-translate-y-1 active:scale-95 transition-all duration-300 flex items-center justify-center gap-2 group/btn cursor-pointer">
                            <span class="material-symbols-outlined text-[20px] group-hover/btn:scale-110 transition-transform">shopping_cart</span>
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Empty State Template -->
    <div class="hidden py-16 flex flex-col items-center text-center max-w-md mx-auto bg-white/40 backdrop-blur-md rounded-[2rem] border border-white/60 shadow-lg" id="wishlist-empty">
        <div class="w-24 h-24 rounded-full bg-white/60 flex items-center justify-center mb-6 text-[#1A2E26]/40 border border-white/80">
            <span class="material-symbols-outlined text-4xl">heart_broken</span>
        </div>
        <h2 class="font-['Outfit'] text-2xl font-bold text-[#1A2E26] mb-2">Daftar keinginan Anda masih kosong</h2>
        <p class="text-[#1A2E26]/70 mb-8 text-sm">Temukan koleksi berkelanjutan kami dan simpan yang terbaik untuk nanti.</p>
        <a class="px-8 py-3 bg-[#10b981] text-white font-bold rounded-xl shadow-[0_4px_15px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_25px_rgba(16,185,129,0.3)] transform hover:-translate-y-0.5 transition-all" href="{{ route('produk.index') }}">Mulai Belanja</a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        const items = document.querySelectorAll('.wishlist-item');
        let visibleCount = 0;

        items.forEach(item => {
            const id = parseInt(item.getAttribute('data-id'));
            if (wishlist.includes(id)) {
                item.classList.remove('hidden');
                visibleCount++;
            }
        });

        if (visibleCount === 0) {
            document.getElementById('wishlist-grid').style.display = 'none';
            document.getElementById('wishlist-empty').classList.remove('hidden');
        }

        // Delete button event listeners
        document.querySelectorAll('.remove-wish-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = parseInt(this.getAttribute('data-id'));
                const card = this.closest('article');
                
                // Remove from local storage
                let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
                const index = wishlist.indexOf(id);
                if (index > -1) {
                    wishlist.splice(index, 1);
                    localStorage.setItem('wishlist', JSON.stringify(wishlist));
                }

                // Animation
                card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                card.style.opacity = '0';
                card.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    card.remove();
                    if (document.querySelectorAll('.wishlist-item:not(.hidden)').length === 0) {
                        document.getElementById('wishlist-grid').style.display = 'none';
                        document.getElementById('wishlist-empty').classList.remove('hidden');
                    }
                }, 300);
            });
        });
    });
</script>
@endpush
