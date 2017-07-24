<?php

  $DBhost = "localhost";
  $DBuser = "root";
  $DBpass = "student";
  $DBname = "simpensiun";
  
  $DBcon = new mysqli($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
?>