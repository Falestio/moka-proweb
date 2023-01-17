<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
include '../../backend/protected.php';
include '../../backend/connectdb.php';
include '../../backend/getParams.php';

// dapatkan id item dari query
$params = getParams($_SERVER["REQUEST_URI"]);
$id_transaksi = $params["id"];
$id_akun = $_COOKIE["id_akun"];

$detilTransaksiQuery = "SELECT * FROM pemasukan WHERE id_akun = '$id_akun' UNION SELECT * FROM pengeluaran WHERE id_akun = '$id_akun'"; 
$detilTransaksiResult = mysqli_query($conn, $detilTransaksiQuery);
$transaksi = null;
foreach($detilTransaksiResult as $satuTransaksi){
    if($satuTransaksi["id"] == $id_transaksi){
        $transaksi = $satuTransaksi;
    }
}

$id_dompet = $transaksi["id_dompet"];
$namaDompetQuery = "SELECT nama FROM dompet WHERE id_dompet = '$id_dompet'";
$namaDompetResult = mysqli_query($conn ,$namaDompetQuery);
$namaDompet = mysqli_fetch_assoc($namaDompetResult);
?>

<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div class="main">
    <div id="isi">
        <nav class="main-nav">
            <div class="main-nav-wrapper">
                <div class="flex aic">
                    <a href="index.php" class="card__header--back btn-ghost-circle">
                        <svg width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m13.3 17.3l-4.6-4.6q-.15-.15-.212-.325q-.063-.175-.063-.375t.063-.375q.062-.175.212-.325l4.6-4.6q.275-.275.7-.275q.425 0 .7.275q.275.275.275.7q0 .425-.275.7L10.8 12l3.9 3.9q.275.275.275.7q0 .425-.275.7q-.275.275-.7.275q-.425 0-.7-.275Z" />
                        </svg>
                    </a>
                    <div class="main-nav-wrapper-a">
                        <b> Detail Transaksi </b>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="dropdown-trigger">
                        <svg width="32" height="32" viewBox="0 0 256 256">
                            <path fill="currentColor" d="M116 64a12 12 0 1 1 12 12a12 12 0 0 1-12-12Zm12 52a12 12 0 1 0 12 12a12 12 0 0 0-12-12Zm0 64a12 12 0 1 0 12 12a12 12 0 0 0-12-12Z" />
                        </svg>
                    </div>
                    <div class="dropdown-menu">
                        <a href="edit.php?id=<?= $transaksi["id"] ?>">Edit</a>
                        <?php if($transaksi["jumlah"] > 0): ?>
                            <a href="/moka-native/backend/transaksi/delete-pemasukan.php?id=<?= $transaksi["id"] ?>">Delete</a>
                        <?php endif; ?>
                        <?php if($transaksi["jumlah"] < 0): ?>
                            <a href="/moka-native/backend/transaksi/delete-pengeluaran.php?id=<?= $transaksi["id"] ?>">Delete</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
        <div id="detail">
            <div id="subjudul-detail">
                <div id="isi-detail">
                    <div id="isi-detail-1">
                        <b><?= $transaksi["judul"] ?></b>
                    </div>
                    <div id="isi-detail-2"><?= $namaDompet["nama"] ?></div>
                    <div id="isi-detail-3"><?= $transaksi["tanggal"] ?></div>
                    <br />
                    <hr>
                    <?php if($transaksi["jumlah"] < 0): ?>
                        <div id="isi-detail-4" class="text-red">Rp <?= $transaksi["jumlah"] ?></div>
                    <?php endif; ?>

                    <?php if($transaksi["jumlah"] > 0): ?>
                        <div id="isi-detail-4" class="text-blue">Rp <?= $transaksi["jumlah"] ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <br /><br />
</div>
<?php $html = ob_get_clean(); ?>

<!-- Tugasnya untuk menampung style spesifik ke halaman tersebut dan menampung fungsi drawer -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/global.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <title>Tujuan</title>
    <!-- Stylenya disini -->
    <style>
        .text-blue {
            color: var(--success);
        }

        .text-red {
            color: var(--error);
        }

        /* DROPDOWN */
        .dropdown {
            position: relative;
        }

        .dropdown-trigger {
            cursor: pointer;
            padding: .4em;
            border-radius: 50%;
        }

        .dropdown:hover {
            background-color: var(--super-light-grey);
        }

        .dropdown-menu {
            position: absolute;
            display: flex;
            flex-direction: column;
            border: 1px solid var(--light-grey);
            background-color: #fff;
            display: none;
        }

        .dropdown:hover .dropdown-menu {
            display: flex;
        }

        .dropdown-menu a {
            padding: 1em;
        }

        .dropdown-menu a:hover {
            background-color: var(--super-light-grey);
        }

        #isi {
            max-width: 800px;
            background-color: white;
            margin: 0 auto;
            border-radius: 20px;
            padding: 1em;
            border: 2px solid var(--light-grey);
        }

        .main {
            align-items: center;
        }

        .main-nav {
            width: 100%;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid rgb(223, 223, 223);
        }

        .main-nav-wrapper {
            padding-bottom: 1em;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-nav-wrapper-a {
            font-size: 20px;
        }

        .main-nav__account {
            display: flex;
            gap: 1em;
        }

        #detail {
            display: flex;
            padding: 2em;
            width: 100%;

        }

        #subjudul-detail {
            display: flex;
            width: 100%;

        }

        #isi-detail {
            width: 100%;
        }


        #isi-detail-1 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        #isi-detail-2 {
            font-size: 20px;
        }

        #isi-detail-3 {
            font-size: 15px;
            color: rgb(119, 119, 115);
        }

        #isi-detail-4 {
            font-size: 40px;
            margin-top: 30px;
        }

        #tolbul-detail {
            float: right;
            font-size: 18px;
            text-align: right;
        }

        @media screen and (max-width: 1080px) {
            #isi-detail-1 {
                font-size: 22px;
            }

            #isi-detail-2 {
                font-size: 17px;
            }

            #isi-detail-3 {
                font-size: 12px;
            }

            #isi-detail-4 {
                font-size: 30px;
                margin-top: 20px;
            }

            .main-nav-wrapper-a {
                font-size: 17px;
            }
        }

        @media screen and (max-width: 750px) {
            #isi-detail-1 {
                font-size: 18px;
            }

            #isi-detail-2 {
                font-size: 15px;
            }

            #isi-detail-3 {
                font-size: 12px;
            }

            #isi-detail-4 {
                font-size: 25px;
                margin-top: 20px;
            }

            .main-nav-wrapper-a {
                font-size: 15px;
            }
        }

        @media screen and (max-width: 480px) {
            #isi-detail-1 {
                font-size: 18px;
            }

            #isi-detail-2 {
                font-size: 15px;
            }

            #isi-detail-3 {
                font-size: 12px;
            }

            #isi-detail-4 {
                font-size: 25px;
                margin-top: 20px;
            }

            .main-nav-wrapper-a {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>