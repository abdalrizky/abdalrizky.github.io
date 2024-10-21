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

    if ($email === "admin@gmail.com" && $password === "admin") {
        $_SESSION["login"] = true;
        $_SESSION["user"] = [
            "name" => "Admin",
            "email" => $email,
        ];
        header("Location: dashboard-admin.php");
    } else {
        $loginQuery = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $loginQuery);
        if ($result) {
            $credential = mysqli_fetch_assoc($result);
            if ($credential !== null) {
                if (password_verify($password, $credential["password"])) {
                    $_SESSION["login"] = true;
                    $_SESSION["user"] = $credential;
                    header("Location: index.php");
                } else {
                    echo "<script>alert('Kata sandi salah!')</script>";
                }
            } else {
                echo "<script>alert('Surel tidak terdaftar!')</script>";
            }
        }
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