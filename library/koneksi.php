<?php

  $DBhost = "localhost";
  $DBuser = "jasamargaipb";
  $DBpass = "IqB@L1234Raven@";
  $DBname = "simpensiun";
  
  $DBcon = new mysqli($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
?>