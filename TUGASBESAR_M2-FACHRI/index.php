<?php
require "config.php";

$sql = "SELECT * FROM penghuni ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Penghuni Kos</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="title">
        <h1>Modul Data Penghuni</h1>
    </div>

    <?php if (isset($_GET["msg"])) { ?>
        <div class="alert">
            <?php
            if ($_GET["msg"] == "added") echo "Data penghuni berhasil ditambahkan.";
            if ($_GET["msg"] == "updated") echo "Data penghuni berhasil diperbarui.";
            if ($_GET["msg"] == "deleted") echo "Data penghuni berhasil dihapus.";
            ?>
        </div>
    <?php } ?>

    <div class="container2">
        <h2>Daftar Penghuni Kos</h2>
        <a href="tambah.php">+ Tambah Penghuni</a>
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row["nama"]); ?></td>
                    <td><?php echo htmlspecialchars($row["no_ktp"]); ?></td>
                    <td><?php echo htmlspecialchars($row["pekerjaan"]); ?></td>
                    <td><?php echo htmlspecialchars($row["no_kamar"]); ?></td>
                    <td><?php echo htmlspecialchars($row["kontak_darurat"]); ?></td>
                    <td class="aksi">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-aksi btn-edit">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-aksi btn-hapus"
                           onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php
                }
                if ($no == 1) {
                    echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data penghuni.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
