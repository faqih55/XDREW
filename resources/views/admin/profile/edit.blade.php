@extends('layouts.admin')

@section('title', 'Edit Profil Admin | XDrew Fashion')

@section('content')
<div class="p-4 md:p-8">
    <div class="max-w-4xl mx-auto space-y-6">
        <div class="flex items-center justify-between mb-8 border-b border-black/5 pb-6">
            <div>
                <h2 class="text-3xl font-extrabold text-[#0A1612] font-['Outfit'] tracking-tight uppercase">Profil <span class="text-[#10b981]">Admin.</span></h2>
                <p class="text-slate-500 text-sm mt-1">Kelola informasi pribadi dan keamanan akun Anda.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-[#10b981]/10 border border-[#10b981]/30 text-[#10b981] rounded-xl flex items-center gap-3 font-medium shadow-[0_0_20px_rgba(16,185,129,0.1)] animate-smooth-reveal">
                <span class="material-symbols-outlined text-[24px]">check_circle</span>
                <p class="font-medium">{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('admin.profile.update') }}" method="POST" class="glass-card border border-black/5 rounded-3xl p-6 lg:p-10 shadow-2xl relative overflow-hidden">
            @csrf
            @method('PATCH')

            <!-- Dekorasi Background -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-[#10b981]/5 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8 relative z-10">
                <!-- Informasi Dasar -->
                <div class="space-y-6">
                    <h3 class="text-lg font-bold text-[#0A1612] border-b border-black/5 pb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#10b981]">person</span>
                        Informasi Dasar
                    </h3>

                    @php
                        $nama = $admin->getAttribute('nama_admin') ?? $admin->getAttribute('NAMA_ADMIN') ?? $admin->getAttribute('name') ?? '';
                        $email = $admin->getAttribute('email') ?? $admin->getAttribute('EMAIL') ?? '';
                    @endphp

                    <div class="space-y-2">
                        <label for="nama_admin" class="text-xs font-bold uppercase tracking-wider text-slate-500">Nama Lengkap</label>
                        <input type="text" name="nama_admin" id="nama_admin" value="{{ old('nama_admin', $nama) }}" required
                               class="w-full bg-white/60 border border-black/10 rounded-xl px-4 py-3.5 text-[#0A1612] placeholder-slate-400 focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] transition-all">
                        @error('nama_admin')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-xs font-bold uppercase tracking-wider text-slate-500">Alamat Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $email) }}" required
                               class="w-full bg-white/60 border border-black/10 rounded-xl px-4 py-3.5 text-[#0A1612] placeholder-slate-400 focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] transition-all">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Keamanan -->
                <div class="space-y-6">
                    <h3 class="text-lg font-bold text-[#0A1612] border-b border-black/5 pb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#10b981]">lock</span>
                        Keamanan
                    </h3>
                    <p class="text-xs text-slate-400 mb-4">Kosongkan kolom kata sandi jika Anda tidak ingin mengubahnya.</p>

                    <div class="space-y-2">
                        <label for="password" class="text-xs font-bold uppercase tracking-wider text-slate-500">Kata Sandi Baru</label>
                        <input type="password" name="password" id="password" placeholder="Minimal 8 karakter"
                               class="w-full bg-white/60 border border-black/10 rounded-xl px-4 py-3.5 text-[#0A1612] placeholder-slate-400 focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] transition-all">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-xs font-bold uppercase tracking-wider text-slate-500">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi kata sandi baru"
                               class="w-full bg-white/60 border border-black/10 rounded-xl px-4 py-3.5 text-[#0A1612] placeholder-slate-400 focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] transition-all">
                    </div>
                </div>
            </div>

            <div class="mt-10 flex items-center justify-end gap-4 border-t border-black/5 pt-6">
                <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 rounded-xl font-bold text-slate-500 hover:text-[#0A1612] hover:bg-black/5 transition-colors" style="text-decoration: none;">
                    Batal
                </a>
                <button type="submit" class="px-8 py-3 rounded-xl font-bold bg-[#10b981] text-white hover:bg-[#059669] shadow-lg shadow-[#10b981]/20 hover:shadow-xl hover:shadow-[#10b981]/30 transition-all transform hover:-translate-y-0.5">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
