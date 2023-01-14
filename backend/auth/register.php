<?php
include '../connectdb.php';
include '../randomid.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// cek apakah user dengan email yang sama sudah ada di database
$checkUserQuery = "SELECT * FROM akun WHERE email = '$email'";
$checkUserResult = $conn->query($checkUserQuery);

if ($checkUserResult->num_rows > 0) {
    echo "User dengan email tersebut sudah ada";
}

// buat record akun baru
$randomId = randomid(11);
$avatar = "https://avatars.dicebear.com/api/bottts/{$username}.svg";
$createUserQuery = "INSERT INTO akun VALUES ('$randomId', '$username', '$email', '$password', '$avatar')";
$createUserResult = $conn->query($createUserQuery);

// Lakukan Login jika berhasil menambah akun
if ($createUserResult == TRUE) {
    // get user data from akun table with that email
    $getUserQuery = "SELECT * FROM akun WHERE email = '$email'";
    $getUserResult = $conn->query($getUserQuery);

    $id_akun = '';

    if ($getUserResult->num_rows > 0) {
        while ($row = $getUserResult->fetch_assoc()) {
            // Jka email dan password benar buat cookie dan arahkan ke dashboard
            if ($row["password"] == $password) {
                $id_akun = $row["id_akun"];
                echo $id_akun;
            } else {
                echo "Password salah";
            }
        }
    } else {
        echo "Tidak akun dengan email tersebut";
    }

    $cookie_name = "id_akun";
    $cookie_value = $id_akun;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    header("Location: ../../dashboard");
} else {
    echo "akun gagal dibuat";
}