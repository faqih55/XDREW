@extends('layouts.Front')

@section('title', 'Hubungi Kami')

@section('content')
<div class="pt-28 pb-24 opacity-0 transition-opacity duration-700 ease-out">

        <div class="max-w-5xl mx-auto px-6 md:px-10">

            <!-- Hero -->
            <div class="mb-14 scroll-reveal">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-2.5 h-2.5 bg-primary rounded-full shadow-[0_0_10px_#4edea3]"></span>
                    <span class="text-[11px] font-semibold text-primary tracking-[0.2em] uppercase">Dukungan</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-[#0A1612] uppercase mb-4">
                    Hubungi <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-[#2a855f]">Kami</span>
                </h1>
                <p class="text-[#0A1612]/65 text-base max-w-xl leading-relaxed">Tim kami siap membantu Anda setiap saat. Pilih cara yang paling nyaman untuk menghubungi kami.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

                <!-- Form Kirim Pesan -->
                <div class="lg:col-span-3 scroll-reveal">
                    <div class="glass-card rounded-3xl p-8">
                        <h2 class="text-xl font-bold text-[#0A1612] uppercase tracking-wide mb-1" style="font-family:'Outfit',sans-serif;">Kirim Pesan</h2>
                        <p class="text-[#0A1612]/60 text-sm mb-6">Kami akan membalas dalam 1x24 jam kerja.</p>

                        <!-- Sukses -->
                        <div x-show="sent" x-transition class="text-center py-10" style="display:none;">
                            <div class="w-16 h-16 rounded-full bg-primary/15 flex items-center justify-center mx-auto mb-4">
                                <span class="material-symbols-outlined text-primary text-[36px]">check_circle</span>
                            </div>
                            <h3 class="text-lg font-bold text-[#0A1612] mb-2" style="font-family:'Outfit',sans-serif;">Pesan Terkirim!</h3>
                            <p class="text-[#0A1612]/60 text-sm">Terima kasih telah menghubungi kami. Tim kami akan segera merespons.</p>
                            <button @click="sent = false" class="mt-6 px-6 py-2.5 border border-primary text-primary rounded-full text-[12px] font-bold uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
                                Kirim Pesan Lain
                            </button>
                        </div>

                        <!-- Form -->
                        <form x-show="!sent" @submit.prevent="
                            if (!$el.nama.value || !$el.email.value || !$el.pesan.value) { formError = 'Mohon lengkapi semua field.'; return; }
                            formError = '';
                            sending = true;
                            setTimeout(() => { sending = false; sent = true; }, 1500);
                        " style="display:block;">
                            <div x-show="formError" x-text="formError" class="mb-4 text-sm text-red-500 bg-red-50 border border-red-100 rounded-xl px-4 py-3" style="display:none;"></div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-[11px] font-bold uppercase tracking-widest text-[#0A1612]/70 mb-2">Nama Lengkap</label>
                                    <input name="nama" type="text" placeholder="John Doe" class="contact-input" required/>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold uppercase tracking-widest text-[#0A1612]/70 mb-2">Email</label>
                                    <input name="email" type="email" placeholder="email@contoh.com" class="contact-input" required/>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block text-[11px] font-bold uppercase tracking-widest text-[#0A1612]/70 mb-2">Subjek</label>
                                <select name="subjek" class="contact-input">
                                    <option value="pesanan">Pertanyaan tentang Pesanan</option>
                                    <option value="produk">Informasi Produk</option>
                                    <option value="pengembalian">Pengembalian / Refund</option>
                                    <option value="teknis">Masalah Teknis</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-6">
                                <label class="block text-[11px] font-bold uppercase tracking-widest text-[#0A1612]/70 mb-2">Pesan</label>
                                <textarea name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." class="contact-input resize-none" required></textarea>
                            </div>

                            <button type="submit" id="btn-kirim" :disabled="sending"
                                    class="w-full bg-primary text-white font-bold text-[12px] uppercase tracking-widest py-4 rounded-xl hover:bg-[#1A2E26] transition-all duration-300 flex items-center justify-center gap-2 disabled:opacity-60">
                                <span x-show="!sending" class="material-symbols-outlined text-[18px]">send</span>
                                <svg x-show="sending" class="animate-spin w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="display:none;"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>
                                <span x-text="sending ? 'Mengirim...' : 'Kirim Pesan'"></span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Info Kontak -->
                <div class="lg:col-span-2 flex flex-col gap-5 scroll-reveal">
                    <div class="contact-card">
                        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary text-[22px]">mail</span>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-widest text-[#0A1612]/60 mb-1">Email</p>
                            <a href="mailto:support@xdrew.id" class="font-semibold text-[#0A1612] hover:text-primary transition-colors text-sm">support@xdrew.id</a>
                            <p class="text-xs text-[#0A1612]/50 mt-0.5">Respons dalam 1x24 jam kerja</p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary text-[22px]">chat</span>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-widest text-[#0A1612]/60 mb-1">WhatsApp</p>
                            <a href="https://wa.me/6281234567890" target="_blank" class="font-semibold text-[#0A1612] hover:text-primary transition-colors text-sm">+62 812-3456-7890</a>
                            <p class="text-xs text-[#0A1612]/50 mt-0.5">Senin – Jumat, 09.00 – 18.00 WIB</p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary text-[22px]">location_on</span>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-widest text-[#0A1612]/60 mb-1">Alamat</p>
                            <p class="font-semibold text-[#0A1612] text-sm">Jl. Pahlawan No. 12</p>
                            <p class="text-xs text-[#0A1612]/50 mt-0.5">Bandung, Jawa Barat, Indonesia</p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary text-[22px]">schedule</span>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-widest text-[#0A1612]/60 mb-2">Jam Operasional</p>
                            <div class="text-sm text-[#0A1612]/80 space-y-1">
                                <div class="flex justify-between gap-6"><span>Senin – Jumat</span><span class="font-semibold text-primary">09.00 – 18.00</span></div>
                                <div class="flex justify-between gap-6"><span>Sabtu</span><span class="font-semibold text-primary">10.00 – 15.00</span></div>
                                <div class="flex justify-between gap-6"><span>Minggu</span><span class="text-[#0A1612]/40">Tutup</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Sosial Media -->
                    <div class="glass-card rounded-2xl p-5">
                        <p class="text-[11px] font-bold uppercase tracking-widest text-[#0A1612]/60 mb-3">Ikuti Kami</p>
                        <div class="flex gap-3">
                            <a href="#" class="w-10 h-10 rounded-full bg-primary/10 border border-primary/20 flex items-center justify-center hover:bg-primary hover:text-white transition-all group">
                                <svg class="w-4 h-4 text-primary group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-primary/10 border border-primary/20 flex items-center justify-center hover:bg-primary hover:text-white transition-all group">
                                <svg class="w-4 h-4 text-primary group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-primary/10 border border-primary/20 flex items-center justify-center hover:bg-primary hover:text-white transition-all group">
                                <svg class="w-4 h-4 text-primary group-hover:text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
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
        .contact-input{width:100%;background:rgba(255,255,255,0.6);border:1px solid rgba(255,255,255,0.8);border-radius:12px;padding:14px 18px;font-size:.9375rem;color:#0A1612;outline:none;transition:border-color 0.25s,box-shadow 0.25s;font-family:'Poppins',sans-serif;}
        .contact-input:focus{border-color:#4edea3;box-shadow:0 0 0 3px rgba(78,222,163,0.15);}
        .contact-input::placeholder{color:#0A1612aa;}
        .contact-card{display:flex;align-items:flex-start;gap:16px;padding:20px;border-radius:16px;background:rgba(255,255,255,0.5);border:1px solid rgba(255,255,255,0.7);transition:all 0.3s;}
        .contact-card:hover{background:rgba(255,255,255,0.75);transform:translateY(-3px);box-shadow:0 10px 30px rgba(78,222,163,0.12);}
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
