@extends('layouts.app')

@section('content')

<!-- HERO -->
<div class="hero" style="background-image: url('{{ asset("images/hero1.jpg") }}');">
    <div class="hero-content">
        <h2>Mari Jelajahi Indonesia</h2>

        {{-- Modern Search bar --}}
        <form class="hero-search" method="GET" action="/search">
            <div class="search-wrapper">
                <input type="text" name="q" placeholder="Cari provinsi, wisata, kuliner, atau adat...">
                <button type="submit">
                    🔍
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ======================= PROVINSI ======================= --}}
<section class="section">
    <div class="section-header">
        <h3>Provinsi</h3>
        <a href="/provinces" class="see-more">Lihat Semua</a>
    </div>

    <div class="grid">
        @forelse($provinces as $p)
            <a href="/provinces/{{ $p->slug }}" class="card-link">
                <div class="card">
                    <img src="{{ asset('images/' . $p->image) }}" alt="{{ $p->name }}">
                    <div class="card-body">
                        <h4>{{ $p->name }}</h4>
                        <p>{{ Str::limit($p->description, 60) }}</p>
                    </div>
                </div>
            </a>
        @empty
            <p>Tidak ada data provinsi</p>
        @endforelse
    </div>
</section>

{{-- ======================= ADAT ISTIADAT ======================= --}}
<section class="section">
    <div class="section-header">
        <h3>Adat Istiadat</h3>
        <a href="/adat" class="see-more">Lihat Semua</a>
    </div>

    <div class="grid">
        @forelse($adat as $a)
            <a href="/adat/{{ $a->slug }}" class="card-link">
                <div class="card">
                    <img src="{{ asset('images/' . $a->image) }}" alt="{{ $a->name }}">
                    <div class="card-body">
                        <h4>{{ $a->name }}</h4>
                        <p>{{ Str::limit($a->description, 60) }}</p>
                    </div>
                </div>
            </a>
        @empty
            <p>Tidak ada data adat</p>
        @endforelse
    </div>
</section>

{{-- ======================= KULINER ======================= --}}
<section class="section">
    <div class="section-header">
        <h3>Kuliner</h3>
        <a href="/kuliner" class="see-more">Lihat Semua</a>
    </div>

    <div class="grid">
        @forelse($kuliner as $k)
            <a href="/kuliner/{{ $k->slug }}" class="card-link">
                <div class="card">
                    <img src="{{ asset('images/' . $k->image) }}" alt="{{ $k->name }}">
                    <div class="card-body">
                        <h4>{{ $k->name }}</h4>
                        <p>{{ Str::limit($k->description, 60) }}</p>
                    </div>
                </div>
            </a>
        @empty
            <p>Tidak ada data kuliner</p>
        @endforelse
    </div>
</section>

{{-- ======================= WISATA ======================= --}}
<section class="section">
    <div class="section-header">
        <h3>Tempat Wisata</h3>
        <a href="/wisata" class="see-more">Lihat Semua</a>
    </div>

    <div class="grid">
        @forelse($wisata as $w)
            <a href="/wisata/{{ $w->slug }}" class="card-link">
                <div class="card">
                    <img src="{{ asset('images/' . $w->image) }}" alt="{{ $w->name }}">
                    <div class="card-body">
                        <h4>{{ $w->name }}</h4>
                        <p>{{ Str::limit($w->description, 60) }}</p>
                    </div>
                </div>
            </a>
        @empty
            <p>Tidak ada data wisata</p>
        @endforelse
    </div>
</section>

@endsection
