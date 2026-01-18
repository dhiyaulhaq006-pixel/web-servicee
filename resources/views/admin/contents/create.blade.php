@extends('layouts.admin')

@section('content')
<h2>Tambah Konten</h2>

<form action="/admin/contents" method="POST" enctype="multipart/form-data" class="admin-form">
    @csrf

    {{-- JUDUL --}}
    <label>Judul Konten</label>
    <input type="text" name="title" required>

    {{-- KATEGORI --}}
    <label>Kategori</label>
    <select name="category" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="kuliner">Kuliner</option>
        <option value="wisata">Wisata</option>
        <option value="adat">Adat Istiadat</option>
    </select>

    {{-- PROVINSI --}}
    <label>Provinsi</label>
    <select name="province" required>
        <option value="">-- Pilih Provinsi --</option>
        @foreach($provinces as $p)
            <option value="{{ $p->slug }}">
                {{ $p->name }}
            </option>
        @endforeach
    </select>

    {{-- DESKRIPSI --}}
    <label>Deskripsi</label>
    <textarea name="description" rows="5" required></textarea>

    {{-- GAMBAR --}}
    <label>Gambar</label>
    <input type="file" name="image" accept="image/*">

    <button type="submit">Simpan</button>
</form>
@endsection
