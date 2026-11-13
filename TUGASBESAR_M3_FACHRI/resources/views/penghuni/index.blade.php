<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Penghuni Kos</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
    <div class="title">
        <h1>Modul Data Penghuni</h1>
    </div>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="container2">
        <h2>Daftar Penghuni Kos</h2>
        <a href="{{ route('penghuni.create') }}">+ Tambah Penghuni</a>
    </div>

    <div class="table1">
        <table class="data">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No. KTP</th>
                    <th>Pekerjaan</th>
                    <th>No. Kamar</th>
                    <th>Kontak Darurat</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penghuni as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->no_ktp }}</td>
                    <td>{{ $p->pekerjaan }}</td>
                    <td>{{ $p->no_kamar }}</td>
                    <td>{{ $p->kontak_darurat }}</td>
                    <td colspan="2" class="aksi">
                        <a href="{{ route('penghuni.edit', $p->id) }}" class="btn-aksi btn-edit">Edit</a>
                        <form action="{{ route('penghuni.destroy', $p->id) }}" method="POST" style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-aksi btn-hapus" style="border:none;cursor:pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center;">Belum ada data penghuni.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
