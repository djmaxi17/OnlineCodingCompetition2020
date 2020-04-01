<?php
	$dbservername = "remotemysql.com";
	$dbusername = "1y97aPRiWY";
	$dbpassword = "l2bo5Xzran";
	$dbname = "1y97aPRiWY";

	$conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

	if(!$conn){
		die("connection error: ".mysqli_connect_error());
	}

	#https://remotemysql.com/phpmyadmin/index.php?db=1y97aPRiWY
?>

