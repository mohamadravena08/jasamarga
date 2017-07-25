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
<div class="col-sm-3 col-md-2 sidebar">
		 <div class="sidebar_top">
		 	<h1 style="text-align:center"><?php 

			 	echo "". $_SESSION['nama']. '<br />';
			 	echo "(".$_SESSION['npp']. ")";
			?></h1>
		 </div>
		 <div class="details">
		 	<a class="btn btn-primary" href="logout.php" role="button" style="margin-right: 25%;margin-left: 25%;background-color: #c01616;border-color: #a00;">Logout</a>
		 </div>
		<div class="details">
			 <h3>Masa Bakti Kerja</h3>
			 <p>
				<?php
					$npp=$_SESSION['npp']; 
					$sql = mysqli_query($DBcon, "select * from pegawai where npp='$npp'");
					$data = mysqli_fetch_array($sql);

					$bakti = $data['mulai_bakti'];	
					$tanggalbakti=date_create($bakti);
	
					  //tanggal bakti
					  $bakti = new DateTime($bakti);
					  //tanggal hari ini
					  $today = new DateTime('today');
					  //tahun
					  $y = $today->diff($bakti)->y;
					  //bulan
					  $m = $today->diff($bakti)->m;
					  //hari
					  $d = $today->diff($bakti)->d;

					  echo "<b>Tanggal Bakti:</b><br /> ". date_format($tanggalbakti,'d-M-Y') .'<br />';
					  echo "<b>Masa Bakti:</b><br /> " . $y . " tahun " . $m . " bulan " . $d . " hari";
				?>
			 </p>	 
			 <h3>Kategori Tanggungan</h3>
			 <p><b><?php 
			 	$npp=$_SESSION['npp']; 
				$sql = mysqli_query($DBcon, "select * from pegawai where npp='$npp'");
				$data = mysqli_fetch_array($sql);

				echo $data['kategori_tanggungan'];
			 ?></b></p>
			 <address>
			 <h3>Kantor Pusat Pt Jasa Marga (PERSERO) Tbk.</h3>
			 <p>
			 	Plaza Tol Taman Mini Indonesia Indah Jakarta, 13550 Indonesia Telp. : +6221 841 3630, +6221 841 3526
			 </p>
			 </address>
			 
		</div>
		<div class="clearfix"></div>
</div>
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
			 <h3 class="clr1">Previous Employment</h3>
			 <div class="company_details">
				 <h4>Company Name <span>JUNE 2009 - PRESENT</span></h4>
				 <h6>WEB DESIGNER</h6>
				 <p class="cmpny1">Nulla volutpat at est sed ultricies. In ac sem consequat, posuere nulla varius, molestie lorem. Duis quis nibh leo.
				 Curabitur a quam eu mi convallis auctor nec id mauris. Nullam mattis turpis eu turpis tincidunt, et pellentesque leo imperdiet.
				 Vivamus malesuada, sem laoreet dictum pulvinar, orci lectus rhoncus sapien, ut consectetur augue nibh in neque. In tincidunt sed enim et tincidunt.</p>
			 </div>
	<?php
		}
	?>

	<?php if($manfaat_pasti) {

	?>
			 <div class="company_details">
				 <h4>Company Name <span>NOVEMBER 2007 - MAY 2009</span></h4>
				 <h6>WEB DESIGNER</h6>
				 <p>Nulla volutpat at est sed ultricies. In ac sem consequat, posuere nulla varius, molestie lorem. Duis quis nibh leo.
				 Curabitur a quam eu mi convallis auctor nec id mauris. Nullam mattis turpis eu turpis tincidunt, et pellentesque leo imperdiet.
				 Vivamus malesuada, sem laoreet dictum pulvinar, orci lectus rhoncus sapien, ut consectetur augue nibh in neque. In tincidunt sed enim et tincidunt.</p>
			 </div>
		 </div>
	<?php
		}
	?>

	<?php if($manfaat_pasti) {

	?>
		 <div class="skills">
			 <h3 class="clr2">Professional skills</h3>
			 <div class="skill_info">
			 <p>Duis egestas tortor metus, vitae venenatis tortor tristique at. Pellentesque dignissim purus vitae enim blandit, sed tristique enim malesuada. Maecenas dolor erat,
			 volutpat a tellus eu, euismod iaculis urna. Nulla dui purus, viverra viverra dolor non, malesuada dictum purus.</p>
			 </div>
			 <div class="skill_list">
				 <div class="skill1">
					 <h4>Software</h4>
					 <ul>					 
						<li>Photoshop</li>
						<li>Flash</li>
						<li>Dreemweeaver</li>
						<li>In Design</li>
					 </ul>
				 </div>
				 <div class="skill2">
					 <h4>Languages</h4>
					 <ul>					 
						<li>HTML/CSS</li>
						<li>ActionScript</li>
						<li>PHP</li>
						<li>Ruby on Rais</li>
					 </ul>
				 </div>
				 <div class="clearfix"></div>
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
	<?php
		}
	?>

	<?php if($manfaat_pasti) {

	?>
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