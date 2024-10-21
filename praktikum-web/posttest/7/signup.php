<?php

require 'utils/connection.php';
require 'utils/query.php';

session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
}

if (isset($_POST["signup"])) {
    $name = htmlspecialchars(ucwords($_POST["name"]));
    $email = strtolower($_POST["email"]);
    $password = $_POST["password"];
    $birthday = $_POST["birthday"];

    $checkDuplicateEmail = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($checkDuplicateEmail) > 0) {
        echo "<script>alert('Surel sudah digunakan!')</script>";
    } else {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($connection, "INSERT INTO users (name, email, password, birthday) VALUES ('$name', '$email', '$passwordHashed', '$birthday')");
        if (mysqli_affected_rows($connection) > 0) {
            $user = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'"));
            $_SESSION["login"] = true;
            $_SESSION["user"] = $user;
            header("Location: index.php");
        } else {
            echo "<script>alert('Pendaftaran gagal!" . mysqli_error($connection) .  "')</script>";
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
            <label for="email">Nama Lengkap</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Surel</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Kata Sandi</label>
            <input type="password" name="password" id="password" required>
            <label for="birthday">Tanggal Lahir</label>
            <input type="date" name="birthday" id="birthday" required>
            <button type="submit" name="signup">Daftar</button>
        </form>
        <p class="already-have-account">Sudah punya akun? <a href="login.php">Masuk</a></p>
    </div>
</body>
</html>