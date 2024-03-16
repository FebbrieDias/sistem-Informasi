<?php include 'header.php'; ?>

<div class="d-flex align-items-center justify-content-between mb-4 mt-2">
    <h4 class="font-weight-bold p-0 m-0">Hutang</h4>
    <div class="text-muted small">
        <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><i class="feather icon-credit-card"></i></li>
            <li class="breadcrumb-item">Catatan Hutang</li>
        </ol>
    </div>
</div>

<button type="button" class="btn btn-md btn-info mt-3 mb-4" style="border-radius: 20px;" data-toggle="modal" data-target="#tambah">
    <i class="feather icon-plus" style="font-size: 15px;"></i> Tambah Hutang
</button>

<?php
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == "berhasil-tambah") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Hutang berhasil ditambahkan !
            </div>
        ";
    } else if ($_GET['alert'] == "berhasil-edit") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Hutang berhasil diedit !
            </div>
        ";
    } else if ($_GET['alert'] == "berhasil-hapus") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Hutang berhasil dihapus !
            </div>
        ";
    }
}
?>

<div class="card mb-3">
    <!-- <div class="card-header"> -->
    <form action="hutang_act.php" method="post">
        <div class="modal modal-fill-in fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-white" style="border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="sidenav-icon feather icon-credit-card"></i> &nbsp;
                            Tambah Hutang
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" required="required" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="number" name="nominal" required="required" class="form-control" placeholder="Masukkan Nominal ..">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="4"></textarea>
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
                    <!-- <th width="1%">Kode</th> -->
                    <th width="10%">Tanggal</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th width="10%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM hutang");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <!-- <td>HTG-000<?php echo $no++; ?></td> -->
                        <td><?php echo date('d-m-Y', strtotime($d['hutang_tanggal'])); ?></td>
                        <td><?php echo $d['hutang_keterangan']; ?></td>
                        <td><?php echo "Rp. " . number_format($d['hutang_nominal']) . " ,-"; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-md text-white" style="border-radius: 20px;" data-toggle="modal" data-target="#edit_hutang_<?php echo $d['hutang_id'] ?>">
                                <i class=" feather icon-edit" style="font-size: 15px;"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-md text-white" style="border-radius: 20px;" data-toggle="modal" data-target="#hapus_hutang_<?php echo $d['hutang_id'] ?>">
                                <i class="feather icon-trash" style="font-size: 15px;"></i>
                            </button>

                            <form action="./hutang_update.php" method="post">
                                <div class="modal modal-fill-in fade" id="edit_hutang_<?php echo $d['hutang_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content bg-white" style="border-radius: 10px;">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">
                                                    <i class=" feather icon-edit-1" style="font-size: 18px;"></i> &nbsp;
                                                    Edit Hutang
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group" style="width:100%; margin-bottom:20px">
                                                    <label>Tanggal</label>
                                                    <input type="hidden" name="id" value="<?php echo $d['hutang_id'] ?>">
                                                    <input type="date" name="tanggal" required="required" class="form-control" value="<?php echo $d['hutang_tanggal'] ?>">
                                                </div>

                                                <div class="form-group" style="width:100%; margin-bottom:20px">
                                                    <label>Nominal</label>
                                                    <input type="number" name="nominal" required="required" class="form-control" placeholder="Masukkan Nominal .." value="<?php echo $d['hutang_nominal'] ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea name="keterangan" class="form-control" rows="4"><?php echo $d['hutang_keterangan'] ?></textarea>
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

                            <div id="hapus_hutang_<?php echo $d['hutang_id']; ?>" class="modal modal-fill-in fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-white" style="border-radius: 20px;">
                                        <div class="modal-body text-center">
                                            <i class="feather icon-alert-triangle text-danger" style="font-size: 40px;"></i>
                                            <div class="text-wrap">
                                                <h3 class="delete_class">Yakin ingin menghapus data ini ?</h3>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-white mr-2" style="border-radius: 10px;" data-dismiss="modal">Tutup</a>
                                                <a role="button" href="./hutang_hapus.php?id=<?php echo $d['hutang_id']; ?>" style="border-radius: 10px;" type="submit" class="btn btn-danger">Hapus</a>
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