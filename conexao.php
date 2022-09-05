<?php
$host        = "host = ec2-34-233-115-14.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = dbausclhsrca45";
$credentials = "user = xmgknnbnrrfsip password=8d4babda99903940e95e1df59f23f9adead22c1ec99585f19a771e85711a5f68";
session_start();
   $_SESSION['db'] = pg_connect( "$host $port $dbname $credentials"  );;
	if(!$_SESSION['db']) {
	      echo "Error : Unable to open database\n";
	 } else {
	     echo "Opened database successfully\n";
	}

?>
