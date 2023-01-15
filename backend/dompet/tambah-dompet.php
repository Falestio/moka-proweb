<?php
include "../connectdb.php";
include "../randomid.php";

$id_akun = $_COOKIE['id_akun'];
$nama_dompet = $_POST['nama_dompet'];
$keterangan = $_POST['keterangan'];
$saldo_awal = $_POST['saldo_awal'];
$icon = "https://www.flaticon.com/svg/static/icons/svg/149/149071.svg";
$id_dompet = randomid(11);

// query untuk menambah dompet ke database
$dompetQuery = "INSERT INTO dompet (id_dompet, nama, icon, keterangan, saldo, id_akun) VALUES ('$id_dompet', '$nama_dompet', '$icon', '$keterangan', $saldo_awal, '$id_akun')";
$dompetResult = $conn->query($dompetQuery);

if ($dompetQuery == TRUE){
    // echo "Dompet berhasil ditambahkan";
    header("Location: ../../dashboard/dompet");
} else {
    echo "Dompet gagal ditambahkan";
}