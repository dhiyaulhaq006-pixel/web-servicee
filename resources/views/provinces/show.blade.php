@extends('layouts.app')

@section('content')

<!-- HERO -->
<div class="hero" style="
    background-image: url('{{ $province->image ? asset('images/'.$province->image) : asset('images/no-image.png') }}');
    height: 400px;
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
">
    <!-- Overlay semi-transparent -->
    <div style="
        position:absolute;
        inset:0;
        background: rgba(0,0,0,0.4);
        z-index:1;
        border-radius: 10px;
    "></div>

    <!-- Judul hero -->
    <div style="
        position:relative;
        z-index:2;
        text-align:center;
        color:white;
        padding: 20px;
        max-width: 800px;
    ">
        <h1 style="font-size:36px; font-weight:bold; margin-bottom:15px; text-shadow:1px 1px 5px rgba(0,0,0,0.7);">
            {{ $province->name }}
        </h1>
    </div>
</div>

<!-- DESKRIPSI PROVINSI -->
<div class="section province-info" style="
    max-width:800px;
    margin:30px auto;
    text-align:justify;
    font-size:16px;
    line-height:1.8;
    color:#333;
">
    {!! nl2br(e($province->description)) !!}
</div>

<!-- FITUR PROVINSI -->
<div class="section">
    <h2 style="text-align:center; margin-bottom:30px; color:#2c2c6c;">Jelajahi {{ $province->name }}</h2>

    <div class="grid">
        @php
            $features = [
                ['title'=>'Adat Istiadat', 'desc'=>'Tradisi & budaya khas', 'link'=>"/provinces/{$province->slug}/adat", 'img'=>$province->adatIstiadat->first()?->image],
                ['title'=>'Kuliner', 'desc'=>'Makanan khas daerah', 'link'=>"/provinces/{$province->slug}/kuliner", 'img'=>$province->kuliner->first()?->image],
                ['title'=>'Tempat Wisata', 'desc'=>'Destinasi wisata unggulan', 'link'=>"/provinces/{$province->slug}/wisata", 'img'=>$province->wisata->first()?->image],
            ];
        @endphp

        @foreach($features as $f)
            <a href="{{ $f['link'] }}" class="card-link">
                <div class="card">
                    <img src="{{ $f['img'] ? asset('images/'.$f['img']) : asset('images/no-image.png') }}" alt="{{ $f['title'] }}">
                    <div class="card-body">
                        <h4>{{ $f['title'] }}</h4>
                        <p style="text-align:justify;">{{ $f['desc'] }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

@endsection
