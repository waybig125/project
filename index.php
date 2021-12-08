<!DOCTYPE html>
<html>
<head>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/sql/db.php'; ?>
	<?php include 'templates/preloader.php'; ?>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css ">

	<!-- https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css -->

</head>
<body>

	<!-- <div class="text animate__animated animate__lightSpeedInLeft">text</div> -->

	<!-- <video id="bg" poster="templates/bg/earth.png" autoplay loop muted> -->
		<!-- <source src="templates/bg/earth.mp4"  type="video/mp4"> -->
			<!-- <source src="templates/bg/earth3.mov"> -->
	<!-- </video> -->

	<?php include 'templates/header.php'; ?>

	<?php 

	$backgrounds = ['img50.jpg', 'img6.jpg', 'img7.jpg', 'img8.jpg'];

	$random = mt_rand(0, 3);

	 ?>

	<div id="container" style="background: url(templates/img/<?php echo $backgrounds[$random]; ?>);background-attachment: fixed;background-position: center;background-size: cover;background-repeat: no-repeat;">

	<div class="extra"></div>
	<br>
	<br>

	<h4 id="typing" class="text-center d-md-block d-lg-block d-sm-none d-none text-success font-80px aniview-2 reallyslow" data-av-animation="">
		<span class="border-bottom-success">Welcome</span>&nbsp;
	</h4>
	<h4 id="typing2" class="text-center d-block d-sm-block d-md-none d-lg-none text-success font-50px aniview-2 reallyslow" data-av-animation="">
		<span class="border-bottom-success">Welcome</span>&nbsp;
	</h4>

	<div class="extra"></div>
	<br>
	<br>
	</div>

	<!-- <button data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-right" >click me!</button>
 -->
	<div class="rslides_container row">
		<div class="col-md-2 col-1 col-sm1"></div>
		<div class="col-md-8 col-10 col-sm-10">
			<?php

	 $images = scandir("imgs");

	 ?>
	<ul class="slides" id="slider1">
			<?php foreach ($images as $image) { ?>
			<?php 

			if(filetype($image) != "dir"){ 
			
				?>
				<li>
			<img src="imgs/<?php echo $image ?>" alt="<?php echo $image ?>" class="img-rounded">
			</li>
		<?php }
		
		}

		 ?>
	</ul>
	</div>
	<div class="col-md-2 col-1 col-sm-1"></div>
	<!-- <span class="tv1"></span> -->
	<!-- <span class="tv2"></span> -->
</div>

	<div class="extra"></div>

	<div class="jumbotron jumbotron-dark" id="main_jumbotron">
		<h4 class="text-success family-monospace text-center aniview fast" data-av-animation="pulse">Our Sevices</h4>
		<ul class="rslides slow" data-av-animation="fadeInUp">
			<?php 

			$sql = "SELECT * FROM services";

			$query = mysqli_query($conn, $sql);

			$fetches = mysqli_fetch_all($query, MYSQLI_ASSOC);

			foreach($fetches as $fetch){

			 ?>
			<li class="style-none" style="overflow: hidden;">
		<h1 class="text-gray">
			<?php echo $fetch['title']; ?>
		</h1>

		<div class="col-md-6 col-sm-8 col-8 col-lg-6">
			<?php 
			if($fetch['img'] != ""){
			 ?>
		<img src="<?php echo $fetch['img']; ?>" class="img-rounded" style="width: 200px;height: 100px;">

		<?php
			}
		?>

	</div>
	<div class="extra"></div>

		<p class="col-md-12 col-sm-12 col-12 col-lg-12 text_to_display" title="<?php echo htmlspecialchars($fetch['text_to_display']); ?>">
			<?php 
			if(strlen($fetch['text_to_display']) > 600){

	$text = substr($fetch['text_to_display'], 0, 600). " ...";

			}else{
				$text = $fetch['text_to_display'];
			}

			 ?>
			<?php echo htmlspecialchars($text); ?>
		</p>
	</li>
	<?php } ?>
		
	</ul>
	</div>

	<div class="extra"></div>
	<div class="extra d-md-none d-lg-none d-sm-block d-block"></div>
	<div class="extra d-md-none d-lg-none d-sm-block d-block"></div>

	<div class="jumbotron jumbotron-dark" id="third_jumbotron">
		<h4 class="text-success family-monospace text-center aniview fast" data-av-animation="pulse">Events</h4>
		<ul class="rslides aniview slow" data-av-animation="fadeInUp">
			<?php 

			$sql = "SELECT * FROM events";

			$query = mysqli_query($conn, $sql);

			$fetches = mysqli_fetch_all($query, MYSQLI_ASSOC);

			foreach($fetches as $fetch){

			 ?>
			<li class="style-none" style="overflow: hidden;">
		<h1 class="text-gray">
			<?php echo $fetch['title']; ?>
		</h1>

		<div class="col-md-6 col-sm-8 col-8 col-lg-6">
			<?php 
			if($fetch['img'] != ""){
			 ?>
		<img src="<?php echo $fetch['img']; ?>" class="img-rounded" style="width: 200px;height: 100px;">
		<?php 
	}
		 ?>
	</div>
	
	<div class="extra"></div>

		<p class="col-md-12 col-sm-12 col-12 col-lg-12 text_to_display" title="<?php echo htmlspecialchars($fetch['text_to_display']); ?>">
			<?php 
			if(strlen($fetch['text_to_display']) > 600){

	$text = substr($fetch['text_to_display'], 0, 600). " ...";

			}else{
				$text = $fetch['text_to_display'];
			}

			 ?>
			<?php echo htmlspecialchars($text); ?>
		</p>
	</li>
	<?php } ?>
	</ul>
	</div>

	<div class="extra"></div>
	<div class="extra"></div>
	
	<div class="extra d-md-none d-lg-none d-sm-block d-block"></div>
	<div class="extra d-md-none d-lg-none d-sm-block d-block"></div>

	<?php 

	// session_start();

	$bool = false;

	if(!$_COOKIE['logged_in'] ?? true){
		$bool = false;
	}else{
		$bool = true;
	}

	if(!$bool){
		
	?>

	<div class="jumbotron jumbotron-dark" id="sec_jumbotron">
		<div class="extra d-md-none d-sm-block d-block"></div>
		<h1 class="text-gray text-center">

	<a href="login.php" class="btn btn-outline-success btnCustom btn-lg aniview slow" data-av-animation="fadeInDownBig">Login</a>

	</h1>
	</div>

	<?php } ?>

	<?php include 'templates/footer.php'; ?>

	<script type="text/javascript" src="templates/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="templates/slider/responsiveslides.min.js"></script>
	<script src="templates/dist/jquery.aniview.js"></script>
	<script type="text/javascript" src="templates/js/script.min.js"></script>
	<script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>
	<!-- <script type="text/javascript" src="templates/plugin/js/tinyslide.js"></script> -->	
	<script type="text/javascript" src="templates/package/dist/index.umd.js"></script>
	<style>
	#main_jumbotron{
		background-image: transparent !important;
	}
	</style>

	<script type="text/javascript">
		new TypeIt('#typing2',{
    // strings: `<span class="border-bottom-success">Website Title</span> `,
    // strings: ' ',
    // lineBreak: false,
    speed: 150,
    startDelay: 2000,
    breakDelay: 750,
    cursorSpeed: 800,

  }).go();

	</script>

</body>
</html>