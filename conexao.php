<?php
$host        = "host = ec2-44-199-9-102.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = ddji4vju4jo4ue";
$credentials = "user = xjlsjcecwwhzed password=e48e14c95c5d4abcb6006f77f5daaf31a33eb34e34bfff54a6f2940d0e3410f2";
$db = pg_connect( "$host $port $dbname $credentials"  );
	if(!$db) {
	      //echo "Error : Unable to open database\n";
	 } else {
	    // echo "Opened database successfully\n";
	}

?>
