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

 	if(isset($_POST['send'])){

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

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
	<link rel="stylesheet" type="text/css" href="templates/css/style2.css">
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css ">
</head>
<body>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/preloader.php'; ?>
	<?php include 'templates/header.php'; ?>

	<iframe src="student_txt_.php" width="100%" height="350px" id="iframe">
	</iframe>
     
	<button class="btn btn-outline-success btnCustom btn-lg" onclick="reload();" style="font-size: 20px;position: absolute;right: 20px;top: 100px;">
		↺
	</button>
	<form method="post" action="#" class="text-center">
		<!-- <div class="row"> -->
			<div class="col-md-2"></div>
			<div class="d-md-none d-sm-block d-block" style="height: 5px;"></div>
			<div class="height-50 d-none d-sm-none d-md-block"></div>
<textarea placeholder="Type a message..." class="form-control col-md-6 col-sm-10 col-10 text-dark input-rounded" name="message" id="message" required></textarea>

<button type="button" class="col-md-2 col-2 col-sm-2" id="send" name="send">
	<img src="templates/img/send.jpeg" class="icon">
</button>

<!-- </div> -->
	</form>
	<!-- <div class="extra"></div> -->

	<?php //include 'templates/footer.php'; ?>

	<script type="text/javascript" src="templates/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="templates/slider/responsiveslides.min.js"></script>
	<script src="templates/dist/jquery.aniview.js"></script>
	<script type="text/javascript" src="templates/js/script3.js"></script>
	<script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>
	<script type="text/javascript" src="templates/package/dist/index.umd.js"></script>
	<script type="text/javascript">
     function reload() {
         document.getElementById('iframe').src = "student_txt_.php";
         // setTimeout(reload, 15000);
     }
     reload();
     reload();
      $('#send').on('click', function(){
     	let valueMsg = document.getElementById('message').value;
     	if(valueMsg != ""){
     		
     	$('#php').load('text4.php', {
     		message: valueMsg
     	});
     	
     	document.getElementById('message').value = "";

     	$('#message').removeClass('border-crimson');

     }else{
     	$('#message').addClass('border-crimson');
     }
     });
 	</script>
 	<div id="php"></div>
 	<style type="text/css">
 		html,body{
 			overflow-y: auto;
 		}
 		.border-crimson{
		border: 1px solid crimson;
		outline: none;
		}
 	</style>

	<?php 

echo '<div class="alert text-danger aniview reallyslow" data-av-animation="fadeInDownBig" style="font-size: 20px;" id="alert">
			<br>
			'.$error.'
		</div>
		';

 ?>

</body>
</html>
<?php }else{
	header('Location: chat.php');
} 
?>