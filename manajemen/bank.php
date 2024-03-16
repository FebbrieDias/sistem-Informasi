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
    <div class="table-responsive">
        <table class="table card-table " id="table-datatable">
            <thead class="thead-light">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama Bank</th>
                    <th>Pemilik Rekening</th>
                    <th>Nomor Rekening</th>
                    <th>Saldo</th>
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
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>