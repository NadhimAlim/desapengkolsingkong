<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UMKM Singkong Desa Pengkol')</title>
    @yield('seo_meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-body">
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
