<?php
/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */
date_default_timezone_set("Asia/Jakarta");
session_start();
  error_reporting(0);
  include '../../library/koneksi.php';
$date = date("d-M-Y His");
	if(isset($_POST['tanggalefektif'])){
	$efektif = DateTime::createFromFormat('m/d/Y', $_POST['tanggalefektif']);
	$tanggalefektif=date_format($efektif,"Y-m-d");
	}

  $temp = explode(".", $_FILES["iuranpasti"]["name"]);
	$newfilename = "Data MPIP JiwaSraya - update  ".$date.' by '.$_SESSION['admin'].'.'. end($temp);
move_uploaded_file($_FILES["iuranpasti"]["tmp_name"], "exceliuranpasti/" . $newfilename);
	$Filepath="exceliuranpasti/".$newfilename;
	// Excel reader from http://code.google.com/p/php-excel-reader/
	require('php-excel-reader/excel_reader2.php');
	require('SpreadsheetReader.php');
$sql="START TRANSACTION;";
		$sql.="truncate table iuranpasti;";
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

				//`npp`, `nomor_peserta`, `akumulasi_iuran`, `akumulasi_hasil`, `akumulasi_dana`, `tanggal_masuk`, `tanggal_pensiun`, `iuran_bulanan`
				
				$npp=$Row[3];
				$nomor_peserta=$Row[1];
				$akumulasi_iuran=$Row[4];
				$akumulasi_hasil=$Row[5];
				$akumulasi_dana=$Row[6];
				$tanggalmasuks = str_replace('/', '-', $Row[7]);
				$tanggalpensiuns = str_replace('/', '-', $Row[8]);
				$tanggalmasuk=date("Y-m-d",strtotime($tanggalmasuks));
				$tanggalpensiun=date_format(date_create($tanggalpensiuns),"Y-m-d");
				$iuran_bulanan=$Row[9];
				
				if(strlen($npp)==4){
					$npp="0".$npp;
				}
				
				 if($Key>=8){
						
				 $sql.="insert into iuranpasti values('$npp','$nomor_peserta','$akumulasi_iuran','$akumulasi_hasil','$akumulasi_dana','$tanggalmasuk','$tanggalpensiun','$iuran_bulanan');";
						
					
			  }
				}
			}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
		header('location:iuranpasti.php?status=FALSE');
	}
	$updater=$_SESSION['admin'];
  	$sql.="COMMIT;";
	mysqli_query($DBcon,"insert into iuranpasti_log values('','$updater','$tanggalefektif',NOW());");
 	if ($DBcon->multi_query($sql) === TRUE) {
     $DBcon->close();

     header('location:iuranpasti.php?status=TRUE');
 } else {
     echo "Error: " . $sql . "<br>" . $DBcon->error;
 }


?>