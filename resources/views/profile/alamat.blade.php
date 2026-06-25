@extends('layouts.profile')

@section('title', 'Alamat Pengiriman | XDrew Fashion')

@section('content')
<div class="max-w-5xl mx-auto space-y-8 animate-smooth-reveal">
    <header class="mb-8 flex flex-col md:flex-row justify-between md:items-center gap-4">
        <div>
            <h1 class="font-['Outfit'] text-3xl font-extrabold text-[#1A2E26] mb-2 tracking-tight">Alamat Pengiriman</h1>
            <p class="text-[#1A2E26]/70 text-sm">Kelola alamat pengiriman Anda untuk memudahkan proses checkout.</p>
        </div>
        <a href="{{ route('profile.show') }}" class="flex items-center justify-center gap-2 px-4 py-2 bg-white/60 border border-white/80 text-[#1A2E26] rounded-xl hover:bg-white hover:border-white shadow-sm hover:shadow-md transition-all font-bold w-full md:w-auto">
            <span class="material-symbols-outlined text-[20px]">arrow_back</span>
            <span>Kembali</span>
        </a>
    </header>

    <div class="bg-white/40 backdrop-blur-md rounded-[2rem] p-8 border border-white/60 shadow-lg relative overflow-hidden">
        @if(session('success'))
            <div class="mb-6 px-4 py-3 bg-[#10b981]/20 border border-[#10b981] text-[#10b981] rounded-xl font-bold flex items-center gap-2">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.alamat.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2 group">
                    <label for="provinsi" class="block text-sm font-bold text-[#1A2E26]/70 group-focus-within:text-[#10b981] transition-colors">Provinsi</label>
                    <input type="text" id="provinsi" name="provinsi" 
                           value="{{ old('provinsi', $user->PROVINSI ?? $user->provinsi ?? '') }}" 
                           placeholder="Contoh: DI Yogyakarta" 
                           class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#1A2E26] placeholder-[#1A2E26]/30 focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] shadow-inner transition-all duration-300">
                    @error('provinsi')
                        <p class="text-xs text-[#e11d48] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2 group">
                    <label for="kota" class="block text-sm font-bold text-[#1A2E26]/70 group-focus-within:text-[#10b981] transition-colors">Kota / Kabupaten</label>
                    <input type="text" id="kota" name="kota" 
                           value="{{ old('kota', $user->KOTA ?? $user->kota ?? '') }}" 
                           placeholder="Contoh: Sleman" 
                           class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#1A2E26] placeholder-[#1A2E26]/30 focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] shadow-inner transition-all duration-300">
                    @error('kota')
                        <p class="text-xs text-[#e11d48] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2 space-y-2 group">
                    <label for="alamat" class="block text-sm font-bold text-[#1A2E26]/70 group-focus-within:text-[#10b981] transition-colors">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="4" 
                              placeholder="Tuliskan alamat pengiriman Anda secara detail (Nama jalan, RT/RW, nomor rumah, detail patokan...)" 
                              class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#1A2E26] placeholder-[#1A2E26]/30 focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] shadow-inner transition-all duration-300 resize-y">{{ old('alamat', $user->ALAMAT ?? $user->alamat ?? '') }}</textarea>
                    @error('alamat')
                        <p class="text-xs text-[#e11d48] mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end pt-6 mt-6 border-t border-[#1A2E26]/10 gap-4">
                <a href="{{ route('profile.show') }}" class="px-6 py-3 bg-white/60 border border-white/80 text-[#1A2E26] rounded-xl hover:bg-white shadow-sm hover:shadow-md transition-all font-bold text-center">Batal</a>
                <button type="submit" class="px-8 py-3 bg-[#10b981] text-white font-bold rounded-xl shadow-[0_4px_15px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_25px_rgba(16,185,129,0.3)] transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">save</span> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
