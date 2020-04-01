<?php
		
		require "database.inc.php";

		$space = $_GET['shopspace'];
		$servicetime = $_GET['shopservicetime'];
		$starttime = $_GET['shopstarttime'];
		$closetime = $_GET['shopclosetime'];
		$email = $_GET['shopemail'];


		//get shop ip from table
		$query = "SELECT sId FROM shops WHERE sEmail='" .$email . "';";

		$result = mysqli_query($conn,$query);

		if (mysqli_num_rows($result) > 0 ) {

			$sId = mysqli_fetch_assoc($result)['sId'];

		}


		$person = 2.25;
		$personNo = (1/$person) * $space;
		$maxPerson = floor($personNo);

		
		$i = 0;
		$from = 0;
		$to = 0;
		$accumulator = $starttime;

		$timeStamps = Array();

		array_push($timeStamps, $starttime);

		// print_r($timeStamps);

		do {

			$accumulator = date('H:i',strtotime('+'.$servicetime. 'minutes',strtotime($accumulator)));

			array_push($timeStamps, $accumulator);

			$from = $timeStamps[$i];

			$to = date('H:i',strtotime('+'.$servicetime. 'minutes',strtotime($timeStamps[$i]))); 

			$sql = "INSERT INTO timeslots (startTime, finishTime, sId, maxPeople, availability) VALUES ('".$from."', '" . $to . "', '" . $sId . "', '" . $maxPerson . "', '1');"; 

			mysqli_query($conn,$sql);


			$i++;

		} while ($accumulator != $closetime);

		header("Location: ../index.php?message=sucess");
		exit();

?>
