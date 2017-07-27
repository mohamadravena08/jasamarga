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
			 <h3 class="clr1">Manfaat Pasti</h3>
			 <div class="company_details">
				 <h4>Manfaat Bulanan <span>(Nilai Sekarang x 25% x PHDP x Masa Kerja)</span></h4>
				 <h6>Berikut jumlah dana manfaat bulanan yang anda dapatkan:</h6>
				 <p class="cmpny1">((PERHITUNGAN))</p>
			 </div>
	<?php
		}
	?>

	<?php if($manfaat_pasti) {

	?>
			 <div class="company_details">
				 <h4>Manfaat Sekaligus <span>(Manfaat Bulanan x Nilai Sekaligus)</span></h4>
				 <h6>Berikut jumlah dana manffat sekaligus yang anda dapatkan:</h6>
				 <p>(PERHITUNGAN))</p>
			 </div>
		 </div>
	<?php
		}
	?>

	<?php if($jht) {

	?>
		 <div class="skills">
			 <h3 class="clr2">Jaminan Hari Tua</h3>
			 <h6>Berikut jumlah dana Jaminan Hari Tua yang anda dapatkan:</h6>
			 <div class="skill_info">
			 <p>((PERHITUNGAN))</p>
			 </div>
		 </div>
	<?php
		}
	?>
	<?php if($manfaat_pasti) {

	?>
		 <div class="education">
			 <h3 class="clr3">Education</h3>
			 <div class="education_details">
				 <h4>University of Awesome<span>JANUARY 2004 - OCTOBER 2009</span></h4>
				 <h6>MAJOR PHD</h6>
				 <p class="cmpny1">Nulla volutpat at est sed ultricies. In ac sem consequat, posuere nulla varius, molestie lorem. Duis quis nibh leo.
				 Curabitur a quam eu mi convallis auctor nec id mauris. Nullam mattis turpis eu turpis tincidunt, et pellentesque leo imperdiet.
				 Vivamus malesuada, sem laoreet dictum pulvinar, orci lectus rhoncus sapien, ut consectetur augue nibh in neque. In tincidunt sed enim et tincidunt.</p>
			 </div>
			 
			 <div class="education_details">
				 <h4>University of Techonology, Newyork <span>APRIL 2001 - SEPTEMBER 2003</span></h4>
				 <h6>BACHELORS OF ARTS</h6>
				 <p>Nulla volutpat at est sed ultricies. In ac sem consequat, posuere nulla varius, molestie lorem. Duis quis nibh leo.
				 Curabitur a quam eu mi convallis auctor nec id mauris. Nullam mattis turpis eu turpis tincidunt, et pellentesque leo imperdiet.
				 Vivamus malesuada, sem laoreet dictum pulvinar, orci lectus rhoncus sapien, ut consectetur augue nibh in neque. In tincidunt sed enim et tincidunt.</p>
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