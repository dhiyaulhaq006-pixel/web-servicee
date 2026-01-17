<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Provinsi Guide</title>

    {{-- CSS utama --}}
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <!-- HEADER / NAVBAR (SAMA DENGAN USER) -->
    <header class="navbar">
        <h1 class="logo">
            <img src="/images/logo.png" alt="Logo Indonesia Travel Guide" class="logo-img">

            <div class="logo-text">
                <span>Admin</span>
                <span>Provinsi</span>
                <span>Guide</span>
            </div>
        </h1>

        <nav>
            <a href="/admin/dashboard">Dashboard</a>
            <a href="/admin/provinces">Provinsi</a>
            <a href="/admin/contents">Konten</a>
            <a href="/admin/logout">Logout</a>
        </nav>
    </header>

    <!-- CONTENT -->
    <main>
        @yield('content')
    </main>

</body>
</html>
