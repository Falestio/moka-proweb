<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/variables.css">
    <title>Moka</title>
    <style>
        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 768px) {
            .container {
                width: 750px;
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 970px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }

        .header {
            width: 100%;
            padding: 10px;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            background-color: rgb(248, 248, 248);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav__logo {
            font-size: 1.5rem;
            font-weight: 600;
            color: #000;
            text-decoration: none;
        }

        .nav__menu {
            display: flex;
        }

        .nav__menu-links-wrapper {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav__menu-link {
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
        }

        .main>* {
            margin-bottom: 3rem;
        }

        .main__headline {
            text-align: center;
            padding: 4rem 0;
        }

        .main__headline-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: #000;
            margin-bottom: 1rem;
        }

        .main__benefit-1,
        .main__benefit-2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 0;
            gap: 1rem;
        }

        .main__benefit-1-content,
        .main__benefit-2-content {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .main__features-wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;
        }

        .main__features-feature {
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .main__features-feature-img {
            padding: 10px;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            width: 70px;
            border-radius: 50%;
            margin: 0 auto;
        }

        .main__cta {
            padding: 4rem 0;
        }

        .main__cta-wrapper {
            text-align: center;
            padding: 4rem 0;
            background-color: #fffbdf;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            border-radius: 10px;
        }

        .main__cta-link {
            width: 33%;
            margin: 0 auto;
        }

        .nav__menu-links-wrapper-mobile {
            display: none;
        }

        .nav__menu-links-wrapper-mobile a {
            margin-left: 1em;
        }

        @media (max-width: 770px) {
            .main__benefit-1 {
                flex-direction: column;
            }

            .main__benefit-2 {
                flex-direction: column-reverse;
            }

            .main__benefit-1-content,
            .main__benefit-2-content {
                margin: 0 2em;
            }
        }

        @media (max-width: 426px) {
            .nav__menu-links-wrapper {
                display: none;
            }

            .nav__menu-links-wrapper-mobile {
                display: block;
            }

            .main__features-wrapper {
                grid-template-columns: repeat(1, 1fr);
                gap: 3rem;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <nav class="nav">
            <div class="nav__logo">
                <h1>MOKA</h1>
            </div>
            <div class="nav__menu">
                <div class="nav__menu-links-wrapper">
                    <a href="#" class="nav__menu-link">Tentang</a>
                    <a href="#" class="nav__menu-link">Blog</a>
                    <a href="daftar.php" class="nav__menu-link btn">Coba Gratis</a>
                    <a href="masuk.php" class="nav__menu-link">Masuk</a>
                </div>
                <div class="nav__menu-links-wrapper-mobile">
                    <a href="daftar.php" class="nav__menu-link btn">Coba Gratis</a>
                    <a href="masuk.php" class="nav__menu-link">Masuk</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="main">
        <div class="main__headline">
            <h1 class="main__headline-title">Permudah Kelola Keuangan Anda</h1>
            <a href="daftar.php" class="main__headline-cta btn">Coba Gratis</a>
        </div>

        <div class="main__benefit-1 container">
            <div class="main__benefit-1-img">
                <img src="assets/img/features1moka.png" />
            </div>
            <div class="main__benefit-1-content">
                <h2 class="main__benefit-1-content-title">Pengelola keuangan simple</h2>
                <p class="main__benefit-1-content-text">It takes seconds href record daily transactions. Put them into clear and visualized categories such as Expense: Food, Shopping or Income: Salary, Gift.</p>
            </div>
        </div>

        <div class="main__benefit-2 container">
            <div class="main__benefit-2-content">
                <h2 class="main__benefit-2-content-title">Pengelola keuangan simple</h2>
                <p class="main__benefit-2-content-text">It takes seconds to record daily transactions. Put them into clear and visualized categories such as Expense: Food, Shopping or Income: Salary, Gift.</p>
            </div>
            <div class="main__benefit-2-img">
                <img src="assets/img/features1moka.png" />
            </div>
        </div>

        <div class="main__features">
            <div class="main__features-wrapper container">
                <div class="main__features-feature">
                    <div class="main__features-feature-img">
                        <svg width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.28A2 2 0 0 0 22 15V9a2 2 0 0 0-1-1.72V5a2 2 0 0 0-2-2H5m0 2h14v2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6v2H5V5m8 4h7v6h-7V9m3 1.5a1.5 1.5 0 0 0-1.5 1.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 0 1.5-1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                        </svg>
                    </div>
                    <h3 class="main__features-feature-title">Multiple Wallet</h3>
                    <p class="main__features-feature-text">Ini adalah multiple wallet yang sangat bisa diandalkan</p>
                </div>
                <div class="main__features-feature">
                    <div class="main__features-feature-img">
                        <svg width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.28A2 2 0 0 0 22 15V9a2 2 0 0 0-1-1.72V5a2 2 0 0 0-2-2H5m0 2h14v2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6v2H5V5m8 4h7v6h-7V9m3 1.5a1.5 1.5 0 0 0-1.5 1.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 0 1.5-1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                        </svg>
                    </div>
                    <h3 class="main__features-feature-title">Multiple Wallet</h3>
                    <p class="main__features-feature-text">Ini adalah multiple wallet yang sangat bisa diandalkan</p>
                </div>
                <div class="main__features-feature">
                    <div class="main__features-feature-img">
                        <svg width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.28A2 2 0 0 0 22 15V9a2 2 0 0 0-1-1.72V5a2 2 0 0 0-2-2H5m0 2h14v2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6v2H5V5m8 4h7v6h-7V9m3 1.5a1.5 1.5 0 0 0-1.5 1.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 0 1.5-1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                        </svg>
                    </div>
                    <h3 class="main__features-feature-title">Multiple Wallet</h3>
                    <p class="main__features-feature-text">Ini adalah multiple wallet yang sangat bisa diandalkan</p>
                </div>
                <div class="main__features-feature">
                    <div class="main__features-feature-img">
                        <svg width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.28A2 2 0 0 0 22 15V9a2 2 0 0 0-1-1.72V5a2 2 0 0 0-2-2H5m0 2h14v2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6v2H5V5m8 4h7v6h-7V9m3 1.5a1.5 1.5 0 0 0-1.5 1.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 0 1.5-1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                        </svg>
                    </div>
                    <h3 class="main__features-feature-title">Multiple Wallet</h3>
                    <p class="main__features-feature-text">Ini adalah multiple wallet yang sangat bisa diandalkan</p>
                </div>
                <div class="main__features-feature">
                    <div class="main__features-feature-img">
                        <svg width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.28A2 2 0 0 0 22 15V9a2 2 0 0 0-1-1.72V5a2 2 0 0 0-2-2H5m0 2h14v2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6v2H5V5m8 4h7v6h-7V9m3 1.5a1.5 1.5 0 0 0-1.5 1.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 0 1.5-1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                        </svg>
                    </div>
                    <h3 class="main__features-feature-title">Multiple Wallet</h3>
                    <p class="main__features-feature-text">Ini adalah multiple wallet yang sangat bisa diandalkan</p>
                </div>
                <div class="main__features-feature">
                    <div class="main__features-feature-img">
                        <svg width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.28A2 2 0 0 0 22 15V9a2 2 0 0 0-1-1.72V5a2 2 0 0 0-2-2H5m0 2h14v2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h6v2H5V5m8 4h7v6h-7V9m3 1.5a1.5 1.5 0 0 0-1.5 1.5a1.5 1.5 0 0 0 1.5 1.5a1.5 1.5 0 0 0 1.5-1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                        </svg>
                    </div>
                    <h3 class="main__features-feature-title">Multiple Wallet</h3>
                    <p class="main__features-feature-text">Ini adalah multiple wallet yang sangat bisa diandalkan</p>
                </div>
            </div>
        </div>

        <div class="main__cta">
            <div class="main__cta-wrapper container">
                <h2 class="main__cta-title">Coba Sekarang</h2>
                <p class="main__cta-text">Permudah Pengelolaan uang Anda sekarang</p>
                <a href="daftar.php" class="main__cta-link btn">Coba Gratis</a>
            </div>
        </div>
    </main>
</body>

</html>