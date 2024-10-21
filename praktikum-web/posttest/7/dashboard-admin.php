<?php

require 'utils/connection.php';
require 'utils/query.php';

session_start();

if (isset($_SESSION["login"])) {
    if ($_SESSION["user"]["email"] !== "admin@gmail.com") {
        echo "Kamu tidak diizinkan untuk masuk ke laman ini.";
        exit;
    }
} else {
    header("Location: login.php");
}

$courses = query(
    "SELECT courses.*, course_categories.name AS category
    FROM courses
    JOIN course_categories ON courses.category_id = course_categories.id
    ORDER BY courses.id DESC"
);

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
            <div class="navbar-user-info">
                <p class="navbar-user-info-email">Hai, <?= $_SESSION["user"]["name"] ?></p>
                <a href="logout.php" class="logout-button"><i data-feather="log-out"></i></a>
            </div>
            
        </div>
        <a href="add-course.php" class="button-add-course">
            <i data-feather="plus"></i>
            Tambah Kelas Baru
        </a>
        <?php if (count($courses) !== 0) : ?>
            <form action="search.php" method="get">
                <input type="search" class="search-input" id="search-input" placeholder="Cari...">
            </form>
            <?php foreach ($courses as $course) : ?>
                <div class="course-item">
                    <div class="course-main-info">
                        <img src="<?= $course["photo"] ? "img/uploads/{$course["photo"]}" : "https://placehold.co/250x150?text=Gambar+Tidak+Tersedia" ?>" alt="<?= $course['name'] ?>">
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
        <?php else: ?>
            <h2 class="courses-not-found-message">Belum ada kelas yang ditambahkan.</h2>
        <?php endif; ?>
    </div>
    <script>
        feather.replace();
    </script>
    <script>
        const searchInput = document.getElementById('search-input')
        const items = document.querySelectorAll('.course-item')
        const searchNotFoundMessage = document.getElementById('search-not-found-message');
        
        searchInput.addEventListener('input', (el) => {
            items.forEach((item) => {
                if (item.innerText.toLowerCase().includes(el.target.value.toLowerCase())) {
                    item.classList.remove('hide');
                } else {
                    item.classList.add('hide');
                }
            })
        })

        document.querySelector(".course-action-delete").addEventListener("click", () => {
            if (!confirm("Apakah Anda yakin ingin menghapus kelas ini?")) {
                event.preventDefault();
            }
        });

    </script>
</body>
</html>