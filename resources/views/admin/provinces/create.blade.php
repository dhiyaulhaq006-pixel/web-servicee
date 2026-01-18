@extends('layouts.admin')

@section('content')
<h2>Tambah Provinsi</h2>

<form method="POST" action="{{ route('admin.provinces.store') }}" enctype="multipart/form-data">
    @csrf

    <label>Nama Provinsi</label>
    <input type="text" name="name" required>

    <label>Deskripsi</label>
    <textarea name="description" required></textarea>

    <label>Gambar</label>
    <input type="file" name="image">

    <button type="submit">Simpan</button>
</form>
@endsection
