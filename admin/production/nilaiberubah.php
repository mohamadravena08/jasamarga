<?php
error_reporting(0);
session_start();
include("../../library/koneksi.php");
if(!isset($_SESSION["admin"])){
  echo "<script language='javascript'>alert('Maaf Anda Belum Login!')</script>";
  header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nilai Persentase Yang Berlaku</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
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
          <?php include_once("header.php");?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <!-- page content -->
        
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Berikut Nilai Persentase Yang Berlaku</h3>
              </div>


            </div>

            <div class="clearfix"></div>
 <!-- Small modal -->
                  <?php $query = mysqli_query($DBcon, "select * from nilai_persentase where nama_kenaikan = 'gaji_pokok'");
                    $angka = mysqli_fetch_array($query);
                    $kenaikangajipokok=$angka['angka'];
                    $query2 = mysqli_query($DBcon, "select * from nilai_persentase where nama_kenaikan = 'phdp'");
                    $angka2 = mysqli_fetch_array($query2);
                    $kenaikanphdp=$angka2['angka'];
                    $query3 = mysqli_query($DBcon, "select * from nilai_persentase where nama_kenaikan = 'jht'");
                    $angka3 = mysqli_fetch_array($query3);
                    $kenaikanjht=$angka3['angka'];
                    $query4 = mysqli_query($DBcon, "select * from nilai_persentase where nama_kenaikan = 'iuran_pasti'");
                    $angka4 = mysqli_fetch_array($query4);
                    $kenaikan_iuranpasti=$angka4['angka'];
                    $query5 = mysqli_query($DBcon, "select * from nilai_persentase where nama_kenaikan = 'bunga_jp'");
                    $angka5 = mysqli_fetch_array($query5);
                    $kenaikan_JP=$angka5['angka'];

                    ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Edit Nilai Persentase Disini</button>

                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Edit Persentase Kenaikan Gaji Pokok</h4>
                        </div>
                        <div class="modal-body">
                          <form action="editnilaipersentase.php" method="POST" id="demo-form2"  class="form-horizontal form-label-left">               
              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gajipokok">Gaji Pokok</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="gajipokok" type="number" min="0" step="0.01" id="gajipokok" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $kenaikangajipokok;?>">
              </div>
              </div>
              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phdp">PhDP</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="phdp" type="number" min="0" step="0.01" id="phdp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $kenaikanphdp;?>">
              </div>
              </div>
              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jht">Bunga JHT</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="jht" type="number" min="0" step="0.01" id="jht" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $kenaikanjht;?>">
              </div>
              </div>
              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="iuranpasti">Bunga Iuran Pasti</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="iuranpasti" type="number" step="0.01" min="0" id="iuranpasti" value="<?php echo $kenaikan_iuranpasti;?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
              </div>

              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="iuranpasti">Bunga Jaminan Pensiun</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="jpensiun" type="number" step="0.01" min="0" id="iuranpasti" value="<?php echo $kenaikan_JP;?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="editnilaipersentase">Simpan</button>
            </div>
          </form>

          

                      </div>
                    </div>
                  </div>
                  <!-- /modals -->
            <div class="row">
              <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Persentase Kenaikan Gaji Pokok <small>(dalam persen)</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h1>
                      <?php 
                       

                        echo $angka['angka'];
                      ?>%
                    </h1>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Persentase Kenaikan PhDP <small>(dalam persen)</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h1>
                      <?php 
                        $query = mysqli_query($DBcon, "select * from nilai_persentase where nama_kenaikan = 'phdp'");
                        $angka = mysqli_fetch_array($query);

                        echo $angka['angka'];

                      ?>%
                    </h1>
                  </div>
                </div>
              </div>

               <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Persentase Bunga Pengembangan JHT <small>(dalam persen)</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h1>
                      <?php 
                        $query = mysqli_query($DBcon, "select * from nilai_persentase where nama_kenaikan = 'jht'");
                        $angka = mysqli_fetch_array($query);

                        echo $angka['angka'];

                      ?>%
                    </h1>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Persentase Bunga Pengembangan Manfaat Iuran Pasti <small>(dalam persen)</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h1>
                      <?php 
                        $query = mysqli_query($DBcon, "select * from nilai_persentase where nama_kenaikan = 'iuran_pasti'");
                        $angka = mysqli_fetch_array($query);

                        echo $angka['angka'];

                      ?>%
                    </h1>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Persentase Bunga Pengembangan Jaminan Pensiun  <small>(dalam persen)</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <h1>
                      <?php 
                        $query = mysqli_query($DBcon, "select * from nilai_persentase where nama_kenaikan = 'bunga_jp'");
                        $angka = mysqli_fetch_array($query);

                        echo $angka['angka'];

                      ?>%
                    </h1>
                  </div>
                </div>
              </div>


            </div>
          </div>
         </div> 
        <!-- /page content -->

        <!-- /page content -->

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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="../vendors/cropper/dist/cropper.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
    <!-- Initialize datetimepicker -->
<script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
  </body>
</html>