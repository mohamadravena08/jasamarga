<?php
/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */
date_default_timezone_set("Asia/Jakarta");
session_start();
  error_reporting(0);
  include '../../library/koneksi.php';
	$date = date("d-M-Y His");
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
				if($Key>0){
				$npp=$Row[5];
				$unitkerja=$Row[6];
				$jabatan=$Row[7];
				$gajipokok=$Row[21];
				$phdp=$Row[17];
				$totalterima=$Row[206];
				$totalpotongan=$Row[207];
				 $terimabersih=$Row[208];
				if(strlen($npp)==4){
					$npp="0".$npp; }
				 $tunjangan_struktural=$Row[42];
				 $tunjangan_fungsional=$Row[44];
				$tunjangan_operasional=$Row[47];
				// 	npp	unit_kerja	jabatan	gaji_pokok	phdp	tunjangan_struktural	tunjangan_fungsional	tunjangan_operasional	total_penerimaan	total_potongan	penerimaan_bersih
				
						
				$sql.="insert into payrolls values('$npp','$unitkerja','$jabatan','$gajipokok','$phdp','$tunjangan_struktural','$tunjangan_fungsional','$tunjangan_operasional','$totalterima','$totalpotongan','$terimabersih');";
				}
			}
		
	}
}
	catch (Exception $E)
	{
		echo $E -> getMessage();
		header('location:payroll.php?status=FALSE');
	}
	$updater=$_SESSION['admin'];
 $sql.="COMMIT;";
	mysqli_query($DBcon,"insert into payroll_log values('','$updater',NOW());");
 	if ($DBcon->multi_query($sql) === TRUE) {
     $DBcon->close();

     header('location:payroll.php?status=TRUE');
 } else {
     echo "Error: " . $sql . "<br>" . $DBcon->error;
 }


?>