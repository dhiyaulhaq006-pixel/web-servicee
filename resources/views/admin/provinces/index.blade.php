@extends('layouts.admin')

@section('content')
<h2>Kelola Provinsi</h2>

<a href="/admin/provinces/create" style="
    display:inline-block;
    margin-bottom:15px;
    padding:8px 12px;
    background:#2d2a6e;
    color:white;
    text-decoration:none;
    border-radius:4px;
">+ Tambah Provinsi</a>

<table style="
    width:100%;
    border-collapse:collapse;
    background:white;
">
    <thead>
        <tr style="background:#f3f3f3">
            <th style="padding:10px;border:1px solid #ccc;">Gambar</th>
            <th style="padding:10px;border:1px solid #ccc;">Nama</th>
            <th style="padding:10px;border:1px solid #ccc;">Deskripsi</th>
            <th style="padding:10px;border:1px solid #ccc;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($provinces as $p)
        <tr>
            <td style="padding:10px;border:1px solid #ccc;text-align:center">
                @if(!empty($p['image']))
                    <img src="{{ asset('images/' . $p['image']) }}" width="80" style="border-radius:4px">
                @else
                    -
                @endif
            </td>
            <td style="padding:10px;border:1px solid #ccc;">
                {{ $p['name'] }}
            </td>
            <td style="padding:10px;border:1px solid #ccc;">
                {{ $p['description'] }}
            </td>
            <td style="padding:10px;border:1px solid #ccc; text-align:center;">
                <a href="/admin/provinces/edit/{{ $p['id'] }}" style="color:#2d2a6e; margin-right:8px; text-decoration:none;">Edit</a>
                <a href="/admin/provinces/delete/{{ $p['id'] }}" onclick="return confirm('Hapus data?')" style="color:red;text-decoration:none">Hapus</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="padding:15px;text-align:center">
                Belum ada data
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
