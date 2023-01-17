<?php

function drawer($content){
    $drawer = <<<EOD
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <style>
            .drawer {
                display: flex;
            }
    
            .content-wrapper {
                padding: 1em;
            }
    
            .aside {
                position: sticky;
                top: 0;
                height: 100vh;
                width: 280px;
                border-right: 1px solid #b4b4b4;
            }
    
            .menu {
                display: flex;
                flex-direction: column;
                gap: 1em;
                padding: 1em;
            }
    
            .menu__item--wrapper {
                padding: 5px;
            }
    
            .menu__item--wrapper:hover {
                background-color: var(--color-primary);
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }
    
            .menu__item {
                display: flex;
                align-items: center;
                gap: .4em;
            }
    
            .dompet__dropdown {
                display: none;
                position: absolute;
                width: 250px;
                background-color: #fff;
                border: 1px solid #bababa;
                z-index: 10;
            }
    
    
            .dompet__dropdown--menu {
                display: flex;
                flex-direction: column;
                gap: 1em;
                padding: 1em;
                background-color: #fff;
            }
    
            .dompet__dropdown--menu--dompet {
                display: flex;
                align-items: center;
                gap: 10px;
                cursor: pointer;
            }
    
            .dompet__dropdown--menu--dompet:hover .dompet__dropdown--menu--dompet--title {
                color: var(--color-primary);
            }
    
            .dompet__dropdown--menu--dompet:hover .dompet__dropdown--menu--dompet--icon {
                color: var(--color-primary);
            }
    
            .dompet__dropdown--menu--dompet--title {
                font-size: 18px;
            }
    
            .body {
                width: 100%;
            }
    
            .nav {
                position: sticky;
                background-color: #fff;
                top: 0;
                width: 100%;
                padding: .7em;
                border-bottom: 1px solid var(--light-grey);
            }
    
            .left {
                display: flex;
                align-items: center;
                gap: 1em;
            }
    
            .hamburger-wrapper {
                padding: 1em;
                display: none;
            }
    
            .hamburger {
                color: #bfbfbf;
                width: 30px;
                height: 30px;
            }
    
            .nav__wrapper {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
    
            .nav__dompet {
                display: flex;
                position: relative;
                align-items: center;
                gap: 1em;
                padding: 5px;
                border-radius: 10px;
                cursor: pointer;
            }
    
            .nav__dompet:hover {
                background-color: var(--color-primary);
                color: white;
            }
    
            .dropdown--trigger:hover .dompet__dropdown {
                display: block;
            }
    
            .nav__dompet--icon--wrapper {
                padding: .5em;
                border-radius: 50%;
            }
    
            .nav__dompet--icon {
                width: 40px;
                height: 40px;
            }
    
            .nav__dompet--text {
                display: flex;
                flex-direction: column;
                gap: 5px;
            }
    
            .nav__dompet--text--title {
                font-size: 20px;
            }
    
            .nav__dompet--text--balance {
                font-weight: bold;
            }
    
            .nav__account:hover .nav__account--dropdown {
                display: block;
            }
    
            .nav__account--icon--wrapper {
                background-color: var(--super-light-grey);
                padding: .5em;
                border-radius: 50%;
            }
    
            .nav__account--icon {
                width: 40px;
                height: 40px;
            }
    
            .nav__account--dropdown {
                display: none;
                width: 180px;
                position: absolute;
                right: 1em;
                padding: 1em;
            }
    
            .nav__account--dropdown--menu--icon {
                width: 40px;
                height: 40px;
            }
    
            .nav__account--dropdown--menu--wrapper {
                background-color: #fff;
                display: flex;
                gap: 1em;
                flex-direction: column;
                border: 1px solid #bababa;
            }
    
            .nav__account--dropdown--menu {
                display: flex;
                align-items: center;
                padding: 5px;
            }
    
            .nav__account--dropdown--menu:hover {
                background-color: var(--color-secondary);
                cursor: pointer;
            }
    
            .visible {
                display: block;
            }
    
            .add--mobile {
                display: none;
            }
    
            .add--mobile,
            .add--desktop {
                line-height: 2rem;
            }
    
            @media only screen and (max-width:770px) {
                .aside {
                    display: none;
                }
    
                .add--mobile {
                    display: block;
                }
    
                .add--desktop {
                    display: none;
                }
    
                .visible {
                    display: block;
                }
    
                .hamburger-wrapper {
                    display: block;
                }
            }
    
            @media only screen and (max-width: 500px) {
                .nav__dompet--icon--wrapper {
                    display: none;
                }
            }
        </style>
    </head>
    
    <body>
        <div class="drawer">
            <aside class="aside" :class="{visible: showSidebar }" id="aside">
                <div class="menu">
                    <div class="menu__item--wrapper">
                        <a href="/moka-native/dashboard" class="menu__item">
                            <svg class="menu__item--icon" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3M11 3H3v10h8V3m10 8h-8v10h8V11m-10 4H3v6h8v-6Z" />
                            </svg>
                            <span class="menu__item--text">Dashboard</span>
                        </a>
                    </div>
                    <div class="menu__item--wrapper">
                        <a href="/moka-native/dashboard/dompet" class="menu__item">
                            <svg class="menu__item--icon" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M21 18v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1h-9a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2m0-2h10V8H12m4 5.5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5Z" />
                            </svg>
                            <span class="menu__item--text">Dompet</span>
                        </a>
                    </div>
                    <div class="menu__item--wrapper">
                        <a href="/moka-native/dashboard/transaksi" class="menu__item">
                            <svg class="menu__item--icon" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19.437 18.218H4.563a2.5 2.5 0 0 1-2.5-2.5V8.282a2.5 2.5 0 0 1 2.5-2.5h14.874a2.5 2.5 0 0 1 2.5 2.5v7.436a2.5 2.5 0 0 1-2.5 2.5ZM4.563 6.782a1.5 1.5 0 0 0-1.5 1.5v7.436a1.5 1.5 0 0 0 1.5 1.5h14.874a1.5 1.5 0 0 0 1.5-1.5V8.282a1.5 1.5 0 0 0-1.5-1.5Z" />
                                <path fill="currentColor" d="M12 12.786H5.064a.5.5 0 0 1 0-1H12a.5.5 0 0 1 0 1Zm2 2.928H5.064a.5.5 0 1 1 0-1H14a.5.5 0 0 1 0 1Z" />
                                <rect width="4" height="2" x="15.436" y="8.283" fill="currentColor" rx=".5" />
                            </svg>
                            <span class="menu__item--text">Transaksi</span>
                        </a>
                    </div>
                    <div class="menu__item--wrapper">
                        <a href="/moka-native/dashboard/anggaran" class="menu__item">
                            <svg class="menu__item--icon" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19.435 4.065H4.565a2.5 2.5 0 0 0-2.5 2.5v10.87a2.5 2.5 0 0 0 2.5 2.5h14.87a2.5 2.5 0 0 0 2.5-2.5V6.565a2.5 2.5 0 0 0-2.5-2.5Zm1.5 9.93h-6.42a2 2 0 0 1 0-4h6.42Zm-6.42-5a3 3 0 0 0 0 6h6.42v2.44a1.5 1.5 0 0 1-1.5 1.5H4.565a1.5 1.5 0 0 1-1.5-1.5V6.565a1.5 1.5 0 0 1 1.5-1.5h14.87a1.5 1.5 0 0 1 1.5 1.5v2.43Z" />
                                <circle cx="14.519" cy="11.996" r="1" fill="currentColor" />
                            </svg>
                            <span class="menu__item--text">Anggaran</span>
                        </a>
                    </div>
                    <div class="menu__item--wrapper">
                        <a href="/moka-native/dashboard/tujuan" class="menu__item">
                            <svg class="menu__item--icon" width="32" height="32" viewBox="0 0 24 24">
                                <g fill="none">
                                    <path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                                    <path fill="currentColor" d="M12 2c.375 0 .745.02 1.11.061a1 1 0 0 1-.22 1.988a8 8 0 1 0 7.061 7.061a1 1 0 1 1 1.988-.22c.04.365.061.735.061 1.11c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2Zm-.032 5.877a1 1 0 0 1-.719 1.217A3.002 3.002 0 0 0 12 15a3.002 3.002 0 0 0 2.905-2.25a1 1 0 0 1 1.937.5A5.002 5.002 0 0 1 7 12a5.002 5.002 0 0 1 3.75-4.842a1 1 0 0 1 1.218.719Zm6.536-5.75a1 1 0 0 1 .617.923v1.83h1.829a1 1 0 0 1 .707 1.707L18.12 10.12a1 1 0 0 1-.707.293H15l-1.828 1.829a1 1 0 0 1-1.415-1.415L13.586 9V6.586a1 1 0 0 1 .293-.707l3.535-3.536a1 1 0 0 1 1.09-.217Zm-1.383 3.337L15.586 7v1.414H17l1.536-1.535h-.415a1 1 0 0 1-1-1v-.415Z" />
                                </g>
                            </svg>
                            <span class="menu__item--text">Tujuan</span>
                        </a>
                    </div>
                    <hr>
                    <div class="menu__item--wrapper">
                        <a href="/moka-native/dashboard/profil/pengaturan.php" class="menu__item">
                            <svg class="memnu__item--icon" width="32" height="32" viewBox="0 0 24 24">
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                                    <path fill="currentColor" d="M9.965 2.809a1.511 1.511 0 0 0-1.401-.203a9.99 9.99 0 0 0-2.982 1.725a1.51 1.51 0 0 0-.524 1.313c.075.753-.058 1.48-.42 2.106c-.361.627-.925 1.106-1.615 1.417a1.511 1.511 0 0 0-.875 1.113a10.059 10.059 0 0 0 0 3.44c.093.537.46.926.875 1.114c.69.31 1.254.79 1.616 1.416c.361.627.494 1.353.419 2.106c-.045.452.107.964.524 1.313a9.989 9.989 0 0 0 2.982 1.725a1.51 1.51 0 0 0 1.4-.203c.615-.442 1.312-.691 2.036-.691s1.42.249 2.035.691c.37.266.89.39 1.401.203a9.99 9.99 0 0 0 2.982-1.725c.417-.349.57-.86.524-1.313c-.075-.753.057-1.48.42-2.106c.361-.627.925-1.105 1.615-1.416c.414-.188.782-.577.875-1.114a10.062 10.062 0 0 0 0-3.44a1.511 1.511 0 0 0-.875-1.113c-.69-.311-1.254-.79-1.616-1.417c-.362-.626-.494-1.353-.419-2.106a1.511 1.511 0 0 0-.524-1.313a9.99 9.99 0 0 0-2.982-1.725a1.511 1.511 0 0 0-1.4.203C13.42 3.25 12.723 3.5 12 3.5s-1.42-.249-2.035-.691ZM9 12a3 3 0 1 1 6 0a3 3 0 0 1-6 0Z" />
                                </g>
                            </svg>
                            <span class="menu__item--text">Pengaturan</span>
                        </a>
                    </div>
                    <div class="menu__item--wrapper">
                        <a href="/moka-native/dashboard/hubungkan" class="menu__item">
                            <svg width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M18 11h-3.18C14.4 9.84 13.3 9 12 9c-1.3 0-2.4.84-2.82 2H6c-.33 0-2-.1-2-2V8c0-1.83 1.54-2 2-2h10.18C16.6 7.16 17.7 8 19 8a3 3 0 0 0 3-3a3 3 0 0 0-3-3c-1.3 0-2.4.84-2.82 2H6C4.39 4 2 5.06 2 8v1c0 2.94 2.39 4 4 4h3.18c.42 1.16 1.52 2 2.82 2c1.3 0 2.4-.84 2.82-2H18c.33 0 2 .1 2 2v1c0 1.83-1.54 2-2 2H7.82C7.4 16.84 6.3 16 5 16a3 3 0 0 0-3 3a3 3 0 0 0 3 3c1.3 0 2.4-.84 2.82-2H18c1.61 0 4-1.07 4-4v-1c0-2.93-2.39-4-4-4m1-7a1 1 0 0 1 1 1a1 1 0 0 1-1 1a1 1 0 0 1-1-1a1 1 0 0 1 1-1M5 20a1 1 0 0 1-1-1a1 1 0 0 1 1-1a1 1 0 0 1 1 1a1 1 0 0 1-1 1Z" />
                            </svg>
                            <span class="menu__item--text">Hubungkan akun bank</span>
                        </a>
                    </div>
                </div>
            </aside>
            <div class="body">
                <nav class="nav">
                    <div class="nav__wrapper">
                        <div class="left">
                            
                        </div>
    
                        <div class="flex">
                            <a href="/moka-native/dashboard/transaksi/tambah.php" class="btn add--desktop">Tambah Transaksi</a>
                            <a href="/moka-native/dashboard/transaksi/tambah.php" class="btn add--mobile">+</a>
                            <div class="nav__account">
                                <div class="nav__account--icon--wrapper">
                                    <svg class="nav__account--icon" width="32" height="32" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z" />
                                    </svg>
                                </div>
                                <div class="nav__account--dropdown">
                                    <div class="nav__account--dropdown--menu--wrapper">
                                        <a href="/moka-native/dashboard/profil" class="nav__account--dropdown--menu">
                                            <div class="nav__account--dropdown--menu--icon--wrapper">
                                                <svg class="nav__account--dropdown--menu--icon" width="32" height="32" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z" />
                                                </svg>
                                            </div>
                                            <span class="nav__account--dropdown--menu--text">Profil</span>
                                        </a>
                                        <a href="/moka-native/backend/auth/logout.php" class="nav__account--dropdown--menu">
                                            <div class="nav__account--dropdown--menu--icon--wrapper">
                                                <svg class="nav__account--dropdown--menu--icon" width="32" height="32" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M16 17v-3H9v-4h7V7l5 5l-5 5M14 2a2 2 0 0 1 2 2v2h-2V4H5v16h9v-2h2v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9Z" />
                                                </svg>
                                            </div>
                                            <span class="nav__account--dropdown--menu--text">Keluar</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="content-wrapper">
                    $content
                </div>
            </div>
    
        </div>
    </body>
    </html>
    EOD;

    echo $drawer;
}

?>
