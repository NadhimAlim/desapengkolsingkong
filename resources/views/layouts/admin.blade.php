<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin UMKM Pengkol')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logodesa.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('seo_meta')

    <style>
        /* Tombol Hamburger (Hanya muncul di HP) */
        .menu-toggle {
            display: none;
            background: #1e293b;
            color: #ffffff;
            border: none;
            padding: 10px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.2rem;
            margin-right: 12px;
            align-items: center;
            justify-content: center;
        }

        /* Overlay gelap saat sidebar aktif di mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 998;
            backdrop-filter: blur(2px);
        }

        /* Responsif Layar Tablet & HP (Maksimal 768px) */
        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
                /* Munculkan tombol hamburger */
            }

            .admin-sidebar {
                position: fixed;
                top: 0;
                left: -260px;
                /* Sembunyikan sidebar ke kiri luar layar */
                width: 260px;
                height: 100%;
                z-index: 999;
                transition: left 0.3s ease;
                box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
            }

            /* Kelas pemicu saat sidebar dibuka di HP */
            .admin-sidebar.mobile-active {
                left: 0;
                /* Geser sidebar ke dalam layar */
            }

            .sidebar-overlay.mobile-active {
                display: block;
            }

            .admin-shell {
                margin-left: 0 !important;
                /* Penuhi layar karena sidebar sudah melayang */
                width: 100% !important;
            }

            .admin-topbar {
                padding: 12px 16px !important;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .admin-topbar>div:first-child {
                display: flex;
                align-items: center;
            }

            .admin-topbar h1 {
                font-size: 1.3rem !important;
                /* Perkecil ukuran judul halaman di HP */
            }

            .admin-topbar .eyebrow {
                display: none;
                /* Sembunyikan teks kecil "Panel Admin" di HP agar hemat ruang */
            }
        }
    </style>
</head>

<body class="admin-body">

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <aside class="admin-sidebar" id="adminSidebar">
        <a href="{{ route('admin.dashboard') }}" class="brand admin-brand">
            <span class="brand-mark">SP</span>
            <span>
                <strong>Admin UMKM</strong>
                <small>Desa Pengkol</small>
            </span>
        </a>

        <nav class="admin-menu">
            <a href="{{ route('admin.dashboard') }}" @class(['active' => request()->routeIs('admin.dashboard')])
                style="display: flex; align-items: center; gap: 10px;">
                <svg style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;"
                    viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="9"></rect>
                    <rect x="14" y="3" width="7" height="5"></rect>
                    <rect x="14" y="12" width="7" height="9"></rect>
                    <rect x="3" y="16" width="7" height="5"></rect>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.products.index') }}" @class(['active' => request()->routeIs('admin.products.*')])
                style="display: flex; align-items: center; gap: 10px;">
                <svg style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;"
                    viewBox="0 0 24 24">
                    <path
                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l-7 4a2 2 0 0 0 2 0l-7-4A2 2 0 0 0 21 16z">
                    </path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
                <span>Produk</span>
            </a>

            <a href="{{ route('admin.articles.index') }}" @class(['active' => request()->routeIs('admin.articles.*')])
                style="display: flex; align-items: center; gap: 10px;">
                <svg style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;"
                    viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                <span>Artikel</span>
            </a>

            <a href="{{ route('home') }}" target="_blank" style="display: flex; align-items: center; gap: 10px;">
                <svg style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path
                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                    </path>
                </svg>
                <span>Lihat Website</span>
            </a>
        </nav>
    </aside>

    <div class="admin-shell">
        <header class="admin-topbar">
            <div>
                <button type="button" class="menu-toggle" onclick="toggleSidebar()">
                    ☰
                </button>
                <div>
                    <span class="eyebrow">Panel Admin</span>
                    <h1>@yield('page_title', 'Dashboard')</h1>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline" type="submit">Keluar</button>
            </form>
        </header>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <main style="padding: 16px;">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.toggle('mobile-active');
            overlay.classList.toggle('mobile-active');
        }
    </script>
</body>

</html>
