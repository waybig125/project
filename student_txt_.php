<?php include 'templates/sql/db.php'; ?>
<?php 

$error = "";
$user_name = $_COOKIE['user_name'] ?? "";

$previllages = base64_decode($_COOKIE['previllages']) ?? "";

    if($previllages == "student"){

if($conn){

$sql = "SELECT * FROM students WHERE roll_no = '$user_name'";
$query = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($query);
if($student){

	$id = $student['id']."_student";

}else{
	$error.=mysqli_error($conn);
}

$sql = "SELECT * FROM messages WHERE to_user = '$id' OR from_user = '$id'";
$query = mysqli_query($conn, $sql);
$sent_messages = mysqli_fetch_all($query, MYSQLI_ASSOC);

$sql = "UPDATE messages SET read_msg = '1' WHERE to_user = '$id'";

        if(mysqli_query($conn, $sql)){
            $success = true;
        }else{
            $error .= mysqli_error($conn);
        }

}else{
	$error.=mysqli_error($conn);
}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <?php include 'templates/meta.php'; ?>
     <title>Chat</title>
 </head>
 <body>
 
 <link rel="stylesheet" type="text/css" href="templates/css/style2.css">
 <link rel="stylesheet" type="text/css" href="templates/mdb/css/mdb.dark.min.css">
 <link rel="stylesheet" type="text/css" href="templates/fontawesome/css/all.min.css">
 <br>
 <br>
 <div id="messages">
 <div class="row container">
 <?php foreach($sent_messages as $received_message){ ?>
    <?php if($received_message['from_user'] == $id){ ?>
    <div class="col-md-8 col-sm-10 col-10 col-lg-8">
    <div class="sent text-dark">

        
       
        <?php

         if($received_message['imgUrl'] != ""){

        ?>
        <img src="<?php echo $received_message['imgUrl']; ?>" class="img-thumbnail">
        <br>
        <br>
        <?php
        }else if($received_message['videoUrl'] != ""){
        ?>
        <a type="button" data-video="<?php echo $received_message['videoUrl']; ?>" id="<?php echo uniqid('', true).$received_message['id']; ?>" onclick="showVideo(this);">
            <i class="fas fa-video fa-2x text-info"></i>
        </a>
        <br>
        <?php
        }else if($received_message['audioUrl'] != ""){
        ?>
        <a data-audio="<?php echo $received_message['audioUrl']; ?>" type="button" class="audio-play" id="<?php echo uniqid('', true).$received_message['id']; ?>">
            <i class="fas fa-play"></i>
        </a>
        <br>
        <br>
        <?php
        }else if($received_message['fileUrl'] != ""){
        ?>
        <a href="<?php echo $received_message['fileUrl']; ?>">
            <i class="fas fa-file fa-2x text-warning"></i>
        </a>
        <br>
        <?php } ?>

        <?php 
        if($received_message['msg_type'] != "audio"){
        ?>
        <?php echo base64_decode($received_message['content']); 

    }else{
        ?>
        <!-- <audio src="<?php echo $received_message['content'];?>" controls></audio> -->
         <a data-audio="<?php echo $received_message['content']; ?>" type="button" class="audio-play" id="<?php echo $received_message['id']; ?>">
            <i class="fas fa-play"></i>
        </a>
    <?php } ?>
    <div class="text-muted" style="font-size: 10px;width: 100% !important;text-align: right;">
        <br>
        <?php echo date($received_message['sent_at']); 
            if($received_message['read_msg']){
            ?>
        <i class="fas fa-check text-info"></i>
        <?php }else{ ?>
        <i class="fas fa-check"></i>
        <?php } ?>
    </div>

    </div>
    </div>
    <div class="col-md-4 col-2 col-sm-2 col-lg-4"></div>
 <?php }else{
    ?>

    <?php if($received_message['from_user'] != $id){ ?>
    <div class="col-md-4 col-2 col-sm-2 col-lg-4"></div>
    <div class="col-md-8 col-sm-10 col-10 col-lg-8">
   <div class="received text-dark">


       
        <?php

         if($received_message['imgUrl'] != ""){

        ?>
        <img src="<?php echo $received_message['imgUrl']; ?>" class="img-thumbnail">
        <br>
        <br>
        <?php
        }else if($received_message['videoUrl'] != ""){
        ?>
        <a type="button" data-video="<?php echo $received_message['videoUrl']; ?>" id="<?php echo uniqid('', true).$received_message['id']; ?>" onclick="showVideo(this);">
            <i class="fas fa-video fa-2x text-info"></i>
        </a>
        <br>
        <?php
        }else if($received_message['audioUrl'] != ""){
        ?>
        <a data-audio="<?php echo $received_message['audioUrl']; ?>" type="button" class="audio-play" id="<?php echo uniqid('', true).$received_message['id']; ?>">
            <i class="fas fa-play"></i>
        </a>
        <br>
        <br>
        <?php
        }else if($received_message['fileUrl'] != ""){
        ?>
        <a href="<?php echo $received_message['fileUrl']; ?>">
            <i class="fas fa-file fa-2x text-warning"></i>
        </a>
        <br>
        <?php } ?>

        <?php 
        if($received_message['msg_type'] != "audio"){
        ?>
        <?php echo base64_decode($received_message['content']); 

    }else{
        ?>
        <!-- <audio src="<?php echo $received_message['content'];?>" controls></audio> -->
         <a data-audio="<?php echo $received_message['content']; ?>" type="button" class="audio-play" id="<?php echo $received_message['id']; ?>">
            <i class="fas fa-play"></i>
        </a>
    <?php } ?>
    <div class="text-muted" style="font-size: 10px;width: 100% !important;text-align: right;">
        <br><?php echo date($received_message['sent_at']); ?>
    </div>

    </div>
    </div>

 <?php }
 }
}
  ?>
 </div>
 </div>
 <div id="audio"></div>
 <div id="video"></div>
 <a id="target"></a>
 <script type="text/javascript" src="templates/js/jquery.min.js"></script>
 <!-- <script src="templates/replace/replace_anchor_links.min.js"></script> -->
 <script type="text/javascript" src="templates/js/student_txt_.js"></script>
 <style type="text/css">
      body,html{
        background: url(templates/img/whatsapp.png) !important;
        background-attachment: fixed !important;
     }
 </style>

 <?php 

echo '<div class="alert text-danger aniview reallyslow" data-av-animation="fadeInDownBig" style="font-size: 20px;" id="alert">
			<br>
			'.$error.'
		</div>
		';

 ?>


 </body>
 </html>

 <?php }else{
    header('Location: admin_txt_.php');
 } ?>


