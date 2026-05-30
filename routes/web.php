<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\MemberController; // Import Controller Member Admin
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// ==========================================
// RUTE HALAMAN DEPAN (PUBLIC VIEW)
// ==========================================
Route::get('/', HomeController::class)->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

// Rute untuk menangani pengiriman formulir pesanan via website
Route::post('/produk/{product}/order', [ProductController::class, 'storeOrder'])->name('products.order');


// ==========================================
// RUTE OTENTIKASI (LOGIN / LOGOUT)
// ==========================================
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('login.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


// ==========================================
// RUTE MANAGEMENT ADMIN (SATU GROUP SOLID)
// ==========================================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    
    // Halaman Utama Dashboard Admin
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/dashboard', DashboardController::class)->name('dashboard.alias'); // Menjaga jika ada redirect ke /admin/dashboard

    // CRUD Produk (Memakai AdminProductController yang Benar)
    Route::resource('products', AdminProductController::class)->except('show');
    
    // CRUD Artikel (Memakai AdminArticleController yang Benar)
    Route::resource('articles', AdminArticleController::class)->except('show');
    
    // ==========================================
    // KHUSUS FITUR ANGGOTA UMKM DESA PENGKOL
    // ==========================================
    
    // 1. Taruh Custom Route PDF di ATAS Resource agar tidak bentrok dengan fungsi show()
    Route::get('members/download-pdf', [MemberController::class, 'downloadPdf'])->name('members.download-pdf');

    // 2. Taruh Resource Route di bawahnya dan batasi fungsi show jika tidak digunakan
    Route::resource('members', MemberController::class)->except('show'); 
});