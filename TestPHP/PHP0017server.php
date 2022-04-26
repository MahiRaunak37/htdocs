<?php
//Variable declearation in mysqli_connect

use function PHPSTORM_META\type;

$HostName = "localhost";
$UserName = "root";
$Password = "";
$dbname = "testdb";
$port = 3306;
$socket ="";
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
     {
        $conn = mysqli_connect($HostName,$UserName,$Password,$dbname,$port,$socket);   
        if(!$conn)
        {
            die("Connection Failed.".mysqli_connect_error());
         }

        else {
            if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['Phone']) && isset($_POST['bgroup'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $Phone = $_POST['Phone'];
                $bgroup = $_POST['bgroup'];

                //echo "Name $name email $email Phone $Phone bgroup $bgroup";
                echo uniqid();
                // $clientIPAddress=$_SERVER['SERVER_ADDR'];

                // $clientIPAddress=$_SERVER['REMOTE_ADDR'];
                // var_dump($_SERVER['REMOTE_ADDR']);
                // echo "<br>Client Address ".$clientIPAddress."<br>";
                // $myIP = gethostbyname(trim(`hostname`));
                // echo "klklkl<hr>".$myIP."<br>";
                // echo "-----<br>";
                exec('ipconfig /all', $info);
                // echo "<hr><hr>";
                // echo "<hr>purnendu".$info."<br><hr>";
                // echo var_dump($info);
                // echo "info[82]".$info[82];
                $imp_info = $info[82];
                $tokens1 =  explode('IPv4 Address. . . . . . . . . . . : ', $imp_info);
                // print_r($tokens1);
                $tokens2 =  explode('(Preferred)', $tokens1[1]);
                // print_r($tokens2);
                $this_ip_address = $tokens2[0];
                echo "this_ip_address = $tokens2[0]";
                // foreach($tokens1 as $i){
                //     echo $i."<hr>";
                // }
  
                echo "<hr>";
                $sql ="INSERT INTO userdetails (Name,Email,Phone,Blood) VALUES ('$name','$email','$Phone','$bgroup')";
                
                if($conn)
                    echo 'Connection Successful <br>';
                else if ($sql)
                    echo 'Insertion Successful <br>';
                else 
                    echo 'Connection and Insertion Failed <br>';

                $query = mysqli_query($conn,$sql);

                if($query) {
                    echo 'Entry SuccessFul';
                }
                else {
                    echo 'Entry Failed';
                }
            }
        }
    }
    
?>