<?php
error_reporting(0);
session_start();
include("../library/koneksi.php");
if(!isset($_SESSION["npp"])){
	echo "<script language='javascript'>alert('Maaf Anda Belum Login!')</script>";
	header("Location:../index.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Simulasi Pensiun Karyawan Jasa Marga</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
 <link href="css/dashboard.css" rel="stylesheet">
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<!-- start menu -->
<style>
#parent {
   display: table;
   width: 100%;
}
#form_status {
   display: table-cell;
   text-align: center;
   vertical-align: middle;
}

</style>
  
</head>

<body>
<!-- header -->
<?php include_once("sidebar.php");?>

<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	 <div class="content">
<!---->
		
		<h1 style="text-align:center">Silahkan Pilih Status Pensiun Anda</h1>
		<div>
			<form method="get" action="" style="text-align: center"> 
			 <div class="form-group" >
			  <label for="sel1" >Simulasi Dana Pensiun Jika Anda</label>
			  <select name="status" class="form-control" class="text-center col-md-4 col-md-offset-4" style="width: 50%" style="vertical-align: middle" style="margin:auto" id="sel1">
			    <option selected disabled>Pilih Disini...</option>
			    <option value="1">Mengundurkan Diri</option>
			    <option value="2">Meninggal Dunia</option>
			    <option value="3">Cacat</option>
			    <option value="4">Ke Anak Perusahaan (KAP)</option>
			  </select>
			</div>
			 <button type="submit" class="btn btn-primary">Simulasi Sekarang</button>
			</form>
		</div> 

	<?php 
	if(isset($_GET['status'])) {
		if($_GET['status']==1){
			$manfaat_pasti = TRUE;
			$jht = TRUE;
			$purna_karya =TRUE;
			$pesangon = FALSE;
			$penghargaan_masa_kerja = FALSE;
			$uang_penggantian_hak = FALSE;

		} else if($_GET['status']==2){
			$manfaat_pasti = TRUE;
			$jht = TRUE;
			$purna_karya =TRUE;
			$pesangon = TRUE;
			$penghargaan_masa_kerja = TRUE;
			$uang_penggantian_hak = FALSE;

		} else if($_GET['status']==3){
			$manfaat_pasti = TRUE;
			$jht = TRUE;
			$purna_karya =TRUE;
			$pesangon = TRUE;
			$penghargaan_masa_kerja = TRUE;
			$uang_penggantian_hak = FALSE;

		} else if($_GET['status']==4){
			$manfaat_pasti = TRUE;
			$jht = TRUE;
			$purna_karya =TRUE;
			$pesangon = TRUE;
			$penghargaan_masa_kerja = TRUE;
			$uang_penggantian_hak = TRUE;
		}
	}
	?>

	<!---//pop-up-box---->			

	<?php if($manfaat_pasti) {

	?>
		 <div class="company">
			 <h3 class="clr1" style="margin:auto; text-align:center">Berikut Hasil Simulasi Dana Pensiun Anda</h3>
			 <div class="company_details">
				 <h4>Manfaat Bulanan <span>(Nilai Sekarang x 25% x PHDP x Masa Kerja)</span></h4>
				 <h6>Berikut jumlah dana manfaat bulanan yang anda dapatkan:</h6>
				 <p>((PERHITUNGAN))</p>
			 </div>
	<?php
		}
	?>

	<?php if($manfaat_pasti) {

	?>
			 <div class="company_details">
				 <h4>Manfaat Sekaligus <span>(Manfaat Bulanan x Nilai Sekaligus)</span></h4>
				 <h6>Berikut jumlah dana manfaat sekaligus yang anda dapatkan:</h6>
				 <p class="cmpny1">(PERHITUNGAN))</p>
			 </div>
	<?php
		}
	?>

	<?php if($jht) {

	?>
			 <div class="company_details">
				 <h4>Jaminan Hari Tua <span>(Manfaat Bulanan x Nilai Sekaligus)</span></h4>
				 <h6>Berikut jumlah dana Jaminan Hari Tua yang anda dapatkan:</h6>
				 <p class="cmpny1">(PERHITUNGAN))</p>
			 </div>
	<?php
		}
	?>

	<?php if($purna_karya) {

	?>
			 <div class="company_details">
				 <h4>Purna Karya <span>(Manfaat Bulanan x Nilai Sekaligus)</span></h4>
				 <h6>Berikut jumlah dana Purna Karya Tua yang anda dapatkan:</h6>
				 <p class="cmpny1">(PERHITUNGAN))</p>
			 </div>
	<?php
		}
	?>

	<?php if($pesangon) {

	?>
			 <div class="company_details">
				 <h4>Pesangon <span>(Manfaat Bulanan x Nilai Sekaligus)</span></h4>
				 <h6>Berikut jumlah dana Pesangon yang anda dapatkan:</h6>
				 <p class="cmpny1">(PERHITUNGAN))</p>
			 </div>
	<?php
		}
	?>
	
	<?php if($penghargaan_masa_kerja) {

	?>
			 <div class="company_details">
				 <h4>Penghargaan Masa Kerja <span>(Manfaat Bulanan x Nilai Sekaligus)</span></h4>
				 <h6>Berikut jumlah dana Penghargaan Masa Kerja yang anda dapatkan:</h6>
				 <p class="cmpny1">(PERHITUNGAN))</p>
			 </div>
	<?php
		}
	?>

	<?php if($uang_penggantian_hak) {

	?>
			 <div class="company_details">
				 <h4>Uang Penggantian Hak <span>(Manfaat Bulanan x Nilai Sekaligus)</span></h4>
				 <h6>Berikut jumlah dana Uang Penggantian Hak yang anda dapatkan:</h6>
				 <p class="cmpny1">(PERHITUNGAN))</p>
			 </div>
		 </div>
	<?php
		}
	?>
		 <footer style="text-align:center">
		 <div class="copywrite">
			 <p>© 2017 Tim Internship Jasa Marga IPB | Kantor Pusat Pt Jasa Marga (PERSERO) Tbk.</a> </p>
		 </div>
		</footer>
	 </div>
</div>
<!---->
</body>
</html>