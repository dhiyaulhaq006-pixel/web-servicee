@extends('layouts.app')

@section('content')

<!-- HERO SEARCH / HEADER -->
<section class="section hero-search-header" style="background-color: #f9f9f9; padding: 40px 20px; text-align: center; border-radius: 10px; margin-bottom: 30px;">
    <h2 style="font-size: 28px; font-weight: 700; color: #333;">
        Hasil Pencarian untuk:
        <span style="color: #ff6b6b;">"{{ $query }}"</span>
    </h2>
    <p style="font-size: 16px; color: #555; margin-top: 8px;">
        Menampilkan provinsi, kuliner, wisata, dan adat istiadat yang sesuai dengan kata kunci Anda.
    </p>
</section>

<!-- =======================
     PROVINSI
======================= -->
@if($provinces->count())
<section class="section">
    <div class="section-header">
        <h3>Provinsi</h3>
    </div>

    <div class="grid">
        @foreach($provinces as $p)
        <a href="/provinces/{{ $p->slug }}" class="card-link">
            <div class="card">
                <img src="{{ asset('images/' . $p->image) }}">
                <div class="card-body">
                    <h4>{{ $p->name }}</h4>
                    <p>{{ Str::limit($p->description, 60) }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

<!-- =======================
     KULINER
======================= -->
@if($kuliner->count())
<section class="section">
    <div class="section-header">
        <h3>Kuliner</h3>
    </div>

    <div class="grid">
        @foreach($kuliner as $k)
        <a href="/kuliner/{{ $k->slug }}" class="card-link">
            <div class="card">
                <img src="{{ asset('images/' . $k->image) }}">
                <div class="card-body">
                    <h4>{{ $k->name }}</h4>
                    <p>{{ Str::limit($k->description, 60) }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

<!-- =======================
     WISATA
======================= -->
@if($wisata->count())
<section class="section">
    <div class="section-header">
        <h3>Wisata</h3>
    </div>

    <div class="grid">
        @foreach($wisata as $w)
        <a href="/wisata/{{ $w->slug }}" class="card-link">
            <div class="card">
                <img src="{{ asset('images/' . $w->image) }}">
                <div class="card-body">
                    <h4>{{ $w->name }}</h4>
                    <p>{{ Str::limit($w->description, 60) }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

<!-- =======================
     ADAT ISTIADAT
======================= -->
@if($adat->count())
<section class="section">
    <div class="section-header">
        <h3>Adat Istiadat</h3>
    </div>

    <div class="grid">
        @foreach($adat as $a)
        <a href="/adat/{{ $a->slug }}" class="card-link">
            <div class="card">
                <img src="{{ asset('images/' . $a->image) }}">
                <div class="card-body">
                    <h4>{{ $a->name }}</h4>
                    <p>{{ Str::limit($a->description, 60) }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

@endsection
