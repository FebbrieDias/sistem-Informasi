<?php include 'header.php'; ?>

<div class="d-flex align-items-center justify-content-between mb-4 mt-2">
    <h4 class="font-weight-bold p-0 m-0">Pengguna</h4>
    <div class="text-muted small">
        <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><i class="feather icon-users"></i></li>
            <li class="breadcrumb-item">Data Pengguna</li>
        </ol>
    </div>
</div>

<button type="button" class="btn btn-md btn-info mt-3 mb-4" style="border-radius: 20px;" data-toggle="modal" data-target="#tambah">
    <i class="feather icon-plus" style="font-size: 15px;"></i> Tambah Pengguna
</button>

<?php
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == "berhasil-tambah") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Pengguna berhasil ditambahkan !
            </div>
        ";
    } else if ($_GET['alert'] == "gagal-tambah") {
        echo "
            <div class='alert alert-danger alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Pengguna gagal ditambahkan !
            </div>
        ";
    } else if ($_GET['alert'] == "berhasil-edit") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Pengguna berhasil diedit !
            </div>
        ";
    } else if ($_GET['alert'] == "gagal-edit") {
        echo "
            <div class='alert alert-danger alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Pengguna gagal diedit !
            </div>
        ";
    } else if ($_GET['alert'] == "berhasil-hapus") {
        echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Pengguna berhasil dihapus !
            </div>
        ";
    }
}
?>

<div class="card mb-3">
    <!-- <div class="card-header"> -->
    <form action="user_act.php" method="post" enctype="multipart/form-data">
        <div class="modal modal-fill-in fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-white" style="border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="sidenav-icon feather icon-users" style="font-size: 18px;"></i> &nbsp;
                            Tambah Pengguna
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama ..">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required="required" placeholder="Masukkan Username ..">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" min="5" placeholder="Masukkan Password ..">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Level</label>
                            <select class="custom-select" name="level" required="required">
                                <option value=""> - Pilih Level - </option>
                                <option value="administrator"> Administrator </option>
                                <option value="manajemen"> Manajemen </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label w-100">Foto</label>
                            <div class="">
                                <img src="" style="width: 40px;height: auto; border-radius: 50%; border: 1px solid grey;" class="mt-2 img_preview">
                                <div class="file-custom-input">
                                    <input type="file" name="foto" class="select-image">
                                    <div class="text-file-custom-input">
                                        <i class="feather icon-upload-cloud"></i>
                                        Upload gambar
                                    </div>
                                </div>
                            </div>
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
                    <th width="10%" class="text-center">Foto</th>
                    <th>Nama</th>
                    <th>Ussername</th>
                    <th>Level</th>
                    <th width="10%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM user");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>
                            <center>
                                <?php if ($d['user_foto'] == "") { ?>
                                    <img src="../assets/dist/img/sistem/user.png" style="width: 40px;height: auto; border-radius: 50%;">
                                <?php } else { ?>
                                    <img src="../assets/dist/img/user/<?php echo $d['user_foto'] ?>" style="width: 40px;height: auto; border-radius: 50%;">
                                <?php } ?>
                            </center>
                        </td>
                        <td><?php echo $d['user_nama']; ?></td>
                        <td><?php echo $d['user_username']; ?></td>
                        <td><?php echo $d['user_level']; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-md text-white" style="border-radius: 20px;" data-toggle="modal" data-target="#user_edit_<?php echo $d['user_id']  ?>">
                                <i class=" feather icon-edit" style="font-size: 15px;"></i>
                            </button>
                            <?php
                            if ($d['user_id'] != 1) {
                            ?>
                                <button type="button" class="btn btn-danger btn-md text-white" style="border-radius: 20px;" data-toggle="modal" data-target="#user_hapus_<?php echo $d['user_id']  ?>">
                                    <i class="feather icon-trash" style="font-size: 15px;"></i>
                                </button>
                            <?php
                            }
                            ?>

                            <form action="./user_update.php" method="post" enctype="multipart/form-data">
                                <div class="modal modal-fill-in fade" id="user_edit_<?php echo $d['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content bg-white" style="border-radius: 10px;">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">
                                                    <i class=" feather icon-edit-1" style="font-size: 18px;"></i> &nbsp;
                                                    Edit Pengguna
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="<?php echo $d['user_nama'] ?>" required="required">
                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $d['user_id'] ?>" required="required">
                                                </div>

                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="username" value="<?php echo $d['user_username'] ?>" required="required">
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" min="5" placeholder="masukkan password baru">
                                                    <p class="small text-danger">Kosongkan Jika tidak ingin di ganti</p>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Level</label>
                                                    <select class="custom-select" name="level" required="required">
                                                        <option value=""> - Pilih Level - </option>
                                                        <option <?php if ($d['user_level'] == "administrator") {
                                                                    echo "selected='selected'";
                                                                } ?> value="administrator"> Administrator </option>
                                                        <option <?php if ($d['user_level'] == "manajemen") {
                                                                    echo "selected='selected'";
                                                                } ?> value="manajemen"> Manajemen </option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label w-100">Foto</label>
                                                    <div class="">
                                                        <?php if ($d['user_foto'] == "") { ?>
                                                            <img src="../assets/dist/img/sistem/user.png" style="width: 40px;height: auto; border-radius: 50%;" class="mt-2 img_preview">
                                                        <?php } else { ?>
                                                            <img src="../assets/dist/img/user/<?php echo $d['user_foto'] ?>" style="width: 40px;height: auto; border-radius: 50%;" class="mt-2 img_preview">
                                                        <?php } ?>
                                                        <div class="file-custom-input">
                                                            <input type="file" name="foto" class="select-image">
                                                            <div class="text-file-custom-input">
                                                                <i class="feather icon-upload-cloud"></i>
                                                                Upload gambar
                                                            </div>
                                                        </div>
                                                        <p class="form-text text-danger small">Kosongkan jika tidak ingin diganti.</p>
                                                    </div>
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
                            <div id="user_hapus_<?php echo $d['user_id']; ?>" class="modal modal-fill-in fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-white" style="border-radius: 20px;">
                                        <div class="modal-body text-center">
                                            <i class="feather icon-alert-triangle text-danger" style="font-size: 40px;"></i>
                                            <div class="text-wrap">
                                                <h3 class="delete_class">Yakin ingin menghapus data pengguna ini ?</h3>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#" class="btn btn-white mr-2" style="border-radius: 10px;" data-dismiss="modal">Tutup</a>
                                                <a role="button" href="./user_hapus.php?id=<?php echo $d['user_id']; ?>" style="border-radius: 10px;" type="submit" class="btn btn-danger">Hapus</a>
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