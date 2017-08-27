<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
include("../../library/koneksi.php");
if(!isset($_SESSION["admin"])){
  echo "<script language='javascript'>alert('Maaf Anda Belum Login!')</script>";
  header("Location:../index.php");
}
      if(isset($_GET['status'])){
        $stat=$_GET['status'];
      }
      include_once("../../library/koneksi.php");
      include_once("../../library/fungsi_rupiah.php");
      $updateBy=mysqli_fetch_array(mysqli_query($DBcon,"select * from bpjstk_log order by timestamp desc"));
      $updater=$updateBy['updater'];
      $waktu=$updateBy['timestamp'];
      $efektif=$updateBy['efektif_sejak'];
    ?>

    <html lang="en">
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tabel JHT</title>

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">

        <!-- bootstrap-daterangepicker -->
        <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <!-- Ion.RangeSlider -->
        <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
        <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
        <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
        <!-- Bootstrap Colorpicker -->
        <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

        <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">



      </head>





        <body class="nav-md">
        <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="index.html" class="site_title"><i class="fa fa-users"></i> <span>SIMPENSIUN</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="images/user.jpg" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>Admin Jasa Marga</h2>
                  </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                 <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <?php include_once("sidebar.php"); ?>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <?php include_once("footer.php");?>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <?php include_once("header.php"); ?>
        </div>
        <!-- /top navigation -->

            <!-- page content -->
            <?php if($status)
            echo "<center><div class='alert alert-info alert-dismissable'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <b>Tabel JHT Berhasil Diperbarui!. Refresh sampai tabel penuh/sesuai dengan jumlah entry</b>
                          </div><center>";
              else if(isset($_GET['status'])&&$status===FALSE) echo "<center><div class='alert alert-warning alert-dismissable'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <b>Tabel JHT Gagal Diperbarui. Periksa Kembali file</b>
                          </div><center>";?>


            <div class="right_col" role="main">
              <div class="">

                <div class="clearfix"></div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                      
                        <h2>Data Tabel JHT dari BPJS Ketenagakerjaan <small>efektif sejak : <strong><?php echo $efektif;?></strong> terakhir diperbarui pada : <strong><?php echo $waktu;?></strong> oleh : <strong><?php echo $updater;?></strong></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                        <center><h5>Contoh file BPJS Ketenagakerjaan : <a target="blank" href="contohexcel/contoh%20tabel%20bpjstk.xlsx">Download</a></h5></center>
                      </div>
                      <?php
                                $no = 1;
                                $res = mysqli_query($DBcon,"select * from bpjstk");
                                if(mysqli_num_rows($res)>0){?>
                      
                      <center><div>
        <h3>Upload File Tabel BPJS Ketenagakerjaan Terbaru</h3>
            <form method="post" action="bpjstkProses.php" enctype="multipart/form-data">
                      <input type="file" name="jht" required>
                      <fieldset style="padding-top: 1em;margin-left: 25%;margin-right: 25%;">
                                <div class="control-group">
                                  <div class="controls">
                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="Tanggal Valid" aria-describedby="inputSuccess2Status" name="tanggalefektif">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                </div>
                        </fieldset>
                        <button class="right" value=1 type="submit" name="kirim">Upload</button>

                      </form>

                      
    </div></center>
                      <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                          Tabel berisi data JHT dari BPJS Ketenagakerjaan
                        </p>
                        <table id="dataTables" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                             <th>NPP</th>
                              <th>Nomor Referensi</th>
                              <th>Nama Lengkap</th>
                              <th>Jumlah Upah</th>
                              <th>Saldo Awal JHT</th>
                              <th>Saldo dari Cabang Lain</th>
                              <th>Iuran dari Cabang Lain</th>
                              <th>Iuran</th>
                              <th>Iuran Bulanan</th>
                              <th>Saldo Terkini JHT</th>
                              <th>Saldo Awal Tahun JP</th>
                              <th>Saldo Tahun Berjalan JP</th>
                              <th>Klaim JP</th>
                              <th>Masa Iuran</th>                       
                            </tr>
                          </thead>


                          <tbody>
                            <?php
                                while($row = $res->fetch_assoc()){
                                  $npp=$row['npp'];
                                  $emp=mysqli_fetch_array(mysqli_query($DBcon,"select * from pegawai where npp='$npp'"));
                                  $nama=$emp['nama'];
                                  echo '
                                  <tr>
                                    <td>'.$row['npp'].'</td>
                                    <td>'.$row['no_ref'].'</td>
                                    <td>'.$nama.'</td>
                                    <td>'.rupiah($row['jumlah_upah']).'</td>
                                    <td>'.rupiah($row['saldo_awalJHT']).'</td>
                                    <td>'.rupiah($row['saldo_cabanglain']).'</td>
                                    <td>'.rupiah($row['iuran_cabanglain']).'</td>
                                    <td>'.rupiah($row['iuran']).'</td>
                                    <td>'.rupiah($row['iuranbulanan']).'</td>
                                    <td>'.rupiah($row['saldo_akhirJHT']).'</td>
                                    <td>'.rupiah($row['saldo_awaltahunJP']).'</td>
                                    <td>'.rupiah($row['saldo_tahunberjalanJP']).'</td>
                                    <td>'.rupiah($row['klaim_JP']).'</td>
                                    <td>'.$row['masa_iur'].'</td>
                                  </tr>
                                  ';
                                  $no++;
                                }
                                ?>
                          </tbody>
                        </table>
                      </div>

            <!-- /page content -->
    <?php } else { echo "<center>Tabel JHT Kosong</center>";?>
    <center><div>
    <h3>Upload File BPJS Ketenagakerjaan Terbaru</h3>
            <form method="post" action="bpjstkProses.php" enctype="multipart/form-data">
                      <input type="file" name="jht" required>
                              <fieldset style="padding-top: 1em;margin-left: 25%;margin-right: 25%;">
                                <div class="control-group">
                                  <div class="controls">
                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="Tanggal Valid" aria-describedby="inputSuccess2Status" name="tanggalefektif" required>
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                </div>
                              </fieldset>
                      <button class="right" value=1 type="submit" name="kirim">Upload</button>
                      </form>
                      <?php } ?>
    </div></center>
            <!-- footer content -->
            <footer>
              <div class="pull-right">
                Sistem Simulasi Pensiun Jasa Marga</a>
              </div>
              <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
          </div>
        </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

        <!-- bootstrap-daterangepicker -->
        <script src="../vendors/moment/min/moment.min.js"></script>
        <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-datetimepicker -->    
        <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        <!-- Ion.RangeSlider -->
        <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
        <!-- Bootstrap Colorpicker -->
        <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
          <script>
            $(document).ready(function() {
              $('#dataTables').DataTable();
            } );
          </script>



          <script>
                $('#single_cal1').daterangepicker({
                  singleDatePicker: true,
                  singleClasses: "picker_1"
                }, function(start, end, label) {
                  console.log(start.toISOString(), end.toISOString(), label);
                });
          </script>

      </body>
    </html>