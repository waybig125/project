<?php include 'templates/sql/db.php'; ?>
<?php 

$error = "";
$user_name = $_COOKIE['user_name'] ?? "";

if($conn){

$sql = "SELECT * FROM students WHERE roll_no = '$user_name'";
$query = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($query);
if($student){

	$id = $student['id']."_student";

}else{
	$error.=mysqli_error($conn);
}

// $sql = "SELECT * FROM messages WHERE to_user = '$id'";
// $query = mysqli_query($conn, $sql);
// $received_messages = mysqli_fetch_all($query, MYSQLI_ASSOC);
// $sql = "SELECT * FROM messages WHERE from_user = '$id'";
// $query = mysqli_query($conn, $sql);
// $sent_messages = mysqli_fetch_all($query, MYSQLI_ASSOC);

$sql = "SELECT * FROM messages WHERE to_user = '$id' OR from_user = '$id'";
$query = mysqli_query($conn, $sql);
$sent_messages = mysqli_fetch_all($query, MYSQLI_ASSOC);
// $sql = "SELECT * FROM messages WHERE from_user = '$id'";
// $query = mysqli_query($conn, $sql);
// $received_messages = mysqli_fetch_all($query, MYSQLI_ASSOC);

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

 <div class="row">
 <?php foreach($sent_messages as $received_message){ ?>
    <?php if($received_message['from_user'] == $id){ ?>
    <div class="col-md-8 col-sm-10 col-10 col-lg-8">
    <div class="sent text-dark">

        <?php echo $received_message['content']; ?>
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

        <?php echo $received_message['content']; ?>
        <div class="text-muted" style="font-size: 10px;width: 100% !important;text-align: right;">
            <br><?php echo date($received_message['sent_at']); 
            if($received_message['read_msg']){
            ?>
        <!-- <i class="fas fa-check text-info"></i> -->
        <?php }else if($received_message['from_user'] = $id){ ?>
        <!-- <i class="fas fa-check"></i> -->
        <?php } ?>

        </div>

    </div>
    </div>

 <?php }
 }
}
  ?>

</div>

<a id="target"></a>

 <script type="text/javascript">
     // window.location.href = "#target";
 </script>

