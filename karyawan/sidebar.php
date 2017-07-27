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
			 <h3>Umur Sekarang</h3>
			 <p>
				<?php
					$npp=$_SESSION['npp']; 
					$sql = mysqli_query($DBcon, "select * from pegawai where npp='$npp'");
					$data = mysqli_fetch_array($sql);

					$lahir = $data['tanggal_lahir'];	
					$tanggallahir=date_create($lahir);
	
					  //tanggal lahir
					  $lahir = new DateTime($lahir);
					  //tanggal hari ini
					  $today = new DateTime('today');
					  //tahun
					  $y = $today->diff($lahir)->y;
					  //bulan
					  $m = $today->diff($lahir)->m;
					  //hari
					  $d = $today->diff($lahir)->d;

					  echo "<b>Tanggal Lahir:</b><br /> ". date_format($tanggallahir,'d-M-Y') .'<br />';
					  echo "<b>Umur Sekarang:</b><br /> " . $y . " tahun " . $m . " bulan " . $d . " hari";
				?>
			 </p>

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
			 	<h3>PT. Jasa Marga (Persero), Tbk.</h3>
			 </address>
		</div>
		<div class="clearfix"></div>
</div>