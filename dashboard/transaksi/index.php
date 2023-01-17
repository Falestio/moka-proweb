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

foreach ($transaksiResult as $transaksi) {
    $sum = $sum + $transaksi["jumlah"];

    if ($transaksi["jumlah"] > 0) {
        $sumPemasukan = $sumPemasukan + $transaksi["jumlah"];
    }

    if ($transaksi["jumlah"] < 0) {
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
    <?php foreach ($transaksiResult as $transaksi) : ?>
        <a href="detail.php?id=<?= $transaksi["id"] ?>" id="detail">
            <div id="subjudul-detail">
                <?php if ($transaksi["jumlah"] > 0) : ?>
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <g fill="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 15v3m0 3v-3m0 0h-3m3 0h3" />
                            <path fill="currentColor" fill-rule="evenodd" d="M5 5a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h7.083A6.036 6.036 0 0 1 12 18c0-1.148.322-2.22.881-3.131A3.001 3.001 0 0 1 9 12a3 3 0 1 1 5.869.881A5.972 5.972 0 0 1 18 12c1.537 0 2.939.578 4 1.528V8a3 3 0 0 0-3-3H5zm7 6a1 1 0 1 0 0 2a1 1 0 0 0 0-2z" clip-rule="evenodd" />
                        </g>
                    </svg>
                <?php else : ?>
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <g fill="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 18h6" />
                            <path fill="currentColor" fill-rule="evenodd" d="M5 5a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h7.083A6.036 6.036 0 0 1 12 18c0-1.148.322-2.22.881-3.131A3.001 3.001 0 0 1 9 12a3 3 0 1 1 5.869.881A5.972 5.972 0 0 1 18 12c1.537 0 2.939.578 4 1.528V8a3 3 0 0 0-3-3H5zm7 6a1 1 0 1 0 0 2a1 1 0 0 0 0-2z" clip-rule="evenodd" />
                        </g>
                    </svg>
                <?php endif; ?>
                <div id="isi-detail"><b><?= $transaksi["judul"] ?></b><br /><?= $transaksi["keterangan"] ?></div>
            </div>
            <div>
                <div id="isi-detail"><?= $transaksi["tanggal"] ?></div>
                <?php if ($transaksi["jumlah"] > 0) : ?>
                    <div id="tolbul-detail" class="text-blue"><?= $transaksi["jumlah"] ?></div>
                <?php else : ?>
                    <div id="tolbul-detail" class="text-red"><?= $transaksi["jumlah"] ?></div>
                <?php endif; ?>

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
        .text-blue {
            color: #1E90FF;
        }

        .text-red {
            color: hotpink;
        }

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