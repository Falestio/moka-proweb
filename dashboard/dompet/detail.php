<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
include '../../backend/connectdb.php';
include '../../backend/getParams.php';

$url = $_SERVER['REQUEST_URI'];
$params = getParams($url);
$id_dompet = $params["id"];

$query = "SELECT * FROM dompet WHERE id_dompet = '$id_dompet'";
$result = mysqli_query($conn, $query);
$dompet = mysqli_fetch_assoc($result);

?>


<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div class="wrapper">
    <div class="card">
        <div class="card__header">
            <div class="card__header--info">
                <a href="index.php" class="card__header--back btn-ghost-circle">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m13.3 17.3l-4.6-4.6q-.15-.15-.212-.325q-.063-.175-.063-.375t.063-.375q.062-.175.212-.325l4.6-4.6q.275-.275.7-.275q.425 0 .7.275q.275.275.275.7q0 .425-.275.7L10.8 12l3.9 3.9q.275.275.275.7q0 .425-.275.7q-.275.275-.7.275q-.425 0-.7-.275Z" />
                    </svg>
                </a>
                <div class="card__header--title">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M21 18v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1h-9a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2m0-2h10V8H12m4 5.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5Z" />
                    </svg>
                    <h2><?= $dompet['nama'] ?></h2>
                </div>
            </div>
            <div class="dropdown">
                <div class="dropdown-trigger">
                    <svg width="32" height="32" viewBox="0 0 256 256">
                        <path fill="currentColor" d="M116 64a12 12 0 1 1 12 12a12 12 0 0 1-12-12Zm12 52a12 12 0 1 0 12 12a12 12 0 0 0-12-12Zm0 64a12 12 0 1 0 12 12a12 12 0 0 0-12-12Z" />
                    </svg>
                </div>
                <div class="dropdown-menu">
                    <a href="tambah.php">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </div>
        </div>
        <div class="card__body">
            <div class="saldo">
                <h2>Saldo:</h2>
                <span>Rp. <?= $dompet['saldo'] ?></span>
            </div>
            <div class="chart">
                <div class="pemasukan">
                    <figure class="pie-chart">
                        <div class="text">
                            <h2>Pemasukan</h2>
                            <span>Rp 5.000.000</span>
                        </div>
                        <figcaption>
                            Startup 38<span style="color: #4e79a7"></span><br />
                            Investasi Saham 23<span style="color: #f28e2c"></span><br />
                            Bisnis cafe 16<span style="color: #e15759"></span><br />
                            Kost 10<span style="color: #76b7b2"></span><br />
                            Bisnis Laundry 6<span style="color: #59a14f"></span><br />
                            Dari langit 7<span style="color: #edc949"></span><br />
                            Dikasih 10<span style="color: #af7aa1"></span><br />
                            Hibah 14<span style="color: #ff9da7"></span><br />
                            Ketemu dijalan 16<span style="color: #9c755f"></span>
                        </figcaption>
                    </figure>
                </div>
                <div class="pengeluaran">
                    <figure class="pie-chart">
                        <div class="text">
                            <h2>Pemasukan</h2>
                            <span>Rp 5.000.000</span>
                        </div>
                        <figcaption>
                            Startup 38<span style="color: #4e79a7"></span><br />
                            Investasi Saham 23<span style="color: #f28e2c"></span><br />
                            Bisnis cafe 16<span style="color: #e15759"></span><br />
                            Kost 10<span style="color: #76b7b2"></span><br />
                            Bisnis Laundry 6<span style="color: #59a14f"></span><br />
                            Dari langit 7<span style="color: #edc949"></span><br />
                            Dikasih 10<span style="color: #af7aa1"></span><br />
                            Hibah 14<span style="color: #ff9da7"></span><br />
                            Ketemu dijalan 16<span style="color: #9c755f"></span>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class="history">
                <h3 class="history__title">Daftar Transaksi</h3>
                <div id="Pendapatan">
                    <div id="subjudul">
                        <div id="subjudul-a">23</div>
                        <div id="isi">November 2022</div>
                    </div>
                    <div id="tolbul">Rp. 440.000,00</div>
                </div>
                <a href="/moka-native/dashboard/transaksi/detail.php" id="detail">
                    <div id="subjudul-detail">
                        <svg class="detail-icon" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="#888888" d="M1 15q0-1.5.65-2.625t1.7-1.875q1.05-.75 2.4-1.125Q7.1 9 8.5 9t2.75.375q1.35.375 2.4 1.125q1.05.75 1.7 1.875Q16 13.5 16 15Zm17 8v-8q0-2.875-1.762-4.887Q14.475 8.1 11.275 7.3L11 5h5V1h2v4h5l-1.65 16.55q-.075.6-.538 1.025Q20.35 23 19.7 23ZM1 19v-2h15v2Zm1 4q-.425 0-.712-.288Q1 22.425 1 22v-1h15v1q0 .425-.287.712Q15.425 23 15 23Z" />
                        </svg>
                        <div id="isi-detail"><b>Kuliner</b><br />Makanan Harian</div>
                    </div>
                    <div id="tolbul-detail">-Rp.60.000,00</div>
                </a>
                <a href="/moka-native/dashboard/transaksi/detail.php" id="detail">
                    <div id="subjudul-detail">
                        <svg class="detail-icon" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="#888888" d="M1 15q0-1.5.65-2.625t1.7-1.875q1.05-.75 2.4-1.125Q7.1 9 8.5 9t2.75.375q1.35.375 2.4 1.125q1.05.75 1.7 1.875Q16 13.5 16 15Zm17 8v-8q0-2.875-1.762-4.887Q14.475 8.1 11.275 7.3L11 5h5V1h2v4h5l-1.65 16.55q-.075.6-.538 1.025Q20.35 23 19.7 23ZM1 19v-2h15v2Zm1 4q-.425 0-.712-.288Q1 22.425 1 22v-1h15v1q0 .425-.287.712Q15.425 23 15 23Z" />
                        </svg>
                        <div id="isi-detail"><b>Kuliner</b><br />Makan Siang</div>
                    </div>
                    <div id="tolbul-detail">-Rp. 140.000,00</div>
                </a>
                <a href="/moka-native/dashboard/transaksi/detail.php" id="detail">
                    <div id="subjudul-detail">
                        <svg class="detail-icon" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="#888888" d="M1 15q0-1.5.65-2.625t1.7-1.875q1.05-.75 2.4-1.125Q7.1 9 8.5 9t2.75.375q1.35.375 2.4 1.125q1.05.75 1.7 1.875Q16 13.5 16 15Zm17 8v-8q0-2.875-1.762-4.887Q14.475 8.1 11.275 7.3L11 5h5V1h2v4h5l-1.65 16.55q-.075.6-.538 1.025Q20.35 23 19.7 23ZM1 19v-2h15v2Zm1 4q-.425 0-.712-.288Q1 22.425 1 22v-1h15v1q0 .425-.287.712Q15.425 23 15 23Z" />
                        </svg>
                        <div id="isi-detail"><b>Kuliner</b><br />Makan Malam</div>
                    </div>
                    <div id="tolbul-detail">-Rp. 240.000,00</div>
                </a>
                <hr />
            </div>
        </div>
    </div>
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

        .card__header--info {
            display: flex;
            align-items: center;
        }

        #Pendapatan {
            clear: both;
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
            font-size: 18px;
            text-align: right;
        }

        .wrapper {
            padding: 1em;
            display: flex;
            justify-content: center;
        }

        .card {
            width: 800px;
            border: 1px solid rgb(223, 223, 223);
            border-radius: 10px;
        }

        .card__header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1em;
            background-color: var(--super-light-grey);
        }

        .card__header--title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card__body {
            padding: 1em;
        }

        .chart {
            width: 100%;
            display: grid;
            gap: 15px;
            grid-template-columns: repeat(2, 1fr);
        }

        /* PIE CHART */
        .pie-chart {
            background: radial-gradient(circle closest-side, transparent 66%, white 0), conic-gradient(from 277deg, #4e79a7 0, #4e79a7 27.1%, #f28e2c 0, #f28e2c 43.5%, #e15759 0, #e15759 54.9%, #76b7b2 0, #76b7b2 62%, #59a14f 0, #59a14f 66.3%, #edc949 0, #edc949 71.3%, #af7aa1 0, #af7aa1 78.4%, #ff9da7 0, #ff9da7 88.4%, #9c755f 0, #9c755f 99.8%);
            position: relative;
            min-height: 500px;
            margin: 0;
            outline: 1px solid #ccc;
            z-index: -10;
        }

        .pemasukan .text,
        .pengeluaran .text {
            font-size: var(--text-sm);
            position: absolute;
            margin: 1rem;
        }

        .pemasukan .text span {
            color: var(--success-content);
        }

        .pengeluaran .text span {
            color: var(--error);
        }

        .pie-chart cite {
            position: absolute;
            bottom: 0;
            font-size: 80%;
            padding: 1rem;
            color: gray;
        }

        .pie-chart figcaption {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: smaller;
            text-align: right;
        }

        .pie-chart span:after {
            display: inline-block;
            content: "";
            width: 0.8em;
            height: 0.8em;
            margin-left: 0.4em;
            height: 0.8em;
            border-radius: 0.2em;
            background: currentColor;
        }

        .history {
            margin-top: 1em;
        }

        .history__title {
            font-size: var(--text-md);
            margin-bottom: 1em;
        }

        .saldo {
            margin-bottom: 1em;
            display: flex;
            gap: 1em;
            align-items: center;
        }

        .saldo h2 {
            font-size: var(--text-lg);
        }

        .saldo span {
            font-size: var(--text-lg);
            color: var(--info);
        }

        @media (max-width: 770px) {
            .chart {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>