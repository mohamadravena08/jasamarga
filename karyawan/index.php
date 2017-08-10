
<?php
// error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
session_start();
include ("../library/koneksi.php");
include ("../library/fungsi_kalender.php");
include ("../library/fungsi_rupiah.php");

if (!isset($_SESSION["npp"]))
    {
      echo "<script language='javascript'>alert('Maaf Anda Belum Login!')</script>"; 
      header("Location:../index.php");
    }
$npp = $_SESSION['npp'];
$pegawai = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from pegawai where npp='$npp'"));
$tanggalpensiun_normal1 = date_create($pegawai['tanggal_lahir']);
date_add($tanggalpensiun_normal1, date_interval_create_from_date_string('56 years'));
$tanggalpensiun_normal = date_format($tanggalpensiun_normal1, 'Y, m, d');
$tanggalpensiun_normal2 = date_format($tanggalpensiun_normal1, 'd-M-Y');
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Simulasi Pensiun Karyawan Jasa Marga</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script> -->
<script src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(function() {               
    $("#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '2017:3000',
        minDate: 0,
        maxDate: new Date('<?php
echo $tanggalpensiun_normal;
?>'),
    });
});
</script>
<!-- Custom Theme files -->
<link href="css/dashboard.css" rel="stylesheet">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="https://code.jquery.com/ui/jquery-ui-git.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<!-- start menu -->
<style>
#parent {
   display: table;
   width: 100%;
}
#form_status {
   display: table-cell;
   text-align: center;
   vertical-align: middle;
}

@media print {
    .sidebar {
      display: none;
    }

    .ps {
      display: none;
    }

    .form-group {
      display: none;
    }

    .hd {
      display: none;
    }

    .btn {
      display: none;
    }


}

</style>
  
</head>

<body>
<!-- header -->
<?php
include_once ("sidebar.php");

?>

<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     <div class="content">
<!---->
        
        <h1 class="hd" style="text-align:center">Silahkan Pilih Status Pensiun Anda</h1>
        <div>
            <form id="eventForm" method="get" action="" style="text-align: center"> 
             <div class="form-group" >
              <label for="sel1" >Simulasi Dana Pensiun Jika Anda</label>
              <select name="status" class="form-control" class="text-center col-md-4 col-md-offset-4" style="width: 50%" style="vertical-align: middle" style="margin:auto" id="sel1" required>
                <option <?php if (!isset($_GET['status'])) echo "selected";?> disabled>Pilih Disini...</option>
                <option <?php if (isset($_GET['status']) && $_GET['status'] === "1") echo "selected";?> value="1">Pensiun Biasa</option>
                <option <?php if (isset($_GET['status']) && $_GET['status'] === "5") echo "selected";?> value="5">Mengundurkan Diri</option>
                <option <?php if (isset($_GET['status']) && $_GET['status'] === "2") echo "selected";?> value="2">Meninggal Dunia / Gugur Dalam Tugas</option>
                <option <?php if (isset($_GET['status']) && $_GET['status'] === "3") echo "selected";?> value="3">Cacat / Sakit Keras</option>
                 <option <?php if (isset($_GET['status']) && $_GET['status'] === "4") echo "selected";?> value="4">Ke Anak Perusahaan (KAP)</option>
                <option <?php if (isset($_GET['status']) && $_GET['status'] === "6") echo "selected";?> value="6">Dikenai Hukuman Disiplin Ringan</option>
                 <option <?php if (isset($_GET['status']) && $_GET['status'] === "7") echo "selected";?> value="7">Dikenai Hukuman Disiplin Berat</option>
                  <option <?php if (isset($_GET['status']) && $_GET['status'] === "8") echo "selected";?> value="8">Rasionalisasi</option>
                   <option <?php if (isset($_GET['status']) && $_GET['status'] === "9") echo "selected";?> value="9">Diangkat menjadi Direktur BUMN</option>
              </select>
            </div>
            <div class="form-group" >
              <label for="sel1" >pada tanggal</label>
              <div class="input-group input-append date" id="datePicker" style="width: 50%; margin:auto">
                 <input type="text" id="datepicker" class="form-control" name="tanggalpensiun" value=<?php if (!isset($_GET['status'])) echo $tanggalpensiun_normal2;  else   { $pensiun = date_create($_GET['tanggalpensiun']);
                  $rencana = date_format($pensiun, "d-M-Y");   echo $rencana;}?>>
                  
                  <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            </div>

             <button type="submit" class="btn btn-primary">Simulasi Sekarang</button>
            </form>
            
      </div> 
    <?php

if (isset($_GET['status'])) {
    $harisekarang=new DateTime('today');
    $pensiun = date_create($_GET['tanggalpensiun']);
    $rencana = date_format($pensiun, "Y-m-d");
    $haripensiun = new DateTime($rencana);
    $lahir = new DateTime($pegawai['tanggal_lahir']);
    $usia = $haripensiun->diff($lahir)->y;
    $bulanusia = $haripensiun->diff($lahir)->m;
    $hariusia = $haripensiun->diff($lahir)->d;
    $bakti = new DateTime($pegawai['mulai_bakti']);
    $masabakti = $haripensiun->diff($bakti)->y;
    $manfaatbulan = 0;
    $manfaatsekaligus = 0;
    $usiamasuk = $bakti->diff($lahir)->y;
    $bulanmasuk = $bakti->diff($lahir)->m;
     // tanggal lahir dan bakti

    $ns = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from nilai_sekarang where usia_bayar=$usia"));
    $nilai_sekarang = $ns['nilai_sekarang'];
    $gaji = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from payrolls where npp ='$npp'"));
    $unitkerja = $gaji['unit_kerja'];
    $gajipokok = $gaji['gaji_pokok'];
    $phdp = $gaji['phdp'];
    $penghasilan = $gaji['gaji_pokok'] + $gaji['tunjangan_struktural'] + $gaji['tunjangan_fungsional'] + $gaji['tunjangan_operasional'];
    $nsekaligus = mysqli_fetch_assoc(mysqli_query($DBcon, "select $kategori from nilai_sekaligus where usia=$usia"));
    $nilai_sekaligus = $nsekaligus[$kategori];


    $tahunini=date('Y');
    $bulanini=date('m');
    if($bulanini>7)
    $tahunPhdp=$tahunini+1;
    if($bulanini>1)
    $tahunGaji=$tahunini+1;
    $thresPHDP=date_create($tahunPhdp."-07-01");
    $thresGaji=date_create($tahunGaji."-01-01");
    // print_r($thresPHDP);
    // print_r($haripensiun);
    // print_r($thresGaji);
    $bedatahunphdp=$haripensiun->diff($thresPHDP)->y;
    $bedatahungaji=$haripensiun->diff($thresGaji)->y;
    // echo $bedatahunphdp."<br>";
    // echo $bedatahungaji."<br>";

    for($i=0;$i<$bedatahunphdp;$i++){
      $phdp=$phdp+0.05*$phdp;
    }
    // echo rupiah($phdp)."<br>";
    for($i=0;$i<$bedatahungaji;$i++){
      $gajipokok=$gajipokok+0.08*$gajipokok;
    }
    // echo rupiah($gajipokok);

           
        if ($_GET['status'] == 1)
            {
            if ($usia == 56)
                {
                $status = "Pensiun Normal";
                $manfaat_pasti = TRUE;
                $purna_karya = TRUE;
                $uang_penggantian_hak = TRUE;
                $jht = TRUE;
                }
              else
            if (($usia < 46 || ($usia == 46 && $bulanusia == 0 && $hariusia == 0)) && $usia < 56)
                {
                $status = "Pensiun Dini sebelum 46 tahun";
                $manfaat_pasti = TRUE;
                $purna_karya = TRUE;
                $pesangon = TRUE;
                $penghargaan_masa_kerja = TRUE;
                $uang_penggantian_hak = TRUE;
                $jht = TRUE;
                }
              else
                {
                $status = "Pensiun Dini setelah 46 tahun";
                $purna_karya = TRUE;
                $manfaat_pasti = TRUE;
                $pesangon = TRUE;
                $penghargaan_masa_kerja = TRUE;
                $jht = TRUE;
                }
            }
          else
        if ($_GET['status'] == 2)
            {

            if($usia<46){
              $masabakti = $bakti->diff($tanggalpensiun_normal1)->y;
            }
            $status = "Meninggal Dunia / Gugur Dalam Tugas";
            $manfaat_pasti = TRUE;
            $jht = TRUE;
            $purna_karya = TRUE;
            $pesangon = TRUE;
            $penghargaan_masa_kerja = TRUE;
            $uang_penggantian_hak = TRUE;
            }
          else
        if ($_GET['status'] == 3)
            {
              $masabakti=$bakti->diff($tanggalpensiun_normal1)->y;
              $usia=$lahir->diff($tanggalpensiun_normal1)->y;
            $status = "Cacat Jasmani/Rohani atau Sakit Keras";
            $manfaat_pasti = TRUE;
            $jht = TRUE;
            $purna_karya = TRUE;
            $pesangon = TRUE;
            $penghargaan_masa_kerja = TRUE;
            $uang_penggantian_hak = TRUE;
            }
          else
        if ($_GET['status'] == 4)
            {
            $status = "Ke Anak Perusahaan (KAP)";
            $manfaat_pasti = TRUE;
            $jht = TRUE;
            $purna_karya = TRUE;
            $pesangon = TRUE;
            $penghargaan_masa_kerja = TRUE;
            $uang_penggantian_hak = TRUE;
            }
          else
        if ($_GET['status'] == 5)
            {
            if (($usia < 46 || ($usia == 46 && $bulanusia == 0 && $hariusia == 0)) && $usia < 56)
                {
                $status = "Mengundurkan diri sebelum 46 tahun";
                $manfaat_pasti = TRUE;
                $uang_pisah = TRUE;
                $purna_karya = TRUE;
                $uang_penggantian_hak = TRUE;
                $jht = TRUE;
                }
              else
                {
                $status = "Mengundurkan diri setelah 46 tahun";
                $purna_karya = TRUE;
                $manfaat_pasti = TRUE;
                $uang_pisah = TRUE;
                $uang_penggantian_hak = TRUE;
                $jht = TRUE;
                }
            }
          else
        if ($_GET['status'] == 6)
            {
            if (($usia < 46 || ($usia == 46 && $bulanusia == 0 && $hariusia == 0)) && $usia < 56)
                {
                $status = "Hukuman Disiplin Ringan sebelum 46 tahun";
                $manfaat_pasti = TRUE;
                $uang_pisah = TRUE;
                $purna_karya = TRUE;
                $uang_penggantian_hak = TRUE;
                $jht = TRUE;
                }
              else
                {
                $status = "Hukuman Disiplin Ringan setelah 46 tahun";
                $purna_karya = TRUE;
                $manfaat_pasti = TRUE;
                $uang_pisah = TRUE;
                $uang_penggantian_hak = TRUE;
                $jht = TRUE;
                }
            }
          else
        if ($_GET['status'] == 7)
            {
            $status = "Hukuman Disiplin Berat";
            $purna_karya = TRUE;
            $manfaat_pasti = TRUE;
            $uang_penggantian_hak = TRUE;
            $uang_pisah = TRUE;
            }
          else
        if ($_GET['status'] == 8)
            {
            $status = "Rasionalisasi";
            $purna_karya = TRUE;
            }
          else
        if ($_GET['status'] == 9)
            {
            $status = "Diangkat menjadi Dirut BUMN";
            $purna_karya = TRUE;
            $manfaat_pasti = TRUE;
            }

?>

    <!---//pop-up-box---->
<?php

    // kategori tanggungan

    $kategori = $pegawai['kategori_tanggungan'];
    if ($kategori == "M1") $keterangan = "Laki-laki menikah dan memiliki beberapa anak";
      else
    if ($kategori == "M2") $keterangan = "Laki-laki menikah belum memiliki anak";
      else
    if ($kategori == "M3") $keterangan = "Lajang/Duda dan memiliki beberapa anak";
      else
    if ($kategori == "M4") $keterangan = "Laki-laki Lajang";
      else
    if ($kategori == "F1") $keterangan = "Perempuan menikah dan memiliki beberapa anak";
      else
    if ($kategori == "F2") $keterangan = "Perempuan menikah belum memiliki anak";
      else
    if ($kategori == "F3") $keterangan = "Lajang/Janda dan memiliki beberapa anak";
      else $keterangan = "Perempuan Lajang";

   
    // hitung manfaat pasti

    if (isset($manfaat_pasti) && $manfaat_pasti){
        $total = 0;
        $const = 0.025;
        $manfaatbulantemp = $nilai_sekarang * $const * $phdp * $masabakti;
        $nilai_sekaligus = $nsekaligus[$kategori];
        $manfaatsekaligus = $manfaatbulantemp * $nilai_sekaligus;
        if ($manfaatbulan > 1500000)
            {
            $manfaatbulan = 0.8 * $manfaatbulan;
            $manfaatsekaligus = 0.2 * $manfaatsekaligus;
            }
          else $manfaatbulan = 0;
?>
    <div class="company">
        <h3 class="clr1" style="text-align:center; margin-right: 0em">Hasil Simulasi Manfaat Pensiun jika Anda Pensiun pada <br><?php
        $tang = date_create($_GET['tanggalpensiun']); $rencana = date_format($tang, "d-M-Y"); echo $rencana;?> dengan status <b><?php echo $status;?> </b></h3>
    </div>
            
  <div class="skills">
    <h3 class="clr2" >Data dan Dasar Perhitungan Pensiunan</h3>
      <div class="skill_list">
        <div class="skill1">
          <ul>                    
            <li><?php echo "<b>Nama Pegawai : </b><br/>".$_SESSION['nama'];?></li>
            <li><?php echo "<b>Nomor Pokok Pegawai </b></br>".$_SESSION['npp'];?></li>
            <li><?php echo "<b>Unit Kerja </b></br>".$unitkerja;?></li>
            <li><?php echo "<b>Usia Mulai Bekerja : </b><br/>".$usiamasuk." tahun";?></li>
          </ul>
        </div>
                 
        <div class ="skill1">
          <ul>
              <li><?php echo "<b>Gaji Pokok Saat Pensiun (asumsi kenaikan 8% per 1 Januari tiap tahun): </b><br/>".rupiah($gajipokok);?></li>
              <li><?php echo "<b>Penghasilan </b></br>".rupiah($penghasilan);?></li>
              <li><?php echo "<b>PhDP Saat Pensiun (asumsi kenaikan 5% per 1 Juli tiap tahun) : </b><br/>".rupiah($phdp);?></li>
              <li><?php echo "<b>Faktor Manfaat Pasti : </b></br>" . $nilai_sekarang;?></li>
          </ul>
        </div>
        
        <div class="skill1">
          <ul>                    
          <li><?php echo "<b>Kategori Tanggungan </b></br>" . $kategori . " (" . $keterangan . ")";?></li>
          <li><?php echo '<b>Faktor Sekaligus : </b></br>' . $nilai_sekaligus;?></li>
          <li><?php $y = $haripensiun->diff($lahir)->y;
                    $m = $haripensiun->diff($lahir)->m;
                    $d = $haripensiun->diff($lahir)->d;
        echo "<b>Usia Saat Pensiun:</b><br /> " . $y . " tahun " . $m . " bulan " . $d . " hari";?>
          </li>
          <li> <?php $y = $haripensiun->diff($bakti)->y;
                     $m = $haripensiun->diff($bakti)->m;
                     $d = $haripensiun->diff($bakti)->d;
        echo "<b>Masa Bakti Saat Pensiun:</b><br /> " . $y . " tahun " . $m . " bulan " . $d . " hari";?>
          </li>
                        
          </ul>
        </div>
    
    <div class="clearfix"></div>
    </div>
  </div>
 
         <div class="company">
         <h3 class="clr2" style="text-align: center;margin-bottom: 0.5em;">Hasil Perhitungan</h3>
             <div class="company_details">
                 <h4>Manfaat Bulanan <span>Nilai Sekarang x 2.5% x PHDP x Masa Kerja | <?php
        echo $nilai_sekarang . " x 2.5% x " . rupiah($phdp) . " x " . $masabakti;?></span></h4>
        
        <p class="cmpny1">
            <?php
                    if ($usia < 46 && $_GET['status'] == 1)
            {
              echo "Anda tidak berhak Mendapaatkan Manfaat Pasti jika mengundurkan diri pada usia kurang dari 46 tahun";
              $manfaatsekaligus = 0;
              $manfaatbulan = 0;
            }
          else echo rupiah($manfaatbulan);?>
                 </p>
             </div>

             <div class="company_details">
                 <h4>Manfaat Sekaligus<span>Manfaat Bulanan x Faktor Sekaligus | <?php
                  echo rupiah($manfaatbulantemp) . " x " . $nilai_sekaligus;?></span></h4>
                 <p class="cmpny1">
                 <?php
        if ($usia < 46 && $_GET['status'] == 1)
            {
            $manfaatsekaligus = 0;
            $manfaatbulan = 0;
            echo "Anda tidak berhak Mendapaatkan Manfaat Pasti jika mengundurkan diri pada usia kurang dari 46 tahun";
            }
          else echo rupiah($manfaatsekaligus);
?>
          </p>
             </div>
    <?php
        $total+= $manfaatsekaligus;}?>

    <?php
    if (isset($jht) && $jht){?>
             <div class="company_details">
                 <h4>Jaminan Hari Tua <span>(Manfaat JHT dari BPJS Ketenagakerjaan)</span></h4>
                 <p class="cmpny1">Data dari Tabel JHT</p>
             </div>
    <?php } ?>

    <?php
    if (isset($purna_karya) && $purna_karya){
        $baktiup = $masabakti + 1;
        $usiaup = $usia + 1;
        $bulanbakti = $haripensiun->diff($bakti)->m;
        $bulanlahir = $haripensiun->diff($lahir)->m;
        if ($usia < 46)
            {
            if ($usiamasuk <= 30)
                {
                $faktor = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya_kepesertaan where tahun_berakhir=$masabakti"));
                $faktor2 = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya_kepesertaan where tahun_berakhir=$baktiup"));
                $nilai1 = $faktor['faktor_tunai'];
                $nilai2 = $faktor2['faktor_tunai'];
                if ($bulanbakti > 0) $faktorkalitambah = ($bulanbakti / 12) * ($nilai2 - $nilai1);
                  else $faktorkali = $nilai1;
                $purnakarya = ($gajipokok * $nilai1) + ($gajipokok * $faktorkalitambah);
                }
              else
                {
                $faktor = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya_dini where usia=$usia"));
                $faktor2 = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya_dini where usia=$usiaup"));
                $nilai1 = $faktor['faktor_tunai'];
                $nilai2 = $faktor2['faktor_tunai'];
                if ($bulanbakti > 0) $faktorkalitambah = ($bulanbakti / 12) * ($nilai2 - $nilai1);
                  else $faktorkali = $nilai1;
                $purnakarya = ($gajipokok * $nilai1) + ($gajipokok * $faktorkalitambah);
                }
            }
          else
            {
            $faktor = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya where usia=$usia"));
            $faktor2 = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from purna_karya where usia=$usiaup"));
            $nilai1 = $faktor['nilai_pk'];
            $nilai2 = $faktor2['nilai_pk'];
            if ($bulanbakti > 0) $faktorkalitambah = ($bulanlahir / 12) * ($nilai2 - $nilai1);
              else $faktorkalitambah = 0;
            $purnakarya = ($gajipokok * $nilai1) + ($gajipokok * $faktorkalitambah);
            }

?>
    
             <div class="company_details">
              <h4>Tunjangan Purna Karya <span>Faktor Kali x Gaji Pokok | <?php
        echo rupiah($gajipokok) . " x " . $nilai1 . " + " . rupiah($gajipokok) . " x " . $faktorkalitambah;?></span></h4>
                 <p class="cmpny1"><?php echo rupiah($purnakarya);?></p>
             </div>
    <?php
        $total+= $purnakarya;
        }

?>

    <?php
    if (isset($pesangon) && $pesangon){
        if ($masabakti <= 8){
            $fetchfaktorpesangon = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from pesangon where tahun_berakhir=$masabakti"));
            $faktorpesangon = $fetchfaktorpesangon['faktor_tunai'];}
          else{
            $faktorpesangon = 9;}

        $konstanta = 1;
        $nilaipesangon = $faktorpesangon * $penghasilan;
        if ($_GET['status'] == 3 || $_GET['status'] == 4){
            $konstanta = 2;
            $nilaipesangon = $nilaipesangon * 2;}

?>

             <div class="company_details">
                 <h4>Pesangon <span>Faktor Pesangon x Penghasilan x Konstanta | <?php
        echo $faktorpesangon . " x " . rupiah($penghasilan) . " x " . $konstanta;
?> </span></h4>
                 <p class="cmpny1"><?php
        echo rupiah($nilaipesangon);
?></p>
             </div>
    <?php
        $total+= $nilaipesangon;
        }

?>
    
    <?php
    if (isset($penghargaan_masa_kerja) && $penghargaan_masa_kerja)
        {
        if ($masabakti <= 24)
            {
            $fetchfaktorupmk = mysqli_fetch_assoc(mysqli_query($DBcon, "select * from penghargaan_masa_kerja where tahun_berakhir=$masabakti"));
            $faktorupmk = $fetchfaktorupmk['faktor_tunai'];
            }
          else $faktorupmk = 10;
        $nilaiupmk = $faktorupmk * $penghasilan;
?>
             <div class="company_details">
                 <h4>Penghargaan Masa Kerja <span>Faktor UPMK x Gaji Pokok | <?php
        echo $faktorupmk . " x " . rupiah($penghasilan);
?></span></h4>
                 <p class="cmpny1"><?php
        echo rupiah($nilaiupmk);
?></p>
             </div>
    <?php
        $total+= $nilaiupmk;
        }

?>

    <?php
    if (isset($uang_penggantian_hak) && $uang_penggantian_hak)
        {
        if(isset($nilaipesangon)&&isset($nilaiupmk)){
        $uanghak = 0.15 * ($nilaipesangon + $nilaiupmk);
?>
             <div class="company_details">
                 <h4>Uang Penggantian Hak <span>(15% * (uang pesangon + uang penghargaan masa kerja)) | <?php
        echo "15% x (" . rupiah($nilaipesangon) . " + " . rupiah($nilaiupmk) . ")";
?></span></h4>
                 <p class="cmpny1"><?php
        echo rupiah($uanghak)."</div>";} else { ?>
       
        
         <?php $uanghak=0;?>
         <div class="company_details">
              <h4>Uang Penggantian Hak</h4>
               <p class="cmpny1">Konsultasikan Perhitungan dengan Divisi HCS</p>
             </div>
         
    <?php }
        $total+= $uanghak;
        }

    if (isset($uang_pisah) && $uang_pisah)
        {
        $nilaiuangpisah=$penghasilan;?>
             <div class="company_details">
                 <h4>Uang Pisah <span> 1 x Penghasilan | <?php
        echo "1 x " . rupiah($penghasilan);
?></span></h4>
                 <p class="cmpny1"><?php
        echo rupiah($nilaiuangpisah);
?></p>
             </div>
    <?php
        $total+= $nilaiuangpisah;
        }

    if (isset($total))
        {
?>

     <div class="company_details">
                 <h4 style="font-size: 1.2em">Total Tunjangan Sekaligus <span>(plus tunjangan bulanan)</span></h4>
                 <p class="cmpny1" style="
    border-bottom: 0px dashed #999;"><h2 style="
    text-align: right;
    padding-right: 1.3em;
"><?php
        echo rupiah($total);
?></h2><h4 style="
    text-align: right;
    font-size: 15px;
    padding-right: 2.7em;
"><?php
        echo " plus   " . rupiah($manfaatbulan);
?> tiap bulan </h4></p>
             </div>
             <button class="btn btn-primary btn-lg pull-right" style="
    margin-right: 2em;
    margin-top: 1em;
    padding-left: 2em;
    padding-right: 2em;" onClick="window.print();">Print</button> 
</div>

    


 <?php
        }
    }

?>
         <footer style="text-align:center; padding-top: 2em">
         <div class="copywrite">
             <p>© 2017 Tim Internship Jasa Marga IPB | Kantor Pusat PT Jasa Marga (PERSERO) Tbk.</a> </p>
         </div>
        </footer>
     </div>
</div>
<!---->
</body>

</html>