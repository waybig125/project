<?php include 'templates/sql/db.php'; ?>
<?php 

	if(isset($_GET['search'])){	

	if(isset($_GET['search'])){
	$error = "";
	$search = $_GET['search'];
	$i = 0;

	if($conn){

		$sql = "SELECT * FROM students WHERE name LIKE '%$search%' OR roll_no LIKE '%$search%' OR father_name LIKE '%$search%' OR class LIKE '%$search%' OR section LIKE '%$search%'";
		$query = mysqli_query($conn, $sql);
		$students = mysqli_fetch_all($query, MYSQLI_ASSOC);
		

	}else{
		$error.="Error: ".mysqli_error($conn);
	}

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
	<title>
		Search Results
	</title>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/preloader.php'; ?>
	<link rel="stylesheet" type="text/css" href="templates/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css ">
</head>
<body>
	<?php include 'templates/header.php'; ?>

	<br>
	<br>
	<br>
	<br>

	<h5 id="typing" class="text-center text-info font-50px aniview-2 slow" data-av-animation="pulse">
		<span class="border-bottom-info">Search Results</span>&nbsp;
	</h5>
	<div class="extra">	</div>

	<section id="students" class="card">
		<ul class="list-group">
		<?php foreach ($students as $student) { ?>
	<?php if(preg_match("/".$search."/", $student['name']) || preg_match("/".$search."/", $student['father_name']) || preg_match("/".$search."/", $student['class']) || preg_match("/".$search."/", $student['section']) || preg_match("/".$search."/", $student['roll_no'])){ ?>
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

				<?php 
				
				$i++;

				//echo $student['section']; ?>
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

		<div class="col-md-12 col-sm-12 col-12 d-inline-block d-md-inline-block d-sm-inline-block d-lg-inline-block" style="margin-left: 5px;">
			<span class="text-info">
				<?php echo $student['name']; ?>
			</span>
		</div>
		<div class="col-md-12 col-sm-12 col-12 d-inline-block d-md-inline-block d-sm-inline-block d-lg-inline-block" style="margin-left: 5px;">
			<span class="text-info">
				<?php echo $student['father_name']; ?>
			</span>
		</div>
			
			</div>
		</div>
		</li>
	<?php } ?>

	<?php } ?>
	</ul>
	</section>

	<div class="extra"></div>
	<div class="container">
		<h4>
		<u class="text-white">
		<?php 

		if($i > 1){

		echo $i." results found"; 

		}else if($i == 0){
			echo "No results found";
		}else if($i == 1){
			echo $i." result found"; 
		}

		?>
		</u>
		</h4>
	</div>

	<div class="extra"></div>

	<?php include 'templates/footer.php'; ?>

<script type="text/javascript" src="templates/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="templates/slider/responsiveslides.min.js"></script>
	<script src="templates/dist/jquery.aniview.js"></script>
	<script type="text/javascript" src="templates/js/script.min.js"></script>
	<script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>
	<script type="text/javascript" src="templates/package/dist/index.umd.js"></script>
</body>
</html>
<?php }else{
	header('Location: index.php');
} ?>