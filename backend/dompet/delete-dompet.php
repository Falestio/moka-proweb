<?php
include "../connectdb.php";
include "../getParams.php";

$url = $_SERVER['REQUEST_URI'];
$params = getParams($url);
$id_dompet = $params["id"];

$query = "DELETE FROM dompet WHERE id_dompet = '$id_dompet'";
$result = mysqli_query($conn, $query);

// jika berhasil menghapus data, redirect ke halaman dompet
if ($result) {
    header("Location: /moka-native/dashboard/dompet");
} else {
    echo "Gagal menghapus data";
}

?>