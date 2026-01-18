<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Provinsi Guide</title>

    <!-- CSS USER -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- CSS ADMIN -->
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>

    <!-- HEADER / NAVBAR -->
    <header class="navbar">
        <h1 class="logo">
            <img src="/images/logo.png" alt="Logo Indonesia Travel Guide" class="logo-img">
            <div class="logo-text">
                <span>Indonesian</span>
                <span>Travel</span>
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
