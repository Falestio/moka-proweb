<?php 
if (isset($_COOKIE['id_akun'])){
    unset($_COOKIE['id_akun']);
    setcookie('id_akun', '', time() - 3600, '/'); // empty value and old timestamp
}

header("Location: ../../index.php");