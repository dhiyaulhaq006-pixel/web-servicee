<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Provinsi Guide</title>

    {{-- CSS utama --}}
    <link rel="stylesheet" href="/css/style.css">
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
            <a href="/">Beranda</a>
            <a href="/provinces">Provinsi</a>
            <a href="/adat">Adat Istiadat</a>
            <a href="/kuliner">Kuliner</a>
            <a href="/wisata">Tempat Wisata</a>
            <a href="/about-us">Tentang Kami</a> <!-- Ubah tulisan menjadi Tentang Kami -->
        </nav>
    </header>

    <!-- CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <div class="logo footer-logo">
                    <img src="/images/logo.png" alt="Logo Indonesia Travel Guide" class="logo-img">

                    <div class="logo-text">
                        <span>Indonesian</span>
                        <span>Travel</span>
                        <span>Guide</span>
                    </div>
                </div>

                <p class="footer-desc">
                    Platform informasi provinsi, adat istiadat,
                    kuliner, dan tempat wisata di Indonesia.
                </p>
            </div>

            <div class="footer-links">
                <h4>Menu</h4>
                <a href="/">Beranda</a>
                <a href="/provinces">Provinsi</a>
                <a href="/adat">Adat Istiadat</a>
                <a href="/kuliner">Kuliner</a>
                <a href="/wisata">Tempat Wisata</a>
                <a href="/about-us">Tentang Kami</a> <!-- Ubah tulisan juga di footer -->
            </div>

            <div class="footer-copy">
                <p>&copy; 2026 Indonesian Travel Guide</p>
            </div>
        </div>
    </footer>

</body>
</html>
