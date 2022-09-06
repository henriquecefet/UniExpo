<?php
$host        = "host = ec2-54-152-28-9.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = d4a98bg3enk2n2";
$credentials = "user = ekpyivbnwyisml password=52b262b77718ccdef3b6a0b90181bd5669a8c9f03b01fc03a720e25e1ab42b53";
$db = pg_connect( "$host $port $dbname $credentials"  );
	if(!$db) {
	      echo "Error : Unable to open database\n";
	 } else {
	     echo "Opened database successfully\n";
	}

?>
