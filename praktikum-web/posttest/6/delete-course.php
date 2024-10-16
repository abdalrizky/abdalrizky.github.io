<?php

require 'utils/connection.php';

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

if (isset($_GET["id"])) {
    $courseId = $_GET["id"];
    $course = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM courses WHERE id = $courseId"));
    $deleteQuery = mysqli_query($connection, "DELETE FROM courses WHERE id = $courseId");
    if ($deleteQuery) {
        if ($course["photo"]) {
            unlink("img/uploads/{$course["photo"]}");
        }
        echo "<script>alert('Kelas berhasil dihapus!');
            document.location.href = 'dashboard-admin.php';
        </script>";
    } else {
        echo "<script>alert('Gagal menghapus kelas!')</script>";
    }
} else {
    echo "ID harus dilampirkan.";
    exit;
}

?>