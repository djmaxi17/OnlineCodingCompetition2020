<?php
	//checks if the user has accessed this page by clicking on the login button
	if (isset($_POST['loginbutton'])) {

		require "database.inc.php";

		//stores email address
		$usermail = $_POST['email'];
		//stores password
		$userpassword = $_POST['password'];
		//capture typr
		$type = $_POST['type'];

		if ($type == "Supermarket / Shop"){

			//query to select all values from the table by passing parameters
			$sql = "SELECT * FROM shops WHERE sEmail=?";
			$stmt = mysqli_stmt_init($conn);

		}else if ($type == "Customer"){

			//query to select all values from the table by passing parameters
			$sql = "SELECT * FROM customers WHERE cEmail=?";
			$stmt = mysqli_stmt_init($conn);

		}



		if(!mysqli_stmt_prepare($stmt, $sql)) {

			//redirects user to homepage and sends error message in url
			header("Location: ../index.php?error=sql");
			exit();

		}else{

			mysqli_stmt_bind_param($stmt, "s", $usermail);
			mysqli_stmt_execute($stmt);

			$result = mysqli_stmt_get_result($stmt);

			if($row = mysqli_fetch_assoc($result)) {

				if ($type == "Customer"){
				//compares password entered with password in the table
				$pwdcheck = password_verify($userpassword, $row['cPassword']);

				}else if ($type == "Supermarket / Shop"){

					//compares password entered with password in the table
					$pwdcheck = password_verify($userpassword, $row['sPassword']);

				}

				if($pwdcheck == false) {

					//redirects user to homepage and sends wrong password message in url if password does not match
					header("Location: ../index.php?error=wrongpwd");
					exit();

				}else if($pwdcheck == true) {

					//starts a session if password matches
					session_start();

					if ($type == "Customer"){
					//setting session variables
					$_SESSION["customerId"] = $row['cId'];
					$_SESSION["customerMail"] = $row['cEmail'];
					$_SESSION["customerFirstName"] = $row['cFirstName'];
					$_SESSION["customerLastName"] = $row['cLastName'];

					//redirects user to homepage and sends success message in url if login is sucessfull
					header("Location: ../index.php?login=success");
					exit();

					}else if ($type == "Supermarket / Shop"){

					//setting session variables
					$_SESSION["shopId"] = $row['sId'];
					$_SESSION["shopMail"] = $row['sEmail'];
					$_SESSION["shopName"] = $row['sName'];
					$_SESSION["shopAddress"] = $row['sAddress'];


					//redirects user to homepage and sends success message in url if login is sucessfull
					header("Location: ../supermarket.php?id=".$_SESSION['shopId']);
					exit();

					}	
				}

			}else {

				//redirects user to homepage and sends no user message in url if email does not match
				header("Location: ../index.php?error=nouser");
				exit();
			}


		}

	}else{

		//redirects user to homepage if he/she accessed this page without clicking on login button
		header("Location: ../index.php");
		exit();

	}