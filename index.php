<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Simulasi Pensiun</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="assets/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>

<?php
error_reporting(0);
session_start();
include_once("library/koneksi.php");

if(@$_POST["login"]){ //jika tombol Login diklik
  $npp=$_POST["npp"];
  $password=$_POST["password"];

  if($npp!="" && $password!=""){
    include_once("library/koneksi.php");
    $em = mysqli_query($DBcon, "select * from pegawai where password = '$password' AND npp = '$npp'");
    $data = mysqli_fetch_assoc($em);

    if($data["npp"] == "$npp" && $data["password"] == $password){
      echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          Selamat anda telah masuk!
                  </div>";
      $_SESSION["npp"]=$data["npp"];
      $_SESSION["password"]=$data["password"];
      $_SESSION["nama"]=$data["nama"];
      header("Location:karyawan/index.php");
    }else{
      echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <b>Maaf anda belum terdaftar!</b>
                  </div><center>";
    }
  }

}
?>

<div class="banner-overlay-agileinfo">
        <!--header-->
        <div class="header-w3l">
            <h1>Sistem Simulasi Pensiun<br>Karyawan Jasa Marga</h1>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-w3layouts-agileinfo">
               <!--form-stars-here-->
                        <div class="wthree-form">
                            <h2>Silahkan Masuk</h2>
                            <form action="" method="post">
                                <div class="form-sub-w3">
                                    <input type="text" name="npp" placeholder="Nomor Pokok Pegawai" required="" />
                                <div class="icon-w3">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                </div>
                                <div class="form-sub-w3">
                                    <input type="password" name="password" placeholder="Password" required="" />
                                <div class="icon-w3">
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                </div>
                                </div>
                                <p class="forgot-w3ls">Lupa Password?<a class href="#">  Klik disini</a></p>
                                <div class="clear"></div>
                                <div class="submit-agileits">
                                    <input type="submit" name="login" value="Masuk">
                                </div>
                            </form>

                        </div>
                <!--//form-ends-here-->

        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">
            <p>&copy; 2017 Tim Internship Jasa Marga IPB | Kantor Pusat Pt Jasa Marga (PERSERO) Tbk.</a></p>
        </div>
        <!--//footer-->
    </div>
</body>
</html>