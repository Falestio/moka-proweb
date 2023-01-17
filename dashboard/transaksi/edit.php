<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
include '../../backend/protected.php';
include '../../backend/connectdb.php';
include '../../backend/getParams.php';
$id_akun = $_COOKIE['id_akun'];

// fetch data dompet
$dompetQuery = "SELECT * FROM dompet WHERE id_akun = '$id_akun'";
$dompetResult = mysqli_query($conn, $dompetQuery);

// fetch data anggaran
$anggaranQuery = "SELECT * FROM anggaran WHERE id_akun = '$id_akun'";
$anggaranResult = mysqli_query($conn, $anggaranQuery);

// fetch data tujuan
$tujuanQuery = "SELECT * FROM tujuan WHERE id_akun = '$id_akun'";
$tujuanResult = mysqli_query($conn, $tujuanQuery);

// dapatkan id transaksi dari parameter
$params = getParams($_SERVER['REQUEST_URI']);
$id_transaksi = $params["id"];

// select transaksi dengan id yang didapat dari parameter
$detilTransaksiQuery = "SELECT * FROM pemasukan WHERE id_akun = '$id_akun' UNION SELECT * FROM pengeluaran WHERE id_akun = '$id_akun'"; 
$detilTransaksiResult = mysqli_query($conn, $detilTransaksiQuery);
$transaksi = null;
foreach($detilTransaksiResult as $satuTransaksi){
    if($satuTransaksi["id"] == $id_transaksi){
        $transaksi = $satuTransaksi;
    }
}

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
                <h2>Edit Transaksi</h2>
            </div>
        </div>
        <div class="card__body">
            <form class="form" action="/moka-native/backend/transaksi/edit-transaksi.php?id=<?= $transaksi['id'] ?>" method="post">
                <div class="form-control">
                    <label for="name" class="label">Nama</label>
                    <input id="name" name="judul" type="text" class="input" value="<?= $transaksi['judul'] ?>"/>
                </div>
                <div class="form-control">
                    <label for="jenis-transaksi" class="label">Jenis Transaksi</label>
                    <select id="jenis-transaksi" name="jenis_transaksi" class="select">
                        <option <?php if($transaksi["jumlah"] > 0) echo "selected" ?> value="pemasukan" >Pemasukan</option>
                        <option <?php if($transaksi["jumlah"] < 0) echo "selected" ?> value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="form-control">
                    <label for="tanggal" class="label">Tanggal</label>
                    <input id="tanggal" name="tanggal" type="date" class="input" value="<?= $transaksi['tanggal'] ?>" />
                </div>
                <div class="form-control">
                    <label for="dompet" class="label">Dompet</label>
                    <select id="dompet" name="id_dompet" class="select">
                        <?php foreach ($dompetResult as $dompet) : ?>
                            <option value="<?= $dompet["id_dompet"] ?>"><?= $dompet["nama"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-control" id="anggaran-form">
                    <label for="anggaran" class="label">Anggaran terkait</label>
                    <select id="anggaran" name="id_anggaran" class="select">
                        <?php foreach ($anggaranResult as $anggaran) : ?>
                            <option value="<?= $anggaran["id_anggaran"] ?>"><?= $anggaran["nama_anggaran"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-control" id="tujuan-form">
                    <label for="tujuan" class="label">Tujuan terkait</label>
                    <select id="tujuan" name="id_tujuan" class="select">
                        <?php foreach ($tujuanResult as $tujuan) : ?>
                            <option value="<?= $tujuan["id_tujuan"] ?>"><?= $tujuan["nama_tujuan"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-control">
                    <label for="keterangan" class="label">Keterangan</label>
                    <input id="keterangan" name="keterangan" type="text" class="input" value="<?= $transaksi['keterangan'] ?>"/>
                </div>
                <div class="form-control">
                    <label for="jumlah" class="label">Jumlah</label>
                    <input id="jumlah" name="jumlah" type="text" class="input" value="<?= $transaksi['jumlah'] * -1 ?>"/>
                </div>
                <input type="submit" class="btn" value="Tambah">
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
    <title>Edit Transaksi</title>
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
    <script>
        document.getElementById("anggaran-form").style.display = "none";
        let jenis_transaksi = document.getElementById("jenis-transaksi");
        jenis_transaksi.addEventListener("input", (event) => {
            console.log(event.target.value);
            if (event.target.value == "pemasukan") {
                document.getElementById("tujuan-form").style.display = "block";
                document.getElementById("anggaran-form").style.display = "none";
            } else {
                document.getElementById("tujuan-form").style.display = "none";
                document.getElementById("anggaran-form").style.display = "block";
            }
        });
    </script>
</body>

</html>