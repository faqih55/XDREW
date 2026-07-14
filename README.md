# XDREW Fashion — CMS & E-Commerce Platform

Platform e-commerce fashion berkelanjutan (sustainable streetwear) berbasis **Laravel**, didesain dengan estetika modern dan performa tinggi.

---

## ✨ Fitur Utama

| Fitur | Keterangan |
|---|---|
| 🏠 **Beranda** | Hero section, koleksi unggulan, brand story |
| 👕 **Koleksi Produk** | Grid 5 kolom, filter & sort, paginasi 25 item |
| 📄 **Detail Produk** | Galeri gambar, ulasan, produk terkait |
| 🛒 **Keranjang Belanja** | Update kuantitas, hapus item, ringkasan total |
| 💳 **Checkout & Pembayaran** | Alamat pengiriman, metode pembayaran |
| 📦 **Lacak Pesanan** | Riwayat & status pengiriman real-time |
| 🌱 **Keberlanjutan** | Halaman misi & dampak lingkungan |
| 📰 **Jurnal** | Blog / artikel brand |
| 👤 **Profil Pelanggan** | Edit profil, alamat, keamanan, pesanan |
| 🛡️ **Panel Admin** | Dashboard, inventaris, pesanan, pelanggan, analitik |
| 📋 **Dukungan** | Kebijakan Privasi, Syarat & Ketentuan, Hubungi Kami |

---

## 🗂️ Struktur Proyek

```
XDREW/
├── app/
│   ├── Http/Controllers/
│   │   ├── AdminController.php          # Panel admin
│   │   ├── AdminNotificationController.php
│   │   ├── CartController.php           # Keranjang belanja
│   │   ├── CheckoutController.php       # Checkout & pembayaran
│   │   ├── NotificationController.php   # Notifikasi pelanggan
│   │   ├── PelangganController.php      # Auth pelanggan
│   │   ├── ProductController.php        # Koleksi produk
│   │   └── ProfileController.php        # Profil pelanggan
│   ├── Models/                          # Eloquent models
│   ├── Notifications/                   # Laravel Notifications
│   └── Providers/                       # Service Providers
│
├── resources/
│   ├── views/
│   │   ├── admin/                       # Tampilan panel admin
│   │   ├── auth/                        # Login & register
│   │   ├── components/                  # Komponen reusable (navbar, footer, dll)
│   │   │   └── navbar/                  # Pill-style navbar
│   │   ├── lacak/                       # Halaman lacak pesanan
│   │   ├── layouts/                     # Layout utama
│   │   │   ├── Front.blade.php          # Layout halaman publik (dengan navbar custom)
│   │   │   ├── admin.blade.php          # Layout panel admin
│   │   │   ├── app.blade.php            # Layout dasar
│   │   │   ├── guest.blade.php          # Layout halaman tamu
│   │   │   └── profile.blade.php        # Layout halaman profil
│   │   ├── pelanggan/                   # View khusus pelanggan
│   │   ├── profile/                     # Halaman profil (tab-based)
│   │   ├── dashboard.blade.php          # Dashboard pelanggan
│   │   ├── detail.blade.php             # Detail produk
│   │   ├── detail-pesanan.blade.php     # Detail pesanan
│   │   ├── hubungi-kami.blade.php       # Halaman Hubungi Kami
│   │   ├── jurnal.blade.php             # Blog / Jurnal
│   │   ├── keranjang.blade.php          # Keranjang belanja
│   │   ├── pembayaran.blade.php         # Halaman pembayaran
│   │   ├── privasi.blade.php            # Kebijakan Privasi
│   │   ├── produk.blade.php             # Koleksi produk (5 kolom)
│   │   ├── sustainability.blade.php     # Halaman keberlanjutan
│   │   ├── syarat-ketentuan.blade.php   # Syarat & Ketentuan
│   │   └── welcome.blade.php            # Beranda utama
│   ├── css/
│   │   └── app.css                      # Stylesheet utama
│   └── js/
│       └── app.js                       # JavaScript utama
│
├── routes/
│   ├── web.php                          # Semua rute web
│   └── api.php                          # Rute API (user auth)
│
├── public/
│   ├── images/                          # Gambar produk & aset
│   ├── js/app.js                        # JS terkompilasi
│   └── css/app.css                      # CSS terkompilasi
│
├── database/
│   ├── migrations/                      # Skema database
│   ├── factories/                       # Data factory
│   └── seeders/                         # Data seeder
│
├── config/                              # Konfigurasi Laravel
├── .env                                 # Environment variables (jangan di-commit)
├── composer.json                        # Dependensi PHP
├── package.json                         # Dependensi Node.js
└── webpack.mix.js                       # Konfigurasi build aset
```

---

## 🚀 Cara Menjalankan

### Prasyarat
- PHP >= 8.1
- Composer
- Node.js >= 16
- Database (MySQL / Oracle)

### Langkah Instalasi

```bash
# 1. Clone repository
git clone <url-repo> xdrew
cd xdrew

# 2. Install dependensi PHP
composer install

# 3. Install dependensi Node.js
npm install

# 4. Salin file environment
cp .env.example .env

# 5. Generate app key
php artisan key:generate

# 6. Konfigurasi database di file .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=xdrew
# DB_USERNAME=root
# DB_PASSWORD=

# 7. Jalankan migrasi & seeder
php artisan migrate --seed

# 8. Build aset frontend
npm run dev

# 9. Jalankan server development
php artisan serve
```

Buka browser dan akses `http://127.0.0.1:8000`

---

## 🛤️ Daftar Rute Utama

| Method | URL | Nama Rute | Keterangan |
|---|---|---|---|
| GET | `/` | `home` | Beranda |
| GET | `/produk` | `produk.index` | Koleksi produk |
| GET | `/produk/{id}` | `produk.show` | Detail produk |
| GET | `/sustainability` | `sustainability` | Halaman keberlanjutan |
| GET | `/jurnal` | `jurnal` | Blog & artikel |
| GET | `/kebijakan-privasi` | `dukungan.privasi` | Kebijakan Privasi |
| GET | `/syarat-ketentuan` | `dukungan.syarat` | Syarat & Ketentuan |
| GET | `/hubungi-kami` | `dukungan.kontak` | Hubungi Kami |
| GET | `/keranjang` | `cart.index` | Keranjang belanja |
| POST | `/keranjang/tambah` | `cart.add` | Tambah ke keranjang |
| GET | `/checkout/pembayaran` | `checkout.pembayaran` | Halaman checkout |
| GET | `/admin/dashboard` | `admin.dashboard` | Panel admin |
| GET | `/login` | `pelanggan.login` | Login pelanggan |
| GET | `/register` | `pelanggan.register` | Registrasi pelanggan |

---

## 🎨 Stack Teknologi

| Layer | Teknologi |
|---|---|
| Backend | Laravel 10, PHP 8.1+ |
| Database | MySQL / Oracle |
| Frontend | Blade, Alpine.js, Tailwind CSS (CDN) |
| Build Tool | Laravel Mix (Webpack) |
| Typography | Google Fonts — Outfit & Poppins |
| Icons | Material Symbols Outlined |
| Auth | Laravel Multi-Guard (Admin & Pelanggan) |

---

## 🔐 Akses Panel Admin

Akses panel admin melalui `/admin/login`. Buat akun admin melalui `/admin/register` (pastikan rute ini dilindungi atau dinonaktifkan di production).

---

## 📝 Lisensi

© 2025 XDrew Fashion. Hak cipta dilindungi.
