<?php include 'templates/sql/db.php'; ?>
<?php 

$remove = $_GET['remove'] ?? "";
$edit = $_GET['edit'] ?? "";
$block = $_GET['block'] ?? "";
$unblock = $_GET['unblock'] ?? "";
$confirm = $_GET['confirm'] ?? false;

if(isset($_GET['confirm']) && isset($_GET['remove'])){

	include'remove.php';

}else if(isset($_GET['confirm']) && isset($_GET['edit'])){

	

	include'edit.php';

}else if(isset($_GET['confirm']) && isset($_GET['remove_class'])){



include'remove_class.php';

}else if(isset($_GET['confirm']) && isset($_GET['block'])){

	include'block.php';

}else if(isset($_GET['confirm']) && isset($_GET['unblock'])){

	include'unblock.php';

}else{

 ?>
<?php 

$previllages = base64_decode($_COOKIE['previllages']) ?? "";
$error = "";

if($previllages == "admin"){

	if($conn){

		$sql = "SELECT * FROM students";
		$query = mysqli_query($conn, $sql);
		$students = mysqli_fetch_all($query, MYSQLI_ASSOC);
		$sql = "SELECT * FROM admins";
		$query = mysqli_query($conn, $sql);
		$admins = mysqli_fetch_all($query, MYSQLI_ASSOC);
		$sql = "SELECT * FROM classes";
		$query = mysqli_query($conn, $sql);
		$classes = mysqli_fetch_all($query, MYSQLI_ASSOC);
		

	}else{
		$error.= mysqli_error($conn);
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'templates/meta.php'; ?>
	<?php include 'templates/preloader.php'; ?>
	<title>Admin</title>
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

	<section id="options">
		<div class="toolbar bg-black text-left">
			<div style="height: 50px;display: block;"></div>

				&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;


				<a href="#" onclick="$('#dropdown3').toggleClass('d-none d-md-block d-sm-none d-lg-block');" class="btn btn-outline-success btnCustom d-inline-block d-sm-inline-block d-md-none d-lg-none" style="position: absolute;top: 100px;left: 10px;">
					<i class="fas fa-list"></i>
				</a>

		<div class="height-20 d-sm-block d-block d-md-none d-lg-none"></div>

				<br>

				<div id="dropdown3" class="d-none d-md-block d-sm-none d-lg-block">

			<a class="btn anim2 text-white self-center d-block d-sm-block d-md-inline-block d-lg-inline-block" href="new_admin.php" title="New Admin User" style="text-align:left;">
				<i class="fas fa-plus"></i> admin
			</a>
			<a class="btn anim2 text-white self-center d-block d-sm-block d-md-inline-block d-lg-inline-block" href="new_student.php" title="New Student" style="text-align:left;">
				<i class="fas fa-plus"></i> student
			</a>
			<a class="btn anim2 text-white self-center d-block d-sm-block d-md-inline-block d-lg-inline-block" href="new_class.php" title="New Class" style="text-align:left;">
				<i class="fas fa-plus"></i> class
			</a>
			<a class="btn anim2 text-white self-center d-block d-sm-block d-md-inline-block d-lg-inline-block" href="new_notice.php" title="New Class" style="text-align:left;">
				<i class="fas fa-plus"></i> notice
			</a>
			<a class="btn anim2 text-white self-center d-block d-sm-block d-md-inline-block d-lg-inline-block" href="new_result_card.php" title="New Class" style="text-align:left;">
				<i class="fas fa-plus"></i> result card
			</a>
			<a class="btn anim2 text-white self-center d-block d-sm-block d-md-inline-block d-lg-inline-block" href="new_fee_voucher.php" title="New Fee Voucher" style="text-align:left;">
				<i class="fas fa-plus"></i> fee voucher
			</a>
			</div>
			
			
		</div>
	</section>

	<div class="extra"></div>

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

	<form method="GET" action="#" class="form-inline text-center">
		<input type="text" name="search" id="search" placeholder="Search..." class="form-control input-rounded" style="display: inline-block;max-width: 50%;" value="<?php echo $search; ?>">
		<button type="submit" class="btn btn-outline-success btnCustom">
			Search <i class="fas fa-search search-input"></i>
		</button>
	</form>

	<style type="text/css">
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

	<div class="extra"></div>

	<h1 class="border-bottom-info" style="margin-left: 25px;">
	Students
	</h1>

	<br>
	<br>

	<section id="students" class="card">
		<ul class="list-group">
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
						 <!-- <div class="dropdown d-sm-inline-block d-inline-block d-md-none d-lg-none options">
		      <button class="btn btn-custom text-white anim dropdown-toggle text-right" type="button" id="dropdownMenuButton2">
		        
		      </button>
		      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown2">
		       <a class="dropdown-item" href="#">
		       	<i class="fas fa-trash text-danger inline-block"></i>
		       </a>
		        <a class="dropdown-item" href="#">
		        	<i class="fas fa-pen inline-block"></i>
		        </a>
		        <a class="dropdown-item" href="#">
		        	<i class="fas fa-disabled inline-block">🚫</i>
		        </a>
		      </div>
		    </div>     -->   
           <!-- Dropdown end -->
				<span class="height-20 d-block d-sm-block"></span>
			<span class="options d-block d-md-inline-block d-lg-inline-block d-sm-block">
				<!-- <span class="col-3"></span> -->
				<a href="<?php echo $_SERVER['PHP_SELF']; ?>?remove=<?php echo $student['roll_no']; ?>&confirm=false" class="col-4 col-sm-4">
					<i class="fas fa-trash text-danger inline-block mr-20"></i>
				</a>
				<a href="<?php echo $_SERVER['PHP_SELF']; ?>?edit=<?php echo $student['roll_no']; ?>&confirm=false" class="text-info col-4 col-sm-4">
					<i class="fas fa-pen inline-block mr-20"></i>
				</a>
				<?php if($student['blocked']){
					$text = "unblock";
				}else{
					$text = "block";
				} ?>
				<a href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $text."=".$student['roll_no']; ?>&confirm=false" class="col-4 col-sm-4">
					<i class="fas fa-disabled inline-block mr-20">🚫</i>
				</a>
				<!-- <span class="col-3"></span> -->
			</span>
		</div>
			</div>
		</div>
		</li>
	<?php } ?>
	</ul>
	</section>

	<div class="extra"></div>

	<h1 class="border-bottom-info" style="margin-left: 25px;">
	Admins
	</h1>

	<br>
	<br>

	<section id="admins" class="card">

		<ul class="list-group">
		<?php foreach ($admins as $admin) { ?>

			<li class="list-group-item text-white list-group-flush list-group-item-action">

		<div class="student card-body" id="<?php echo $admin['id']; ?>">
			<span class="dp col-md-2 col-sm-2 col-2">
				<img src="<?php echo $admin['dpUrl']; ?>" class="icon">
			</span>
			<span class="name col-md-10 col-10 col-sm-10 self-center" style="overflow: hidden;">
		<span style="width: 15px" class="d-inline-block d-sm-inline-block d-md-none d-lg-none"></span><?php echo $admin['name']; ?>
		</span>
			</span>
		</div>

	</li>

		<?php } ?>

	</ul>
			
	</section>

	<div class="extra"></div>

	<h1 class="border-bottom-info" style="margin-left: 25px;">
	Classes
	</h1>

	<br>
	<br>

	<section id="classes" class="card">
		<ul class="list-group">

		<?php foreach ($classes as $class) { ?>

			<li class="list-group-item text-white list-group-flush list-group-item-action">

		<div class="student card-body" id="<?php echo $class['id']; ?>">
			<div class="row">
				<div class="col-md-6 col-sm-10 col-10">
					<div class="row">
			<span class="dp col-md-2 col-sm-12 col-12">
				<img src="templates/img/logo.png" class="icon" style="width: 30px !important;height: 60px !important;filter: brightness(90.0);">
			</span>
			<span class="name col-md-5 col-12 col-sm-12 self-center" style="overflow: hidden;">
		<!-- <span style="width: 15px" class="d-inline-block d-sm-inline-block d-md-none d-lg-none"></span> -->
		</span>
			<span class="class col-md-5 col-12 col-sm-12 self-center">
		<span title="<?php echo $class['class'].' '.$class['section']; ?>">
		<?php echo $class['class']; ?> 
		</span>
		<span class="d-inline d-sm-inline d-md-inline-block d-lg-inline-block"><?php echo $class['section']; ?>
		<?php if($class['boys']){ 

			echo " (B)";

		}else if($class['girls']){
			echo " (G)";
		}else{
			echo " (B-G)";
		}

		 ?>
		</span>
		<span style="width: 15px" class="d-md-inline-block d-lg-inline-block d-sm-none d-none"></span>
		<span style="width: 15px" class="d-md-inline-block d-lg-inline-block d-sm-none d-none"></span>
		<span class="d-none d-sm-none d-md-inline-block d-lg-inline-block">
			Registered by <?php echo $class['created_by']; ?>
		</span>
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>?remove_class=<?php echo $class['class'].'_'.$class['section']; ?>&confirm=false" class="col-4 col-sm-4">
					<i class="fas fa-trash text-danger inline-block mr-20"></i>
				</a>
			</span>
			</div>
		</div>
			
			</div>
		</div>
	</li>
	<?php } ?>
	</ul>
	</section>

	<div class="extra"></div>
	<div class="extra"></div>
	

	<?php include 'templates/footer.php'; ?>

	<script type="text/javascript" src="templates/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="templates/slider/responsiveslides.min.js"></script>
	<script src="templates/dist/jquery.aniview.js"></script>
	<script type="text/javascript" src="templates/js/script3.js"></script>
	<script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>
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

	<style type="text/css">
		body{
		margin: 0;
		padding: 0;
		background: linear-gradient(125deg, #3498db, #34495e);
		min-height: 50vh !important;
		overflow-x: hidden;
}
	</style>

</body>
</html>
<?php 
}else{
	header('Location: index.php');
}
}
 ?>