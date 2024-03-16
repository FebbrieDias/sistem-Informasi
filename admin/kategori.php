<?php include 'header.php'; ?>

<div class="d-flex align-items-center justify-content-between mb-4 mt-2">
    <h4 class="font-weight-bold p-0 m-0">Kategori</h4>
    <div class="text-muted small">
        <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><i class="feather icon-folder"></i></li>
            <li class="breadcrumb-item">Data Kategori</li>
        </ol>
    </div>
</div>

<button type="button" class="btn btn-md btn-info mt-3 mb-4" style="border-radius: 20px;" data-toggle="modal" data-target="#tambah">
    <i class="feather icon-plus" style="font-size: 15px;"></i> Tambah Kategori
</button>

<?php
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == "berhasil-tambah") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Kategori berhasil ditambahkan !
            </div>
        ";
    } else if ($_GET['alert'] == "berhasil-edit") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Kategori berhasil diedit !
            </div>
        ";
    } else if ($_GET['alert'] == "berhasil-hapus") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Kategori berhasil dihapus !
            </div>
        ";
    }
}
?>

<div class="card mb-3">
    <!-- <div class="card-header"> -->
    <form action="kategori_act.php" method="post">
        <div class="modal modal-fill-in fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-white" style="border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="feather icon-folder" style="font-size: 18px;"></i> &nbsp;
                            Tambah Kategori
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama kategori</label>
                            <input type="text" name="kategori" required="required" class="form-control" placeholder="Nama kategori ..">
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
        <table class="table card-table" id="table-datatable">
            <thead class="thead-light">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama</th>
                    <th width="10%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori ASC");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $no++; ?></td>
                        <td><?php echo $d['kategori']; ?></td>
                        <td>
                            <?php
                            if ($d['kategori_id'] != 1) {
                            ?>
                                <button type="button" class="btn btn-warning btn-md text-white" style="border-radius: 20px;" data-toggle="modal" data-target="#edit_kategori_<?php echo $d['kategori_id'] ?>">
                                    <i class=" feather icon-edit" style="font-size: 15px;"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-md text-white" style="border-radius: 20px;" data-toggle="modal" data-target="#hapus_kategori_<?php echo $d['kategori_id'] ?>">
                                    <i class="feather icon-trash" style="font-size: 15px;"></i>
                                </button>
                            <?php
                            }
                            ?>

                            <form action="./kategori_update.php" method="post">
                                <div class="modal modal-fill-in fade" id="edit_kategori_<?php echo $d['kategori_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content bg-white" style="border-radius: 10px;">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">
                                                    <i class=" feather icon-edit-1" style="font-size: 18px;"></i> &nbsp;
                                                    Edit Kategori
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group" style="margin-bottom:15px;width: 100%">
                                                    <label>Nama kategori</label>
                                                    <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d['kategori_id']; ?>">
                                                    <input type="text" name="kategori" style="width:100%" required="required" class="form-control" placeholder="Nama kategori .." value="<?php echo $d['kategori']; ?>">
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

                            <div id="hapus_kategori_<?php echo $d['kategori_id']; ?>" class="modal modal-fill-in fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-white" style="border-radius: 20px;">
                                        <div class="modal-body text-center">
                                            <i class="feather icon-alert-triangle text-danger" style="font-size: 40px;"></i>
                                            <div class="text-wrap">
                                                <h3 class="delete_class">Yakin ingin menghapus data ini ?</h3>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-white mr-2" style="border-radius: 10px;" data-dismiss="modal">Tutup</a>
                                                <a role="button" href="./kategori_hapus.php?id=<?php echo $d['kategori_id']; ?>" style="border-radius: 10px;" type="submit" class="btn btn-danger">Hapus</a>
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