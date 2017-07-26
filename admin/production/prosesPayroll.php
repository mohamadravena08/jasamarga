<?php
/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */
  error_reporting(0);
  include '../../library/koneksi.php';

	$Filepath=basename($_FILES['payroll']['name']);
	 move_uploaded_file($Filepath, "./");

	// Excel reader from http://code.google.com/p/php-excel-reader/
	require('php-excel-reader/excel_reader2.php');
	require('SpreadsheetReader.php');

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
				$period=$Row[0];
				$Asgnum=$Row[1];
				
				$pgroup=$Row[3];
				$org=$Row[4];
				$pos=$Row[5];
				$bal=$Row[6];
				$rep=$Row[7];
				$effs=date_create($Row[8]);
				$eff=date_format($effs,"Y-m-d G:i:s");
				$val=$Row[9];
					if($Key>1&&$Row[7]=="Gaji Pokok."){
						if($Key==2){
					$sql="insert into payroll values('','$period','$Asgnum','$pgroup','$org','$pos','$bal','$rep','$eff','$val');";}
					else {
						$sql.="insert into payroll values('','$period','$Asgnum','$pgroup','$org','$pos','$bal','$rep','$eff','$val');";
						// print_r($Row)."<br>";
					}
				}
				}
			}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
	}
	if ($DBcon->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $DBcon->error;
}

$DBcon->close();
echo $sql;
	// header('location:payroll.php');
?>
