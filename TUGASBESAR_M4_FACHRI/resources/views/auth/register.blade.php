<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - Data Penghuni Kos</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="title"><h1>Register</h1></div>

    <form action="{{ route('register') }}" method="POST" class="auth-form">
        @csrf
        <label for="name">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        @error('name') <p class="error">{{ $message }}</p> @enderror

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email') <p class="error">{{ $message }}</p> @enderror

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password') <p class="error">{{ $message }}</p> @enderror

        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <div class="btn-group">
            <button type="submit" class="btn btn-simpan">Daftar</button>
        </div>
    </form>

    <p class="auth-link">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</div>
</body>
</html>
