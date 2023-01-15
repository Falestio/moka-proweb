<?php
include '../connectdb.php';
include '../getParams.php';

// dapatkan id tujuan dari url
$url = $_SERVER['REQUEST_URI'];
$params = getParams($url);
$id_tujuan = $params["id"];

// tampung data yang dikirim dari form
$nama_tujuan = $_POST['nama_tujuan'];
$keterangan = $_POST['keterangan'];
$jumlah_tujuan = $_POST['jumlah_tujuan'];

// lakukan query untuk edit data tujuan berdasarkan id tujuan
$query = "UPDATE tujuan SET nama_tujuan = '$nama_tujuan', keterangan = '$keterangan', jumlah_tujuan = $jumlah_tujuan WHERE id_tujuan = '$id_tujuan'";
$result = mysqli_query($conn, $query);

// jika berhasil mengedit data, redirect ke halaman tujuan
if ($result) {
    header("Location: /moka-native/dashboard/tujuan");
} else {
    echo "Gagal mengedit data";
}