<?php
include '../../components/Drawer.php';
include '../../backend/protected.php';
include '../../backend/connectdb.php';

$id_akun = $_COOKIE['id_akun'];
// Select all pemasukan dan pengeluaran yang memiliki id akun yang sama
$transaksiQuery = "SELECT * FROM pemasukan WHERE id_akun = '$id_akun' UNION SELECT * FROM pengeluaran WHERE id_akun = '$id_akun' ORDER BY tanggal DESC";
$transaksiResult = mysqli_query($conn, $transaksiQuery);

// sum of all jumlah pengeluaran and pemasukan
$sum = 0;
$sumPemasukan = 0;
$sumPengeluaran = 0;

foreach($transaksiResult as $transaksi){
    $sum = $sum + $transaksi["jumlah"];

    if($transaksi["jumlah"] > 0){
        $sumPemasukan = $sumPemasukan + $transaksi["jumlah"];
    }

    if($transaksi["jumlah"] < 0){
        $sumPengeluaran = $sumPengeluaran + ($transaksi["jumlah"] * -1);
    }
}


?>

<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div>
    <div id="Pendapatan">
        <div id="subjudul">
            <div id="subjudul-a">Daftar Transaksi</div>
        </div>
    </div>
    <div class="div-trans">
        <div class="trans1">
            <div class="isi-trans">
                <div class="isi-trans1">Selisih</div>
                <div class="isi-trans2-1">Rp. <?= $sum ?></div>
                <br />
            </div>
        </div>
        <div class="trans2">
            <div class="isi-trans">
                <div class="isi-trans1">Total Pemasukan</div>
                <div class="isi-trans2-2">Rp. <?= $sumPemasukan ?></div>
                <br />
            </div>
        </div>
        <div class="trans3">
            <div class="isi-trans">
                <div class="isi-trans1">Total Pengeluaran</div>
                <div class="isi-trans2-3">Rp. <?= $sumPengeluaran ?></div>
                <br />
            </div>
        </div>
    </div>
    <?php foreach($transaksiResult as $transaksi): ?>
    <a href="detail.php?id=<?= $transaksi["id"] ?>" id="detail">
        <div id="subjudul-detail">
            <svg class="detail-icon" width="20" height="20" viewBox="0 0     24 24">
                <path fill="#888888" d="M1 15q0-1.5.65-2.625t1.7-1.875q1.05-.75 2.4-1.125Q7.1 9 8.5 9t2.75.375q1.35.375 2.4 1.125q1.05.75 1.7 1.875Q16 13.5 16 15Zm17 8v-8q0-2.875-1.762-4.887Q14.475 8.1 11.275 7.3L11 5h5V1h2v4h5l-1.65 16.55q-.075.6-.538 1.025Q20.35 23 19.7 23ZM1 19v-2h15v2Zm1 4q-.425 0-.712-.288Q1 22.425 1 22v-1h15v1q0 .425-.287.712Q15.425 23 15 23Z" />
            </svg>
            <div id="isi-detail"><b><?= $transaksi["judul"] ?></b><br /><?= $transaksi["keterangan"] ?></div>
        </div>
        <div>
            <div id="isi-detail"><?= $transaksi["tanggal"] ?></div>
            <div id="tolbul-detail"><?= $transaksi["jumlah"] ?></div>
        </div>
    </a>
    <?php endforeach; ?>

    <hr />
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
    <title>Daftar Transaksi</title>
    <!-- Stylenya disini -->
    <style>
        #Pendapatan {
            padding: 20px 0 0 0;
            clear: both;
            margin-right: 100px;
            margin-left: 50px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        #subjudul {
            /* font-size: 35px; */
            display: flex;
            align-items: center;
        }

        #subjudul-a {
            font-size: 40px;
            margin-right: 20px;
        }

        #isi {
            font-size: 20px;
        }

        #tolbul {
            font-size: 22px;
            text-align: right;
        }

        #detail {
            padding: 20px 0 0 0;
            clear: both;
            margin-right: 100px;
            margin-left: 50px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        #subjudul-detail {
            margin-right: 10px;
            display: flex;
            margin-left: 30px;
        }

        #isi-detail {
            font-size: 16px;
            margin-left: 10px;
        }

        #tolbul-detail {
            font-size: 24px;
            text-align: right;
            font-weight: bold;
        }

        .detail-icon {
            width: 40px;
            height: 40px;
            padding: 5px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #c4e3f3;
            margin-right: 10px;
        }

        .detail-icon:hover {
            color: rgb(255, 255, 255);
            opacity: 0.5;
            border: 3px solid rgb(186, 176, 176);
        }

        .top-content ul {
            display: flex;
            flex-wrap: wrap;
            padding: 0.5em;
        }

        .top-content ul li {
            float: left;
        }

        .div-trans {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 40px;
            margin-top: 20px;
        }

        .trans1,
        .trans2,
        .trans3 {
            width: 350px;
            padding: 1em;
            flex: 1 1 0;
            background-color: white;
            height: 150px;
            border-radius: 20px;
            display: flex;
            border: 2px solid var(--color-primary);
        }

        .trans-isi {
            display: flex;
            font-size: 22px;
        }

        .isi-trans1 {
            font-size: 20px;
        }

        .isi-trans2-1 {
            font-size: 30px;
            color: rgb(24, 28, 152);
        }

        .isi-trans3-1 {
            font-size: 15px;
            color: rgb(119, 119, 115);
        }

        .isi-trans2-2 {
            font-size: 30px;
            color: var(--success-content);
        }

        .isi-trans3-2 {
            font-size: 15px;
            color: rgb(119, 119, 115);
        }

        .isi-trans2-3 {
            font-size: 30px;
            color: var(--error-content);
        }

        .isi-trans3-3 {
            font-size: 15px;
            color: rgb(119, 119, 115);
        }

        .trans-isi p {
            margin-left: 300px;
        }

        .terakhir {
            background-color: rgb(229, 231, 231);
            height: 40px;
            font-size: 20px;
            padding-left: 20px;
            padding-top: 10px;
            color: rgba(88, 77, 77, 0.986);
        }

        @media screen and (max-width: 1080px) {
            .isi-trans1 {
                font-size: 17px;
            }

            .isi-trans2-1 {
                font-size: 25px;
            }

            .isi-trans2-2 {
                font-size: 25px;
            }

            .isi-trans2-3 {
                font-size: 25px;
            }

            #subjudul-a {
                font-size: 30px;
            }

            #isi {
                font-size: 17px;
            }

            #tolbul {
                font-size: 20px;
            }
        }

        @media screen and (max-width: 750px) {

            .isi-trans1 {
                font-size: 18px;
            }

            .isi-trans2-1 {
                font-size: 25px;
            }

            .isi-trans2 {
                font-size: 25px;
            }

            .isi-trans3 {
                font-size: 15px;
            }

            .isi-trans3-1 {
                font-size: 15px;
            }

            .terakhir {
                font-size: 15px;
            }

            #subjudul-a {
                font-size: 25px;

            }

            #isi {
                font-size: 20px;
            }

            #tolbul {
                font-size: 20px;
                margin-right: -60px;

            }

            #isi-detail {
                font-size: 15px;

            }

            #tolbul-detail {
                font-size: 15px;
                margin-right: -60px;
            }

        }

        @media screen and (max-width: 480px) {

            .btn-ghost {
                font-size: 10px;
            }

            .isi-trans1 {
                font-size: 12px;
            }

            .isi-trans2-1 {
                font-size: 18px;
            }

            .isi-trans2 {
                font-size: 18px;
            }

            .isi-trans3 {
                font-size: 12px;
            }

            .isi-trans3-1 {
                font-size: 12px;
            }

            .terakhir {
                font-size: 15px;
            }

            #subjudul-a {
                font-size: 25px;

            }

            #isi {
                font-size: 15px;
            }

            #tolbul {
                font-size: 15px;
                margin-right: -60px;

            }

            #isi-detail {
                font-size: 12px;

            }

            #tolbul-detail {
                font-size: 12px;
                margin-right: -60px;
            }
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>