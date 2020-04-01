<?php
include "includes/header.inc.php";

	$shopName ="Booking";
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
	//echo "ShopName" . substr(str_shuffle($permitted_chars), 0, 10);

	echo "<br><br><h3 style='text-align:center;'>Your booking number is : ".$shopName . substr(str_shuffle($permitted_chars), 0, 10)."</h3>";
?>