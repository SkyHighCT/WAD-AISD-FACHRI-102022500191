@php $edit = isset($penghuni); @endphp
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $edit ? 'Edit' : 'Tambah' }} Penghuni Kos</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
    <h2>{{ $edit ? 'Edit Data Penghuni' : 'Tambah Penghuni Kos' }}</h2>

    <form method="POST"
          action="{{ $edit ? route('penghuni.update', $penghuni->id) : route('penghuni.store') }}">
        @csrf
        @if ($edit)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $penghuni->nama ?? '') }}">
            @error('nama') <span class="error">* {{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="no_ktp">Nomor KTP</label>
            <input type="text" id="no_ktp" name="no_ktp" value="{{ old('no_ktp', $penghuni->no_ktp ?? '') }}">
            @error('no_ktp') <span class="error">* {{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $penghuni->pekerjaan ?? '') }}">
            @error('pekerjaan') <span class="error">* {{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="no_kamar">No. Kamar</label>
            <select id="no_kamar" name="no_kamar">
                <option value="">-- Pilih --</option>
                @foreach ($daftarKamar as $kamar)
                    <option value="{{ $kamar }}" {{ old('no_kamar', $penghuni->no_kamar ?? '') == $kamar ? 'selected' : '' }}>{{ $kamar }}</option>
                @endforeach
            </select>
            @error('no_kamar') <span class="error">* {{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="kontak_darurat">Kontak Darurat</label>
            <input type="text" id="kontak_darurat" name="kontak_darurat" value="{{ old('kontak_darurat', $penghuni->kontak_darurat ?? '') }}">
            @error('kontak_darurat') <span class="error">* {{ $message }}</span> @enderror
        </div>

        <div class="btn-group">
            <a href="{{ route('penghuni.index') }}" class="btn btn-batal">Batal</a>
            <button type="submit" class="btn btn-simpan">{{ $edit ? 'Update Data' : 'Simpan Data' }}</button>
        </div>
    </form>
    </div>
</body>
</html>
