<nav class="navbar" data-nav>
    <div class="container nav-inner">
        <a href="{{ route('home') }}" class="brand">
            <span class="brand-mark">SP</span>
            <span>
                <strong>Singkong Pengkol</strong>
                <small>UMKM Desa</small>
            </span>
        </a>

        <button class="nav-toggle" type="button" data-nav-toggle aria-label="Buka menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="nav-links" data-nav-menu>
            <a href="{{ route('home') }}#profil">Profil</a>
            <a href="{{ route('products.index') }}">Produk</a>
            <a href="{{ route('articles.index') }}">Artikel</a>
            <a href="{{ route('home') }}#kontak">Kontak</a>
            <a href="{{ route('login') }}" class="btn btn-dark btn-sm">Admin</a>
        </div>
    </div>
</nav>
