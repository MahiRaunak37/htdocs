<?php
define('UPLOAD_DIR','images/');
$id = $_POST['idOfPhotos'];
$data = $_POST['data'];
$Photos = base64_decode($data);
$file = UPLOAD_DIR.$id.'.jpg';
file_put_contents($file,$Photos);

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";
$port = 3306;

$conn = mysqli_connect($servername,$username,$password,$dbname,$port);

if(!$conn)
{
    die('connection Failed'.mysqli_connect_error());
}
else
{
    $id = $_POST['idOfPhotos'];
    $gps = $_POST['gpsLocation'];
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO photodetails(photo_id,gps_location,date) Values('$id','$gps','$date')";

    if(mysqli_query($conn,$sql))
        {
            echo "Success (Response from Server)";
        }
    else
    echo "Failed";
}



?>

<?php
    extract($_POST);
    $file = fopen("TextcamRequest.txt","a");
    fwrite($file,"\n".$id." ".$gps." ".$date);
    fclose($file);
?>