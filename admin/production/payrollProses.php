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
		$sql.="truncate table payroll;";
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
				// $period=$Row[0];
				// $Asgnum=$Row[1];
				// $pgroup=$Row[3];
				// $org=$Row[4];
				// $pos=$Row[5];
				// $bal=$Row[6];
				// $rep=$Row[7];
				// $effs=date_create($Row[8]);
				// $eff=date_format($effs,"Y-m-d G:i:s");
				// $val=(int)$Row[9];
				// 	if($Key>1&&$Row[7]=="Gaji Pokok."){
						
				// 		$sql.="insert into payroll values('','$period','$Asgnum','$pgroup','$org','$pos','$bal','$rep','$eff','$val');";
						
					
				// }
				print_r($Row); echo '<br>';
				}
			}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
		// header('location:payroll.php?status=FALSE');
	}
// 	$updater=$_SESSION['admin'];
	
// 	$sql.="COMMIT;";
// 	mysqli_query($DBcon,"insert into payroll_log values('','$updater',NOW());");
// 	if ($DBcon->multi_query($sql) === TRUE) {
//     $DBcon->close();

//     header('location:payroll.php?status=TRUE');
// } else {
//     echo "Error: " . $sql . "<br>" . $DBcon->error;
// }


?>