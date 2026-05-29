@extends('layouts.app')

@section('title', 'UMKM Singkong Desa Pengkol')

@section('content')
    <section class="hero"
        style="background-color: #fafafa; padding: 60px 0; font-family: system-ui, -apple-system, sans-serif;">
        <div class="container hero-grid"
            style="max-width: 1200px; margin: 0 auto; padding: 0 24px; display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;">

            <div class="hero-copy" style="display: flex; flex-direction: column; gap: 20px;">
                <span class="eyebrow"
                    style="color: #15803d; font-weight: 700; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">
                    Eksplorasi Rasa Autentik Desa Pengkol
                </span>
                <h1
                    style="font-size: clamp(2rem, 4vw, 3.2rem); color: #111827; font-weight: 800; line-height: 1.15; margin: 0; letter-spacing: -1px;">
                    Mengangkat Singkong Lokal Menjadi Camilan Premium Mendunia.
                </h1>
                <p style="color: #4b5563; font-size: 1.1rem; line-height: 1.6; margin: 0;">
                    Platform digital UMKM Desa Pengkol yang mengintegrasikan potensi pertanian lokal dengan inovasi modern,
                    menghadirkan varian keripik dan kerupuk berkualitas tinggi langsung dari dapur para perajin rumah
                    tangga.
                </p>

                <div class="hero-actions" style="display: flex; gap: 16px; margin-top: 8px;">
                    <a href="{{ route('products.index') }}" class="btn btn-dark"
                        style="background-color: #111827; color: #ffffff; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.2s;">
                        Lihat Produk
                    </a>
                    <a href="{{ route('articles.index') }}" class="btn btn-outline"
                        style="background-color: #ffffff; color: #374151; border: 1px solid #d1d5db; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.2s;">
                        Baca Artikel
                    </a>
                </div>

                <div class="stats-row"
                    style="display: flex; gap: 24px; margin-top: 16px; border-top: 1px solid #e5e7eb; padding-top: 24px;">
                    <div><strong
                            style="display: block; font-size: 1.5rem; color: #111827; font-weight: 800;">{{ $productCount }}+</strong><span
                            style="font-size: 0.85rem; color: #6b7280;">Produk terdata</span></div>
                    <div><strong
                            style="display: block; font-size: 1.5rem; color: #111827; font-weight: 800;">100%</strong><span
                            style="font-size: 0.85rem; color: #6b7280;">Singkong lokal</span></div>
                    <div><strong
                            style="display: block; font-size: 1.5rem; color: #111827; font-weight: 800;">Pengkol</strong><span
                            style="font-size: 0.85rem; color: #6b7280;">Nglipar GunungKidul</span></div>
                </div>
            </div>

            <div class="hero-visual-new" style="width: 100%; display: flex; justify-content: center; align-items: center;">
                <div
                    style="position: relative; width: 100%; max-width: 500px; aspect-ratio: 1 / 1; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
                    <img src="{{ asset('images/herosingkong.png') }}" alt="Produk Olahan Singkong Premium Desa Pengkol"
                        style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
            </div>

        </div>
    </section>

    <style>
        @media (max-width: 768px) {
            .hero-grid {
                grid-template-columns: 1fr !important;
                gap: 32px !important;
                text-align: center;
            }

            .hero-actions {
                justify-content: center;
            }

            .stats-row {
                justify-content: center;
                gap: 16px !important;
            }
        }
    </style>

    <section class="section" id="profil">
        <div class="container split">
            <div>
                <span class="eyebrow">Tentang Program</span>
                <h2>Mengangkat potensi singkong Desa Pengkol lewat etalase digital.</h2>
            </div>
            <div class="rich-text">
                <p>Desa Pengkol memiliki potensi UMKM berbasis singkong yang dapat dikembangkan menjadi produk bernilai
                    jual. Website ini dirancang sebagai media promosi, katalog produk, dan kanal informasi bagi pelaku usaha
                    lokal.</p>
                <p>Admin dapat mengelola produk dan artikel secara mandiri melalui dashboard, termasuk mengunggah foto,
                    mengatur harga, stok, dan status publikasi.</p>
            </div>
        </div>
    </section>

    <section class="section muted" style="background-color: #f8fafc; padding: 100px 0; font-family: system-ui, sans-serif;">
        <div class="container section-head"
            style="max-width: 1200px; margin: 0 auto; padding: 0 24px; display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 48px;">
            <div style="display: flex; flex-direction: column; gap: 8px;">
                <span class="eyebrow"
                    style="color: #16a34a; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; display: block;">
                    Produk Rilis Terbaru
                </span>
                <h2 style="font-size: 2.2rem; color: #0f172a; font-weight: 800; margin: 0; letter-spacing: -0.5px;">
                    Katalog Olahan Singkong Premium
                </h2>
            </div>
            <a href="{{ route('products.index') }}" class="text-link"
                style="color: #16a34a; font-weight: 600; text-decoration: none; font-size: 0.95rem; display: flex; align-items: center; gap: 6px; transition: color 0.2s;"
                onmouseover="this.style.color='#15803d'" onmouseout="this.style.color='#16a34a'">
                Lihat Semua Produk &rarr;
            </a>
        </div>

        <div class="container card-grid"
            style="max-width: 1200px; margin: 0 auto; padding: 0 24px; display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 32px;">
            @forelse ($featuredProducts as $product)
                <x-product-card :product="$product" />
            @empty
                <div class="empty-state"
                    style="grid-column: 1 / -1; background-color: #ffffff; text-align: center; padding: 60px 20px; border-radius: 12px; border: 1px dashed #cbd5e1; color: #64748b; font-size: 1rem; font-weight: 500;">
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <section class="testimoni-section">
        <div class="testimoni-container">

            <div class="testimoni-header">
                <span class="testimoni-eyebrow">Apresiasi & Ulasan</span>
                <h2 class="testimoni-title">Apa Kata Mereka Tentang Kami?</h2>
                <div class="testimoni-divider"></div>
            </div>

            <div class="swiper testimoniSwiper">
                <div class="swiper-wrapper" style="padding-bottom: 30px;">

                    <div class="swiper-slide testimoni-card">
                        <div class="testimoni-content">
                            <div class="quote-icon">“</div>
                            <div class="rating-stars">⭐⭐⭐⭐⭐</div>
                            <p class="testimoni-text">
                                "Keripik singkong dari Desa Pengkol renyahnya beda banget! Potongannya tipis, bumbunya
                                merata, dan tidak berminyak sama sekali. Kemasannya juga sangat modern dan aman untuk
                                dikirim ke luar kota."
                            </p>
                        </div>
                        <div class="testimoni-profile">
                            <div class="profile-avatar avatar-green">R</div>
                            <div class="profile-info">
                                <strong class="profile-name">Rian Perkasa</strong>
                                <span class="profile-role">Konsumen Setia (Yogyakarta)</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide testimoni-card">
                        <div class="testimoni-content">
                            <div class="quote-icon">“</div>
                            <div class="badge-sinergi">🤝 Sinergi Ormawa</div>
                            <p class="testimoni-text">
                                "Kehadiran website katalog ini sangat membantu kelompok ibu-ibu KWT dan pengrajin lokal
                                memasarkan hasil olahannya. Sekarang pemesanan produk singkong kami jadi jauh lebih tertata
                                dan dikenal luas."
                            </p>
                        </div>
                        <div class="testimoni-profile">
                            <div class="profile-avatar avatar-dark">I</div>
                            <div class="profile-info">
                                <strong class="profile-name">Ibu Sri Rahayu</strong>
                                <span class="profile-role">Ketua Mitra UMKM Desa Pengkol</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide testimoni-card">
                        <div class="testimoni-content">
                            <div class="quote-icon">“</div>
                            <div class="rating-stars">⭐⭐⭐⭐⭐</div>
                            <p class="testimoni-text">
                                "Inovasi hilirisasi yang luar biasa dari mahasiswa. Produk kerupuk singkong desa yang
                                tadinya dijual konvensional, kini naik kelas melalui digitalisasi pasar yang rapi dan
                                informatif."
                            </p>
                        </div>
                        <div class="testimoni-profile">
                            <div class="profile-avatar avatar-gold">P</div>
                            <div class="profile-info">
                                <strong class="profile-name">Prof. Dr. Ahmad M.</strong>
                                <span class="profile-role">Penilai Lapangan Program PPKO</span>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide testimoni-card">
                        <div class="testimoni-content">
                            <div class="quote-icon">“</div>
                            <div class="rating-stars">⭐⭐⭐⭐⭐</div>
                            <p class="testimoni-text">
                                "Rasa manis gurih alami dari keripik singkong balado tradisionalnya benar-benar melekat.
                                Sistem pemesanan lewat katalog web ini memudahkan instansi kami saat memesan dalam jumlah
                                besar untuk oleh-oleh."
                            </p>
                        </div>
                        <div class="testimoni-profile">
                            <div class="profile-avatar avatar-green">A</div>
                            <div class="profile-info">
                                <strong class="profile-name">Anisa Fitri</strong>
                                <span class="profile-role">Pembeli Grosir (Solo)</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-button-next-custom">🡪</div>
                <div class="swiper-button-prev-custom">🡨</div>

                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const swiper = new Swiper('.testimoniSwiper', {
                slidesPerView: 1,
                spaceBetween: 32,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },
                // Sistem Breakpoint Responsif Layar
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                }
            });
        });
    </script>

    <style>
        .testimoni-section {
            padding: 100px 0;
            background-color: #ffffff;
            font-family: 'Inter', system-ui, sans-serif;
        }

        .testimoni-container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header */
        .testimoni-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .testimoni-eyebrow {
            color: #16a34a;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: block;
            margin-bottom: 12px;
        }

        .testimoni-title {
            font-size: 2.3rem;
            color: #0f172a;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.03em;
        }

        .testimoni-divider {
            width: 50px;
            height: 4px;
            background-color: #16a34a;
            border-radius: 2px;
            margin: 18px auto 0;
        }

        /* Swiper Container Customization */
        .testimoniSwiper {
            position: relative;
            padding: 20px 40px !important;
        }

        /* Kartu Desain */
        .testimoni-card {
            background-color: #f8fafc;
            padding: 36px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: auto;
            /* Biar tinggi seragam otomatis mengikuti isi slide terpanjang */
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        .testimoni-card:hover {
            transform: translateY(-5px);
            border-color: #16a34a;
            background-color: #ffffff;
            box-shadow: 0 15px 30px -10px rgba(22, 163, 74, 0.08);
        }

        .testimoni-content {
            position: relative;
        }

        .quote-icon {
            position: absolute;
            top: -25px;
            left: -10px;
            font-size: 5rem;
            color: #e2e8f0;
            font-family: Georgia, serif;
            z-index: 1;
            opacity: 0.7;
            user-select: none;
        }

        .rating-stars {
            color: #f59e0b;
            font-size: 1.1rem;
            margin-bottom: 16px;
            position: relative;
            z-index: 2;
        }

        .badge-sinergi {
            display: inline-block;
            background-color: #dcfce7;
            color: #15803d;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 30px;
            margin-bottom: 16px;
            position: relative;
            z-index: 2;
        }

        .testimoni-text {
            color: #475569;
            font-size: 1rem;
            line-height: 1.6;
            font-style: italic;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        /* Profil Pengulas */
        .testimoni-profile {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 28px;
            border-top: 1px solid #e2e8f0;
            padding-top: 16px;
        }

        .profile-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
            color: #ffffff;
        }

        .avatar-green {
            background: linear-gradient(135deg, #22c55e, #16a34a);
        }

        .avatar-dark {
            background: linear-gradient(135deg, #334155, #1e293b);
        }

        .avatar-gold {
            background: linear-gradient(135deg, #eab308, #ca8a04);
        }

        .profile-name {
            color: #0f172a;
            font-size: 0.95rem;
            font-weight: 700;
            display: block;
        }

        .profile-role {
            color: #64748b;
            font-size: 0.85rem;
        }

        /* TOMBOL NAVIGASI PANAH CUSTOM PREMIUM (Kanan & Kiri) */
        .swiper-button-next-custom,
        .swiper-button-prev-custom {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            color: #334155;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            z-index: 10;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .swiper-button-next-custom {
            right: -5px;
        }

        .swiper-button-prev-custom {
            left: -5px;
        }

        .swiper-button-next-custom:hover,
        .swiper-button-prev-custom:hover {
            background-color: #16a34a;
            color: #ffffff;
            border-color: #16a34a;
            box-shadow: 0 10px 15px -3px rgba(22, 163, 74, 0.2);
        }

        /* Warna Dot Pagination Aktif */
        .swiper-pagination-bullet-active {
            background: #16a34a !important;
            width: 18px !important;
            border-radius: 4px !important;
        }

        /* Responsif Layar HP */
        @media (max-width: 768px) {
            .testimoni-section {
                padding: 60px 0;
            }

            .testimoni-title {
                font-size: 1.8rem;
            }

            .testimoniSwiper {
                padding: 10px 0 !important;
            }

            /* Sembunyikan panah di HP agar layar bersih, user bisa geser langsung sentuh jempol (swipe) */
            .swiper-button-next-custom,
            .swiper-button-prev-custom {
                display: none;
            }
        }
    </style>

    <section class="faq-section">
        <div class="faq-container">

            <div class="faq-header">
                <span class="faq-eyebrow">Pertanyaan Umum</span>
                <h2 class="faq-title">Frequently Asked Questions</h2>
                <div class="faq-divider"></div>
            </div>

            <div class="faq-accordion-wrapper">

                <div class="faq-item">
                    <button class="faq-trigger">
                        <span class="faq-question">Apa yang membuat keripik singkong Desa Pengkol berbeda dengan keripik
                            biasa?</span>
                        <span class="faq-icon-arrow"></span>
                    </button>
                    <div class="faq-panel">
                        <div class="faq-body">
                            <p>Keripik singkong kami diproduksi dari jenis singkong lokal pilihan hasil bumi Desa Pengkol
                                yang terkenal memiliki tekstur empuk dan gurih alami. Dipotong dengan ketipisan yang presisi
                                dan diolah menggunakan resep tradisional, menghasilkan keripik yang ekstra renyah, bumbu
                                merata, dan tidak meninggalkan minyak berlebih.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-trigger">
                        <span class="faq-question">Apakah produk camilan singkong ini menggunakan pengawet atau pewarna
                            kimia?</span>
                        <span class="faq-icon-arrow"></span>
                    </button>
                    <div class="faq-panel">
                        <div class="faq-body">
                            <p>Sama sekali tidak. Seluruh produk olahan kami, baik keripik maupun kerupuk, dijamin 100%
                                menggunakan bahan baku alami, bebas pengawet, dan tanpa pewarna buatan. Kami memanfaatkan
                                metode pengemasan modern kedap udara (premium packaging) untuk menjaga daya tahan produk
                                agar tetap fresh hingga sampai ke tangan konsumen.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-trigger">
                        <span class="faq-question">Varian rasa apa saja yang tersedia di katalog online ini?</span>
                        <span class="faq-icon-arrow"></span>
                    </button>
                    <div class="faq-panel">
                        <div class="faq-body">
                            <p>Kami menyediakan berbagai varian rasa premium untuk memenuhi selera pasar. Mulai dari rasa
                                Original Gurih Tradisional, Balado Pedas Manis, Keju Premium, hingga varian Kerupuk Singkong
                                bumbu bawang yang renyah. Anda dapat melihat detail komposisi lengkapnya pada halaman
                                katalog masing-masing produk.</p>
                        </div>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-trigger">
                        <span class="faq-question">Bagaimana sistem pemesanan dan metode pengirimannya?</span>
                        <span class="faq-icon-arrow"></span>
                    </button>
                    <div class="faq-panel">
                        <div class="faq-body">
                            <p>Pemesanan dapat dilakukan langsung dengan mengklik tombol beli pada produk yang Anda pilih di
                                website ini. Sistem akan langsung menghubungkan Anda ke WhatsApp resmi pengrajin lokal Desa
                                Pengkol untuk konfirmasi alamat dan total ongkos kirim. Kami siap melayani pengiriman retail
                                (eceran) maupun pesanan dalam partai besar (grosir) ke seluruh Indonesia.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const faqTriggers = document.querySelectorAll(".faq-trigger");

            faqTriggers.forEach(trigger => {
                trigger.addEventListener("click", function() {
                    const currentItem = this.parentNode;
                    const panel = this.nextElementSibling;

                    // Menutup panel lain agar tetap rapi (Single Active Mode)
                    document.querySelectorAll(".faq-item").forEach(item => {
                        if (item !== currentItem && item.classList.contains("active")) {
                            item.classList.remove("active");
                            item.querySelector(".faq-panel").style.maxHeight = null;
                        }
                    });

                    // Toggle kelas active pada item yang diklik
                    currentItem.classList.toggle("active");

                    if (currentItem.classList.contains("active")) {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    } else {
                        panel.style.maxHeight = null;
                    }
                });
            });
        });
    </script>

    <style>
        .faq-section {
            padding: 100px 0;
            background-color: #f8fafc;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header */
        .faq-header {
            text-align: center;
            margin-bottom: 55px;
        }

        .faq-eyebrow {
            color: #16a34a;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: block;
            margin-bottom: 12px;
        }

        .faq-title {
            font-size: 2.3rem;
            color: #0f172a;
            font-weight: 800;
            margin: 0;
            letter-spacing: -0.03em;
        }

        .faq-divider {
            width: 50px;
            height: 4px;
            background-color: #16a34a;
            border-radius: 2px;
            margin: 18px auto 0;
        }

        /* Wrapper Accordion */
        .faq-accordion-wrapper {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .faq-item {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.01);
        }

        .faq-item:hover {
            border-color: #cbd5e1;
            box-shadow: 0 10px 15px -3px rgba(15, 23, 42, 0.03);
        }

        .faq-trigger {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 28px;
            background: none;
            border: none;
            outline: none;
            cursor: pointer;
            text-align: left;
        }

        .faq-question {
            font-size: 1.1rem;
            color: #1e293b;
            font-weight: 600;
            line-height: 1.5;
            padding-right: 20px;
        }

        /* Custom CSS Arrow Indicator */
        .faq-icon-arrow {
            position: relative;
            width: 12px;
            height: 12px;
            flex-shrink: 0;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .faq-icon-arrow::before,
        .faq-icon-arrow::after {
            content: "";
            position: absolute;
            background-color: #64748b;
        }

        .faq-icon-arrow::before {
            top: 4px;
            left: 0;
            width: 8px;
            height: 2px;
            transform: rotate(45deg);
        }

        .faq-icon-arrow::after {
            top: 4px;
            right: 0;
            width: 8px;
            height: 2px;
            transform: rotate(-45deg);
        }

        /* Panel Konten Animasi */
        .faq-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .faq-body {
            padding: 0 28px 24px 28px;
        }

        .faq-body p {
            color: #475569;
            font-size: 1rem;
            line-height: 1.65;
            margin: 0;
            text-align: justify;
        }

        /* Keadaan Aktif (FAQ Terbuka) */
        .faq-item.active {
            border-color: #16a34a;
            box-shadow: 0 10px 20px -5px rgba(22, 163, 74, 0.05);
        }

        .faq-item.active .faq-trigger {
            background-color: #f8fafc;
        }

        .faq-item.active .faq-question {
            color: #16a34a;
        }

        .faq-item.active .faq-icon-arrow {
            transform: rotate(180deg);
        }

        .faq-item.active .faq-icon-arrow::before,
        .faq-item.active .faq-icon-arrow::after {
            background-color: #16a34a;
        }

        /* Responsif Mobile Screen */
        @media (max-width: 768px) {
            .faq-section {
                padding: 70px 0;
            }

            .faq-title {
                font-size: 1.8rem;
            }

            .faq-trigger {
                padding: 20px;
            }

            .faq-body {
                padding: 0 20px 20px 20px;
            }

            .faq-question {
                font-size: 1rem;
            }

            .faq-body p {
                font-size: 0.95rem;
            }
        }
    </style>
@endsection
