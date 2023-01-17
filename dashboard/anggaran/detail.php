<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../backend/connectdb.php';
include '../../components/Drawer.php';
include '../../backend/getParams.php';
include '../../backend/protected.php';


// Dapatkan id anggaran dari parameter URL
$url = $_SERVER['REQUEST_URI'];
$params = getParams($url);
$id_anggaran = $params["id"];

// lakukan query untuk mendapatkan data anggaran berdasarkan id anggaran
$query = "SELECT * FROM anggaran WHERE id_anggaran = '$id_anggaran'";
$result = mysqli_query($conn, $query);
$anggaran = mysqli_fetch_assoc($result);

// lakukan query untuk mendapatkan anggaran berdasarkan id anggaran
$queryAnggaran = "SELECT * FROM pengeluaran WHERE id_anggaran = '$id_anggaran'";
$resultAnggaran = mysqli_query($conn, $queryAnggaran);

// hitung total pengeluaran
$totalPengeluaran = 0;
while ($row = mysqli_fetch_assoc($resultAnggaran)) {
    $totalPengeluaran += $row["jumlah"];
}

?>

<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div class="wrapper">
    <div class="card">
        <div class="card__header">
            <div class="card__header--info">
                <a href="/moka-native/dashboard/anggaran" class="card__header--back btn-ghost-circle">
                    <svg width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m13.3 17.3l-4.6-4.6q-.15-.15-.212-.325q-.063-.175-.063-.375t.063-.375q.062-.175.212-.325l4.6-4.6q.275-.275.7-.275q.425 0 .7.275q.275.275.275.7q0 .425-.275.7L10.8 12l3.9 3.9q.275.275.275.7q0 .425-.275.7q-.275.275-.7.275q-.425 0-.7-.275Z" />
                    </svg>
                </a>
                <div class="card__header--title">
                    <h2><?= $anggaran["nama_anggaran"] ?></h2>
                </div>
            </div>
            <div class="dropdown">
                <div class="dropdown-trigger">
                    <svg width="32" height="32" viewBox="0 0 256 256">
                        <path fill="currentColor" d="M116 64a12 12 0 1 1 12 12a12 12 0 0 1-12-12Zm12 52a12 12 0 1 0 12 12a12 12 0 0 0-12-12Zm0 64a12 12 0 1 0 12 12a12 12 0 0 0-12-12Z" />
                    </svg>
                </div>
                <div class="dropdown-menu">
                    <a href="edit.php?id=<?= $id_anggaran ?>">Edit</a>
                    <a href="/moka-native/backend/anggaran/delete-anggaran.php?id=<?= $id_anggaran ?>">Delete</a>
                </div>
            </div>
        </div>
        <div class="card__body">
            <div class="summary">
                <span class="summary__balance">Sisa Rp <?= $anggaran["jumlah_anggaran"] + $totalPengeluaran ?></span>
                <div class="summary__target">
                    <p>Saldo Awal:</p>
                    <p>Rp <?= $anggaran["jumlah_anggaran"] ?></p>
                </div>
                <div class="summary__collected">
                    <p>Pengeluaran:</p>
                    <p>Rp <?= $totalPengeluaran ?></p>
                </div>
            </div>

            <div class="deposit">
                <div class="deposit__item">
                    <hr />
                    <div class="deposit__body">
                        <?php foreach ($resultAnggaran as $anggaran) : ?>
                            <a href="/moka-native/dashboard/transaksi/detail.php?id=<?= $anggaran['id'] ?>" class="deposit__body--content">
                                <div class="deposit__body--content--wrapper">
                                    <svg width="32" height="32" viewBox="0 0 24 24">
                                        <g fill="none">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 18h6" />
                                            <path fill="currentColor" fill-rule="evenodd" d="M5 5a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h7.083A6.036 6.036 0 0 1 12 18c0-1.148.322-2.22.881-3.131A3.001 3.001 0 0 1 9 12a3 3 0 1 1 5.869.881A5.972 5.972 0 0 1 18 12c1.537 0 2.939.578 4 1.528V8a3 3 0 0 0-3-3H5zm7 6a1 1 0 1 0 0 2a1 1 0 0 0 0-2z" clip-rule="evenodd" />
                                        </g>
                                    </svg>
                                    <div class="deposit__body--content--text">
                                        <p class="deposit__body--content--text--name"><?= $anggaran["judul"] ?></p>
                                        <span class="deposit__body--content--text--balance"><?= $anggaran["keterangan"] ?></span>
                                    </div>
                                </div>
                                <div class="deposit__body--content--balance">
                                    <span class="text-red">- Rp <?= $anggaran["jumlah"] ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
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
        .text-blue {
            color: #1E90FF;
        }

        .text-red {
            color: hotpink;
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

        .card__header--info {
            display: flex;
            align-items: center;
        }

        .wrapper {
            padding: 1em;
            display: flex;
            justify-content: center;
        }

        .card {
            width: 600px;
            border: 1px solid rgb(223, 223, 223);
            border-radius: 10px;
        }

        .card__header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1em;
            padding: 1em;
            background-color: var(--super-light-grey);
        }

        .card__header--title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .summary {
            padding: 1em;
        }

        .summary__balance {
            font-size: 34px;
            color: hotpink;
        }

        .summary__target,
        .summary__collected {
            display: flex;
            justify-content: space-between;
        }

        .summary__target p,
        .summary__collected p {
            font-size: 18px;
            font-weight: 500;
        }

        .deposit__header {
            display: flex;
            padding: 1em;
            justify-content: space-between;
        }

        .deposit__header--date .date {
            font-size: 24px;
            font-weight: 600;
            margin-right: 5px;
        }

        .deposit__body {
            padding: 1em;
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        .deposit__body--content--wrapper {
            display: flex;
            gap: 1em;
        }

        .deposit__body--content {
            display: flex;
            justify-content: space-between;
        }

        .deposit__body--content--text {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .deposit__body--content--text p {
            font-size: 18px;
            font-weight: 500;
        }

        .deposit__body--content--text span {
            font-size: 16px;
            font-weight: 600;
        }

        .balance {
            color: var(--error);
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>