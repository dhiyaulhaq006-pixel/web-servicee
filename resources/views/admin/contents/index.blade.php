@extends('layouts.admin')

@section('content')
@php
use Illuminate\Support\Str;
@endphp

<h2>Kelola Konten</h2>

<a href="{{ route('admin.contents.create') }}" class="btn-primary">+ Tambah Konten</a>

<table class="admin-table">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Provinsi</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($contents as $type => $items)
            @foreach($items as $content)
                <tr>
                    <!-- Gambar -->
                    <td class="center">
                        @if($content->image)
                            <img src="{{ asset('images/' . $content->image) }}" class="thumb">
                        @else
                            <span class="muted">Tidak ada</span>
                        @endif
                    </td>

                    <!-- Nama -->
                    <td>
                        <strong>{{ $content->name }}</strong><br>
                        <small class="muted">{{ $content->slug }}</small>
                    </td>

                    <!-- Kategori -->
                    <td>{{ ucfirst($type) }}</td>

                    <!-- Provinsi -->
                    <td>{{ $content->province_slug }}</td>

                    <!-- Deskripsi -->
                    <td class="desc">{{ $content->description ? Str::limit($content->description, 80) : '-' }}</td>

                    <!-- Aksi -->
                    <td class="center">
                        <a href="{{ route('admin.contents.edit', $content->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.contents.destroy', $content->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin hapus konten ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @empty
            <tr>
                <td colspan="6" class="empty">Belum ada konten</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
