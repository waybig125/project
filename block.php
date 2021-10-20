<?php 

include 'templates/sql/db.php';

$block = $_GET['block'] ?? "";
$confirm = $_GET['confirm'] ?? false;

if($conn){

if(isset($_GET['block']) && $confirm == "true"){

	$sql = "UPDATE students SET blocked = '1' WHERE roll_no = '$block'";

	if(mysqli_query($conn, $sql)){
		header('Location: admin.php');
	}else{
		$error.=mysqli_error($conn);
	}

}else{

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Block User
	</title>
	<?php include 'templates/meta.php'; ?>
	<?php //include 'templates/preloader.php'; ?>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.css">
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
</head>
<body>

	<section id="popup">
		<div class="popup text-center text-muted">
			Are You Sure You Want to block <?php echo $_GET['block']; ?>?
			<br>
			<br>
			<a href="admin.php" class="btn btnCustom btn-outline-success" style="margin-bottom: 20px;">
				Cancel
			</a>
			<a href="?block=<?php echo $_GET['block']; ?>&confirm=true" class="btn btnCustom btn-outline-success" style="margin-bottom: 20px;">
				Yes
			</a>
		</div>
	</section>

	<script type="text/javascript" src="templates/js/jquery.min.js"></script>
	<script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>
	<script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>
	<script type="text/javascript" src="templates/package/dist/index.umd.js"></script>

</body>
</html>
<?php }
}else{
	$error.=mysqli_error($conn);
 }	
 ?>
