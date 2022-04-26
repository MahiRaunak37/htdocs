<?php
$servername = "localhost";
$port = 3306;
$username = "root";
$password = "";
$dbname = "demo";
$conn = mysqli_connect($servername,$username,$password,$dbname,$port);

if(!$conn)
{
	die('connection Failed'.mysqli_connect_error());
}

$data = $_POST['data'];

$sql = "INSERT INTO clientserver(PhotoStr) Values('$data')";

if(mysqli_query($conn,$sql))
{
    echo "Success";
}
else
   echo "Failed";
?>