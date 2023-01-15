<?php
include '../connectdb.php';
include '../getParams.php';

// dapatkan id tujuan dari url
$url = $_SERVER['REQUEST_URI'];
$params = getParams($url);
$id_dompet = $params["id"];

// tampung data yang dikirim dari form
$nama_dompet = $_POST['nama_dompet'];
$keterangan = $_POST['keterangan'];
$saldo_awal = $_POST['saldo_awal'];

// lakukan query untuk edit data tujuan berdasarkan id tujuan
$query = "UPDATE dompet SET nama = '$nama_dompet', keterangan = '$keterangan', saldo = $saldo_awal WHERE id_dompet = '$id_dompet'";
$result = mysqli_query($conn, $query);

// jika berhasil mengedit data, redirect ke halaman tujuan
if ($result) {
    header("Location: /moka-native/dashboard/dompet");
} else {
    echo "Gagal mengedit data";
}