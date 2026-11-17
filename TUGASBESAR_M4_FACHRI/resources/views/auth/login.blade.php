<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Data Penghuni Kos</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="title"><h1>Login</h1></div>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="auth-form">
        @csrf
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email') <p class="error">{{ $message }}</p> @enderror

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password') <p class="error">{{ $message }}</p> @enderror

        <label class="remember"><input type="checkbox" name="remember"> Ingat saya</label>

        <div class="btn-group">
            <button type="submit" class="btn btn-simpan">Login</button>
        </div>
    </form>

    <p class="auth-link">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
</div>
</body>
</html>
