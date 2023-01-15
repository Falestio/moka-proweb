<?php
include '../connectdb.php';
include '../randomid.php';

$idAkun = $_COOKIE['id_akun'];

$namaAnggaran = $_POST['nama_anggaran'];
$keteranganAnggaran = $_POST['keterangan'];
$jumlahAnggaran = $_POST['jumlah_anggaran'];

$icon = "https://www.flaticon.com/svg/static/icons/svg/149/149071.svg";
$idAnggaran = randomid(11);

// query untuk menambah anggaran ke database
$anggaranQuery = "INSERT INTO anggaran (id_anggaran, nama_anggaran, icon, keterangan, jumlah_anggaran, id_akun) VALUES ('$idAnggaran', '$namaAnggaran', '$icon', '$keteranganAnggaran', $jumlahAnggaran, '$idAkun')";
$anggaranResult = $conn->query($anggaranQuery);

if ($anggaranResult == TRUE){
    // echo "Anggaran berhasil ditambahkan";
    header("Location: ../../dashboard/anggaran");
} else {
    echo "Anggaran gagal ditambahkan";
}