<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Order; // 👈 Pastikan import model Order ini di bagian atas!

class ProductController extends Controller
{
    public function index(): View
    {
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
