@extends('layouts.app')

@section('content')
<h2>Kelola Konten</h2>

<a href="/admin/contents/create">Tambah Konten</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>
    <tr>
        <td>Bau Nyale</td>
        <td>Adat</td>
        <td>
            <a href="#">Edit</a> |
            <a href="#">Hapus</a>
        </td>
    </tr>
</table>
@endsection
