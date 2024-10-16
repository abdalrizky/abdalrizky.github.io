<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Surel</title>
    <link rel="stylesheet" href="styles/confirmation.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <div class="container">
        <p class="logo">belajar<span class="logo-koding">Koding</span></p>
        <h1>Kami telah mengirimkan surel konfirmasi ke <?= $_POST['email'] ?></h1>
        <p class="subtitle-text">Silakan cek kotak masuk atau folder spam.</p>
        <p style="margin-top: 16px;">Mohon agar dapat mengingat tanggal lahir Anda: <?= date_format(date_create($_POST['birthday']), "d-m-Y") ?>, karena sewaktu-waktu akan kami tanyakan untuk verifikasi akun.</p>
        <p style="margin-top: 8px;">Selanjutnya, gunakan surel yang tertera di atas dan sandi: <span id="password-mask">∗∗∗∗∗∗∗∗ </span><i data-feather="eye" id="show-password"></i> untuk masuk ke belajarKoding.</p>
        <a href="index.php" class="button">Masuk ke Beranda</a>
    </div>
    
    <script>
        feather.replace();
    </script>
    <script>
        const showPasswordButton = document.getElementById('show-password')
        const passwordMask = document.getElementById('password-mask')

        let showPassword = false

        showPasswordButton.addEventListener('click', () => {

            showPassword = !showPassword

            if (showPassword) {
                passwordMask.innerHTML = '<?= $_POST['password'] ?> '
            } else {
                passwordMask.innerHTML = '∗∗∗∗∗∗∗∗ '
            }
        })
    </script>
</body>
</html>