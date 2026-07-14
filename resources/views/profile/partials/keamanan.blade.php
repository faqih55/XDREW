@extends('layouts.profile')

@section('title', 'Keamanan Akun | XDrew Fashion')

@section('content')
<div class="max-w-5xl mx-auto space-y-8 animate-smooth-reveal">
    <header class="mb-8 flex flex-col md:flex-row justify-between md:items-center gap-4">
        <div>
            <h1 class="font-['Outfit'] text-3xl font-extrabold text-[#0A1612] mb-2 tracking-tight">Keamanan Akun</h1>
            <p class="text-[#0A1612]/70 text-sm">Ubah kata sandi Anda untuk menjaga keamanan akun Anda.</p>
        </div>
        <a href="{{ route('profile.show') }}" class="flex items-center justify-center gap-2 px-4 py-2 bg-white/60 border border-white/80 text-[#0A1612] rounded-xl hover:bg-white hover:border-white shadow-sm hover:shadow-md transition-all font-bold w-full md:w-auto">
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

        <form action="{{ route('profile.keamanan.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <!-- Password Saat Ini -->
            <div class="space-y-2 group">
                <label for="current_password" class="block text-sm font-bold text-[#0A1612]/70 group-focus-within:text-[#10b981] transition-colors">Kata Sandi Saat Ini</label>
                <input type="password" id="current_password" name="current_password" required
                       placeholder="Masukkan kata sandi lama Anda" 
                       class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#0A1612] placeholder-[#1A2E26]/30 focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] shadow-inner transition-all duration-300">
                @error('current_password')
                    <p class="text-xs text-[#e11d48] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Baru -->
            <div class="space-y-2 group">
                <label for="password" class="block text-sm font-bold text-[#0A1612]/70 group-focus-within:text-[#10b981] transition-colors">Kata Sandi Baru</label>
                <input type="password" id="password" name="password" required
                       placeholder="Minimal 8 karakter" 
                       class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#0A1612] placeholder-[#1A2E26]/30 focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] shadow-inner transition-all duration-300">
                @error('password')
                    <p class="text-xs text-[#e11d48] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password Baru -->
            <div class="space-y-2 group">
                <label for="password_confirmation" class="block text-sm font-bold text-[#0A1612]/70 group-focus-within:text-[#10b981] transition-colors">Konfirmasi Kata Sandi Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                       placeholder="Ulangi kata sandi baru Anda" 
                       class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#0A1612] placeholder-[#1A2E26]/30 focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] shadow-inner transition-all duration-300">
            </div>

            <div class="flex flex-col-reverse sm:flex-row justify-end pt-6 mt-6 border-t border-[#1A2E26]/10 gap-4">
                <a href="{{ route('profile.show') }}" class="px-6 py-3 bg-white/60 border border-white/80 text-[#0A1612] rounded-xl hover:bg-white shadow-sm hover:shadow-md transition-all font-bold text-center">Batal</a>
                <button type="submit" class="px-8 py-3 bg-[#10b981] text-white font-bold rounded-xl shadow-[0_4px_15px_rgba(16,185,129,0.2)] hover:shadow-[0_6px_25px_rgba(16,185,129,0.3)] transform hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[20px]">save</span> Perbarui Kata Sandi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
