  <?php
    
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

    if($previllages == "admin"){

 if (isset($_POST['submit'])) {

   $uploaded_file = $_FILES['upload']['name'];

   $temp_path = $_FILES['upload']['tmp_name'];

   $title = $_COOKIE['upload_session'];
   $error = $_FILES['upload']['error'];


    $id = uniqid('', true);

    str_replace('.', '-', $id);

   if(filetype($uploaded_file) != "dir"){
   move_uploaded_file($temp_path, "imgs/".$id.$uploaded_file);
   sleep(2);
   header('Location: index.php');
}

}

          ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
    <?php include 'templates/meta.php'; ?>
    <?php include 'templates/sql/db.php'; ?>
    <?php include 'templates/preloader.php'; ?>
      <title>Upload Image</title>

       <link rel="stylesheet" type="text/css" href="templates/css/style.min.css">
      <link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
      <link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
      <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css ">
      <link href="templates/css/signin.css" rel="stylesheet">

  </head>
  <body>
    <?php include 'templates/header.php'; ?>
    <div class="extra"></div>
    <form id="form-custom2" class="form-signin" action="#" method="post" id="center" enctype="multipart/form-data">

      <!--  enctype="multipart/form-data" -->

      <input type="file" class="btn btn-outline-success btnCustom" name="upload" required value="" class="form-control">

      <br>
      <br>

    <button type="submit" class="text-white margin btn btn-success" name="submit">
    <i class="fas fa-upload"></i>
  </button>

</form>
<div class="extra"></div>

  <style type="text/css">
    form input{
      /*transform: translate(-50%, -50%);
      position: absolute;
      left: 50%;
      right: 50%;*/
      /*display: inline-block;*/
    }
    form{
      width: 100% !important;
    }
  </style>

  <?php include 'templates/footer.php'; ?>

  <script type="text/javascript" src="templates/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="templates/slider/responsiveslides.min.js"></script>
  <script src="templates/dist/jquery.aniview.js"></script>
  <script type="text/javascript" src="templates/js/script.min.js"></script>
  <script type="text/javascript" src="templates/mdb/js/mdb.min.js"></script>

  </body>
</html>
<?php 

}else if($previllages == "student"){
  header('Location: index.php');
}

 ?>
