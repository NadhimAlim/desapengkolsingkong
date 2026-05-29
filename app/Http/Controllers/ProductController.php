<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\VisitorCount; // Ditambahkan untuk melacak pengunjung
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        // Cari data visitor untuk halaman 'home', jika belum ada maka otomatis buat baru
        $visitor = VisitorCount::firstOrCreate(['page_name' => 'home']);
        
        // Otomatis menambah +1 setiap halaman katalog dibuka oleh pengunjung
        $visitor->increment('views_count'); 

        return view('products.index', [
            'products' => Product::where('is_published', true)->latest()->paginate(9),
        ]);
    }

    public function show(Product $product): View
    {
        abort_unless($product->is_published, 404);

        return view('products.show', compact('product'));
    }
}