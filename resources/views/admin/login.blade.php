@extends('layouts.admin-auth')



@section('title', 'Login Admin')

@section('content')
<style>
    .login-box {
        max-width: 400px;
        margin: 60px auto;
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0,0,0,.1);
    }

    .login-box h2 {
        text-align: center;
        margin-bottom: 25px;
    }

    .login-box input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
    }

    .login-box button {
        width: 100%;
        padding: 10px;
        background: #2c2f6f;
        color: #fff;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }

    .error {
        background: #fdd;
        padding: 10px;
        margin-bottom: 15px;
        border-left: 5px solid red;
    }
</style>

<div class="login-box">
    <h2>Login Admin</h2>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="/admin/login">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>
@endsection
