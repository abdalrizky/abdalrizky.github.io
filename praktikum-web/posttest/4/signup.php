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
        <form action="confirmation.php" method="POST" class="login-form">
            <label for="email">Surel</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Kata Sandi</label>
            <input type="password" name="password" id="password" required>
            <label for="birthday">Tanggal Lahir</label>
            <input type="date" name="birthday" id="birthday" required>
            <button type="submit">Daftar</button>
        </form>
        <p class="already-have-account">Sudah punya akun? <a href="#">Masuk</a></p>
    </div>
</body>
</html>