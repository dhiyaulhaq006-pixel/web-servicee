@extends('layouts.app')

@section('content')
<div class="section">
    <h2 style="text-align:center; margin-bottom:30px;">Daftar Provinsi</h2>

    <div class="grid">
        @forelse($provinces as $p)
            <a href="/provinces/{{ $p->slug }}" class="card-link">
                <div class="card">
                    <img src="{{ asset('images/' . $p->image) }}" alt="{{ $p->name }}">
                    <div class="card-body">
                        <h4>{{ $p->name }}</h4>
                        <p>{{ Str::limit($p->description, 100) }}</p>
                    </div>
                </div>
            </a>
        @empty
            <p style="text-align:center;">Belum ada data provinsi</p>
        @endforelse
    </div>
</div>
@endsection
