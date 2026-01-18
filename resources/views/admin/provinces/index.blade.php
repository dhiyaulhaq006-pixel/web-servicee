@extends('layouts.admin')

@section('content')
<h2>Kelola Provinsi</h2>

<a href="{{ route('admin.provinces.create') }}" class="btn-primary">+ Tambah Provinsi</a>

<table class="admin-table">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($provinces as $p)
        <tr>
            <td class="center">
                @if($p->image)
                    <img src="{{ asset('images/' . $p->image) }}" class="thumb">
                @else
                    <span class="muted">Tidak ada</span>
                @endif
            </td>

            <td>
                <strong>{{ $p->name }}</strong><br>
                <small class="muted">{{ $p->slug }}</small>
            </td>

            <td class="desc">{{ Str::limit($p->description, 80) }}</td>

            <td class="center">
                <a href="{{ route('admin.provinces.edit', $p->id) }}" class="btn-edit">Edit</a>

                <form action="{{ route('admin.provinces.destroy', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete" onclick="return confirm('Hapus provinsi ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="empty">Belum ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
