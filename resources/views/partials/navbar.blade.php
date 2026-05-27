<nav class="navbar" data-nav style="background-color: #ffffff; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03); padding: 15px 0; position: sticky; top: 0; z-index: 1000; font-family: system-ui, sans-serif;">
    <div class="container nav-inner" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; align-items: center; justify-content: space-between;">
        
        <a href="{{ route('home') }}" class="brand" style="display: flex; align-items: center; gap: 12px; text-decoration: none; color: #1a2f1b;">
            <span class="brand-mark" style="background-color: #1a2f1b; color: #ffffff; padding: 8px 12px; border-radius: 8px; font-weight: bold; font-size: 1.1rem;">SP</span>
            <span style="display: flex; flex-direction: column;">
                <strong style="font-size: 1.2rem; color: #111827; letter-spacing: -0.3px; line-height: 1.2;">Singkong Pengkol</strong>
                <small style="color: #047857; font-size: 0.8rem; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; margin-top: 2px;">UMKM Desa</small>
            </span>
        </a>

        <button class="nav-toggle" type="button" data-nav-toggle aria-label="Buka menu" style="background: none; border: none; cursor: pointer; display: none; flex-direction: column; gap: 5px;">
            <span style="display: block; width: 25px; height: 3px; background-color: #1a2f1b; border-radius: 2px;"></span>
            <span style="display: block; width: 25px; height: 3px; background-color: #1a2f1b; border-radius: 2px;"></span>
            <span style="display: block; width: 25px; height: 3px; background-color: #1a2f1b; border-radius: 2px;"></span>
        </button>

        <div class="nav-links" data-nav-menu style="display: flex; align-items: center; gap: 28px;">
            <a href="{{ route('home') }}#profil" style="color: #4b5563; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: color 0.2s; position: relative;" onmouseover="this.style.color='#047857'" onmouseout="this.style.color='#4b5563'">Profil</a>
            <a href="{{ route('products.index') }}" style="color: #4b5563; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: color 0.2s;" onmouseover="this.style.color='#047857'" onmouseout="this.style.color='#4b5563'">Produk</a>
            <a href="{{ route('articles.index') }}" style="color: #4b5563; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: color 0.2s;" onmouseover="this.style.color='#047857'" onmouseout="this.style.color='#4b5563'">Artikel</a>
            <a href="{{ route('home') }}#kontak" style="color: #4b5563; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: color 0.2s;" onmouseover="this.style.color='#047857'" onmouseout="this.style.color='#4b5563'">Kontak</a>
            
            <a href="{{ route('login') }}" class="btn btn-dark btn-sm" style="background-color: #1a2f1b; color: #ffffff; text-decoration: none; font-size: 0.9rem; font-weight: 500; padding: 8px 18px; border-radius: 6px; box-shadow: 0 2px 4px rgba(26, 47, 27, 0.2); transition: all 0.2s;" onmouseover="this.style.backgroundColor='#2e5a31'; this.style.transform='translateY(-1px)';" onmouseout="this.style.backgroundColor='#1a2f1b'; this.style.transform='translateY(0)';">
                Admin
            </a>
        </div>

    </div>
</nav>