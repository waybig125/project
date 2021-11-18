<?php include 'templates/sql/db.php'; ?>
<?php include 'templates/preloader.php'; ?>
<?php 
	$gender = "";
	if($_COOKIE['logged_in'] ?? false){
	$error = "";
	
	if(isset($_POST['save'])){
		include 'upload_dp.php';
	}

	if($_GET['change_password'] ?? false){
		// echo "true";
		include 'change_password.php';
	}else{
		// echo "false";
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'templates/meta.php'; ?>
	<?php

		$name = '';
		$dpUrl = '';
		$fatherName = '';
		$class = '';
		$section = '';

	if($conn){

		$previllages = base64_decode($_COOKIE['previllages']) ?? "";

		if($previllages == "admin"){

		$sql = "SELECT * FROM admins WHERE name = '".$_COOKIE['user_name']."'";

		$query = mysqli_query($conn, $sql);

		$fetches = mysqli_fetch_assoc($query);		

		if($fetches){
			$name = $fetches['name'];
			$dpUrl = $fetches['dpUrl'];
		}	

		}else if($previllages == "student"){
	
	$sql = "SELECT * FROM students WHERE roll_no = '".$_COOKIE['user_name']."'";

	$query = mysqli_query($conn, $sql);

	$fetches = mysqli_fetch_assoc($query);

	if($fetches){
		$name = $fetches['name'];
		$dpUrl = $fetches['dpUrl'];
		$fatherName = $fetches['father_name'];
		$class = $fetches['class'];
		$section = $fetches['section'];
		$gender = $fetches['gender'];
		if($gender == "male"){
			$text = "S/O: ";
		}else{
			$text = "D/O: ";
		}
		// echo $fecthes['section'];
	}

	}
	
	}else{
		$error = "Errror: ".mysqli_error($conn);
	}

	?>
	<title>Profile Settings</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css ">
	<link href="templates/img-upload/dist/imageuploadify.min.css" rel="stylesheet">

	<!-- https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css -->

</head>
<body>


	<?php include 'templates/header.php'; ?>

	<div id="container" style="background: url(templates/img/img12.jpg);background-attachment: fixed;background-position: center;background-size: cover;background-repeat: no-repeat;">

	<div class="extra"></div>
	<br>
	<br>

	<h4 id="typing" class="text-center text-white font-80px aniview-2 slow" data-av-animation="pulse">
		<span class="border-bottom">Profile</span>&nbsp;
	</h4>

	<div class="height-20"></div>
	<div class="height-20"></div>
	<div class="height-20"></div>
	<div class="height-20"></div>
	<div class="height-20"></div>

	<!-- <input type="file" accept="image/*" multiple> -->
	<div id="form" class="text-muted">
	<form class="text-center" method="POST" action="#" enctype="multipart/form-data">
	<input type="file" id="selectedFile" name="image" accept="image/*" style="display: none;" onchange="changeDp(event);" required>
	<button type="button" onclick="document.getElementById('selectedFile').click();" class="circle-frame">
		<!-- <i class="fas fa-plus fa-custom"></i> -->
		<br>
		<img src="<?php echo $dpUrl ?? 'templates/img/dp.png'; ?>" alt="dp" id="dpImg">
		<img src="<?php echo $dpUrl ?? 'templates/img/dp.png'; ?>" alt="dp" id="hiddenDp">
		<!-- <i class="fas fa-cloud-upload-alt"></i> -->
	</button>
	<br>
	<br>
	<div class="part2 inline-block text-align-left padding-50 margin-20 font-20 capitalize">
		
		<?php if($previllages == "student"){ ?>
			<div class="row">
		<div class="col-md-4 d-none d-sm-none d-md-block d-lg-block col-lg-4"></div>
		<div class="col-md-8 col-12 col-sm-12 col-lg-8">
		Name: &ensp;&ensp;&ensp;<span class="text-gray" id="name" title="<?php echo $name; ?>"><?php echo $name; ?></span>
		<br>
		<br>
		<?php echo $text;?>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<span class="text-gray" id="f_name" title="<?php echo $fatherName; ?>"><?php echo $fatherName; ?></span>
		<br>
		<br>
		Class: &ensp;&ensp;&ensp;<span class="text-gray"><?php echo $class; ?></span>
		<br>
		<br>
		Section: &nbsp;<?php echo $section; ?>&ensp;&ensp;<span class="text-gray" style="font-weight: 5000;background: <?php echo $section; ?>;width: 20px;height: 20px;display: inline-block;color: slategray;border: 1px solid black;" title="<?php echo $section; ?> "></span>
		<span>
			
			<?php //echo $section; ?> 
				
		</span>

		</div>

		</div>

		<script type="text/javascript">
			let f_name = document.getElementById('f_name');
        	let f_nameText = f_name.innerText;
        	let f_length = f_nameText.length;
        	let f_sliced = f_nameText.slice(0, 10);
        	if(f_length > 11){
        	f_name.innerText = f_sliced+" ...";
        	}
		</script>

		<?php }else if($previllages == "admin"){ ?>
			<div class="text-center transform-none">
			<br>
			<br>
			You are currently logged in as <span class="capitalize" id="name" title="<?php echo $name; ?>"><?php echo $name; ?></span>
			</div>

			<div class="text-center">

				<br>

			<a href="remove_account.php?remove_account=<?php echo $_COOKIE['user_name'] ?? ""; ?>&confirm=false" class="btn btn-outline-success btnCustom">Remove Account</a>

		</div>

		<?php } ?>

		<!--  style="color: <?php 
		if(!$section == 'blue'){
		echo $section;
	}else{
		echo 'skyblue';
	}
		 ?>;" -->
		<br>
		<br>
			<?php if($previllages == "student"){ ?>
				<div class="row">
			<div class="col-md-4 col-lg-4 d-none d-md-block d-lg-block d-sm-none"></div>

			<div class="col-md-8 col-lg-8 col-12 col-sm-12">
		Password: <a href="?change_password=true" class="btnCustom btn-outline-success btn-sm btn inline btn-change" id="change">Change</a>
		</div>
		</div>
	<?php }else if($previllages == "admin"){ ?>
		<div class="text-center">
			Password: <a href="?change_password=true" class="btnCustom btn-outline-success btn-sm btn inline btn-change" id="change">Change</a>
			</div>
		<?php } ?>

		</div>
		<br>
		<br>
		<button type="submit" class="btn btn-outline-success btnCustom" name="save" id="save">
			Save Changes
		</button>
		</div>
		<br>
		</div>
		
	</form>
	</div>

	<div class="text-white text-center">
		
	</div>

	<div class="extra"></div>
	<br>
	<br>
	</div>

	<div class="extra"></div>

	<div class="jumbotron jumbotron-dark" id="sec_jumbotron">
		<div class="extra d-md-none d-sm-block d-block"></div>
		<!-- <h1 class="text-gray text-center">

	<a href="login.php" class="btn btn-outline-success btnCustom btn-lg aniview slow" data-av-animation="fadeInDownBig">Login</a>

	</h1> -->
	</div>

	<?php include 'templates/footer.php'; ?>

	<script type="text/javascript" src="templates/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="templates/slider/responsiveslides.min.js"></script>
	<script src="templates/dist/jquery.aniview.js"></script>
	<script type="text/javascript" src="templates/js/script.js"></script>
	<script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>
	<!-- <script type="text/javascript" src="templates/plugin/js/tinyslide.js"></script> -->	
	<script type="text/javascript" src="templates/package/dist/index.umd.js"></script>
	<script type="text/javascript" src="templates/img-upload/dist/imageuploadify.min.js"></script>
	<!--  <script type="text/javascript">
            $(document).ready(function() {
                $('input[type="file"]').imageuploadify();
            })
        </script> -->
        <script type="text/javascript">
        	let name = document.getElementById('name');
        	let nameText = name.innerText;
        	let length1 = nameText.length;
        	let sliced = nameText.slice(0, 10);
        	if(length1 > 11){
        	name.innerText = sliced+" ...";
        	}

        	// function changeDp(){
        	// 	const file[] = this.files;
        	// 	if(file){
        	// 		alert(URL.createObjectURL(file));
        	// 	}
        	// }
        	var changeDp = function(event){
        		// alert(URL.createObjectURL(event.target.files[0]));
        		var image = document.getElementById('dpImg');
        		image.src = URL.createObjectURL(event.target.files[0]);
        	}
        </script>
		<style>
			#main_jumbotron{
				background-image: transparent !important;
			}
			::-webkit-input-placeholder { /* Edge */
		  color: gray !important;
		  opacity: 1;
		}

		:-ms-input-placeholder { /* Internet Explorer 10-11 */
		  color: gray !important;
		  opacity: 1;
		}

		::placeholder {
		  color: gray !important;
		  opacity: 1;
		}

		</style>


</body>
</html>
<?php }else{
	header('Location: index.php');
} ?>