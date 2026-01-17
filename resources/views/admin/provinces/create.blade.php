@extends('layouts.admin')

@section('content')
<h2>Tambah Provinsi</h2>

<form method="POST" action="/admin/provinces" enctype="multipart/form-data" style="max-width:500px; background:#fff; padding:20px; border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
    @csrf

    <div style="margin-bottom:15px;">
        <label style="font-weight:bold;">Nama Provinsi</label><br>
        <input type="text" name="name" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
    </div>

    <div style="margin-bottom:15px;">
        <label style="font-weight:bold;">Deskripsi</label><br>
        <textarea name="description" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px; min-height:100px;"></textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label style="font-weight:bold;">Gambar</label><br>
        <input type="file" name="image" accept="image/*">
    </div>

    <button type="submit" style="
        padding:10px 16px;
        background:#2d2a6e;
        color:white;
        border:none;
        border-radius:4px;
        cursor:pointer;
    ">
        Simpan
    </button>
</form>
@endsection
