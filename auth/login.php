<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>Login</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" href="../assets/dist/img/logo.ico" />

    <!-- Google fonts -->
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

    <!-- Libs -->
    <link rel="stylesheet" href="../assets/dist/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="../assets/dist/css/pages/authentication.css">
</head>

<body>
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <div class="authentication-wrapper">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 w-75 mx-auto my-auto">
                <div class="text-left py-5 px-5 bg-white" style="border-radius: 10px;">
                    <div class="d-flex justify-content-center">
                        <img class=" img-fluid" src="../assets/dist/img/logo.png" width="90" alt="logo">
                    </div>
                    <h4 class="mt-4 mb-4 text-center">Selamat Datang !</h4>
                    <h6 class="font-weight-medium text-center mt-1"><i class="feather icon-log-in"></i> Sign In</h6>
                    <?php

                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "gagal") {
                            echo "<div class='alert alert-danger alert-dismissible fade show'>
                                    <button type='button' class='close' data-dismiss='alert'>×</button>
                                    Login Gagal
                                </div>";
                        } else if ($_GET['alert'] == "logout") {
                            echo "<div class='alert alert-success alert-dismissible fade show'>
                                    <button type='button' class='close' data-dismiss='alert'>×</button>
                                    Logout Berhasil
                                </div>";
                        } else if ($_GET['alert'] == "belum_login") {
                            echo "<div class='alert alert-danger alert-dismissible fade show'>
                                    <button type='button' class='close' data-dismiss='alert'>×</button>
                                    Login terlebih dahulu !
                                </div>";
                        }
                    }

                    ?>
                    <form class="pt-2" action="./periksa_login.php" method="POST">
                        <div class="form-group mb-4 d-flex align-items-center justify-content-end">
                            <input type="text" class="form-control form-control-md pr-4" autofocus placeholder="Username" name="username" required autocomplete="off">
                            <i class="feather icon-user position-absolute"></i>
                        </div>
                        <div class="form-group mb-4 d-flex align-items-center justify-content-end">
                            <input type="password" class="form-control form-control-md pr-4" placeholder="Password" name="password" required autocomplete="off">
                            <i class="feather icon-lock position-absolute"></i>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-info btn-md font-weight-medium-btn" style="border-radius: 50px;">SIGN IN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Core scripts -->
    <script src="../assets/dist/js/pace.js"></script>
    <script src="../assets/dist/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/dist/libs/popper/popper.js"></script>
    <script src="../assets/dist/js/bootstrap.js"></script>
    <script src="../assets/dist/js/sidenav.js"></script>
    <script src="../assets/dist/js/layout-helpers.js"></script>
    <script src="../assets/dist/js/material-ripple.js"></script>

    <!-- Libs -->
    <script src="../assets/dist/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
</body>

</html>