<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
{
    //$username=$_POST['username'];
    //$password=md5($_POST['password']);
    //$sql ="SELECT ID FROM tbladmin WHERE UserName=:username and Password=:password";

    $uniqueId = $_POST['uniqueId'];
    $password = $_POST['password'];


    /*
    $sql = "SELECT firstName, emailAddr FROM add_new_inst WHERE uniqueId=:uniqueId and password=:password";

    $query=$dbh->prepare($sql);

    $query-> bindParam(':uniqueId', $uniqueId, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);

    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
        {
            foreach ($results as $result) {
                $_SESSION['trmsaid']=$result->uniqueId;
            }
            $_SESSION['login']=$_POST['uniqueId'];
            echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
            echo "login Successful";
        } 
    else{
            echo "<script>alert('Invalid Details');</script>";
        }
    */
    if($uniqueId == "rk@123" && $password == "rk123")
    {
        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
        echo "login Successful";
    } 
    else
    {
        echo "<script>alert('Invalid Details');</script>";
    }
}
session_reset();
?>
    
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>Admin Login</title>
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>

<body class="bg-dark" style=" background-image: url('images/banner/admin_banner2.jpg'); background-repeat: no-repeat;  width: 100%; height:100%;">
    <div class="sufee-login d-flex align-content-center flex-wrap" >
        <div class="container" style=" background-image: url('images/banner/admin_banner2.jpg'); background-repeat: no-repeat;  width: 100%; height:100%;">
            <hr  color="black"/>
            <div class="login-content">
                <div class="login-logo">
                    <h2 style="color:#00f; background-color: rgba(255, 255, 128, .3);" >UPASTHIT </h2>
                    <h3 style="color:red; font-size: 50px;">Admin login </h3>
                    <hr  color="red"/>
                </div>

                <div class="login-form">
                    <form action="" method="post" name="login"> 
                        <div class="form-group">
                            <label for="uniqueId">Unique Id</label>
                            <input type="text" class="form-control" placeholder="User Name" required="true" name="uniqueId">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                        </div>

                        <!--div class="checkbox"> 
                            <label class="pull-left">
                                <a href="../index.php">Back Home!!</a>
                            </label>

                            <label class="pull-right">
                                <a href="forgot-password.php" style="padding-left: 250px;">Forgot Password?</a>
                            </label>

                        </div-->
                                
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


</body>
</html>
