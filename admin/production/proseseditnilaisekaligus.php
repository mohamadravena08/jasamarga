<?php
    include "../../library/koneksi.php";
    
    $id = $_POST['id'];
    $umur = $_POST['umur'];
    $M1 = $_POST['M1'];
    $M2 = $_POST['M2'];
    $M3 = $_POST['M3'];
    $M4 = $_POST['M4'];
    $F1 = $_POST['F1'];
    $F2 = $_POST['F2'];
    $F3 = $_POST['F3'];
    $F4 = $_POST['F4'];

    $sql = mysql_query("UPDATE nilai_sekaligus SET umur = '$umur', M1 = '$M1', M2 = '$M2', M3 = '$M3', M4 = '$M4', F1 = '$F1', F2 = '$F2', F3 = '$F3', F4 = '$F4' WHERE id=$id");
    if ($sql) {
        //jika  berhasil tampil ini
        echo "Data Berhasil Diubah"."</br>";
        echo "<a href='nilai_sekaligus.php'>Kembali Ke Halaman Bilai Sekaligus</a>";
    } else {
        // jika gagal tampil ini
        echo "Gagal Update: ";
    }
?>