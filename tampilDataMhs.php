<?php
include "koneksi.php";
$data = mysqli_query($koneksir, "SELECT * FROM mhs ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h2>Daftar Data Mahasiswa</h2>
        <p>Muhamad Farid Alfarizi - A12.2024.07218</p>
        <a href="tambahDataMhs.php" class="btn-add">Tambah Data Baru</a>
        <br><br>

        <table class="tabel-mhs">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jml Sdr</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>JK</th>
                    <th>Status</th>
                    <th>Hobi</th>
                    <th>Email</th>
                    <th>Pass</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_assoc($data)): ?>
                    <tr>
                        <td data-label="ID"><?= $row['id'] ?></td>
                        <td data-label="NIM"><?= $row['nim'] ?></td>
                        <td data-label="Nama"><?= $row['nama'] ?></td>
                        <td data-label="Tempat Lahir"><?= $row['tempatLahir'] ?></td>
                        <td data-label="Tanggal Lahir"><?= $row['tanggalLahir'] ?></td>
                        <td data-label="Jml Sdr"><?= $row['jmlSaudara'] ?></td>
                        <td data-label="Alamat"><?= $row['alamat'] ?></td>
                        <td data-label="Kota"><?= $row['kota'] ?></td>
                        <td data-label="JK"><?= $row['jenisKelamin'] ?></td>
                        <td data-label="Status"><?= $row['statusKeluarga'] ?></td>
                        <td data-label="Hobi"><?= $row['hobi'] ?></td>
                        <td data-label="Email"><?= $row['email'] ?></td>
                        <td data-label="Pass"><?= $row['pass'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>