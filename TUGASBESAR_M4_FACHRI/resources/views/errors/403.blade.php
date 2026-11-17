<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>403 - Akses Ditolak</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="title"><h1>403 - Akses Ditolak</h1></div>
    <p class="auth-link">{{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses.' }}</p>
    <p class="auth-link"><a href="{{ route('penghuni.index') }}">Kembali ke Daftar Penghuni</a></p>
</div>
</body>
</html>
