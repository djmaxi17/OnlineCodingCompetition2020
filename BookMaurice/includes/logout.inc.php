<?php
	
	//starts session
	session_start();

	//unsets session
	session_unset();

	//destroys session
	session_destroy();

	//redirects user to homepage.php
	header("Location: ../index.php");