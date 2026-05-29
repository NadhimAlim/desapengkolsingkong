<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\VisitorCount;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda dengan data terurut dari yang paling terbaru
     * sekaligus mencatat statistik kunjungan harian.
     */
    public function __invoke(): View
    {
        // ✅ CUKUP GUNAKAN LOGIKA INI SAJA (Mencatat berdasarkan halaman DAN tanggal hari ini)
        $visitor = VisitorCount::firstOrCreate([
            'page_name'  => 'home',
            'visit_date' => now()->toDateString(), // Otomatis terisi tanggal hari ini
        ]);
        $visitor->increment('views_count');

        return view('home', [
            // 1. Mengambil produk unggulan rilis TERBARU (Maksimal 6 produk)
            'featuredProducts' => Product::where('is_published', true)
                ->where('is_featured', true)
                ->latest() 
                ->take(6)  
                ->get(),

            // 2. Mengambil 3 artikel cerita UMKM terbaru berdasarkan tanggal rilis publikasi
            'latestArticles' => Article::where('is_published', true)
                ->latest('published_at') 
                ->take(3)
                ->get(),

            // 3. Menghitung total produk aktif untuk angka statistik di section Hero
            'productCount' => Product::where('is_published', true)->count(),

            // 4. Mengambil jumlah kunjungan khusus hari ini untuk dikirim ke view beranda
            'totalVisitors' => $visitor->views_count,
        ]);
    }
}