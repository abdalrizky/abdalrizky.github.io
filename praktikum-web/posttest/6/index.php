<?php

session_start();

if (isset($_SESSION["login"])) {
    if ($_SESSION["role"] === "user") {
        header("Location: dashboard-user.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Koding</title>
    <link rel="stylesheet" href="styles/home.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-main">
                <div class="navbar-logo">
                    <a href="#">belajar<span class="navbar-logo-koding">Koding</span></a>
                </div>
                <div class="navbar-menu">
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#about-me">Tentang Saya</a></li>
                        <li><a href="#" id="nav-menu-promo">Promo</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-extra">
                <div id="dark-mode-button" class="toggle-dark-mode">
                    <img src="img/ic_moon.svg" alt="Nyalakan Mode Gelap" id="toggle-dark-mode-icon">
                </div>
                <div class="navbar-extra-credential">
                    <?php 
                        if (isset($_SESSION["login"])) {
                            echo "<a href='logout.php'>Hai, {$_SESSION['email']}</a>";
                        } else {
                            echo '<div class="navbar-extra-credential-login-button"><a href="login.php">Masuk</a></div>
                    <a href="signup.php">Daftar</a>';
                        }
                    ?>
                </div>
            </div>
            <div class="navbar-hamburger" id="hamburger-btn">
                <i data-feather="menu"></i>
            </div>
            <div class="navbar-mobile" id="navbar-mobile">
                <div class="navbar-mobile-menu">
                    <ul>
                        <div class="navbar-mobile-link">
                            <li><a href="#">Beranda</a></li>
                        </div>
                        <div class="navbar-mobile-link">
                            <li><a href="#about-me">Tentang Saya</a></li>
                        </div>
                        <div class="navbar-mobile-link">
                            <li><a href="#" id="nav-menu-promo-mobile">Promo</a></li>
                        </div>
                        <div class="navbar-mobile-credential">
                            <?php 
                                if (isset($_SESSION["login"])) {
                                    echo "<div class='navbar-mobile-link'>
                                            <li><a href='login.php' style='color: #fff;'>Hai, {$_SESSION['email']}</a></li>
                                        </div>";
                                } else {
                                    echo '<div class="navbar-mobile-link">
                                            <li><a href="login.php" style="color: #fff;">Masuk</a></li>
                                        </div>
                                    <div class="navbar-mobile-link">
                                        <li><a href="signup.php" style="color: #fff;">Daftar</a></li>
                                    </div>';
                                }
                            ?>
                            
                        </div>
                        <div id="dark-mode-button-mobile" class="toggle-dark-mode-mobile navbar-mobile-link">
                            <img src="img/ic_moon.svg" alt="Nyalakan Mode Gelap" id="toggle-dark-mode-icon-mobile">
                            <span class="toggle-dark-mode-label" id="toggle-dark-mode-label-mobile">Mode Gelap</span>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="headline">
                <p class="headline-title">Selangkah mengejar mimpi menjadi Programmer</p>
                <p class="headline-subtitle">Bangun kariermu dan mulai belajar terarah bersama kami.</p>
            </div>
            <div class="main-buttons">
                <a href="#" class="button-filled">Alur Belajar</a>
                <a href="#" class="button-outlined">Lihat Semua Kelas</a>
            </div>
            <div class="categories">
                <h2 class="section-title">Kategori Kelas</h2>
                <div class="category-items">
                    <div class="category">
                        <div class="category-info">
                            <img class="category-icon" src="img/ic_design.svg" alt="" srcset="">
                            <div class="category-text">
                                <p>Kelas Desain</p>
                                <p class="headline-subtitle">UI/UX Grafik Desain</p>
                            </div>
                        </div>
                        <i class="category-go-to" data-feather="chevron-right"></i>
                    </div>
                    <div class="category">
                        <div class="category-info">
                            <img class="category-icon" src="img/ic_appcode.svg" alt="" srcset="">
                            <div class="category-text">
                                <p>Kelas Bahasa Pemrograman</p>
                                <p class="headline-subtitle">Buat aplikasi web, mobile, dll.</p>
                            </div>
                        </div>
                        <i class="category-go-to" data-feather="chevron-right"></i>
                    </div>
                    <div class="category">
                        <div class="category-info">
                            <img class="category-icon" src="img/ic_softskills.svg" alt="" srcset="">
                            <div class="category-text">
                                <p>Kelas Soft Skills</p>
                                <p class="headline-subtitle">Belajar pengembangan diri</p>
                            </div>
                        </div>
                        <i class="category-go-to" data-feather="chevron-right"></i>
                    </div>
                </div>
            </div>
            <div class="popular-classes">
                <h2>Kelas Unggulan</h2>
                <div class="popular-class-items">
                    <div class="course">
                        <div class="course-jumbrotron-image">
                            <img src="img/web.png" alt="Dummy Photo">
                        </div>
                        <div class="course-info">
                            <p>Full Stack Web Developer: Travegil</p>
                            <p>Rp99.000</p>
                            <div class="course-rating">
                                <div class="course-rating-star-icon">
                                    <img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star">
                                </div>
                                <span class="course-rating-count">(112)</span>
                            </div>
                        </div>
                    </div>
                    <div class="course">
                        <div class="course-jumbrotron-image">
                            <img src="img/android.png" alt="Dummy Photo">
                        </div>
                        <div class="course-info">
                            <p>Menjadi Android Developer Expert</p>
                            <p>Rp99.000</p>
                            <div class="course-rating">
                                <div class="course-rating-star-icon">
                                    <img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star">
                                </div>
                                <span class="course-rating-count">(362)</span>
                            </div>
                        </div>
                    </div>
                    <div class="course">
                        <div class="course-jumbrotron-image">
                            <img src="img/flutter.png" alt="Dummy Photo">
                        </div>
                        <div class="course-info">
                            <p>Menjadi Flutter Developer Expert</p>
                            <p>Rp99.000</p>
                            <div class="course-rating">
                                <div class="course-rating-star-icon">
                                    <img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star"><img src="img/ic_star.svg" alt="ic_star">
                                </div>
                                <span class="course-rating-count">(498)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'components/footer.php'; ?>

    <script>
        feather.replace();
    </script>
    <script src="script.js"></script>
</body>
</html>