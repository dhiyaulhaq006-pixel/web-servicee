@extends('layouts.app')

@section('content')
<div class="section">
    <!-- Judul kategori di tengah -->
    <h2 style="text-align:center; color:#2c2c6c; margin-bottom:25px;">
        {{ ucfirst($category) }} -
        {{ isset($provinsi) && $provinsi ? ucfirst(str_replace('-', ' ', $provinsi)) : 'Semua Provinsi' }}
    </h2>

    <div class="grid">
        @forelse($items as $item)
            @php
                $prov_link = $provinsi ?? ($item->province_slug ?? '');
            @endphp
            <a href="/{{ $category }}/{{ $item->slug }}" class="card">
                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name ?? $item->title }}">
                <div class="card-body">
                    <!-- Card tetap kiri -->
                    <h4>{{ $item->name ?? $item->title }}</h4>
                    <p>
                        {{ isset($item->description) ? \Illuminate\Support\Str::limit($item->description, 100) : \Illuminate\Support\Str::limit($item->content, 100) }}
                    </p>
                </div>
            </a>
        @empty
            <p style="text-align:center;">Tidak ada konten untuk kategori ini.</p>
        @endforelse
    </div>
</div>
@endsection
