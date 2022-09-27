<?php
$host        = "host = ec2-18-209-78-11.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = dbjf4ag7ifjqt3";
$credentials = "user = lovgvfjbmkldrw password=f9bf664b500be739d8f5159c30ea63baeb7c9d0a2d57167b539851fafe84ab79";
$db = pg_connect( "$host $port $dbname $credentials"  );
	if(!$db) {
	      //echo "Error : Unable to open database\n";
	 } else {
	    // echo "Opened database successfully\n";
	}

?>
