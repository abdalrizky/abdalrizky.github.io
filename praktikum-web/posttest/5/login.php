<?php

    require "utils/connection.php";
    require "utils/query.php";

    session_start();

    if (isset($_SESSION["login"])) {
        header("Location: index.php");
    }

    if (isset($_POST["login"])) {
        $email = strtolower($_POST["email"]);
        $password = $_POST["password"];
        
        $result = query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        if (count($result) === 1) {
            $_SESSION["login"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["role"] = $result[0]["role"];
            if ($_SESSION["role"] === "admin") {
                header("Location: dashboard-admin.php");
            } else {
                header("Location: index.php");
            }
        } else {
            echo "<script>alert('Email atau kata sandi salah!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Pengguna Baru</title>
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>
    <div class="container">
        <p class="logo">belajar<span class="logo-koding">Koding</span></p>
        <form action="" method="POST" class="login-form">
            <label for="email">Surel</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Kata Sandi</label>
            <input type="password" name="password" id="password" required>
            <button type="submit" name="login">Masuk</button>
        </form>
        <p class="already-have-account">Belum punya akun? <a href="signup.php">Daftar</a></p>
    </div>
</body>
</html>