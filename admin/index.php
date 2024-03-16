<?php include 'header.php'; ?>

<div class="row mb-2">
    <div class="col-lg-3">
        <h4 class="font-weight-bold py-2 mb-0">Dashboard</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="feather icon-home"></i></li>
                <li class="breadcrumb-item">Control Panel</li>
            </ol>
        </div>
    </div>
    <div class="d-flex col-lg-9 text-center col-md-6 pl-lg-0">
        <div class="card w-100">
            <div class="card-body small-box mx-auto">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-solid fa-dollar-sign text-info" style="font-size: 40px;"></i>
                    </div>
                    <div class="col">
                        <?php
                        $query = mysqli_query($koneksi, "SELECT sum(bank_saldo) as total_saldo FROM bank");
                        $p = mysqli_fetch_assoc($query);
                        ?>
                        <h6 style="margin-right: 60px;" class="mb-0 text-muted"><span class="text-info">Saldo</span> Keseluruhan</h6>
                        <h2 class="mt-3 mb-0"><?php echo "Rp. " . number_format($p['total_saldo']) . " ,-" ?>
                            <i class="ion ion-md-arrow-round-up ml-3 text-info"></i>
                            <i class="ion ion-md-arrow-round-down text-info"></i>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card d-flex w-100 mb-2">
            <div class="row no-gutters row-bordered row-border-light h-100">
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="lnr lnr-pie-chart display-4 text-success"></div>
                            </div>
                            <div class="col">
                                <?php
                                $tanggal = date('Y-m-d');
                                $pemasukan = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and transaksi_tanggal='$tanggal'");
                                $p = mysqli_fetch_assoc($pemasukan);
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-success">Pemasukan</span> Hari ini</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?><i class="ion ion-md-arrow-round-up ml-3 text-success"></i></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="lnr lnr-pie-chart display-4 text-success"></div>
                            </div>
                            <div class="col">
                                <?php
                                $year = date('Y');
                                $bulan = date('m');
                                $pemasukan = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and month(transaksi_tanggal)='$bulan' and year(transaksi_tanggal)='$year'");
                                $p = mysqli_fetch_assoc($pemasukan);
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-success">Pemasukan</span> Bulan ini</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?><i class="ion ion-md-arrow-round-up ml-3 text-success"></i></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="lnr lnr-pie-chart display-4 text-success"></div>
                            </div>
                            <div class="col">
                                <?php
                                $tahun = date('Y');
                                $pemasukan = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and year(transaksi_tanggal)='$tahun'");
                                $p = mysqli_fetch_assoc($pemasukan);
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-success">Pemasukan</span> Tahun ini</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?><i class="ion ion-md-arrow-round-up ml-3 text-success"></i></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="lnr lnr-pie-chart display-4 text-success"></div>
                            </div>
                            <div class="col">
                                <?php
                                $pemasukan = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan'");
                                $p = mysqli_fetch_assoc($pemasukan);
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-success">Pemasukan</span> Seluruh</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?><i class="ion ion-md-arrow-round-up ml-3 text-success"></i></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card d-flex w-100 mb-2">
            <div class="row no-gutters row-bordered row-border-light h-100">
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="feather icon-activity display-4 text-danger"></i>
                            </div>
                            <div class="col">
                                <?php
                                $tanggal = date('Y-m-d');
                                $pengeluaran = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and transaksi_tanggal='$tanggal'");
                                $p = mysqli_fetch_assoc($pengeluaran);
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-danger">Pengeluaran</span> Hari ini</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?><i class="ion ion-md-arrow-round-down ml-3 text-danger"></i></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="feather icon-activity display-4 text-danger"></i>
                            </div>
                            <div class="col">
                                <?php
                                $year = date('Y');
                                $bulan = date('m');
                                $pengeluaran = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and month(transaksi_tanggal)='$bulan' and year(transaksi_tanggal)='$year'");
                                $p = mysqli_fetch_assoc($pengeluaran);
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-danger">Pengeluaran</span> Bulan ini</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?><i class="ion ion-md-arrow-round-down ml-3 text-danger"></i></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="feather icon-activity display-4 text-danger"></i>
                            </div>
                            <div class="col">
                                <?php
                                $tahun = date('Y');
                                $pengeluaran = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and year(transaksi_tanggal)='$tahun'");
                                $p = mysqli_fetch_assoc($pengeluaran);
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-danger">Pengeluaran</span> Tahun ini</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?><i class="ion ion-md-arrow-round-down ml-3 text-danger"></i></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <i class="feather icon-activity display-4 text-danger"></i>
                            </div>
                            <div class="col">
                                <?php
                                $pengeluaran = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran'");
                                $p = mysqli_fetch_assoc($pengeluaran);
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-danger">Pengeluaran</span> Seluruh</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?><i class="ion ion-md-arrow-round-down ml-3 text-danger"></i></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card d-flex w-100 mb-4">
            <div class="row no-gutters row-bordered row-border-light h-100">
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text text-warning"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            </div>
                            <div class="col">
                                <?php
                                $tanggal = date('Y-m-d');
                                $hutang = mysqli_query($koneksi, "SELECT sum(hutang_nominal) as total_hutang FROM hutang WHERE hutang_tanggal='$tanggal'");
                                $piutang = mysqli_query($koneksi, "SELECT sum(piutang_nominal) as total_piutang FROM piutang WHERE piutang_tanggal='$tanggal'");

                                $hutang_result = mysqli_fetch_assoc($hutang);
                                $piutang_result = mysqli_fetch_assoc($piutang);
    
                                $total_hutang = $hutang_result['total_hutang'];
                                $total_piutang = $piutang_result['total_piutang'];
                                $total = $total_hutang + $total_piutang;
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-warning">Hutang Piutang</span> Hari ini</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($total) . " ,-" ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text text-warning"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            </div>
                            <div class="col">
                                <?php
                                $year = date('Y');
                                $bulan = date('m');
                                $hutang = mysqli_query($koneksi, "SELECT sum(hutang_nominal) as total_hutang FROM hutang WHERE month(hutang_tanggal)='$bulan' and year(hutang_tanggal)='$year'");
                                $piutang = mysqli_query($koneksi, "SELECT sum(piutang_nominal) as total_piutang FROM piutang WHERE month(piutang_tanggal)='$bulan' and year(piutang_tanggal)='$year'");

                                $hutang_result = mysqli_fetch_assoc($hutang);
                                $piutang_result = mysqli_fetch_assoc($piutang);

                                $total_hutang = $hutang_result['total_hutang'];
                                $total_piutang = $piutang_result['total_piutang'];
                                $total = $total_hutang + $total_piutang;
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-warning">Hutang Piutang</span> Bulan ini</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($total) . " ,-"; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text text-warning"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            </div>
                            <div class="col">
                                <?php
                                $tahun = date('Y');
                                $hutang_query = mysqli_query($koneksi, "SELECT sum(hutang_nominal) as total_hutang FROM hutang WHERE year(hutang_tanggal)='$tahun'");
                                $piutang_query = mysqli_query($koneksi, "SELECT sum(piutang_nominal) as total_piutang FROM piutang WHERE year(piutang_tanggal)='$tahun'");

                                $hutang_result = mysqli_fetch_assoc($hutang_query);
                                $piutang_result = mysqli_fetch_assoc($piutang_query);

                                $total_hutang = $hutang_result['total_hutang'];
                                $total_piutang = $piutang_result['total_piutang'];
                                $total = $total_hutang + $total_piutang;
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-warning">Hutang Piutang</span> Tahun ini</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($total) . " ,-" ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex col-md-6 col-lg-3 align-items-center">
                    <div class="card-body small-box">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text text-warning"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            </div>
                            <div class="col">
                                <?php
                                $hutang_query = mysqli_query($koneksi, "SELECT sum(hutang_nominal) as total_hutang FROM hutang");
                                $piutang_query = mysqli_query($koneksi, "SELECT sum(piutang_nominal) as total_piutang FROM piutang");

                                $hutang_result = mysqli_fetch_assoc($hutang_query);
                                $piutang_result = mysqli_fetch_assoc($piutang_query);

                                $total_hutang = $hutang_result['total_hutang'];
                                $total_piutang = $piutang_result['total_piutang'];
                                $total = $total_hutang + $total_piutang;
                                ?>
                                <h6 class="mb-0 text-muted"><span class="text-warning">Hutang Piutang</span> Seluruh</h6>
                                <h5 class="mt-3 mb-0"><?php echo "Rp. " . number_format($total) . " ,-" ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <div class="card mb-4">
            <div class="card-header with-elements">
                <h6 class="card-header-title mb-0">Grafik Data Pemasukan & Pengeluaran <b>PerBulan</b></h6>
            </div>
            <div class="card-body">
                <div id="grafik1"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card mb-4">
            <div class="card-header with-elements">
                <h6 class="card-header-title mb-0">Grafik Data Pemasukan & Pengeluaran <b>PerTahun</b></h6>
            </div>
            <div class="card-body">
                <div id="grafik2"></div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>