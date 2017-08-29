<?php
/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */
date_default_timezone_set("Asia/Jakarta");
session_start();
  //error_reporting(0);
  include '../../library/koneksi.php';
	// $date = date("d-M-Y His");
	// $temp = explode(".", $_FILES["payroll"]["name"]);
	// $newfilename = "Data Payroll - update  ".$date.' by '.$_SESSION['admin'].'.'. end($temp);
  $filename=$_FILES['payroll']['name'];
// move_uploaded_file($_FILES["payroll"]["tmp_name"], "excelgaji/" . $newfilename);
	$Filepath="excelgaji/".$filename;
	// Excel reader from http://code.google.com/p/php-excel-reader/
	require('php-excel-reader/excel_reader2.php');
	require('SpreadsheetReader.php');
$sql="START TRANSACTION;";
		$sql.="truncate table payrolls;";
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
				echo $Key."<br>";
				print_r($Row) ;
				 
				}
			}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
		// header('location:payroll.php?status=FALSE');
	}
	// $updater=$_SESSION['admin'];
	
 //  	$sql.="COMMIT;";
	// mysqli_query($DBcon,"insert into bpjstk_log values('','$updater','$tanggalefektif',NOW());");
 // 	if ($DBcon->multi_query($sql) === TRUE) {
 //     $DBcon->close();

 //     header('location:bpjstk.php?status=TRUE');
 // } else {
 //     echo "Error: " . $sql . "<br>" . $DBcon->error;
 // }


?>


<!-- <?php
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

	$temp = explode(".", $_FILES["payroll"]["name"]);
	$newfilename = "Data Payroll - update  ".$date.' by '.$_SESSION['admin'].'.'. end($temp);
	move_uploaded_file($_FILES["payroll"]["tmp_name"], "excelgaji/" . $newfilename);
	$Filepath="excelgaji/".$newfilename;
	// Excel reader from http://code.google.com/p/php-excel-reader/
	require('php-excel-reader/excel_reader2.php');
	require('SpreadsheetReader.php');
$sql="START TRANSACTION;";
		$sql.="truncate table payrolls;";
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
				// $npp=$Row[2];
				// $unitkerja=$Row[3];
				// $jabatan=$Row[4];
				// $gajipokok=$Row[18];
				// $phdp=$Row[14];
				// $totalterima=$Row[203];
				// $totalpotongan=$Row[204];
				// $terimabersih=$Row[205];
				// if(strlen($npp)==4){
				// 	$npp="0".$npp;
				// }
				// $tunjangan_struktural=$Row[39];
				// $tunjangan_fungsional=$Row[41];
				// $tunjangan_operasional=$Row[43];
				// 	npp	unit_kerja	jabatan	gaji_pokok	phdp	tunjangan_struktural	tunjangan_fungsional	tunjangan_operasional	total_penerimaan	total_potongan	penerimaan_bersih
				// if($Key>8&&$Row[8]=="TETAP"){
						
				// 		$sql.="insert into payrolls values('$npp','$unitkerja','$jabatan','$gajipokok','$phdp','$tunjangan_struktural','$tunjangan_fungsional','$tunjangan_operasional','$totalterima','$totalpotongan','$terimabersih');";
						
					
				// }
				print_r($Row);
				}
			}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
		// header('location:payroll.php?status=FALSE');
	}
	echo $sql;
	$updater=$_SESSION['admin'];
	
 	$sql.="COMMIT;";
	mysqli_query($DBcon,"insert into payroll_log values('','$updater',NOW());");
 	if ($DBcon->multi_query($sql) === TRUE) {
     $DBcon->close();

     header('location:payroll.php?status=TRUE');
 } else {
     echo "Error: " . $sql . "<br>" . $DBcon->error;
 }


?> -->