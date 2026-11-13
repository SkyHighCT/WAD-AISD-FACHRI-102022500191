<?php
// Inisialisasi variabel
$nama = $email = $nomor = $jenis = $keluhan = $alamat = "";
$namaErr = $emailErr = $nomorErr = $jenisErr = $keluhanErr = $alamatErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    $nama = trim($_POST["nama"]);
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    // Validasi Email
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $emailErr = "Email wajib diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format email tidak valid";
    }

    // Validasi Nomor Telepon
    $nomor = trim($_POST["nomor"]);
    if (empty($nomor)) {
        $nomorErr = "Nomor telepon wajib diisi";
    } elseif (!ctype_digit($nomor)) {
        $nomorErr = "Nomor telepon hanya boleh angka";
    }

    // Validasi Jenis Perangkat
    $jenis = $_POST["jenis"] ?? "";
    if (empty($jenis)) {
        $jenisErr = "Pilih jenis perangkat";
    }

    // Validasi Keluhan
    $keluhan = trim($_POST["keluhan"]);
    if (empty($keluhan)) {
        $keluhanErr = "Keluhan wajib diisi";
    }

    // Validasi Alamat
    $alamat = trim($_POST["alamat"]);
    if (empty($alamat)) {
        $alamatErr = "Alamat wajib diisi";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Teknisi - TechFix</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Form Pemesanan Teknisi</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <!-- Nama -->
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
                <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>
            </div>

            <!-- Nomor Telepon -->
            <div class="form-group">
                <label for="nomor">Nomor Telepon:</label>
                <input type="text" id="nomor" name="nomor" value="<?php echo $nomor; ?>">
                <span class="error"><?php echo $nomorErr ? "* $nomorErr" : ""; ?></span>
            </div>

            <!-- Jenis Perangkat -->
            <div class="form-group">
                <label for="jenis">Jenis Perangkat:</label>
                <select id="jenis" name="jenis">
                    <option value="">-- Pilih --</option>
                    <option value="Laptop" <?php echo ($jenis == "Laptop") ? "selected" : ""; ?>>Laptop</option>
                    <option value="PC" <?php echo ($jenis == "PC") ? "selected" : ""; ?>>PC</option>
                    <option value="Printer" <?php echo ($jenis == "Printer") ? "selected" : ""; ?>>Printer</option>
                    <option value="Smartphone" <?php echo ($jenis == "Smartphone") ? "selected" : ""; ?>>Smartphone</option>
                </select>
                <span class="error"><?php echo $jenisErr ? "* $jenisErr" : ""; ?></span>
            </div>

            <!-- Keluhan -->
            <div class="form-group">
                <label for="keluhan">Keluhan:</label>
                <textarea id="keluhan" name="keluhan"><?php echo $keluhan; ?></textarea>
                <span class="error"><?php echo $keluhanErr ? "* $keluhanErr" : ""; ?></span>
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="alamat">Alamat Servis:</label>
                <textarea id="alamat" name="alamat"><?php echo $alamat; ?></textarea>
                <span class="error"><?php echo $alamatErr ? "* $alamatErr" : ""; ?></span>
            </div>

            <!-- Tombol -->
            <div class="button-container">
                <button type="submit">Pesan Teknisi</button>
            </div>
        </form>
    </div>

    <!-- Tabel Hasil -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$emailErr && !$nomorErr && !$jenisErr && !$keluhanErr && !$alamatErr) { ?>
    <div class="container">
        <h3>Data Pemesanan:</h3>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th width="15%">Nama</th>
                        <th width="20%">Email</th>
                        <th width="15%">Nomor Telepon</th>
                        <th width="15%">Jenis Perangkat</th>
                        <th width="20%">Keluhan</th>
                        <th width="15%">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $jenis; ?></td>
                        <td><?php echo $keluhan; ?></td>
                        <td><?php echo $alamat; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>
</body>

</html>
