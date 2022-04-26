
<?php 
 //DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','upasthittest');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
//echo "Connection from database is Successful";
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>


<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "upasthittest";
    $port = 3306;

    $conn = mysqli_connect($servername,$username,$password,$dbname,$port);
    
    /*if($conn) {
         echo "connection Sucessfully";
     }
     else {
         echo "connection failed".mysqli_connect_error();
     }*/
?>