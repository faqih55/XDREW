<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

// 1. RUTE PUBLIK
Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('produk');
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk.show');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/sustainability', function () { return view('sustainability'); })->name('sustainability');
Route::get('/jurnal', function () { return view('jurnal'); })->name('jurnal');

// 2. RUTE KERANJANG
Route::post('/keranjang/tambah', [CartController::class, 'add'])->name('cart.add');
Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang.index');
Route::patch('/keranjang/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/keranjang/hapus', [CartController::class, 'remove'])->name('cart.remove');

// 3. RUTE ADMIN
Route::middleware('guest:admin')->group(function () {
    Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// 4. RUTE PELANGGAN
Route::get('/login', [PelangganController::class, 'showLogin'])->name('pelanggan.login');
Route::post('/login', [PelangganController::class, 'login'])->name('pelanggan.login.submit');
Route::post('/logout', [PelangganController::class, 'logout'])->name('pelanggan.logout');

Route::middleware(['auth:pelanggan'])->group(function () {
    // Dashboard Pelanggan
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    
    // Profil
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('update');
    });

    // Checkout & Pesanan
    Route::get('/pembayaran', function () { return view('pembayaran'); })->name('pembayaran');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/pesanan/{id}', [CheckoutController::class, 'show'])->name('pesanan.show');
});