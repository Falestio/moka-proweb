<?php
include '../connectdb.php';
include '../getParams.php';

$params = getParams($_SERVER['REQUEST_URI']);
$id_transaksi = $params['id'];

$sql = "DELETE FROM pengeluaran WHERE id = '$id_transaksi'";
$result = mysqli_query($conn, $sql);

if ($result) {
    header('Location: /moka-native/dashboard/transaksi/index.php');
} else {
    echo 'Gagal menghapus data';
}