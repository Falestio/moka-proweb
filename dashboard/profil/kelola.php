<!-- Disini dilakukan logic yang berkaitan dengan data (CRUD) -->
<!-- Dan untuk menampung data tersebut pada sebuah variabel agar bisa digunakan di dalam seluruh file -->
<?php
include '../../components/Drawer.php';
?>

<!-- Template HTML dari halaman terkait -->
<?php ob_start(); ?>
<div class="top-main-content">
    <img src="../../assets/img/profilePicture.jpg" class="profilepicture" />
    <div class="edit" @click="toggleEdit()" v-if="!edit">
        <a style="font-size: 30px; margin-left: 30px">Ananda Pratama</a>
        <img src="https://api.iconify.design/ic:round-mode-edit.svg" style="margin-left: 15px; width: 18px" />
    </div>
    <div class="form" v-if="edit">
        <input class="input" type="text" placeholder="Nama Baru">
        <div>
            <button class="btn">Batal</button>
            <button class="btn">Ubah</button>
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