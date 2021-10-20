<!DOCTYPE html>
<html>
<head>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/sql/db.php'; ?>
	<?php include 'templates/preloader.php'; ?>
	<title>About</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
</head>
<body>

	<?php include 'templates/header.php'; ?>

	<div class="cover" style="background: url(templates/img/img6.jpg);background-attachment: fixed;background-size: cover;background-repeat: no-repeat;height: 1800px">

	<div class="extra"></div>

	<div class="row">
		<div class="col-md-2 col-sm-2 col-2 text-right" id="who_we_are" style="align-self: center;">
			<img src="templates/img/logo.png">
		</div>
		<div class="col-md-2 col-sm-3 col-3">
		</div>
		<div class="col-md-8 col-sm-7 col-7" id="about_us">
			<h2 class="text-success family-monospace" id="typing">About Us&nbsp;</h2>
			<br>
			<hr>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
	</div>
	

	<div class="extra"></div>

	<div class="jumbotron jumbotron-dark row" id="third_jumbotron">
		<div class="col-md-3 col-lg-3 d-none d-sm-none d-md-block">
		<h1 class="text-success family-monospace text-center mt--10">
		<a href="index.php" class="d-none d-sm-none d-md-block">
		<img src="templates/img/logo.png">
		</a>
		</h1>
		</div>
		<div class="col-md-1 col-lg-1 d-none d-sm-none d-md-block"></div>
		<div class="col-md-8 col-12 col-sm-12 col-lg-8">

		<h2 class="text-success family-monospace aniview reallyslow" data-av-animation="fadeInRight">
			Our Mission	
		</h2>

		<ul class="rslides text-white">
			<li class="style-none">
		<h2 class="text-info">
			Mission 1
		</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		</p>
	</li>
		<li class="style-none">
		<h2 class="text-info">
			Mission 2
		</h2>
		<p>
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</li>
	</ul>
	</div>
	</div>

	<div class="extra"></div>

	</div>

	<!-- <div class="jumbotron jumbotron-dark" id="sec_jumbotron">
		<h1 class="text-gray text-center">
	<a href="#" class="btn btn-outline-success btnCustom">Login</a>
	</h1>
	</div> -->

	<div class="extra d-block d-sm-block d-md-none d-lg-none max-500"></div>

	<?php if(!isset($_COOKIE['logged_in'])){ ?>
	
	<div class="jumbotron jumbotron-dark" id="sec_jumbotron">
		<h1 class="text-gray text-center">
	<a href="login.php" class="btn btn-outline-success btnCustom btn-lg aniview slow" data-av-animation="fadeInDownBig">Login</a>
	</h1>
	</div>
	
	<?php }else{ ?>


	<div class="jumbotron jumbotron-dark" id="sec_jumbotron">
		<h1 class="text-gray text-center">
	<a href="logout.php" class="btn btn-outline-success btnCustom btn-lg aniview slow" data-av-animation="fadeInDownBig">Logout</a>
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
		 	background-image: url(templates/img/logo.png) !important;
		 	background-position: center;
	  	background-repeat: no-repeat;
	}
	</style>

</body>
</html>