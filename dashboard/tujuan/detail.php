<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
include '../../backend/getParams.php';
include '../../backend/connectdb.php';

$url = $_SERVER['REQUEST_URI'];
$params = getParams($url);
$id_tujuan = $params["id"];

// lakukan query untuk mendapatkan data tujuan berdasarkan id tujuan
$query = "SELECT * FROM tujuan WHERE id_tujuan = '$id_tujuan'";
$result = mysqli_query($conn, $query);
$tujuan = mysqli_fetch_assoc($result);

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
                    <svg width="32" height="32" viewBox="0 0 256 256">
                        <path fill="currentColor" d="M221.9 83.2a104 104 0 0 1-20.4 118.3a103.8 103.8 0 0 1-147 0a103.8 103.8 0 0 1 0-147A104 104 0 0 1 195.7 49l22.6-22.7a8.1 8.1 0 0 1 11.4 11.4l-62.1 62l-33.9 34a8.2 8.2 0 0 1-11.4 0a8.1 8.1 0 0 1 0-11.4l27.8-27.7a40.2 40.2 0 1 0 17.8 31.1a8 8 0 0 1 7.6-8.4a7.9 7.9 0 0 1 8.4 7.5a56 56 0 1 1-22.4-41.6l22.8-22.8a87.9 87.9 0 1 0 23.1 29.7a8 8 0 0 1 14.5-6.9Z" />
                    </svg>
                    <h2><?= $tujuan["nama_tujuan"] ?></h2>
                </div>
            </div>
            <div class="dropdown">
                <div class="dropdown-trigger">
                    <svg width="32" height="32" viewBox="0 0 256 256">
                        <path fill="currentColor" d="M116 64a12 12 0 1 1 12 12a12 12 0 0 1-12-12Zm12 52a12 12 0 1 0 12 12a12 12 0 0 0-12-12Zm0 64a12 12 0 1 0 12 12a12 12 0 0 0-12-12Z" />
                    </svg>
                </div>
                <div class="dropdown-menu">
                    <a href="edit.php?id=<?= $tujuan["id_tujuan"] ?>">Edit</a>
                    <a href="/moka-native/backend/tujuan/delete-tujuan.php?id=<?= $tujuan["id_tujuan"] ?>">Delete</a>
                </div>
            </div>
        </div>
        <div class="card__body">
            <div class="summary">
                <span class="summary__balance">Rp 3.500.000</span>
                <div class="summary__target">
                    <p>Saldo Awal:</p>
                    <p>Rp <?= $tujuan["jumlah_tujuan"] ?> </p>
                </div>
                <div class="summary__collected">
                    <p>Pengeluaran:</p>
                    <p>Rp 8.000.000</p>
                </div>
            </div>

            <div class="deposit">
                <div class="deposit__item">
                    <div class="deposit__header">
                        <div class="deposit__header--date">
                            <span class="date">23</span>
                            <span class="month">November 2022</span>
                        </div>
                        <div class="deposit__header--balance">
                            <span class="balance">Rp 8.000.000</span>
                        </div>
                    </div>
                    <hr />
                    <div class="deposit__body">
                        <div class="deposit__body--content">
                            <div class="deposit__body--content--wrapper">
                                <svg class="deposit__body--content--icon" width="32" height="32" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M208 52h-25.6L170 33.3a12.1 12.1 0 0 0-10-5.3H96a12.1 12.1 0 0 0-10 5.3L73.6 52H48a28.1 28.1 0 0 0-28 28v112a28.1 28.1 0 0 0 28 28h160a28.1 28.1 0 0 0 28-28V80a28.1 28.1 0 0 0-28-28Zm4 140a4 4 0 0 1-4 4H48a4 4 0 0 1-4-4V80a4 4 0 0 1 4-4h32a12.1 12.1 0 0 0 10-5.3L102.4 52h51.2L166 70.7a12.1 12.1 0 0 0 10 5.3h32a4 4 0 0 1 4 4ZM128 84a48 48 0 1 0 48 48a48 48 0 0 0-48-48Zm0 72a24 24 0 1 1 24-24a24.1 24.1 0 0 1-24 24Z" />
                                </svg>
                                <div class="deposit__body--content--text">
                                    <p class="deposit__body--content--text--name">Bali</p>
                                    <span class="deposit__body--content--text--balance">Pergi ke bali</span>
                                </div>
                            </div>
                            <div class="deposit__body--content--balance">
                                <span>- Rp 8.000.000</span>
                            </div>
                        </div>
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
            padding: 1em;
            background-color: var(--super-light-grey);
        }

        .card__header--info {
            display: flex;
            align-items: center;
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
            color: green;
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
            margin-right: 10px;
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