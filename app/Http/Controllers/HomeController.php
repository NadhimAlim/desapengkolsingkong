<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda dengan data terurut dari yang paling terbaru.
     */
    public function __invoke(): View
    {
        return view('home', [
            // 1. Mengambil produk unggulan rilis TERBARU (Maksimal 6 produk)
            'featuredProducts' => Product::where('is_published', true)
                ->where('is_featured', true)
                ->latest() // Mengurutkan produk berdasarkan inputan terakhir
                ->take(6)  // Anda bisa mengganti angka 6 menjadi 4 jika ingin membatasi lebih sedikit
                ->get(),

            // 2. Mengambil 3 artikel cerita UMKM terbaru berdasarkan tanggal rilis publikasi
            'latestArticles' => Article::where('is_published', true)
                ->latest('published_at') // Mengurutkan artikel dari waktu rilis paling baru
                ->take(3)
                ->get(),

            // 3. Menghitung total produk aktif untuk angka statistik di section Hero
            'productCount' => Product::where('is_published', true)->count(),
        ]);
    }
}