<?php
/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */
session_start();
  error_reporting(0);
  include '../../library/koneksi.php';

	$Filepath=basename($_FILES['payroll']['name']);
	 move_uploaded_file($Filepath, "./");

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
				$npp=$Row[2];
				$unitkerja=$Row[3];
				$jabatan=$Row[4];
				$gajipokok=$Row[18];
				$phdp=$Row[14];
				$totalterima=$Row[203];
				$totalpotongan=$Row[204];
				$terimabersih=$Row[205];
				if(strlen($npp)==4){
					$npp="0".$npp;
				}

				if($Key>8&&$Row[8]=="TETAP"){
						
						$sql.="insert into payrolls values('$npp','$unitkerja','$jabatan','$gajipokok','$phdp','$totalterima','$totalpotongan','$terimabersih');";
						
					
				}
				}
			}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
		// header('location:payroll.php?status=FALSE');
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