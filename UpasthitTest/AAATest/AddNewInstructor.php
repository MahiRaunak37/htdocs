<?php
error_reporting(0);
include('includes/dbconnection.php');
?>
<?php

$msg = "";

// If Signup button is clicked ...
if (isset($_POST['submit'])) {

    //$uniqueId = $_POST['uniqueId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $emailAddr = $_POST['emailAddr'];
    $mobileNumber = $_POST['MobileNumber'];
    $dateOfJoining = $_POST['dateOfJoining'];
    $password = $_POST['password']; 
    $instImage = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $uniqueid = strtoupper(uniqid($firstName));  
    //echo $uniqueid;
    $folder = "RegImagesofInstructors/". $instImage;

    $sql = "INSERT INTO add_new_inst (uniqueId, firstName, lastName, emailAddr, mobileNumber, dateOfJoining, password, instImage) VALUES 
    ('$uniqueid','$firstName','$lastName','$emailAddr','$mobileNumber','$dateOfJoining','$password','$instImage')";
        //$output = mysqli_query($conn,$sql);
    //Execute query
      
      if(mysqli_query($conn,$sql)) {
        echo "Connection and Insertion are Successful";
    }
    else {
        echo "Connection and Insertion are failed".mysqli_connect_error();
    }
    
    // Now let's move the uploaded image into the folder: image

    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

}

//$result = mysqli_query($db, "SELECT * FROM image");

while ($data = mysqli_fetch_array($result)) {

    ?>

<img src="<?php echo $data['Filename']; ?>">


<?php
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Add New Instructor</title>

<link rel="stylesheet" type= "text/css" href ="./css/style.css">

<div id="content">
  <form method="POST" action="" enctype="multipart/form-data">
      <h1>Add new Instructor</h1>
      <br>
      <label for ="firstName">First Name </label>
      <input type ="text" name = "firstName" required>
      <br>
      <label for ="lastName">Last Name</label>
      <input type = "text" name = "lastName" required>  
      <br>
      <label for ="emailAddr">Email</label>
      <input type = "email" name = "emailAddr" required>
      <br>
      <label for ="mobileNumber">Mob. no</label>
      <input type = "number" name = "MobileNumber" required>
      <br>
      <label for ="dateOfJoining">Date of Joining</label>
      <input type = "date" name = "dateOfJoining" required>
      <br>
      <label for ="password">Password</label>
      <input type = "password" name = "password" required>
      <br>
      <label for ="conPassword">Confirm Password</label>
      <input type = "password" name = "conPassword" required>
      <br>
      <input type="file" name="uploadfile" value="" required/>
      <br>
    <button type="submit" name="submit">submit</button>
  </form>
</div>
</body>
</html>
