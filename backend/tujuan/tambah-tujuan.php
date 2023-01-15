<?php
include "../connectdb.php";
include "../randomid.php";


$id_akun = $_COOKIE['id_akun'];
$nama_tujuan = $_POST['nama_tujuan'];
$keterangan = $_POST['keterangan'];
$jumlah_tujuan = $_POST['jumlah_tujuan'];
$icon = "https://www.flaticon.com/svg/static/icons/svg/149/149071.svg";
$id_tujuan = randomid(11);

// query untuk menambah tujuan ke database
$query = "INSERT INTO tujuan (id_tujuan, nama_tujuan, icon, keterangan, jumlah_tujuan, id_akun) VALUES ('$id_tujuan', '$nama_tujuan', '$icon', '$keterangan', $jumlah_tujuan, '$id_akun')";
$result = $conn->query($query);

// jika berhasil menambahkan tujuan, redirect ke halaman tujuan
if ($result == TRUE){
    header("Location: ../../dashboard/tujuan");
} else {
    echo "Gagal menambahkan tujuan";
}