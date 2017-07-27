<?php
$npp='01161';
session_start();
include("../library/koneksi.php");
include("../library/fungsi_rupiah.php");
if(!isset($_SESSION["npp"])){
	echo "<script language='javascript'>alert('Maaf Anda Belum Login!')</script>";
	header("Location:../index.php");
}
$today = new DateTime('today');
$pegawai=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from pegawai where npp='$npp'"));
$lahir=new DateTime($pegawai['tanggal_lahir']);
$usia = $today->diff($lahir)->y;
$bakti=new DateTime($pegawai['mulai_bakti']);
$masabakti=$today->diff($bakti)->y;

$ns=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from nilai_sekarang where usia_bayar=$usia"));
$nilai_sekarang=$ns['nilai_sekarang'];

$gaji=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from payroll where ASSIGNMENT_NUMBER ='$npp'"));
$penghasilan=$gaji['BVALUE'];
$const=0.0025;
$manfaatbulan=$nilai_sekarang*$const*$penghasilan*$masabakti;?>
<br><br><br><br><center><?php
echo "manfaatbulan<br>";
echo 'NPP : '.$npp; 
echo '<br>Nama :'. $pegawai['nama'];
echo '<br>usia : '.$usia;
echo '<br>masabakti : '.$masabakti;
echo '<br>nilai sekarang : '.$nilai_sekarang;
echo '<br>gaji : '.rupiah($penghasilan);
echo '<br>hasil : '.rupiah($manfaatbulan);
echo '<br><br><br>';
$kategori=$pegawai['kategori_tanggungan'];
$nsekaligus=mysqli_fetch_assoc(mysqli_query($DBcon,"select $kategori from nilai_sekaligus where usia=$usia"));
$nilai_sekaligus=$nsekaligus[$kategori];
echo '<br>faktor sekaligus :'.$nilai_sekaligus;
echo '<br>manfaat sekaligus : '.rupiah($nilai_sekaligus*$manfaatbulan);

?>

<center>