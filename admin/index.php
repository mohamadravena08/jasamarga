<?php
error_reporting(0);
session_start();
include_once("../library/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Simpensiun</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
<?php

  if(@$_POST["login"]){ //jika tombol Login diklik
  $npp=$_POST["npp"];
  $password=$_POST["password"];

  if($npp!="" && $password!=""){
    include_once("library/koneksi.php");
    $em = mysqli_query($DBcon, "select * from admin where password = '$password' AND npp = '$npp'");
    $data = mysqli_fetch_assoc($em);

    if($data["npp"] == "$npp" && $data["password"] == $password){
      echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          Selamat anda telah masuk!
                  </div>";
      $_SESSION["npp"]=$data["npp"];
      $_SESSION["admin"]=$data["npp"];
      $_SESSION["password"]=$data["password"];
      $_SESSION["nama"]=$data["nama"];
      header("Location:production/home.php");
    }else{
      echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <b>Maaf anda belum terdaftar!</b>
                  </div><center>";
    }
  }

}
?>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="">
              <h1>Masuk Disini</h1>
              <div>
                <input type="text" name="npp" class="form-control" placeholder="Nomor Poko Pegawai" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input class="btn btn-default submit" style="margin:auto; text-align:center;width: 350px;background-color: #75aade;color: white;" type="submit" name="login" value="Masuk">
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-users"></i> Admin Simpensiun </h1>
                  <p>©2017 Sistem Simulasi Pensiun Karyawan Jasa Marga</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
