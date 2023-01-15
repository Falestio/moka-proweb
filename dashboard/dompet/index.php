<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
include '../../backend/connectdb.php';
include '../../backend/protected.php';


$id_akun = $_COOKIE['id_akun'];
// query daftasr tujuan
$daftarDompetQuery = "SELECT * FROM dompet WHERE id_akun = '$id_akun'";
$daftarDompetResult = mysqli_query($conn, $daftarDompetQuery);

?>


<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div class="wrapper">
    <div class="card">
        <div class="card__header">
            <div class="card__header--title">
                <svg class="menu__item--icon" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M21 18v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1h-9a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2m0-2h10V8H12m4 5.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5Z" />
                </svg>
                <h2>Dompet Anda</h2>
            </div>
            <a href="tambah.php" class="card__header--button btn">Tambah</a>
        </div>
        <div class="card__body">
            <div class="card__body--contents-wrapper">
                <?php foreach ($daftarDompetResult as $dompet): ?>
                    <a href="detail.php?id=<?= $dompet['id_dompet'] ?>" class="card__body--content">
                        <svg class="card__body--content--icon" width="32" height="32" viewBox="0 0 256 256">
                            <path fill="currentColor" d="M208 52h-25.6L170 33.3a12.1 12.1 0 0 0-10-5.3H96a12.1 12.1 0 0 0-10 5.3L73.6 52H48a28.1 28.1 0 0 0-28 28v112a28.1 28.1 0 0 0 28 28h160a28.1 28.1 0 0 0 28-28V80a28.1 28.1 0 0 0-28-28Zm4 140a4 4 0 0 1-4 4H48a4 4 0 0 1-4-4V80a4 4 0 0 1 4-4h32a12.1 12.1 0 0 0 10-5.3L102.4 52h51.2L166 70.7a12.1 12.1 0 0 0 10 5.3h32a4 4 0 0 1 4 4ZM128 84a48 48 0 1 0 48 48a48 48 0 0 0-48-48Zm0 72a24 24 0 1 1 24-24a24.1 24.1 0 0 1-24 24Z" />
                        </svg>
                        <div class="card__body--content--text">
                            <p class="card__body--content--text--name"><?= $dompet['nama'] ?></p>
                            <span class="card__body--content--text--balance">Rp. <?= $dompet['saldo'] ?></span>
                        </div>
                    </a>
                <?php endforeach ?>
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

        .card__body--contents-wrapper {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        .card__body--content {
            display: flex;
            gap: 1em;
        }

        .card__body--content--text {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .card__body--content--text p {
            font-size: 18px;
            font-weight: 500;
        }

        .card__body--content--text span {
            font-size: 16px;
            font-weight: 800;
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>