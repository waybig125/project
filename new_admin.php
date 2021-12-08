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

 ?>
<?php include 'templates/sql/db.php'; ?>
<?php 
			
			$user_name = "";
			$password = "";
			$confirmPassword = "";

			if(isset($_POST['user_name'])){

				$user_name = htmlspecialchars($_POST['user_name']);
				$user = htmlspecialchars($_POST['user_name']);
				$password = htmlspecialchars($_POST['password']);
				$confirmPassword = htmlspecialchars($_POST['confirmPassword']);

				if($password == $confirmPassword){
					$valid = true;
				}else{
					$valid = false;
					$error.= "Confirm Password did not match password";
				}

			if(!$conn){

			//connection is false

			$error.="Error: ".mysqli_error($conn)."<br>";

			}//connection is false

			else{
				//connection is true
				
				$sql = "SELECT * FROM admins WHERE name = '".$user_name."' AND password = '".$password."'";
				$query = mysqli_query($conn, $sql);

				$rows = mysqli_num_rows($query);

				$results = mysqli_fetch_assoc($query);

				if($rows == 1 && $results){

					$error.="USER ALREADY EXISTS";

				}else if($valid){
					
					$sql = "INSERT INTO admins(name, password) VALUES('$user_name', '$password')";

					$query = mysqli_query($conn, $sql);

					if($query){
						header('Location: admin.php');
					}else{
						$error.="Error: ".mysqli_error($conn);
					}

				}


			}//connection is true

			}//end isset

		// include 'templates/sql/login.php';

			// echo '<p class="mt-5 mb-3 text-center text-danger">'.$error.'</p>';
			echo '<div class="alert text-danger aniview reallyslow" data-av-animation="fadeInDownBig" style="font-size: 20px;" id="alert">
			<br>
			'.$error.'
		</div>
		';
		// echo '<script>
		// $(window)on("load", function(){
		// 	$("#alert").delay(5000).fadeOut();
		// 	});
		// </script>
		// ';
		
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/preloader.php';
					$error = "";
					 ?>
	<title>New Admin</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css ">
	<!--  -->
	<!-- <link rel="stylesheet" href="templates/password/css/example.wink.css"> -->
	<link rel="stylesheet" href="templates/password/css/demo.css">
	<!--  -->

	<!-- https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css -->

</head>
<body>
	<?php 

	$backgrounds = ['img50.jpg', 'img6.jpg', 'img7.jpg', 'img8.jpg'];

	$random = mt_rand(0, 3);

	 ?>
	<div style="background: url(templates/img/<?php echo $backgrounds[$random]; ?>);background-attachment: fixed;background-position: center;background-size: cover;background-repeat: no-repeat;">

	<?php include 'templates/header.php'; ?>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="templates/css/signin.css" rel="stylesheet">
  <div class="text-center">

	<div id="container">

	<div class="height-20"></div>
	<div class="height-20"></div>
	<div class="extra"></div>
	<br>
	<br>

	<h5 id="typing" class="text-center text-info font-50px aniview-2 slow" data-av-animation="pulse">
		<span class="border-bottom-info">Register Admin User</span>&nbsp;
	</h5>

	<!-- <div class="extra"></div> -->
	<br>
	<br>
	</div>
    <form class="form-signin" id="form-custom2" action="#" method="POST">
  <img class="mb-4" src="templates/img/logo.png" alt="logo" width="100px" height="260px">
  <!-- <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1> -->
  <label for="inputEmail" class="sr-only">User Name</label>
  <input type="text" id="inputEmail" value="<?php echo $user; ?>" class="form-control" placeholder="User Name" autocomplete="off" id="img-brand" name="user_name" required autofocus>
  <br>
  <label for="inputPassword" class="sr-only login-field  hideShowPassword-hidden login-field-password">Password</label>
  <input type="password" id="inputPassword" value="<?php echo $password; ?>" class="form-control" placeholder="Password" autocomplete="off" name="password" required>
  <br>
  <label for="inputPassword" class="sr-only login-field  hideShowPassword-hidden login-field-password">Confirm Password</label>
  <input type="password" id="confirmPassword" value="<?php echo $confirmPassword; ?>" class="form-control" placeholder="Confirm Password" autocomplete="off" name="confirmPassword" required>
  
  <button class="btn btn-lg btn-outline-success btnCustom btn-block" type="submit" name="submit">REGISTER</button>
  <p class="mt-5 mb-3 text-danger"><?php echo $error; ?></p>
  <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>
</div>

</div>

	<!-- <div class="extra"></div> -->
	
	<div class="extra"></div>

	<div class="jumbotron jumbotron-dark" id="sec_jumbotron">
		<!-- <div class="extra d-md-none d-sm-block d-block"></div>
		<h1 class="text-gray text-center">
	<a href="#" class="btn btn-outline-success btnCustom btn-lg aniview slow" data-av-animation="fadeInDownBig">Login</a>
	</h1> -->
	</div>

	<script type="text/javascript" src="templates/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="templates/slider/responsiveslides.min.js"></script>
	<script src="templates/dist/jquery.aniview.js"></script>
	<script type="text/javascript" src="templates/js/script.min.js"></script>
	<script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>
	<!-- <script type="text/javascript" src="templates/plugin/js/tinyslide.js"></script> -->	
	<script type="text/javascript" src="templates/package/dist/index.umd.js"></script>
	<!--  -->
	<script src="templates/password/hideShowPassword.js"></script>
	<!--  -->
	<style>
	#main_jumbotron{
		background-image: transparent !important;
	}
	::-webkit-input-placeholder { /* Edge */
  color: white !important;
  opacity: 1;
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: white !important;
  opacity: 1;
}

::placeholder {
  color: white !important;
  opacity: 1;
}

	</style>

</div>

<script type="text/javascript">

	$('#inputPassword').hidePassword('focus', {
	  toggle: { className: 'my-toggle' }
	});	
	$('#confirmPassword').hidePassword('focus', {
	  toggle: { className: 'my-toggle' }
	});	
	$('.my-toggle').addClass('btn btn-outline-success btnCustom');
</script>

</body>
</html>

	<?php include 'templates/footer.php'; ?>

<?php }else{
	header('Location: index.php');
} ?>

	

