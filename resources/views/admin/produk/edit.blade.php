@extends('layouts.admin')

@section('title', 'Edit Koleksi | XDrew Fashion')

@section('content')
<div class="p-4 md:p-8" x-data="productForm('{{ $produk->FOTO ?? $produk->foto ? asset('images/' . ($produk->FOTO ?? $produk->foto)) : '' }}')">
    
    <header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8 border-b border-black/5 pb-6">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <a href="{{ route('admin.dashboard') }}" class="text-slate-500 hover:text-[#10b981] text-sm transition-colors font-medium">Dasbor</a>
                <span class="material-symbols-outlined text-slate-400 text-[16px]">chevron_right</span>
                <a href="{{ route('admin.inventaris') }}" class="text-slate-500 hover:text-[#10b981] text-sm transition-colors font-medium">Inventaris</a>
                <span class="material-symbols-outlined text-slate-400 text-[16px]">chevron_right</span>
                <span class="text-[#10b981] text-sm font-bold uppercase tracking-widest">Edit Produk</span>
            </div>
            <h2 class="text-3xl font-extrabold text-[#0A1612] tracking-tight uppercase">Edit Koleksi <span class="text-[#10b981]">Produk.</span></h2>
        </div>
    </header>

    @if ($errors->any())
        <div class="mb-8 p-5 bg-red-500/10 border border-red-500/30 text-red-400 rounded-2xl">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.produk.update', $produk->ID ?? $produk->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        @csrf
        @method('PATCH')
        <div class="xl:col-span-2 space-y-6">
            <div class="glass-card rounded-3xl p-6 md:p-8 border-t-2 border-t-black/5 hover:border-t-[#10b981] transition-colors shadow-sm">
                <h3 class="text-lg font-bold text-[#0A1612] mb-6 flex items-center gap-2">Informasi Dasar</h3>

                <div class="space-y-6">
                    <div>
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 block">Nama Koleksi / Produk <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_produk" required value="{{ old('nama_produk', $produk->NAMA_PRODUK ?? $produk->nama_produk) }}" class="w-full bg-white border border-black/10 rounded-xl px-5 py-4 text-[#0A1612] focus:border-[#10b981] outline-none">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 block">Ukuran (Pisah dgn Koma) <span class="text-red-500">*</span></label>
                            <input type="text" name="ukuran" required placeholder="Contoh: 39, 40, 41, 42 atau S, M, L" value="{{ old('ukuran', $produk->UKURAN ?? $produk->ukuran) }}" class="w-full bg-white border border-black/10 rounded-xl px-5 py-4 text-[#0A1612] focus:border-[#10b981] outline-none">
                            <p class="text-[10px] text-slate-500 mt-2">Gunakan tanda koma (,) untuk menambahkan variasi lebih dari 1 ukuran.</p>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 block">Warna <span class="text-red-500">*</span></label>
                            <input type="text" name="warna" required placeholder="Contoh: Emerald Green" value="{{ old('warna', $produk->WARNA ?? $produk->warna) }}" class="w-full bg-white border border-black/10 rounded-xl px-5 py-4 text-[#0A1612] focus:border-[#10b981] outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 block">Harga (Rp) <span class="text-red-500">*</span></label>
                            <input type="number" name="harga" required min="0" value="{{ old('harga', $produk->HARGA ?? $produk->harga) }}" class="w-full bg-white border border-black/10 rounded-xl px-5 py-4 text-[#0A1612] focus:border-[#10b981] outline-none">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 block">Stok <span class="text-red-500">*</span></label>
                            <input type="number" name="stok" required min="0" value="{{ old('stok', $produk->STOK ?? $produk->stok) }}" class="w-full bg-white border border-black/10 rounded-xl px-5 py-4 text-[#0A1612] focus:border-[#10b981] outline-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="glass-card rounded-3xl p-6 md:p-8 border-t-2 border-t-black/5 hover:border-t-[#10b981] transition-colors shadow-sm">
                <label class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-3 block">Foto Produk</label>
                <div class="w-full aspect-[3/4] rounded-2xl border-2 border-dashed border-black/10 bg-white/40 hover:bg-white/60 transition-colors flex flex-col items-center justify-center cursor-pointer" @click="$refs.fileInput.click()">
                    <template x-if="imageUrl"><img :src="imageUrl" class="w-full h-full object-cover rounded-xl"></template>
                    <template x-if="!imageUrl"><span class="material-symbols-outlined text-4xl text-slate-300">add_photo_alternate</span></template>
                    <input x-ref="fileInput" type="file" name="foto" accept="image/*" class="hidden" @change="fileChosen">
                </div>
                <p class="text-[10px] text-slate-500 mt-2 text-center">Biarkan kosong jika tidak ingin mengubah foto</p>
            </div>

            <div class="glass-card rounded-3xl p-6 shadow-sm">
                <label class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-3 block">Kategori <span class="text-red-500">*</span></label>
                <select name="kategori" required class="w-full bg-white border border-black/10 rounded-xl px-5 py-4 text-[#0A1612] outline-none focus:border-[#10b981]">
                    @php $kategori = old('kategori', $produk->KATEGORI ?? $produk->kategori); @endphp
                    <option value="T-Shirt" {{ $kategori == 'T-Shirt' ? 'selected' : '' }}>T-Shirt</option>
                    <option value="Kemeja" {{ $kategori == 'Kemeja' ? 'selected' : '' }}>Kemeja</option>
                    <option value="Hoodie" {{ $kategori == 'Hoodie' ? 'selected' : '' }}>Hoodie</option>
                    <option value="Cargo" {{ $kategori == 'Cargo' ? 'selected' : '' }}>Cargo</option>
                    <option value="Jaket" {{ $kategori == 'Jaket' ? 'selected' : '' }}>Jaket</option>
                    <option value="Sepatu" {{ $kategori == 'Sepatu' ? 'selected' : '' }}>Sepatu</option>
                </select>
            </div>

            <button type="submit" class="w-full py-4 rounded-xl bg-[#10b981] text-white font-bold uppercase tracking-widest hover:bg-[#059669] hover:shadow-lg hover:shadow-[#10b981]/30 transition-all">Simpan Perubahan</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('productForm', (initialImageUrl = null) => ({
            imageUrl: initialImageUrl,
            fileChosen(event) {
                let file = event.target.files[0];
                if (!file) return;
                let reader = new FileReader();
                reader.onload = e => this.imageUrl = e.target.result;
                reader.readAsDataURL(file);
            }
        }))
    })
</script>
@endsection