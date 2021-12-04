<?php include 'templates/sql/db.php'; ?>
<?php

	$previllages = base64_decode($_COOKIE['previllages']) ?? "";

	ini_set('post_max_size', '40M');
	ini_set('upload_max_filesize', '40M');
	ini_set('max_execution_time', '300');

	ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

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
 			$from_user = $id."_student";

 		}
	
 	}else{
 			$error = mysqli_error($conn);
 		}

	if(isset($_GET['student'])){
	setcookie('student', $student, time() + 864000);
	}

	$error = "";

 	if(isset($_POST['message'])){

 		if($conn){

 		if($_POST['msg_type'] == "text"){

 		$message = base64_encode(htmlspecialchars($_POST['message']));

 		}else{
 			$message = $_POST['message'];
 		}

 		$message = mysqli_real_escape_string($conn, $message);
 		$msg_type = $_POST['msg_type'];
 		$imgUrl = $_POST['imgUrl'];
 		$videoUrl = $_POST['videoUrl'];
 		$audioUrl = $_POST['audioUrl'];
 		$fileUrl = $_POST['fileUrl'];
 		$roll_no = $_COOKIE['student'] ?? "";
 		$sql = "SELECT * FROM students WHERE roll_no = '$roll_no'";
 		$query = mysqli_query($conn, $sql);
 		$fetch = mysqli_fetch_assoc($query);

 		if($fetch){

 			$id = $fetch['id'];

 		}

 		$to_user = $id."_student";

 		$sql = "INSERT INTO messages(from_user,to_user,content,msg_type,imgUrl,audioUrl,videoUrl,fileUrl) VALUES('admin','$to_user','$message','$msg_type', '$imgUrl','$audioUrl','$videoUrl','$fileUrl')";
 		if(mysqli_query($conn, $sql)){
 			$success = true;
 			echo "<script>
 			console.log('sent');
 			alertMessageSent();
 			</script>";
 		}else{
 			$error .= mysqli_error($conn);
 			echo "<script>console.log('failed')</script>";
 		}

	}else{
	$error = mysqli_error($conn);
	echo mysqli_error($conn);
	}

}

}

 ?>