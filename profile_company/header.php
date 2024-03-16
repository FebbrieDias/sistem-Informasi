<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CV. Dias Bersaudara</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/dist/vendor/aos/aos.css" rel="stylesheet">
    <!-- <link href="assets/dist/vendor/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
    <!-- <link href="assets/dist/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="assets/dist/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/dist/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/dist/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/dist/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="assets/dist/css/style.css" rel="stylesheet">

    <style>
        .portfolio-img {
            height: 300px;
            overflow: hidden;
        }
        .portfolio-img img {
            width: 100%;
            margin: auto;
        }
        .Navbar-Header {
            padding: 13px 80px;
            width: 100%;
            position: fixed;
            z-index: 10;
            background-color: #37517e;
            display: flex;
            align-items: center;
            justify-content: space-between;
            letter-spacing: 0.03em;
        }
        .Navbar-Header h1 {
            font-weight: 600;
            font-size: 1.5rem;
            margin: auto 0;
        }
        .Navbar-Header h1 a {
            color: white;
        }
        .Navbar-Header ul {
            display: flex;
            gap: 1rem;
            align-items: center;
            font-size: 1.125rem;
            font-weight: 500;
            margin: auto 0;
        }
        .Navbar-Header ul li {
            list-style: none;
        }
        .Navbar-Header ul li a {
            color: white;
            transition: .25s all;
        }
        .Navbar-Header ul li a:hover {
            color: #47b2e4;
        }

        .Why-Us-Section {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            text-align: justify;
        }

        .fontHelveticaRegular {
            font-family: Helvetica, sans-serif;
            font-size: 16px !important;
        }

        @media only screen and (max-width: 768px) {
            .Navbar-Header ul {
                position: absolute;
                right: 0;
                top: 0;
                bottom: 0;
                width: 50vw;
                height: 100vh;
                background-color: salmon;
                flex-direction: column;
                z-index: 1;
            }
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <!-- <nav class="Navbar-Header">
        <h1><a href="index.html">CV. Dias Bersaudara</a></h1>

        <ul>
            <li><a href="#hero">Beranda</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#team">Tim</a></li>
            <li><a href="#contact">Kontak</a></li>
            <li><a href="auth/login.php"><img src="assets/dist/img/logo.png" width="35" height="35" title="CV. DIAS BERSAUDARA" alt="CV. DIAS BERSAUDARA" /></a></li>
        </ul>
    </nav> -->

    <nav class="navbar navbar-expand-lg position-fixed" style="background-color: #37517e; z-index: 10; width: 100vw;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#hero" style="font-weight: 700; font-size: 1.7rem;">CV. Dias Bersaudara</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto me-3">
                    <a style="font-size: 1.2rem;" class="nav-link" href="#hero">Beranda</a>
                    <a style="font-size: 1.2rem;" class="nav-link" href="#about">Tentang</a>
                    <a style="font-size: 1.2rem;" class="nav-link" href="#services">Services</a>
                    <a style="font-size: 1.2rem;" class="nav-link" href="#portfolio">Portfolio</a>
                    <a style="font-size: 1.2rem;" class="nav-link" href="#team">Tim</a>
                    <a style="font-size: 1.2rem;" class="nav-link" href="#contact">Kontak</a>
                    <a href="auth/login.php" class="me-3"><img src="assets/dist/img/logo.png" width="35" height="35" title="CV. DIAS BERSAUDARA" alt="CV. DIAS BERSAUDARA" /></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a class="text-sm-start" href="index.html">CV. Dias Bersaudara</a></h1>

            <nav id="navbar" class="navbar">
                <ul style="color: black;">
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#team">Tim</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/login.php">
                            <img src="assets/dist/img/logo.png" alt="" width="35" height="35" class="rounded-circle" title="CV. DIAS BERSAUDARA">
                        </a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header> -->
