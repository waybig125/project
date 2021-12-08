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

if($previllages == "admin"){
	include 'admin_txt.php';
}else if($previllages == "student"){
	include 'student_txt.php';
}

 ?>

 <style type="text/css">
 	html, body{
 		margin-top: 20px !important;
 	}
 	nav{
 		position: fixed !important;
 		top: 0;
 		left: 0;
 		width: 100%;
 		padding-bottom: 15px !important;
 	}
 	form #search{
 		margin-top: 100px !important;
 	}
 </style>