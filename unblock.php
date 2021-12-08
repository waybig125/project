<?php 

include 'templates/sql/db.php';

$unblock = $_GET['unblock'] ?? "";
$confirm = $_GET['confirm'] ?? false;

if($conn){

if(isset($_GET['unblock']) && $confirm == "true"){

	$sql = "UPDATE students SET blocked = '0' WHERE roll_no = '$unblock'";

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
		unblock User
	</title>
	<?php include 'templates/meta.php'; ?>
	<?php //include 'templates/preloader.php'; ?>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="templates/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
</head>
<body>

	<section id="popup">
		<div class="popup text-center text-muted">
			Are You Sure You Want to unblock <?php echo $_GET['unblock']; ?>?
			<br>
			<br>
			<a href="admin.php" class="btn btnCustom btn-outline-success" style="margin-bottom: 20px;">
				Cancel
			</a>
			<a href="?unblock=<?php echo $_GET['unblock']; ?>&confirm=true" class="btn btnCustom btn-outline-success" style="margin-bottom: 20px;">
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
