<?php include 'templates/sql/db.php'; ?>
<?php
	
	$previllages = $_COOKIE['previllages'] ?? "";

	if($previllages == "student"){

	$error = "";

	if($conn){

	$sql = "UPDATE messages SET read_msg = '1' WHERE from_user = 'admin'";
 		if(mysqli_query($conn, $sql)){
 			$success = true;
 		}else{
 			$error .= mysqli_error($conn);
 		}

 	}

 	if(isset($_POST['message'])){

 		if($conn){

 		$message = htmlspecialchars($_POST['message']);
 		$message = mysqli_real_escape_string($conn, $message);
 		$roll_no = $_COOKIE['user_name'] ?? "";
 		$sql = "SELECT * FROM students WHERE roll_no = '$roll_no'";
 		$query = mysqli_query($conn, $sql);
 		$fetch = mysqli_fetch_assoc($query);

 		if($fetch){

 			$id = $fetch['id'];
 			$unread = $fetch['unread_msg'];
 			$unread = $unread + 1;

 		}

 		$from_user = $id."_student";

 		$sql = "INSERT INTO messages(from_user,to_user,content) VALUES('$from_user','admin','$message')";
 		if(mysqli_query($conn, $sql)){
 			$success = true;
 		}else{
 			$error .= mysqli_error($conn);
 		}

		$sql = "UPDATE students SET unread_msg = '$unread' WHERE roll_no = '$roll_no'";
 		if(mysqli_query($conn, $sql)){
 			$success = true;
 		}else{
 			$error .= mysqli_error($conn);
 		}

	}else{
	$error = mysqli_error($conn);
	}

}

}

 ?>