<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
?>

<?php
    //echo "inside the deleteTeacher.php";
    $uniqueId=$_GET['unique'];

    $query = "DELETE FROM add_new_inst WHERE uniqueId = '$uniqueId'";

    $data = mysqli_query($conn,$query);
    
    if($data)
    {
        echo "<script>alert('Deletion successful');</script>";
        header("location:teacherDetails.php");
    }
    else
    {
        echo "<script>alert('Deletion failed');</script>";
    }

?>