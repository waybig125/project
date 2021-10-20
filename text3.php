<?php include 'templates/sql/db.php'; ?>
<?php
	
	$previllages = $_COOKIE['previllages'] ?? "";

	if($previllages == "admin"){


	$student = $_GET['student'] ?? "";
	$student_cookie = $_COOKIE['student'];
	$from_user = $_COOKIE['student']."_student";
	if($conn){
		$sql = "SELECT * FROM students WHERE roll_no = '$student'";
 		$query = mysqli_query($conn, $sql);
 		$fetch = mysqli_fetch_assoc($query);

 		if($fetch){

 			$id = $fetch['id'];

 		}
 		$from_user = $id."_student";
	// $sql = "UPDATE students SET unread_msg = '0' WHERE roll_no = '$student'";
 // 		if(mysqli_query($conn, $sql)){
 // 			$success = true;
 // 		}else{
 // 			$error .= mysqli_error($conn);
 // 		}
 // 		$sql = "UPDATE messages SET read_msg = '1' WHERE from_user = '$from_user'";
 // 		if(mysqli_query($conn, $sql)){
 // 			$success = true;
 // 		}else{
 // 			$error .= mysqli_error($conn);
 // 		}

 	}else{
 			$error .= mysqli_error($conn);
 		}

	if(isset($_GET['student'])){
	setcookie('student', $student, time() + 864000);
	}

	$error = "";

 	if(isset($_POST['message'])){

 		if($conn){

 		$message = htmlspecialchars($_POST['message']);
 		$message = mysqli_real_escape_string($conn, $message);
 		$roll_no = $_COOKIE['student'] ?? "";
 		$sql = "SELECT * FROM students WHERE roll_no = '$roll_no'";
 		$query = mysqli_query($conn, $sql);
 		$fetch = mysqli_fetch_assoc($query);

 		if($fetch){

 			$id = $fetch['id'];

 		}

 		$to_user = $id."_student";

 		$sql = "INSERT INTO messages(from_user,to_user,content) VALUES('admin','$to_user','$message')";
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