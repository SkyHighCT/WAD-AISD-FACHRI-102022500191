<?php
    $nama = $nomor = $pekerjaan = $nomorkamar = $kontakdarurat = "";
    $namaErr = $nomorErr = $pekerjaanErr = $nomorkamarErr = $kontakdaruratErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // nama
    $nama = trim($_POST["nama"]);
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    // no. ktp
    $nomor = trim($_POST["nomor"]);
    if (empty($nomor)) {
        $nomorErr = "No. Ktp wajib diisi";
    } elseif (!ctype_digit($nomor)) {
        $nomorErr = "No. Ktp hanya boleh angka";
    }

    //pekerjaan
    $pekerjaan = trim($_POST["pekerjaan"]);
    if (empty($pekerjaan)) {
        $pekerjaanErr = "Pekerjaan wajib diisi";
    }

    // no. kamar
    $nomorkamar = $_POST["nomorkamar"] ?? "";
    if (empty($nomorkamar)) {
        $nomorkamarErr = "Pilih No. Kamar perangkat";
    }

    // kontak darurat
    $kontakdarurat = trim($_POST["kontakdarurat"]);
    if (empty($kontakdarurat)) {
        $kontakdaruratErr = "Kontak darurat wajib diisi";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Data Tambah Penghuni Kos</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Tambah Penghuni Kos</h2>

    <!-- form action="manajemenkos.html" -->
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
            <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>
        </div>

        <div class="form-group">
            <label>Nomor KTP</label>
            <input type="text" id="nomor" name="nomor" value="<?php echo $nomor; ?>">
            <span class="error"><?php echo $nomorErr ? "* $nomorErr" : ""; ?></span>
        </div>

        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" value="<?php echo $pekerjaan; ?>">
            <span class="error"><?php echo $pekerjaanErr ? "* $pekerjaanErr" : ""; ?></span>
        </div>

        <div class="form-group">
            <label>Nomor Kamar</label>

            <label for="nomorkamar">No. Kamar:</label>
                <select id="nomorkamar" name="nomorkamar">
                    <option value="">-- Pilih --</option>
                    <option value="A-04" <?php echo ($nomorkamar == "A-04") ? "selected" : ""; ?>>A-04</option>
                    <option value="A-02" <?php echo ($nomorkamar == "A-02") ? "selected" : ""; ?>>A-02</option>
                    <option value="B-02" <?php echo ($nomorkamar == "B-02") ? "selected" : ""; ?>>B-02</option>
                    <option value="B-04" <?php echo ($nomorkamar == "B-04") ? "selected" : ""; ?>>B-04</option>
                </select>
                <span class="error"><?php echo $nomorkamarErr ? "* $nomorkamarErr" : ""; ?></span>
        </div>

        <div class="form-group">
            <label>Kontak Darurat</label>
            <input type="text" id="kontakdarurat" name="kontakdarurat" value="<?php echo $kontakdarurat; ?>">
            <span class="error"><?php echo $kontakdaruratErr ? "* $kontakdaruratErr" : ""; ?></span>
        </div>

        <div class="btn-group">
            <a href="manajemenkos.html" class="btn btn-batal">Batal</a>
            <button type="submit" class="btn btn-simpan">Simpan Data</button>
        </div>
    </form>
    </div>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$nomorErr && !$pekerjaanErr && !$nomorkamarErr && !$kontakdaruratErr) { ?>
    <div class="container">
        <h3>Data Penghuni:</h3>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th width="15%">Nama</th>
                        <th width="20%">No. Ktp</th>
                        <th width="15%">Pekerjaan</th>
                        <th width="15%">No. Kamar</th>
                        <th width="20%">Kontak Darurat</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pekerjaan; ?></td>
                        <td><?php echo $nomorkamar; ?></td>
                        <td><?php echo $kontakdarurat; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>
</body>
</html>