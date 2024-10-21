<?php

    date_default_timezone_set("Asia/Makassar");

    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "belajar_koding";

    $connection = mysqli_connect($host, $username, $password, $dbname);

    if (!$connection) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

?>