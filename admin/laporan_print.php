 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Laporan Aplikasi Keuangan</title>
 	<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

 </head>
 <body>

 	<div style="padding: 20px; display: flex; gap: 50px; font-family: 'Times New Roman', Times, serif;">
		<img src="../gambar/DB.jpeg" style="width: 150px; height: 150px; margin-top: 25px;">

		<div>
			<h1 style="font-weight: bold; font-size: 28px;">CV. DIAS BERSAUDARA</h1>
			<div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr));">
				<div>
					<p>Jl. Raya Mustikasari RT 01/RW 04</p>
					<p>Kamp.Babakan Kel. Mustikasari,</p>
					<p>Kec. Mustikajaya, Bekasi 17117</p>
				</div>
				<div>
					<p>Handphone  : +62 081386430720</p>
					<p>Whatsapp     : +62 081386430720</p>
					<p>E-mail           : sunardi.engineering@gmail.com</p>
				</div>
			</div>
			<p>Jasa bubut autolathe, Bubut Turret, Bor, Tap, Slotting, Snay, Tap dll</p>
		</div>
	</div>

	<hr style="border-bottom: 2px solid black; width: 90%; margin: auto;">
 	<center>
 		<h4>LAPORAN KEUANGAN</h4>
 		<!-- <h4>SISTEM INFORMASI KEUANGAN</h4> -->
 	</center>


 	<?php 
 	include '../koneksi.php';
 	if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['kategori'])){
 		$tgl_dari = $_GET['tanggal_dari'];
 		$tgl_sampai = $_GET['tanggal_sampai'];
 		$kategori = $_GET['kategori'];
 		?>

 		<div class="row">
 			<div class="col-lg-6">
 				<table class="table table-bordered">
 					<tr>
 						<th width="30%">DARI TANGGAL</th>
 						<th width="1%">:</th>
 						<td><?php echo date('d-m-Y',strtotime($tgl_dari)); ?></td>
 					</tr>
 					<tr>
 						<th>SAMPAI TANGGAL</th>
 						<th>:</th>
 						<td><?php echo date('d-m-Y',strtotime($tgl_sampai)); ?></td>
 					</tr>
 					<tr>
 						<th>KATEGORI</th>
 						<th>:</th>
 						<td>
 							<?php 
 							if($kategori == "semua"){
 								echo "SEMUA KATEGORI";
 							} elseif($kategori == 'Pemasukan') {
 								$k = mysqli_query($koneksi,"select * from transaksi where transaksi_jenis='Pemasukan'");
 								$kk = mysqli_fetch_assoc($k);
 								echo $kk['transaksi_jenis'];
							} elseif($kategori == 'Pengeluaran') {
 								$k = mysqli_query($koneksi,"select * from transaksi where transaksi_jenis='Pengeluaran'");
 								$kk = mysqli_fetch_assoc($k);
 								echo $kk['transaksi_jenis'];
							} else{
 								$k = mysqli_query($koneksi,"select * from kategori where kategori_id='$kategori'");
 								$kk = mysqli_fetch_assoc($k);
 								echo $kk['kategori'];
 							}
 							?>

 						</td>
 					</tr>
 				</table>

 			</div>
 		</div>

 		<div class="table-responsive">
 			<table class="table table-bordered table-striped">
 				<thead>
 					<tr>
 						<th width="1%" rowspan="2">NO</th>
 						<th width="10%" rowspan="2" class="text-center">TANGGAL</th>
 						<th rowspan="2" class="text-center">KLIEN</th>
 						<th rowspan="2" class="text-center">KATEGORI</th>
 						<th rowspan="2" class="text-center">KETERANGAN</th>
 						<th colspan="2" class="text-center">JENIS</th>
 					</tr>
 					<tr>
 						<th class="text-center">PEMASUKAN</th>
 						<th class="text-center">PENGELUARAN</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php 
 					
 					$no=1;
 					$total_pemasukan=0;
 					$total_pengeluaran=0;
 					if($kategori == "semua"){
 						$data = mysqli_query($koneksi,"SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
 					} elseif($kategori == 'Pemasukan') {
 						$data = mysqli_query($koneksi, "SELECT * FROM transaksi where transaksi_jenis = 'Pemasukan' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
					} elseif($kategori == 'Pengeluaran') {
						$data = mysqli_query($koneksi, "SELECT * FROM transaksi where transaksi_jenis = 'Pengeluaran' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
					} else{
 						$data = mysqli_query($koneksi,"SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and kategori_id='$kategori' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
 					}
 					while($d = mysqli_fetch_array($data)){

 						if($d['transaksi_jenis'] == "Pemasukan"){
 							$total_pemasukan += $d['transaksi_nominal'];
 						}elseif($d['transaksi_jenis'] == "Pengeluaran"){
 							$total_pengeluaran += $d['transaksi_nominal'];
 						}
 						?>
 						<tr>
 							<td class="text-center"><?php echo $no++; ?></td>
 							<td class="text-center"><?php echo date('d-m-Y', strtotime($d['transaksi_tanggal'])); ?></td>
 							<td><?php echo $d['klien']; ?></td>
							 
							<?php
								if($kategori == 'Pemasukan') {
							?>
								<td><?php echo 'Pemasukan'; ?></td>
							<?php
							} elseif($kategori == 'Pengeluaran') {
							?>
									<td><?php echo 'Pengeluaran'; ?></td>
							<?php
								} else {
							?>
									<td><?php echo $d['kategori']; ?></td>
							<?php
								}
                            ?>

 							<td><?php echo $d['transaksi_keterangan']; ?></td>
 							<td class="text-center">
 								<?php 
 								if($d['transaksi_jenis'] == "Pemasukan"){
 									echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
 								}else{
 									echo "-";
 								}
 								?>
 							</td>
 							<td class="text-center">
 								<?php 
 								if($d['transaksi_jenis'] == "Pengeluaran"){
 									echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
 								}else{
 									echo "-";
 								}
 								?>
 							</td>
 						</tr>
 						<?php 
 					}
 					?>
 					<tr>
 						<th colspan="5" class="text-right">TOTAL</th>
 						<td class="text-center text-bold text-success"><?php echo "Rp. ".number_format($total_pemasukan)." ,-"; ?></td>
 						<td class="text-center text-bold text-danger"><?php echo "Rp. ".number_format($total_pengeluaran)." ,-"; ?></td>
 					</tr>
 					<tr>
 						<th colspan="5" class="text-right">SALDO</th>
 						<td colspan="2" class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total_pemasukan - $total_pengeluaran)." ,-"; ?></td>
 					</tr>
 				</tbody>
 			</table>



 		</div>

 		<?php 
 	}else{
 		?>

 		<div class="alert alert-info text-center">
 			Silahkan Filter Laporan Terlebih Dulu.
 		</div>

 		<?php
 	}
 	?>


 	<script>

 		window.print();
 		
 	</script>

 </body>
 </html>
