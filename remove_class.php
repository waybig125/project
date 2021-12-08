<?php 

include 'templates/sql/db.php';

$remove = $_GET['remove_class'] ?? "";
$explode = explode('_', $remove);
$class = $explode[0];
$section = $explode[1];
$confirm = $_GET['confirm'] ?? false;

if($conn){

if(isset($_GET['remove_class']) && $confirm == "true"){

	$sql = "DELETE FROM classes WHERE class = '$class' AND section = '$section'";
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
		Remove Class
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
			Are You Sure You Want to remove <?php echo $class." ".$section; ?>?
			<br>
			<br>
			<a href="admin.php" class="btn btnCustom btn-outline-success" style="margin-bottom: 20px;">
				Cancel
			</a>
			<a href="?remove_class=<?php echo $_GET['remove_class']; ?>&confirm=true" class="btn btnCustom btn-outline-success" style="margin-bottom: 20px;">
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
