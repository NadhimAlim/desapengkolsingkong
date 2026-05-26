<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        abort_unless(auth()->user()?->is_admin, 403);

        return view('admin.dashboard', [
            'productCount' => Product::count(),
            'articleCount' => Article::count(),
            'publishedProductCount' => Product::where('is_published', true)->count(),
            'publishedArticleCount' => Article::where('is_published', true)->count(),
            'recentProducts' => Product::latest()->take(5)->get(),
            'recentArticles' => Article::latest()->take(5)->get(),
        ]);
    }
}
