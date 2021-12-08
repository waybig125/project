<?php include 'templates/sql/db.php'; ?>
<?php
		
	$user_name = $_COOKIE['user_name'] ?? "";
	$previllages = $_COOKIE['previllages'] ?? "";

	// Store the cipher method
	$ciphering = "AES-128-CTR";

	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;

	// Non-NULL Initialization Vector for decryption
	$decryption_iv = 'xxxxxxxxxxxxxxxxx';

	// Store the decryption key
	$decryption_key = "key";

	// Use openssl_decrypt() function to decrypt the data
	$previllages = openssl_decrypt ($previllages, $ciphering,
	$decryption_key, $options, $decryption_iv);

	$previllages = base64_decode($previllages);

	ini_set('post_max_size', '40M');
	ini_set('upload_max_filesize', '40M');
	ini_set('max_execution_time', '300');

	ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

	$error = "";

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

 		if($_POST['msg_type'] == "text"){

 		$message = base64_encode(htmlspecialchars($_POST['message']));

 		}else{
 			$message = $_POST['message'];
 		}

 		$message = mysqli_real_escape_string($conn, $message);
 		$msg_type = $_POST['msg_type'];
 		$roll_no = $_COOKIE['user_name'] ?? "";
 		$imgUrl = $_POST['imgUrl'];
 		$videoUrl = $_POST['videoUrl'];
 		$audioUrl = $_POST['audioUrl'];
 		$fileUrl = $_POST['fileUrl'];
 		$sql = "SELECT * FROM students WHERE roll_no = '$roll_no'";
 		$query = mysqli_query($conn, $sql);
 		$fetch = mysqli_fetch_assoc($query);

 		if($fetch){

 			$id = $fetch['id'];
 			$unread = $fetch['unread_msg'];
 			$unread = $unread + 1;

 		}

 		$from_user = $id."_student";

 		$sql = "INSERT INTO messages(from_user,to_user,content,msg_type,imgUrl,audioUrl,fileUrl,videoUrl) VALUES('$from_user','admin','$message','$msg_type','$imgUrl','$audioUrl','$fileUrl','$videoUrl')";
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

		$sql = "UPDATE students SET unread_msg = '$unread' WHERE roll_no = '$roll_no'";
 		if(mysqli_query($conn, $sql)){
 			$success = true;
 		}else{
 			$error .= mysqli_error($conn);
 			echo $error;
 		}

	}else{
	$error = mysqli_error($conn);
	}

}

}

 ?>