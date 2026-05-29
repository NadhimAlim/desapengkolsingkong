<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\VisitorCount; // Model VisitorCount sudah terimport dengan aman
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda dengan data terurut dari yang paling terbaru
     * sekaligus mencatat statistik kunjungan.
     */
    public function __invoke(): View
    {
        // LOGIKA BARU: Cari data 'home', jika belum ada otomatis buat baru, lalu tambah hitungan +1
        $visitor = VisitorCount::firstOrCreate(['page_name' => 'home']);
        $visitor->increment('views_count');

        return view('home', [
            // 1. Mengambil produk unggulan rilis TERBARU (Maksimal 6 produk)
            'featuredProducts' => Product::where('is_published', true)
                ->where('is_featured', true)
                ->latest() // Mengurutkan produk berdasarkan inputan terakhir
                ->take(6)  // Membatasi maksimal 6 produk unggulan
                ->get(),

            // 2. Mengambil 3 artikel cerita UMKM terbaru berdasarkan tanggal rilis publikasi
            'latestArticles' => Article::where('is_published', true)
                ->latest('published_at') // Mengurutkan artikel dari waktu rilis paling baru
                ->take(3)
                ->get(),

            // 3. Menghitung total produk aktif untuk angka statistik di section Hero
            'productCount' => Product::where('is_published', true)->count(),

            // 4. Mengambil jumlah kunjungan terbaru yang sudah bertambah untuk dikirim ke view jika dibutuhkan
            'totalVisitors' => $visitor->views_count,
        ]);
    }
}