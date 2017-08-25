<?php
include("../../library/koneksi.php");
                      if(isset($_POST["editnilaipersentase"])){

                        $gajipokok      = $_POST['gajipokok'];
                        $phdp           = $_POST['phdp'];
                        $jht            = $_POST['jht'];
                        $iuranpasti     = $_POST['iuranpasti'];
                        
                        
                        // query SQL untuk insert data
                        $query1="UPDATE nilai_persentase SET angka ='$gajipokok' WHERE id_nilai_kenaikan='1'";
                        mysqli_query($DBcon, $query1);
                        $query2="UPDATE nilai_persentase SET angka ='$phdp' WHERE id_nilai_kenaikan='2'";
                        mysqli_query($DBcon, $query2);
                        $query3="UPDATE nilai_persentase SET angka ='$jht' WHERE id_nilai_kenaikan='3'";
                        mysqli_query($DBcon, $query3);
                        $query4="UPDATE nilai_persentase SET angka ='$iuranpasti' WHERE id_nilai_kenaikan='4'";
                        mysqli_query($DBcon, $query4);
                        // mengalihkan ke halaman index.php
                        
                          echo "<center><div class='alert alert-success alert-dismissable'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <b>Berhasil update nilai persentase!!</b>
                          </div><center>";
                          header("location:nilaiberubah.php");

                     

                    if(!$query) {
                        echo "<center><div class='alert alert-warning alert-dismissable'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <b>Gagal merubah, coba lagi!!</b>
                          </div><center>";
                      } } 
                    ?>