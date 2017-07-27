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
      $updateBy=mysqli_fetch_array(mysqli_query($DBcon,"select * from payroll_log order by timestamp desc"));
      $updater=$updateBy['updater'];
      $waktu=$updateBy['timestamp'];
    ?>

    <html lang="en">
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tabel Payroll</title>

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
                              <b>Tabel Payrol Berhasil Diperbarui!. Refresh sampai tabel penuh/sesuai dengan jumlah entry</b>
                          </div><center>";
              else if(isset($_GET['status'])&&$status===FALSE) echo "<center><div class='alert alert-warning alert-dismissable'>
                                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <b>Tabel Payroll Gagal Diperbarui. Periksa Kembali file</b>
                          </div><center>";?>


            <div class="right_col" role="main">
              <div class="">

                <div class="clearfix"></div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Data Payroll Bulanan<small>terakhir diperbarui pada : <strong><?php echo $waktu;?></strong> oleh : <strong><?php echo $updater;?></strong></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <?php
                                $no = 1;
                                $res = mysqli_query($DBcon,"select * from payroll");
                                if(mysqli_num_rows($res)>0){?>
                      <div class="x_content">
                      <center><div>
        <h3>Upload File Payroll Terbaru</h3>
            <form method="post" action="prosesPayroll.php" enctype="multipart/form-data">
                      <input type="file" name="payroll">
                      <button class="right" value=1 type="submit" name="kirim">Upload</button>
                      </form>
    </div></center>
                        <p class="text-muted font-13 m-b-30">
                          Tabel berisi data Payroll Gaji Bulanan
                        </p>
                        <table id="dataTables" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                             <th>PERIODE</th>
                              <th>NPP</th>
                              <th>NAMA LENGKAP</th>
                              <th>PAYROLL_GROUP</th>
                              <th>ORG_NAME</th>
                              <th>POS_NAME</th>
                              <th>BALANCE_NAME</th>
                              <th>REPORTING_NAME</th>
                              <th>BVALUE</th>
                              <th>EFFECTIVE_DATE</th>
                            </tr>
                          </thead>


                          <tbody>
                            <?php
                                
                                while($row = $res->fetch_assoc()){
                                  $npp=$row['ASSIGNMENT_NUMBER'];
                                  $emp=mysqli_fetch_array(mysqli_query($DBcon,"select * from pegawai where npp='$npp'"));
                                  $nama=$emp['nama'];
                                  echo '
                                  <tr>
                                    <td>'.$row['PERIOD'].'</td>
                                    <td>'.$row['ASSIGNMENT_NUMBER'].'</td>
                                    <td>'.$nama.'</td>
                                     <td>'.$row['PAYROLL_GROUP'].'</td>
                                    <td>'.$row['ORG_NAME'].'</td>
                                    <td>'.$row['POS_NAME'].'</td>
                                     <td>'.$row['BALANCE_NAME'].'</td>
                                    <td>'.$row['REPORTING_NAME'].'</td>
                                    <td>'.rupiah($row['BVALUE']).'</td>
                                    <td>'.$row['EFFECTIVE_DATE'].'</td>
                                  </tr>
                                  ';
                                  $no++;
                                }
                                ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

            <!-- /page content -->
    <?php } else { echo "<center>Tabel Payroll Kosong</center>";?>
    <center><div>
    <h3>Upload File Payroll Terbaru</h3>
            <form method="post" action="prosesPayroll.php" enctype="multipart/form-data">
                      <input type="file" name="payroll">
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

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
          <script>
            $(document).ready(function() {
              $('#dataTables').DataTable();
            } );
          </script>

      </body>
    </html>