<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MemberController;

Route::get('/', HomeController::class)->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('login.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('products', AdminProductController::class)->except('show');
    Route::resource('articles', AdminArticleController::class)->except('show');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Route yang sudah ada sebelumnya...
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('articles', ArticleController::class);
    
    // ➕ TAMBAHKAN BARIS INI:
    Route::resource('members', MemberController::class); 
    
});