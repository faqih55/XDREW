<footer class="bg-surface-container-lowest dark:bg-surface-container-lowest w-full py-xl border-t border-outline-variant/30">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-margin-desktop w-full max-w-[1440px] mx-auto">
        
        <div class="flex flex-col gap-sm">
            <h3 class="font-headline-md text-headline-md text-on-surface">XDrew Fashion</h3>
            <p class="font-body-md text-on-surface-variant">Streetwear yang dibuat dengan penuh kesadaran untuk dunia modern. Estetika premium dengan jiwa.</p>
        </div>

        <div class="flex flex-col gap-xs">
            <h4 class="font-label-md text-primary uppercase tracking-widest mb-xs">Belanja</h4>
            <a class="text-on-surface-variant hover:text-primary transition-transform hover:translate-x-1 duration-200" href="{{ route('produk') }}">Koleksi Terbaru</a>
            <a class="text-on-surface-variant hover:text-primary transition-transform hover:translate-x-1 duration-200" href="#">Keberlanjutan</a>
            <a class="text-on-surface-variant hover:text-primary transition-transform hover:translate-x-1 duration-200" href="{{ route('produk') }}">Koleksi</a>
            <a class="text-on-surface-variant hover:text-primary transition-transform hover:translate-x-1 duration-200" href="#">Terlaris</a>
        </div>

        <div class="flex flex-col gap-xs">
            <h4 class="font-label-md text-primary uppercase tracking-widest mb-xs">Dukungan</h4>
            <a class="text-on-surface-variant hover:text-primary transition-transform hover:translate-x-1 duration-200" href="#">Lacak Pesanan</a>
            <a class="text-on-surface-variant hover:text-primary transition-transform hover:translate-x-1 duration-200" href="#">Kebijakan Privasi</a>
            <a class="text-on-surface-variant hover:text-primary transition-transform hover:translate-x-1 duration-200" href="#">Pengiriman</a>
            <a class="text-on-surface-variant hover:text-primary transition-transform hover:translate-x-1 duration-200" href="#">Syarat & Ketentuan</a>
        </div>

        <div class="flex flex-col gap-xs">
            <h4 class="font-label-md text-primary uppercase tracking-widest mb-xs">Ikuti Kami</h4>
            <div class="flex gap-md">
                <a class="text-on-surface-variant hover:text-primary transition-all" href="#">Instagram</a>
                <a class="text-on-surface-variant hover:text-primary transition-all" href="#">Twitter</a>
                <a class="text-on-surface-variant hover:text-primary transition-all" href="#">Pinterest</a>
            </div>
            <div class="mt-md">
                <p class="font-body-md text-on-surface-variant text-caption">
                    © {{ date('Y') }} XDrew Fashion. Consciously Crafted.
                </p>
            </div>
        </div>
    </div>
</footer>