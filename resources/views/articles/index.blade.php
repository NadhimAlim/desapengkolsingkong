@extends('layouts.app')

@section('title', 'Artikel UMKM Pengkol')

@section('content')
    <section class="page-hero">
        <div class="container">
            <span class="eyebrow">Artikel</span>
            <h1>Cerita, edukasi, dan kabar UMKM Desa Pengkol</h1>
            <p>Konten publikasi untuk memperkenalkan proses, nilai, dan perkembangan usaha singkong lokal.</p>
        </div>
    </section>

    <section class="section">
        <div class="container card-grid three">
            @forelse ($articles as $article)
                <x-article-card :article="$article" />
            @empty
                <div class="empty-state">Belum ada artikel yang dipublikasikan.</div>
            @endforelse
        </div>
        <div class="container pagination-wrap">{{ $articles->links() }}</div>
    </section>
@endsection
