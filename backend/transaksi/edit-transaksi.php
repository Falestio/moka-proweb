<?php
include '../connectdb.php';
include '../randomid.php';
include '../getParams.php';

$params = getParams($_SERVER["REQUEST_URI"]);
$id_transaksi = $params["id"];

$jenis_transaksi = $_POST['jenis_transaksi'];
$id_akun = $_COOKIE['id_akun'];
$judul = $_POST['judul'];
$keterangan = $_POST['keterangan'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$id_dompet = $_POST['id_dompet'];
$id_tujuan = $_POST['id_tujuan'];
$id_anggaran = $_POST['id_anggaran'];

echo $jenis_transaksi;

if($jenis_transaksi = "pemasukan"){
    $query = "UPDATE pemasukan SET judul = '$judul', keterangan = '$keterangan', jumlah = '$jumlah', tanggal = '$tanggal', id_tujuan = '$id_tujuan', id_dompet = '$id_dompet' WHERE id = '$id_transaksi'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: /moka-native/dashboard/transaksi/index.php");
    } else {
        echo "gagal";
    }
}

if($jenis_transaksi = "pengeluaran"){
    $query = "UPDATE pengeluaran SET judul = '$judul', keterangan = '$keterangan', jumlah = '$jumlah', tanggal = '$tanggal', id_anggaran = '$id_anggaran', id_dompet = '$id_dompet' WHERE id = '$id_transaksi'";
    $result = mysqli_query($conn, $query);

    if($result){
        header("Location: /moka-native/dashboard/transaksi/index.php");
    } else {
        echo "gagal";
    }
}