@extends('layouts.app')

@section('content')

<!-- Judul kategori + provinsi tetap di tengah -->
<h2 style="text-align:center; color:#2c2c6c; margin-bottom:20px;">
    Detail {{ ucfirst($category) }} -
    {{ isset($provinsi) && $provinsi ? ucfirst(str_replace('-', ' ', $provinsi)) : 'Semua Provinsi' }}
</h2>

<!-- Judul konten (misal GALUNGAN) di tengah -->
<h3 style="text-align:center; margin-bottom:15px;">
    {{ $item->name ?? $item->title }}
</h3>

<!-- Konten detail -->
<div class="content-detail" style="max-width:800px; margin:auto;">
    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name ?? $item->title }}" style="width:100%; max-height:400px; object-fit:cover; border-radius:8px; margin-bottom:20px;">
    <p style="text-align:justify; font-size:16px; line-height:1.8; color:#333;">
        {{ $item->description ?? $item->content }}
    </p>
</div>

<!-- Tombol kembali estetik -->
<div style="text-align:center; margin-top:25px;">
    <a href="{{ isset($provinsi) && $provinsi ? '/provinces/'.$provinsi.'/'.$category : '/'.$category }}"
       style="display:inline-block;
              background:#2c2c6c;
              color:white;
              padding:10px 25px;
              border-radius:8px;
              font-weight:bold;
              text-decoration:none;
              transition:0.3s;">
        ← Kembali
    </a>
</div>

<!-- Hover efek tombol -->
<style>
a:hover {
    background:#1a1a4c !important;
}
</style>

@endsection
