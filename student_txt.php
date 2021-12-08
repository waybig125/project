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

	if($previllages == "student"){

	$error = "";

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="templates/css/style2.min.css">
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
<textarea placeholder="Message..." class="form-control col-md-6 col-sm-6 col-6 text-dark input-rounded" name="message" id="message" style="background: url(templates/img/whatsapp.png) !important;
        background-attachment: fixed !important;" required></textarea>

<input type="file" name="image" id="image" style="display: none;" onchange="attachImage(event);">

<a class="col-md-2 col-2 col-sm-2" id="mic" onclick="start_record();">
	<i class="fas fa-microphone fa-2x" class="btn"></i>
</a>

<span id="timer" class="text-muted">
	<span id="minutes"></span>
	<span id="seconds"></span>
</span>

<a class="col-md-2 col-2 col-sm-2" id="stop" onclick="stopRecording();">
	<i class="fas fa-stop fa-2x" class="btn"></i>
</a>

<a class="col-md-2 col-2 col-sm-2" id="img" onclick="document.getElementById('image').click()">
	<i class="fas fa-paperclip text-muted fa-2x" class="btn" title="Attach Image"></i>
</a>

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
	<script type="text/javascript" src="templates/js/script3.min.js"></script>
	<script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>
	<script type="text/javascript" src="templates/package/dist/index.umd.js"></script>
	<script type="text/javascript" src="templates/js/student_txt.min.js"></script>
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