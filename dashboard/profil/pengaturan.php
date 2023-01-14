<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
?>

<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<a class="tittle">Pengaturan</a>

<div class="main-content">
    <div class="sub-tittle"><a>Tampilan</a></div>

    <div class="content">
        <div class="baris-content">
            <div class="content-kiri">
                <a>Format Waktu</a>
            </div>
            <div class="content-kanan">
                <a>23/11/2022</a>
            </div>
        </div>
        <div class="baris-content">
            <div class="content-kiri">
                <a>Pilih Bahasa</a>
            </div>
            <div class="content-kanan">
                <a>Bahasa Indonesia</a>
            </div>
        </div>
        <div class="baris-content">
            <div class="content-kiri">
                <a>Mata Uang</a>
            </div>
            <div class="content-kanan">
                <a>IDR</a>
            </div>
        </div>
        <div class="baris-content">
            <div class="content-kiri">
                <a>Format Waktu</a>
            </div>
            <div class="content-kanan">
                <a>23/11/2022</a>
            </div>
        </div>
        <div class="sub-tittle"><a>Sistem</a></div>
        <div class="baris-content">
            <div class="content-kiri">
                <a>Privasi</a>
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
        .tittle {
            font-size: 40px;
            margin-left: 30px;
        }

        .sub-tittle {
            font-style: normal;
            font-weight: 700;
            font-size: 30px;
            line-height: 39px;
            margin-top: 40px;
            margin-left: 35px;
            margin-bottom: 20px;
        }

        .baris-content {
            width: 100%;
            height: 65px;
            justify-content: space-between;
            align-items: center;
            display: flex;
            border-top: 1px solid;
            border-bottom: 1px solid;
            border-color: #bababb;
        }

        .baris-content a {
            margin-left: 35px;
            font-weight: 400;
            font-size: 20px;
            line-height: 29px;
            margin-left: 60px;
        }

        .content-kanan a {
            color: green;
            font-weight: 700;
            font-size: 22px;
            line-height: 29px;
            margin-right: 60px;
        }

        @media screen and (max-width: 750px) {
            .tittle {
                font-size: 35px;
                margin-left: 10px;
            }

            .sub-tittle {
                font-size: 22px;
                margin-left: 10px;
            }

            .baris-content a {
                font-size: 18px;
                margin-left: 30px;
            }

            .content-kanan a {
                font-size: 18px;
                margin-right: 35px;
            }
        }

        @media screen and (max-width: 480px) {
            .tittle {
                font-size: 25px;
                margin-left: 0px;
            }

            .sub-tittle {
                font-size: 18px;
                margin-left: 0px;
            }

            .baris-content a {
                font-size: 13px;
                margin-left: 20px;
            }

            .content-kanan a {
                font-size: 13px;
                margin-right: 35px;
            }
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>