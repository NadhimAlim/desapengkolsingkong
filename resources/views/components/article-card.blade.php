@props(['article'])

<article class="card article-card">
    <a href="{{ route('articles.show', $article) }}" class="media-frame compact">
        @if ($article->image_path)
            <img src="{{ asset('storage/'.$article->image_path) }}" alt="{{ $article->title }}">
        @else
            <div class="image-placeholder article">
                <span>Artikel</span>
            </div>
        @endif
    </a>
    <div class="card-body">
        <span class="pill">{{ optional($article->published_at)->format('d M Y') ?? 'Draft' }}</span>
        <h3><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h3>
        <p>{{ $article->excerpt ?: str(strip_tags($article->content))->limit(120) }}</p>
    </div>
</article>
