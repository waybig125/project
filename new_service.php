<?php 

$previllages = base64_decode($_COOKIE['previllages']) ?? "";

if($previllages == "admin"){

	$title = "";

 ?>
<?php include 'templates/sql/db.php'; ?>
<?php

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
	<title>New Service</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css ">
	<!--  -->

</head>
<body>
	<?php 

	$backgrounds = ['img50.jpg', 'img11.jpg', 'img6.jpg', 'img8.jpg'];

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
		<span class="border-bottom-info">New Service</span>&nbsp;
	</h5>

	<!-- <div class="extra"></div> -->
	<br>
	<br>
	</div>

    <form class="form-signin" id="form-custom2" action="#" method="POST" enctype="multipart/form-data">

  <img class="mb-4" src="templates/img/logo.png" alt="logo" width="100px" height="260px">
  <!-- <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1> -->
  <label for="roll" class="sr-only">Title</label>
  <input type="text" id="title" value="<?php echo $title; ?>" class="form-control" placeholder="Title" autocomplete="off" name="title" required autofocus>

  <br>

  <textarea id="text" name="text" placeholder="Text" class="form-control"></textarea>

  <br>

  <input type="file" name="file" id="file" onchange="loadImage(event);">

  <br>
  <br>

  <button class="btn btn-lg btn-outline-success btnCustom btn-block" type="button" name="submit" onclick="loadData(this);">SUBMIT</button>
  <p class="mt-5 mb-3 text-danger"><?php echo $error; ?></p>
  <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
</form>

</div>

</div>

	<!-- <div class="extra"></div> -->
	
	<div class="extra"></div>


	<div class="jumbotron jumbotron-dark" id="sec_jumbotron">
		
	</div>

	<div id="php"></div>

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

		var imgFile = "";

		function loadImage(event){

				var image = event.target.files[0];

			if(image.type.match("image.*")){

			var reader = new FileReader();

			reader.addEventListener("load", function(){
				imgFile = reader.result;
			}, false);

			if(image){
				reader.readAsDataURL(image);
			}

			}

		}
		function loadData(button){

			let data = new Promise((resolve, reject) => {

				$('#php').load('add_service.php', {
     		img: imgFile,
     		text: $('#text').val(),
     		title: $('#title').val()
     	});

				$('.preloader-container').fadeIn();

				resolve('done')

			});

			data.then((msg) => {

				console.log(msg)

				button.disabled = "disabled"

				button.classList.add('disabled');

				// window.location.href = "index.php";
			});
		
	}
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
textarea{
	resize: none;
}

	</style>

</div>


</body>
</html>

	<?php //include 'templates/footer.php'; ?>

<?php }else{
	header('Location: index.php');
} ?>

	

