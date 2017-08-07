<?php
/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */
date_default_timezone_set("Asia/Jakarta");
session_start();
  error_reporting(0);
  include '../../library/koneksi.php';
  $date = date("d-M-Y His");

  $temp = explode(".", $_FILES["pegawai"]["name"]);
	$newfilename = "DataPegawai - update  ".$date.' by '.$_SESSION['admin'].'.'. end($temp);
move_uploaded_file($_FILES["pegawai"]["tmp_name"], "excelpegawai/" . $newfilename);
	$Filepath="excelpegawai/".$newfilename;
	 	// Excel reader from http://code.google.com/p/php-excel-reader/
	require('php-excel-reader/excel_reader2.php');
	require('SpreadsheetReader.php');
$sql="START TRANSACTION;";
		$sql.="truncate table pegawai;";
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
				$npp=$Row[0];
				if(strlen($npp)==4){
					$npp="0".$npp;
				}
				$nama=mysqli_escape_string($DBcon,$Row[1]);
				$jk=$Row[2];
				$status=$Row[3];
				$jumlah_anak=$Row[4];
				$lahirs=date_create($Row[5]);
				$baktis=date_create($Row[6]);
				$lahir=date_format($lahirs,"Y-m-d");
				$bakti=date_format($baktis,"Y-m-d");
				$tanggungan=$Row[7];
				$password=$Row[8];
				if($Key>0){
					$sql.="insert into pegawai values('$npp', '$nama', '$status', '$jumlah_anak', '$lahir', '$bakti', '$tanggungan', '$jk', '$password');";
				}
				}
			}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
		header('location:pegawai.php?status=FALSE');
	}
	$updater=$_SESSION['admin'];
 	$sql.="COMMIT;";
 	// echo $sql."<br><br><br><br>";
 	// echo $Filepath;

	mysqli_query($DBcon,"insert into pegawai_log values('','$updater',NOW());");
 	if ($DBcon->multi_query($sql) === TRUE) {
     $DBcon->close();

     header('location:pegawai.php?status=TRUE');
 } else {
     echo "Error: " . $sql . "<br>" . $DBcon->error;
 }


?>