<?php

include "../../library/koneksi.php";
function manfaat_pasti($npp){
	$pegawai=mysqli_fetch_assoc(mysqli_query($DBCon,"select * from pegawai where npp='$npp'"));
	$bakti=$pegawai['mulai_bakti'];
	$lahir=$pegawai['tanggal_lahir'];
	$masa_kerja = $today->diff($bakti)->y;
	$usia=$today->diff($lahir)->y;
	$nilai=mysqli_fetch_assoc(mysqli_query($DBCon,"select * from nilai_sekarang where usia_bayar='$usia'"));
	$gaji=
	$hasil=$nilai
	
}