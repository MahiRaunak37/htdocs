<?php
$servername = "localhost";
$port = 3306;
$username = "root";
$password = "";
$dbname = "attendancedata";
$conn = mysqli_connect($servername,$username,$password,$dbname,$port);

if(!$conn)
{
	die('connection Failed'.mysqli_connect_error());
}

$data = $_POST['data'];
$file_path = "C:/xampp/htdocs/test.jpg";
    // create a new empty file
//    $myfile = fopen($filePath, "wb") or die("Unable to open file!");
        // add data to that file
    file_put_contents($file_path, base64_decode($data));
$sql = "INSERT INTO attenddata(PhotoStr) Values('$data')";

if(mysqli_query($conn,$sql))
{
    echo "Success (Response from Server)";
}
else
   echo "Failed";
?>