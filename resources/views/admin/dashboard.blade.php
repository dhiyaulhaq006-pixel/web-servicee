@extends('layouts.admin')

@section('content')
<h2>Dashboard Admin</h2>

<div class="cards-container">
    <!-- Card Kelola Konten -->
    <div class="admin-card">
        <div class="card-icon">
            <i class="fas fa-folder-open"></i>
        </div>
        <div class="card-title">Kelola Konten</div>
        <a href="{{ route('admin.contents.index') }}" class="card-btn">Kelola Konten</a>
    </div>

    <!-- Card Kelola Provinsi -->
    <div class="admin-card">
        <div class="card-icon">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="card-title">Kelola Provinsi</div>
        <a href="{{ route('admin.provinces.index') }}" class="card-btn">Kelola Provinsi</a>
    </div>
</div>

<style>
.cards-container {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

/* CARD UTAMA */
.admin-card {
    flex: 1;
    background-color: #fff; /* latar putih */
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: transform 0.2s, box-shadow 0.2s;
}

.admin-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.card-icon {
    font-size: 40px;
    margin-bottom: 15px;
    color: #1E3A8A; /* ikon biru */
}

.card-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
}

/* TOMBOL DALAM CARD */
.card-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #1E3A8A; /* warna konsisten */
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.2s;
}

.card-btn:hover {
    background-color: #16316a; /* versi gelap saat hover */
}
</style>
@endsection
