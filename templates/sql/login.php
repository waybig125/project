<?php 
		

	if(isset($_POST['user_name'])){

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$error = "";


	if(!$conn){

		$error.="Error: ".mysqli_error($conn);
 	
	}

	else{

		// $sql = "SELECT * FROM students WHERE roll_no = '".$user_name."' AND password = '".$password."'";

		$sql = "SELECT * FROM students WHERE roll_no = '$user_name' AND password = '$password'";

		$query = mysqli_query($conn, $sql);

		$rows = mysqli_num_rows($query);

	if($rows == 1){

         //login

         setcookie("logged_in", true, time() + (864000) * 7);

         setcookie("user_name", $user_name, time() + (864000) * 7);

         header('Location: index.php');

   }else{
     $error.= "Incorrect Login Details";
   }


	}

	}


 ?>