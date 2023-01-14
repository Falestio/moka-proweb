<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
?>

<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div class="container">
    <div class="posttitle"><b> HUBUNGKAN AKUN</b></div>
    <div class="post">
        <img src="../../assets/img/dana.png" />
    </div>
    <div class="data">
        Username <br />
        <div class="isi-data">
            <input class="input" type="text" />
        </div>
    </div>
    <div class="data">
        No.Hp <br />
        <div class="isi-data">
            <input class="input" type="text" />
        </div>
    </div>

    <p style="text-align: center; color: rgb(141, 138, 138); margin-top: 20px">Kirim Kode Verivikasi Ke Nomer Anda</p>
    <center>
        <a href="/dashboard/dashnoard" class="btn">Kirim</a>
    </center>
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
        .container {
            padding: 2em;
        }

        .posttitle {
            text-decoration: none;
            font-size: 30px;
            font-family: Arial;
            color: black;
            text-align: center;
        }

        .posttitle a {
            text-decoration: none;
        }

        img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            align-items: center;
        }

        .data {
            font-size: 22px;
        }

        button {
            width: 100px;
            height: 35px;
            text-align: center;
            margin-top: 20px;
            background-color: #34656d;
            color: white;
            border: none;
        }

        @media screen and (max-width: 1080px) {
            .data {
                font-size: 18px;
            }

            .posttitle {
                font-size: 24;
            }

            img {
                width: 80px;
                height: 80px;
            }
        }

        @media screen and (max-width: 750px) {
            .data {
                font-size: 18px;
            }

            .posttitle {
                font-size: 24;
            }

            img {
                width: 80px;
                height: 80px;
            }
        }

        @media screen and (max-width: 480px) {
            .data {
                font-size: 18px;
            }

            .posttitle {
                font-size: 24;
            }

            img {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>