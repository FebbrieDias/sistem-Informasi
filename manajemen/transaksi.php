<?php include 'header.php'; ?>

<div class="d-flex align-items-center justify-content-between mb-4 mt-2">
    <h4 class="font-weight-bold p-0 m-0">Transaksi</h4>
    <div class="text-muted small">
        <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><i class="feather icon-folder"></i></li>
            <li class="breadcrumb-item">Data Transaksi</li>
        </ol>
    </div>
</div>

<button type="button" class="btn btn-md btn-info mt-3 mb-4" style="border-radius: 20px;" data-toggle="modal" data-target="#tambah">
    <i class="feather icon-plus" style="font-size: 15px;"></i> Tambah Transaksi
</button>

<?php
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == "berhasil-tambah") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Transaksi berhasil ditambahkan !
            </div>
        ";
    } else if ($_GET['alert'] == "berhasil-edit") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Transaksi berhasil diedit !
            </div>
        ";
    } else if ($_GET['alert'] == "berhasil-hapus") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Transaksi berhasil dihapus !
            </div>
        ";
    }
}
?>

<div class="card mb-3">
    <!-- <div class="card-header"> -->
    <form action="transaksi_act.php" method="post">
        <div class="modal modal-fill-in fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-white" style="border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="feather icon-folder" style="font-size: 18px;"></i> &nbsp;
                            Tambah Transaksi
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" required="required" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="klien">Klien</label>
                            <input type="text" name="klien" required="required" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis</label>
                            <select name="jenis" class="custom-select">
                                <option selected disabled>- Pilih jenis transaksi -</option>
                                <option value="Pemasukan">Pemasukan</option>
                                <option value="Pengeluaran">Pengeluaran</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kategori</label>
                            <select class="custom-select" name="kategori">
                                <option selected disabled>- Pilih kategori -</option>
                                <?php
                                $kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori ASC");
                                while ($k = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="number" name="nominal" required="required" class="form-control" placeholder="Masukkan nominal ..">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Rekening Bank</label>
                            <select name="bank" class="custom-select" required="required">
                                <option value="">- Pilih -</option>
                                <?php
                                $bank = mysqli_query($koneksi, "SELECT * FROM bank");
                                while ($b = mysqli_fetch_array($bank)) {
                                ?>
                                    <option value="<?php echo $b['bank_id']; ?>"><?php echo $b['bank_nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="border-radius: 20px;" data-dismiss="modal">
                            <i class="feather icon-x-circle" style="font-size: 14px;"></i> &nbsp;
                            Tutup
                        </button>
                        <button type="submit" class="btn btn-info" style="border-radius: 20px;">
                            <i class="feather icon-save" style="font-size: 14px;"></i> &nbsp;
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- </div> -->
    <div class="table-responsive">
        <table class="table card-table " id="table-datatable">
            <thead class="thead-light">
                <tr>
                    <th width="1%">No</th>
                    <th width="10%" class="text-center">Tanggal</th>
                    <th class="text-center">Klien</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Pemasukan</th>
                    <th class="text-center">Pengeluaran</th>
                    <th width="10%" class="text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori order by transaksi_id desc");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $no++; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($d['transaksi_tanggal'])); ?></td>
                        <td><?php echo $d['klien'] ?></td>
                        <td><?php echo $d['kategori']; ?></td>
                        <td><?php echo $d['transaksi_keterangan']; ?></td>
                        <td>
                            <?php
                            if ($d['transaksi_jenis'] == "Pemasukan") {
                                echo "Rp. " . number_format($d['transaksi_nominal']) . " ,-";
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($d['transaksi_jenis'] == "Pengeluaran") {
                                echo "Rp. " . number_format($d['transaksi_nominal']) . " ,-";
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning btn-md text-white" style="border-radius: 20px;" data-toggle="modal" data-target="#edit_transaksi_<?php echo $d['transaksi_id'] ?>">
                                <i class=" feather icon-edit" style="font-size: 15px;"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-md text-white" style="border-radius: 20px;" data-toggle="modal" data-target="#hapus_transaksi_<?php echo $d['transaksi_id'] ?>">
                                <i class="feather icon-trash" style="font-size: 15px;"></i>
                            </button>

                            <form action="./transaksi_update.php" method="post">
                                <div class="modal modal-fill-in fade" id="edit_transaksi_<?php echo $d['transaksi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content bg-white" style="border-radius: 10px;">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">
                                                    <i class=" feather icon-edit-1" style="font-size: 18px;"></i> &nbsp;
                                                    Edit Transaksi
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['transaksi_id'] ?>">
                                                    <input type="date" name="tanggal" required="required" class="form-control" value="<?php echo $d['transaksi_tanggal'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Klien</label>
                                                    <input type="text" name="klien" required="required" class="form-control" value="<?php echo $d['klien'] ?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Jenis</label>
                                                    <select class="custom-select" name="jenis" required="required">
                                                        <option value="">- Pilih jenis transaksi -</option>
                                                        <option <?php if ($d['transaksi_jenis'] == "Pemasukan") {
                                                                    echo "selected='selected'";
                                                                } ?> value="Pemasukan">Pemasukan</option>
                                                        <option <?php if ($d['transaksi_jenis'] == "Pengeluaran") {
                                                                    echo "selected='selected'";
                                                                } ?> value="Pengeluaran">Pengeluaran</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nominal</label>
                                                    <input type="number" name="nominal" required="required" class="form-control" placeholder="Masukkan nominal .." value="<?php echo $d['transaksi_nominal'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea name='keterangan' class='form-control text-left' rows='3'><?= trim($d['transaksi_keterangan']) ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Rekening Bank</label>
                                                    <select name="bank" class="custom-select" required="required">
                                                        <option value="">- Pilih -</option>
                                                        <?php
                                                        $bank = mysqli_query($koneksi, "SELECT * FROM bank");
                                                        while ($b = mysqli_fetch_array($bank)) {
                                                        ?>
                                                            <option <?php if ($d['transaksi_bank'] == $b['bank_id']) {
                                                                        echo "selected='selected'";
                                                                    } ?> value="<?php echo $b['bank_id']; ?>"><?php echo $b['bank_nama']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" style="border-radius: 20px;" data-dismiss="modal">
                                                    <i class="feather icon-x-circle" style="font-size: 14px;"></i> &nbsp;
                                                    Tutup
                                                </button>
                                                <button type="submit" class="btn btn-info" style="border-radius: 20px;">
                                                    <i class="feather icon-save" style="font-size: 14px;"></i> &nbsp;
                                                    Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div id="hapus_transaksi_<?php echo $d['transaksi_id']; ?>" class="modal modal-fill-in fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-white" style="border-radius: 20px;">
                                        <div class="modal-body text-center">
                                            <i class="feather icon-alert-triangle text-danger" style="font-size: 40px;"></i>
                                            <div class="text-wrap">
                                                <h3 class="delete_class">Yakin ingin menghapus data ini ?</h3>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-white mr-2" style="border-radius: 10px;" data-dismiss="modal">Tutup</a>
                                                <a role="button" href="./transaksi_hapus.php?id=<?php echo $d['transaksi_id']; ?>" style="border-radius: 10px;" type="submit" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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