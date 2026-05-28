@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <article class="article-detail" style="background-color: #ffffff; padding: 60px 0 100px 0; font-family: system-ui, -apple-system, sans-serif;">
        
        <div class="container narrow" style="max-width: 740px; margin: 0 auto; padding: 0 24px; text-align: center; display: flex; flex-direction: column; gap: 16px;">
            <div>
                <span class="pill" style="background-color: #f1f5f9; color: #475569; font-size: 0.85rem; font-weight: 600; padding: 6px 16px; border-radius: 50px; display: inline-block;">
                    📅 {{ optional($article->published_at)->format('d M Y') }}
                </span>
            </div>
            
            <h1 style="font-size: clamp(2rem, 4vw, 2.8rem); color: #0f172a; font-weight: 800; line-height: 1.25; letter-spacing: -1px; margin: 0;">
                {{ $article->title }}
            </h1>
            
            @if ($article->excerpt)
                <p class="lead" style="color: #475569; font-size: 1.2rem; line-height: 1.6; font-style: italic; margin: 8px 0 0 0; border-left: 3px solid #cbd5e1; padding-left: 16px; text-align: left;">
                    {{ $article->excerpt }}
                </p>
            @endif
        </div>

        <div class="container article-cover" style="max-width: 900px; margin: 40px auto; padding: 0 24px;">
            <div style="border-radius: 16px; overflow: hidden; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05);">
                @if ($article->image_path)
                    <img src="{{ asset('storage/'.$article->image_path) }}" alt="{{ $article->title }}" style="width: 100%; height: auto; max-height: 480px; object-fit: cover; display: block;">
                @else
                    <div class="image-placeholder large article" style="width: 100%; height: 350px; background: linear-gradient(135deg, #1e3a1f 0%, #064e3b 100%); display: flex; align-items: center; justify-content: center;">
                        <span style="color: #ffffff; font-size: 1.5rem; font-weight: 700; letter-spacing: 1px;">📖 Dokumen Publikasi Desa Pengkol</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="container narrow rich-text article-content" style="max-width: 740px; margin: 0 auto; padding: 0 24px; color: #334155; font-size: 1.15rem; line-height: 1.8; text-align: justify; font-weight: 400;">
            <div style="margin-bottom: 50px;">
                {!! nl2br(e($article->content)) !!}
            </div>
            
            <hr style="margin: 40px 0; border: 0; border-top: 1px solid #f1f5f9;">
            
            <div class="article-navigation" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 50px;">
                
                <div style="background-color: #f8fafc; padding: 20px; border-radius: 12px; border: 1px solid #f1f5f9; display: flex; flex-direction: column; justify-content: space-between;">
                    @if ($previous)
                        <div>
                            <span style="font-size: 0.8rem; color: #16a34a; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: block; margin-bottom: 6px;">&larr; SEBELUMNYA</span>
                            <a href="{{ route('articles.show', $previous) }}" style="color: #0f172a; font-weight: 600; text-decoration: none; font-size: 0.95rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.4;" onmouseover="this.style.color='#16a34a'" onmouseout="this.style.color='#0f172a'">
                                {{ $previous->title }}
                            </a>
                        </div>
                    @else
                        <span style="font-size: 0.9rem; color: #94a3b8; font-style: italic;">Ini adalah artikel pertama</span>
                    @endif
                </div>

                <div style="background-color: #f8fafc; padding: 20px; border-radius: 12px; border: 1px solid #f1f5f9; display: flex; flex-direction: column; justify-content: space-between; text-align: right;">
                    @if ($next)
                        <div>
                            <span style="font-size: 0.8rem; color: #16a34a; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; display: block; margin-bottom: 6px;">SELANJUTNYA &rarr;</span>
                            <a href="{{ route('articles.show', $next) }}" style="color: #0f172a; font-weight: 600; text-decoration: none; font-size: 0.95rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.4;" onmouseover="this.style.color='#16a34a'" onmouseout="this.style.color='#0f172a'">
                                {{ $next->title }}
                            </a>
                        </div>
                    @else
                        <span style="font-size: 0.9rem; color: #94a3b8; font-style: italic;">Ini adalah artikel terbaru</span>
                    @endif
                </div>

            </div>
            
            <div class="back-to-home" style="text-align: center; margin-top: 20px;">
                <a href="{{ url('/') }}" style="display: inline-flex; align-items: center; padding: 12px 28px; background-color: #0f172a; color: white; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.95rem; box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.15); transition: all 0.2s;" onmouseover="this.style.backgroundColor='#1e293b'; this.style.transform='translateY(-1px)';" onmouseout="this.style.backgroundColor='#0f172a'; this.style.transform='translateY(0)';">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 10px; transition: transform 0.2s;">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
            
        </div>
    </article>
@endsection