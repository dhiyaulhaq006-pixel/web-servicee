@extends('layouts.admin')

@section('content')
<h2>Edit Konten</h2>

<form action="{{ route('admin.contents.update', ['type'=>$type, 'id'=>$content->id]) }}" method="POST" enctype="multipart/form-data" class="admin-form">
    @csrf
    @method('PUT')

    {{-- JUDUL --}}
    <div class="form-group">
        <label for="title">Judul Konten</label>
        <input type="text" id="title" name="title" value="{{ old('title', $content->name) }}" required>
    </div>

    {{-- KATEGORI --}}
    <div class="form-group">
        <label for="category">Kategori</label>
        <select id="category" name="category" required>
            <option value="kuliner" {{ $type === 'kuliner' ? 'selected' : '' }}>Kuliner</option>
            <option value="wisata" {{ $type === 'wisata' ? 'selected' : '' }}>Wisata</option>
            <option value="adat" {{ $type === 'adat' ? 'selected' : '' }}>Adat Istiadat</option>
        </select>
    </div>

    {{-- PROVINSI --}}
    <div class="form-group">
        <label for="province">Provinsi</label>
        <select id="province" name="province" required>
            @foreach($provinces as $p)
                <option value="{{ $p->slug }}" {{ $content->province_slug === $p->slug ? 'selected' : '' }}>
                    {{ $p->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- DESKRIPSI --}}
    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" rows="5" required>{{ old('description', $content->description) }}</textarea>
    </div>

    {{-- GAMBAR --}}
    <div class="form-group">
        <label for="image">Gambar</label>
        <input type="file" id="image" name="image">

        @if($content->image)
            <div class="mt-2">
                <small class="muted">Gambar saat ini:</small><br>
                <img src="{{ asset('images/' . $content->image) }}" class="thumb">
            </div>
        @endif
    </div>

    {{-- TOMBOL UPDATE --}}
    <div class="form-group">
        <button type="submit" class="btn-primary">Update</button>
    </div>
</form>

<style>
/* Tambahan styling agar form rapi dan konsisten */
.form-group {
    margin-bottom: 20px;
}
input[type="text"], select, textarea {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}
.thumb {
    width: 150px;
    display: block;
    margin-top: 5px;
}
.btn-primary {
    background-color: #007bff;
    color: white;
    padding: 10px 18px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}
.btn-primary:hover {
    background-color: #0056b3;
}
.muted {
    color: #777;
    font-size: 0.9em;
}
</style>

@endsection
