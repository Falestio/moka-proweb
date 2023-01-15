<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
include '../../backend/protected.php';

?>

<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div class="posttitle"><b> HUBUNGKAN AKUN</b></div>
<div class="cari">
    <input class="input" type="text" placeholder=" Search.." />
</div>
<br />
<div id="konten">
    <div class="subkon">
        <p>Most Popular</p>
    </div>
    <div class="post">
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/MANDIRI1.png" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/dana.png" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/paypal1.jpg" /></NuxtLink>
    </div>
    <br /><br />
    <div class="subkon">
        <p>Bank</p>
        <a href="#" class="btn" style="align-items: right;">Lebih Banyak</a>
    </div>
    <div class="post">
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/MANDIRI1.png" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/bri.jpg" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/bca.png" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/bsi2.png" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/bni.png" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/btn.jpg" /></NuxtLink>
    </div>
    <br /><br />
    <div class="subkon">
        <p>E-Wallet</p>
        <a href="#" class="btn" style="align-items: right">Lebih Banyak</a>
    </div>
    <div class="post">
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/dana.png" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/linkaja.png" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/sopi.png" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/gopay1.jfif" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/ovo1.jpg" /></NuxtLink>
        <NuxtLink to="/dashboard/hubungkan/detail"> <img src="@/assets/img/paypal1.jpg" /></NuxtLink>
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
        #konten {
            background-color: rgb(254, 249, 255);
            width: auto;
            height: auto;
            margin: 0 20 20px;
            padding: 20px 20px 20px 20px;
        }

        .posttitle {
            text-decoration: none;
            font-size: 30px;
            font-family: Arial;
            color: black;
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .posttitle a {
            text-decoration: none;
        }

        .cari {
            padding: 1em;
        }

        .post {
            display: flex;
            text-align: justify;
            gap: 2em;
            flex-wrap: wrap;
        }

        img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            align-items: center;
        }

        img:hover {
            color: rgb(255, 255, 255);
            opacity: 0.5;
            border: 3px solid rgb(186, 176, 176);
        }

        .subkon {
            color: rgba(36, 27, 27, 0.578);
            margin-bottom: 20px;
            font-size: 20px;
            display: flex;
            justify-content: space-between;
        }

        @media screen and (max-width: 1080px) {
            .post {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
            }

            img {
                width: 80px;
                height: 80px;
            }

            .cari {
                width: auto;
                margin-left: -20px;
            }
        }

        @media screen and (max-width: 750px) {
            .posttitle {
                font-size: medium;
            }
        }

        @media screen and (max-width: 480px) {
            .posttitle {
                font-size: medium;
            }
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>