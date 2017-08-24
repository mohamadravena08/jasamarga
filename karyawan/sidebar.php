<?php $npp=$_GET['npp'];
$pegawai=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from pegawai where npp='$npp'"));?>
<div class="col-sm-3 col-md-2 sidebar" style="
    height: 1000px;
">
		 <div class="sidebar_top">
		 	<h1 style="text-align:center"><?php 
		 			
			 	echo "". $pegawai['nama']. '<br />';
			 	echo "(".$npp. ")";
			?></h1>
		 </div>
		 <div class="details" style="position:relative">
		 	<a class="btn btn-primary" href="logout.php" role="button" style="margin-right: 25%;margin-left: 25%;background-color: #c01616;border-color: #a00;">Logout</a>
		 </div>
		<div class="details" style="position:relative">
			 <h3>Data Sekarang</h3>
			 <p>
				<?php
					$today = new DateTime('today');
					
					$kategori = $pegawai['kategori_tanggungan'];
					$lahir=new DateTime($pegawai['tanggal_lahir']);
					$umur = $today->diff($lahir)->y;
					$ns=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from nilai_sekarang where usia_bayar=$umur"));
					$nilaisekarangside=$ns['nilai_sekarang']; 
					$gaji=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from payrolls where npp ='$npp'"));
					$nsekaligus=mysqli_fetch_assoc(mysqli_query($DBcon,"select $kategori from nilai_sekaligus where usia=$umur"));
					$nilai_sekaligus=$nsekaligus[$kategori];
					  
					  echo "<b>Gaji Pokok  </b><br> ".rupiah($gaji['gaji_pokok']) .'</br>';
					  echo "<b>Penghasilan  </b><br> ".rupiah($gaji['gaji_pokok']+$gaji['tunjangan_struktural']+$gaji['tunjangan_fungsional']+$gaji['tunjangan_operasional']) .'</br>';
					  echo "<b>PhDP  </b><br> ".rupiah($gaji['phdp']) .'</br>';
					  echo "<b>Faktor Manfaat Pasti  </b><br> ".$nilaisekarangside .'</br>';
					  echo "<b>Kategori Tanggungan </b> </br> ".$kategori .'</br>';
					  echo '<b>Faktor Sekaligus  </b><br>'.$nilai_sekaligus;
				?>
			 </p>

			 <h3>Umur Sekarang</h3>
			 <p>
				<?php
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
			 <address>
			 	<h3>PT. Jasa Marga (Persero), Tbk.</h3>
			 </address>
		</div>
		<div class="clearfix"></div>
</div>