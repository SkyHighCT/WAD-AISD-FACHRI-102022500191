<?php
require "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = mysqli_prepare($conn, "DELETE FROM penghuni WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: index.php?msg=deleted");
exit();
