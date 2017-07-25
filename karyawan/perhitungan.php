<?php 

function manfaat_bulanan($nilai_sekarang, $phdp, $masa_kerja, $npp){
	if(isset($npp)){
    	$sql = mysql_query("select nama_produk from produk where npp='$id'");
    	$j   = mysql_fetch_array($sql);
    echo $j['nama_produk'];
 	 }
  	else{
    echo "Website Penjualan Rumah";
  }
}



?>