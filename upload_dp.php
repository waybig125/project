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

    $user_name = $_COOKIE['user_name'] ?? "";
    $previllages = $_COOKIE['previllages'] ?? "";

    // Store the cipher method
    $ciphering = "AES-128-CTR";

    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;

    // Non-NULL Initialization Vector for decryption
    $decryption_iv = 'xxxxxxxxxxxxxxxxx';

    // Store the decryption key
    $decryption_key = "key";

    // Use openssl_decrypt() function to decrypt the data
    $previllages = openssl_decrypt ($previllages, $ciphering,
    $decryption_key, $options, $decryption_iv);

    $previllages = base64_decode($previllages);

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