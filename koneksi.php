<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "universitas";

$koneksir = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if (!$koneksir) {
    die("Koneksi gagal : " . mysqli_connect_error());
}
?>