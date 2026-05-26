<footer class="footer" id="kontak">
    <div class="container footer-grid">
        <div>
            <a href="{{ route('home') }}" class="brand brand-light">
                <span class="brand-mark">SP</span>
                <span>
                    <strong>Singkong Pengkol</strong>
                    <small>UMKM Desa</small>
                </span>
            </a>
            <p>Platform digital untuk mengenalkan produk olahan singkong Desa Pengkol: keripik, kerupuk, camilan, dan cerita usaha warga.</p>
        </div>
        <div>
            <h3>Navigasi</h3>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('products.index') }}">Produk</a>
            <a href="{{ route('articles.index') }}">Artikel</a>
            <a href="{{ route('login') }}">Admin</a>
        </div>
        <div>
            <h3>Kontak</h3>
            <p>Desa Pengkol, Indonesia</p>
            <p>WhatsApp: 0812-3456-7890</p>
            <p>Email: umkm@desapengkol.id</p>
        </div>
    </div>
    <div class="container footer-bottom">
        <span>&copy; {{ date('Y') }} UMKM Singkong Desa Pengkol.</span>
        <span>Dibangun untuk program PPKO.</span>
    </div>
</footer>
