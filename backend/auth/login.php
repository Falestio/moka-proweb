<?php 
include '../connectdb.php';

$email = $_POST['email'];
$password = $_POST['password'];

// get user data from akun table with that email
$getUserQuery = "SELECT * FROM akun WHERE email = '$email'";
$getUserResult = $conn->query($getUserQuery); 

$id_akun = '';

if ($getUserResult->num_rows > 0){
    while($row = $getUserResult->fetch_assoc()){
        // Jka email dan password benar buat cookie dan arahkan ke dashboard
        if($row["password"] == $password){            
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