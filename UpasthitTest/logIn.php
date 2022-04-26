<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['login'])) {
    $instructorId = $_POST['instructorId'];
    $emailAddr = $_POST['emailAddr'];
    $password = $_POST['password'];
    //echo $password;

    $sql = "SELECT * FROM add_new_inst WHERE emailAddr = '$emailAddr'";
    $query = mysqli_query($conn,$sql);
    $email_count = mysqli_num_rows($query);

    if($email_count) {
      $email_pass = mysqli_fetch_assoc($query);
      $db_pass = $email_pass['password'];
        //echo $db_pass;

          if($password ==$db_pass) {
              echo '<script>alert("login successful");</script>'; }
          else {
            echo '<script>alert("Invalid Password");</script>'; }
          }
  else {
            echo '<script>alert("Invalid Email Address or Instructor Id");</script>'; }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
    
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>Instructor Login</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel = "stylesheet" href="css/bootstrap.css">
	<link rel = "stylesheet" href="css/font-awesome.min.css">
	<link rel = "stylesheet" href="vendors/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="assets/css/style.css">

    
</head>

<body>
   <div class="bg-dark" style=" background-image: url('images/banner/login_banner.jpg'); background-repeat: no-repeat; height: 100%; width: 100%;">
    <div class="sufee-login d-flex align-content-center flex-wrap" > 
        
        <div class="container">
        <hr  color="black"/>
        
            <div class="login-content">
                <div class="login-logo">
                    <h1 style="color:#00f">UPASTHIT </h1>
                    <h4 style="color:red">Instructor Login </h4>
                    <hr  color="red"/>
                </div>
                <div class="login-form">
                    <form action="" method="post" name="login">
                        
                        <div class="form-group">
                            <label for="instructorId">Instructor Id</label>
                            <input type="text" class="form-control" placeholder="Instructor" required="true" name="instructorId">
                        </div>

                        <div class="form-group">
                            <label for="emailAddr">Email Id</label>
                            <input type="text" class="form-control" placeholder="Enter your email address" required="true" name="emailAddr">
                        </div>

                        <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                        </div>

                                <div class="checkbox"> 
                                    <label class="pull-left">
                                <a href="../index.php">Back Home!!</a>
                                    <label class="pull-right">
                                <a href="forgot-password.php" style="padding-left: 250px;">Forgot Password?</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Login</button>
                                
                            
                    </form>
                </div>
            </div>
        </div>   
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

  </div>
</body>

</html>
