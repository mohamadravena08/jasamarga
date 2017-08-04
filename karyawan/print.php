<?php ob_start(); ?>
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
<html>
<head>
  <title>Cetak Hasil Simulasi</title>
    
   <style>
   table {border-collapse:collapse; table-layout:fixed;width: 630px;}
   table td {word-wrap:break-word;width: 20%;}
   </style>
</head>
<body>
  
<h1 style="text-align: center;">Hasil Simulasi Pensiun</h1>
<table border="1" width="100%">
<tr>
  <th>Nomor</th>
  <th>Manfaat Yang Diterima</th>
  <th>Jumlah</th>
</tr>
<?php
 
$query = "SELECT * FROM siswa"; // Tampilkan semua data gambar
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
 
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
        echo "<tr>";
        echo "<td>".$data['nis']."</td>";
        echo "<td>".$data['nama']."</td>";
        echo "<td>".$data['jenis_kelamin']."</td>";
        echo "<td>".$data['telp']."</td>";
        echo "<td>".$data['alamat']."</td>";
        echo "</tr>";
    }
}else{ // Jika data tidak ada
    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Siswa.pdf', 'D');
?>