@extends('layouts.app')

@section('content')
<div class="section">
    {{-- Judul halaman --}}
    <h2>
        {{ ucfirst($category) }} -
        {{ $provinsi ? ucfirst(str_replace('-', ' ', $provinsi)) : 'Semua Provinsi' }}
    </h2>

    <div class="grid">
        @php
            // Dummy data konten, nanti bisa diganti ambil dari database
            $items = [];

            if($provinsi) {
                // Konten spesifik provinsi
                $items = [
                    ['slug' => 'contoh-item-1', 'judul' => 'Judul 1'],
                    ['slug' => 'contoh-item-2', 'judul' => 'Judul 2'],
                ];
            } else {
                // Konten dari semua provinsi
                $items = [
                    ['provinsi' => 'bali', 'slug' => 'contoh-item-1', 'judul' => 'Bali - Judul 1'],
                    ['provinsi' => 'ntb', 'slug' => 'contoh-item-2', 'judul' => 'NTB - Judul 2'],
                    ['provinsi' => 'jawa-barat', 'slug' => 'contoh-item-3', 'judul' => 'Jawa Barat - Judul 3'],
                    ['provinsi' => 'jawa-timur', 'slug' => 'contoh-item-4', 'judul' => 'Jawa Timur - Judul 4'],
                ];
            }
        @endphp

        @foreach($items as $item)
            @php
                $prov_link = $provinsi ?? $item['provinsi'];
            @endphp
            <a href="/provinces/{{ $prov_link }}/{{ $category }}/{{ $item['slug'] }}" class="card">
                <img src="/images/sample.jpg" alt="{{ $item['judul'] }}">
                <div class="card-body">
                    <h4>{{ $item['judul'] }}</h4>
                    <p>Deskripsi singkat {{ $category }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
