<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
include '../../backend/connectdb.php';
include '../../backend/getParams.php';
include '../../backend/protected.php';


$id_akun = $_COOKIE['id_akun'];

$query = "SELECT * FROM akun WHERE id_akun = '$id_akun'";
$result = mysqli_query($conn, $query);
$akun = mysqli_fetch_assoc($result);
?>

<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div class="top-main-content">
    <img src="../../assets/img/profilePicture.jpg" class="profilepicture" />
    <div class="edit">
        <a style="font-size: 30px; margin-left: 30px"><?= $akun['nama'] ?></a>
        <img src="https://api.iconify.design/ic:round-mode-edit.svg" style="margin-left: 15px; width: 18px" />
    </div>
    <div class="form" v-if="edit">
        <form action="/moka-native/backend/profile/edit-nama.php" method="post">
            <input class="input" type="text" name="nama" placeholder="Nama Baru">
            <div>
                <input class="btn" value="batal" type="submit">
                <input class="btn" value="Ubah" type="submit">
            </div>
        </form>
        

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
    <style scoped>
        .top-main-content,
        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .edit {
            cursor: pointer;
        }

        .form {
            display: flex;
            cursor: pointer;
        }

        .profilepicture {
            width: 300px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <!-- Memanggil fungsi drawer untuk menampilkan komponen drawer -->
    <?php drawer($html); ?>
</body>

</html>