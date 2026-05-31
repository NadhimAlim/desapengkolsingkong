<nav class="navbar" data-nav style="background-color: #ffffff; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); padding: 15px 0; position: sticky; top: 0; z-index: 1000; font-family: system-ui, sans-serif;">
    <div class="container nav-inner" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; align-items: center; justify-content: space-between; position: relative;">
        
        <a href="{{ route('home') }}" class="brand" style="display: flex; align-items: center; gap: 12px; text-decoration: none; color: #1a2f1b;">
            <img src="{{ asset('images/logodesa.png') }}" alt="Logo Desa Pengkol" style="height: 42px; width: auto; object-fit: contain; display: block;">
            <span style="display: flex; flex-direction: column;">
                <strong style="font-size: 1.2rem; color: #111827; letter-spacing: -0.3px; line-height: 1.2;">Singkong Pengkol</strong>
                <small style="color: #047857; font-size: 0.8rem; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; margin-top: 2px;">UMKM Desa</small>
            </span>
        </a>
        <div class="nav-links" id="nav-menu">
            <a href="{{ route('home') }}#profil" style="color: #4b5563; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: color 0.2s;" onmouseover="this.style.color='#047857'" onmouseout="this.style.color='#4b5563'">Profil</a>
            <a href="{{ route('products.index') }}" style="color: #4b5563; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: color 0.2s;" onmouseover="this.style.color='#047857'" onmouseout="this.style.color='#4b5563'">Produk</a>
            <a href="{{ route('articles.index') }}" style="color: #4b5563; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: color 0.2s;" onmouseover="this.style.color='#047857'" onmouseout="this.style.color='#4b5563'">Artikel</a>
            <a href="{{ route('home') }}#kontak" style="color: #4b5563; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: color 0.2s;" onmouseover="this.style.color='#047857'" onmouseout="this.style.color='#4b5563'">Kontak</a>
            
            <div class="language-wrapper" style="position: relative; display: inline-block;">
                <select id="language-switcher" onchange="changeLanguage(this.value)" style="background-color: #f1f5f9; color: #1e293b; font-size: 0.85rem; font-weight: 600; padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e1; cursor: pointer; outline: none; font-family: inherit;">
                    <option value="id">🇮🇩 Indonesia</option>
                    <option value="en">🇺🇸 English</option>
                </select>
            </div>

            <a href="{{ route('login') }}" class="btn btn-dark btn-sm" style="background-color: #1a2f1b; color: #ffffff; text-decoration: none; font-size: 0.9rem; font-weight: 500; padding: 10px 18px; border-radius: 6px; box-shadow: 0 2px 4px rgba(26, 47, 27, 0.2); transition: all 0.2s; text-align: center; display: block;" onmouseover="this.style.backgroundColor='#2e5a31';" onmouseout="this.style.backgroundColor='#1a2f1b';">
                Admin
            </a>
        </div>

        <button type="button" id="tombol-garis-tiga" aria-label="Buka menu">
            <span class="baris-1"></span>
            <span class="baris-2"></span>
            <span class="baris-3"></span>
        </button>

    </div>
</nav>

<div id="google_translate_element" style="display:none;"></div>

<style>
    .goog-te-banner-frame.skiptranslate, .goog-te-gadget-icon, .goog-te-gadget span { display: none !important; }
    body { top: 0px !important; }
    .goog-te-balloon-frame { display: none !important; }

    #tombol-garis-tiga {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        flex-direction: column;
        gap: 5px;
        padding: 10px;
        z-index: 2000;
    }

    #tombol-garis-tiga span {
        display: block;
        width: 25px;
        height: 3px;
        background-color: #1a2f1b;
        border-radius: 2px;
        transition: 0.3s;
    }

    @media (min-width: 769px) {
        #nav-menu {
            display: flex !important;
            align-items: center;
            gap: 28px;
        }
    }

    @media (max-width: 768px) {
        #tombol-garis-tiga {
            display: flex !important;
            position: absolute !important;
            right: 20px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
        }

        #nav-menu {
            display: none !important;
            flex-direction: column !important;
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            width: 100% !important;
            background-color: #ffffff !important;
            padding: 20px !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
            gap: 15px !important;
            box-sizing: border-box !important;
            border-top: 1px solid #f3f4f6 !important;
            z-index: 1500 !important;
        }

        #nav-menu.tampilkan-menu {
            display: flex !important;
        }

        #nav-menu a, .language-wrapper {
            display: block !important;
            width: 100% !important;
            padding: 12px 0 !important;
            border-bottom: 1px solid #f3f4f6 !important;
            box-sizing: border-box;
        }

        #language-switcher {
            width: 100% !important;
            padding: 12px !important;
        }
        
        #nav-menu a.btn {
            border-bottom: none !important;
            margin-top: 8px !important;
        }
    }
</style>

<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'id', 
            includedLanguages: 'id,en', 
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    }

    function changeLanguage(langCode) {
        localStorage.setItem('pilihan_bahasa_umkm', langCode);

        document.cookie = "googtrans=/id/" + langCode + "; path=/;";
        document.cookie = "googtrans=/id/" + langCode + "; domain=" + window.location.hostname + "; path=/;";

        const googleSelect = document.querySelector('.goog-te-combo');
        if (googleSelect) {
            googleSelect.value = langCode;
            googleSelect.dispatchEvent(new Event('change'));
        } else {
            window.location.reload();
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const bahasaTerakhir = localStorage.getItem('pilihan_bahasa_umkm');

        if (bahasaTerakhir === 'en') {
            document.cookie = "googtrans=/id/en; path=/;";
            const switcher = document.getElementById('language-switcher');
            if (switcher) switcher.value = 'en';
        }

        const script = document.createElement('script');
        script.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
        document.body.appendChild(script);

        setTimeout(() => {
            const switcher = document.getElementById('language-switcher');
            if (switcher && bahasaTerakhir) {
                switcher.value = bahasaTerakhir;
                
                const googleSelect = document.querySelector('.goog-te-combo');
                if (googleSelect && googleSelect.value !== bahasaTerakhir) {
                    googleSelect.value = bahasaTerakhir;
                    googleSelect.dispatchEvent(new Event('change'));
                }
            }
        }, 1000);

        const tombol = document.getElementById('tombol-garis-tiga');
        const menuUtama = document.getElementById('nav-menu');

        if(tombol && menuUtama) {
            tombol.addEventListener('click', function (e) {
                e.stopPropagation(); 
                menuUtama.classList.toggle('tampilkan-menu');
                
                const b1 = tombol.querySelector('.baris-1');
                const b2 = tombol.querySelector('.baris-2');
                const b3 = tombol.querySelector('.baris-3');

                if (menuUtama.classList.contains('tampilkan-menu')) {
                    b1.style.transform = 'rotate(45deg) translate(5px, 5px)';
                    b2.style.opacity = '0';
                    b3.style.transform = 'rotate(-45deg) translate(6px, -6px)';
                } else {
                    b1.style.transform = 'none';
                    b2.style.opacity = '1';
                    b3.style.transform = 'none';
                }
            });

            document.addEventListener('click', function () {
                if(menuUtama.classList.contains('tampilkan-menu')) {
                    menuUtama.classList.remove('tampilkan-menu');
                    tombol.querySelector('.baris-1').style.transform = 'none';
                    tombol.querySelector('.baris-2').style.opacity = '1';
                    tombol.querySelector('.baris-3').style.transform = 'none';
                }
            });
        }
    });
</script>