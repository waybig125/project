<?php include 'templates/sql/db.php'; ?>
<?php 

$error = "";
$user_name = $_COOKIE['user_name'] ?? "";
$student = $_COOKIE['student'] ?? "";//732-B

if($conn){

$sql = "SELECT * FROM students WHERE roll_no = '$student'";
$query = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($query);

if($fetch){

    $id = $fetch['id']."_student";

}else{
    $error.=mysqli_error($conn);
}

$sql = "UPDATE students SET unread_msg = '0' WHERE roll_no = '$student'";
        if(mysqli_query($conn, $sql)){
            $success = true;
        }else{
            $error .= mysqli_error($conn);
        }
        $sql = "UPDATE messages SET read_msg = '1' WHERE from_user = '$id'";
        if(mysqli_query($conn, $sql)){
            $success = true;
        }else{
            $error .= mysqli_error($conn);
        }

$sql = "SELECT * FROM messages WHERE to_user = '$id' OR from_user = '$id'";
$query = mysqli_query($conn, $sql);
$sent_messages = mysqli_fetch_all($query, MYSQLI_ASSOC);
// $sql = "SELECT * FROM messages WHERE from_user = '$id'";
// $query = mysqli_query($conn, $sql);
// $received_messages = mysqli_fetch_all($query, MYSQLI_ASSOC);

}else{
    $error.=mysqli_error($conn);
}

    if($fetch){

        $id = $fetch['id']."_student";

    }else{
        $error.=mysqli_error($conn);
    }

 ?>
 <div class="row">
<?php foreach($sent_messages as $received_message){ ?>
    <?php if($received_message['from_user'] == $id){ ?>
 	<div class="col-md-8 col-sm-10 col-10 col-lg-8">
        <?php $explode = explode('_',$received_message['from_user']); 

        $name = $explode[0];

        if($conn){
            $sql = "SELECT * FROM students WHERE id = '$name'";
            $fetch = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            if($fetch){
                $dpUrl = $fetch['dpUrl'];
            }
        }

        ?>

       &ensp; <img class="icon" src="<?php echo $dpUrl; ?>">

 	<div class="received text-dark">

 		<?php echo base64_decode($received_message['content']); ?>
    <div class="text-muted" style="font-size: 10px;width: 100% !important;text-align: right;">
        <br>
        <?php echo date($received_message['sent_at']); 
            if($received_message['read_msg']){
            ?>
        <!-- <i class="fas fa-check text-info"></i> -->
        <?php }else{ ?>
        <!-- <i class="fas fa-check"></i> -->
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
    <div class="sent text-dark">

        <?php echo base64_decode($received_message['content']); ?>
        <div class="text-muted" style="font-size: 10px;width: 100% !important;text-align: right;">
            <br><?php echo date($received_message['sent_at']); 
            if($received_message['read_msg']){
            ?>
        <i class="fas fa-check text-info"></i>
        <?php }else if($received_message['from_user'] = $id){ ?>
        <i class="fas fa-check"></i>
        <?php } ?>

        </div>

    </div>
    </div>

 <?php }
 }
}
  ?>
 </div>
 </div>

 <a id="target"></a>

 <script type="text/javascript">
     // window.location.href = "#target";
 </script>

 <style type="text/css">
      body,html{
        background: url(templates/img/whatsapp.png) !important;
        background-attachment: fixed !important;
        /*background-repeat: no-repeat !important;*/
        /*background-position: center !important;*/
        /*background-size: cover !important;*/
        /*margin: 50px;*/
     }
 </style>

