
<?php
  $host = "mysql1.000webhost.com";
  	$dbname = "a8773318_acebedo";
  	$dbuser = "a8773318_acebedo";
  	$pwd = "Dublin2013";
  	$dbc =0;
  	$dbc = mysqli_connect($host, $dbuser, $pwd, $dbname)
        or die ('Cannot connect to database');
?>