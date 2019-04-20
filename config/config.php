<?php
  ob_start();
  session_start();
  $timezone = date_default_timezone_set("Asia/Kolkata");
  
  $hostname = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "coinallet";
  $con = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
  if(mysqli_connect_errno())
    echo "Failed to connect to database" . mysqli_connect_error();
?>