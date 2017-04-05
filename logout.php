<?php

	session_start();
	
	if (!isset($_SESSION['user'])) {
		//echo "no";
		header("Location: tracking.php");
	}/* else if(isset($_SESSION['user'])!="") {
		header("Location: home.php");
	} */
	
	if (isset($_GET['logout'])) {
			//echo "yes";
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;
	}
	else
	{
		echo "if";
	}