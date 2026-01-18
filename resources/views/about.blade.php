@extends('layouts.app')

@section('content')

<!-- HERO KECIL -->
<div class="hero" style="background-image: url('{{ asset('images/hero1.jpg') }}'); height: 300px;">
    <div class="hero-content">
        <h2>Tentang Kami</h2>
    </div>
</div>

<!-- ABOUT SECTION -->
<section class="section about">
    <div class="section-header">
        <h3>Mengenal Kami</h3>
    </div>

    <div class="about-content">
        <p>Selamat datang di <strong>Indonesian Travel Guide</strong>! Platform ini dibuat untuk memberikan informasi seputar provinsi, adat istiadat, kuliner, dan tempat wisata di Indonesia. Kami berkomitmen untuk mempermudah pengguna mengenal kekayaan budaya dan alam Indonesia. Tim kami terdiri dari para penggiat teknologi dan budaya yang ingin memajukan informasi pariwisata secara digital.</p>

        <p>Kami percaya bahwa pengetahuan adalah kunci untuk melestarikan budaya dan meningkatkan pariwisata lokal. Dengan website ini, pengguna dapat dengan mudah menjelajahi informasi provinsi, kuliner, wisata, dan adat istiadat secara interaktif.</p>
    </div>

    <!-- TEAM / TIM KAMI -->
    <div class="section-header mt-5">
        <h3>Tim Kami</h3>
    </div>
    <div class="team">
        <div class="team-member">
            <img src="{{ asset('images/sell.jpeg') }}" alt="Tim 1">
            <h4>Saili Rizki Zahara</h4>
            <p>Backend</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('images/watt.jpeg') }}" alt="Tim 2">
            <h4>Siti Asmawati</h4>
            <p>Database</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('images/dhy.jpg') }}" alt="Tim 3">
            <h4>Dhiya 'Ulhaq Ramdhani Malik</h4>
            <p>Frontend</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('images/nir.jpeg') }}" alt="Tim 4">
            <h4>Nirmayana</h4>
            <p>Project & Presentasi</p>
        </div>
        <div class="team-member">
            <img src="{{ asset('images/zah.jpeg') }}" alt="Tim 5">
            <h4>Zahwa Aulia Putri</h4>
            <p>Deploy & Hosting</p>
        </div>
    </div>
</section>

@endsection
