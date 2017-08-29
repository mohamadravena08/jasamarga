<?php
/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */
date_default_timezone_set("Asia/Jakarta");
session_start();
  //error_reporting(0);
  include '../../library/koneksi.php';
	$date = date("d-M-Y His");
	if(isset($_POST['tanggalefektif'])){
	$efektif = DateTime::createFromFormat('m/d/Y', $_POST['tanggalefektif']);
	$tanggalefektif=date_format($efektif,"Y-m-d");
	}

	$temp = explode(".", $_FILES["jht"]["name"]);
	$newfilename = "Data BPJS Ketenagakerjaan - update  ".$date.' by '.$_SESSION['admin'].'.'. end($temp);
move_uploaded_file($_FILES["jht"]["tmp_name"], "exceljht/" . $newfilename);
	$Filepath="exceljht/".$newfilename;
	// Excel reader from http://code.google.com/p/php-excel-reader/
	require('php-excel-reader/excel_reader2.php');
	require('SpreadsheetReader.php');
$sql="START TRANSACTION;";
		$sql.="truncate table bpjstk;";
	try
	{
		
  		$Spreadsheet = new SpreadsheetReader($Filepath);
		$Sheets = $Spreadsheet -> Sheets();
		foreach ($Sheets as $Index => $Name)
		{

			$Time = microtime(true);

			$Spreadsheet -> ChangeSheet($Index);

			foreach ($Spreadsheet as $Key => $Row)
			{

				// INSERT INTO `bpjstk`(`npp`, `no_ref`, `nama_lengkap`, `jumlah_upah`, `saldo_awalJHT`, `saldo_cabanglain`, `iuran_cabanglain`, `iuran`, `saldo_akhirJHT`, `saldo_awaltahunJP`, `saldo_tahunberjalanJP`, `klaim_JP`, `masa_iur`) VALUES

				if($Key>=6&&$Row[2]!=NULL&&$Row[7]==NULL){
				$npp=$Row[2];
				$noref=$Row[5];
				$jumlah_upah=$Row[8];
				$saldo_awalJHT=$Row[9];
				$saldo_cabanglain=$Row[10];
				$iuran_cabanglain=$Row[11];
				$iuran=$Row[12];
				$iuranbulanan=(int)$Row[12]/12;
				$saldo_akhirJHT=$Row[18];
				$saldo_awaltahunJP=$Row[19];
				$saldo_tahunberjalanJP=$Row[20];
				$klaim_JP=$Row[21];
				$masa_iur=$Row[22];

				$nilai_rupiah=$Row[3];
				if(strlen($npp)==4){
					$npp="0".$npp;
				}
						
				$sql.="insert into bpjstk values('$npp','$noref','$jumlah_upah','$saldo_awalJHT','$saldo_cabanglain','$iuran_cabanglain','$iuran','$iuranbulanan','$saldo_akhirJHT','$saldo_awaltahunJP','$saldo_tahunberjalanJP','$klaim_JP','$masa_iur');";
						
					
				 }
				 
				}
			}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
		header('location:bpjstk.php?status=FALSE');
	}
	echo $sql;
	$updater=$_SESSION['admin'];
	
  	$sql.="COMMIT;";
	mysqli_query($DBcon,"insert into bpjstk_log values('','$updater','$tanggalefektif',NOW());");
 	if ($DBcon->multi_query($sql) === TRUE) {
     $DBcon->close();

     header('location:bpjstk.php?status=TRUE');
 } else {
     echo "Error: " . $sql . "<br>" . $DBcon->error;
 }


?>