<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>Administrator - Sistem Informasi Keuangan</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Google fonts -->
    <link rel="icon" href="../assets/dist/img/logo.ico" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="../assets/dist/fonts/fontawesome.css">
    <link rel="stylesheet" href="../assets/dist/fonts/ionicons.css">
    <link rel="stylesheet" href="../assets/dist/fonts/linearicons.css">
    <link rel="stylesheet" href="../assets/dist/fonts/open-iconic.css">
    <link rel="stylesheet" href="../assets/dist/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../assets/dist/fonts/feather.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="../assets/dist/css/bootstrap-material.css">
    <link rel="stylesheet" href="../assets/dist/css/shreerang-material.css">
    <link rel="stylesheet" href="../assets/dist/css/uikit.css">
    <link rel="stylesheet" href="../assets/bower_components/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">


    <!-- Libs -->
    <link rel="stylesheet" href="../assets/dist/libs/perfect-scrollbar/perfect-scrollbar.css">

    <?php
    include '../koneksi.php';
    session_start();
    if ($_SESSION['status'] != "administrator_logedin") {
        header("location:../auth/login.php?alert=belum_login");
    }
    ?>

</head>

<body>
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>

    <div class="layout-wrapper layout-2">
        <div class="layout-inner">

            <!-- sidebar  -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
                <ul class="sidenav-inner py-4" data-widget="tree">

                    <!-- Dashboards -->
                    <li class="sidenav-item <?= pathinfo(parse_url($_SERVER['REQUEST_URI'])['path'], PATHINFO_FILENAME) === 'index' ? 'active-link' : '' ?>">
                        <div class="sidenav-curved d-lg-flex d-none"></div>
                        <a href="./index.php" class="sidenav-link">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>

                    <!-- Rekening bank -->
                    <li class="sidenav-item <?= pathinfo(parse_url($_SERVER['REQUEST_URI'])['path'], PATHINFO_FILENAME) === 'bank' ? 'active-link' : '' ?>">
                        <div class="sidenav-curved d-lg-flex d-none"></div>
                        <a href="./bank.php" class="sidenav-link">
                            <i class="sidenav-icon feather icon-server"></i>
                            <div>Rekening Bank</div>
                        </a>
                    </li>

                    <!-- Data Kategori -->
                    <li class="sidenav-item <?= pathinfo(parse_url($_SERVER['REQUEST_URI'])['path'], PATHINFO_FILENAME) === 'kategori' ? 'active-link' : '' ?>">
                        <div class="sidenav-curved d-lg-flex d-none"></div>
                        <a href="./kategori.php" class="sidenav-link">
                            <i class="sidenav-icon feather icon-folder"></i>
                            <div>Data Kategori</div>
                        </a>
                    </li>

                    <!-- Data Transaksi -->
                    <li class="sidenav-item <?= pathinfo(parse_url($_SERVER['REQUEST_URI'])['path'], PATHINFO_FILENAME) === 'transaksi' ? 'active-link' : '' ?>">
                        <div class="sidenav-curved d-lg-flex d-none"></div>
                        <a href="./transaksi.php" class="sidenav-link">
                            <i class="sidenav-icon feather icon-folder"></i>
                            <div>Data Transaksi</div>
                        </a>
                    </li>

                    <!-- Hutang Piutang  -->
                    <li class="sidenav-item <?= pathinfo(parse_url($_SERVER['REQUEST_URI'])['path'], PATHINFO_FILENAME) === 'hutang' || pathinfo(parse_url($_SERVER['REQUEST_URI'])['path'], PATHINFO_FILENAME) === 'piutang' ? 'active-link' : '' ?>">
                        <div class="sidenav-curved d-lg-flex d-none"></div>
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-credit-card"></i>
                            <div>Hutang Piutang</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <a href="./hutang.php" class="sidenav-link">
                                    <div>Catatan Hutang</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="./piutang.php" class="sidenav-link">
                                    <div>Catatan Piutang</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidenav-item <?= pathinfo(parse_url($_SERVER['REQUEST_URI'])['path'], PATHINFO_FILENAME) === 'laporan' ? 'active-link' : '' ?>">
                        <div class="sidenav-curved d-lg-flex d-none"></div>
                        <a href="./laporan.php" class="sidenav-link">
                            <i class="sidenav-icon feather icon-inbox"></i>
                            <div>Laporan</div>
                        </a>
                    </li>

                    <li class="sidenav-item <?= pathinfo(parse_url($_SERVER['REQUEST_URI'])['path'], PATHINFO_FILENAME) === 'user' ? 'active-link' : '' ?>">
                        <div class="sidenav-curved d-lg-flex d-none"></div>
                        <a href="./user.php" class="sidenav-link">
                            <i class="sidenav-icon feather icon-users"></i>
                            <div>Data Pengguna</div>
                        </a>
                    </li>

                    <li class="sidenav-item <?= pathinfo(parse_url($_SERVER['REQUEST_URI'])['path'], PATHINFO_FILENAME) === 'gantipassword' ? 'active-link' : '' ?>">
                        <div class="sidenav-curved d-lg-flex d-none"></div>
                        <a href="./gantipassword.php" class="sidenav-link">
                            <i class="sidenav-icon feather icon-lock"></i>
                            <div>Ganti Password</div>
                        </a>
                    </li>

                </ul>
            </div>

            <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white fixed-top" id="layout-navbar">
                <div class="app-title d-none d-lg-flex align-items-center">
                    <img src="../assets/dist/img/logo.png" width="35" height="35" alt="Brand Logo" class="img-fluid">
                    <a href="index.php" class="app-brand-text demo sidenav-text font-weight-bold">KeuanganApp</a>
                </div>
                <div class="layout-sidenav-toggle navbar-nav align-items-lg-center mr-auto ml-4">
                    <a class="nav-item nav-link px-0" href="javascript:">
                        <i class="ion ion-md-menu text-large align-middle"></i>
                    </a>
                </div>
                <div class="demo-navbar-user nav-item dropdown mr-4">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                            <?php
                            $id_user = $_SESSION['id'];
                            $profil = mysqli_query($koneksi, "select * from user where user_id='$id_user'");
                            $profil = mysqli_fetch_assoc($profil);
                            if ($profil['user_foto'] == "") {
                            ?>
                                <img src="../assets/dist/img/sistem/user.png" alt="user-image" class="d-block ui-w-30 rounded-circle">
                            <?php } else { ?>
                                <img src="../assets/dist/img/user/<?php echo $profil['user_foto'] ?>" alt="user-image" class="d-block ui-w-30 rounded-circle">
                            <?php } ?>
                            <div class="mr-lg-4 ml-4 ml-lg-0 d-flex">
                                <span class="d-block text-dark" style="font-size: 13px;"><?php echo $_SESSION['nama']; ?></span>
                                <div class="nav-item d-block text-big font-weight-light line-height-1 opacity-25 mr-1 ml-1">|</div>
                                <small class="text-muted" style="font-size: 11px; font-weight: medium; margin-top: 1.5px;"><?php echo $_SESSION['level'] ?></small>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="../auth/logout.php" class="dropdown-item">
                            <i class="feather icon-log-out text-danger"></i> &nbsp; Log Out</a>
                    </div>
                </div>
            </nav>

            <div class="layout-container">

                <!-- content  -->
                <div class="layout-content">
                    <div class="container-fluid flex-grow-1 container-p-y">