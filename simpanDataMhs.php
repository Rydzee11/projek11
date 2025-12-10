<?php
include("koneksi.php");
// ambil data dan sanitasi
function bersih($data)
{
    if (is_array($data)) {
        return array_map('bersih', $data);
    }
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// ambil password asli dari input form
$xnim = bersih($_POST['nim'] ?? '');
$xnama = bersih($_POST['nama'] ?? '');
$xtempatLahir = bersih($_POST['tempatLahir'] ?? '');
$xtanggalLahir = bersih($_POST['tanggalLahir'] ?? '');
$xjmlSaudara = bersih($_POST['jmlSaudara'] ?? '');
$Xalamat = bersih($_POST['alamat'] ?? '');
$xkota = bersih($_POST['kota'] ?? '');
$xjk = bersih($_POST['jk'] ?? '');
$xstatusKeluarga = bersih($_POST['statusKeluarga'] ?? '');
$xhobi = isset($_POST['hobi']) ? implode(",", bersih($_POST['hobi'])) : "";
$xemail = bersih($_POST['email'] ?? '');
$xraw_password = bersih($_POST['password'] ?? '');

// lakukan validasi pada password asli (panjang, kompleks, dll)
if (empty($xraw_password) || strlen($xraw_password) < 10) {
    die("Password minimal 10 karakter.");
}

// hashing password menggunakan password_hash()
$hashed_password = password_hash($xraw_password, PASSWORD_BCRYPT);

$xtglLahir = date("Y-m-d", strtotime($xtanggalLahir));

$sql1 = "INSERT INTO mhs (nim,nama,tempatLahir,tanggalLahir,jmlSaudara,alamat,kota,jenisKelamin,statusKeluarga,hobi,email,pass) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $koneksir->prepare($sql1);

if (!$stmt) {
    die("Prepare failed: " . $koneksir->error);
}

$stmt->bind_param("ssssssssssss", $xnim, $xnama, $xtempatLahir, $xtglLahir, $xjmlSaudara, $Xalamat, $xkota, $xjk, $xstatusKeluarga, $xhobi, $xemail, $xhashed_password);

if ($stmt->execute()) {
    echo "Data berhasil disimpan! <br>";
    echo "<a href='tampilDataMhs.php'>Lihat Data</a>";
} else {
    echo "Error: " . mysqli_error($koneksir);
}

$stmt->close();
$koneksir->close();
?>