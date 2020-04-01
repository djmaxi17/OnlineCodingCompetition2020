<?php
	//checks if user accessed this page by clicking on register button
	if (isset($_POST["submit_shop"])){

		//requires database connection page 
		require "database.inc.php";

		//capture values from form
		$shopname = $_POST['shopname'];
		$email = $_POST['shopemail'];
		$password = $_POST['shopconfirmpwd'];
		$address = $_POST['shopaddress'];
		$space = $_POST['shopspace'];
		$servicetime = $_POST['shopservicetime'];
		$starttime = $_POST['shopstarttime'];
		$closetime = $_POST['shopclosetime'];


		//query to get all values in the table by passing parameter
		$sql = "SELECT * FROM shops WHERE sEmail=?";

		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {

			//redirects user to register page with sql error message in url
			header("Location: ../loginpage.php?error=sql");
			exit();

		}else{

			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$resultcheck = mysqli_stmt_num_rows($stmt);

			if($resultcheck > 0 ){

				//redirects user to register page with error message 
				header("Location: ../loginpage.php");
				echo "<script> alert('Shop already exists !'); </script>";
				exit();

			}else{

					//query to insert names, username, email and password in the table
					$sql = "INSERT INTO shops (sName, sAddress, sRetailSpace, sOpening,sClosing, sAST, sEmail, sPassword) VALUES (?,?,?,?,?,?,?,?)";

					$stmt = mysqli_stmt_init($conn);

					if(!mysqli_stmt_prepare($stmt, $sql)){

						//redirects user to register page with error message
						header("Location: ../loginpage.php?error=sql");
						exit();

					}else{

						//hashes password
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

						mysqli_stmt_bind_param($stmt, "ssssssss", $shopname, $address, $space, $starttime, $closetime, $servicetime, $email, $hashedPwd);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_store_result($stmt);


						header("Location: processtime.inc.php?shopspace=" . $space . "&shopservicetime=" . $servicetime  . "&shopstarttime=" . $starttime .  "&shopclosetime=" . $closetime . "&shopemail=" . $email);
						exit();

						// header("Location: ../index.php?signup=success");
						// exit();
						
					}
			}
		}

		mysqli_stmt_close($stmt);
		mysqli_close($conn);

	}else{

		//redirects user to register page if he/she accessed this page without clicking on register button
		header("Location: ../loginpage.php");
		exit();
	}	

?>
