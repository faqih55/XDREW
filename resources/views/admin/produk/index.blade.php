@extends('layouts.admin')
@section('title', 'Inventaris | XDrew Fashion')

@section('content')
<div class="p-4 md:p-8" x-data="{ showDeleteModal: false, deleteActionUrl: '', deleteProductName: '' }">
    <header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 border-b border-black/5 pb-6">
        <div>
            <h2 class="text-3xl font-extrabold text-[#1A2E26] tracking-tight uppercase">Manajemen <span class="text-[#10b981]">Inventaris.</span></h2>
            <p class="text-slate-500 text-sm mt-1">Kelola stok, harga, dan katalog koleksi produk Anda.</p>
        </div>
        <a href="{{ route('admin.produk.create') }}" class="flex items-center gap-2 px-6 py-3 rounded-xl bg-[#10b981] text-white font-bold uppercase tracking-widest text-xs hover:bg-[#059669] transition-all hover:shadow-lg hover:shadow-[#10b981]/30">
            <span class="material-symbols-outlined text-[18px]">add</span> Koleksi Baru
        </a>
    </header>

    @if(session('success'))
        <div class="mb-8 p-4 bg-[#10b981]/10 border border-[#10b981]/30 text-[#10b981] rounded-xl flex items-center gap-3 font-medium shadow-[0_0_20px_rgba(16,185,129,0.1)]">
            <span class="material-symbols-outlined text-[24px]">check_circle</span>
            {{ session('success') }}
        </div>
    @endif
    @if($errors->has('error'))
        <div class="mb-8 p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl flex items-center gap-3 font-medium shadow-[0_0_20px_rgba(239,68,68,0.1)]">
            <span class="material-symbols-outlined text-[24px]">error</span>
            {{ $errors->first('error') }}
        </div>
    @endif

    <div class="glass-card rounded-3xl overflow-hidden border border-black/5 shadow-2xl">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-sm text-left whitespace-nowrap">
                <thead class="bg-white/40 text-slate-500 text-[10px] uppercase tracking-widest border-b border-black/5">
                    <tr>
                        <th class="px-6 py-5 font-bold">Produk</th>
                        <th class="px-6 py-5 font-bold">Kategori</th>
                        <th class="px-6 py-5 font-bold">Harga</th>
                        <th class="px-6 py-5 font-bold">Stok</th>
                        <th class="px-6 py-5 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5">
                    @forelse($data_produk ?? [] as $produk)
                    <tr class="hover:bg-black/5 transition-colors group">
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg overflow-hidden bg-black/5 border border-black/5 shrink-0">
                                <img src="{{ asset('images/' . ($produk->FOTO ?? $produk->foto)) }}" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/50'">
                            </div>
                            <div>
                                <p class="font-bold text-[#1A2E26]">{{ $produk->NAMA_PRODUK ?? $produk->nama_produk }}</p>
                                <p class="text-[10px] text-[#10b981] font-mono">ID: {{ $produk->ID ?? $produk->id }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-slate-600">{{ $produk->KATEGORI ?? $produk->kategori }}</td>
                        <td class="px-6 py-4 font-bold text-[#1A2E26]">Rp {{ number_format($produk->HARGA ?? $produk->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ ($produk->STOK ?? $produk->stok) > 5 ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : 'bg-red-500/10 text-red-400 border border-red-500/20' }}">
                                {{ $produk->STOK ?? $produk->stok }} Pcs
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.produk.edit', $produk->ID ?? $produk->id) }}" class="w-8 h-8 rounded-lg bg-blue-500/10 border border-blue-500/20 text-blue-400 flex items-center justify-center hover:bg-blue-500 hover:text-white transition-all" title="Edit Produk"><span class="material-symbols-outlined text-[16px]">edit</span></a>
                                
                                <button type="button" 
                                        data-action="{{ route('admin.produk.destroy', $produk->ID ?? $produk->id) }}"
                                        data-name="{{ $produk->NAMA_PRODUK ?? $produk->nama_produk }}"
                                        @click="showDeleteModal = true; deleteActionUrl = $el.dataset.action; deleteProductName = $el.dataset.name" 
                                        class="w-8 h-8 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all" 
                                        title="Hapus Produk">
                                    <span class="material-symbols-outlined text-[16px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-12 text-center text-slate-400">Belum ada produk di inventaris.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-black/5">
            {{ $data_produk->links('vendor.pagination.tailwind') }}
        </div>
    </div>

<!-- Deletion Confirmation Modal -->
<div x-show="showDeleteModal" 
     class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     style="display: none;">
    
    <!-- Modal Card -->
    <div @click.outside="showDeleteModal = false"
         class="glass-card w-full max-w-md rounded-3xl p-8 border border-white/20 shadow-2xl relative overflow-hidden"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="scale-95 translate-y-4"
         x-transition:enter-end="scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="scale-100 translate-y-0"
         x-transition:leave-end="scale-95 translate-y-4">
         
        <!-- Red/Orange Glow background element -->
        <div class="absolute -top-12 -left-12 w-32 h-32 rounded-full bg-red-500/10 blur-2xl pointer-events-none"></div>

        <div class="flex flex-col items-center text-center">
            <!-- Icon container with pulse -->
            <div class="w-16 h-16 rounded-full bg-red-500/10 border border-red-500/20 flex items-center justify-center text-red-500 mb-5 relative">
                <span class="material-symbols-outlined text-3xl animate-pulse">warning</span>
            </div>

            <h3 class="text-2xl font-black text-[#1A2E26] tracking-tight uppercase mb-2">Hapus Koleksi?</h3>
            <p class="text-slate-500 text-sm leading-relaxed mb-6">
                Apakah Anda yakin ingin menghapus produk <strong class="text-red-500" x-text="deleteProductName"></strong> dari inventaris? Tindakan ini tidak dapat dibatalkan.
            </p>

            <!-- Action Buttons -->
            <div class="flex items-center gap-3 w-full">
                <button type="button" @click="showDeleteModal = false" 
                        class="flex-1 py-3.5 rounded-xl border border-black/10 text-[#1A2E26] text-xs font-bold uppercase tracking-wider hover:bg-black/5 transition-all">
                    Batal
                </button>
                
                <form :action="deleteActionUrl" method="POST" class="flex-1" x-ref="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button type="button" 
                            @click="$refs.deleteForm.submit()"
                            class="w-full py-3.5 rounded-xl bg-red-500 text-white text-xs font-bold uppercase tracking-wider hover:bg-red-600 hover:shadow-lg hover:shadow-red-500/20 transition-all">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection