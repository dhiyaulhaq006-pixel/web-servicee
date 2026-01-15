@extends('layouts.app')

@section('content')
<h2>Kelola Provinsi</h2>

<a href="/admin/provinces/create">Tambah Provinsi</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    <tr>
        <td>Nusa Tenggara Barat</td>
        <td>
            <a href="#">Edit</a> |
            <a href="#">Hapus</a>
        </td>
    </tr>
</table>
@endsection
