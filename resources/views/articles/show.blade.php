@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <article class="article-detail">
        <div class="container narrow">
            <span class="pill">{{ optional($article->published_at)->format('d M Y') }}</span>
            <h1>{{ $article->title }}</h1>
            @if ($article->excerpt)
                <p class="lead">{{ $article->excerpt }}</p>
            @endif
        </div>
        <div class="container article-cover">
            @if ($article->image_path)
                <img src="{{ asset('storage/'.$article->image_path) }}" alt="{{ $article->title }}">
            @else
                <div class="image-placeholder large article"><span>Artikel UMKM</span></div>
            @endif
        </div>
        <div class="container narrow rich-text article-content">
            {!! nl2br(e($article->content)) !!}
            
            <hr style="margin: 40px 0 30px 0; border: 0; border-top: 1px solid #e2e8f0;">
            
            <div class="article-navigation" style="display: flex; justify-content: space-between; gap: 20px; margin-bottom: 40px;">
                
                <div style="flex: 1; text-align: left;">
                    @if ($previous)
                        <span style="font-size: 0.85rem; color: #718096; display: block; margin-bottom: 4px;">&larr; Artikel Sebelumnya</span>
                        <a href="{{ route('articles.show', $previous) }}" style="color: #1e3a1f; font-weight: 600; text-decoration: none; font-size: 0.95rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $previous->title }}
                        </a>
                    @endif
                </div>

                <div style="flex: 1; text-align: right;">
                    @if ($next)
                        <span style="font-size: 0.85rem; color: #718096; display: block; margin-bottom: 4px;">Artikel Selanjutnya &rarr;</span>
                        <a href="{{ route('articles.show', $next) }}" style="color: #1e3a1f; font-weight: 600; text-decoration: none; font-size: 0.95rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $next->title }}
                        </a>
                    @endif
                </div>

            </div>
            <hr style="margin: 20px 0 20px 0; border: 0; border-top: 1px solid #e2e8f0;">
            
            <div class="back-to-home" style="margin-bottom: 40px; text-align: center;">
                <a href="{{ url('/') }}" style="display: inline-flex; align-items: center; padding: 10px 20px; background-color: #1e3a1f; color: white; border-radius: 6px; text-decoration: none; font-weight: 500; font-size: 0.95rem; transition: background-color 0.2s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 8px;">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Kembali ke Utama
                </a>
            </div>
        </div>
    </article>
@endsection