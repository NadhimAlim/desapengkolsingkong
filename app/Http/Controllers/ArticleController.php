<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('articles.index', [
            'articles' => Article::where('is_published', true)
                ->latest('published_at')
                ->paginate(6),
        ]);
    }

    public function show(Article $article): View
{
    // 1. Amankan halaman: Pastikan artikel sudah dipublikasikan, jika belum tampilkan 404
    abort_unless($article->is_published, 404);

    // 2. Cari artikel sebelumnya (yang ID-nya lebih kecil dan sudah dipublikasikan)
    $previous = Article::where('id', '<', $article->id)
                        ->where('is_published', true)
                        ->orderBy('id', 'desc')
                        ->first();

    // 3. Cari artikel selanjutnya (yang ID-nya lebih besar dan sudah dipublikasikan)
    $next = Article::where('id', '>', $article->id)
                    ->where('is_published', true)
                    ->orderBy('id', 'asc')
                    ->first();

    // 4. Kirim semua data ke view 'articles.show'
    return view('articles.show', compact('article', 'previous', 'next'));
}
}
