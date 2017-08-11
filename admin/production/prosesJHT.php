<?php
/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */
date_default_timezone_set("Asia/Jakarta");
session_start();
  error_reporting(0);
  include '../../library/koneksi.php';
$date = date("d-M-Y His");
	if(isset($_POST['tanggalefektif'])) $tanggalefektif=$_POST['tanggalefektif'];
  $temp = explode(".", $_FILES["jht"]["name"]);
	$newfilename = "DataJHT - update  ".$date.' by '.$_SESSION['admin'].'.'. end($temp);
move_uploaded_file($_FILES["jht"]["tmp_name"], "exceljht/" . $newfilename);
	$Filepath="exceljht/".$newfilename;
	// Excel reader from http://code.google.com/p/php-excel-reader/
	require('php-excel-reader/excel_reader2.php');
	require('SpreadsheetReader.php');
$sql="START TRANSACTION;";
		$sql.="truncate table jht;";
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
				$nokjp=$Row[1];
				$nilai_rupiah=$Row[3];
				if(strlen($npp)==4){
					$npp="0".$npp;
				}
				
				if($Key>0){
						
						$sql.="insert into jht values('$npp','$nokjp','$nilai_rupiah');";
						
					
				}
				// print_r($Row);
				}
			}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
		// header('location:jaminan_haritua.php?status=FALSE');
	}
	$updater=$_SESSION['admin'];
	
 	$sql.="COMMIT;";
	mysqli_query($DBcon,"insert into jht_log values('','$updater','',NOW());");
 	if ($DBcon->multi_query($sql) === TRUE) {
     $DBcon->close();

     header('location:jaminan_haritua.php?status=TRUE');
 } else {
     echo "Error: " . $sql . "<br>" . $DBcon->error;
 }


?>