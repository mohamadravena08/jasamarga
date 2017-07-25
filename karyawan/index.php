<?php
error_reporting(0);
session_start();
include("../library/koneksi.php");
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
<meta name="keywords" content="Curriculum Vitae Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<!-- start menu -->
  
</head>
<body>
<!-- header -->
<div class="col-sm-3 col-md-2 sidebar">
		 <div class="sidebar_top">
		 	<h1><?php 

			 	echo "". $_SESSION['nama']. '<br />';
			 	echo "(".$_SESSION['npp']. ")";
			?></h1>
			 <img src="images/avt.png" alt=""/>
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

					  echo "Tanggal Bakti:<br /> ". date_format($tanggalbakti,'d-M-Y') .'<br />';
					  echo "Masa Bakti:<br /> " . $y . " tahun " . $m . " bulan " . $d . " hari";
				?>
			 </p>	 
			 <h3>Kategori Tanggungan</h3>
			 <p><?php 
			 	$npp=$_SESSION['npp']; 
				$sql = mysqli_query($DBcon, "select * from pegawai where npp='$npp'");
				$data = mysqli_fetch_array($sql);

				echo $data['kategori_tanggungan'];
			 ?></p>
			 <address>
			 <h3>Kantor Pusat Pt Jasa Marga (PERSERO) Tbk.</h3>
			 <p>
			 	Plaza Tol Taman Mini Indonesia Indah Jakarta, 13550 Indonesia Telp. : +6221 841 3630, +6221 841 3526. Fax.
			 </p>
			 </address>
			 
		</div>
		<div class="clearfix"></div>
</div>
<!---->
<?php 
	if(isset($_GET['status'])){



?>
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!---//pop-up-box---->			
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	 <div class="content">
		 <div class="details_header">
			 <ul>
				 <li><a href="index.html"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Resume</a></li>
				 <li><a href="#"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>Print CV</a></li>
				 <li><a href="contact.html"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Email me</a></li>
				 <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>View photo</a></li>
				 <div id="small-dialog" class="mfp-hide">
					 <img src="images/g4.jpg" alt=""/>
				 </div>
				 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>
			 </ul>
		 </div>
		 <div class="company">
			 <h3 class="clr1">Previous Employment</h3>
			 <div class="company_details">
				 <h4>Company Name <span>JUNE 2009 - PRESENT</span></h4>
				 <h6>WEB DESIGNER</h6>
				 <p class="cmpny1">Nulla volutpat at est sed ultricies. In ac sem consequat, posuere nulla varius, molestie lorem. Duis quis nibh leo.
				 Curabitur a quam eu mi convallis auctor nec id mauris. Nullam mattis turpis eu turpis tincidunt, et pellentesque leo imperdiet.
				 Vivamus malesuada, sem laoreet dictum pulvinar, orci lectus rhoncus sapien, ut consectetur augue nibh in neque. In tincidunt sed enim et tincidunt.</p>
			 </div>
			 <div class="company_details">
				 <h4>Company Name <span>NOVEMBER 2007 - MAY 2009</span></h4>
				 <h6>WEB DESIGNER</h6>
				 <p>Nulla volutpat at est sed ultricies. In ac sem consequat, posuere nulla varius, molestie lorem. Duis quis nibh leo.
				 Curabitur a quam eu mi convallis auctor nec id mauris. Nullam mattis turpis eu turpis tincidunt, et pellentesque leo imperdiet.
				 Vivamus malesuada, sem laoreet dictum pulvinar, orci lectus rhoncus sapien, ut consectetur augue nibh in neque. In tincidunt sed enim et tincidunt.</p>
			 </div>
		 </div>
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
		 <?php }?>
		 <div class="copywrite">
			 <p>© 2015 Curriculum Vitae All Rights Reseverd | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
		 </div>
	 </div>
</div>
<!---->
</body>
</html>