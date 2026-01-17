@extends('layouts.admin')


@section('title', 'Dashboard Admin')

@section('content')
<style>
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .card {
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,.08);
        text-align: center;
    }

    .card h3 {
        margin-bottom: 15px;
    }

    .card a {
        display: inline-block;
        margin-top: 10px;
        text-decoration: none;
        background: #2c2f6f;
        color: #fff;
        padding: 8px 15px;
        border-radius: 4px;
        font-size: 14px;
    }
</style>

<h1>Dashboard Admin</h1>
<p>Selamat datang di halaman administrator Indonesian Travel Guide.</p>

<div class="cards">
    <div class="card">
        <h3>Kelola Provinsi</h3>
        <p>Tambah, ubah, dan hapus data provinsi.</p>
        <a href="/admin/provinces">Kelola</a>
    </div>

    <div class="card">
        <h3>Kelola Adat Istiadat</h3>
        <p>Manajemen konten adat istiadat.</p>
        <a href="/admin/contents">Kelola</a>
    </div>

    <div class="card">
        <h3>Kelola Kuliner</h3>
        <p>Manajemen konten kuliner daerah.</p>
        <a href="/admin/contents">Kelola</a>
    </div>

    <div class="card">
        <h3>Kelola Tempat Wisata</h3>
        <p>Manajemen konten wisata.</p>
        <a href="/admin/contents">Kelola</a>
    </div>
</div>
@endsection
