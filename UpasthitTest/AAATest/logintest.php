<?php
error_reporting(0);
include 'includes/dbconnection.php';
?>

<?php
    if (isset($_POST['login'])) {
        $instructorId = $_POST['instructorId'];
        $emailAddr = $_POST['emailAddr'];
        $password = $_POST['password'];
        echo $password;

        $sql = "SELECT * FROM add_new_inst WHERE emailAddr = '$emailAddr'";
        $query = mysqli_query($conn,$sql);
        $email_count = mysqli_num_rows($query);

        if($email_count) {
          $email_pass = mysqli_fetch_assoc($query);
          $db_pass = $email_pass['password'];
            echo $db_pass;
  
              if($password ==$db_pass) {
                  echo "login successful"; }
              else {
                  echo "password incorrect"; }
              }
      else {
              echo "Invalid email"; }
    }
?>



<!DOCTYPE html>
<html>
 <head>
  <title>Instructor Login</title>
  <link rel="stylesheet" type= "text/css" href ="./css/style.css">
</head>
<body>
<div id="content">
  <form method="POST" action="" enctype="multipart/form-data">
    <h1><center>Instructor Login</center></h1>
      <label for ="instructorId">Enter Your Instructor ID</label>
      <input type ="text" name = "instructorId" required>
      <br>
      <label for ="emailAddr">Email</label>
      <input type = "email" name = "emailAddr" required>
      <br>
      <label for ="password">Password</label>
      <input type = "password" name = "password" required>
      <button type="submit" name="login">login</button>
  </form>
</div>
</body>
