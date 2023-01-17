<!-- Disini dilakukan logic yang berkaitan dengan data dan untuk menampung data tersebut pada variabel -->
<?php
include '../backend/protected.php';
include '../components/Drawer.php';
include '../backend/connectdb.php';

$id_akun = $_COOKIE['id_akun'];
// tampilkan data anggaran
$anggaranQuery = "SELECT * FROM anggaran WHERE id_akun = '$id_akun'";
$anggaranResult = mysqli_query($conn, $anggaranQuery);

// tampilkan data tujuan
$tujuanQuery = "SELECT * FROM tujuan WHERE id_akun = '$id_akun'";
$tujuanResult = mysqli_query($conn, $tujuanQuery);

// tampilkan data transaksi
$transaksiQuery = "SELECT * FROM pemasukan WHERE id_akun = '$id_akun' UNION SELECT * FROM pengeluaran WHERE id_akun = '$id_akun' ORDER BY tanggal DESC";
$transaksiResult = mysqli_query($conn, $transaksiQuery);

// tampilkan data dompet
$dompetQuery = "SELECT * FROM dompet WHERE id_akun = '$id_akun'";
$dompetResult = mysqli_query($conn, $dompetQuery);


?>

<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div class="wrapper">
    <div class="card">
        <div class="card__header">
            <div class="card__header--title">
                <svg width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19.435 4.065H4.565a2.5 2.5 0 0 0-2.5 2.5v10.87a2.5 2.5 0 0 0 2.5 2.5h14.87a2.5 2.5 0 0 0 2.5-2.5V6.565a2.5 2.5 0 0 0-2.5-2.5Zm1.5 9.93h-6.42a2 2 0 0 1 0-4h6.42Zm-6.42-5a3 3 0 0 0 0 6h6.42v2.44a1.5 1.5 0 0 1-1.5 1.5H4.565a1.5 1.5 0 0 1-1.5-1.5V6.565a1.5 1.5 0 0 1 1.5-1.5h14.87a1.5 1.5 0 0 1 1.5 1.5v2.43Z" />
                    <circle cx="14.519" cy="11.996" r="1" fill="currentColor" />
                </svg>
                <h2>Anggaran</h2>
            </div>
            <a href="anggaran/tambah.php" class="card__header--button btn">Tambah</a>
        </div>
        <div class="card__body">
            <div class="card__body--contents-wrapper">

                <?php foreach ($anggaranResult as $anggaran) : ?>
                    <a href="/moka-native/dashboard/anggaran/detail.php?id=<?= $anggaran["id_anggaran"] ?>" class="card__body--content">
                        <svg width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19.435 4.065H4.565a2.5 2.5 0 0 0-2.5 2.5v10.87a2.5 2.5 0 0 0 2.5 2.5h14.87a2.5 2.5 0 0 0 2.5-2.5V6.565a2.5 2.5 0 0 0-2.5-2.5Zm1.5 9.93h-6.42a2 2 0 0 1 0-4h6.42Zm-6.42-5a3 3 0 0 0 0 6h6.42v2.44a1.5 1.5 0 0 1-1.5 1.5H4.565a1.5 1.5 0 0 1-1.5-1.5V6.565a1.5 1.5 0 0 1 1.5-1.5h14.87a1.5 1.5 0 0 1 1.5 1.5v2.43Z" />
                            <circle cx="14.519" cy="11.996" r="1" fill="currentColor" />
                        </svg>
                        <div class="card__body--content--text">
                            <p class="card__body--content--text--name"><?= $anggaran["nama_anggaran"] ?></p>
                            <span class="card__body--content--text--balance">Batas Rp <?= $anggaran["jumlah_anggaran"] ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card__header">
            <div class="card__header--title">
                <svg width="32" height="32" viewBox="0 0 24 24">
                    <g fill="none">
                        <path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                        <path fill="currentColor" d="M12 2c.375 0 .745.02 1.11.061a1 1 0 0 1-.22 1.988a8 8 0 1 0 7.061 7.061a1 1 0 1 1 1.988-.22c.04.365.061.735.061 1.11c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2Zm-.032 5.877a1 1 0 0 1-.719 1.217A3.002 3.002 0 0 0 12 15a3.002 3.002 0 0 0 2.905-2.25a1 1 0 0 1 1.937.5A5.002 5.002 0 0 1 7 12a5.002 5.002 0 0 1 3.75-4.842a1 1 0 0 1 1.218.719Zm6.536-5.75a1 1 0 0 1 .617.923v1.83h1.829a1 1 0 0 1 .707 1.707L18.12 10.12a1 1 0 0 1-.707.293H15l-1.828 1.829a1 1 0 0 1-1.415-1.415L13.586 9V6.586a1 1 0 0 1 .293-.707l3.535-3.536a1 1 0 0 1 1.09-.217Zm-1.383 3.337L15.586 7v1.414H17l1.536-1.535h-.415a1 1 0 0 1-1-1v-.415Z" />
                    </g>
                </svg>
                <h2>Tujuan</h2>
            </div>
            <a href="tujuan/tambah.php" class="card__header--button btn">Tambah</a>
        </div>
        <div class="card__body">
            <div class="card__body--contents-wrapper">

                <?php foreach ($tujuanResult as $tujuan) : ?>
                    <a href="/moka-native/dashboard/tujuan/detail.php?id=<?= $tujuan["id_tujuan"] ?>" class="card__body--content">
                        <svg width="32" height="32" viewBox="0 0 24 24">
                            <g fill="none">
                                <path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                                <path fill="currentColor" d="M12 2c.375 0 .745.02 1.11.061a1 1 0 0 1-.22 1.988a8 8 0 1 0 7.061 7.061a1 1 0 1 1 1.988-.22c.04.365.061.735.061 1.11c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2Zm-.032 5.877a1 1 0 0 1-.719 1.217A3.002 3.002 0 0 0 12 15a3.002 3.002 0 0 0 2.905-2.25a1 1 0 0 1 1.937.5A5.002 5.002 0 0 1 7 12a5.002 5.002 0 0 1 3.75-4.842a1 1 0 0 1 1.218.719Zm6.536-5.75a1 1 0 0 1 .617.923v1.83h1.829a1 1 0 0 1 .707 1.707L18.12 10.12a1 1 0 0 1-.707.293H15l-1.828 1.829a1 1 0 0 1-1.415-1.415L13.586 9V6.586a1 1 0 0 1 .293-.707l3.535-3.536a1 1 0 0 1 1.09-.217Zm-1.383 3.337L15.586 7v1.414H17l1.536-1.535h-.415a1 1 0 0 1-1-1v-.415Z" />
                            </g>
                        </svg>
                        <div class="card__body--content--text">
                            <p class="card__body--content--text--name"><?= $tujuan["nama_tujuan"] ?></p>
                            <span class="card__body--content--text--balance">Target Rp <?= $tujuan["jumlah_tujuan"] ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card__header">
            <div class="card__header--title">
                <svg width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19.437 18.218H4.563a2.5 2.5 0 0 1-2.5-2.5V8.282a2.5 2.5 0 0 1 2.5-2.5h14.874a2.5 2.5 0 0 1 2.5 2.5v7.436a2.5 2.5 0 0 1-2.5 2.5ZM4.563 6.782a1.5 1.5 0 0 0-1.5 1.5v7.436a1.5 1.5 0 0 0 1.5 1.5h14.874a1.5 1.5 0 0 0 1.5-1.5V8.282a1.5 1.5 0 0 0-1.5-1.5Z" />
                    <path fill="currentColor" d="M12 12.786H5.064a.5.5 0 0 1 0-1H12a.5.5 0 0 1 0 1Zm2 2.928H5.064a.5.5 0 1 1 0-1H14a.5.5 0 0 1 0 1Z" />
                    <rect width="4" height="2" x="15.436" y="8.283" fill="currentColor" rx=".5" />
                </svg>
                <h2>Transaksi</h2>
            </div>
            <a href="transaksi/tambah.php" class="card__header--button btn">Tambah</a>
        </div>
        <div class="card__body">
            <div class="card__body--contents-wrapper">

                <?php foreach ($transaksiResult as $transaksi) : ?>
                    <a href="/moka-native/dashboard/transaksi/detail.php?id=<?= $transaksi["id"] ?>" class="card__body--content">
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
                        <div class="card__body--content--text">
                            <p class="card__body--content--text--name"><?= $transaksi["judul"] ?></p>
                            <?php if ($transaksi["jumlah"] > 0) : ?>
                                <span class="text-blue card__body--content--text--balance">Rp <?= $transaksi["jumlah"] ?></span>
                            <?php else : ?>
                                <span class="text-red card__body--content--text--balance">Rp <?= $transaksi["jumlah"] ?></span>
                            <?php endif; ?>

                        </div>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card__header">
            <div class="card__header--title">
                <svg width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M21 18v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1h-9a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2m0-2h10V8H12m4 5.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5Z" />
                </svg>
                <h2>Dompet</h2>
            </div>
            <a href="dompet/tambah.php" class="card__header--button btn">Tambah</a>
        </div>
        <div class="card__body">
            <div class="card__body--contents-wrapper">
                <?php foreach ($dompetResult as $dompet) : ?>
                    <a href="/moka-native/dashboard/dompet/detail.php?id=<?= $dompet["id_dompet"] ?>" class="card__body--content">
                        <svg width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M21 18v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1h-9a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2m0-2h10V8H12m4 5.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5Z" />
                        </svg>
                        <div class="card__body--content--text">
                            <p class="card__body--content--text--name"><?= $dompet["nama"] ?></p>
                            <span class="card__body--content--text--balance">Saldo Rp <?= $dompet["saldo"] ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
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
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <title>Dashboard</title>
    <!-- Stylenya disini -->
    <style>
        .text-blue {
            color: #1E90FF;
        }

        .text-red {
            color: hotpink;
        }

        .wrapper {
            padding: 1em;
            display: flex;
            flex-wrap: wrap;
            gap: 1em;
        }

        .card {
            width: 600px;
            border: 1px solid rgb(223, 223, 223);
            border-radius: 10px;
            flex: 1 0 auto;
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