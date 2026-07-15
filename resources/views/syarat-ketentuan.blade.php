@extends('layouts.Front')

@section('title', 'Syarat & Ketentuan')

@section('content')
<div class="pt-28 pb-24 opacity-0 transition-opacity duration-700 ease-out">

        <div class="max-w-4xl mx-auto px-6 md:px-10">

            <!-- Hero -->
            <div class="mb-14 scroll-reveal">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-2.5 h-2.5 bg-primary rounded-full shadow-[0_0_10px_#4edea3]"></span>
                    <span class="text-[11px] font-semibold text-primary tracking-[0.2em] uppercase">Dukungan</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-[#0A1612] uppercase mb-4">
                    Syarat & <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-[#2a855f]">Ketentuan</span>
                </h1>
                <p class="text-[#0A1612]/60 text-sm">Terakhir diperbarui: <strong>1 Juli 2025</strong></p>
            </div>

            <!-- Card Konten -->
            <div class="glass-card rounded-3xl p-8 md:p-12 scroll-reveal policy-section">

                <p>Dengan mengakses dan menggunakan platform <strong>XDrew Fashion</strong>, Anda menyetujui syarat dan ketentuan berikut ini. Harap baca dengan saksama sebelum melanjutkan.</p>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">gavel</span> 1. Penerimaan Syarat</h2>
                <p>Dengan mendaftar atau menggunakan layanan XDrew Fashion, Anda menyatakan bahwa Anda telah membaca, memahami, dan setuju untuk terikat oleh syarat dan ketentuan ini. Jika Anda tidak menyetujui syarat ini, mohon hentikan penggunaan layanan kami.</p>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">shopping_cart</span> 2. Pemesanan & Pembayaran</h2>
                <ul>
                    <li>Semua pesanan tunduk pada ketersediaan stok dan konfirmasi pembayaran.</li>
                    <li>Harga produk yang tercantum sudah termasuk pajak kecuali disebutkan lain.</li>
                    <li>Kami berhak membatalkan pesanan yang mencurigakan atau tidak dapat diverifikasi.</li>
                    <li>Pembayaran harus diselesaikan dalam waktu 1x24 jam setelah pesanan dibuat.</li>
                    <li>Kami mendukung berbagai metode pembayaran yang tercantum di halaman checkout.</li>
                </ul>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">local_shipping</span> 3. Pengiriman</h2>
                <ul>
                    <li>Estimasi waktu pengiriman bersifat perkiraan dan dapat berubah berdasarkan kondisi jasa pengiriman.</li>
                    <li>XDrew Fashion tidak bertanggung jawab atas keterlambatan yang disebabkan oleh pihak jasa pengiriman.</li>
                    <li>Risiko kerusakan atau kehilangan barang berpindah kepada pembeli setelah paket diserahkan kepada kurir.</li>
                </ul>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">swap_horiz</span> 4. Pengembalian & Refund</h2>
                <ul>
                    <li>Pengembalian barang dapat dilakukan dalam 7 hari setelah produk diterima.</li>
                    <li>Produk yang dikembalikan harus dalam kondisi asli, belum digunakan, dan disertai tag.</li>
                    <li>Biaya pengiriman pengembalian ditanggung oleh pembeli kecuali ada cacat produk.</li>
                    <li>Refund akan diproses dalam 3-7 hari kerja setelah barang dikonfirmasi diterima.</li>
                </ul>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">manage_accounts</span> 5. Akun Pengguna</h2>
                <ul>
                    <li>Anda bertanggung jawab menjaga kerahasiaan kata sandi akun Anda.</li>
                    <li>Dilarang menggunakan akun orang lain atau membuat akun palsu.</li>
                    <li>Kami berhak menangguhkan akun yang melanggar ketentuan penggunaan.</li>
                </ul>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">verified_user</span> 6. Kekayaan Intelektual</h2>
                <p>Seluruh konten pada platform ini—termasuk logo, desain, gambar, dan teks—adalah milik XDrew Fashion dan dilindungi undang-undang hak cipta. Dilarang keras menyalin atau mendistribusikan konten tanpa izin tertulis.</p>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">warning</span> 7. Batasan Tanggung Jawab</h2>
                <p>XDrew Fashion tidak bertanggung jawab atas kerugian tidak langsung, insidental, atau konsekuensial yang timbul dari penggunaan layanan kami, sejauh diizinkan oleh hukum yang berlaku.</p>

                <h2><span class="material-symbols-outlined text-primary text-[20px]">update</span> 8. Perubahan Syarat</h2>
                <p>Kami berhak mengubah syarat dan ketentuan ini kapan saja. Perubahan akan berlaku segera setelah dipublikasikan. Penggunaan layanan setelah perubahan berarti Anda menyetujui syarat yang diperbarui.</p>

            </div>

            <!-- CTA -->
            <div class="mt-10 flex flex-wrap gap-4 scroll-reveal">
                <a href="{{ route('dukungan.privasi') }}" class="flex items-center gap-2 px-6 py-3 bg-white/60 border border-white/70 rounded-full text-[12px] font-bold uppercase tracking-widest text-[#0A1612] hover:text-primary hover:border-primary transition-all duration-300">
                    <span class="material-symbols-outlined text-[18px]">policy</span> Kebijakan Privasi
                </a>
                <a href="{{ route('dukungan.kontak') }}" class="flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-full text-[12px] font-bold uppercase tracking-widest hover:bg-[#1A2E26] transition-all duration-300">
                    <span class="material-symbols-outlined text-[18px]">support_agent</span> Hubungi Kami
                </a>
            </div>

        </div>
    
</div>
@endsection


@push('styles')
<style>
        .material-symbols-outlined{font-family:'Material Symbols Outlined';font-weight:normal;font-style:normal;font-size:24px;line-height:1;letter-spacing:normal;text-transform:none;display:inline-block;white-space:nowrap;direction:ltr;-webkit-font-smoothing:antialiased;}
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
@endpush


@push('scripts')
<script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('is-visible'); observer.unobserve(e.target); } });
            }, { threshold: 0.1 });
            document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
        });
    </script>
@endpush
