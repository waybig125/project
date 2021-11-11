<?php include 'templates/sql/db.php'; ?>
<?php

 if(isset($_POST['title'])){

				$title = htmlspecialchars($_POST['title']);

				$text_to_display = htmlspecialchars($_POST['text']);

				$img = htmlspecialchars($_POST['img']);
				
				$created_by = $_COOKIE['user_name'] ?? "";

				if($conn){

			$sql = "INSERT INTO services(created_by, title, text_to_display, img) VALUES('$created_by', '$title', '$text_to_display', '$img')";

			$query = mysqli_query($conn, $sql);

			if($query){

			echo "<script>window.location.href = 'index.php'</script>";
				
			}else{
				echo $error;
			}


			}else{
				$error.= mysqli_error($conn);
			}
				

			}//end isset

		?>
