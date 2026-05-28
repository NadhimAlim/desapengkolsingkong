<footer class="footer" id="kontak" style="background-color: #1a2f1b; color: #f3f4f6; padding: 60px 0 20px 0; font-family: system-ui, sans-serif;">
    <div class="container footer-grid" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
        
        <div style="display: flex; flex-direction: column; gap: 15px;">
            <a href="{{ route('home') }}" class="brand brand-light" style="display: flex; align-items: center; gap: 12px; text-decoration: none; color: #ffffff;">
                <span class="brand-mark" style="background-color: #2e5a31; color: #ffffff; padding: 8px 12px; border-radius: 8px; font-weight: bold; font-size: 1.2rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">SP</span>
                <span style="display: flex; flex-direction: column;">
                    <strong style="font-size: 1.25rem; letter-spacing: 0.5px;">Singkong Pengkol</strong>
                    <small style="color: #a7f3d0; font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase;">UMKM Desa</small>
                </span>
            </a>
            <p style="color: #9ca3af; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                Platform digital resmi untuk mengenalkan produk unggulan olahan singkong khas Desa Pengkol. Kami mendukung pertumbuhan ekonomi kreatif warga lokal.
            </p>
        </div>

        <div>
            <h3 style="color: #ffffff; font-size: 1.1rem; font-weight: 600; margin-bottom: 20px; position: relative; padding-bottom: 8px;">
                Navigasi
                <span style="position: absolute; bottom: 0; left: 0; width: 35px; height: 2px; background-color: #a7f3d0;"></span>
            </h3>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                <li><a href="{{ route('home') }}" style="color: #9ca3af; text-decoration: none; font-size: 0.95rem; transition: color 0.2s;" onmouseover="this.style.color='#a7f3d0'" onmouseout="this.style.color='#9ca3af'">Beranda</a></li>
                <li><a href="{{ route('products.index') }}" style="color: #9ca3af; text-decoration: none; font-size: 0.95rem; transition: color 0.2s;" onmouseover="this.style.color='#a7f3d0'" onmouseout="this.style.color='#9ca3af'">Daftar Produk</a></li>
                <li><a href="{{ route('articles.index') }}" style="color: #9ca3af; text-decoration: none; font-size: 0.95rem; transition: color 0.2s;" onmouseover="this.style.color='#a7f3d0'" onmouseout="this.style.color='#9ca3af'">Artikel & Berita</a></li>
                <li><a href="{{ route('login') }}" style="color: #9ca3af; text-decoration: none; font-size: 0.95rem; transition: color 0.2s;" onmouseover="this.style.color='#a7f3d0'" onmouseout="this.style.color='#9ca3af'">Portal Admin</a></li>
            </ul>
        </div>

        <div>
            <h3 style="color: #ffffff; font-size: 1.1rem; font-weight: 600; margin-bottom: 20px; position: relative; padding-bottom: 8px;">
                Kontak Kami
                <span style="position: absolute; bottom: 0; left: 0; width: 35px; height: 2px; background-color: #a7f3d0;"></span>
            </h3>
            <div style="display: flex; flex-direction: column; gap: 14px; color: #9ca3af; font-size: 0.95rem;">
                <div style="display: flex; align-items: flex-start; gap: 10px;">
                    <svg style="width: 20px; height: 20px; color: #a7f3d0; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Kebonjero, Pengkol, Kec. Nglipar, Kabupaten Gunungkidul, Daerah Istimewa Yogyakarta</span>
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <svg style="width: 20px; height: 20px; color: #a7f3d0; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <a href="https://wa.me/6281234567890" target="_blank" style="color: #9ca3af; text-decoration: none;" onmouseover="this.style.color='#a7f3d0'" onmouseout="this.style.color='#9ca3af'">0812-3456-7890</a>
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <svg style="width: 20px; height: 20px; color: #a7f3d0; flex-shrink: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <a href="mailto:umkm@desapengkol.id" style="color: #9ca3af; text-decoration: none;" onmouseover="this.style.color='#a7f3d0'" onmouseout="this.style.color='#9ca3af'">umkm@desapengkol.id</a>
                </div>
            </div>
        </div>
    </div>

    <div style="max-width: 1200px; margin: 40px auto 0 auto; padding: 20px 20px 0 20px; border-top: 1px solid rgba(255,255,255,0.1); display: flex; flex-wrap: wrap; justify-content: space-between; gap: 15px; font-size: 0.9rem; color: #9ca3af;">
        <span>&copy; {{ date('Y') }} UMKM Singkong Desa Pengkol. Seluruh Hak Cipta Dilindungi.</span>
        <span style="display: flex; align-items: center; gap: 5px;">
            <svg style="width: 16px; height: 16px; color: #f87171;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
            Dikembangkan untuk Program PPKO Desa Pengkol
        </span>
    </div>
</footer>