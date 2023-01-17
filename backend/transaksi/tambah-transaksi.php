<?php
include '../connectdb.php';
include '../randomid.php';

$jenis_transaksi = $_POST['jenis_transaksi'];
$id_akun = $_COOKIE['id_akun'];
$id_transaksi = randomid(11);
$judul = $_POST['judul'];
$keterangan = $_POST['keterangan'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$id_dompet = $_POST['id_dompet'];
$id_tujuan = $_POST['id_tujuan'];
$id_anggaran = $_POST['id_anggaran'];

if($jenis_transaksi == "pemasukan"){
    $pemasukanQuery = "INSERT INTO pemasukan VALUES ('$id_transaksi', '$judul', '$keterangan', $jumlah, '$tanggal', '$id_tujuan', '$id_dompet', '$id_akun')";
    $pemasukanResult = mysqli_query($conn, $pemasukanQuery);

    if($pemasukanResult){
        header("Location: /moka-native/dashboard/transaksi");
    }else{
        echo "Gagal menambahkan transaksi";
    }
}

if($jenis_transaksi == "pengeluaran"){
    $pengeluaranQuery = "INSERT INTO pengeluaran VALUES ('$id_transaksi', '$judul', '$keterangan', -$jumlah, '$tanggal', '$id_anggaran', '$id_dompet', '$id_akun')";
    $pengeluaranResult = mysqli_query($conn, $pengeluaranQuery);

    if($pengeluaranResult){
        header("Location: /moka-native/dashboard/transaksi");
    }else{
        echo "Gagal menambahkan transaksi";
    }
}
