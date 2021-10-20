		<?php 

	if(isset($_POST['save_password']) && isset($_COOKIE['logged_in'])){

		$user_name = htmlspecialchars($_POST['user_name']);
				$password = htmlspecialchars($_POST['password']);

			if(!$conn){

			//connection is false

			$error.="Error: ".mysqli_error($conn)."<br>";

			}//connection is false

			else{
				//connection is true

				$user_name = $_COOKIE['user_name'] ?? "";

				$previllages = $_COOKIE['previllages'] ?? "";

				$password = htmlspecialchars($_POST['old']);

				$new_password = htmlspecialchars($_POST['new']);

				if($previllages == "student"){

				$sql = "SELECT * FROM students WHERE roll_no = '".$user_name."' AND password = '".$password."'";
				}else if($previllages == "admin"){
					$sql = "SELECT * FROM admins WHERE name = '".$user_name."' AND password = '".$password."'";
				}

				$query = mysqli_query($conn, $sql);

				$rows = mysqli_num_rows($query);

				if($rows == 1){
					// $error.=" no error";
					//update

					if($previllages == "student"){

	$sql = "UPDATE students SET password = '$new_password' WHERE roll_no = '".$user_name."' AND password = '".$password."'";

	}else if($previllages == "admin"){
		$sql = "UPDATE admins SET password = '$new_password' WHERE name = '".$user_name."' AND password = '".$password."'";
		}

		if(mysqli_query($conn, $sql)){

			header('Location: profile.php');

		}else{
			$error.="<br> Some Error has occured";
		}

				}else{
					$error.="<br>Incorrect Password";
				}

			}

	}


	 ?>

	 <!-- <link rel="stylesheet" href="templates/password/css/demo.css"> -->
	 <!-- <link rel="stylesheet" href="templates/vaildate-password/css/jquery.passwordRequirements.css"> -->
	 <link rel="stylesheet" href="templates/password/css/example.wink.css">
	 <link rel="stylesheet" href="templates/css/strengthify.css" type="text/css">
	 <link rel="stylesheet" href="templates/password/css/demo.css">

	<form class="fixed text-center" method="post" action="#">
		<div id="spinner">

			<span class="spinner-border text-success"></span>
			
		</div>
		<link href="templates/css/signin.css" rel="stylesheet">
		<div class="position-center form-signin" id="form-custom3">
			
			<div id="page1">
		<label class="old text-muted" for="old">
		<span class="content-password font-20 border-bottom-light">Password</span>
		</label>

		<br><br>
			
		<input type="password" class="form-control" name="old" autocomplete="off" required autofocus id="old">

		<div class="text-left-important">

		<a href="profile.php" class="btnCustom btn-outline-success btn" onclick="" id="cancel">Cancel</a>

		</div>

		<div class="text-right-important">

		<button class="btnCustom btn-outline-success btn" onclick="" type="button" id="next">Next</button>

		</div>

		</div>

		<div id="page2" style="display: none;">
		<label class="old text-muted" for="new">
		<span class="content-password font-20 border-bottom-light">New Password</span>
		</label>

		<br><br>

		<input type="password" class="form-control pr-password" name="new" autocomplete="off" required id="new">

		<!-- <div class="checkbox mb-3">

		<br>
		<input type="checkbox" id="show-password" style="width:20px;height: 20px;">
		 <label for="show-password" class="text-muted">Show password</label>

		</div> -->

		<div class="text-left-important">

		<button class="btnCustom btn-outline-success btn" type="button" id="prev">Prev</button>

		</div>

		<div class="text-right-important">

		<button class="btnCustom btn-outline-success btn" name="save_password" type="submit" id="save_password">Save</button>

		</div>

		</div>

		<div class="text-danger block text-center" id="error1">
			Please fill out the password field first
			<br>
			<?php echo $error ?>
		</div>
		<div class="text-danger block text-center" id="error2">
			<br>
			<?php echo $error ?>
		</div>

		</div>
	</form>
	<style type="text/css">
		html,body{
			overflow: hidden;
		}
    #pr-box{
        z-index: 8;
    }
	</style>

	<script type="text/javascript" src="templates/js/jquery.min.js"></script>
	<!-- <script src="templates/vaildate-password/js/jquery.passwordRequirements.min.js"></script> -->
	<script src="templates/js/jquery.strengthify.js"></script>
	<script src="templates/password/hideShowPassword.min.js"></script>

	<!-- <script src="templates/password/hideShowPassword.min.js"></script> -->

	<script type="text/javascript" src="templates/js/script2.js"></script>

	<script type="text/javascript">
		// $('#old').hidePassword('focus', {
		// toggle: { className: 'my-toggle' }
		// });	
		// $('#new').hidePassword('focus', {
		// toggle: { className: 'my-toggle' }
		// });	
	$('.my-toggle').addClass('btn-success').css({width: '50px'});
	 // $(function (){
  		//$("#new").passwordRequirements();
  		//});
 	//  $('#new').hidePassword('focus', {
	//   toggle: { className: 'my-toggle' }
	// });	
 	//  $('#old').hidePassword('focus', {
	//   toggle: { className: 'my-toggle' }
	// });	
	// $('.my-toggle').addClass('btn');
	// $('#show-password').on('change', function(){
 // 	$('#new').hideShowPassword($(this).prop('checked'));
	// });
	// $('#new').hidePassword(true);

	 $('#new').strengthify({
			zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
			tilesOptions:{
				tooltip: false,
				element: true
			},
			drawTitles: true,
			drawMessage: false,
			drawBars: true
		})
	</script>
	



