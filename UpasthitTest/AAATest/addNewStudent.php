<?php
error_reporting(0);
include('includes/dbconnection.php');
?>

<?php

$msg = "";

// If Signup button is clicked ...
if (isset($_POST['submit'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $school = $_POST['school'];
    $class = $_POST['class'];
    $roll = $_POST['roll'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $uniqueid = strtoupper(uniqid($firstName));
    
    $stdImage = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];

    $folder = "RegImagesofStudents/". $stdImage;

    

    $sql = "INSERT INTO add_new_std (uniqueId,firstName,lastName,school,class,roll,fatherName,motherName,dateOfBirth,stdImage) 
    VALUES ('$uniqueid','$firstName','$lastName','$school',$class,$roll,'$fatherName','$motherName','$dateOfBirth','$stdImage')";

    // Execute query
      if(mysqli_query($conn, $sql)) {
        echo "Connection and Insertion are Successful";
    }
    else {
        echo "Connection and Insertion are failed";
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

<img src="<?php echo $data['stdImage']; ?>">


<?php
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Add New Student</title>

<link rel="stylesheet" type= "text/css" href ="./css/style.css">

<div id="content">
  <form method="POST" action="" enctype="multipart/form-data">
      <h1>Add new Student</h1>
      <!--label for ="uniqueId">uniqueid</label>
      <input type ="text" name = "uniqueId" required-->
      <br>
      <label for ="firstName">First Name </label>
      <input type ="text" name = "firstName" required>
      <br>
      <label for ="lastName">Last Name</label>
      <input type = "text" name = "lastName" required>  
      <br>
      <label for ="school">School</label>
      <input type = "text" name = "school" required>
      <br>
      <label for ="class">Class</label>
      <input type = "number" name = "class" required>
      <br>
      <label for ="roll">Roll</label>
      <input type = "number" name = "roll" required>
      <br>
      <label for ="fatherName">Father's Name</label>
      <input type = "text" name = "fatherName" required>
      <br>
      <label for ="motherName">Mother's Name</label>
      <input type = "text" name = "motherName" required>
      <br>
      <label for ="dateOfBirth">Date of Birth</label>
      <input type = "date" name = "dateOfBirth" required>
      <br>
      <input type="file" name="uploadfile" value="" required/>
      <br>
    <button type="submit" name="submit">submit</button>
  </form>
</div>
</body>
</html>