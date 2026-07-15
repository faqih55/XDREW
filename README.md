<div align="center">

<!-- HEADER BANNER -->

```
██╗  ██╗██████╗ ██████╗ ███████╗██╗    ██╗
╚██╗██╔╝██╔══██╗██╔══██╗██╔════╝██║    ██║
 ╚███╔╝ ██║  ██║██████╔╝█████╗  ██║ █╗ ██║
 ██╔██╗ ██║  ██║██╔══██╗██╔══╝  ██║███╗██║
██╔╝ ██╗██████╔╝██║  ██║███████╗╚███╔███╔╝
╚═╝  ╚═╝╚═════╝ ╚═╝  ╚═╝╚══════╝ ╚══╝╚══╝
```

**◈ Fashion CMS & E-Commerce Platform ◈**

<a href="https://github.com/faqih55">
  <img src="https://readme-typing-svg.demolab.com?font=Share+Tech+Mono&weight=700&size=16&duration=3000&pause=800&color=00FFFF&center=true&vCenter=true&width=700&lines=⚡+Built+with+Laravel+%7C+PHP+%7C+MySQL;🍎+Crafted+by+faqih55+—+iOS+%26+Fullstack+Dev;🌐+Sustainable+Streetwear+Platform;🛒+Full-stack+E-Commerce+with+Admin+Panel;🚀+Clean+Code+%7C+Bold+Design+%7C+Real+Impact" alt="Typing SVG" />
</a>

<br/>

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white&labelColor=0d1117)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white&labelColor=0d1117)
![MySQL](https://img.shields.io/badge/MySQL-00618A?style=for-the-badge&logo=mysql&logoColor=white&labelColor=0d1117)
![Blade](https://img.shields.io/badge/Blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white&labelColor=0d1117)
![AlpineJS](https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=white&labelColor=0d1117)

![STATUS](https://img.shields.io/badge/◈_STATUS-ACTIVE-00ffff?style=for-the-badge&labelColor=0d1117)
![VERSION](https://img.shields.io/badge/◈_VERSION-1.0.0-b700ff?style=for-the-badge&labelColor=0d1117)
![AUTHOR](https://img.shields.io/badge/◈_AUTHOR-faqih55-ff0080?style=for-the-badge&labelColor=0d1117)
![LICENSE](https://img.shields.io/badge/◈_LICENSE-Proprietary-ffd700?style=for-the-badge&labelColor=0d1117)

</div>

---

<div align="center">

<img src="https://github.com/user-attachments/assets/9e20baee-9e05-4ce4-867f-cc76992274a3" width="100%" />

<br/><br/>

<img src="https://github.com/user-attachments/assets/c3a874c8-b660-4ca6-9061-45f8bb7d503f" width="49%" />
<img src="https://github.com/user-attachments/assets/48d25dbd-a883-4c02-ae41-5f40d12c8bf8" width="49%" />

</div>

---

<div align="center">

## ◈ ABOUT THIS PROJECT

<br/>

> *"XDREW is not just an e-commerce app — it's a statement.*
> *Clean architecture, bold design, and a backend that never sleeps."*
> — **faqih55**

<br/>

Platform e-commerce fashion berkelanjutan (**sustainable streetwear**) berbasis **Laravel**,\
didesain dengan estetika modern, arsitektur bersih, dan performa tinggi.\
Dibangun dari nol oleh satu developer — iOS dev yang tak takut backend.

</div>

---

<div align="center">

## ◈ FITUR UTAMA

</div>

```
┌─────────────────────────────────────────────────────────────────────┐
│                        XDREW FEATURE MAP                            │
├──────────────────────┬──────────────────────────────────────────────┤
│  🏠  Beranda         │  Hero section, koleksi unggulan, brand story  │
│  👕  Koleksi Produk  │  Grid 5 kolom, filter & sort, paginasi 25    │
│  📄  Detail Produk   │  Galeri gambar, ulasan, produk terkait        │
│  🛒  Keranjang       │  Update kuantitas, hapus item, ringkasan total│
│  💳  Checkout        │  Alamat pengiriman, metode pembayaran         │
│  📦  Lacak Pesanan   │  Riwayat & status pengiriman real-time        │
│  🌱  Keberlanjutan   │  Halaman misi & dampak lingkungan             │
│  📰  Jurnal          │  Blog / artikel brand                         │
│  👤  Profil          │  Edit profil, alamat, keamanan, pesanan       │
│  🛡️  Panel Admin     │  Dashboard, inventaris, pesanan, analitik     │
│  📋  Dukungan        │  Privasi, Syarat & Ketentuan, Hubungi Kami   │
└──────────────────────┴──────────────────────────────────────────────┘
```

---

<div align="center">

## ◈ TECH STACK

<br/>

| Layer | Teknologi | Keterangan |
|:-----:|:---------:|:----------:|
| ⚙️ **Backend** | `Laravel 10` `PHP 8.1+` | MVC, Eloquent ORM, Multi-Guard Auth |
| 🗄️ **Database** | `MySQL` `Oracle` | Relational, Migrations, Seeders |
| 🎨 **Frontend** | `Blade` `Alpine.js` `Tailwind CSS` | Server-side rendering + reaktivitas ringan |
| 🔨 **Build** | `Laravel Mix` `Webpack` | Asset compilation & optimization |
| 🔤 **Typography** | `Google Fonts — Outfit & Poppins` | Modern, readable, premium feel |
| 🎯 **Icons** | `Material Symbols Outlined` | Konsisten & skalabel |
| 🔐 **Auth** | `Multi-Guard: Admin & Pelanggan` | Pemisahan akses yang aman |

</div>

---

<div align="center">

## ◈ ARSITEKTUR

</div>

```
XDREW/
├── 🎯 app/
│   ├── Http/Controllers/
│   │   ├── AdminController.php             # Panel admin
│   │   ├── AdminNotificationController.php
│   │   ├── CartController.php              # Keranjang belanja
│   │   ├── CheckoutController.php          # Checkout & pembayaran
│   │   ├── NotificationController.php      # Notifikasi pelanggan
│   │   ├── PelangganController.php         # Auth pelanggan
│   │   ├── ProductController.php           # Koleksi produk
│   │   └── ProfileController.php           # Profil pelanggan
│   ├── Models/                             # Eloquent models
│   ├── Notifications/                      # Laravel Notifications
│   └── Providers/                          # Service Providers
│
├── 🎨 resources/views/
│   ├── admin/         # Panel admin views
│   ├── auth/          # Login & register
│   ├── components/    # Navbar, footer, dll (reusable)
│   ├── layouts/       # Front, admin, app, guest, profile
│   └── *.blade.php    # welcome, produk, detail, keranjang, dll
│
├── 🛤️ routes/
│   ├── web.php         # Semua rute web
│   └── api.php         # Rute API (user auth)
│
├── 🗄️ database/
│   ├── migrations/     # Skema database
│   ├── factories/      # Data factory
│   └── seeders/        # Data seeder
│
├── ⚙️ config/           # Konfigurasi Laravel
├── 📦 public/           # Aset terkompilasi
└── 🔧 .env              # Environment variables (jangan di-commit!)
```

---

<div align="center">

## ◈ QUICK START

</div>

```bash
# ── 1. Clone & masuk ke direktori ──────────────────────────
git clone https://github.com/faqih55/XDREW.git && cd XDREW

# ── 2. Install dependensi ──────────────────────────────────
composer install && npm install

# ── 3. Setup environment ──────────────────────────────────
cp .env.example .env && php artisan key:generate

# ── 4. Konfigurasi .env ───────────────────────────────────
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=xdrew
# DB_USERNAME=root
# DB_PASSWORD=

# ── 5. Migrasi & seed database ────────────────────────────
php artisan migrate --seed

# ── 6. Build aset & jalankan server ──────────────────────
npm run dev && php artisan serve

# ── Buka di browser ───────────────────────────────────────
# → http://127.0.0.1:8000
# → http://127.0.0.1:8000/admin/login  (Panel Admin)
```

> **Prasyarat:** PHP ≥ 8.1 · Composer · Node.js ≥ 16 · MySQL

---

<div align="center">

## ◈ ROUTE MAP

</div>

```
PUBLIC ROUTES
┌─────────────────────────────────────────────────────────────┐
│  GET  /                    → Beranda                         │
│  GET  /produk              → Koleksi produk                  │
│  GET  /produk/{id}         → Detail produk                   │
│  GET  /sustainability      → Halaman keberlanjutan           │
│  GET  /jurnal              → Blog & artikel                  │
│  GET  /keranjang           → Keranjang belanja               │
│  POST /keranjang/tambah    → Tambah item ke keranjang        │
│  GET  /checkout/pembayaran → Halaman checkout                │
│  GET  /kebijakan-privasi   → Kebijakan Privasi               │
│  GET  /syarat-ketentuan    → Syarat & Ketentuan              │
│  GET  /hubungi-kami        → Hubungi Kami                    │
├─────────────────────────────────────────────────────────────┤
AUTH ROUTES
│  GET  /login               → Login pelanggan                 │
│  GET  /register            → Registrasi pelanggan            │
│  GET  /profile/...         → Profil & pengaturan akun        │
├─────────────────────────────────────────────────────────────┤
ADMIN ROUTES (Protected)
│  GET  /admin/login         → Login admin                     │
│  GET  /admin/dashboard     → Dashboard                       │
│  GET  /admin/inventaris    → Manajemen produk                │
│  GET  /admin/pesanan       → Manajemen pesanan               │
│  GET  /admin/pelanggan     → Manajemen pelanggan             │
└─────────────────────────────────────────────────────────────┘
```

---

<div align="center">

## ◈ BUILT BY

<br/>

<a href="https://github.com/faqih55">
  <img src="https://readme-typing-svg.demolab.com?font=Share+Tech+Mono&weight=700&size=18&duration=3000&pause=800&color=00FFFF&center=true&vCenter=true&width=600&lines=faqih55+—+iOS+%26+Fullstack+Developer;Swift+%7C+Laravel+%7C+Flutter+%7C+PHP;Turning+ideas+into+digital+reality+🚀" alt="Typing SVG" />
</a>

<br/>

[![GitHub](https://img.shields.io/badge/GitHub-faqih55-181717?style=for-the-badge&logo=github&logoColor=white&labelColor=0d1117)](https://github.com/faqih55)
[![Instagram](https://img.shields.io/badge/Instagram-lil.fqh-E4405F?style=for-the-badge&logo=instagram&logoColor=white&labelColor=0d1117)](https://instagram.com/lil.fqh)
[![Email](https://img.shields.io/badge/Gmail-faqihmuhamad553%40gmail.com-D14836?style=for-the-badge&logo=gmail&logoColor=white&labelColor=0d1117)](mailto:faqihmuhamad553@gmail.com)

<br/>

> *"Every line of code is a brushstroke on a digital canvas."*\
> — **faqih55** · iOS Developer · Fullstack Engineer · Digital Craftsman

<br/>

---

© 2025 **XDREW Fashion**. Crafted with ❤️ by [faqih55](https://github.com/faqih55) · Indonesia 🇮🇩

</div>
