@extends('layouts.app')

@section('content')

<!-- HERO -->
<div class="hero" style="background-image: url('/images/hero.jpg')">
    <div class="hero-content">
        <h2>Mari Jelajahi Indonesia</h2>

        <form class="hero-search">
            <input type="text" placeholder="Cari provinsi, wisata, kuliner, atau adat...">
            <button type="submit">Cari</button>
        </form>
    </div>
</div>

<!-- =======================
     PREVIEW PROVINSI
======================= -->
<section class="section">
    <div class="section-header">
        <h3>Provinsi</h3>
        <a href="/provinces" class="see-more">Lihat Semua</a>
    </div>

    <div class="grid">
        <a href="/provinces/jawa-barat" class="card-link">
            <div class="card">
                <img src="/images/provinsi/jawa-barat.jpg">
                <div class="card-body">
                    <h4>Jawa Barat</h4>
                    <p>Budaya Sunda dan alam pegunungan</p>
                </div>
            </div>
        </a>

        <a href="/provinces/bali" class="card-link">
            <div class="card">
                <img src="/images/provinsi/bali.jpg">
                <div class="card-body">
                    <h4>Bali</h4>
                    <p>Pulau dewata dan budaya Hindu</p>
                </div>
            </div>
        </a>

        <a href="/provinces/sumatera-barat" class="card-link">
            <div class="card">
                <img src="/images/provinsi/sumbar.jpg">
                <div class="card-body">
                    <h4>Sumatera Barat</h4>
                    <p>Rumah Gadang & budaya Minang</p>
                </div>
            </div>
        </a>
    </div>
</section>

<!-- =======================
     PREVIEW ADAT ISTIADAT
======================= -->
<section class="section">
    <div class="section-header">
        <h3>Adat Istiadat</h3>
        <a href="/adat" class="see-more">Lihat Semua</a>
    </div>

    <div class="grid">
        <a href="/adat/toraja" class="card-link">
            <div class="card">
                <img src="/images/adat/toraja.jpg">
                <div class="card-body">
                    <h4>Adat Toraja</h4>
                    <p>Upacara Rambu Solo'</p>
                </div>
            </div>
        </a>

        <a href="/adat/bali" class="card-link">
            <div class="card">
                <img src="/images/adat/bali.jpg">
                <div class="card-body">
                    <h4>Adat Bali</h4>
                    <p>Upacara keagamaan Hindu</p>
                </div>
            </div>
        </a>

        <a href="/adat/minangkabau" class="card-link">
            <div class="card">
                <img src="/images/adat/minang.jpg">
                <div class="card-body">
                    <h4>Adat Minangkabau</h4>
                    <p>Sistem matrilineal</p>
                </div>
            </div>
        </a>
    </div>
</section>

<!-- =======================
     PREVIEW KULINER
======================= -->
<section class="section">
    <div class="section-header">
        <h3>Kuliner</h3>
        <a href="/kuliner" class="see-more">Lihat Semua</a>
    </div>

    <div class="grid">
        <a href="/kuliner/rendang" class="card-link">
            <div class="card">
                <img src="/images/kuliner/rendang.jpg">
                <div class="card-body">
                    <h4>Rendang</h4>
                    <p>Kuliner khas Sumatera Barat</p>
                </div>
            </div>
        </a>

        <a href="/kuliner/gudeg" class="card-link">
            <div class="card">
                <img src="/images/kuliner/gudeg.jpg">
                <div class="card-body">
                    <h4>Gudeg</h4>
                    <p>Makanan khas Yogyakarta</p>
                </div>
            </div>
        </a>

        <a href="/kuliner/papeda" class="card-link">
            <div class="card">
                <img src="/images/kuliner/papeda.jpg">
                <div class="card-body">
                    <h4>Papeda</h4>
                    <p>Kuliner khas Papua</p>
                </div>
            </div>
        </a>
    </div>
</section>

<!-- =======================
     PREVIEW WISATA
======================= -->
<section class="section">
    <div class="section-header">
        <h3>Tempat Wisata</h3>
        <a href="/wisata" class="see-more">Lihat Semua</a>
    </div>

    <div class="grid">
        <a href="/wisata/bromo" class="card-link">
            <div class="card">
                <img src="/images/wisata/bromo.jpg">
                <div class="card-body">
                    <h4>Gunung Bromo</h4>
                    <p>Panorama alam ikonik</p>
                </div>
            </div>
        </a>

        <a href="/wisata/raja-ampat" class="card-link">
            <div class="card">
                <img src="/images/wisata/raja-ampat.jpg">
                <div class="card-body">
                    <h4>Raja Ampat</h4>
                    <p>Surga laut Indonesia</p>
                </div>
            </div>
        </a>

        <a href="/wisata/borobudur" class="card-link">
            <div class="card">
                <img src="/images/wisata/borobudur.jpg">
                <div class="card-body">
                    <h4>Candi Borobudur</h4>
                    <p>Warisan budaya dunia</p>
                </div>
            </div>
        </a>
    </div>
</section>

@endsection
