@extends('layouts.admin')

@section('content')
<h2>Kelola Konten</h2>

<a href="/admin/contents/create" style="
    display:inline-block;
    margin-bottom:15px;
    padding:8px 12px;
    background:#2d2a6e;
    color:white;
    text-decoration:none;
    border-radius:4px;
">+ Tambah Konten</a>

<table style="
    width:100%;
    border-collapse:collapse;
    background:white;
">
    <thead>
        <tr style="background:#f3f3f3">
            <th style="padding:10px;border:1px solid #ccc;">Gambar</th>
            <th style="padding:10px;border:1px solid #ccc;">Judul</th>
            <th style="padding:10px;border:1px solid #ccc;">Kategori</th>
            <th style="padding:10px;border:1px solid #ccc;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($contents as $c)
        <tr>
            <td style="padding:10px;border:1px solid #ccc;text-align:center; vertical-align:middle;">
                @if(!empty($c['image']))
                    <img src="{{ asset('images/' . $c['image']) }}" width="80" style="border-radius:4px; object-fit:cover;">
                @else
                    <small>Tidak ada gambar</small>
                @endif
            </td>

            <td style="padding:10px;border:1px solid #ccc; max-width:250px; word-wrap:break-word; white-space:normal;">
                {{ Str::limit($c['title'], 50, '...') }}
            </td>

            <td style="padding:10px;border:1px solid #ccc; text-transform:capitalize;">
                {{ $c['category'] }}
            </td>

            <td style="padding:10px;border:1px solid #ccc; text-align:center;">
                <a href="/admin/contents/edit/{{ $c['id'] }}" style="color:#2d2a6e; margin-right:8px; text-decoration:none;">Edit</a>
                <a href="/admin/contents/delete/{{ $c['id'] }}" onclick="return confirm('Hapus data?')" style="color:red;text-decoration:none">Hapus</a>
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
