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
    ?>

    <html lang="en">
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rekap Pensiun Dini</title>

         <link href="https://code.jquery.com/ui/jquery-ui-git.css" rel='stylesheet' type='text/css' />
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
a
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
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Rekap Pensiun Dini<small> <strong>SIMPENSIUN</strong></small></h2>

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
                  $bulanini=date('m');
                  $tahunini=date('Y');
                  $tahunlahir=$tahunini-56;
                  $pegawaipensiun=mysqli_query($DBcon,"select * from pegawai where month(tanggal_lahir)='$bulanini' and year(tanggal_lahir)='$tahunlahir'");?>
                    <center><div>
        <h3>Pilih Tanggal Pensiun Dini</h3>
            <form id="eventForm" method="get" action="" style="text-align: center"> 
            <div class="form-group" >
              <label for="sel1" >pilih disini</label>
              <div class="input-group input-append date" id="txtdate" style="width: 50%; margin:auto">
                 <input type="text" id="single_cal1" class="form-control" name="tanggalpensiun" value=<?php $pensiun = date_create($_GET['tanggalpensiun']); $rencana = date_format($pensiun, "d-M-Y");?>>
                  
                  <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            </div>

             <button type="submit" class="btn btn-primary">Lihat Rekap</button>
            </form>
 <?php 
          $bulanini=date_format($pensiun, "m");
          $tahunini=date_format($pensiun, "Y");
          $tahunlahir=$tahunini-56;
          $pegawaipensiun=mysqli_query($DBcon,"select * from pegawai");?>

                      
    </div></center>
                  <div class="x_content">
                    <center><p class="text-muted font-13 m-b-30">
                      Berikut Simulasi Pensiun Dini Karyawan pada <strong><?php echo $rencana; ?></strong> .
                    </p></center>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NPP</th>
                          <th>Nama Pegawai</th>
                          <th>Jenis Kelamin</th>
                          <th>Tanggal Lahir</th>
                          <th>Tanggal Pensiun Normal</th>
                          <th>Gaji Pokok</th>
                          <th>Manfaat Program Iuran Pasti</th>
                          <th>Manfaat Bulanan Alt 1</th>
                          <th>Manfaat Sekaligus Alt 1</th>
                          <th>Manfaat Bulanan Alt 2</th>
                          <th>Manfaat Sekaligus Alt 2</th>
                          <th>JHT</th>
                          <th>Tunjangan Purna Karya</th>
                          <th>Uang Penggantian Hak</th>
                          <th>Total Alt1</th>
                          <th>Total Alt2</th>
                        </tr>
                      </thead>


                      <tbody>
    <?php $no=0; while($datapensiun=mysqli_fetch_assoc($pegawaipensiun)){
      $total1=0; $total2=0;
    $no++;
    $npp=$datapensiun['npp'];
    $kategori=$datapensiun['kategori_tanggungan'];
    $tanggalpensiunnormal1=date_create($datapensiun['tanggal_lahir']);
    date_add($tanggalpensiunnormal1, date_interval_create_from_date_string('56 years'));
    $tanggalpensiunnormal=date_format($tanggalpensiunnormal1,"d-M-Y");
    $haripensiun=$tanggalpensiunnormal1;
    $gaji      = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from payrolls where npp ='$npp'"));
    $gajipokok = $gaji['gaji_pokok'];
    $phdp      = $gaji['phdp'];
    $usia       = 56;
    $bakti      = new DateTime($datapensiun['mulai_bakti']);
    $masabakti  = $haripensiun->diff($bakti)->y;
    $bulanbakti = $haripensiun->diff($bakti)->m;
    $haribakti  = $haripensiun->diff($bakti)->d;
    $ns         = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from nilai_sekarang where usia_bayar=$usia"));
    $nilai_sekarang  = $ns['nilai_sekarang'];
    $nsekaligus      = mysqli_fetch_assoc(mysqli_query($DBcon, "select $kategori from nilai_sekaligus where usia=$usia"));
    $nilai_sekaligus = $nsekaligus[$kategori];
    $total = 0;
    $const = 0.025;

 if((int)$npp>=10397){
      $tabeliuranpasti=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from iuranpasti"));
      $danaterkini=$tabeliuranpasti['akumulasi_dana'];
      $iuranbulananpasti=$tabeliuranpasti['iuran_bulanan'];
      $tanggalefektifdana2= date_create($tanggalefektifdanas['efektif_sejak']);
      $tanggalefektifdana=date_format($tanggalefektifdana2,"Y-m-d");
      $bedatahundana=$haripensiun->diff($tanggalefektifdana2)->y;
      $bedabulandana=$haripensiun->diff($tanggalefektifdana2)->m;
      $akumulasidanabaru=$danaterkini;
      for($i=0;$i<$bedatahundana;$i++){
        $akumulasidanabaru+=$iuranbulananpasti*12;
        $iuranbulananpasti+=$kenaikanPhdp*$iuranbulananpasti;
        $akumulasidanabaru+=$kenaikan_iuranpasti*$akumulasidanabaru;
      }
      $akumulasidanabaru+=$bedabulandana*$iuranbulananpasti;
    $total1+=$akumulasidanabaru;
    $total2+=$akumulasidanabaru;
            }
else {
    $manfaatbulantemp = $nilai_sekarang * $const * $phdp * $masabakti;
    if($manfaatbulantemp>1500000){
        $manfaatbulan1=$manfaatbulantemp;
        $manfaatbulan2=0.8*$manfaatbulantemp;
        $manfaatsekaligus1=0;
        $manfaatsekaligus2=0.2*$nilai_sekaligus*$manfaatbulantemp;
    }
    else {
        $manfaatbulan1=$manfaatbulantemp;
        $manfaatbulan2=0;
        $manfaatsekaligus1=0;
        $manfaatsekaligus2=$nilai_sekaligus*$manfaatbulantemp;
    }
    $total1+=$manfaatsekaligus1+$manfaatbulan1;
    $total2+=$manfaatsekaligus2+$manfaatbulan2;
  }
    $tanggalefektifs=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from bpjstk_log order by timestamp desc"));
      $tanggalefektif2= date_create($tanggalefektifs['efektif_sejak']);
      $tanggalefektif=date_format($tanggalefektif2,"Y-m-d");
      $tabelbpjstk=mysqli_fetch_assoc(mysqli_query($DBcon,"select * from bpjstk where npp='$npp'"));
      $saldoterkini=$tabelbpjstk['saldo_akhirJHT'];
      $iuran=$tabelbpjstk['iuranbulanan'];
      $tahunefektif=date_format($tanggalefektif2,"Y");
      $bedatahunjht=$haripensiun->diff($tanggalefektif2)->y;
      $bedabulanjht=$haripensiun->diff($tanggalefektif2)->m;
      $akumulasiiuran=$saldoterkini;
      for($i=0;$i<$bedatahunjht;$i++){
        $akumulasiiuran+=$iuran*12;
        $iuran+=$iuran*$kenaikanGajipokok;
        $pengembangan=$akumulasiiuran*$kenaikanJHT;
        $akumulasiiuran+=$pengembangan;
      }
      $akumulasiiuran+=$bedabulanjht*$iuran;
      $nilaijht=$akumulasiiuran;
      $total1+=$nilaijht;
      $total2+=$nilaijht;

      $baktiup = $masabakti + 1;
        $usiaup = $usia + 1;
        if ($usia < 46){
            if ($usiamasuk <= 30){
                $faktor = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya_kepesertaan where tahun_berakhir=$masabakti"));
                $faktor2 = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya_kepesertaan where tahun_berakhir=$baktiup"));
                $nilai1 = $faktor['faktor_tunai'];
                $nilai2 = $faktor2['faktor_tunai'];
                if ($bulanbakti > 0) $faktorkalitambah = ($bulanbakti / 12) * ($nilai2 - $nilai1);
                    else $faktorkali = $nilai1;
                }
            
            else{
                $faktor = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya_dini where usia=$usia"));
                $faktor2 = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya_dini where usia=$usiaup"));
                $nilai1 = $faktor['faktor_tunai'];
                $nilai2 = $faktor2['faktor_tunai'];
                if ($bulanbakti > 0) $faktorkalitambah = ($bulanbakti / 12) * ($nilai2 - $nilai1);
                      else $faktorkali = $nilai1;
                
                }
            }

          else {
            $faktor = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya where usia=$usia"));
            $faktor2 = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya where usia=$usiaup"));
            $nilai1 = $faktor['nilai_pk'];
            $nilai2 = $faktor2['nilai_pk'];
            
            $faktorkalitambah = 0;

            $purnakarya = ($gajipokok * $nilai1) + ($gajipokok * $faktorkalitambah);}

            $total1+=$purnakarya;
            $total2+=$purnakarya;

          if($usia<46){
            $flag=" (ditunda)";
          } else $flag = "";
          echo '
          <tr>
            <td>'.$no.'</td>
            <td>'.$datapensiun['npp'].'</td>
            <td>'.$datapensiun['nama'].'</td>
            <td>'.$datapensiun['jenis_kelamin'].'</td>
            <td>'.date_format(date_create($datapensiun['tanggal_lahir']),"d-M-Y").'</td>
            <td>'.$tanggalpensiunnormal.'</td>
            <td>'.rupiah($gajipokok).'</td>
            <td>'.rupiah($akumulasidanabaru).'</td>
            <td>'.rupiah($manfaatbulan1).$flag.'</td>
            <td>'.rupiah($manfaatsekaligus1).$flag.'</td>
            <td>'.rupiah($manfaatbulan2).$flag.'</td>
            <td>'.rupiah($manfaatsekaligus2).$flag.'</td>
            <td>'.rupiah($nilaijht).'</td>
            <td>'.rupiah($purnakarya).'</td>
            <td>UNKNOWN</td>
            <td>'.rupiah($total1).'</td>
            <td>'.rupiah($total2).'</td>'
            ;}?>

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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

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
                buttons: [
            'print'
        ]

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


          <script type="text/javascript">
            $(function() {               
                $("#datepicker" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                  });});
            </script>


      </body>
    </html>