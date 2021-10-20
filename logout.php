<?php 

	// session_start();

	// $_SESSION['logged_in'] = false;
	// $_SESSION['user_name'] = "GUEST";
	// session_destroy();
	// header('Location: index.php');

	setcookie("logged_in", false, time() - (864000) * 7);

	setcookie("user_name", '', time() - (864000) * 7);

	setcookie("previllages", '', time() - (864000) * 7);

	header('Location: index.php');

 ?>