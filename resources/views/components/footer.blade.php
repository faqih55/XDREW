<footer class="w-full bg-white/40 backdrop-blur-md border-t border-white/60 pt-16 pb-8 mt-auto relative overflow-hidden z-10">
    <!-- Dekorasi background glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[1px] bg-gradient-to-r from-transparent via-[#10b981]/50 to-transparent"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[400px] h-[300px] bg-[#10b981]/10 blur-[120px] rounded-full pointer-events-none"></div>

    <div class="px-6 md:px-16 w-full max-w-[1440px] mx-auto relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 lg:gap-16 mb-12">
            
            <div class="flex flex-col gap-5">
                <a href="{{ route('home') }}" class="font-headline-md text-2xl font-black tracking-widest text-[#0A1612] hover:text-[#10b981] transition-colors duration-300">
                    XDREW <span class="text-[#10b981]">FASHION</span>
                </a>
                <p class="text-sm text-[#0A1612]/70 leading-relaxed font-light mt-1">
                    Streetwear yang dibuat dengan penuh kesadaran untuk dunia modern. Estetika premium dengan jiwa. Dirancang untuk masa depan.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                <h4 class="font-headline-sm text-[#0A1612] uppercase tracking-widest text-sm font-bold mb-4">Belanja</h4>
                <a class="text-sm text-[#0A1612]/70 hover:text-[#10b981] hover:translate-x-1 transition-all duration-300 w-fit flex items-center gap-2 group" href="{{ route('produk.index') }}">
                    <span class="w-0 h-px bg-[#10b981] group-hover:w-3 transition-all duration-300"></span> Koleksi Terbaru
                </a>
                <a class="text-sm text-[#0A1612]/70 hover:text-[#10b981] hover:translate-x-1 transition-all duration-300 w-fit flex items-center gap-2 group" href="{{ route('sustainability') ?? '#' }}">
                    <span class="w-0 h-px bg-[#10b981] group-hover:w-3 transition-all duration-300"></span> Keberlanjutan
                </a>
                <a class="text-sm text-[#0A1612]/70 hover:text-[#10b981] hover:translate-x-1 transition-all duration-300 w-fit flex items-center gap-2 group" href="{{ route('jurnal') ?? '#' }}">
                    <span class="w-0 h-px bg-[#10b981] group-hover:w-3 transition-all duration-300"></span> Jurnal
                </a>
                <a class="text-sm text-[#0A1612]/70 hover:text-[#10b981] hover:translate-x-1 transition-all duration-300 w-fit flex items-center gap-2 group" href="{{ route('produk.index') }}">
                    <span class="w-0 h-px bg-[#10b981] group-hover:w-3 transition-all duration-300"></span> Semua Produk
                </a>
            </div>

            <div class="flex flex-col gap-4">
                <h4 class="font-headline-sm text-[#0A1612] uppercase tracking-widest text-sm font-bold mb-4">Dukungan</h4>
                <a class="text-sm text-[#0A1612]/70 hover:text-[#10b981] hover:translate-x-1 transition-all duration-300 w-fit flex items-center gap-2 group" href="#">
                    <span class="w-0 h-px bg-[#10b981] group-hover:w-3 transition-all duration-300"></span> Lacak Pesanan
                </a>
                <a class="text-sm text-[#0A1612]/70 hover:text-[#10b981] hover:translate-x-1 transition-all duration-300 w-fit flex items-center gap-2 group" href="#">
                    <span class="w-0 h-px bg-[#10b981] group-hover:w-3 transition-all duration-300"></span> Kebijakan Privasi
                </a>
                <a class="text-sm text-[#0A1612]/70 hover:text-[#10b981] hover:translate-x-1 transition-all duration-300 w-fit flex items-center gap-2 group" href="#">
                    <span class="w-0 h-px bg-[#10b981] group-hover:w-3 transition-all duration-300"></span> Syarat & Ketentuan
                </a>
                <a class="text-sm text-[#0A1612]/70 hover:text-[#10b981] hover:translate-x-1 transition-all duration-300 w-fit flex items-center gap-2 group" href="#">
                    <span class="w-0 h-px bg-[#10b981] group-hover:w-3 transition-all duration-300"></span> Hubungi Kami
                </a>
            </div>

            <div class="flex flex-col gap-4">
                <h4 class="font-headline-sm text-[#0A1612] uppercase tracking-widest text-sm font-bold mb-4">Ikuti Kami</h4>
                <div class="flex gap-4">
                    <a class="w-10 h-10 rounded-full border border-[#1A2E26]/20 flex items-center justify-center text-[#0A1612]/70 hover:border-[#10b981] hover:text-[#10b981] hover:bg-[#10b981]/10 hover:-translate-y-1 shadow-sm hover:shadow-[0_4px_15px_rgba(16,185,129,0.3)] transition-all duration-300" href="https://instagram.com/xdrewfashion" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a class="w-10 h-10 rounded-full border border-[#1A2E26]/20 flex items-center justify-center text-[#0A1612]/70 hover:border-[#10b981] hover:text-[#10b981] hover:bg-[#10b981]/10 hover:-translate-y-1 shadow-sm hover:shadow-[0_4px_15px_rgba(16,185,129,0.3)] transition-all duration-300" href="https://twitter.com/xdrewfashion" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>
                    <a class="w-10 h-10 rounded-full border border-[#1A2E26]/20 flex items-center justify-center text-[#0A1612]/70 hover:border-[#10b981] hover:text-[#10b981] hover:bg-[#10b981]/10 hover:-translate-y-1 shadow-sm hover:shadow-[0_4px_15px_rgba(16,185,129,0.3)] transition-all duration-300" href="https://pinterest.com/xdrewfashion" target="_blank" rel="noopener noreferrer" aria-label="Pinterest">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.951-7.252 4.182 0 7.436 2.983 7.436 6.956 0 4.156-2.618 7.502-6.257 7.502-1.22 0-2.368-.633-2.76-1.385l-.752 2.868c-.272 1.042-1.01 2.344-1.503 3.141 1.25.385 2.576.592 3.951.592 6.621 0 11.988-5.368 11.988-11.988C24.005 5.367 18.638 0 12.017 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-[#1A2E26]/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 relative z-10">
            <p class="text-xs text-[#0A1612]/70 font-light tracking-wide flex items-center gap-1">
                © {{ date('Y') }} XDrew Fashion. <span class="hidden md:inline">Consciously Crafted.</span>
            </p>
            <div class="flex gap-6 items-center">
                <span class="text-xs text-[#0A1612]/70 font-light tracking-wide px-3 py-1 rounded-full border border-[#1A2E26]/10 bg-white/50 backdrop-blur-md">IDR (Rp)</span>
                <span class="text-xs text-[#0A1612]/70 font-light tracking-wide px-3 py-1 rounded-full border border-[#1A2E26]/10 bg-white/50 backdrop-blur-md">Indonesia</span>
            </div>
        </div>
    </div>
</footer>