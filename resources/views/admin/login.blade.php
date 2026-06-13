@extends('layouts.guest')

@section('title', 'Masuk Admin | XDrew Fashion')

@section('content')
<main class="flex w-full min-h-screen">
    <section class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
        <div class="absolute inset-0 z-10 auth-bg-overlay"></div>
        <img alt="Gaya Hidup Fashion Berkelanjutan" class="absolute inset-0 object-cover w-full h-full grayscale-[20%] brightness-75" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNfedLcMsvFxTROkDUu6mGrkL1gthW-y22dHx6NEN2O2yFku7q6fv7iDo397FhqqQMVFgeftN7GmP5LM-fADqpBAnXI5pgOkzc1DTTvs6_ocORN4Xxst91AzKt_F5bSH07icILIb5EBsGwRL6Q6Pkj2618wtT3LGB-Csg2_bywFVYQlGap8gC0xfVD_Adf5O8CnUlpWdDI8SjutJwekajtjbyGCjPH4fjBznuJUweA0gADbdXwsnpvfkmeZ7HWhnw-P8byyAZZUky1"/>
        <div class="relative z-20 flex flex-col justify-between p-margin-desktop h-full w-full">
            <div>
                <h1 class="font-display-lg text-display-lg uppercase tracking-tighter text-on-surface mb-xs">
                    XDrew<span class="text-primary">.</span>
                </h1>
                <p class="font-label-md text-label-md text-primary tracking-[0.2em] uppercase">Panel Admin</p>
            </div>
            <div class="max-w-md">
                <h2 class="font-headline-md text-headline-md mb-sm">Masa Depan Etika Berbusana.</h2>
                <p class="text-on-surface-variant font-body-lg leading-relaxed">
                    Masuk ke panel kontrol admin untuk mengelola pesanan, produk, dan transaksi XDrew Fashion.
                </p>
            </div>
        </div>
    </section>

    <section class="w-full lg:w-1/2 flex items-center justify-center p-sm md:p-lg lg:p-margin-desktop bg-background">
        <div class="w-full max-w-md">
            <div class="lg:hidden mb-xl text-center">
                <h1 class="font-display-lg-mobile text-display-lg-mobile uppercase tracking-tighter text-on-surface">
                    XDrew<span class="text-primary">.</span>
                </h1>
            </div>
            <div class="glass-card p-md md:p-lg rounded-xl shadow-2xl relative">
                <div class="absolute -top-12 -right-12 w-32 h-32 bg-primary/10 blur-[60px] rounded-full pointer-events-none"></div>
                <header class="mb-lg">
                    <h2 class="font-headline-sm text-headline-sm text-on-surface mb-xs">Login Admin</h2>
                    <p class="text-on-surface-variant text-label-md">Masukkan kredensial khusus Anda untuk mengelola sistem.</p>
                </header>

                <form action="{{ route('admin.login.submit') }}" class="space-y-md" method="POST">
                    @csrf

                    <div class="space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant block" for="email">Alamat Email Admin</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">mail</span>
                            <input class="w-full bg-surface-container-low border @error('email') border-red-500 @else border-outline-variant @enderror focus:border-primary focus:ring-1 focus:ring-primary/20 rounded-lg py-sm pl-xl pr-sm text-on-surface placeholder:text-outline transition-all outline-none" id="email" name="email" value="{{ old('email') }}" placeholder="admin@xdrew.com" required autofocus type="email"/>
                        </div>
                        @error('email')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-xs">
                        <div class="flex justify-between items-center">
                            <label class="font-label-md text-label-md text-on-surface-variant" for="password">Kata Sandi</label>
                        </div>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">lock</span>
                            <input class="w-full bg-surface-container-low border @error('password') border-red-500 @else border-outline-variant @enderror focus:border-primary focus:ring-1 focus:ring-primary/20 rounded-lg py-sm pl-xl pr-xl text-on-surface placeholder:text-outline transition-all outline-none" id="password" name="password" placeholder="••••••••" required type="password"/>
                            <button class="absolute right-sm top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-on-surface transition-colors cursor-pointer" onclick="togglePassword()" type="button">
                                <span class="material-symbols-outlined" id="password-toggle-icon">visibility</span>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center space-x-sm">
                        <input class="w-4 h-4 rounded border-outline-variant bg-surface-container-low text-primary focus:ring-primary/40 focus:ring-offset-background transition-colors" id="remember" name="remember" type="checkbox"/>
                        <label class="font-label-md text-label-md text-on-surface-variant select-none" for="remember">Ingat Sesi Saya</label>
                    </div>

                    <button class="w-full bg-primary hover:bg-primary-fixed text-on-primary-container font-headline-sm text-body-md py-sm rounded-lg transition-all transform active:scale-95 glow-hover flex items-center justify-center space-x-xs mt-lg" type="submit">
                        <span>Masuk ke Panel Kontrol</span>
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </form>

            </div>
            <div class="mt-xl flex justify-center space-x-md text-caption text-outline">
                <a class="hover:text-on-surface-variant transition-colors" href="#">Keamanan Sistem</a>
                <a class="hover:text-on-surface-variant transition-colors" href="#">Log Aktivitas</a>
            </div>
        </div>
    </section>
</main>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('password-toggle-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.textContent = 'visibility_off';
        } else {
            passwordInput.type = 'password';
            toggleIcon.textContent = 'visibility';
        }
    }
</script>
@endsection