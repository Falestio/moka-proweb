<?php
include "../connectdb.php";
include "../getParams.php";

$url = $_SERVER['REQUEST_URI'];
$params = getParams($url);
$id_anggaran = $params["id"];

// lakukan query untuk menghapus data anggaran berdasarkan id anggaran
$query = "DELETE FROM anggaran WHERE id_anggaran = '$id_anggaran'";
$result = mysqli_query($conn, $query);

// jika berhasil menghapus data, redirect ke halaman anggaran
if ($result) {
    header("Location: /moka-native/dashboard/anggaran");
} else {
    echo "Gagal menghapus data";
}