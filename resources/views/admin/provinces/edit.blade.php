@extends('layouts.admin')

@section('content')
<h2>Edit Provinsi</h2>

<form method="POST" action="{{ route('admin.provinces.update', $province->id) }}" enctype="multipart/form-data" style="max-width:500px; background:#fff; padding:20px; border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
    @csrf
    @method('PUT')

    <div style="margin-bottom:15px;">
        <label style="font-weight:bold;">Nama Provinsi</label><br>
        <input type="text" name="name" required value="{{ $province->name }}" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
    </div>

    <div style="margin-bottom:15px;">
        <label style="font-weight:bold;">Deskripsi</label><br>
        <textarea name="description" required style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px; min-height:100px;">{{ $province->description }}</textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label style="font-weight:bold;">Gambar</label><br>
        <input type="file" name="image" accept="image/*"><br>
        @if(!empty($province->image))
            <small>Gambar saat ini:</small><br>
            <img src="{{ asset('images/' . $province->image) }}" width="120" style="border-radius:4px; margin-top:5px;">
        @endif
    </div>

    <button type="submit" style="padding:10px 16px; background:#2d2a6e; color:white; border:none; border-radius:4px; cursor:pointer;">
        Update
    </button>
</form>
@endsection
