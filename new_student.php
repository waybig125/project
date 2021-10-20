<?php 

$previllages = $_COOKIE['previllages'] ?? "";

if($previllages == "admin"){

 ?>
<?php include 'templates/sql/db.php'; ?>
<?php 
			
			$user_name = "";
			$password = "";
			$roll_no = "";
			$f_name = "";
			$gender = "";

			if($conn){
				$sql = "SELECT * FROM classes";
				$query = mysqli_query($conn, $sql);

				$classes = mysqli_fetch_all($query, MYSQLI_ASSOC);

			}else{
				$error.="Error: ".mysqli_error($conn)."<br>";
			}

			if(isset($_POST['user_name'])){

				$user_name = htmlspecialchars($_POST['user_name']);
				$f_name = htmlspecialchars($_POST['f_name']);
				$password = htmlspecialchars($_POST['password']);
				$password = htmlspecialchars($_POST['password']);
				$roll_no = htmlspecialchars($_POST['roll_no']);
				$class_1 = htmlspecialchars($_POST['class']);
				$gender = htmlspecialchars($_POST['gender']);

				$class_section = explode(' ', $class_1);

				$class = $class_section[0];

				$section = $class_section[1];

				$sql = "SELECT * FROM classes WHERE class = '$class' AND section = '$section'";

				$query = mysqli_query($conn, $sql);

				// $classes = mysqli_fetch_all($query, MYSQLI_ASSOC);

				$class2 = mysqli_fetch_assoc($query);

				// foreach($classes as $class){

				// 	if(!$class['both_genders']){

				// 		if($gender == "female" && $class['boys']){
				// 	$error.="<br> Females are not allowed in boys class ";
				// }else if($gender == "male" && $class['girls']){
				// 	$error.="<br> Males are not allowed in girls class ";
				// }

				// }

				// }

				if($class){

							if(!$class2['both_genders']){

						if($gender == "female" && $class2['boys']){
					$error.="<br> Females are not allowed in boys class ";
				}else if($gender == "male" && $class2['girls']){
					$error.="<br> Males are not allowed in girls class ";
				}

				}

				}

			if(!$conn){

			//connection is false

			$error.="Error: ".mysqli_error($conn)."<br>";

			}else if($conn && empty($error)){

				$sql = "SELECT * FROM students WHERE roll_no = '$roll_no'";

				$query = mysqli_query($conn, $sql);

				$rows = mysqli_num_rows($query);

				if($rows == 0){
				
				//connection is true

				$class_section = explode(' ', $class_1);

				$class = $class_section[0];

				$section = $class_section[1];
				
				$sql = "INSERT INTO students(roll_no, name, father_name, password, gender, class, section) VALUES('$roll_no', '$user_name', '$f_name', '$password', '$gender', '$class', '$section')";
				
				$query = mysqli_query($conn, $sql);

				if($query){

					header('Location: admin.php');

				}else{
					$error.= "<br>".mysqli_error($conn)."<br";
				}

			}else{
				$error.="A student with this roll number alreay exists";
			}

			}

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
	<title>New Student</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
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
	<div style="">

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
	<div class="height-20"></div>
	<br>
	<br>

	<h5 id="typing" class="text-center text-info font-50px aniview-2 slow" data-av-animation="pulse">
		<span class="border-bottom-info">Register New Student</span>&nbsp;
	</h5>

	<!-- <div class="extra"></div> -->
	<br>
	<br>
	</div>
    <form class="form-signin" id="form-custom2" action="#" method="POST">
  <img class="mb-4" src="templates/img/logo.png" alt="logo" width="100px" height="260px">
  <!-- <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1> -->
  <label for="inputEmail" class="sr-only">Roll number</label>
  <input type="text" id="inputEmail" value="<?php echo $roll_no; ?>" class="form-control" placeholder="Roll Number" autocomplete="off" id="img-brand" name="roll_no" required autofocus>
  <br>
  <label for="user_name" class="sr-only">Name</label>
  <input type="text" id="user_name" value="<?php echo $user_name; ?>" class="form-control" placeholder="Name" autocomplete="off" id="img-brand" name="user_name" required autofocus>
  <br>
  <label for="f_name" class="sr-only">Father Name</label>
  <input type="text" id="f_name" value="<?php echo $f_name; ?>" class="form-control" placeholder="Father Name" autocomplete="off" id="img-brand" name="f_name" required autofocus>
  <br>
  <label for="inputPassword" class="sr-only login-field  hideShowPassword-hidden login-field-password">Password</label>
  <input type="password" id="inputPassword" value="<?php echo $password; ?>" class="form-control" placeholder="Password" autocomplete="off" name="password" required>
  <br>	
   <div style="margin-left: 2px;margin-right: 0;padding: 0;text-align: left;">
   <label for="class" class="font-20">Class</label>
   <br>
   <br>
      <select class="text-center text-white btn btn-outline-success btnCustom" name="class" id="class" style="font-size: 20px;">
      	<?php foreach($classes as $class){ ?>
      		<?php 
      		if($class['boys']){
      			$text = " (B)";
      		}else if($class['girls']){
      			$text = " (G)";
      		}else{
      			$text = " (B-G)";
      		}
      		 
      		 ?>
        <option value="<?php echo $class['class']." ".$class['section'].$text; ?>"><?php echo $class['class']." ".$class['section'].$text; ?></option>
      	<?php } ?>
      </select>
      </div>
      <br>
      <div style="margin-left: 2px;margin-right: 0;padding: 0;text-align: left;">
   <label for="gender" class="font-20">Gender</label>
   <br>
   <br>
      <select class="text-center text-white btn btn-outline-success btnCustom" name="gender" id="gender" style="font-size: 20px;">
      	
        <option value="male">MALE</option>
        <option value="female">FEMALE</option>

      </select>
      </div>
      <br>
  
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
	<script type="text/javascript" src="templates/js/script.js"></script>
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

	$('.my-toggle').addClass('btn btn-outline-success btnCustom');
</script>

</body>
</html>

	<?php include 'templates/footer.php'; ?>

<?php }else{
	header('Location: index.php');
} ?>

	

