<?php

use App\Http\Controllers\{
    ProfileController, 
    ProductController, 
    AdminController, 
    AdminNotificationController,
    PelangganController, 
    CartController, 
    CheckoutController
};
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTE PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('welcome'); })->name('home');

// Gunakan .index untuk koleksi agar konsisten
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk.show');
Route::post('/produk/{id}/ulasan', [ProductController::class, 'storeUlasan'])->name('produk.ulasan.store')->middleware('auth:pelanggan');

// Rute pendukung
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/sustainability', function () { return view('sustainability'); })->name('sustainability');
Route::get('/jurnal', function () { return view('jurnal'); })->name('jurnal');

// RUTE API (PENTING: Pastikan ini ada agar fitur 'Beli Sekarang' via JS berhasil)
Route::get('/api/produk/{id}', function($id) {
    $produk = Produk::find($id); 
    return $produk ? response()->json($produk) : response()->json(['message' => 'Produk tidak ditemukan'], 404);
})->name('api.produk.show');

// RUTE KERANJANG
Route::controller(CartController::class)->prefix('keranjang')->name('cart.')->group(function () {
    Route::post('/tambah', 'add')->name('add');
    Route::get('/', 'index')->name('index');
    Route::patch('/update', 'update')->name('update');
    Route::delete('/hapus', 'remove')->name('remove');
});

/*
|--------------------------------------------------------------------------
| RUTE ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
        Route::get('/register', [AdminController::class, 'showRegister'])->name('register');
        Route::post('/register', [AdminController::class, 'register'])->name('register.submit');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        
        // Rute Profil Admin
        Route::get('/profile', [AdminController::class, 'editProfile'])->name('profile.edit');
        Route::patch('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
        
        // TAMBAHAN: Rute untuk menu Sidebar (Inventaris, Pesanan, Pelanggan, Analitik)
        Route::get('/inventaris', [AdminController::class, 'inventaris'])->name('inventaris');
        Route::get('/pesanan', [AdminController::class, 'pesanan'])->name('pesanan');
        Route::get('/pelanggan', [AdminController::class, 'pelanggan'])->name('pelanggan');
        Route::get('/analitik', [AdminController::class, 'analitik'])->name('analitik');
        
        // Rute untuk menghapus pesanan dari dashboard admin
        Route::delete('/pesanan/hapus/{id}', [AdminController::class, 'destroyPesanan'])->name('pesanan.destroy');
        
        // Rute untuk membuat dan menyimpan Koleksi/Produk Baru
        Route::get('/produk/create', [AdminController::class, 'createProduk'])->name('produk.create');
        Route::post('/produk/store', [AdminController::class, 'storeProduk'])->name('produk.store');
        
        // Rute untuk Edit, Update, dan Hapus Koleksi/Produk Baru
        Route::get('/produk/edit/{id}', [AdminController::class, 'editProduk'])->name('produk.edit');
        Route::patch('/produk/update/{id}', [AdminController::class, 'updateProduk'])->name('produk.update');
        Route::delete('/produk/hapus/{id}', [AdminController::class, 'destroyProduk'])->name('produk.destroy');
        
        Route::get('/pesanan/{id}', [AdminController::class, 'showPesanan'])->name('pesanan.show');
        Route::patch('/pesanan/{id}/status', [AdminController::class, 'updateStatusPesanan'])->name('pesanan.updateStatus');
        Route::get('/pelanggan/{id}', [AdminController::class, 'showPelanggan'])->name('pelanggan.show');

        // Rute Notifikasi Admin
        Route::prefix('notifications')->name('notifications.')->group(function () {
            Route::get('/',            [AdminNotificationController::class, 'index'])->name('index');
            Route::post('/mark-all',   [AdminNotificationController::class, 'markAllAsRead'])->name('markAll');
            Route::post('/{id}/read',  [AdminNotificationController::class, 'markOneAsRead'])->name('markOne');
        });
    });
});

/*
|--------------------------------------------------------------------------
| RUTE PELANGGAN
|--------------------------------------------------------------------------
*/
// Rute Tamu
Route::middleware('guest:pelanggan')->group(function () {
    Route::get('/login', [PelangganController::class, 'showLogin'])->name('pelanggan.login');
    Route::post('/login', [PelangganController::class, 'login'])->name('pelanggan.login.submit');
    Route::get('/register', [PelangganController::class, 'showRegister'])->name('pelanggan.register');
    Route::post('/register', [PelangganController::class, 'register'])->name('pelanggan.register.submit');
});

// Rute Terproteksi (Pelanggan)
Route::middleware(['auth:pelanggan'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('update');
        Route::get('/wishlist', function () { return view('profile.wishlist'); })->name('wishlist');
        Route::get('/alamat', [ProfileController::class, 'alamat'])->name('alamat');
        Route::patch('/alamat', [ProfileController::class, 'updateAlamat'])->name('alamat.update');
        Route::get('/keamanan', [ProfileController::class, 'keamanan'])->name('keamanan');
        Route::patch('/keamanan', [ProfileController::class, 'updateKeamanan'])->name('keamanan.update');
        Route::get('/pesanan', [ProfileController::class, 'pesanan'])->name('pesanan');
        Route::get('/lacak', [ProfileController::class, 'lacak'])->name('lacak');
    });

    // Rute Notifikasi
    Route::post('/notifications/mark-as-read', [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::get('/notifications/{id}/mark-read', [App\Http\Controllers\NotificationController::class, 'markOneAsRead'])->name('notifications.markOneAsRead');

    // Rute Checkout & Pembayaran
    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/pembayaran', [CheckoutController::class, 'index'])->name('pembayaran');
        Route::post('/process', [CheckoutController::class, 'process'])->name('process');
        Route::get('/pesanan/{id}', [CheckoutController::class, 'show'])->name('pesanan.show'); 
        Route::get('/pesanan/{id}/lacak', [CheckoutController::class, 'lacak'])->name('pesanan.lacak'); 
    });
    
    Route::post('/logout', [PelangganController::class, 'logout'])->name('pelanggan.logout');
});