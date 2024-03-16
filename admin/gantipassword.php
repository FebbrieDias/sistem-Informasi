<?php include 'header.php'; ?>

<div class="d-flex align-items-center justify-content-between mb-4 mt-2">
  <h4 class="font-weight-bold p-0 m-0">Ganti Password</h4>
  <div class="text-muted small">
    <ol class="breadcrumb p-0 m-0">
      <li class="breadcrumb-item"><i class="feather icon-lock"></i></li>
      <li class="breadcrumb-item">Ganti Password</li>
    </ol>
  </div>
</div>


<?php
if (isset($_GET['alert'])) {
  if ($_GET['alert'] == "berhasil") {
    echo "
            <div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Password Berhasil Diubah !
            </div>
        ";
  } else {
    echo "
            <div class='alert alert-danger alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Password Gagal Diubah !
            </div>
        ";
  }
}
?>

<div class="card mb-4">
  <h6 class="card-header">Ganti Password</h6>
  <div class="card-body">
    <form action="gantipassword_act.php" method="post">
      <div class="form-group">
        <label class="form-label">Password Baru</label>
        <input type="password" class="form-control" placeholder="Masukkan password baru ...">
        <div class="clearfix"></div>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
</div>


<?php include 'footer.php'; ?>