@props(['product'])

<article class="card product-card">
    <a href="{{ route('products.show', $product) }}" class="media-frame">
        @if ($product->image_path)
            <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}">
        @else
            <div class="image-placeholder">
                <span>{{ strtoupper(substr($product->name, 0, 2)) }}</span>
            </div>
        @endif
    </a>
    <div class="card-body">
        <span class="pill">{{ $product->category }}</span>
        <h3><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>
        <p>{{ str($product->description)->limit(115) }}</p>
        <div class="card-meta">
            <strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong>
            <span>Stok {{ $product->stock }}</span>
        </div>
    </div>
</article>
