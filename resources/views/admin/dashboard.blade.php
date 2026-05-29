@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')

@section('content')
    <section class="metric-grid">
        <div class="metric-card" style="border-left: 4px solid #10b981;">
            <span>Total Pengunjung</span>
            <strong>{{ number_format($totalVisitors, 0, ',', '.') }}</strong>
        </div>

        <div class="metric-card">
            <span>Total Porduk</span>
            <strong>{{ $productCount }}</strong>
        </div>
        
        <div class="metric-card">
            <span>Produk Publik</span>
            <strong>{{ $publishedProductCount }}</strong>
        </div>
        
        <div class="metric-card">
            <span>Total Artikel</span>
            <strong>{{ $articleCount }}</strong>
        </div>
        
        

        <div class="metric-card" style="border-left: 4px solid #3b82f6;">
            <span>Pengunjung Hari Ini</span>
            <strong>{{ number_format($todayVisitors, 0, ',', '.') }}</strong>
        </div>

        <div class="metric-card" style="border-left: 4px solid #f59e0b;">
            <span>Pengunjung Bulan Ini</span>
            <strong>{{ number_format($monthVisitors, 0, ',', '.') }}</strong>
        </div>

        <div class="metric-card" style="border-left: 4px solid #10b981;">
            <span>Total Pengunjung</span>
            <strong>{{ number_format($totalVisitors, 0, ',', '.') }}</strong>
        </div>
    </section>

    <section class="admin-grid">
        <div class="panel">
            <div class="panel-head">
                <h2>Produk Terbaru</h2>
                <a href="{{ route('admin.products.create') }}" class="btn btn-dark btn-sm">Tambah Produk</a>
            </div>
            <div class="simple-list">
                @forelse ($recentProducts as $product)
                    <div>
                        <strong>{{ $product->name }}</strong>
                        <span>Rp{{ number_format($product->price, 0, ',', '.') }} - {{ $product->is_published ? 'Publik' : 'Draft' }}</span>
                    </div>
                @empty
                    <p class="muted-text">Belum ada produk.</p>
                @endforelse
            </div>
        </div>

        <div class="panel">
            <div class="panel-head">
                <h2>Artikel Terbaru</h2>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-dark btn-sm">Tambah Artikel</a>
            </div>
            <div class="simple-list">
                @forelse ($recentArticles as $article)
                    <div>
                        <strong>{{ $article->title }}</strong>
                        <span>{{ $article->is_published ? 'Publik' : 'Draft' }} - {{ $article->updated_at->format('d M Y') }}</span>
                    </div>
                @empty
                    <p class="muted-text">Belum ada artikel.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection