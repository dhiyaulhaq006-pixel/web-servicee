<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Style Admin Global -->
    <style>
        /* =========================
           ADMIN GLOBAL
        ========================= */
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
        }

        main {
            padding: 40px;
            min-height: 70vh;
        }

        /* =========================
           HEADER / NAVBAR
        ========================= */
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

        header a:hover {
            text-decoration: underline;
        }

        /* =========================
           FOOTER
        ========================= */
        footer {
            background: #2c2f6f;
            color: #fff;
            padding: 20px 40px;
            text-align: center;
        }

        /* =========================
           BUTTONS
        ========================= */
        .btn-primary {
            display: inline-block;
            background: #2c2c6c;
            color: #fff;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .btn-primary:hover {
            background: #1f1f55;
        }

        .btn-edit {
            background: #ffc107;
            color: #000;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-delete {
            background: #dc3545;
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-edit:hover,
        .btn-delete:hover {
            opacity: 0.85;
        }

        /* =========================
           TABLE ADMIN
        ========================= */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-top: 10px;
            border-radius: 8px;
            overflow: hidden;
        }

        .admin-table th {
            background: #2c2c6c;
            color: #fff;
            text-align: left;
            padding: 12px;
            font-size: 14px;
        }

        .admin-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            font-size: 14px;
        }

        .admin-table tr:hover {
            background: #f1f3f7;
        }

        .center {
            text-align: center;
        }

        .desc {
            max-width: 350px;
            line-height: 1.5;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }

        .thumb {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .muted {
            color: #888;
            font-size: 12px;
        }

        /* =========================
           CARD / DASHBOARD ADMIN
        ========================= */
        .admin-card {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #2c2c6c;
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
            <a href="{{ route('admin.provinces.index') }}">Provinsi</a>
            <a href="{{ route('admin.contents.index') }}">Konten</a>

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
