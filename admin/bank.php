<?php include 'header.php'; ?>

<div class="d-flex align-items-center justify-content-between mb-4 mt-2">
    <h4 class="font-weight-bold p-0 m-0">Bank</h4>
    <div class="text-muted small">
        <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><i class="feather icon-server"></i></li>
            <li class="breadcrumb-item">Data Bank</li>
        </ol>
    </div>
</div>

<button type="button" class="btn btn-md btn-info mt-3 mb-4" style="border-radius: 20px;" data-toggle="modal" data-target="#tambah">
    <i class="feather icon-plus" style="font-size: 15px;"></i> Tambah Bank
</button>

<?php
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == "berhasil-tambah") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Bank berhasil ditambahkan !
            </div>
        ";
    } else if ($_GET['alert'] == "berhasil-edit") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Bank berhasil diedit !
            </div>
        ";
    } else if ($_GET['alert'] == "berhasil-hapus") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Bank berhasil dihapus !
            </div>
        ";
    }
}
?>

<div class="card mb-3">
    <!-- <div class="card-header"> -->
    <form action="bank_act.php" method="post">
        <div class="modal modal-fill-in fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-white" style="border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="feather icon-server" style="font-size: 18px;"></i> &nbsp;
                            Tambah Bank
                        </h5>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Nama bank</label>
                            <input type="text" name="nama" required="required" class="form-control" placeholder="Nama bank ..">
                        </div>

                        <div class="form-group">
                            <label>Nama Pemilik Rekening</label>
                            <input type="text" name="pemilik" class="form-control" placeholder="Nama pemiliki rekening bank ..">
                        </div>

                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input type="text" name="nomor" class="form-control" placeholder="Nomor rekening bank ..">
                        </div>

                        <div class="form-group">
                            <label>Saldo Awal</label>
                            <input type="number" name="saldo" required="required" class="form-control" placeholder="Saldo bank ..">
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
                    <th>Nama Bank</th>
                    <th>Pemilik Rekening</th>
                    <th>Nomor Rekening</th>
                    <th>Saldo</th>
                    <th width="10%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM bank");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $no++; ?></td>
                        <td><?php echo $d['bank_nama']; ?></td>
                        <td><?php echo $d['bank_pemilik']; ?></td>
                        <td><?php echo $d['bank_nomor']; ?></td>
                        <td><?php echo "Rp. " . number_format($d['bank_saldo']) . " ,-"; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-md text-white" style="border-radius: 20px;" data-toggle="modal" data-target="#edit_bank_<?php echo $d['bank_id'] ?>">
                                <i class=" feather icon-edit" style="font-size: 15px;"></i>
                            </button>
                            <?php
                            if ($d['bank_id'] != 1) {
                            ?>
                                <button type="button" class="btn btn-danger btn-md text-white" style="border-radius: 20px;" data-toggle="modal" data-target="#hapus_bank_<?php echo $d['bank_id'] ?>">
                                    <i class="feather icon-trash" style="font-size: 15px;"></i>
                                </button>
                            <?php
                            }
                            ?>

                            <form action="./bank_update.php" method="post">
                                <div class="modal modal-fill-in fade" id="edit_bank_<?php echo $d['bank_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content bg-white" style="border-radius: 10px;">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">
                                                    <i class=" feather icon-edit-1" style="font-size: 18px;"></i> &nbsp;
                                                    Edit Bank
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                                    <label>Nama bank</label>
                                                    <input type="hidden" name="id" required="required" class="form-control" placeholder="Nama bank .." value="<?php echo $d['bank_id']; ?>">
                                                    <input type="text" name="nama" style="width:100%" required="required" class="form-control" placeholder="Nama bank .." value="<?php echo $d['bank_nama']; ?>">
                                                </div>

                                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                                    <label>Nama Pemilik Rekening</label>
                                                    <input type="text" name="pemilik" style="width:100%" class="form-control" placeholder="Nama pemiliki rekening bank .." value="<?php echo $d['bank_pemilik']; ?>">
                                                </div>

                                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                                    <label>Nomor Rekening</label>
                                                    <input type="text" name="nomor" style="width:100%" class="form-control" placeholder="Nomor rekening bank .." value="<?php echo $d['bank_nomor']; ?>">
                                                </div>

                                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                                    <label>Saldo Awal</label>
                                                    <input type="number" name="saldo" style="width:100%" required="required" class="form-control" placeholder="Saldo bank .." value="<?php echo $d['bank_saldo']; ?>">
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

                            <div id="hapus_bank_<?php echo $d['bank_id'] ?>" class="modal modal-fill-in fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-white" style="border-radius: 20px;">
                                        <div class="modal-body text-center">
                                            <i class="feather icon-alert-triangle text-danger" style="font-size: 40px;"></i>
                                            <div class="text-wrap">
                                                <h3 class="delete_class">Yakin ingin menghapus data ini ?</h3>
                                                <p class="small mt-2">Semua data yang berhubungan dengan akun bank ini akan dipindah ke akun bank default.</p>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-white mr-2" style="border-radius: 10px;" data-dismiss="modal">Tutup</a>
                                                <a role="button" href="./bank_hapus.php?id=<?php echo $d['bank_id'] ?>" style="border-radius: 10px;" type="submit" class="btn btn-danger">Hapus</a>
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