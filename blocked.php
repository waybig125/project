<?php 

$previllages = base64_decode($_COOKIE['previllages']) ?? "";

if($previllages == "student"){
	$connection = $conn ?? false;
	$roll_no = $_COOKIE['user_name'] ?? "";

	if($connection){
		$sql = "SELECT * FROM students WHERE roll_no = '$roll_no'";
		$query = mysqli_query($conn, $sql);
		$fetch = mysqli_fetch_assoc($query);
		if($fetch['blocked']){
			header('Location: logout.php');
		}
	}

}

 ?>