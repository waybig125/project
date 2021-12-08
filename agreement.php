<!DOCTYPE html>
<html>
<head>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/sql/db.php'; ?>
	<?php include 'templates/preloader.php'; ?>
	<title>Agreement</title>
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

	<div id="" style="background: url(templates/img/img7.jpg);background-attachment: fixed;background-position: center;background-size: cover;background-repeat: no-repeat;">

	<div class="extra"></div>
	<br>
	<br>

	<h4 id="typing" class="text-center d-md-block d-lg-block d-sm-none d-none text-white font-80px aniview-2 reallyslow" data-av-animation="">
		<span class="border-bottom-white">Agreement</span>&nbsp;
	</h4>
	<h4 id="typing2" class="text-center d-block d-sm-block d-md-none d-lg-none text-white font-50px aniview-2 reallyslow" data-av-animation="">
		<span class="border-bottom-white">Agreement</span>&nbsp;
	</h4>

	<div class="extra"></div>

	<div class="extra"></div>

	<h1 class="text-white text-center" style="font-family: 'chalkboard';">
		By logging in to this website you accept this agreement
	</h1>

	<p class="text-white container">
		<ul>
			<br><hr><br>
			<li style="list-style-type: square;">
				<h3 style="font-family: 'chalkboard';">
				This Website uses Cookies
				</h3>
			</li>

			<br><hr><br>
				
			<h2 class="text-info">What cookies are?</h2>

			<p>

				HTTP cookies (also called web cookies, Internet cookies, browser cookies, or simply cookies) are small blocks of data created by a web server while a user is browsing a website and placed on the user's computer or other device by the user’s web browser.
				
			</p>

			<br><hr><br>

			<h2 class="text-info">What type of data will be stored in the cookies?</h2>

			<p>
				Your username you use to login to this website will be stored in the cookies.No personal information like passwords will be stored in the cookies.If you remove the cookie you will automatically be logged out of the website.
			</p>

			<br>

			<a href="https://en.wikipedia.org/wiki/HTTP_cookie" class="btn btn-outline-success btnCustom">Read More</a>

			<br><hr><br>

			<h2 class="text-info">Who will store the cookies?</h2>

			<p>
				Cookies will be stored on your device by the webserver and by google.
			</p>

			<br><hr><br>

			<li style="list-style-type: square;">
				<h3 style="font-family: 'chalkboard';">
				Redirects
				</h3>
			</li>

			<h2 class="text-info">Where will you be redirected?</h2>

			<p>
				You may be redirected to a webpage inside the website and may be an external website.
			</p>

			<br><hr><br>

			<li style="list-style-type: square;">

			<h3 style="font-family: 'chalkboard';">
				Sessions will be stored
				</h3>

			</li>

			<br><hr><br>
				
			<h2 class="text-info">What sessions are?</h2>

			<p>
			A session is a temporary and interactive information interchange between two or more communicating devices, or between a computer and user.
			</p>

			<br><hr><br>

			<h2 class="text-info">Who will store the sessions?</h2>

			<p>
				Sessions will be stored on your device by google.
			</p>

			<br>

			<a href="https://en.wikipedia.org/wiki/Session_(computer_science)" class="btn btn-outline-success btnCustom">Read More</a>

			<br><hr><br>
			
		</ul>
	</p>

	<div class="extra"></div>

	<br>
	<br>
	</div>

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