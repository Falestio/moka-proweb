<?php
include '../connectdb.php';
include '../randomid.php';
include '../getParams.php';

// dapatkan id anggaran dari url
$params = getParams($_SERVER['REQUEST_URI']);

$idAnggaran = $params["id"];
$namaAnggaran = $_POST['nama_anggaran'];
$keteranganAnggaran = $_POST['keterangan'];
$jumlahAnggaran = $_POST['jumlah_anggaran'];

// lakukan query untuk edit data anggaran berdasarkan id anggaran
$query = "UPDATE anggaran SET nama_anggaran = '$namaAnggaran', keterangan = '$keteranganAnggaran', jumlah_anggaran = $jumlahAnggaran WHERE id_anggaran = '$idAnggaran'";
$result = mysqli_query($conn, $query);

// jika berhasil mengedit data, redirect ke halaman anggaran
if ($result) {
    header("Location: /moka-native/dashboard/anggaran");
} else {
    echo "Gagal mengedit data";
}