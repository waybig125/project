<?php 


$uploaded_file = $_FILES['image']['name'];
$temp_path = $_FILES['image']['tmp_name'];

$errorDp = $_FILES['image']['error'];

$id = uniqid('', true);

str_replace('.', '-', $id);

$imageUrl = "dps/".$id.$uploaded_file;

    if(!$error){

    move_uploaded_file($temp_path, $imageUrl);

    }else{
        $error.="<br>Error: ".$errorDp;
    }

    if($conn){

            $previllages = $_COOKIE['previllages'] ?? "";

            if($previllages == "student"){

        $user_name = $_COOKIE['user_name'] ?? "";

        $sql = "UPDATE students SET dpUrl = '$imageUrl' WHERE roll_no = '$user_name'";

        }else if($previllages == "admin"){
            
            $user_name = $_COOKIE['user_name'] ?? "";

            $sql = "UPDATE admins SET dpUrl = '$imageUrl' WHERE name = '$user_name'";
        }

        if(mysqli_query($conn, $sql)){

        }else{
            $error.="<br>Error updating database";
        }

    }else{
        $error.="<br>Error: ".mysqli_error($conn);
    }


 ?>