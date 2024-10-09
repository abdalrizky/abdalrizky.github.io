<?php

    require 'utils/connection.php';
    require 'utils/query.php';

    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
    }

    if ($_SESSION["role"] !== "admin") {
        header("Location: index.php");
    }

    $courses = query("SELECT courses.*, course_categories.name AS category FROM courses JOIN course_categories ON courses.category_id = course_categories.id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Admin</title>
    <link rel="stylesheet" href="styles/dashboard-admin.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <p class="logo">belajar<span class="logo-koding">Koding</span></p>
            <a href="logout.php" class="logout-button"><i data-feather="log-out"></i>Keluar</a>
        </div>
        <a href="add-course.php" class="button-add-course">
            <i data-feather="plus"></i>
            Tambah Kelas Baru
        </a>
        <?php if (count($courses) == 0) : ?>
            <h2 class="courses-not-found-message">Belum ada kelas yang ditambahkan.</h2>
        <?php endif; ?>
        <?php foreach ($courses as $course) : ?>
            <div class="course-item">
                <div class="course-main-info">
                    <img src="https://placehold.co/600x400?text=Gambar+Tidak+Tersedia" alt="<?= $course['name'] ?>">
                    <div>
                        <p><?= $course["name"] ?></p>
                        <p class="course-main-info-category"><?= $course["category"] ?></p>
                        <p><?php echo("Rp".number_format($course["price"], decimal_separator: ',', thousands_separator: '.')) ?></p>
                    </div>
                </div>
                <div class="course-action">
                    <a href="edit-course.php?id=<?= $course["id"] ?>"><i data-feather="edit"></i></a>
                    <a href="delete-course.php?id=<?= $course["id"] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')"><i data-feather="trash-2"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
    <script>
        feather.replace();
    </script>
    <script>
        document.querySelector(".course-action-delete").addEventListener("click", () => {
            if (!confirm("Apakah Anda yakin ingin menghapus kelas ini?")) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>