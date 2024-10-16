<?php
require "utils/connection.php";
require "utils/query.php";

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

$courseCategories = query("SELECT * FROM course_categories");
$course = [];

if (isset($_GET["id"])) {
    $courseId = $_GET["id"];
    $course = query("SELECT * FROM courses WHERE id = $courseId");
    if ($course) {
        $course = $course[0];
    } else {
        echo "Kelas tidak ditemukan.";
        exit;
    }
} else {
    echo "ID harus dilampirkan.";
    exit;
}

if (isset($_POST["edit-course"])) {
    $courseName = htmlspecialchars(ucwords($_POST["course-name"]));
    $courseCategory = $_POST["course-category"];
    $coursePrice = $_POST["course-price"];
    $coursePhoto = $_FILES["course-photo"];
    
    // jika tidak ada foto yang diunggah
    if ($coursePhoto["error"] === 4) {
        $coursePhoto = $course["photo"];
    } else {
        $coursePhotoType = strtolower(pathinfo($coursePhoto["name"], PATHINFO_EXTENSION));
        $coursePhotoSize = $coursePhoto["size"];
        $coursePhotoTemp = $coursePhoto["tmp_name"];

        $typesAllowed = ["jpg", "jpeg", "png"];
        if (!in_array($coursePhotoType, $typesAllowed)) {
            echo "<script>alert('Format file tidak didukung!');
                document.location.href = 'edit-course.php?id=$courseId';
            </script>";
            die;
        }

        // maksimal 2 MB
        if ($coursePhotoSize > 2000000) {
            echo "<script>alert('Ukuran file terlalu besar! Maksimal 2 MB.');
                document.location.href = 'edit-course.php?id=$courseId';
            </script>";
            die;
        }

        $coursePhotoNewFileName = date("Y-m-d H.i.s") . "." . $coursePhotoType;
        unlink("img/uploads/{$course['photo']}");
        move_uploaded_file($coursePhotoTemp, "img/uploads/$coursePhotoNewFileName");
        $coursePhoto = $coursePhotoNewFileName;
    }

    $query = "UPDATE courses SET category_id = $courseCategory, name = '$courseName', photo = '$coursePhoto', price = $coursePrice WHERE id = $courseId";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_affected_rows($connection) > 0) {
        echo "<script>alert('Kelas berhasil diubah!');
            document.location.href = 'dashboard-admin.php';
        </script>";
    } else {
        echo "<script>alert('Gagal mengubah kelas!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
    <link rel="stylesheet" href="styles/add-edit-course.css">
</head>
<body>
    <p class="logo">belajar<span class="logo-koding">Koding</span></p>
    <div class="container">
        <h1>Ubah Informasi Kelas</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="course-name">Nama Kelas</label>
            <input type="text" name="course-name" id="course-name" value="<?= $course['name'] ?>" required>
            <label for="course-category">Kategori Kelas</label>
            <select name="course-category" required>
                <option value="" disabled>Pilih Kategori</option>
                <?php foreach($courseCategories as $courseCategory): ?>
                    <option value="<?= $courseCategory['id'] ?>" <?= $courseCategory['id'] == $course['category_id'] ? "selected" : "" ?>><?= $courseCategory['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="course-price">Harga Kelas</label>
            <input type="number" name="course-price" id="course-price" value="<?= $course['price'] ?>" required>
            <label for="course-photo">Foto Kelas (Opsional)</label>
            <input type="file" name="course-photo" id="course-photo">
            <img src="<?= $course["photo"] ? "img/uploads/{$course["photo"]}" : "https://placehold.co/600x400?text=Gambar+Tidak+Tersedia" ?>" alt="<?= $course['name'] ?>">
            <button type="submit" name="edit-course">Ubah Kelas</button>
        </form>
    </div>
</body>
</html>