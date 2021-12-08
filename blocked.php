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