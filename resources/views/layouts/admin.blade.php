<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin UMKM Pengkol')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    <aside class="admin-sidebar">
        <a href="{{ route('admin.dashboard') }}" class="brand admin-brand">
            <span class="brand-mark">SP</span>
            <span>
                <strong>Admin UMKM</strong>
                <small>Desa Pengkol</small>
            </span>
        </a>

        <nav class="admin-menu">
            <a href="{{ route('admin.dashboard') }}" @class(['active' => request()->routeIs('admin.dashboard')])>Dashboard</a>
            <a href="{{ route('admin.products.index') }}" @class(['active' => request()->routeIs('admin.products.*')])>Produk</a>
            <a href="{{ route('admin.articles.index') }}" @class(['active' => request()->routeIs('admin.articles.*')])>Artikel</a>
            <a href="{{ route('home') }}" target="_blank">Lihat Website</a>
        </nav>
    </aside>

    <div class="admin-shell">
        <header class="admin-topbar">
            <div>
                <span class="eyebrow">Panel Admin</span>
                <h1>@yield('page_title', 'Dashboard')</h1>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline" type="submit">Keluar</button>
            </form>
        </header>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
