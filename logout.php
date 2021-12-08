<?php 

	setcookie("logged_in", false, time() - (864000) * 7);

	setcookie("user_name", '', time() - (864000) * 7);

	setcookie("previllages", '', time() - (864000) * 7);

	header('Location: index.php');

 ?>