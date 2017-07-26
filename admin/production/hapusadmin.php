<?php
include '../../library/koneksi.php';
// menyimpan data id kedalam variabel
$id_admin   = $_GET['id_admin'];
// query SQL untuk delet data
$query="DELETE from admin where id_admin='$id_admin'";
mysqli_query($DBcon, $query);
// mengalihkan ke halaman index.php
header("location:administrator.php");
?>