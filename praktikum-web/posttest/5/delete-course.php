<?php

require 'utils/connection.php';

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

if (isset($_GET["id"])) {
    $courseId = $_GET["id"];
    $query = "DELETE FROM courses WHERE id = $courseId";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Kelas berhasil dihapus!')</script>";
        header("Location: dashboard-admin.php");
    } else {
        echo "<script>alert('Gagal menghapus kelas!')</script>";
    }
} else {
    echo "ID harus dilampirkan.";
    exit;
}

?>