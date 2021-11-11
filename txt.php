<?php 

$previllages = base64_decode($_COOKIE['previllages']) ?? "";

if($previllages == "admin"){
	include 'admin_txt.php';
}else if($previllages == "student"){
	include 'student_txt.php';
}

 ?>

 <style type="text/css">
 	html, body{
 		margin-top: 20px !important;
 	}
 	nav{
 		position: fixed !important;
 		top: 0;
 		left: 0;
 		width: 100%;
 		padding-bottom: 15px !important;
 	}
 	form #search{
 		margin-top: 100px !important;
 	}
 </style>
 <script type="text/javascript">
     $('.dropdown').hide();
 </script>