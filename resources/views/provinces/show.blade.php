@extends('layouts.app')

@section('content')

<!-- HERO GAMBAR SAJA -->
<div class="hero" style="background-image: url('/images/{{ $slug }}.jpg')"></div>

<!-- INFO PROVINSI -->
<div class="section province-info">
    <h2>{{ ucfirst(str_replace('-', ' ', $slug)) }}</h2>
    <p>
        Informasi lengkap tentang adat istiadat, kuliner,
        dan tempat wisata di Provinsi
        {{ ucfirst(str_replace('-', ' ', $slug)) }}.
    </p>
</div>

<!-- FITUR PROVINSI -->
<div class="section">
    <div class="grid">

        <a href="/provinces/{{ $slug }}/adat" class="card-link">
            <div class="card">
                <img src="/images/adat.jpg">
                <div class="card-body">
                    <h4>Adat Istiadat</h4>
                    <p>Tradisi dan budaya khas daerah</p>
                </div>
            </div>
        </a>

        <a href="/provinces/{{ $slug }}/kuliner" class="card-link">
            <div class="card">
                <img src="/images/kuliner.jpg">
                <div class="card-body">
                    <h4>Kuliner</h4>
                    <p>Makanan khas daerah</p>
                </div>
            </div>
        </a>

        <a href="/provinces/{{ $slug }}/wisata" class="card-link">
            <div class="card">
                <img src="/images/wisata.jpg">
                <div class="card-body">
                    <h4>Tempat Wisata</h4>
                    <p>Destinasi wisata unggulan</p>
                </div>
            </div>
        </a>

    </div>
</div>

@endsection
