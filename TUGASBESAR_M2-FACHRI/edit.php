<?php
require "config.php";

if (!isset($_GET["id"]) && !isset($_POST["id"])) {
    header("Location: index.php");
    exit();
}

$id = $_GET["id"] ?? $_POST["id"];

$nama = $nomor = $pekerjaan = $nomorkamar = $kontakdarurat = "";
$namaErr = $nomorErr = $pekerjaanErr = $nomorkamarErr = $kontakdaruratErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = trim($_POST["nama"]);
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    $nomor = trim($_POST["nomor"]);
    if (empty($nomor)) {
        $nomorErr = "No. Ktp wajib diisi";
    } elseif (!ctype_digit($nomor)) {
        $nomorErr = "No. Ktp hanya boleh angka";
    }

    $pekerjaan = trim($_POST["pekerjaan"]);
    if (empty($pekerjaan)) {
        $pekerjaanErr = "Pekerjaan wajib diisi";
    }

    $nomorkamar = $_POST["nomorkamar"] ?? "";
    if (empty($nomorkamar)) {
        $nomorkamarErr = "Pilih No. Kamar";
    }

    $kontakdarurat = trim($_POST["kontakdarurat"]);
    if (empty($kontakdarurat)) {
        $kontakdaruratErr = "Kontak darurat wajib diisi";
    }

    if (!$namaErr && !$nomorErr && !$pekerjaanErr && !$nomorkamarErr && !$kontakdaruratErr) {
        $stmt = mysqli_prepare($conn,
            "UPDATE penghuni SET nama=?, no_ktp=?, pekerjaan=?, no_kamar=?, kontak_darurat=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "sssssi", $nama, $nomor, $pekerjaan, $nomorkamar, $kontakdarurat, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: index.php?msg=updated");
        exit();
    }
} else {
    $stmt = mysqli_prepare($conn, "SELECT * FROM penghuni WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header("Location: index.php");
        exit();
    }

    $nama = $row["nama"];
    $nomor = $row["no_ktp"];
    $pekerjaan = $row["pekerjaan"];
    $nomorkamar = $row["no_kamar"];
    $kontakdarurat = $row["kontak_darurat"];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Penghuni Kos</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Edit Data Penghuni</h2>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
            <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>
        </div>

        <div class="form-group">
            <label>Nomor KTP</label>
            <input type="text" id="nomor" name="nomor" value="<?php echo htmlspecialchars($nomor); ?>">
            <span class="error"><?php echo $nomorErr ? "* $nomorErr" : ""; ?></span>
        </div>

        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" value="<?php echo htmlspecialchars($pekerjaan); ?>">
            <span class="error"><?php echo $pekerjaanErr ? "* $pekerjaanErr" : ""; ?></span>
        </div>

        <div class="form-group">
            <label for="nomorkamar">No. Kamar</label>
            <select id="nomorkamar" name="nomorkamar">
                <option value="">-- Pilih --</option>
                <option value="A-04" <?php echo ($nomorkamar == "A-04") ? "selected" : ""; ?>>A-04</option>
                <option value="A-02" <?php echo ($nomorkamar == "A-02") ? "selected" : ""; ?>>A-02</option>
                <option value="B-02" <?php echo ($nomorkamar == "B-02") ? "selected" : ""; ?>>B-02</option>
                <option value="B-04" <?php echo ($nomorkamar == "B-04") ? "selected" : ""; ?>>B-04</option>
                <option value="A-01" <?php echo ($nomorkamar == "A-01") ? "selected" : ""; ?>>A-01</option>
                <option value="A-05" <?php echo ($nomorkamar == "A-05") ? "selected" : ""; ?>>A-05</option>
                <option value="B-03" <?php echo ($nomorkamar == "B-03") ? "selected" : ""; ?>>B-03</option>
            </select>
            <span class="error"><?php echo $nomorkamarErr ? "* $nomorkamarErr" : ""; ?></span>
        </div>

        <div class="form-group">
            <label>Kontak Darurat</label>
            <input type="text" id="kontakdarurat" name="kontakdarurat" value="<?php echo htmlspecialchars($kontakdarurat); ?>">
            <span class="error"><?php echo $kontakdaruratErr ? "* $kontakdaruratErr" : ""; ?></span>
        </div>

        <div class="btn-group">
            <a href="index.php" class="btn btn-batal">Batal</a>
            <button type="submit" class="btn btn-simpan">Update Data</button>
        </div>
    </form>
    </div>
</body>
</html>
