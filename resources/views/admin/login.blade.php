@extends('layouts.app')

@section('content')
<h2>Login Admin</h2>

@if (session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="/admin/login">
    @csrf

    <div>
        <label>Email</label><br>
        <input type="email" name="email">
    </div>

    <div>
        <label>Password</label><br>
        <input type="password" name="password">
    </div>

    <button type="submit">Login</button>
</form>
@endsection
