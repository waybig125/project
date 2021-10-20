<!DOCTYPE html>
<html>
<head>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/sql/db.php'; ?>
	<?php include 'templates/preloader.php'; ?>
	<title>404 Error</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
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

	<div id="container" style="background: url(templates/img/img50.jpg);background-attachment: fixed;background-position: center;background-size: cover;background-repeat: no-repeat;">

	<div class="extra"></div>
	<br>
	<br>

	<h4 id="typing" class="text-center d-md-block d-lg-block d-sm-none d-none text-success font-80px aniview-2 reallyslow" data-av-animation="">
		<span class="border-bottom-success">404 Error</span>&nbsp;
	</h4>
	<h4 id="typing2" class="text-center d-block d-sm-block d-md-none d-lg-none text-success font-50px aniview-2 reallyslow" data-av-animation="">
		<span class="border-bottom-success">404 Error</span>&nbsp;
	</h4>
	<br>
	<br>
	<h2 class="text-white text-center">
		Page not found
	</h2>
	<div class="text-center">
	<a class="btn btn-outline-success text-white btnCustom btn-lg" href="index.php">GO HOME</a>
	</div>

	<div class="extra"></div>
	<br>
	<br>
	</div>

	<!-- <button data-mdb-toggle="animation" data-mdb-animation-reset="true" data-mdb-animation="slide-right" >click me!</button>
 -->
	

	<div class="extra"></div>

	<div class="jumbotron jumbotron-dark" id="main_jumbotron">
		<h4 class="text-success family-monospace text-center aniview fast" data-av-animation="pulse">Our Sevices</h4>
		<ul class="rslides slow" data-av-animation="fadeInUp">
			<li class="style-none">
		<h1 class="text-gray">
			Service 1<!-- lightSpeedInLeft -->
		</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		</p>
	</li>
		<li class="style-none">
		<h1 class="text-gray">
			Service 2
		</h1>
		<p>
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</li>
	</ul>
	</div>

	<div class="jumbotron jumbotron-dark" id="third_jumbotron">
		<h4 class="text-success family-monospace text-center aniview fast" data-av-animation="pulse">Events</h4>
		<ul class="rslides aniview slow" data-av-animation="fadeInUp">
			<li class="style-none">
		<h1 class="text-gray">
			Event 1
		</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		</p>
	</li>
		<li class="style-none">
		<h1 class="text-gray">
			Event 2
		</h1>
		<p>
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</li>
	</ul>
	</div>

	<div class="extra"></div>

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
	<script type="text/javascript" src="templates/js/script.js"></script>
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