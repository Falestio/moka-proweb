<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
?>

<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div class="top-main-content">
    <img src="../../assets/img/profilePicture.jpg" class="img" width="150" /><br />
    <span class="username">Ananda Pratama</span>
    <span class="email">anandapratama@gmail.com</span>
</div>
<center>
    <div class="main-content">
        <a href="kelola.php" class="baris-content">
            <div class="content-kiri">
                <svg width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M5.85 17.1q1.275-.975 2.85-1.538Q10.275 15 12 15q1.725 0 3.3.562q1.575.563 2.85 1.538q.875-1.025 1.363-2.325Q20 13.475 20 12q0-3.325-2.337-5.663Q15.325 4 12 4T6.338 6.337Q4 8.675 4 12q0 1.475.488 2.775q.487 1.3 1.362 2.325ZM12 13q-1.475 0-2.488-1.012Q8.5 10.975 8.5 9.5t1.012-2.488Q10.525 6 12 6t2.488 1.012Q15.5 8.025 15.5 9.5t-1.012 2.488Q13.475 13 12 13Zm0 9q-2.075 0-3.9-.788q-1.825-.787-3.175-2.137q-1.35-1.35-2.137-3.175Q2 14.075 2 12t.788-3.9q.787-1.825 2.137-3.175q1.35-1.35 3.175-2.138Q9.925 2 12 2t3.9.787q1.825.788 3.175 2.138q1.35 1.35 2.137 3.175Q22 9.925 22 12t-.788 3.9q-.787 1.825-2.137 3.175q-1.35 1.35-3.175 2.137Q14.075 22 12 22Z" />
                </svg>
                <p>Kelola Akun</p>
            </div>
            <svg width="32" height="32" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8.7 17.3q-.275-.275-.275-.7q0-.425.275-.7l3.9-3.9l-3.9-3.9q-.275-.275-.275-.7q0-.425.275-.7q.275-.275.7-.275q.425 0 .7.275l4.6 4.6q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.7.275q-.425 0-.7-.275Z" />
            </svg>
        </a>
        <a href="/moka-native/dashboard/dompet" class="baris-content">
            <div class="content-kiri">
                <svg width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M16 13.5q.65 0 1.075-.425q.425-.425.425-1.075q0-.65-.425-1.075Q16.65 10.5 16 10.5q-.65 0-1.075.425Q14.5 11.35 14.5 12q0 .65.425 1.075q.425.425 1.075.425ZM5 19V5v14Zm0 2q-.825 0-1.413-.587Q3 19.825 3 19V5q0-.825.587-1.413Q4.175 3 5 3h14q.825 0 1.413.587Q21 4.175 21 5v2.5h-2V5H5v14h14v-2.5h2V19q0 .825-.587 1.413Q19.825 21 19 21Zm8-4q-.825 0-1.412-.587Q11 15.825 11 15V9q0-.825.588-1.413Q12.175 7 13 7h7q.825 0 1.413.587Q22 8.175 22 9v6q0 .825-.587 1.413Q20.825 17 20 17Zm7-2V9h-7v6Z" />
                </svg>
                <p>Dompet Saya</p>
            </div>
            <svg width="32" height="32" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8.7 17.3q-.275-.275-.275-.7q0-.425.275-.7l3.9-3.9l-3.9-3.9q-.275-.275-.275-.7q0-.425.275-.7q.275-.275.7-.275q.425 0 .7.275l4.6 4.6q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.7.275q-.425 0-.7-.275Z" />
            </svg>
        </a>
        <a href="pengaturan.php" class="baris-content">
            <div class="content-kiri">
                <svg width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m9.25 22l-.4-3.2q-.325-.125-.612-.3q-.288-.175-.563-.375L4.7 19.375l-2.75-4.75l2.575-1.95Q4.5 12.5 4.5 12.337v-.675q0-.162.025-.337L1.95 9.375l2.75-4.75l2.975 1.25q.275-.2.575-.375q.3-.175.6-.3l.4-3.2h5.5l.4 3.2q.325.125.613.3q.287.175.562.375l2.975-1.25l2.75 4.75l-2.575 1.95q.025.175.025.337v.675q0 .163-.05.338l2.575 1.95l-2.75 4.75l-2.95-1.25q-.275.2-.575.375q-.3.175-.6.3l-.4 3.2Zm2.8-6.5q1.45 0 2.475-1.025Q15.55 13.45 15.55 12q0-1.45-1.025-2.475Q13.5 8.5 12.05 8.5q-1.475 0-2.488 1.025Q8.55 10.55 8.55 12q0 1.45 1.012 2.475Q10.575 15.5 12.05 15.5Z" />
                </svg>
                <p>Pengaturan</p>
            </div>
            <svg width="32" height="32" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8.7 17.3q-.275-.275-.275-.7q0-.425.275-.7l3.9-3.9l-3.9-3.9q-.275-.275-.275-.7q0-.425.275-.7q.275-.275.7-.275q.425 0 .7.275l4.6 4.6q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.7.275q-.425 0-.7-.275Z" />
            </svg>
        </a>
        <a href="https://www.customercare.co.nz/" class="baris-content">
            <div class="content-kiri">
                <svg width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M11.3 22.3L9 20H5q-.825 0-1.413-.587Q3 18.825 3 18V4q0-.825.587-1.413Q4.175 2 5 2h14q.825 0 1.413.587Q21 3.175 21 4v14q0 .825-.587 1.413Q19.825 20 19 20h-4l-2.3 2.3q-.275.275-.7.275q-.425 0-.7-.275Zm.65-5.5q.525 0 .888-.362q.362-.363.362-.888t-.362-.888q-.363-.362-.888-.362t-.888.362q-.362.363-.362.888t.362.888q.363.362.888.362Zm1-4.7q.075-.4.263-.7q.187-.3.737-.85q.925-.925 1.25-1.5q.325-.575.325-1.3q0-1.275-.937-2.113q-.938-.837-2.363-.837q-1.075 0-1.913.437q-.837.438-1.287 1.163q-.225.35-.125.737q.1.388.45.538q.35.15.688.013q.337-.138.537-.463q.25-.35.675-.537q.425-.188.875-.188q.7 0 1.125.375q.425.375.425.95q0 .475-.287.95q-.288.475-.888 1q-.65.575-1 1.175q-.35.6-.35 1.125q0 .35.263.6q.262.25.637.25q.35 0 .587-.237q.238-.238.313-.588Z" />
                </svg>
                <p>Bantuan dan Dukungan</p>
            </div>
            <svg width="32" height="32" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8.7 17.3q-.275-.275-.275-.7q0-.425.275-.7l3.9-3.9l-3.9-3.9q-.275-.275-.275-.7q0-.425.275-.7q.275-.275.7-.275q.425 0 .7.275l4.6 4.6q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.7.275q-.425 0-.7-.275Z" />
            </svg>
        </a>
        <div class="keluar">
            <a href="/moka-native" class="btn-danger">Keluar</a>
        </div>
    </div>
</center>
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

        .top-main-content {
            display: flex;
            flex-direction: column;
            gap: 0.3em;
            align-items: center;
            text-align: center;
        }

        .username {
            font-size: var(--text-md);
        }

        .email {
            font-size: var(--text-sm);
        }

        .img {
            width: 200px;
            height: 200px;
        }

        .main-content {
            max-width: 600px;
            height: 600px;
            /* background: lightblue; */
        }

        .baris-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            height: 45px;
            border: 1px solid var(--light-grey);
            border-radius: 12px;
            transition: 0.4s;
        }

        .baris-content:hover {
            background-color: var(--light-grey);
            cursor: pointer;
        }

        .content-kiri {
            display: flex;
            align-items: center;
            margin-left: 20px;
        }

        .content-kiri a {
            margin-left: 15px;
            font-size: 20px;
        }

        .baris-content img {
            margin-right: 20px;
        }

        .keluar {
            margin-top: 2em;
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>