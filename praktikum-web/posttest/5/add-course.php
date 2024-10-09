<?php

    require "utils/connection.php";
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
    }

    if (isset($_POST["add-course"])) {
        $courseName = htmlspecialchars(ucwords($_POST["course-name"]));
        $courseCategory = $_POST["course-category"];
        $coursePrice = $_POST["course-price"];
        $coursePhoto = null;

        $query = "INSERT INTO courses VALUES (null, (SELECT id FROM course_categories WHERE id = $courseCategory), '$courseName', '$coursePhoto', $coursePrice, 0)";
        $result = mysqli_query($connection, $query);

        if (mysqli_affected_rows($connection) > 0) {
            echo "<script>alert('Kelas berhasil ditambahkan!');
                document.location.href = 'dashboard-admin.php';
            </script>";
        } else {
            echo "<script>alert('Gagal menambahkan kelas!')</script>";
        }
    }

    $result = mysqli_query($connection, "SELECT * FROM course_categories");
    $categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas Baru</title>
    <link rel="stylesheet" href="styles/add-edit-course.css">
</head>
<body>
    <p class="logo">belajar<span class="logo-koding">Koding</span></p>
    <div class="container">
        <h1>Tambah Kelas Baru</h1>
        <form action="" method="post">
            <label for="course-name">Nama Kelas</label>
            <input type="text" name="course-name" id="course-name" required>
            <label for="course-category">Kategori Kelas</label>
            <select name="course-category" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <?php
                    foreach ($categories as $category) {
                        echo "<option value='{$category['id']}'>{$category['name']}</option>";
                    }
                ?>
            </select>
            <label for="course-price">Harga Kelas</label>
            <input type="number" name="course-price" id="course-price" required>
            <label for="course-photo">Foto Kelas (Opsional)</label>
            <input type="file" name="course-photo" id="course-photo">
            <button type="submit" name="add-course">Tambah Kelas</button>
        </form>
    </div>
</body>
</html>