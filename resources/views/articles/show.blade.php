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
        </div>
    </article>
@endsection
