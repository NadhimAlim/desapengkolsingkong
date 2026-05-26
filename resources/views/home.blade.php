@extends('layouts.app')

@section('title', 'UMKM Singkong Desa Pengkol')

@section('content')
    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-copy">
                <span class="eyebrow">PPKO Desa Pengkol</span>
                <h1>Olahan singkong lokal yang renyah, bernilai, dan siap dikenal lebih luas.</h1>
                <p>Website UMKM Desa Pengkol membantu warga memasarkan produk berbahan singkong seperti keripik, kerupuk, dan camilan rumahan dengan tampilan profesional.</p>
                <div class="hero-actions">
                    <a href="{{ route('products.index') }}" class="btn btn-dark">Lihat Produk</a>
                    <a href="{{ route('articles.index') }}" class="btn btn-outline">Baca Artikel</a>
                </div>
                <div class="stats-row">
                    <div><strong>{{ $productCount }}+</strong><span>Produk terdata</span></div>
                    <div><strong>100%</strong><span>Singkong lokal</span></div>
                    <div><strong>PPKO</strong><span>Desa Pengkol</span></div>
                </div>
            </div>
            <div class="hero-visual" aria-label="Produk olahan singkong">
                <div class="cassava-basket">
                    <span>Keripik</span>
                    <span>Kerupuk</span>
                    <span>Camilan</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="profil">
        <div class="container split">
            <div>
                <span class="eyebrow">Tentang Program</span>
                <h2>Mengangkat potensi singkong Desa Pengkol lewat etalase digital.</h2>
            </div>
            <div class="rich-text">
                <p>Desa Pengkol memiliki potensi UMKM berbasis singkong yang dapat dikembangkan menjadi produk bernilai jual. Website ini dirancang sebagai media promosi, katalog produk, dan kanal informasi bagi pelaku usaha lokal.</p>
                <p>Admin dapat mengelola produk dan artikel secara mandiri melalui dashboard, termasuk mengunggah foto, mengatur harga, stok, dan status publikasi.</p>
            </div>
        </div>
    </section>

    <section class="section muted">
        <div class="container section-head">
            <div>
                <span class="eyebrow">Produk Unggulan</span>
                <h2>Katalog olahan singkong</h2>
            </div>
            <a href="{{ route('products.index') }}" class="text-link">Semua produk</a>
        </div>
        <div class="container card-grid">
            @forelse ($featuredProducts as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="empty-state">Produk unggulan belum tersedia. Tambahkan produk melalui dashboard admin.</div>
            @endforelse
        </div>
    </section>

    <section class="section">
        <div class="container section-head">
            <div>
                <span class="eyebrow">Cerita UMKM</span>
                <h2>Artikel terbaru</h2>
            </div>
            <a href="{{ route('articles.index') }}" class="text-link">Semua artikel</a>
        </div>
        <div class="container card-grid three">
            @forelse ($latestArticles as $article)
                <x-article-card :article="$article" />
            @empty
                <div class="empty-state">Artikel belum tersedia. Admin bisa mulai menulis cerita UMKM Desa Pengkol.</div>
            @endforelse
        </div>
    </section>
@endsection
