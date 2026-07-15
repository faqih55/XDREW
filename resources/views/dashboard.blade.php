@extends('layouts.Front')

@section('title', 'Akun Saya')

@section('content')
<div class="pt-32 pb-20 px-6 md:px-16 max-w-[1440px] mx-auto">

        <h1 class="text-4xl md:text-5xl mb-10 tracking-tighter uppercase font-bold text-white">AKUN SAYA</h1>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
            <aside class="md:col-span-3">
                <div class="glass-card rounded-xl p-4 flex flex-col gap-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#10b981]/20 text-[#4edea3]">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">person</span>
                        <span class="text-sm font-bold">Profil</span>
                    </a>
                    <button type="button" 
                            onclick="window.dispatchEvent(new CustomEvent('open-user-logout-modal'))" 
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-red-400 hover:bg-red-900/20 text-left transition-all">
                        <span class="material-symbols-outlined">logout</span>
                        <span class="text-sm">Keluar</span>
                    </button>
                </div>
            </aside>

            <div class="md:col-span-9 flex flex-col gap-8">
                <section class="glass-card p-8 rounded-xl border border-white/10">
                    <h2 class="text-xl font-bold mb-6 text-[#4edea3]">Informasi Profil</h2>
                    <div class="space-y-6">
                        <div class="flex border-b border-white/5 pb-4">
                            <span class="w-1/3 text-gray-400">Nama Lengkap</span>
                            <span class="w-2/3 font-medium text-white">{{ Auth::guard('pelanggan')->user()->nama ?? Auth::guard('pelanggan')->user()->name }}</span>
                        </div>
                        <div class="flex border-b border-white/5 pb-4">
                            <span class="w-1/3 text-gray-400">Email</span>
                            <span class="w-2/3 text-white">{{ Auth::guard('pelanggan')->user()->email }}</span>
                        </div>
                    </div>
                    <div class="mt-8">
                        <a href="{{ route('profile.edit') }}" class="bg-[#4edea3] text-black px-6 py-2 rounded-lg font-bold hover:bg-emerald-400 transition">Edit Profil</a>
                    </div>
                </section>
            </div>
        </div>
    
</div>
@endsection


@push('styles')
<style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .glass-card { background: rgba(30, 41, 59, 0.4); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .emerald-glow:hover { box-shadow: 0 0 20px rgba(16, 185, 129, 0.15); border-color: rgba(16, 185, 129, 0.3); }
        body { background-color: #0e1511; color: #dde4dd; }
    </style>
@endpush
