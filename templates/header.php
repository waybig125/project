  <?php $search = ""; ?>
  <nav class="navbar navbar-expand-md navbar-expand-md navbar-dark bg-dark padding-20px" style="z-index: 1;">
  
    <!-- <img src="templates/img/logo.png" width="50px" height="130px"> -->
    <?php if($_COOKIE['logged_in'] ?? false){ ?>
      <a class="navbar-brand aniview slow" data-av-animation="fadeInUpBig" href="profile.php" id="img-brand">
      <img class="icon" src="
          <?php 

          if($conn ?? false && isset($_COOKIE['logged_in'])){
            // echo "logged_in ";
            $user_name = $_COOKIE['user_name'] ?? "";
            $previllages = $_COOKIE['previllages'] ?? "";
            if($previllages == "student"){
            $sql = "SELECT dpUrl FROM students WHERE roll_no = '$user_name'";
            }else if($previllages == "admin"){
              $sql = "SELECT dpUrl FROM admins WHERE name = '$user_name'";
            }
            $query = mysqli_query($conn, $sql);

            $fetches = mysqli_fetch_assoc($query);

            if($fetches){
              echo $fetches['dpUrl'];
            }

          }else{
            $error = "Error: ".mysqli_error($conn);
          }

           ?>">
         </a>
         <?php }else{ ?>
          <a class="navbar-brand aniview slow" data-av-animation="fadeInUpBig" href="index.php" id="img-brand">
          <img src="templates/img/logo.png" width="20px" height="45px">
        </a>
          <?php } ?>
  <button class="navbar-toggler" type="button" id="toggler" style="z-index: 1;">
    <!-- <span class="navbar-toggler-icon"></span> -->
    <i class="fas fa-list"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav md-auto" id="ul-custom">
      <div class="height-50 d-block d-sm-block d-md-none d-lg-none"></div>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
        <?php
        if($_COOKIE['logged_in'] ?? false){
      ?>
      <li class="nav-item">
        <a class="nav-link" href="txt.php">Live Chat</a>
      </li>

      <?php } ?>

            <!--Dropdown start-->  
             <?php
      if($_COOKIE['logged_in'] ?? false){
    ?>
         <div class="dropdown">
      <button class="btn nav-link anim dropdown-toggle" type="button" id="dropdownMenuButton">
        Services
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown" style="text-align: left !important;">
       <?php if($previllages == "admin"){ ?>
       <a class="dropdown-item" href="admin.php">
        
       Admin
     </a>

        <a class="dropdown-item" href="new_result_card.php">

          <i class="fas fa-plus"></i> Result Card</a>
        <a class="dropdown-item" href="new_student.php">
<i class="fas fa-plus"></i> Student</a>
        <a class="dropdown-item" href="new_class.php">
            <i class="fas fa-plus"></i> Class</a>
        <a class="dropdown-item" href="new_admin.php"><i class="fas fa-plus"></i> Admin</a>
        <a class="dropdown-item" href="new_notice.php"><i class="fas fa-plus"></i> 
        Notice</a>
        <a class="dropdown-item" href="new_fee_voucher.php"><i class="fas fa-plus"></i> 
        Fee Voucher</a>
        <a class="dropdown-item" href="notices.php">
          Notices
          <i class="fas fa-eye"></i>
        </a>
        <a class="dropdown-item" href="results.php">
          Result Cards
          <i class="fas fa-eye"></i>
        </a>
         <a class="dropdown-item" href="fee_vouchers.php">
          Fee Vouchers
          <i class="fas fa-eye"></i>
        </a>
      <?php }else{ ?>
        <a class="dropdown-item" href="results.php">
          Result Cards
          <i class="fas fa-eye"></i>
        </a>
        <a class="dropdown-item" href="fee_vouchers.php">
          Fee Vouchers
          <i class="fas fa-eye"></i>
        </a>
         <a class="dropdown-item" href="notices.php">
          Notices
          <i class="fas fa-eye"></i>
        </a>
        <a class="dropdown-item" href="profile.php">Profile Settings</a>
        <!-- <a class="dropdown-item" href="#">Option 3</a> -->
      <?php } ?>
      </div>
    </div>       
           <!-- Dropdown end -->
         <?php } ?>

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

      <span class="bar d-md-block d-none d-sm-none d-lg-block"></span>
      
      <li class="nav-item">
        <a class="nav-link btn btn-outline-info btn-width btnCustomInfo" href="login.php" id="login">Login
        </a>
      </li>

      <!--  <li class="nav-item">
        <a class="nav-link" href="login.php" id="login">Login
        </a>
      </li> -->

    <?php }else{ ?>

       <li class="nav-item">
        <a class="nav-link" href="logout.php" id="logout">Logout
        </a>
      </li>

    <?php } ?>

    </ul>
    <!-- <br> -->
    <div class="width-200 d-none d-sm-none d-lg-block"></div>
    <div class="width-20 d-none d-sm-none d-md-block"></div>
    <div class="height-20 d-md-none d-sm-block d-block"></div>
    <?php if($previllages == "admin"){ ?>
    <form class="form-inline aniview reallyslow" data-av-animation="fadeInRight" id="form-custom" action="search_results.php" method="GET">
      <!--  mt-2 mt-md-0 -->
      <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search" autocomplete="off" value="">
      <button class="btn btn-outline-success btnCustom" type="submit" name="submit">Search</button>
    </form>
  <?php } ?>
    <div class="height-20 d-md-none d-sm-block d-block"></div>
  </div>
</nav>
<?php include 'blocked.php'; ?>
