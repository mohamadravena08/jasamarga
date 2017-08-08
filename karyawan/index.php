<?php
//error_reporting(0);
session_start();
include("../library/koneksi.php");
include("../library/fungsi_rupiah.php");
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
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<!-- Custom Theme files -->
<link href="css/dashboard.css" rel="stylesheet">
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />


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

@media print {
    .sidebar {
      display: none;
    }

    .ps {
      display: none;
    }

    .form-group {
      display: none;
    }

    .hd {
      display: none;
    }

    .btn {
      display: none;
    }


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
		
		<h1 class="hd" style="text-align:center">Silahkan Pilih Status Pensiun Anda</h1>
		<div>
			<form id="eventForm" method="get" action="" style="text-align: center"> 
			 <div class="form-group" >
			  <label for="sel1" >Simulasi Dana Pensiun Jika Anda</label>
			  <select name="status" class="form-control" class="text-center col-md-4 col-md-offset-4" style="width: 50%" style="vertical-align: middle" style="margin:auto" id="sel1">
			    <option <?php if(!isset($_GET['status'])) echo "selected";?> disabled>Pilih Disini...</option>
			     <option <?php if(isset($_GET['status'])&&$_GET['status']==="5") echo "selected";?> value="5">Pensiun Normal</option>
			    <option <?php if(isset($_GET['status'])&&$_GET['status']==="1") echo "selected";?> value="1">Mengundurkan Diri</option>
			    <option <?php if(isset($_GET['status'])&&$_GET['status']==="2") echo "selected";?> value="2">Meninggal Dunia</option>
			    <option <?php if(isset($_GET['status'])&&$_GET['status']==="3") echo "selected";?> value="3">Cacat / Sakit Keras</option>
			    <option <?php if(isset($_GET['status'])&&$_GET['status']==="4") echo "selected";?> value="4">Ke Anak Perusahaan (KAP)</option>

			  </select>
			</div>
			<div class="form-group" >
			  <label for="sel1" >pada tanggal</label>
			  <div class="input-group input-append date" id="datePicker" style="width: 50%; margin:auto">
		                <input type="text" class="form-control" name="tanggalpensiun" value=<?php if(isset($_GET['status'])) {$pensiun=date_create($_GET['tanggalpensiun']);
	$rencana=date_format($pensiun,"d-M-Y");echo $rencana; }?>>
		                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
		            </div>
			</div>

			 <button type="submit" class="btn btn-primary">Simulasi Sekarang</button>
			</form>
			
		</div> 
	<?php 
	if(isset($_GET['status'])) {
		$pensiun=date_create($_GET['tanggalpensiun']);
		$rencana=date_format($pensiun,"Y-m-d");
		$today = new DateTime($rencana);
		$pegawai=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from pegawai where npp='$npp'"));
		$lahir=new DateTime($pegawai['tanggal_lahir']);
		$usia = $today->diff($lahir)->y;
		$bulanusia= $today->diff($lahir)->m;
		$hariusia = $today->diff($lahir)->d;
		$bakti=new DateTime($pegawai['mulai_bakti']);
		$masabakti=$today->diff($bakti)->y;
		$manfaatbulan=0;
		$manfaatsekaligus=0;
		$usiamasuk=$bakti->diff($lahir)->y;
		$bulanmasuk=$bakti->diff($lahir)->m;
		if($usia>56||($usia==56&&$bulanusia>0&&$hariusia>0)){
			echo "<br><center><h4>Usia Anda pada tanggal tersebut telah melebihi 56 tahun, silakan pilih tanggal lain.</h4></center>";
		}
		else {
		if($_GET['status']==1){
			$status="Mengundurkan Diri";
			$manfaat_pasti = TRUE;
			$jht = TRUE;
			$purna_karya =TRUE;
			$pesangon = FALSE;
			$penghargaan_masa_kerja = FALSE;
			$uang_penggantian_hak = FALSE;

		} else if($_GET['status']==2){
			$status="Meningal Dunia/Cacat";
			$manfaat_pasti = TRUE;
			$jht = TRUE;
			$purna_karya =TRUE;
			$pesangon = TRUE;
			$penghargaan_masa_kerja = TRUE;
			$uang_penggantian_hak = FALSE;

		} else if($_GET['status']==3){
			$status="Cacat";
			$manfaat_pasti = TRUE;
			$jht = TRUE;
			$purna_karya =TRUE;
			$pesangon = TRUE;
			$penghargaan_masa_kerja = TRUE;
			$uang_penggantian_hak = FALSE;

		} else if($_GET['status']==4){
			$status="Ke Anak Perusahaan (KAP)";
			$manfaat_pasti = TRUE;
			$jht = TRUE;
			$purna_karya =TRUE;
			$pesangon = TRUE;
			$penghargaan_masa_kerja = TRUE;
			$uang_penggantian_hak = TRUE;
		}
		else if($_GET['status']==5){
			$status="Pensiun Normal";
			$manfaat_pasti = TRUE;
			$jht = TRUE;
			$purna_karya =TRUE;
			$pesangon = TRUE;
			$penghargaan_masa_kerja = TRUE;
			$uang_penggantian_hak = TRUE;
		}

	}}
	?>

	<!---//pop-up-box---->
<?php	
//kategori tanggungan
$kategori = $pegawai['kategori_tanggungan'];
if($kategori=="M1") $keterangan="Laki-laki menikah dan memiliki beberapa anak"; else if($kategori=="M2") $keterangan="Laki-laki menikah belum memiliki anak"; else if($kategori=="M3") $keterangan="Lajang/Duda dan memiliki beberapa anak"; else if($kategori=="M4")
$keterangan="Laki-laki Lajang"; else if($kategori=="F1") $keterangan="Perempuan menikah dan memiliki beberapa anak"; else if($kategori=="F2") $keterangan="Perempuan menikah belum memiliki anak"; else if($kategori=="F3") $keterangan="Lajang/Janda dan memiliki beberapa anak"; else $keterangan="Perempuan Lajang";

//tanggal lahir dan bakti				
$lahir=new DateTime($pegawai['tanggal_lahir']);
$usia = $today->diff($lahir)->y;
$ns=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from nilai_sekarang where usia_bayar=$usia"));
$nilai_sekarang=$ns['nilai_sekarang']; 
$gaji=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from payrolls where npp ='$npp'"));
$unitkerja=$gaji['unit_kerja'];
$gajipokok=$gaji['gaji_pokok'];
$phdp=$gaji['phdp'];
$penghasilan=$gaji['gaji_pokok']+$gaji['tunjangan_struktural']+$gaji['tunjangan_fungsional']+$gaji['tunjangan_operasional'];
$nsekaligus=mysqli_fetch_assoc(mysqli_query($DBcon,"select $kategori from nilai_sekaligus where usia=$usia"));
$nilai_sekaligus=$nsekaligus[$kategori];
$total=0;


	//hitung manfaat pasti
	if(isset($manfaat_pasti)&&$manfaat_pasti) {
	
	$const=0.025;
	$manfaatbulan=$nilai_sekarang*$const*$phdp*$masabakti;
	$nilai_sekaligus=$nsekaligus[$kategori];
	$manfaatsekaligus=$manfaatbulan*$nilai_sekaligus;
	if($manfaatbulan>1500000){
		$manfaatbulan=0.8*$manfaatbulan;
		$manfaatsekaligus=0.2*$manfaatsekaligus;
	}
	else $manfaatbulan=0;
	
	?>
	<div class="company">
			 <h3 class="clr1" style="text-align:center; margin-right: 0em">Hasil Simulasi Dana Pensiun Anda Jika Anda Pensiun Pada tanggal <br><?php echo $_GET['tanggalpensiun']; ?> dengan status <b><?php echo $status ?> </b></h3>
			 </div>
			
  	


  	<div class="skills">
			 <h3 class="clr2" >Data dan Dasar Perhitungan Pensiunan</h3>
			 <div class="skill_list">
				 <div class="skill1">
					 <ul>					 
						<li><?php echo "<b>Nama Pegawai : </b><br/>".$_SESSION['nama']; ?></li>
						<li><?php echo "<b>Nomor Pokok Pegawai </b></br>".$_SESSION['npp'];?></li>
						<li><?php echo "<b>Unit Kerja </b></br>".$unitkerja;?></li>
						<li><?php echo "<b>Usia Mulai Bekerja : </b><br/>".$usiamasuk." tahun"; ?></li>
						</ul>
				 </div>
				 <div class ="skill1">
				 <li><?php echo "<b>Gaji Pokok: </b><br/>".rupiah($gajipokok); ?></li>
						<li><?php echo "<b>Penghasilan </b></br>".rupiah($penghasilan);?></li>
						<li><?php echo "<b>PhDP : </b><br/>".rupiah($phdp); ?></li>
						<li><?php echo "<b>Faktor Manfaat Pasti : </b></br>".$nilai_sekarang ?></li>
						
				 </div>
				 <div class="skill1">
					 <ul>					 
						<li><?php echo "<b>Kategori Tanggungan </b></br>".$kategori." (".$keterangan.")";?></li>
						<li><?php echo '<b>Faktor Sekaligus : </b></br>'.$nilai_sekaligus;?></li>
						<li>
							<?php
					  			$y = $today->diff($lahir)->y;
								  //bulan
								  $m = $today->diff($lahir)->m;
								  //hari
								  $d = $today->diff($lahir)->d;

								echo "<b>Usia Saat Pensiun:</b><br /> " . $y . " tahun " . $m . " bulan " . $d . " hari";
							?>
						</li>
						<li>
							<?php
								  $y = $today->diff($bakti)->y;
								  //bulan
								  $m = $today->diff($bakti)->m;
								  //hari
								  $d = $today->diff($bakti)->d;

					  
					  echo "<b>Masa Bakti Saat Pensiun:</b><br /> " . $y . " tahun " . $m . " bulan " . $d . " hari";
				?>
						</li>
						
					 </ul>
				 </div>
				 <div class="clearfix"></div>
			 </div>
		 </div>
 
		 <div class="company">
		 <h3 class="clr2" style="text-align: center;margin-bottom: 0.5em;">Hasil Perhitungan</h3>
			 <div class="company_details">
				 <h4>Manfaat Bulanan <span>(Nilai Sekarang x 2.5% x PHDP x Masa Kerja)</span></h4>
				 <p class="cmpny1">
				 	<?php if($usia<46&&$_GET['status']==1) {echo "Anda tidak berhak Mendapaatkan Manfaat Pasti jika mengundurkan diri pada usia kurang dari 46 tahun"; $manfaatsekaligus=0;
				 	$manfaatbulan=0; } else echo rupiah($manfaatbulan);
				 	
				 
				 	 ?>
				 </p>
			 </div>

			 <div class="company_details">
				 <h4>Manfaat Sekaligus<span>(Manfaat Bulanan x Faktor Sekaligus)</span></h4>
				 <p class="cmpny1">
				 <?php if($usia<46&&$_GET['status']==1) {$manfaatsekaligus=0;
				 	$manfaatbulan=0; echo "Anda tidak berhak Mendapaatkan Manfaat Pasti jika mengundurkan diri pada usia kurang dari 46 tahun"; }else echo rupiah($manfaatsekaligus);
				 	 ?>
				 </p>
			 </div>
	<?php
		$total+=$manfaatsekaligus;}
	?>

	<?php if(isset($jht)&&$jht) {

	?>
			 <div class="company_details">
				 <h4>Jaminan Hari Tua <span>(Manfaat JHT dari BPJS Ketenagakerjaan)</span></h4>
				 <p class="cmpny1">Data dari Tabel JHT</p>
			 </div>
	<?php
		}
	?>

	<?php if(isset($purna_karya)&&$purna_karya) {
		$baktiup=$masabakti+1;
		$usiaup=$usia+1;
		$bulanbakti=$today->diff($bakti)->m;
		$bulanlahir=$today->diff($lahir)->m;
				if($usia<31){
					$faktor=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from purna_karya_kepesertaan where tahun_berakhir=$masabakti"));
					$faktor2=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from purna_karya_kepesertaan where tahun_berakhir=$baktiup"));
				
					$nilai1=$faktor['faktor_tunai'];
					$nilai2=$faktor2['faktor_tunai'];
					if($bulanbakti>0)
						$faktorkalitambah=($bulanbakti/12)*($nilai2-$nilai1); else $faktorkali=$nilai1;
					$purnakarya=($gajipokok*$nilai1)+($gajipokok*$faktorkalitambah);
				}
				else{
					$faktor=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from purna_karya where usia=$usia"));
					$faktor2=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from purna_karya where usia=$usiaup"));
					$nilai1=$faktor['nilai_pk'];
					$nilai2=$faktor2['nilai_pk'];
					if($bulanbakti>0)
						$faktorkalitambah=($bulanlahir/12)*($nilai2-$nilai1); else $faktorkalitambah=0;
					$purnakarya=($gajipokok*$nilai1)+($gajipokok*$faktorkalitambah);
				}
	?>
	
			 <div class="company_details">
				 <h4>Tunjangan Purna Karya <span><a href="">Lihat Cara Penghitungan</a></span></h4>
				 <p class="cmpny1"><?php echo rupiah($purnakarya);?></p>
			 </div>
	<?php
		$total+=$purnakarya; }
	?>

	<?php if(isset($pesangon)&&$pesangon) {
			if($masabakti<=8){
			$fetchfaktorpesangon=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from pesangon where tahun_berakhir=$masabakti"));
			$faktorpesangon=$fetchfaktorpesangon['faktor_tunai'];}
			else {$faktorpesangon=9;}
			$nilaipesangon=$faktorpesangon*$penghasilan;
			if($_GET['status']==3||$_GET['status']==4){
				$nilaipesangon=$nilaipesangon*2;
				
			}

	?>

			 <div class="company_details">
				 <h4>Pesangon <span>(Faktor Pesangon x Gaji Pokok)</span></h4>
				 <p class="cmpny1"><?php echo rupiah($nilaipesangon);?></p>
			 </div>
	<?php
		$total+=$nilaipesangon;}
	?>
	
	<?php if(isset($penghargaan_masa_kerja)&&$penghargaan_masa_kerja) {
			if($masabakti<=24){
				$fetchfaktorupmk=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from penghargaan_masa_kerja where tahun_berakhir=$masabakti"));
				$faktorupmk=$fetchfaktorupmk['faktor_tunai'];
			}
			else $faktorupmk=10;
			$nilaiupmk=$faktorupmk*$penghasilan;
	?>
			 <div class="company_details">
				 <h4>Penghargaan Masa Kerja <span>(Faktor UPMK x Gaji Pokok)</span></h4>
				 <p class="cmpny1"><?php echo rupiah($nilaiupmk);?></p>
			 </div>
	<?php
		$total+=$nilaiupmk;}
	?>

	<?php if(isset($uang_penggantian_hak)&&$uang_penggantian_hak) {
			$uanghak=0.15*($nilaipesangon+$nilaiupmk);	
	?>
			 <div class="company_details">
				 <h4>Uang Penggantian Hak <span>(15% * (uang pesangon + uang penghargaan masa kerja))</span></h4>
				 <p class="cmpny1"><?php echo rupiah($uanghak);?></p>
			 </div>
		 
	<?php
		$total+=$uanghak;}

		if(isset($total)){
	?>

	 <div class="company_details">
				 <h4 style="font-size: 1.2em">Total Tunjangan Sekaligus <span>(plus tunjangan bulanan)</span></h4>
				 <p class="cmpny1" style="
    border-bottom: 0px dashed #999;"><h2 style="
    text-align: right;
    padding-right: 1.3em;
"><?php echo rupiah($total);?></h2><h4 style="
    text-align: right;
    font-size: 15px;
    padding-right: 2.7em;
"><?php echo " plus   ".rupiah($manfaatbulan);?> tiap bulan </h4></p>
			 </div>
			 <button class="btn btn-primary btn-lg pull-right" style="
    margin-right: 2em;
    margin-top: 1em;
    padding-left: 2em;
    padding-right: 2em;" onClick="window.print();">Print</button> 
</div>

    


 <?php } ?>
		 <footer style="text-align:center; padding-top: 2em">
		 <div class="copywrite">
			 <p>© 2017 Tim Internship Jasa Marga IPB | Kantor Pusat PT Jasa Marga (PERSERO) Tbk.</a> </p>
		 </div>
		</footer>
	 </div>
</div>
<!---->
</body>

<script>
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
        	autoclose: true,
            format: 'mm/dd/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
    
                date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>

</html>