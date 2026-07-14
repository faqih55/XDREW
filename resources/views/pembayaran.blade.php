<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pembayaran | XDrew Fashion</title>

    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container": "#f1f5f9",
                        "error-container": "#93000a",
                        "surface-container-highest": "#e2e8f0",
                        "tertiary-container": "#a855f7",
                        "surface-dim": "#F7F9F8",
                        "on-error": "#690005",
                        "inverse-surface": "#0A1612",
                        "on-surface": "#0A1612",
                        "on-primary": "#ffffff",
                        "background": "#F7F9F8",
                        "surface-tint": "#10b981",
                        "on-secondary-fixed-variant": "#00513b",
                        "on-secondary-container": "#87d2b2",
                        "on-tertiary": "#3b0764",
                        "tertiary-fixed": "#e9d5ff",
                        "outline-variant": "#cbd5e1",
                        "on-tertiary-fixed": "#2e1065",
                        "on-primary-container": "#00422b",
                        "error": "#ffb4ab",
                      "accent-purple": "#a855f7",
                        "on-primary-fixed-variant": "#005236",
                        "secondary": "#8bd6b6",
                        "primary-fixed": "#6ffbbe",
                        "tertiary": "#d8b4fe",
                        "surface-bright": "#ffffff",
                        "surface-container-low": "#ffffff",
                        "surface": "#F7F9F8",
                        "secondary-fixed": "#a6f2d1",
                        "on-secondary-fixed": "#002116",
                        "inverse-primary": "#006c49",
                        "surface-container-high": "#e2e8f0",
                        "on-surface-variant": "#0A1612",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-container": "#f3e8ff",
                        "inverse-on-surface": "#F7F9F8",
                        "primary-container": "#10b981",
                        "primary": "#10b981",
                        "on-secondary": "#003828",
                        "secondary-fixed-dim": "#8bd6b6",
                        "on-primary-fixed": "#002113",
                        "on-tertiary-fixed-variant": "#581c87",
                        "secondary-container": "#005c43",
                        "tertiary-fixed-dim": "#d8b4fe",
                        "on-error-container": "#ffdad6",
                        "on-background": "#0A1612",
                        "outline": "#94a3b8",
                        "primary-fixed-dim": "#10b981",
                        "surface-variant": "#f1f5f9"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    }
                },
            },
        }
    </script>

    <style>
        body {
            background-color: #F9FAFB;
            color: #1A2E26;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Outfit', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #F9FAFB;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #10b981;
        }

        @keyframes pulse-emerald {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
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

        .glass-card:hover {
            border-color: rgba(16, 185, 129, 0.4) !important;
            box-shadow: 0 20px 45px rgba(98, 124, 112, 0.2), inset 0 1px 3px rgba(255, 255, 255, 0.8) !important;
            transform: translateY(-1px);
        }

        input:focus,
        textarea:focus {
            outline: none;
            box-shadow: inset 0 0 0 1px #10b981;
            border-color: transparent !important;
        }

        /* Loading Animation */
        .btn-loading {
            opacity: 0.7;
            cursor: not-allowed;
            pointer-events: none;
        }

        .animate-spin-slow {
            animation: spin 1.5s linear infinite;
        }
    </style>
</head>

<body class="selection:bg-primary/30 selection:text-primary antialiased flex flex-col min-h-screen relative overflow-x-hidden">

        <!-- Background and Glows (Smooth Emerald & Violet Theme) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-30"></div>
        <div class="absolute left-[-10%] top-[20%] w-[500px] h-[500px] rounded-full bg-[#8b5cf6] blur-[160px] opacity-[0.15] "></div>
        <div class="absolute right-[-10%] top-[40%] w-[600px] h-[600px] rounded-full bg-[#4edea3] blur-[180px] opacity-[0.15]"></div>
        <div class="absolute left-[30%] bottom-[-10%] w-[400px] h-[400px] rounded-full bg-[#c4b5fd] blur-[150px] opacity-[0.15] " style="animation-delay: 1.5s;"></div>
    </div>

    <header class="fixed top-0 w-full z-50 bg-white/40 backdrop-blur-xl border-b border-white/60 transition-all duration-300 shadow-sm">
        @include('components.navbar')
    </header>

    <main class="relative z-10 flex-grow pt-[120px] pb-20 px-4 md:px-8 max-w-[1440px] mx-auto w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-start">

            <div class="lg:col-span-7 space-y-8">
                <div class="mb-10">
                    <h1 class="text-4xl md:text-5xl font-bold font-['Outfit'] text-on-surface mb-2 tracking-tighter">Pembayaran Aman</h1>
                    <p class="text-on-surface-variant font-['Poppins']">Konfirmasi detail Anda untuk menyelesaikan transaksi kemewahan berkelanjutan.</p>
                </div>

                <section class="glass-card p-6 md:p-8 rounded-xl" x-data="{ open: true }">
                    <div class="flex items-center justify-between cursor-pointer select-none" @click="open = !open">
                        <div class="flex items-center gap-3 text-primary">
                            <span class="material-symbols-outlined">local_shipping</span>
                            <h2 class="text-[20px] font-bold font-['Outfit'] text-on-surface tracking-wide">Informasi Pengiriman</h2>
                        </div>
                        <span class="material-symbols-outlined transition-transform duration-300" :class="open ? 'rotate-180' : ''">expand_more</span>
                    </div>

                    <div x-show="open" x-collapse class="mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-[12px] text-[#0A1612]/70 tracking-widest uppercase">Nama Lengkap</label>
                                <input id="nama" value="{{ Auth::guard('pelanggan')->user()->NAMA_LENGKAP ?? Auth::guard('pelanggan')->user()->nama_lengkap ?? '' }}" class="w-full bg-white/60 border border-white/60 rounded-lg p-3 text-[#0A1612] placeholder:text-gray-400 focus:outline-none focus:border-primary transition-all text-sm" placeholder="misal: Alex Drew" type="text" required />
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-[12px] text-[#0A1612]/70 tracking-widest uppercase">Nomor Telepon</label>
                                <input id="telepon" value="{{ Auth::guard('pelanggan')->user()->NOMOR_TELEPON ?? Auth::guard('pelanggan')->user()->nomor_telepon ?? '' }}" class="w-full bg-white/60 border border-white/60 rounded-lg p-3 text-[#0A1612] placeholder:text-gray-400 focus:outline-none focus:border-primary transition-all text-sm" placeholder="+62 8xx-xxxx-xxxx" type="tel" required />
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-[12px] text-[#0A1612]/70 tracking-widest uppercase">Provinsi</label>
                                <input id="provinsi" value="{{ Auth::guard('pelanggan')->user()->PROVINSI ?? Auth::guard('pelanggan')->user()->provinsi ?? '' }}" class="w-full bg-white/60 border border-white/60 rounded-lg p-3 text-[#0A1612] placeholder:text-gray-400 focus:outline-none focus:border-primary transition-all text-sm" placeholder="Contoh: DI Yogyakarta" type="text" required />
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-semibold text-[12px] text-[#0A1612]/70 tracking-widest uppercase">Kota / Kabupaten</label>
                                <input id="kota" value="{{ Auth::guard('pelanggan')->user()->KOTA ?? Auth::guard('pelanggan')->user()->kota ?? '' }}" class="w-full bg-white/60 border border-white/60 rounded-lg p-3 text-[#0A1612] placeholder:text-gray-400 focus:outline-none focus:border-primary transition-all text-sm" placeholder="Contoh: Sleman" type="text" required />
                            </div>
                            <div class="flex flex-col gap-1 md:col-span-2">
                                <label class="font-semibold text-[12px] text-[#0A1612]/70 tracking-widest uppercase">Alamat Lengkap</label>
                                <textarea id="alamat" class="w-full bg-white/60 border border-white/60 rounded-lg p-3 text-[#0A1612] placeholder:text-gray-400 focus:outline-none focus:border-primary transition-all resize-none text-sm" placeholder="Nama jalan, RT/RW, nomor rumah, detail patokan..." rows="3" required>{{ Auth::guard('pelanggan')->user()->ALAMAT ?? Auth::guard('pelanggan')->user()->alamat ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="glass-card p-6 md:p-8 rounded-xl" x-data="{ open: true }">
                    <div class="flex items-center justify-between cursor-pointer select-none" @click="open = !open">
                        <div class="flex items-center gap-3 text-primary">
                            <span class="material-symbols-outlined">inventory_2</span>
                            <h2 class="text-[20px] font-bold font-['Outfit'] text-on-surface tracking-wide">Pilihan Kurir</h2>
                        </div>
                        <span class="material-symbols-outlined transition-transform duration-300" :class="open ? 'rotate-180' : ''">expand_more</span>
                    </div>

                    <div x-show="open" x-collapse class="mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="relative">
                                <input checked class="hidden peer" id="jne" name="kurir" value="JNE" type="radio" />
                                <label class="flex flex-col items-center justify-center p-4 border border-black/10 bg-white/60 rounded-lg cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5" for="jne">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/92/New_Logo_JNE.png" alt="JNE" class="h-6 object-contain mb-2">
                                    <span class="font-['Outfit'] font-bold text-on-surface text-lg">JNE</span>
                                    <span class="text-[12px] text-[#0A1612]/70 mt-1">Express (2-3 Hari)</span>
                                </label>
                            </div>
                            <div class="relative">
                                <input class="hidden peer" id="pos" name="kurir" value="POS" type="radio" />
                                <label class="flex flex-col items-center justify-center p-4 border border-black/10 bg-white/60 rounded-lg cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5" for="pos">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/47/POSIND_2023_%28with_wordmark%29.svg" alt="POS Indonesia" class="h-6 object-contain mb-2">
                                    <span class="font-['Outfit'] font-bold text-on-surface text-lg">POS</span>
                                    <span class="text-[12px] text-[#0A1612]/70 mt-1">Reguler (4-7 Hari)</span>
                                </label>
                            </div>
                            <div class="relative">
                                <input class="hidden peer" id="jnt" name="kurir" value="JNT" type="radio" />
                                <label class="flex flex-col items-center justify-center p-4 border border-black/10 bg-white/60 rounded-lg cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5" for="jnt">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/0/01/J%26T_Express_logo.svg" alt="J&T Express" class="h-6 object-contain mb-2">
                                    <span class="font-['Outfit'] font-bold text-on-surface text-lg">J&T</span>
                                    <span class="text-[12px] text-[#0A1612]/70 mt-1">Eco (3-5 Hari)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="glass-card p-6 md:p-8 rounded-xl" x-data="{ open: true }">
                    <div class="flex items-center justify-between cursor-pointer select-none" @click="open = !open">
                        <div class="flex items-center gap-3 text-primary">
                            <span class="material-symbols-outlined">payments</span>
                            <h2 class="text-[20px] font-bold font-['Outfit'] text-on-surface tracking-wide">Metode Pembayaran</h2>
                        </div>
                        <span class="material-symbols-outlined transition-transform duration-300" :class="open ? 'rotate-180' : ''">expand_more</span>
                    </div>

                    <div x-show="open" x-collapse class="mt-6">
                        <div class="space-y-4">
                            <!-- Bank Transfer Options -->
                            <div class="text-[11px] font-bold text-[#0A1612]/60 mt-2 mb-3 uppercase tracking-[0.15em]">Transfer Bank (Virtual Account)</div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
                                <div class="relative">
                                    <input checked class="hidden peer" id="bca" name="metode_pembayaran" value="Bank BCA" type="radio" />
                                    <label class="flex items-center justify-between p-4 border border-black/10 bg-white/60 rounded-xl cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5 h-full" for="bca">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-7 flex items-center justify-center bg-white rounded p-1 shrink-0 shadow-sm border border-black/5">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="BCA" class="w-full h-full object-contain">
                                            </div>
                                            <div>
                                                <div class="font-bold text-sm text-[#0A1612]">Bank BCA</div>
                                            </div>
                                        </div>
                                        <span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100 transition-opacity text-[18px]">check_circle</span>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input class="hidden peer" id="mandiri" name="metode_pembayaran" value="Bank Mandiri" type="radio" />
                                    <label class="flex items-center justify-between p-4 border border-black/10 bg-white/60 rounded-xl cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5 h-full" for="mandiri">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-7 flex items-center justify-center bg-white rounded p-1 shrink-0 shadow-sm border border-black/5">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg" alt="Mandiri" class="w-full h-full object-contain">
                                            </div>
                                            <div>
                                                <div class="font-bold text-sm text-[#0A1612]">Bank Mandiri</div>
                                            </div>
                                        </div>
                                        <span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100 transition-opacity text-[18px]">check_circle</span>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input class="hidden peer" id="bni" name="metode_pembayaran" value="Bank BNI" type="radio" />
                                    <label class="flex items-center justify-between p-4 border border-black/10 bg-white/60 rounded-xl cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5 h-full" for="bni">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-7 flex items-center justify-center bg-white rounded p-1 shrink-0 shadow-sm border border-black/5">
                                                <img src="https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg" alt="BNI" class="w-full h-full object-contain">
                                            </div>
                                            <div>
                                                <div class="font-bold text-sm text-[#0A1612]">Bank BNI</div>
                                            </div>
                                        </div>
                                        <span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100 transition-opacity text-[18px]">check_circle</span>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input class="hidden peer" id="bri" name="metode_pembayaran" value="Bank BRI" type="radio" />
                                    <label class="flex items-center justify-between p-4 border border-black/10 bg-white/60 rounded-xl cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5 h-full" for="bri">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-7 flex items-center justify-center bg-white rounded p-1 shrink-0 shadow-sm border border-black/5">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg" alt="BRI" class="w-full h-full object-contain">
                                            </div>
                                            <div>
                                                <div class="font-bold text-sm text-[#0A1612]">Bank BRI</div>
                                            </div>
                                        </div>
                                        <span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100 transition-opacity text-[18px]">check_circle</span>
                                    </label>
                                </div>
                            </div>

                            <!-- E-Wallet Options -->
                            <div class="text-[11px] font-bold text-[#0A1612]/60 mt-2 mb-3 uppercase tracking-[0.15em]">Dompet Digital (E-Wallet)</div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
                                <div class="relative">
                                    <input class="hidden peer" id="gopay" name="metode_pembayaran" value="GoPay" type="radio" />
                                    <label class="flex items-center justify-between p-4 border border-black/10 bg-white/60 rounded-xl cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5 h-full" for="gopay">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-7 flex items-center justify-center bg-white rounded p-1 shrink-0 shadow-sm border border-black/5">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" alt="GoPay" class="w-full h-full object-contain">
                                            </div>
                                            <div>
                                                <div class="font-bold text-sm text-[#0A1612]">GoPay</div>
                                            </div>
                                        </div>
                                        <span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100 transition-opacity text-[18px]">check_circle</span>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input class="hidden peer" id="ovo" name="metode_pembayaran" value="OVO" type="radio" />
                                    <label class="flex items-center justify-between p-4 border border-black/10 bg-white/60 rounded-xl cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5 h-full" for="ovo">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-7 flex items-center justify-center bg-white rounded p-1 shrink-0 shadow-sm border border-black/5">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_ovo_purple.svg" alt="OVO" class="w-full h-full object-contain">
                                            </div>
                                            <div>
                                                <div class="font-bold text-sm text-[#0A1612]">OVO</div>
                                            </div>
                                        </div>
                                        <span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100 transition-opacity text-[18px]">check_circle</span>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input class="hidden peer" id="dana" name="metode_pembayaran" value="DANA" type="radio" />
                                    <label class="flex items-center justify-between p-4 border border-black/10 bg-white/60 rounded-xl cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5 h-full" for="dana">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-7 flex items-center justify-center bg-white rounded p-1 shrink-0 shadow-sm border border-black/5">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" alt="DANA" class="w-full h-full object-contain">
                                            </div>
                                            <div>
                                                <div class="font-bold text-sm text-[#0A1612]">DANA</div>
                                            </div>
                                        </div>
                                        <span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100 transition-opacity text-[18px]">check_circle</span>
                                    </label>
                                </div>
                                <div class="relative">
                                    <input class="hidden peer" id="shopeepay" name="metode_pembayaran" value="ShopeePay" type="radio" />
                                    <label class="flex items-center justify-between p-4 border border-black/10 bg-white/60 rounded-xl cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5 h-full" for="shopeepay">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-7 flex items-center justify-center bg-white rounded p-1 shrink-0 shadow-sm border border-black/5">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fe/Shopee.svg" alt="ShopeePay" class="w-full h-full object-contain">
                                            </div>
                                            <div>
                                                <div class="font-bold text-sm text-[#0A1612]">ShopeePay</div>
                                            </div>
                                        </div>
                                        <span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100 transition-opacity text-[18px]">check_circle</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Lainnya -->
                            <div class="text-[11px] font-bold text-[#0A1612]/60 mt-2 mb-3 uppercase tracking-[0.15em]">Lainnya</div>
                            <div class="grid grid-cols-1 gap-3">
                                <div class="relative">
                                    <input class="hidden peer" id="cod" name="metode_pembayaran" value="COD" type="radio" />
                                    <label class="flex items-center justify-between p-4 border border-black/10 bg-white/60 rounded-xl cursor-pointer hover:border-black/30 transition-all peer-checked:border-primary peer-checked:bg-primary/5 h-full" for="cod">
                                        <div class="flex items-center gap-3">
                                            <span class="material-symbols-outlined text-primary text-[20px]">local_shipping</span>
                                            <div>
                                                <div class="font-bold text-sm text-[#0A1612]">Bayar di Tempat (COD)</div>
                                            </div>
                                        </div>
                                        <span class="material-symbols-outlined text-primary opacity-0 peer-checked:opacity-100 transition-opacity text-[18px]">check_circle</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="pt-6">
                    <button id="btn-submit" onclick="prosesPembayaran()" class="w-full py-4 bg-primary text-on-primary font-bold rounded-lg hover:bg-primary/90 transition-transform active:scale-95 shadow-lg flex items-center justify-center gap-2">
                        <span id="btn-text">Pesan</span>
                        <span id="btn-spinner" class="hidden material-symbols-outlined animate-spin-slow">sync</span>
                        <span class="material-symbols-outlined">lock</span>
                    </button>
                    <p class="text-center text-[12px] text-on-surface-variant mt-4">Data Anda terenkripsi secara aman.</p>
                </div>
            </div>

            <aside class="lg:col-span-5">
                <div class="lg:sticky lg:top-32 space-y-6">
                    <div class="glass-card p-6 md:p-8 rounded-xl">
                        <h2 class="text-xl font-bold font-['Outfit'] text-on-surface mb-6">Ringkasan Pesanan</h2>

                        <div id="produk-list" class="space-y-4 mb-6 max-h-[350px] overflow-y-auto pr-2">

                            @php $subtotalCart = 0; @endphp

                            @if(session('cart') && count(session('cart')) > 0)
                            @foreach(session('cart') as $id => $details)
                            @php
                            $harga = $details['harga'] ?? $details['HARGA'] ?? 0;
                            $jumlah = $details['jumlah'] ?? $details['KUANTITAS'] ?? 1;
                            $nama_produk = $details['nama_produk'] ?? $details['NAMA_PRODUK'] ?? 'Produk XDrew';
                            $foto = $details['foto'] ?? $details['FOTO'] ?? 'default.jpg';
                            $subtotalCart += $harga * $jumlah;
                            @endphp

                            <div class="flex gap-4 pb-4 border-b border-black/5 last:border-0 cart-item-blade">
                                <div class="w-20 h-24 bg-white/60 border border-white/60 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('images/' . $foto) }}" alt="Produk" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" onerror="this.src='https://via.placeholder.com/150'" />
                                </div>
                                <div class="flex-grow flex flex-col justify-center">
                                    <div class="font-semibold text-[#0A1612]">{{ $nama_produk }}</div>
                                    <div class="text-[12px] text-[#0A1612]/70 mt-1">Ukuran: {{ $details['ukuran'] ?? 'Semua Ukuran' }} | Jumlah: {{ $jumlah }}x</div>
                                    <div class="text-primary mt-2 font-bold drop-shadow-sm">Rp {{ number_format($harga * $jumlah, 0, ',', '.') }}</div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div id="loading-state">
                                <div class="animate-pulse flex gap-4">
                                    <div class="w-20 h-24 bg-black/5 rounded-lg"></div>
                                    <div class="flex-1 py-2 space-y-3">
                                        <div class="h-4 bg-black/5 rounded w-3/4"></div>
                                        <div class="h-3 bg-black/5 rounded w-1/2"></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Voucher & Diskon Section -->
                        <div class="border-t border-black/5 pt-6 mb-6">
                            <h3 class="text-sm font-bold font-['Outfit'] text-[#0A1612] mb-3 tracking-wider uppercase">Voucher & Diskon</h3>

                            <!-- Input Code -->
                            <div class="flex gap-2 mb-4">
                                <input type="text" id="voucher-code" class="flex-grow bg-white/60 border border-white/60 rounded-lg p-2.5 text-[#0A1612] placeholder:text-gray-400 focus:outline-none focus:border-primary text-sm uppercase" placeholder="Masukkan kode voucher">
                                <button type="button" onclick="applyVoucherCode()" class="px-4 py-2.5 bg-primary/20 text-primary border border-primary/30 font-bold rounded-lg hover:bg-primary/30 transition-all text-sm active:scale-95">Terapkan</button>
                            </div>

                            <!-- Pilihan Diskon List -->
                            <div class="space-y-2">
                                <label class="block text-[11px] font-semibold text-[#0A1612]/70 tracking-wider uppercase mb-1">Pilih Diskon yang Tersedia</label>
                                <div class="grid grid-cols-1 gap-2">
                                    <div onclick="selectVoucher('DISKON10')" id="voucher-opt-DISKON10" class="flex items-center justify-between p-3 border border-black/10 rounded-lg cursor-pointer hover:border-primary/50 bg-white/60 transition-all group">
                                        <div class="flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary text-[18px]">sell</span>
                                            <div>
                                                <div class="text-xs font-bold text-[#0A1612] group-hover:text-primary transition-colors">DISKON10</div>
                                                <div class="text-[10px] text-[#0A1612]/70">Diskon 10% untuk semua produk</div>
                                            </div>
                                        </div>
                                        <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-0.5 rounded border border-primary/20">-10%</span>
                                    </div>
                                    <div onclick="selectVoucher('HEMAT20')" id="voucher-opt-HEMAT20" class="flex items-center justify-between p-3 border border-black/10 rounded-lg cursor-pointer hover:border-primary/50 bg-white/60 transition-all group">
                                        <div class="flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary text-[18px]">sell</span>
                                            <div>
                                                <div class="text-xs font-bold text-[#0A1612] group-hover:text-primary transition-colors">HEMAT20</div>
                                                <div class="text-[10px] text-[#0A1612]/70">Potongan langsung Rp 20.000</div>
                                            </div>
                                        </div>
                                        <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-0.5 rounded border border-primary/20">-Rp 20rb</span>
                                    </div>
                                    <div onclick="selectVoucher('FREEONGKIR')" id="voucher-opt-FREEONGKIR" class="flex items-center justify-between p-3 border border-black/10 rounded-lg cursor-pointer hover:border-primary/50 bg-white/60 transition-all group">
                                        <div class="flex items-center gap-2">
                                            <span class="material-symbols-outlined text-primary text-[18px]">local_shipping</span>
                                            <div>
                                                <div class="text-xs font-bold text-[#0A1612] group-hover:text-primary transition-colors">FREEONGKIR</div>
                                                <div class="text-[10px] text-[#0A1612]/70">Gratis biaya pengiriman</div>
                                            </div>
                                        </div>
                                        <span class="text-xs font-bold text-primary bg-primary/10 px-2 py-0.5 rounded border border-primary/20">Gratis</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Voucher Feedback Message -->
                            <div id="voucher-message" class="hidden mt-3 text-xs p-2.5 rounded-lg border"></div>
                        </div>

                        <div class="border-t border-black/5 pt-6 space-y-3">
                            <div class="flex justify-between">
                                <span class="text-[#0A1612]/70">Subtotal</span>
                                <span id="subtotal" class="text-[#0A1612] font-bold">Rp 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-[#0A1612]/70">Pengiriman Ramah Lingkungan</span>
                                <span id="ongkir" class="text-[#0A1612] font-bold">Rp 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-[#0A1612]/70">Biaya Admin</span>
                                <span id="biaya-admin" class="text-[#0A1612] font-bold">Rp 2.000</span>
                            </div>

                            <!-- Diskon Row -->
                            <div id="diskon-row" class="hidden flex justify-between text-red-500 font-bold">
                                <span>Potongan Voucher (<span id="voucher-active-name"></span>)</span>
                                <span id="diskon-amount">-Rp 0</span>
                            </div>

                            <div class="flex justify-between pt-4 mt-2 border-t border-black/5 font-['Outfit'] font-bold text-xl">
                                <span class="text-[#0A1612]">Total</span>
                                <span id="total" class="text-primary drop-shadow-sm">Rp 0</span>
                            </div>
                        </div>
                    </div>

                    <!-- Eco Badge -->
                    <div class="p-4 border border-primary/20 bg-primary/5 rounded-lg flex items-start gap-3">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">eco</span>
                        <div>
                            <div class="text-[12px] font-semibold tracking-wider text-primary mb-1">KOMITMEN BERKELANJUTAN</div>
                            <p class="text-[11px] text-on-surface-variant leading-tight">Setiap pembelian menanam 5 pohon dan menggunakan kemasan 100% yang dapat terurai secara hayati. Terima kasih telah memilih busana etis.</p>
                        </div>
                    </div>

                    <!-- Trust Signals -->
                    <div class="flex justify-around items-center opacity-50 py-4">
                        <span class="material-symbols-outlined text-[36px]">verified_user</span>
                        <span class="material-symbols-outlined text-[36px]">high_quality</span>
                        <span class="material-symbols-outlined text-[36px]">support_agent</span>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    @include('components.footer')

    <script>
        // 1. Inisialisasi Konstanta Pembayaran
        let HARGA_ONGKIR = 50000;
        const BIAYA_ADMIN = 2000;
        let totalPembayaran = 0;
        let windowSubtotal = 0;

        // 2. Deteksi apakah ada keranjang
        const isCartExist = {{ (session('cart') && count(session('cart')) > 0) ? 'true' : 'false' }};
        const subtotalDariCart = {{ $subtotalCart ?? 0 }};

        // 3. Tangkap URL Parameters dari tombol "Beli Langsung"
        const queryParams = new URLSearchParams(window.location.search);
        const produkId = queryParams.get('produk_id');
        const jumlah = queryParams.get('jumlah') || 1;
        const ukuran = queryParams.get('ukuran') || 'All Size';
        const isBeliLangsung = produkId !== null;

        // Event listener untuk Pilihan Kurir
        document.querySelectorAll('input[name="kurir"]').forEach(radio => {
            radio.addEventListener('change', (e) => {
                if (e.target.value === 'JNE') HARGA_ONGKIR = 50000;
                else if (e.target.value === 'POS') HARGA_ONGKIR = 30000;
                else if (e.target.value === 'JNT') HARGA_ONGKIR = 40000;
                hitungTotal(windowSubtotal);
            });
        });

        async function loadProdukDetail() {
            if (isBeliLangsung) {
                // Skenario: Beli Langsung (Abaikan keranjang yang sedang di-render Blade)

                // Hapus list keranjang yang di-render oleh Blade (jika ada)
                document.querySelectorAll('.cart-item-blade').forEach(el => el.remove());

                try {
                    // Pastikan Anda memiliki Route::get('/api/produk/{id}') di routes/web.php atau routes/api.php
                    const response = await fetch(`/api/produk/${produkId}`);
                    if (!response.ok) throw new Error('API Produk gagal dipanggil');
                    const produk = await response.json();

                    const hargaSatuan = produk.harga ?? produk.HARGA ?? 0;
                    displayProdukJS(produk, jumlah, ukuran, hargaSatuan);
                    hitungTotal(hargaSatuan * jumlah);
                } catch (error) {
                    console.error('Error fetching product:', error);
                    document.getElementById('produk-list').innerHTML = `
                        <div class="p-4 border border-red-500/50 bg-red-500/10 rounded-xl text-center">
                            <span class="material-symbols-outlined text-red-400 mb-2 text-3xl">error</span>
                            <p class="text-gray-300 text-sm">Gagal memuat detail produk. (Pastikan endpoint /api/produk/{id} tersedia).</p>
                        </div>
                    `;
                    hitungTotal(0);
                }
            } else if (isCartExist) {
                // Skenario: Checkout Keranjang Normal
                document.getElementById('loading-state')?.remove();
                hitungTotal(subtotalDariCart);
            } else {
                // Skenario: Kosong Sama Sekali
                document.getElementById('produk-list').innerHTML = '<p class="text-gray-400 text-sm italic border border-dashed border-gray-600 p-4 rounded-xl text-center">Keranjang belanja Anda kosong.</p>';
                hitungTotal(0);
            }
        }

        // Fungsi khusus untuk me-render produk satuan via JS //
        function displayProdukJS(produk, qty, size, hargaSatuan) {
            document.getElementById('loading-state')?.remove();

            const namaProduk = produk.nama_produk || produk.NAMA_PRODUK || 'Produk XDrew';
            const foto = produk.foto || produk.FOTO || 'default.jpg';

            const htmlProduk = `
                <div class="flex gap-4 pb-4 border-b border-black/5 last:border-0 cart-item-blade">
                    <div class="w-20 h-24 bg-white/60 border border-white/60 rounded-lg overflow-hidden flex-shrink-0">
                        <img src="/images/${foto}" alt="Produk" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-500" onerror="this.src='https://via.placeholder.com/150'"/>
                    </div>
                    <div class="flex-grow flex flex-col justify-center">
                        <div class="font-semibold text-[#0A1612]">${namaProduk}</div>
                        <div class="text-[12px] text-[#0A1612]/70 mt-1">Ukuran: ${size} | Jumlah: ${qty}x</div>
                        <div class="text-primary mt-2 font-bold drop-shadow-sm">Rp ${formatRupiah(hargaSatuan * qty)}</div>
                    </div>
                </div>
            `;
            document.getElementById('produk-list').innerHTML = htmlProduk;
        }

        // Helper untuk memformat ke Rupiah
        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value).replace('Rp', '').trim();
        }

        let activeVoucher = null;

        function selectVoucher(code) {
            // Reset active voucher selection styling
            document.querySelectorAll('[id^="voucher-opt-"]').forEach(el => {
                el.classList.remove('border-primary', 'bg-primary/5');
                el.classList.add('border-black/10', 'bg-white/60');
            });

            if (activeVoucher === code) {
                // Toggle off
                activeVoucher = null;
                document.getElementById('voucher-code').value = '';
                showVoucherMessage('', 'success', false);
            } else {
                // Toggle on
                activeVoucher = code;
                const activeEl = document.getElementById('voucher-opt-' + code);
                if (activeEl) {
                    activeEl.classList.remove('border-black/10', 'bg-white/60');
                    activeEl.classList.add('border-primary', 'bg-primary/5');
                }
                document.getElementById('voucher-code').value = code;
                showVoucherMessage(`Voucher <strong>${code}</strong> berhasil diterapkan!`, 'success');
            }
            hitungTotal(windowSubtotal);
        }

        function applyVoucherCode() {
            const codeInput = document.getElementById('voucher-code').value.trim().toUpperCase();
            if (!codeInput) {
                showVoucherMessage('Silakan masukkan kode voucher terlebih dahulu.', 'error');
                return;
            }

            const validCodes = ['DISKON10', 'HEMAT20', 'FREEONGKIR'];
            if (validCodes.includes(codeInput)) {
                // Highlight the selection option in the list
                selectVoucher(codeInput);
            } else {
                showVoucherMessage('Kode voucher tidak valid.', 'error');
                // Reset active voucher
                activeVoucher = null;
                document.querySelectorAll('[id^="voucher-opt-"]').forEach(el => {
                    el.classList.remove('border-primary', 'bg-primary/5');
                    el.classList.add('border-black/10', 'bg-white/60');
                });
                hitungTotal(windowSubtotal);
            }
        }

        function showVoucherMessage(msg, type, show = true) {
            const el = document.getElementById('voucher-message');
            if (!show || !msg) {
                el.classList.add('hidden');
                return;
            }
            el.innerHTML = msg;
            el.classList.remove('hidden');
            if (type === 'success') {
                el.className = 'mt-3 text-xs p-2.5 rounded-lg border border-primary/20 bg-primary/5 text-primary';
            } else {
                el.className = 'mt-3 text-xs p-2.5 rounded-lg border border-red-500/20 bg-red-500/5 text-red-400';
            }
        }

        function hitungTotal(subtotal) {
            if (subtotal === 0) return;
            windowSubtotal = subtotal;

            // Hitung Ongkir
            let currentOngkir = HARGA_ONGKIR;
            let currentAdmin = BIAYA_ADMIN;
            let discountAmount = 0;

            if (activeVoucher === 'DISKON10') {
                discountAmount = Math.round(subtotal * 0.1);
            } else if (activeVoucher === 'HEMAT20') {
                discountAmount = 20000;
            } else if (activeVoucher === 'FREEONGKIR') {
                currentOngkir = 0;
            }

            const total = subtotal + currentOngkir + currentAdmin - discountAmount;

            document.getElementById('subtotal').textContent = 'Rp ' + formatRupiah(subtotal);
            document.getElementById('ongkir').textContent = 'Rp ' + formatRupiah(currentOngkir);
            document.getElementById('biaya-admin').textContent = 'Rp ' + formatRupiah(currentAdmin);

            // Update Diskon Row
            const diskonRow = document.getElementById('diskon-row');
            if (discountAmount > 0) {
                diskonRow.classList.remove('hidden');
                document.getElementById('voucher-active-name').textContent = activeVoucher;
                document.getElementById('diskon-amount').textContent = '-Rp ' + formatRupiah(discountAmount);
            } else if (activeVoucher === 'FREEONGKIR') {
                diskonRow.classList.remove('hidden');
                document.getElementById('voucher-active-name').textContent = activeVoucher;
                document.getElementById('diskon-amount').textContent = 'Gratis Ongkir';
            } else {
                diskonRow.classList.add('hidden');
            }

            document.getElementById('total').textContent = 'Rp ' + formatRupiah(total);

            window.totalPembayaran = total;
        }

        function prosesPembayaran() {
            const metodeChecked = document.querySelector('input[name="metode_pembayaran"]:checked');
            const metode = metodeChecked ? metodeChecked.value : '';

            const nama = document.getElementById('nama').value;
            const telepon = document.getElementById('telepon').value;
            const provinsi = document.getElementById('provinsi').value;
            const kota = document.getElementById('kota').value;
            const alamat = document.getElementById('alamat').value;

            if (!nama || !telepon || !provinsi || !kota || !alamat) {
                alert('Mohon isi formulir Alamat Pengiriman dengan lengkap.');
                return;
            }

            if (!metode) {
                alert('Mohon pilih penyedia metode pembayaran (Bank/E-Wallet).');
                return;
            }

            const btnSubmit = document.getElementById('btn-submit');
            const btnText = document.getElementById('btn-text');
            const btnSpinner = document.getElementById('btn-spinner');

            btnSubmit.classList.add('btn-loading');
            btnText.textContent = 'Memproses...';
            btnSpinner.classList.remove('hidden');

            const formData = new FormData();
            formData.append('metode_pembayaran', metode);
            formData.append('nama_penerima', nama);
            formData.append('nomor_telepon', telepon);
            formData.append('provinsi', provinsi);
            formData.append('kota', kota);
            formData.append('alamat_lengkap', alamat);
            formData.append('total_pembayaran', window.totalPembayaran);

            // Kirim ID produk khusus jika ini mode "Beli Langsung" //
            if (isBeliLangsung) {
                formData.append('produk_id', produkId);
                formData.append('jumlah', jumlah);
                formData.append('ukuran', ukuran);
                formData.append('is_beli_langsung', 'true');
            }

            // Kirim Data ke Controller
            fetch('{{ route("checkout.process") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = data.redirect || '{{ route("home") }}';
                    } else {
                        alert(data.message || 'Terjadi kesalahan saat memproses pesanan.');
                        resetButton();
                    }
                })
                .catch(error => {
                    console.error('Error Server/DB Oracle:', error);
                    alert('Gagal memproses pembayaran ke database. Cek koneksi atau relasi tabel.');
                    resetButton();
                });

            function resetButton() {
                btnSubmit.classList.remove('btn-loading');
                btnText.textContent = 'Pesan Sekarang';
                btnSpinner.classList.add('hidden');
            }
        }

        // Jalankan fungsi load produk saat halaman siap //
        document.addEventListener('DOMContentLoaded', loadProdukDetail);
    </script>
</body>

</html>