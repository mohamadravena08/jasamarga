<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rekap Pensiun</title>

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
              
<div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
                  <li><a><i class="fa fa-table"></i>Master Tabel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="pegawai.php">Pegawai</a></li>
                      <li><a href="payroll.php">Payroll</a></li>
                      <li><a href="nilai_sekaligus.php">Nilai Sekaligus</a></li>
                      <li><a href="nilai_sekarang.php">Nilai Sekarang</a></li>
                      <li><a href="penghargaan_masa_kerja.php">Penghargaan Masa Kerja</a></li>
                      <li><a href="pesangon.php">Pesangon</a></li>
                      <li><a href="purna_karya.php">Purna Karya</a></li>
                      <li><a href="purna_karya_dini.php">Purna Karya Dini</a></li>
                      <li><a href="purna_karya_kepesertaan.php">Purna Karya Kepesertaan</a></li>
                      <li><a href="iuranpasti.php">Tabel Manfaat Pasti Iuran Pasti</a></li>
                      <li><a href="bpjstk.php">Tabel Manfaat BPJSTk</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i>Data Admin<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="administrator.php">Administrator</a></li>
                      <li><a href="tambahadmin.php">Tambah Admin</a></li>
                    </ul>
                  </li>
                  <li><a href="nilaiberubah.php"><i class="fa fa-bar-chart-o"></i>Nilai Persentase</a></li>
                  <li><a href="rekappensiun.php"><i class="fa fa-folder"></i>Rekap Pensiun</a></li>
                </ul>
              </div>            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.jpg" alt="">Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Rekap Pensiun <small>terakhir diperbarui pada : 2017-08-07 14:06:03 oleh <strong>Iqbal</strong></small></h2>

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Tabel ini berisi data pegawai Jasa Marga.
                    </p>
                    <table id="dataTables" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NPP</th>
                          <th>Nama Pegawai</th>
                          <th>Jenis Kelamin</th>
                          <th>Tanggal Lahir</th>
                          <th>Tanggal Pensiun Normal</th>
                          <th>Manfaat Bulanan</th>
                          <th>Manfaat Sekaligus</th>
                          <th>JHT</th>
                          <th>Tunjangan Purna Karya</th>
                          <th>Uang Penggantian Hak</th>
                          <th>Jumlah Manfaat Sekaligus<th>
                        </tr>
                      </thead>


                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

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