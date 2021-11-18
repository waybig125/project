<section id="footer" style="height: auto;max-height: 100%;min-height: 350px;">

	<footer style="height: auto;max-height: auto;">
		<div class="row">
			<div class="col-md-10 col-sm-6 col-6">
				<div class="row">
					<?php if($_COOKIE['logged_in'] ?? false){?>
		<a href="index.php" class="text-white col-sm-6 col-6 col-md-4 font-12px">Home</a>
		<br>
		<a href="about.php" class="text-white col-sm-6 col-6 col-md-4 font-12px">About</a>
	<?php }else{ ?>

		<a href="index.php" class="text-white">Home</a>
		<br>
		<a href="about.php" class="text-white">About</a>

	<?php } ?>
		<br>
		 <!-- <a class="btn btn-outline-success btnCustom" href="login.php">Login</a> -->
		  <?php 

    // session_start();

    $bool = false;

    if(!$_COOKIE['logged_in'] ?? true){
      $bool = false;
    }else{
      $bool = true;
    }

    if(!$bool){
    ?>

     <a class="btn btn-outline-info btnCustom col-sm-12 col-12 col-md-6" href="login.php">Login</a>

    <?php }else{ ?>

    		<a href="profile.php" class="text-white col-sm-6 col-6 col-md-4 font-12px">Profile</a>
    		<a href="txt.php" class="text-white col-sm-6 col-6 col-md-4 font-12px">Chat</a>
    		<a href="contact.php" class="text-white col-sm-6 col-6 col-md-4 font-12px">Contact</a>
    		<a href="results.php" class="text-white col-sm-6 col-6 col-md-4 font-12px">Results</a>
    		<a href="notices.php" class="text-white col-sm-6 col-6 col-md-4 font-12px">Notices</a>

    		<a href="fee_vouchers.php" class="text-white col-sm-12 col-12 col-md-4 font-12px">Fee Vouchers</a>
    	
        <a class="btn btn-outline-info btnCustom col-sm-12 col-12 col-md-2" href="logout.php" id="logout">Logout
        </a>

    <?php } ?>

		</div>

		</div>

		<div class="col-md-2 col-sm-6 col-6">
		<a href="index.php" class="align">
		<img src="templates/img/logo.png" class="reallyslow aniview" data-av-animation="flipInX">
		</a>
		</div>

		</div>
		<br>
	</footer>
</section>
<style type="text/css">
	.font-12px{
		font-size: 12px;
	}
</style>