<?php
include '../connectdb.php';
include '../getParams.php';

// dapatkan id tujuan dari url
$url = $_SERVER['REQUEST_URI'];
$params = getParams($url);
$id_tujuan = $params["id"];

// lakukan query untuk menghapus data tujuan berdasarkan id tujuan
$query = "DELETE FROM tujuan WHERE id_tujuan = '$id_tujuan'";
$result = mysqli_query($conn, $query);

// jika berhasil menghapus data, redirect ke halaman tujuan
if ($result) {
    header("Location: /moka-native/dashboard/tujuan");
} else {
    echo "Gagal menghapus data";
}