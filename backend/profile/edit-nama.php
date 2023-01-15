<?php
include '../connectdb.php';
include '../getParams.php';

// dapatkan id tujuan dari url
$id_akun = $_COOKIE['id_akun'];

// tampung data yang dikirim dari form
$nama_akun = $_POST['nama'];

// lakukan query untuk edit data tujuan berdasarkan id tujuan
$query = "UPDATE akun SET nama = '$nama_akun' WHERE id_akun = '$id_akun'";
$result = mysqli_query($conn, $query);

// jika berhasil mengedit data, redirect ke halaman tujuan
if ($result) {
    header("Location: /moka-native/dashboard/profil/index.php");
} else {
    echo "Gagal mengedit data";
}