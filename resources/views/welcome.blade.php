@extends('layouts.Front')

@section('title', 'Streetwear Beretika')

@section('content')

        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center pt-32 pb-20 overflow-hidden px-4 md:px-16 max-w-[1440px] mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center w-full">
                
                <!-- Left Content -->
                <div class="lg:col-span-7 space-y-8">


                    <!-- Typography Heading -->
                    <h1 class="font-['Outfit'] font-black uppercase leading-[1.05] tracking-tight text-5xl md:text-7xl lg:text-8xl text-[#0A1612]">
                        <span class="block text-outline-dark">DESIGNING</span>
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#059669] via-[#0ea5e9] to-[#7c3aed]">STREETWEAR</span>
                        <span class="block">FUTURES</span>
                    </h1>

                    <!-- Paragraph description -->
                    <p class="font-body-lg text-body-lg text-[#0A1612]/80 max-w-xl leading-relaxed">
                        Bahan ramah lingkungan, minimalisme modern, kualitas premium, dan didesain oleh Mr. Muhamad Fakih untuk mengekspresikan jati diri Anda secara etis.
                    </p>

                    <!-- Buttons -->
                    <div class="flex flex-wrap items-center gap-6 pt-4">
                        <a href="{{ route('produk.index') }}" class="group relative inline-flex">
                            <button class="relative px-10 py-4 font-['Outfit'] font-black uppercase tracking-[0.25em] text-[#003824] bg-[#4edea3] hover:bg-[#10b981] hover:text-white rounded-full shadow-[0_4px_15px_rgba(78,222,163,0.2)] hover:shadow-[0_8px_30px_rgba(78,222,163,0.4)] hover:-translate-y-1 active:scale-95 transition-all duration-300 z-10 overflow-hidden">
                                <span class="relative z-10">+ Koleksi Kami</span>
                                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out"></div>
                            </button>
                        </a>
                        <a href="{{ route('jurnal') }}" class="inline-flex items-center gap-2 font-['Outfit'] font-black uppercase text-xs tracking-[0.2em] text-[#0A1612] hover:text-[#10b981] transition-all group">
                            Jelajahi Jurnal <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform">north_east</span>
                        </a>
                    </div>

                    <!-- Bottom Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8 border-t border-[#1A2E26]/10 mt-12 max-w-lg">
                        <div>
                            <p class="font-['Outfit'] font-black text-3xl text-[#0A1612]">10+</p>
                            <p class="text-[9px] font-black text-[#0A1612]/50 uppercase tracking-widest mt-1">EXCLUSIVE RELEASES</p>
                        </div>
                        <div>
                            <p class="font-['Outfit'] font-black text-3xl text-[#0A1612]">1000+</p>
                            <p class="text-[9px] font-black text-[#0A1612]/50 uppercase tracking-widest mt-1">HAPPY CUSTOMERS</p>
                        </div>
                        <div>
                            <p class="font-['Outfit'] font-black text-3xl text-[#0A1612]">100%</p>
                            <p class="text-[9px] font-black text-[#0A1612]/50 uppercase tracking-widest mt-1">ECO-FRIENDLY</p>
                        </div>
                    </div>
                </div>

                <!-- Right Visual -->
                <div class="lg:col-span-5 relative flex items-center justify-center pt-10 lg:pt-0">
                    <!-- Refractive Glass Panel Background -->
                    <div class="absolute inset-0 bg-white/20 border border-white/40 rounded-[3rem] shadow-[0_20px_50px_rgba(98,124,112,0.04)] backdrop-blur-lg transform rotate-3 scale-95 lg:scale-100"></div>
                    
                    <!-- Main visual image -->
                    <div class="relative z-10 w-[90%] aspect-[4/5] overflow-hidden rounded-[2.5rem] border border-white/60 shadow-[0_15px_35px_rgba(0,0,0,0.1)] bg-[#F9FAFB]">
                        <img src="{{ asset('images/Foto_header.jpg') }}" alt="Futuristic Visor Model" class="w-full h-full object-cover" fetchpriority="high">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A2E26]/10 via-transparent to-transparent"></div>
                    </div>
                    
                    <!-- Floating Glass Annotations -->
                    <div class="absolute top-12 -right-6 lg:-right-8 z-20 flex flex-col gap-1 p-4 bg-white/50 border border-white/70 backdrop-blur-md rounded-[1.5rem] shadow-[0_12px_32px_rgba(98,124,112,0.06)] max-w-[180px]" >
                        <span class="text-[9px] font-black uppercase tracking-[0.2em] text-[#10b981]">PREMIUM MATERIAL</span>
                        <span class="text-[11px] font-bold text-[#0A1612] leading-tight">Organic Cotton & Recycled Fiber</span>
                    </div>

                    <div class="absolute bottom-16 -left-6 lg:-left-8 z-20 flex flex-col gap-1 p-4 bg-white/50 border border-white/70 backdrop-blur-md rounded-[1.5rem] shadow-[0_12px_32px_rgba(98,124,112,0.06)] max-w-[180px]" >
                        <span class="text-[9px] font-black uppercase tracking-[0.2em] text-[#10b981]">ETHICAL PROD</span>
                        <span class="text-[11px] font-bold text-[#0A1612] leading-tight">Fair Trade Certified Factories</span>
                    </div>

                    <div class="absolute bottom-1/2 -right-8 lg:-right-12 z-20 flex flex-col gap-1 p-4 bg-white/50 border border-white/70 backdrop-blur-md rounded-[1.5rem] shadow-[0_12px_32px_rgba(98,124,112,0.06)] max-w-[180px]" >
                        <span class="text-[9px] font-black uppercase tracking-[0.2em] text-[#10b981]">SLOW FASHION</span>
                        <span class="text-[11px] font-bold text-[#0A1612] leading-tight">Designed for Timeless Wear</span>
                    </div>
                </div>

            </div>
        </section>

        <!-- Features Section -->
        <section class="py-20 relative z-10 px-4 md:px-16 max-w-[1440px] mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group relative p-10 glass-card rounded-[2rem] flex flex-col items-start gap-6 hover:-translate-y-3 transition-all duration-500 hover:shadow-[0_20px_50px_rgba(78,222,163,0.1)] hover:border-[#4edea3]/30 overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-[#4edea3]/5 rounded-full blur-[30px] group-hover:bg-[#4edea3]/10 transition-colors duration-500"></div>
                    <div class="relative w-16 h-16 flex items-center justify-center rounded-[1.25rem] bg-gradient-to-br from-[#4edea3]/10 to-transparent border border-[#4edea3]/20 group-hover:border-[#4edea3]/40 group-hover:scale-110 transition-all duration-500 shadow-[inset_0_2px_10px_rgba(78,222,163,0.05)]">
                        <span class="material-symbols-outlined text-[#4edea3] text-[32px]">eco</span>
                    </div>
                    <div class="relative z-10">
                        <h3 class="font-display-lg text-[#0A1612] tracking-widest uppercase text-xl mb-4 group-hover:text-[#10b981] transition-colors duration-300">Kapas Organik</h3>
                        <p class="text-[#0A1612]/70 text-sm leading-relaxed font-body-md">Gak pakai bahan kimia aneh-aneh. Kapas murni dari tanah yang dirawat sepenuh hati, biar alam dan petaninya tetap happy.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative p-10 glass-card rounded-[2rem] flex flex-col items-start gap-6 hover:-translate-y-3 transition-all duration-500 hover:shadow-[0_20px_50px_rgba(78,222,163,0.1)] hover:border-[#4edea3]/30 overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-[#4edea3]/5 rounded-full blur-[30px] group-hover:bg-[#4edea3]/10 transition-colors duration-500"></div>
                    <div class="relative w-16 h-16 flex items-center justify-center rounded-[1.25rem] bg-gradient-to-br from-[#4edea3]/10 to-transparent border border-[#4edea3]/20 group-hover:border-[#4edea3]/40 group-hover:scale-110 transition-all duration-500 shadow-[inset_0_2px_10px_rgba(78,222,163,0.05)]">
                        <span class="material-symbols-outlined text-[#4edea3] text-[32px]">recycling</span>
                    </div>
                    <div class="relative z-10">
                        <h3 class="font-display-lg text-[#0A1612] tracking-widest uppercase text-xl mb-4 group-hover:text-[#10b981] transition-colors duration-300">Kain Daur Ulang</h3>
                        <p class="text-[#0A1612]/70 text-sm leading-relaxed font-body-md">Bukan cuma soal keren, tapi soal repurposing. Limbah diolah jadi gear berkualitas yang siap nemenin aktivitas harian lo.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative p-10 glass-card rounded-[2rem] flex flex-col items-start gap-6 hover:-translate-y-3 transition-all duration-500 hover:shadow-[0_20px_50px_rgba(78,222,163,0.1)] hover:border-[#4edea3]/30 overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-[#4edea3]/5 rounded-full blur-[30px] group-hover:bg-[#4edea3]/10 transition-colors duration-500"></div>
                    <div class="relative w-16 h-16 flex items-center justify-center rounded-[1.25rem] bg-gradient-to-br from-[#4edea3]/10 to-transparent border border-[#4edea3]/20 group-hover:border-[#4edea3]/40 group-hover:scale-110 transition-all duration-500 shadow-[inset_0_2px_10px_rgba(78,222,163,0.05)]">
                        <span class="material-symbols-outlined text-[#4edea3] text-[32px]">handshake</span>
                    </div>
                    <div class="relative z-10">
                        <h3 class="font-display-lg text-[#0A1612] tracking-widest uppercase text-xl mb-4 group-hover:text-[#10b981] transition-colors duration-300">PERDAGANGAN ADIL</h3>
                        <p class="text-[#0A1612]/70 text-sm leading-relaxed font-body-md">Kita fair dari awal. Transparan soal siapa yang bikin baju lo, biar semua orang dapat haknya dan kerja dengan aman.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Categories: Visual Blocks (Sudah Diperbarui Sesuai Desain Produk Terlaris) -->
        <section class="py-20 relative z-10 px-4 md:px-16 max-w-[1440px] mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Kaos -->
                <a href="{{ route('produk.index', ['kategori' => 'T-Shirt']) }}" class="group flex flex-col glass-card rounded-[2rem] overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(78,222,163,0.15)] hover:border-[#4edea3]/40 cursor-pointer">
                    <div class="aspect-[4/5] relative overflow-hidden bg-white/20">
                        <img class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 opacity-95 group-hover:opacity-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-Eo3DFkyBbMXapfbzePyG1ShZ10Vaygf0MTjx5sXYmjFC7561xwRArpD8jV_0ptcqCxAsvj8Hct7jm1CqUKXOD7H1C02IIkwx-d0XarcFV2l6CcgZ-Z1wD6kgC4fDULgp3z8E6R4mKIFfZNZoWS72aiUGayRM0k-gUDaywlqO7ied9qAchakjbh3Kxdm3AtVi8hZXFnWQOl537hEBHpaWJNbG4nmGqRDkq06mCqxtuKD4cZTP8B-BMNS2Cb--0DpPkc_oyRLH94sh" alt="Kaos" loading="lazy" decoding="async"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A2E26]/30 via-transparent to-transparent opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                    </div>
                    <div class="flex flex-col p-5 bg-white/30 text-center border-t border-white/40 relative items-center justify-center flex-1">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-[1px] bg-[#4edea3]/50"></div>
                        <h3 class="font-bold uppercase text-[12px] sm:text-[13px] tracking-[0.12em] text-[#0A1612] group-hover:text-[#10b981] transition-colors truncate px-1">KAOS</h3>
                        <div class="mt-3 overflow-hidden">
                            <span class="inline-flex items-center justify-center text-white bg-[#10b981] font-bold text-[10px] sm:text-[11px] uppercase tracking-[0.15em] rounded-full transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)] w-[100px] hover:w-[140px] h-[32px] hover:bg-[#059669] hover:shadow-[0_4px_15px_rgba(16,185,129,0.3)]">
                                Jelajahi
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Hoodie -->
                <a href="{{ route('produk.index', ['kategori' => 'Hoodie']) }}" class="group flex flex-col glass-card rounded-[2rem] overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(78,222,163,0.15)] hover:border-[#4edea3]/40 cursor-pointer">
                    <div class="aspect-[4/5] relative overflow-hidden bg-white/20">
                        <img class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 opacity-95 group-hover:opacity-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8ePTZUIOYVsb0ScDbDgyzWyF1klHG8Xi42XMeR4VJjYL8Atr5LfBWUCoBrJEVTYaQHVXM_5ae_qtEzOoz2zGNAQaUY-DaFnmF-pLhCYFsU2YotwrkglkTGcK1yxwab95tCwCmZvFsLA99fzJ5E9hl1EMsoPRdmyrcwg-cwtjDe7ytPYoiRbKkM-VEtTY0wrdpfQbVbB_Uy6pkrCPfyRlbX9qHwSzO31x44AEti-Q6UoEt7B7e6kOIpB0dN2MLUHrYxvwVb7-ymsO1" alt="Hoodie" loading="lazy" decoding="async"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A2E26]/30 via-transparent to-transparent opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                    </div>
                    <div class="flex flex-col p-5 bg-white/30 text-center border-t border-white/40 relative items-center justify-center flex-1">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-[1px] bg-[#4edea3]/50"></div>
                        <h3 class="font-bold uppercase text-[12px] sm:text-[13px] tracking-[0.12em] text-[#0A1612] group-hover:text-[#10b981] transition-colors truncate px-1">HOODIE</h3>
                        <div class="mt-3 overflow-hidden">
                            <span class="inline-flex items-center justify-center text-white bg-[#10b981] font-bold text-[10px] sm:text-[11px] uppercase tracking-[0.15em] rounded-full transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)] w-[100px] hover:w-[140px] h-[32px] hover:bg-[#059669] hover:shadow-[0_4px_15px_rgba(16,185,129,0.3)]">
                                Jelajahi
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Cargo -->
                <a href="{{ route('produk.index', ['kategori' => 'Cargo']) }}" class="group flex flex-col glass-card rounded-[2rem] overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(78,222,163,0.15)] hover:border-[#4edea3]/40 cursor-pointer">
                    <div class="aspect-[4/5] relative overflow-hidden bg-white/20">
                        <img class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 opacity-95 group-hover:opacity-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRLRIfKc5EgwBtOdpPQyFKHqnXPTtPT--ChRqNBdNwjYCpe7PAI1NpSlofC-fdS11gKFHtfUxxgzq8LV45qOrQKltpTep33ZkddCqWORJcrbMAC5ASABHzARNMT7RkZCEvMbsOPRbZJ6OJGJewf8KQMurIkFWxFGXcw4evw_qOiOlClP70YnogW-KmYlYgUNpwuyzISj2YqQ3nFUZrpQ3kpG1OSBeZgIPM8TwEk6ffWYBHdTgsrTfBkgzwfJR8VasxrCpZDEnHNbWL" alt="Cargo" loading="lazy" decoding="async"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1A2E26]/30 via-transparent to-transparent opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                    </div>
                    <div class="flex flex-col p-5 bg-white/30 text-center border-t border-white/40 relative items-center justify-center flex-1">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-[1px] bg-[#4edea3]/50"></div>
                        <h3 class="font-bold uppercase text-[12px] sm:text-[13px] tracking-[0.12em] text-[#0A1612] group-hover:text-[#10b981] transition-colors truncate px-1">CARGO</h3>
                        <div class="mt-3 overflow-hidden">
                            <span class="inline-flex items-center justify-center text-white bg-[#10b981] font-bold text-[10px] sm:text-[11px] uppercase tracking-[0.15em] rounded-full transition-all duration-400 ease-[cubic-bezier(0.4,0,0.2,1)] w-[100px] hover:w-[140px] h-[32px] hover:bg-[#059669] hover:shadow-[0_4px_15px_rgba(16,185,129,0.3)]">
                                Jelajahi
                            </span>
                        </div>
                    </div>
                </a>

            </div>
        </section>

        <!-- Produk Terlaris -->
        <section class="py-20 px-4 md:px-16 max-w-[1440px] mx-auto relative z-10">
            <div class="mb-12">
                <h2 class="font-display-lg text-3xl md:text-headline-md uppercase text-[#0A1612] tracking-tight">Produk Terlaris</h2>
                <p class="text-[#0A1612]/60 font-body-md mt-2">Dirancang dengan teliti, dibuat secara berkelanjutan.</p>
            </div>
            
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 gap-y-10">
                @foreach(\App\Models\Produk::limit(4)->get() as $p)
                    <div onclick="if(!event.target.closest('.card-action-btn')) window.location.href = '{{ route('produk.show', $p->id ?? $p->ID) }}'" class="group flex flex-col glass-card rounded-[2rem] overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(78,222,163,0.15)] hover:border-[#4edea3]/40 cursor-pointer">
                        <div class="aspect-[4/5] relative overflow-hidden bg-white/20">
                            <!-- Status Badge -->
                            @if($p->status_produk || $p->STATUS_PRODUK)
                                <div class="absolute top-3 left-3 z-20">
                                    <span class="bg-[#4edea3]/10 backdrop-blur-md text-[#10b981] text-[10px] font-bold px-3 py-1 rounded-full border border-[#4edea3]/25 tracking-widest uppercase">
                                        {{ $p->status_produk ?? $p->STATUS_PRODUK }}
                                    </span>
                                </div>
                            @endif
                            <!-- Wishlist Button -->
                            <button type="button" 
                                    onclick="event.preventDefault(); event.stopPropagation(); toggleWishlist({{ $p->id ?? $p->ID }}, this);" 
                                    class="absolute top-3 right-3 z-20 w-8 h-8 rounded-full bg-white/60 backdrop-blur-md flex items-center justify-center text-[#0A1612]/50 hover:text-red-500 hover:scale-110 transition-all duration-300 shadow-sm border border-white/80 card-action-btn wishlist-btn"
                                    data-id="{{ $p->id ?? $p->ID }}">
                                <span class="material-symbols-outlined text-[16px] sm:text-[18px] select-none transition-colors">favorite</span>
                            </button>
                            <img class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 opacity-95 group-hover:opacity-100" 
                                 src="{{ asset('images/' . ($p->foto ?? $p->FOTO)) }}" 
                                 alt="{{ $p->nama_produk ?? $p->NAMA_PRODUK }}" loading="lazy" decoding="async"/>
                            <div class="absolute inset-0 bg-gradient-to-t from-[#1A2E26]/30 via-transparent to-transparent opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                        </div>
                        <div class="flex flex-col p-5 bg-white/30 text-center border-t border-white/40 relative">
                            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-[1px] bg-[#4edea3]/50"></div>
                            <div class="flex justify-center items-center gap-0.5 mb-2">
                                @for($i = 0; $i < 5; $i++)
                                    <span class="material-symbols-outlined text-[14px] text-yellow-500" style="font-variation-settings: 'FILL' 1;">star</span>
                                @endfor
                                <span class="text-xs text-[#0A1612]/60 ml-1 font-body-md">(5.0)</span>
                            </div>
                            <h3 class="font-bold uppercase text-[12px] sm:text-[13px] tracking-[0.12em] text-[#0A1612] group-hover:text-[#10b981] transition-colors truncate px-1">{{ $p->nama_produk ?? $p->NAMA_PRODUK }}</h3>
                            <p class="text-[#10b981] font-black text-sm tracking-wider mt-2">Rp {{ number_format($p->harga ?? $p->HARGA, 0, ',', '.') }}</p>

                            <!-- Action Buttons -->
                            @php
                                $pUkuran = $p->ukuran ?? $p->UKURAN;
                                $defSize = !empty($pUkuran) ? trim(explode(',', $pUkuran)[0]) : 'All Size';
                            @endphp
                            <div class="flex items-center justify-between gap-3 mt-4 border-t border-black/5 pt-4">
                                <form action="{{ route('cart.add') }}" method="POST" class="card-action-btn">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{ $p->id ?? $p->ID }}">
                                    <input type="hidden" name="jumlah" value="1">
                                    <input type="hidden" name="ukuran_terpilih" value="{{ $defSize }}">
                                    <button type="submit" class="w-10 h-10 rounded-full bg-white/60 border border-black/10 flex items-center justify-center text-[#0A1612] hover:bg-[#10b981] hover:text-white hover:border-[#10b981] transition-all cursor-pointer shadow-sm active:scale-95" title="Tambah ke Keranjang">
                                        <span class="material-symbols-outlined text-[20px]">shopping_cart</span>
                                    </button>
                                </form>
                                <button type="button" 
                                        onclick="event.preventDefault(); event.stopPropagation(); window.location.href = '{{ url('/checkout/pembayaran') }}?produk_id={{ $p->id ?? $p->ID }}&jumlah=1&ukuran={{ $defSize }}'"
                                        class="flex-grow h-10 px-4 bg-[#10b981] hover:bg-[#059669] text-white rounded-full text-xs font-bold uppercase tracking-wider flex items-center justify-center gap-1.5 transition-all shadow-[0_2px_8px_rgba(16,185,129,0.2)] active:scale-95 cursor-pointer card-action-btn">
                                    <span class="material-symbols-outlined text-[18px]">flash_on</span>
                                    Beli
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Ulasan / Review Pengguna -->
        <section class="py-20 relative z-10 px-4 md:px-16 max-w-[1440px] mx-auto">
            <div class="text-center mb-16">
                <h2 class="font-display-lg text-3xl md:text-headline-md uppercase mb-2 text-[#0A1612] tracking-tight">Suara Kolektif</h2>
                <p class="text-[#0A1612]/60 font-body-md">Apa kata mereka tentang kualitas dan visi XDrew Fashion.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="p-8 glass-card rounded-2xl flex flex-col items-start gap-4 hover:-translate-y-2 transition-transform duration-300 emerald-glow">
                    <div class="flex text-[#10b981]">
                        @for($i = 0; $i < 5; $i++)
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        @endfor
                    </div>
                    <p class="text-[#0A1612]/80 font-body-md italic leading-relaxed">
                        "Kualitas hoodie-nya di luar ekspektasi. Bahannya tebal tapi adem, dan yang paling penting: eco-friendly. Desain Bang Fakih emang juara!"
                    </p>
                    <div class="mt-auto pt-6 border-t border-[#1A2E26]/10 w-full flex items-center justify-between">
                        <div>
                            <h4 class="font-bold text-[#0A1612] uppercase text-sm tracking-wide">Adrian S.</h4>
                            <p class="text-xs text-[#10b981] flex items-center gap-1 mt-1 font-semibold">
                                <span class="material-symbols-outlined text-[14px]">verified</span> Pembeli Terverifikasi
                            </p>
                        </div>
                        <span class="material-symbols-outlined text-[#10b981]/20 text-4xl">format_quote</span>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="p-8 glass-card rounded-2xl flex flex-col items-start gap-4 hover:-translate-y-2 transition-transform duration-300 emerald-glow">
                    <div class="flex text-[#10b981]">
                        @for($i = 0; $i < 5; $i++)
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        @endfor
                    </div>
                    <p class="text-[#0A1612]/80 font-body-md italic leading-relaxed">
                        "Akhirnya nemu brand lokal yang peduli lingkungan tanpa ngorbanin estetika streetwear. Celana cargo-nya punya fitting yang sempurna banget."
                    </p>
                    <div class="mt-auto pt-6 border-t border-[#1A2E26]/10 w-full flex items-center justify-between">
                        <div>
                            <h4 class="font-bold text-[#0A1612] uppercase text-sm tracking-wide">Bagas Pratama</h4>
                            <p class="text-xs text-[#10b981] flex items-center gap-1 mt-1 font-semibold">
                                <span class="material-symbols-outlined text-[14px]">verified</span> Pembeli Terverifikasi
                            </p>
                        </div>
                        <span class="material-symbols-outlined text-[#10b981]/20 text-4xl">format_quote</span>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="p-8 glass-card rounded-2xl flex flex-col items-start gap-4 hover:-translate-y-2 transition-transform duration-300 emerald-glow">
                    <div class="flex text-[#10b981]">
                        @for($i = 0; $i < 4; $i++)
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        @endfor
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star_half</span>
                    </div>
                    <p class="text-[#0A1612]/80 font-body-md italic leading-relaxed">
                        "Packaging-nya 100% bebas plastik, kaos organik-nya lembut banget di kulit. Bener-bener definisi 'Consciously Crafted' sesuai tagline-nya."
                    </p>
                    <div class="mt-auto pt-6 border-t border-[#1A2E26]/10 w-full flex items-center justify-between">
                        <div>
                            <h4 class="font-bold text-[#0A1612] uppercase text-sm tracking-wide">Dina M.</h4>
                            <p class="text-xs text-[#10b981] flex items-center gap-1 mt-1 font-semibold">
                                <span class="material-symbols-outlined text-[14px]">verified</span> Pembeli Terverifikasi
                            </p>
                        </div>
                        <span class="material-symbols-outlined text-[#10b981]/20 text-4xl">format_quote</span>
                    </div>
                </div>
            </div>
        </section>

    
@endsection


@push('styles')
<style>
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-smoothing: antialiased;
        }
        
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #F9FAFB;
        }
        ::-webkit-scrollbar-thumb {
            background: #CBE3D9;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #4edea3;
        }

        .glass-card {
            background: #ffffff !important;
            backdrop-filter: blur(24px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(24px) saturate(180%) !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
            border-top: 1px solid rgba(255, 255, 255, 1) !important;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.08),
                0 1px 3px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 1) !important;
        }

        .emerald-glow:hover {
            box-shadow: 0 15px 35px rgba(78, 222, 163, 0.15) !important;
            border-color: rgba(78, 222, 163, 0.3) !important;
        }

        @keyframes pulse-emerald {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        . {
            animation: pulse-emerald 3s infinite;
        }

        /* Grid Pattern */
        .bg-grid-pattern {
            background-image: 
                linear-gradient(rgba(78, 222, 163, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(78, 222, 163, 0.04) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* Typography */
        .text-outline-dark {
            -webkit-text-stroke: 1.5px #1A2E26;
            color: transparent;
        }


        /* Smooth Floating Keyframes */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }
        @keyframes float-reverse-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(8px) rotate(-1deg); }
        }
        [] {
            animation: float-slow 6s ease-in-out infinite;
        }
        [] {
            animation: float-reverse-slow 7s ease-in-out infinite;
        }
    </style>
@endpush


@push('scripts')
<script>
        // ===== NAVBAR SCROLL EFFECT =====
        const header = document.getElementById('site-header');

        function updateNavbar() {
            if (window.scrollY > 60) {
                // Blur & glass effect saat scroll
                header.style.background = 'rgba(234, 243, 239, 0.85)';
                header.style.backdropFilter = 'blur(24px)';
                header.style.webkitBackdropFilter = 'blur(24px)';
                header.style.borderBottom = '1px solid rgba(78, 222, 163, 0.08)';
                header.style.boxShadow = '0 10px 30px rgba(98, 124, 112, 0.04)';
            } else {
                header.style.background = 'transparent';
                header.style.backdropFilter = 'none';
                header.style.webkitBackdropFilter = 'none';
                header.style.borderBottom = 'none';
                header.style.boxShadow = 'none';
            }
        }

        updateNavbar();
        window.addEventListener('scroll', updateNavbar, { passive: true });

        // ===== SECTION REVEAL ANIMATION =====
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                }
            });
        }, { threshold: 0.05 });

        document.querySelectorAll('section').forEach(section => {
            section.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-10');
            observer.observe(section);
        });

        // ===== WISHLIST TOGGLE SYSTEM =====
        function toggleWishlist(productId, button) {
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            const index = wishlist.indexOf(productId);
            const icon = button.querySelector('span');
            
            if (index > -1) {
                // Remove from wishlist
                wishlist.splice(index, 1);
                icon.style.fontVariationSettings = "'FILL' 0";
                button.classList.remove('text-red-500');
                button.classList.add('text-[#0A1612]/50');
            } else {
                // Add to wishlist
                wishlist.push(productId);
                icon.style.fontVariationSettings = "'FILL' 1";
                button.classList.remove('text-[#0A1612]/50');
                button.classList.add('text-red-500');
            }
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
        }

        document.addEventListener('DOMContentLoaded', () => {
            const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            document.querySelectorAll('.wishlist-btn').forEach(button => {
                const productId = parseInt(button.getAttribute('data-id'));
                if (wishlist.includes(productId)) {
                    const icon = button.querySelector('span');
                    icon.style.fontVariationSettings = "'FILL' 1";
                    button.classList.remove('text-[#0A1612]/50');
                    button.classList.add('text-red-500');
                }
            });
        });
    </script>
@endpush
