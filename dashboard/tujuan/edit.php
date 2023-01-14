<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
include '../../backend/connectdb.php';
include '../../backend/getParams.php';

// Dapatkan id tujuan dari parameter URL
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
            <a href="index.php" class="card__header--back btn-ghost-circle">
                <svg width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m13.3 17.3l-4.6-4.6q-.15-.15-.212-.325q-.063-.175-.063-.375t.063-.375q.062-.175.212-.325l4.6-4.6q.275-.275.7-.275q.425 0 .7.275q.275.275.275.7q0 .425-.275.7L10.8 12l3.9 3.9q.275.275.275.7q0 .425-.275.7q-.275.275-.7.275q-.425 0-.7-.275Z" />
                </svg>
            </a>
            <div class="card__header--title">
                <svg width="32" height="32" viewBox="0 0 256 256">
                    <path fill="currentColor" d="M221.9 83.2a104 104 0 0 1-20.4 118.3a103.8 103.8 0 0 1-147 0a103.8 103.8 0 0 1 0-147A104 104 0 0 1 195.7 49l22.6-22.7a8.1 8.1 0 0 1 11.4 11.4l-62.1 62l-33.9 34a8.2 8.2 0 0 1-11.4 0a8.1 8.1 0 0 1 0-11.4l27.8-27.7a40.2 40.2 0 1 0 17.8 31.1a8 8 0 0 1 7.6-8.4a7.9 7.9 0 0 1 8.4 7.5a56 56 0 1 1-22.4-41.6l22.8-22.8a87.9 87.9 0 1 0 23.1 29.7a8 8 0 0 1 14.5-6.9Z" />
                </svg>
                <h2>Edit Tujuan</h2>
            </div>
        </div>
        <div class="card__body">
            <form class="form" action="/moka-native/backend/tujuan/edit-tujuan.php?id=<?= $tujuan["id_tujuan"] ?>" method="post">
                <div class="form-control">
                    <label for="name" class="label">Nama</label>
                    <input id="name" name="nama_tujuan" type="text" class="input" value="<?= $tujuan["nama_tujuan"] ?>"/>
                </div>
                <div class="form-control">
                    <label for="keterangan" class="label">Keterangan</label>
                    <input id="keterangan" name="keterangan" type="text" class="input" value="<?= $tujuan["keterangan"] ?>"/>
                </div>
                <div class="form-control">
                    <label for="jumlah" class="label">Jumlah</label>
                    <input id="jumlah" name="jumlah_tujuan" type="text" class="input" value="<?= $tujuan["jumlah_tujuan"] ?>"/>
                </div>
                <input class="btn" value="Tambah" type="submit">
            </form>
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

        .card__body {
            padding: 1em;
        }

        .card__header {
            display: flex;
            align-items: center;
            gap: 1em;
            padding: 1em;
            background-color: var(--super-light-grey);
        }

        .card__header--title {
            display: flex;
            align-items: center;
            gap: 1em;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        .label {
            font-size: 18px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>