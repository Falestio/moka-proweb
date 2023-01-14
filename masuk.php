<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/variables.css">
    <title>Masuk</title>
    <style>
        .container {
            display: flex;
            background-image: url('assets/img/background.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            height: 100vh;
        }

        .login-left {
            display: flex;
            flex-direction: column;
            justify-content: content;
            gap: 2em;
            background-color: white;
            height: 100%;
            padding: 3em;
        }

        .login-left h1 {
            font-size: 35px;
            color: #334443;
            margin-left: 10px;
        }

        .login-right {
            display: flex;
            background-image: url('@/assets/img/background.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            height: 100vh;
            display: flex;
            justify-content: left;
            padding: 3em;
        }

        .content {
            color: white;
            font-size: 25px;
        }

        .login-header h3 {
            font-size: 35px;
            text-align: center;
            color: #334443;
        }

        .login-form-content {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .login-form-footer {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .form-item label:not(chechboxlabel) {
            display: inline-block;
            background-color: white;
        }

        .info {
            text-align: center;
            font-size: 18px;
            margin-bottom: 40px;
        }

        @media (max-width: 770px) {
            .login-right {
                display: none;
            }

            .container {
                background: none;
            }

            .login-left {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="container">
            <div class="login-left">
                <div class="login-header">
                    <h3>Masuk menggunakan akun Anda</h3>
                </div>
                <form class="login-form" action="./backend/auth/login.php" method="post">
                    <div class="login-form-content">
                        <div class="form-item">
                            <label for="email"> Email</label>
                            <input name="email" class="input" type="text" id="email" />
                        </div>
                        <div class="form-item">
                            <label for="password">Kata Sandi</label>
                            <input name="password" class="input" type="password" id="password" />
                        </div>
                        </div>
                        <input class="btn" type="submit" value="Masuk">
                    </div>
                </form>
                <div class="login-form-footer">
                    <button class="btn">Google</button>
                    <span>atau</span>
                    <button class="btn">Facebook</button>
                </div>
                <div class="info">
                    <a href="#">Lupa kata sandi?</a>
                    Belum punya akun? <a href="daftar.php">Daftar</a>
                </div>
            </div>
            <div class="login-right">
                <div class="content">
                    <form action="">
                        <p>Kiat Atur Keuangan buat Generasi Milenial</p>
                        <p>
                            Kondisi keuangan yang sehat adalah salah satu resolusi yang diinginkan generasi milenial di 2022. Manajer Hubungan Masyarakat Qoala, Ricky Alexander
                            Samosir, mengatakan kondisi keuangan yang sehat bisa menjadi salah satu penentu keuangan di masa depan.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>