<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Edit Profil | AETHER</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style>
        .glass-card { background: rgba(30, 41, 59, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="bg-[#0e1511] text-[#dde4dd] min-h-screen">

<main class="max-w-[800px] mx-auto py-20 px-6">
    <div class="mb-8">
        <a href="{{ route('profile.show') }}" class="text-primary hover:underline flex items-center gap-2">
            <span class="material-symbols-outlined">arrow_back</span> Kembali ke Akun
        </a>
        <h1 class="text-3xl font-bold mt-4">Edit Profil</h1>
        <p class="text-on-surface-variant mt-2">Perbarui informasi pribadi Anda.</p>
    </div>

    <!-- Menampilkan pesan sukses -->
    @if (session('success'))
        <div class="mb-6 p-4 bg-emerald-900/20 border border-emerald-500 text-emerald-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <section class="glass-card rounded-xl p-8">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf
            @method('patch')

            <!-- Avatar -->
            <div class="flex items-center gap-6">
                <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-primary">
                    <img src="https://ui-avatars.com/api/?name={{ $user->nama_lengkap }}" alt="Avatar" class="w-full h-full object-cover">
                </div>
                <!-- Input file untuk ganti foto -->
                <label class="cursor-pointer px-4 py-2 border border-primary text-primary rounded-lg hover:bg-primary/10 transition">
                    Ganti Foto
                    <input type="file" name="foto" class="hidden">
                </label>
            </div>

            <!-- Form Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->nama_lengkap) }}" 
                           class="w-full bg-surface-container border-none rounded-lg focus:ring-2 focus:ring-primary @error('name') border-red-500 @enderror">
                    @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                           class="w-full bg-surface-container border-none rounded-lg focus:ring-2 focus:ring-primary @error('email') border-red-500 @enderror">
                    @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Bio Singkat</label>
                <textarea name="bio" rows="3" class="w-full bg-surface-container border-none rounded-lg focus:ring-2 focus:ring-primary">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <div class="h-[1px] bg-white/10 my-2"></div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('profile.show') }}" class="px-6 py-2 rounded-lg text-on-surface-variant hover:text-on-surface">Batal</a>
                <button type="submit" class="px-6 py-2 rounded-lg bg-primary text-on-primary font-bold hover:bg-primary-container transition">Simpan Perubahan</button>
            </div>
        </form>
    </section>
</main>

</body>
</html>