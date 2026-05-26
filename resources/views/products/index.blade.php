@extends('layouts.app')

@section('title', 'Produk UMKM Singkong')

@section('content')
    <section class="page-hero">
        <div class="container">
            <span class="eyebrow">Katalog Produk</span>
            <h1>Produk olahan singkong Desa Pengkol</h1>
            <p>Pilih produk UMKM lokal yang dikelola dan dipublikasikan langsung dari dashboard admin.</p>
        </div>
    </section>

    <section class="section">
        <div class="container card-grid">
            @forelse ($products as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="empty-state">Belum ada produk yang dipublikasikan.</div>
            @endforelse
        </div>
        <div class="container pagination-wrap">{{ $products->links() }}</div>
    </section>
@endsection
