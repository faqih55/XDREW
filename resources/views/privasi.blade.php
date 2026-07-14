<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Kebijakan Privasi | XDrew Fashion</title>
    <meta name="description" content="Kebijakan Privasi XDrew Fashion – bagaimana kami mengumpulkan, menggunakan, dan melindungi data pribadi Anda."/>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: { extend: {
            colors: {
              "primary": "#4edea3", "on-primary": "#003824",
              "surface": "#DDF0E6", "surface-container": "#F9FAFB",
              "on-surface": "#0A1612", "outline": "#86948a",
            },
            fontFamily: {
              "body-md": ["Poppins","sans-serif"],
              "display-lg": ["Outfit","sans-serif"],
            }
          }}
        }
    </script>

    <style>
        .material-symbols-outlined { font-family:'Material Symbols Outlined';font-weight:normal;font-style:normal;font-size:24px;line-height:1;letter-spacing:normal;text-transform:none;display:inline-block;white-space:nowrap;direction:ltr;-webkit-font-smoothing:antialiased; }
        ::-webkit-scrollbar{width:8px}::-webkit-scrollbar-track{background:#F9FAFB}::-webkit-scrollbar-thumb{background:#CBE3D9;border-radius:4px}::-webkit-scrollbar-thumb:hover{background:#4edea3}
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
        .bg-grid-pattern{background-image:linear-gradient(rgba(78,222,163,0.04) 1px,transparent 1px),linear-gradient(90deg,rgba(78,222,163,0.04) 1px,transparent 1px);background-size:50px 50px;}
        .scroll-reveal{opacity:0;transform:translateY(24px);transition:all 0.7s cubic-bezier(0.16,1,0.3,1);}
        .scroll-reveal.is-visible{opacity:1;transform:translateY(0);}
        .policy-section h2{font-family:'Outfit',sans-serif;font-weight:700;font-size:1.25rem;color:#0A1612;margin-bottom:.75rem;margin-top:2rem;display:flex;align-items:center;gap:.5rem;}
        .policy-section p{color:#0A1612cc;line-height:1.8;margin-bottom:1rem;font-size:.9375rem;}
        .policy-section ul{list-style:none;padding:0;margin-bottom:1rem;}
        .policy-section ul li{color:#0A1612cc;padding:.35rem 0 .35rem 1.5rem;position:relative;line-height:1.7;font-size:.9375rem;}
        .policy-section ul li::before{content:'';position:absolute;left:0;top:.7rem;width:8px;height:8px;border-radius:50%;background:#4edea3;}
    </style>
</head>
<body class="bg-[#F9FAFB] text-[#0A1612] font-body-md antialiased relative overflow-x-hidden" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 100)">

    <!-- Background -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-40"></div>
        <div class="absolute left-[-10%] top-[10%] w-[500px] h-[500px] rounded-full bg-[#6ffbbe] blur-[150px] opacity-25"></div>
        <div class="absolute right-[-10%] bottom-[20%] w-[400px] h-[400px] rounded-full bg-[#4edea3] blur-[150px] opacity-20"></div>
    </div>

    <!-- Navbar -->
    <div class="relative z-50">
        @include('components.navbar')
    </div>

    <main class="pt-28 pb-24 opacity-0 transition-opacity duration-700 ease-out relative z-10" :class="loaded ? 'opacity-100' : ''">
        <div class="max-w-4xl mx-auto px-6 md:px-10">

            <!-- Hero -->
            <div class="mb-14 scroll-reveal">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-2.5 h-2.5 bg-primary rounded-full shadow-[0_0_10px_#4edea3]"></span>
                    <span class="text-[11px] font-semibold text-primary tracking-[0.2em] uppercase">Dukungan</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-[#0A1612] uppercase mb-4">
                    Kebijakan <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-[#2a855f]">Privasi</span>
                </h1>
                <p class="text-[#0A1612]/60 text-sm">Terakhir diperbarui: <strong>1 Juli 2025</strong></p>
            </div>

            <!-- Card Konten -->
            <div class="glass-card rounded-3xl p-8 md:p-12 scroll-reveal policy-section">

                <p>Selamat datang di <strong>XDrew Fashion</strong>. Kami berkomitmen untuk melindungi informasi pribadi Anda dan hak privasi Anda. Kebijakan ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan menjaga keamanan data Anda saat menggunakan layanan kami.</p>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">database</span> 1. Informasi yang Kami Kumpulkan</h2>
                <p>Kami dapat mengumpulkan informasi berikut saat Anda menggunakan platform kami:</p>
                <ul>
                    <li>Nama lengkap, alamat email, dan nomor telepon yang Anda berikan saat mendaftar.</li>
                    <li>Alamat pengiriman dan informasi pembayaran (diproses secara aman oleh penyedia pembayaran kami).</li>
                    <li>Riwayat pembelian dan interaksi dengan produk kami.</li>
                    <li>Data teknis seperti alamat IP, jenis browser, dan halaman yang dikunjungi.</li>
                </ul>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">settings_suggest</span> 2. Bagaimana Kami Menggunakan Informasi Anda</h2>
                <p>Informasi yang kami kumpulkan digunakan untuk tujuan-tujuan berikut:</p>
                <ul>
                    <li>Memproses dan mengantarkan pesanan Anda.</li>
                    <li>Mengirimkan pembaruan status pesanan dan notifikasi penting.</li>
                    <li>Meningkatkan pengalaman belanja dan layanan platform kami.</li>
                    <li>Mencegah aktivitas penipuan dan menjaga keamanan platform.</li>
                    <li>Mengirimkan penawaran promosi (hanya jika Anda menyetujuinya).</li>
                </ul>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">share</span> 3. Berbagi Data dengan Pihak Ketiga</h2>
                <p>Kami <strong>tidak menjual</strong> data pribadi Anda. Kami hanya berbagi informasi yang diperlukan dengan:</p>
                <ul>
                    <li>Mitra logistik dan pengiriman untuk mengantar pesanan Anda.</li>
                    <li>Penyedia layanan pembayaran yang terverifikasi dan aman.</li>
                    <li>Otoritas hukum, bila diwajibkan oleh peraturan yang berlaku.</li>
                </ul>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">lock</span> 4. Keamanan Data</h2>
                <p>Kami menerapkan langkah-langkah teknis dan organisasional yang tepat untuk melindungi data Anda dari akses tidak sah, perubahan, pengungkapan, atau penghancuran. Namun, tidak ada metode transmisi melalui internet yang 100% aman.</p>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">manage_accounts</span> 5. Hak-Hak Anda</h2>
                <p>Anda memiliki hak untuk:</p>
                <ul>
                    <li>Mengakses dan memperbarui data pribadi Anda melalui halaman profil.</li>
                    <li>Meminta penghapusan akun dan data pribadi Anda.</li>
                    <li>Menolak penggunaan data untuk keperluan pemasaran.</li>
                    <li>Mengajukan keluhan terkait pemrosesan data Anda.</li>
                </ul>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">update</span> 6. Perubahan Kebijakan</h2>
                <p>Kami dapat memperbarui kebijakan ini dari waktu ke waktu. Perubahan signifikan akan kami beritahukan melalui email atau notifikasi di platform. Penggunaan layanan kami setelah perubahan diterbitkan berarti Anda menyetujui kebijakan yang diperbarui.</p>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">contact_support</span> 7. Hubungi Kami</h2>
                <p>Jika Anda memiliki pertanyaan mengenai kebijakan privasi ini, silakan hubungi kami melalui halaman <a href="{{ route('dukungan.kontak') }}" class="text-primary font-semibold hover:underline">Hubungi Kami</a>.</p>

            </div>

            <!-- CTA -->
            <div class="mt-10 flex flex-wrap gap-4 scroll-reveal">
                <a href="{{ route('dukungan.syarat') }}" class="flex items-center gap-2 px-6 py-3 bg-white/60 border border-white/70 rounded-full text-[12px] font-bold uppercase tracking-widest text-[#0A1612] hover:text-primary hover:border-primary transition-all duration-300">
                    <span class="material-symbols-outlined text-[18px]">gavel</span> Syarat & Ketentuan
                </a>
                <a href="{{ route('dukungan.kontak') }}" class="flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-full text-[12px] font-bold uppercase tracking-widest hover:bg-[#1A2E26] transition-all duration-300">
                    <span class="material-symbols-outlined text-[18px]">support_agent</span> Hubungi Kami
                </a>
            </div>

        </div>
    </main>

    @include('components.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('is-visible'); observer.unobserve(e.target); } });
            }, { threshold: 0.1 });
            document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
