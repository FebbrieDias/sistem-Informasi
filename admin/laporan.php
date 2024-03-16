<?php include 'header.php'; ?>

<h4 class="font-weight-bold py-3 mb-0">Laporan</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="sidenav-icon feather icon-inbox"></i>
        </li>
        <li class="breadcrumb-item">Laporan</li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12 mt-3">
        <form method="get" action="">
            <div class="row formtype">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Mulai tanggal</label>
                        <input type="date" autocomplete="off" value="<?= isset($_GET["tanggal_dari"]) ? $_GET["tanggal_dari"] : '' ?>" name="tanggal_dari" class="form-control" placeholder="Mulai tanggal" required="required">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Sampai tanggal</label>
                        <input type="date" autocomplete="off" value="<?= isset($_GET["tanggal_sampai"]) ? $_GET["tanggal_sampai"] : '' ?>" name="tanggal_sampai" class="form-control" placeholder="Sampai tanggal">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Kategori</label>

                        <select name="kategori" class="form-control" required="required">
                            <option value="semua">- Semua Kategori -</option>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                            <?php
                            $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while ($k = mysqli_fetch_array($kategori)) {
                            ?>
                                <option
                                    <?php
                                        if (isset($_GET['kategori'])) {
                                            if ($_GET['kategori'] == $k['kategori_id']) {
                                                echo "selected='selected'";
                                            }
                                        }
                                    ?>
                                    value="
                                        <?php
                                            echo $k['kategori_id'];
                                        ?>
                                    ">
                                    <?php
                                        echo $k['kategori'];
                                    ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <br>
                        <button type="submit" class="btn btn-success btn-md" style="border-radius: 20px;"><i class="feather icon-search"></i>&nbsp; Search</button> &nbsp;
                        <?php

                        if (isset($_GET["kategori"]) && isset($_GET["tanggal_sampai"]) && $_GET['tanggal_dari']) {
                            $tgl_dari = $_GET['tanggal_dari'];
                            $tgl_sampai = $_GET['tanggal_sampai'];
                            $kategori = $_GET['kategori'];
                                echo "
                                    <a href='laporan_print.php?tanggal_dari=$tgl_dari&tanggal_sampai=$tgl_sampai&kategori=$kategori' target='_blank' class='btn btn-md btn-info' style='border-radius: 20px;'><i class='feather icon-printer'></i> &nbsp PRINT</a>  
                                    <a href='laporan_pdf.php?tanggal_dari=$tgl_dari&tanggal_sampai=$tgl_sampai&kategori=$kategori' target='_blank' class='btn btn-md btn-secondary' style='border-radius: 20px;'><i class='feather icon-file-text'></i> &nbsp CETAK PDF</a>
                                ";
                            
                        } else {
                            echo "
                                <a href='#' class='btn btn-md btn-info' style='border-radius: 20px;'><i class='feather icon-printer'></i> &nbsp PRINT</a>  
                                <a href='#' class='btn btn-md btn-secondary' style='border-radius: 20px;'><i class='feather icon-file-text'></i> &nbsp CETAK PDF</a>
                            ";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mt-3">
    <div class="table-responsive">
        <table class="table card-table">
            <thead class="thead-light">
                <tr>
                    <th width="1%" rowspan="2">No</th>
                    <th width="10%" rowspan="2" class="text-center">Tanggal</th>
                    <th class="text-center">Klien</th>
                    <th rowspan="2">Kategori</th>
                    <th rowspan="2">Keterangan</th>
                    <th class="text-center">Pemasukan</th>
                    <th class="text-center">Pengeluaran</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    include '../koneksi.php';
                    $no = 1;
                    $total_pemasukan = 0;
                    $total_pengeluaran = 0;
                    if (isset($_GET["kategori"]) && isset($_GET["tanggal_sampai"]) && $_GET['tanggal_dari']) {
                        $tgl_dari = $_GET['tanggal_dari'];
                        $tgl_sampai = $_GET['tanggal_sampai'];
                        $kategori = $_GET['kategori'];
                        if ($kategori == "semua") {
                            $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
                        } elseif($kategori == "Pemasukan") {
                            $data = mysqli_query($koneksi, "SELECT * FROM transaksi where transaksi_jenis = 'Pemasukan' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
                        } elseif($kategori == "Pengeluaran") {
                            $data = mysqli_query($koneksi, "SELECT * FROM transaksi where transaksi_jenis = 'Pengeluaran' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
                        } else {
                            $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and kategori_id='$kategori' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
                        }


                        while ($d = mysqli_fetch_array($data)) {
                            if ($d['transaksi_jenis'] == "Pemasukan") {
                                $total_pemasukan += $d['transaksi_nominal'];
                            } elseif ($d['transaksi_jenis'] == "Pengeluaran") {
                                $total_pengeluaran += $d['transaksi_nominal'];
                            }
                ?>

                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo date('d-m-Y', strtotime($d['transaksi_tanggal'])); ?></td>
                            <td><?php echo $d['klien']; ?></td>

                            <td>
                                <?php
                                    if($kategori == 'Pemasukan') {
                                        echo 'Pemasukan';
                                    } elseif($kategori == 'Pengeluaran') {
                                        echo 'Pengeluaran';
                                    } else {
                                        echo $d['kategori'];
                                    }
                                ?>
                            </td>

                            <td><?php echo $d['transaksi_keterangan']; ?></td>
                            <td class="text-center">
                                <?php
                                if ($d['transaksi_jenis'] == "Pemasukan") {
                                    echo "Rp. " . number_format($d['transaksi_nominal']) . " ,-";
                                } else {
                                    echo "-";
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($d['transaksi_jenis'] == "Pengeluaran") {
                                    echo "Rp. " . number_format($d['transaksi_nominal']) . " ,-";
                                } else {
                                    echo "-";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <th colspan="5" class="text-right">Total</th>
                        <td class="text-center text-bold text-success"><?php echo "Rp. " . number_format($total_pemasukan) . " ,-"; ?></td>
                        <td class="text-center text-bold text-danger"><?php echo "Rp. " . number_format($total_pengeluaran) . " ,-"; ?></td>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-right">Saldo</th>
                        <td colspan="2" class="text-center text-bold text-white bg-info"><?php echo "Rp. " . number_format($total_pemasukan - $total_pengeluaran) . " ,-"; ?></td>
                    </tr>
                <?php
                } else { ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Silahkan cari data terlebih dahulu 
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>