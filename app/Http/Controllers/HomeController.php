<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'featuredProducts' => Product::where('is_published', true)
                ->where('is_featured', true)
                ->latest()
                ->take(6)
                ->get(),
            'latestArticles' => Article::where('is_published', true)
                ->latest('published_at')
                ->take(3)
                ->get(),
            'productCount' => Product::where('is_published', true)->count(),
        ]);
    }
}
