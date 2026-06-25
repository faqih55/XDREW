@extends('layouts.profile')

@section('title', 'Edit Profil | XDrew Fashion')

@section('content')
<div class="max-w-5xl mx-auto space-y-8 animate-smooth-reveal">
    <header class="mb-8 flex flex-col md:flex-row justify-between md:items-center gap-4">
        <div>
            <h1 class="font-['Outfit'] text-3xl font-extrabold text-[#1A2E26] mb-2 tracking-tight">Edit Profil</h1>
            <p class="text-[#1A2E26]/70 text-sm">Perbarui informasi pribadi dan sesuaikan preferensi akun Anda.</p>
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

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')
            
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8 border-b border-[#1A2E26]/10 pb-6 mb-6"
                 x-data="{ 
                     photoPreview: null,
                     triggerUpload() {
                         this.$refs.photoInput.click();
                     },
                     previewPhoto(event) {
                         const file = event.target.files[0];
                         if (file) {
                             const reader = new FileReader();
                             reader.onload = (e) => {
                                 this.photoPreview = e.target.result;
                             };
                             reader.readAsDataURL(file);
                         }
                     }
                 }">
                <div @click="triggerUpload()" class="relative group cursor-pointer shrink-0">
                    <div class="w-32 h-32 rounded-full overflow-hidden border-2 border-[#10b981]/50 shadow-[0_4px_15px_rgba(16,185,129,0.15)]">
                        <template x-if="photoPreview">
                            <img :src="photoPreview" alt="Profile Preview" class="w-full h-full object-cover">
                        </template>
                        <template x-if="!photoPreview">
                            @if($user->foto ?? $user->FOTO)
                                <img src="{{ asset('storage/' . ($user->foto ?? $user->FOTO)) }}" alt="Profile" class="w-full h-full object-cover">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->NAMA_PELANGGAN ?? $user->NAMA_LENGKAP ?? 'User') }}&background=10b981&color=fff&size=200&bold=true" alt="Profile" class="w-full h-full object-cover">
                            @endif
                        </template>
                    </div>
                    <div class="absolute inset-0 bg-[#EAF3EF]/70 rounded-full opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-300 backdrop-blur-sm">
                        <span class="material-symbols-outlined text-[#1A2E26] text-3xl">add_a_photo</span>
                    </div>
                </div>
                <div class="flex flex-col items-center md:items-start justify-center pt-2">
                    <button type="button" @click="triggerUpload()" class="cursor-pointer px-4 py-2 bg-white/60 text-[#1A2E26] border border-white/80 font-bold rounded-xl hover:bg-white transition-all inline-block mb-2 text-center text-sm shadow-sm hover:shadow-md">
                        Pilih Foto Baru
                    </button>
                    <input type="file" name="foto" x-ref="photoInput" @change="previewPhoto($event)" class="hidden" accept="image/*">
                    <p class="text-xs text-[#1A2E26]/50 text-center md:text-left">Format yang didukung: JPG, PNG, JPEG. Ukuran maksimal 2MB.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="group">
                    <label class="text-sm text-[#1A2E26]/70 block mb-2 font-bold group-focus-within:text-[#10b981] transition-colors">Nama Lengkap</label>
                    <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan', $user->NAMA_PELANGGAN ?? $user->NAMA_LENGKAP) }}" required class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#1A2E26] focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] shadow-inner transition-all duration-300">
                    @error('nama_pelanggan') <span class="text-[#e11d48] text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div class="group">
                    <label class="text-sm text-[#1A2E26]/70 block mb-2 font-bold group-focus-within:text-[#10b981] transition-colors">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->EMAIL) }}" required class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#1A2E26] focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] shadow-inner transition-all duration-300">
                    @error('email') <span class="text-[#e11d48] text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div class="group">
                    <label class="text-sm text-[#1A2E26]/70 block mb-2 font-bold group-focus-within:text-[#10b981] transition-colors">Nomor Telepon</label>
                    <input type="text" name="no_telepon" value="{{ old('no_telepon', $user->NO_TELEPON ?? $user->NOMOR_TELEPON) }}" placeholder="Contoh: 081234567890" class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#1A2E26] focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] shadow-inner transition-all duration-300 placeholder-[#1A2E26]/30">
                    @error('no_telepon') <span class="text-[#e11d48] text-sm mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div class="md:col-span-2 group">
                    <label class="text-sm text-[#1A2E26]/70 block mb-2 font-bold group-focus-within:text-[#10b981] transition-colors">Alamat Lengkap</label>
                    <textarea name="alamat" rows="3" class="w-full bg-white/60 border border-white/80 rounded-xl px-4 py-3 text-[#1A2E26] focus:bg-white focus:outline-none focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981] shadow-inner transition-all duration-300 resize-y">{{ old('alamat', $user->ALAMAT) }}</textarea>
                    @error('alamat') <span class="text-[#e11d48] text-sm mt-1 block">{{ $message }}</span> @enderror
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