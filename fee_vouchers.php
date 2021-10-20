<?php 

$previllages = $_COOKIE['previllages'] ?? "";

if($previllages == "admin"){

 ?>
<?php include 'templates/sql/db.php'; ?>
<?php 
			
				$roll = "";

				if($conn){

					$sql = "SELECT * FROM fee_vouchers ORDER BY submitted_at DESC";
					$query = mysqli_query($conn, $sql);
					$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
		

		}else{
			$error.= mysqli_error($conn);
		}
		
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
	<title>Fee Vouchers</title>
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
	<div style="background: url(templates/img/img6.jpg);background-attachment: fixed;background-position: center;background-size: cover;background-repeat: no-repeat;">

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
		<span class="border-bottom-info">Fee Vouchers</span>&nbsp;
	</h5>

	<!-- <div class="extra"></div> -->
	<br>
	<br>
	</div>

   
<section id="students" class="card">
		<ul class="list-group">
		<?php foreach ($results as $result) { ?>
			<li class="list-group-item text-white list-group-flush list-group-item-action"
			id="<?php echo $result['id']; ?>"
			>
		<div class="student card-body text-left" id="<?php echo $result['id']; ?>" style="text-align: left !important;">
			<h6>
				<?php //echo $result['id']; ?>.
				<span class="width-20 d-inline-block d-sm-inline-block d-md-inline-block"></span>
				<span class="text-info">
				<?php echo $result['to_user']; ?>
				</span>
				<span class="width-20 d-inline-block d-sm-inline-block d-md-inline-block"></span>
				<span class="width-20 d-inline-block d-sm-inline-block d-md-inline-block"></span>
				<a href="<?php echo $result['url']; ?>" class="btn btn-lg btn-outline-success btnCustom">
					<i class="fas fa-eye"></i>
				</a>
				<span class="width-20 d-inline-block d-sm-inline-block d-md-inline-block"></span>
				<span class="width-20 d-inline-block d-sm-inline-block d-md-inline-block"></span>
				Submitted at <?php echo date($result['submitted_at']); ?>
			</h6>
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

<?php }else if($previllages == "student"){?>

<?php include 'templates/sql/db.php'; ?>
<?php 
			
				$roll = "";
				$user_name = $_COOKIE['user_name'] ?? "";

				if($conn){

					$sql = "SELECT * FROM fee_vouchers WHERE to_user = '$user_name' ORDER BY submitted_at DESC";
					$query = mysqli_query($conn, $sql);
					$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
		

		}else{
			$error.= mysqli_error($conn);
		}
		
			echo '<div class="alert text-danger aniview reallyslow" data-av-animation="fadeInDownBig" style="font-size: 20px;" id="alert">
			<br>
			'.$error.'
		</div>
		';
		
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Fee Vouchers</title>
	<?php include 'templates/sql/db.php'; ?>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/preloader.php';?>

	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css ">

</head>
<body>

	<?php include'templates/header.php'; ?>

	 <!-- Custom styles for this template -->
    <link href="templates/css/signin.css" rel="stylesheet">

    <div style="background: url(templates/img/img6.jpg);background-attachment: fixed;background-position: center;background-size: cover;background-repeat: no-repeat;">

  <div class="text-center">

	<div id="container">

	<div class="height-20"></div>
	<div class="height-20"></div>
	<div class="height-20"></div>
	<br>
	<br>

	<h5 id="typing" class="text-center text-info font-50px aniview-2 slow" data-av-animation="pulse">
		<span class="border-bottom-info">Fee Vouchers</span>&nbsp;
	</h5>

	<!-- <div class="extra"></div> -->
	<br>
	<br>
	</div>

   
<section id="students" class="card">
		<ul class="list-group">
		<?php foreach ($results as $result) { ?>
			<li class="list-group-item text-white list-group-flush list-group-item-action"
			id="<?php echo $result['id']; ?>"
			>
		<div class="student card-body text-left" id="<?php echo $result['id']; ?>" style="text-align: left !important;">
			<h6>
				<?php //echo $result['id']; ?>.
				<span class="width-20 d-inline-block d-sm-inline-block d-md-inline-block"></span>
				<span class="text-info">
				<?php echo $result['to_user']; ?>
				</span>
				<span class="width-20 d-inline-block d-sm-inline-block d-md-inline-block"></span>
				<span class="width-20 d-inline-block d-sm-inline-block d-md-inline-block"></span>
				<a href="<?php echo $result['url']; ?>" class="btn btn-lg btn-outline-success btnCustom">
					<i class="fas fa-eye"></i>
				</a>
				<span class="width-20 d-inline-block d-sm-inline-block d-md-inline-block"></span>
				<span class="width-20 d-inline-block d-sm-inline-block d-md-inline-block"></span>
				Submitted at <?php echo date($result['submitted_at']); ?>
			</h6>
			</div>
		</li>
	<?php } ?>
	</ul>
	</section>
</div>

</div>
</div>

	<div class="extra"></div>

	<?php include'templates/footer.php'; ?>



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
	

</body>
</html>
	
<?php }else{
	header('Location: index.php');
} ?>

	

