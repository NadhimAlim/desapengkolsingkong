<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use App\Models\VisitorCount; // Ditambahkan untuk mengambil data jumlah pengunjung
use Illuminate\View\View;
use App\Models\Member; // Ditambahkan untuk mengambil data anggota terbaru

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        abort_unless(auth()->user()?->is_admin, 403);

        // 1. Hitung Kunjungan HARI INI saja
        $todayVisitors = VisitorCount::where('page_name', 'home')
            ->whereDate('visit_date', now()->toDateString())
            ->sum('views_count');

        // 2. Hitung Kunjungan BULAN INI saja (Gabungan semua hari di bulan ini)
        $monthVisitors = VisitorCount::where('page_name', 'home')
            ->whereMonth('visit_date', now()->month)
            ->whereYear('visit_date', now()->year)
            ->sum('views_count');

        // 3. Hitung TOTAL KUNJUNGAN dari awal sampai sekarang
        $totalVisitors = VisitorCount::where('page_name', 'home')->sum('views_count');

        // Mengambil jumlah kunjungan dari database, jika belum ada datanya maka kembalikan nilai 0
        $totalVisitors = VisitorCount::where('page_name', 'home')->value('views_count') ?? 0;

        // Mengambil data anggota dengan sistem PAGINASI (Maksimal 5 data per halaman)
        $recentMembers = Member::latest()->paginate(5);

        return view('admin.dashboard', [
            'productCount' => Product::count(),
            'articleCount' => Article::count(),
            'publishedProductCount' => Product::where('is_published', true)->count(),
            'publishedArticleCount' => Article::where('is_published', true)->count(),
            'recentProducts' => Product::latest()->take(5)->get(),
            'recentArticles' => Article::latest()->take(5)->get(),
            'totalVisitors' => $totalVisitors, // Variabel baru sukses dikirim ke Blade Dashboard Anda

            // Kirim 3 data statistik baru ke Blade Admin
            'todayVisitors' => $todayVisitors,
            'monthVisitors' => $monthVisitors,
            'totalVisitors' => $totalVisitors,

            // 2. AMBIL DATA ANGGOTA TERBARU DARI DATABASE
            'recentMembers' => Member::latest()->take(5)->get(),

            // KIRIM DATA ANGGOTA DENGAN PAGINATE (Jangan pakai take()->get() lagi biar tidak rusak)
            'recentMembers'         => $recentMembers,

            
        ]);
    }
}