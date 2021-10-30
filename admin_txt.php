<?php include 'templates/sql/db.php'; ?>
<?php if(isset($_GET['student'])){ ?>
<?php
	
	$previllages = $_COOKIE['previllages'] ?? "";

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

 		}
 		$from_user = $id."_student";
	// $sql = "UPDATE students SET unread_msg = '0' WHERE roll_no = '$student'";
 // 		if(mysqli_query($conn, $sql)){
 // 			$success = true;
 // 		}else{
 // 			$error .= mysqli_error($conn);
 // 		}
 // 		$sql = "UPDATE messages SET read_msg = '1' WHERE from_user = '$from_user'";
 // 		if(mysqli_query($conn, $sql)){
 // 			$success = true;
 // 		}else{
 // 			$error .= mysqli_error($conn);
 // 		}

 	}else{
 			$error .= mysqli_error($conn);
 		}

	if(isset($_GET['student'])){
	setcookie('student', $student, time() + 864000);
	}

	$error = "";

 	if(isset($_POST['send'])){

 		if($conn){

 		$message = htmlspecialchars($_POST['message']);
 		$message = mysqli_real_escape_string($conn, $message);
 		$roll_no = $_COOKIE['student'] ?? "";
 		$sql = "SELECT * FROM students WHERE roll_no = '$roll_no'";
 		$query = mysqli_query($conn, $sql);
 		$fetch = mysqli_fetch_assoc($query);

 		if($fetch){

 			$id = $fetch['id'];

 		}

 		$to_user = $id."_student";

 		$sql = "INSERT INTO messages(from_user,to_user,content) VALUES('admin','$to_user','$message')";
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
		<?php include 'templates/meta.php'; ?>
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
	<?php include 'templates/preloader.php'; ?>
	<?php include 'templates/header.php'; ?>

	<iframe src="admin_txt_.php" width="100%" frameborder="0" height="350px" id="iframe">

	</iframe>
     
	<button class="btn btn-outline-success btnCustom btn-lg" onclick="reload();" style="font-size: 20px;position: absolute;right: 20px;top: 100px;">
		↺
	</button>
	<form method="post" action="#" class="text-center">
		<!-- <div class="row"> -->
			<div class="col-md-2"></div>
			<div class="d-md-none d-sm-block d-block" style="height: 5px;"></div>
			<div class="height-50 d-none d-sm-none d-md-block"></div>
<textarea placeholder="Type a message..." class="form-control col-md-6 col-sm-6 col-6 text-dark input-rounded" name="message" id="message" required></textarea>

<button type="button" class="col-md-2 col-2 col-sm-2" id="send" name="send">
	<img src="templates/img/send.jpeg" class="icon">
</button>

<!-- </div> -->
	</form>
	<div id="php"></div>
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
         document.getElementById('iframe').src = "admin_txt_.php";
         // setTimeout(reload, 15000);
     }
     reload();
     reload();

     $('#send').on('click', function(){
     	let valueMsg = document.getElementById('message').value;

     	if(valueMsg != ""){
     		
     	$('#php').load('text3.php', {
     		message: valueMsg
     	});
     	
     	document.getElementById('message').value = "";

     	$('#message').removeClass('border-crimson');

     }else{
     	$('#message').addClass('border-crimson');
     }
     });

 	</script>
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
}else{
?>
<?php include 'templates/sql/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="templates/css/style2.css"> -->
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css ">
	<link href="templates/css/signin.css" rel="stylesheet">
</head>
<body>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/preloader.php'; ?>
	<?php include 'templates/header.php'; ?>

	<?php if($conn){ ?>

		<?php 

		$search = "";

		$sql = "SELECT * FROM students ORDER BY unread_msg DESC";
		$students = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);

		if(isset($_GET['search'])){
		$search = htmlspecialchars($_GET['search']);
		$sql = "SELECT * FROM students WHERE name LIKE '%$search%' OR roll_no LIKE '%$search%' OR father_name LIKE '%$search%' OR class LIKE '%$search%' OR section LIKE '%$search%' ORDER BY unread_msg DESC";
		$students = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
		}

		 ?>

	<?php } ?>
	<br>
	<br>
	<br>
	<form method="GET" action="#" class="form-inline text-center">
		<input type="text" name="search" id="search" placeholder="Search..." class="form-control input-rounded" style="display: inline-block;max-width: 50%;" value="<?php echo $search; ?>">
		<button type="submit" class="btn btn-outline-success btnCustom">
			Search <i class="fas fa-search search-input"></i>
		</button>
	</form>


	<br>
	<br>
	<br>

	<?php foreach ($students as $student) { ?>
			<li class="list-group-item text-white list-group-flush list-group-item-action">
		<div class="student card-body" id="<?php echo $student['id']; ?>">
			<div class="row">
				<div class="col-md-6 col-sm-10 col-10">
					<div class="row">
			<span class="dp col-md-2 col-sm-12 col-12" style="margin-bottom: 10px;margin-left: 5px;">
				<img src="<?php echo $student['dpUrl']; ?>" class="icon">
			</span>
			<span class="name col-md-5 col-12 col-sm-12 self-center" style="overflow: hidden;" style="margin-bottom: 10px;">
		<span style="width: 12px" class="d-inline-block d-sm-inline-block d-md-none d-lg-none"></span><?php echo $student['roll_no']; ?>
		</span>
			<span class="class col-md-5 col-12 col-sm-12 self-center">
				<span title="<?php echo $student['class'].' '.$student['section']; ?>">
				&ensp;<?php echo $student['class'].' '.$student['section']; ?> 
				<?php //echo $student['section']; ?>
				</span>
				<span class="d-inline d-sm-inline d-md-inline-block d-lg-inline-block">
				</span>
				<?php if($student['blocked']){ ?>
				<span class="d-none badge badge-primary text-white d-sm-none d-md-inline-block d-lg-inline-block" style="background: skyblue;font-weight: lighter;">blocked
				</span>
			<?php } ?>

			</span>
			</div>
		</div>
			<div class="col-md-6 col-sm-2 col-2 d-inline-block d-md-inline-block d-sm-inline-block d-lg-inline-block">

				<?php if($student['unread_msg'] != 0){ ?>

				<span class="badge badge-success text-white" style="border-radius: 50%;background: #00b74a;margin-right: 20px;">
					<?php echo $student['unread_msg']; ?>
				</span>

			<?php } ?>

				<a href="?student=<?php echo $student['roll_no']; ?>">
					<i class="fas fa-comments"></i>
				</a>
						 
           <!-- Dropdown end -->
				
				<!-- <span class="col-3"></span> -->
			</span>
		</div>
			</div>
		</div>
		</li>
	<?php } ?>

	<script type="text/javascript" src="templates/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="templates/slider/responsiveslides.min.js"></script>
	<script src="templates/dist/jquery.aniview.js"></script>
	<script type="text/javascript" src="templates/js/script3.js"></script>
	<script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>
	<script type="text/javascript" src="templates/package/dist/index.umd.js"></script>
	<!-- <script src="templates/linkify/linkify.min.js"></script>
	<script src="templates/linkify/linkify-jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
	  $('#messages').linkify();
	});
	</script> -->

	
</body>
</html>
<?php } ?>