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
    $gender = $_POST['gender'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $uniqueid = strtoupper(uniqid($firstName));
    
    $stdImage = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];

    $folder = "RegImagesofStudents/". $stdImage;

    

    $sql = "INSERT INTO add_new_std (uniqueId,firstName,lastName,school,class,roll,gender,fatherName,motherName,dateOfBirth,stdImage) 
    VALUES ('$uniqueid','$firstName','$lastName','$school',$class,$roll,'$gender','$fatherName','$motherName','$dateOfBirth','$stdImage')";

    // Execute query
      if(mysqli_query($conn, $sql)) {
        echo '<script>alert("Connection and Insertion are Successful");</script>';
    }
    else {
      echo '<script>alert("Connection and Insertion are failed");</script>';
    }


    // Now let's move the uploaded image into the folder: image

    /*if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }
        echo $msg;
     */   
}

//$result = mysqli_query($db, "SELECT * FROM image");

while ($data = mysqli_fetch_array($result)) {

    ?>

<img src="<?php echo $data['stdImage']; ?>">


<?php
}
?>

<!doctype html>
    <html class="no-js" lang="en">
        <head>
            <title>Add New Student</title>
            <link rel="icon" href="img/favicon.png" type="image/png">
            <link rel = "stylesheet" href="css/bootstrap.css">
	        <link rel = "stylesheet" href="css/font-awesome.min.css">
	        <link rel = "stylesheet" href="vendors/animate.css">
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="assets/css/style.css"> 
        </head>

        <body>
            <div class="bg-dark" style=" background-image: url('images/banner/add_new_student.jpg'); width: 100%; height: auto; background-repeat: no-repeat;">
            <?php include_once 'includes/header2.php';?>
                <div class="sufee-login d-flex align-content-center flex-wrap" >
                    <div class="container">
                        <div class="login-content">
                            <div class="login-logo">
                                <h1 style="color:#00f">UPASTHIT </h1>
                                <h4 style="color:black">Add New Student</h4>
                                <hr  color="red"/>
                            </div>

                            <div class="login-form">
                                <form action="" method="POST" name="login" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your first name" required="true" name="firstName">
                                    </div>

                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your last name" required="true" name="lastName">
                                    </div>

                                    <div class="form-group">
                                        <label for="school">School</label>
                                        <input type="text" class="form-control" placeholder="School" required="true" name="school">
                                    </div>

                                    <div class="form-group">
                                        <label for="class">Class</label>
                                        <input type="number" class="form-control" placeholder="Class" required="true" name="class">
                                    </div>

                                    <div class="form-group">
                                        <label for="roll">Roll no</label>
                                        <input type="number" class="form-control" placeholder="Roll no." required="true" name="roll">
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <input type="radio"  id="male" required="true" name="gender" value="male">
                                        <label for= "male">Male </label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <input type="radio"  id="female" required="true" name="gender" value="female">
                                        <label for= "female">Female </label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <input type="radio" id="others" required="true" name="gender" value="others">
                                        <label for= "others">Others </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="fatherName">Father's Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your Father's name" required="true" name="fatherName">
                                    </div>

                                    <div class="form-group">
                                        <label for="motherName">Mother's Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your Mother's name" required="true" name="motherName">
                                    </div>

                                    <div class="form-group">
                                        <label for="dateOfBirth">Date of Birth</label>
                                        <input type="date" class="form-control" placeholder="Enter your first name" required="true" name="dateOfBirth">
                                    </div>

                                    <div class="form-group">
                                        <input type = "file" class = "form-control" name = "uploadfile" value= "" required>
                                    </div>

                                <div class="checkbox"> 
                                    <label class="pull-left">
                                        <a href="../index.php">Back Home!!</a>
                                    </label>

                                    <label class="pull-right">
                                        <a href="forgot-password.php" style="padding-left: 250px;">Forgot Password?</a>
                                    </label>

                                </div>   
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit">submit</button>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>

            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="js/popper.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/stellar.js"></script>
            <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
            <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
            <script src="js/owl-carousel-thumb.min.js"></script>
            <script src="js/jquery.ajaxchimp.min.js"></script>
            <script src="vendors/counter-up/jquery.counterup.js"></script>
            <script src="js/mail-script.js"></script>
            <!--gmaps Js--> 
            <script src="js/gmaps.min.js"></script>
            <script src="js/theme.js"></script>
        </body>

    </html>
