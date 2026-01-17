<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
        }

        header {
            background: #2c2f6f;
            color: #fff;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }

        main {
            padding: 40px;
            min-height: 70vh;
        }

        footer {
            background: #2c2f6f;
            color: #fff;
            padding: 20px 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }
    </style>
</head>
<body>

<header>
    <div><strong>Indonesian Travel Guide</strong> | Admin</div>
    @if(session('admin_logged_in'))
        <nav>
            <a href="/admin/dashboard">Dashboard</a>
            <a href="/admin/provinces">Provinsi</a>
            <a href="/admin/contents">Konten</a>
            <a href="/admin/logout">Logout</a>
        </nav>
    @endif
</header>

<main class="container">
    @yield('content')
</main>

<footer>
    <div class="container">
        <p>© {{ date('Y') }} Indonesian Travel Guide</p>
    </div>
</footer>

</body>
</html>
