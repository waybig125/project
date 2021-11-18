<?php 

$previllages = base64_decode($_COOKIE['previllages']) ?? "";

if($previllages == "admin"){

 ?>
<?php include 'templates/sql/db.php'; ?>
<?php 
			
				$title = "";
				$text = "";
				$description = "";
				$class = "1";

				if($conn){

					$sql = "SELECT * FROM classes";
					$query = mysqli_query($conn, $sql);
					$classes = mysqli_fetch_all($query, MYSQLI_ASSOC);
		

		}else{
			$error.= mysqli_error($conn);
		}

			if(isset($_POST['title'])){

				$class = htmlspecialchars($_POST['class']);
				$title = htmlspecialchars($_POST['title']);
				$from_user = $_COOKIE['user_name'] ?? "";
				$description = htmlspecialchars($_POST['description']);
				$text = htmlspecialchars($_POST['text']);
				$created_by = $_COOKIE['user_name'] ?? "";

				$uploaded_file = $_FILES['file']['name'];
				$temp_path = $_FILES['file']['tmp_name'];

				$errorFile = $_FILES['file']['error'];

				$uploaded_file_exploded = explode('.', $uploaded_file);

				$i = 0;

				foreach($uploaded_file_exploded as $file_str){
					$i++;
				}

				$i = $i-1;

				$format = $uploaded_file_exploded[$i];

				$id = uniqid('', true);
				str_replace('.', '-', $id);
				$fileUrl = "result_cards/".$id.$uploaded_file;

				 if(!$error){

				 	 if(!empty($uploaded_file)){

    		move_uploaded_file($temp_path, $fileUrl);

	    	}else{
	    		$fileUrl = "";
	    	}

    		$sql = "INSERT INTO notices(title,description,created_by,class,url,text) VALUES('$title','$description','$created_by','$class','$fileUrl','$text')";
    		// echo $sql;
    		$query = mysqli_query($conn, $sql);
    		if($query){
    			header('Location: admin.php');
    		}else{
    			$error.="<br>Error: ".mysqli_error($conn);
    		}

		    }else{
		        $error.="<br>Error: ".mysqli_error($conn);
		    }

				if($conn){


			}else{
				$error.= mysqli_error($conn);
			}
				

			}//end isset

		
			echo '<div class="alert text-danger aniview reallyslow" data-av-animation="fadeInDownBig" style="font-size: 20px;" id="alert">
			<br>
			'.$error.'
		</div>
		';
		
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/preloader.php';
					$error = "";
					 ?>
	<title>New Notice</title>
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
	<?php 

	$backgrounds = ['img50.jpg', 'img11.jpg', 'img7.jpg', 'img8.jpg'];

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

	<h5 id="typing" class="text-center text-success font-50px aniview-2 slow" data-av-animation="pulse">
		<span class="border-bottom-info">New Notice</span>&nbsp;
	</h5>

	<!-- <div class="extra"></div> -->
	<br>
	<br>
	</div>

    <form class="form-signin" id="form-custom2" action="#" method="POST" enctype="multipart/form-data">

  <img class="mb-4" src="templates/img/logo.png" alt="logo" width="100px" height="260px">
  <!-- <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1> -->
  <label for="roll" class="sr-only">Title</label>
  <input type="text" id="title" value="<?php echo $title; ?>" class="form-control" placeholder="Title" autocomplete="off" id="img-brand" name="title" required autofocus>

  <br>
  <label for="roll" class="sr-only">Description</label>
  <textarea type="text" id="description" value="<?php echo $description; ?>" class="form-control" placeholder="Description" autocomplete="off" id="img-brand" name="description" required style="
  	resize: none;border: 1px solid #00b74a;"></textarea>

  <br>
  <textarea type="text" id="text" value="<?php echo $text; ?>" class="form-control" placeholder="Notice" autocomplete="off" id="img-brand" name="text" required style="
  	resize: none;border: 1px solid #00b74a;"></textarea>

  <br>
  <label for="roll" class="sr-only">Class Id</label>
  <input type="text" id="class" value="<?php echo $class; ?>" class="form-control" placeholder="Class Id" autocomplete="off" id="img-brand" name="class" readonly required>

  <br>

  <input type="file" name="file">

  <br>
  <br>

  <button class="btn btn-lg btn-outline-success btnCustom btn-block" type="submit" name="submit">SUBMIT</button>
  <p class="mt-5 mb-3 text-danger"><?php echo $error; ?></p>
  <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>
<section id="students" class="card">
		<ul class="list-group">
		<?php foreach ($classes as $class) { ?>
			<li class="list-group-item text-white list-group-flush list-group-item-action"
			id="<?php echo $class['id']; ?>"
			>
		<div class="student card-body" id="<?php echo $class['id']; ?>">
			<div class="row">
				<div class="col-md-6 col-sm-10 col-10">
					<div class="row">
			<span class="dp col-md-2 col-sm-12 col-12" style="margin-bottom: 10px;margin-left: 5px;">
				<img src="templates/img/logo.png" class="icon" style="width: 30px !important;height: 60px !important;filter: brightness(90.0);">
			</span>
			<span class="name col-md-5 col-12 col-sm-12 self-center" style="overflow: hidden;" style="margin-bottom: 10px;">
		<span style="width: 12px" class="d-inline-block d-sm-inline-block d-md-none d-lg-none"></span><?php echo $class['id']; ?>
		</span>
			<span class="class col-md-5 col-12 col-sm-12 self-center">
				<span title="<?php echo $class['class'].' '.$class['section']; ?>">
				&ensp;<?php echo $class['class'].' '.$class['section']; ?> 
				<?php //echo $class['section']; ?>
			<?php if($class['boys']){ 

				echo " (B)";

			}else if($class['girls']){
				echo " (G)";
			}else{
				echo " (B-G)";
			}

			 ?>
				</span>
				<span class="d-inline d-sm-inline d-md-inline-block d-lg-inline-block">
				</span>

			</span>
			</div>
		</div>
			
		</div>
		</li>
	<?php } ?>
	</ul>
	</section>
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
	<script type="text/javascript">
		$('.list-group-item').on('click', function(){
			let id = $(this).attr('id');
			document.getElementById('class').value = id;
		});
	</script>
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


</body>
</html>

	<?php include 'templates/footer.php'; ?>

<?php }else{
	header('Location: index.php');
} ?>

	

