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

    <section class="section muted" style="background-color: #f8fafc; padding: 100px 0; font-family: system-ui, sans-serif;">
    <div class="container section-head" style="max-width: 1200px; margin: 0 auto; padding: 0 24px; display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 48px;">
        <div style="display: flex; flex-direction: column; gap: 8px;">
            <span class="eyebrow" style="color: #16a34a; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; display: block;">
                Produk Rilis Terbaru
            </span>
            <h2 style="font-size: 2.2rem; color: #0f172a; font-weight: 800; margin: 0; letter-spacing: -0.5px;">
                Katalog Olahan Singkong Premium
            </h2>
        </div>
        <a href="{{ route('products.index') }}" class="text-link" style="color: #16a34a; font-weight: 600; text-decoration: none; font-size: 0.95rem; display: flex; align-items: center; gap: 6px; transition: color 0.2s;" onmouseover="this.style.color='#15803d'" onmouseout="this.style.color='#16a34a'">
            Lihat Semua Produk &rarr;
        </a>
    </div>

    <div class="container card-grid" style="max-width: 1200px; margin: 0 auto; padding: 0 24px; display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 32px;">
        @forelse ($featuredProducts as $product)
            <x-product-card :product="$product" />
        @empty
            <div class="empty-state" style="grid-column: 1 / -1; background-color: #ffffff; text-align: center; padding: 60px 20px; border-radius: 12px; border: 1px dashed #cbd5e1; color: #64748b; font-size: 1rem; font-weight: 500;">
                📦 Produk unggulan belum tersedia. Silakan tambahkan produk baru melalui dashboard admin.
            </div>
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
