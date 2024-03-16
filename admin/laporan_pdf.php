<?php
// memanggil library FPDF
require('../assets/dist/libs/fpdf181/fpdf.php');


include '../koneksi.php'; 
$tgl_dari = $_GET['tanggal_dari'];
$tgl_sampai = $_GET['tanggal_sampai'];

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');

// membuat halaman baru
$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);

// mencetak string 
// $pdf->Cell(280,7,'SISTEM INFORMASI KEUANGAN',0,1,'C');

$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);


$pdf->SetFont('Times', 'B', 20);
$pdf->Image("../gambar/DB.jpeg", $pdf->GetX(), $pdf->GetY(), 30);
$pdf->Text(53, 16, 'CV.DIAS BERSAUDARA');
$pdf->SetFont('Times', '', 10);
$pdf->Text(53, 22, 'Jl. Raya Mustikasari RT 01/RW 04');
$pdf->Text(116, 22, 'Handphone  : +62 081386430720');
$pdf->Text(53, 27, 'Kamp.Babakan   Kel. Mustikasari,');
$pdf->Text(116, 27, 'Whatsapp     : +62 081386430720');
$pdf->Text(53, 32, 'Kec. Mustikajaya, Bekasi 17117');
$pdf->Text(116, 32, 'E-mail           : sunardi.engineering@gmail.com');
$pdf->Text(53, 38, 'Jasa bubut autolathe, Bubut Turret, Bor, Tap, Slotting, Snay, Tap dll');

$pdf->SetFont('Arial','B',12);
$pdf->Line(10, 45, 335-50, 45);
$pdf->Cell(280, 85, 'LAPORAN KEUANGAN', 0, 1, 'C');

// // Memberikan space kebawah agar tidak terlalu rapat
// $pdf->Cell(10,0,'',0,1);
// $pdf->SetFont('Arial','B',10);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetY($pdf->GetY() - 35);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(35, 6, 'DARI TANGGAL', 0, 0);
$pdf->Cell(5, 6, ':', 0, 0);
$pdf->Cell(35,6, date('d-m-Y', strtotime($tgl_dari)) ,0,0);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(35,6,'SAMPAI TANGGAL',0,0);
$pdf->Cell(5,6,':',0,0);
$pdf->Cell(35,6, date('d-m-Y', strtotime($tgl_sampai)) ,0,0);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(35,6,'KATEGORI',0,0);
$pdf->Cell(5,6,':',0,0);
$kategori = $_GET['kategori'];
if($kategori == "semua"){
  $kkk = "SEMUA KATEGORI";
}elseif($kategori == "Pemasukan") {
  $k = mysqli_query($koneksi, "SELECT * FROM transaksi where transaksi_jenis = 'Pemasukan'");
  $kk = mysqli_fetch_assoc($k);
  $kkk = $kk['transaksi_jenis'];
} elseif($kategori == "Pengeluaran") {
  $k = mysqli_query($koneksi, "SELECT * FROM transaksi where transaksi_jenis = 'Pengeluaran'");
  $kk = mysqli_fetch_assoc($k);
  $kkk = $kk['transaksi_jenis'];
} else{
  $k = mysqli_query($koneksi,"select * from kategori where kategori_id='$kategori'");
  $kk = mysqli_fetch_assoc($k);
  $kkk = $kk['kategori'];
}
$pdf->Cell(35,6, $kkk ,0,0);


$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(10,14,'NO',1,0,'C');
$pdf->Cell(35,14,'TANGGAL',1,0,'C');
$pdf->Cell(35,14,'KLIEN',1,0,'C');
$pdf->Cell(45,14, 'KATEGORI' ,1,0,'C');
$pdf->Cell(70,14,'KETERANGAN',1,0,'C');

$pdf->Cell(82,7,'JENIS',1,0,'C');
$pdf->Cell(1,7,'',0,1);
$pdf->Cell(195,7,'',0,0);
$pdf->Cell(41,7,'PEMASUKAN',1,0,'C');
$pdf->Cell(41,7,'PENGELUARAN',1,1,'C');

$pdf->Cell(10,0,'',0,1);



$pdf->SetFont('Arial','',10);

$no=1;
$total_pemasukan=0;
$total_pengeluaran=0;
if ($kategori == "semua") {
    $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
} elseif($kategori == "Pemasukan") {
    $data = mysqli_query($koneksi, "SELECT * FROM transaksi where transaksi_jenis = 'Pemasukan' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
} elseif($kategori == "Pengeluaran") {
    $data = mysqli_query($koneksi, "SELECT * FROM transaksi where transaksi_jenis = 'Pengeluaran' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
} else {
    $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and kategori_id='$kategori' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
}
while($d = mysqli_fetch_array($data)){

  if($d['transaksi_jenis'] == "Pemasukan"){
    $total_pemasukan += $d['transaksi_nominal'];
  }elseif($d['transaksi_jenis'] == "Pengeluaran"){
    $total_pengeluaran += $d['transaksi_nominal'];
  }

  $pdf->Cell(10,7,$no++,1,0,'C');
  $pdf->Cell(35,7,date('d-m-Y', strtotime($d['transaksi_tanggal'])),1,0,'C');
  $pdf->Cell(35,7, $d['klien'] ,1,0,'C');
  
  if ($kategori == 'Pemasukan' || $kategori == 'Pengeluaran') {
    $pdf->Cell(45,7, $d['transaksi_jenis'] ,1,0,'C');
  } else {
    $pdf->Cell(45,7, $d['kategori'] ,1,0,'C');
  }

  $pdf->Cell(70,7,$d['transaksi_keterangan'],1,0,'C');

  if($d['transaksi_jenis'] == "Pemasukan"){
    $pem = "Rp. ".number_format($d['transaksi_nominal'])." ,-";
  }else{
    $pem = "-";
  }

  if($d['transaksi_jenis'] == "Pengeluaran"){
    $peng = "Rp. ".number_format($d['transaksi_nominal'])." ,-";
  }else{
    $peng = "-";
  }

  $pdf->Cell(41,7,$pem,1,0,'C');
  $pdf->Cell(41,7,$peng,1,1,'C');

  $pdf->Cell(10,0,'',0,1);
}

$pdf->Cell(195,7, "TOTAL" ,1,0,'R');
$pdf->Cell(41,7,"Rp. ".number_format($total_pemasukan)." ,-",1,0,'C');
$pdf->Cell(41,7,"Rp. ".number_format($total_pengeluaran)." ,-",1,1,'C');

$pdf->Cell(10,0,'',0,1);

$pdf->Cell(195,7, "SALDO" ,1,0,'R');
$pdf->Cell(82,7,"Rp. ".number_format($total_pemasukan - $total_pengeluaran)." ,-",1,0,'C');






$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','',10);



$pdf->Output();
?>