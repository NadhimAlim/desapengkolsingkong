@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <section class="detail-section">
        <div class="container detail-grid">
            <div class="detail-media">
                @if ($product->image_path)
                    <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}">
                @else
                    <div class="image-placeholder large"><span>{{ strtoupper(substr($product->name, 0, 2)) }}</span></div>
                @endif
            </div>
            <div class="detail-copy">
                <span class="pill">{{ $product->category }}</span>
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <div class="detail-price">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                <div class="detail-stock">Stok tersedia: {{ $product->stock }}</div>
                <a href="https://wa.me/6281234567890?text={{ urlencode('Halo, saya tertarik dengan produk '.$product->name) }}" class="btn btn-dark">Tokepedia</a>
            </div>
        </div>
    </section>
@endsection
