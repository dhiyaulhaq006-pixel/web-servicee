@extends('layouts.app')

@section('content')
<h2>
    Detail {{ ucfirst($category) }} -
    {{ $provinsi ? ucfirst(str_replace('-', ' ', $provinsi)) : 'Semua Provinsi' }}
</h2>

<p><strong>Slug:</strong> {{ $slug }}</p>

<p>
    Ini adalah halaman detail untuk konten
    <strong>{{ $slug }}</strong>
    pada kategori <strong>{{ $category }}</strong>
    {{ $provinsi ? 'di provinsi ' . ucfirst(str_replace('-', ' ', $provinsi)) : '' }}.
</p>

<a href="{{ $provinsi ? '/provinces/'.$provinsi.'/'.$category : '/'.$category }}">← Kembali</a>
@endsection
