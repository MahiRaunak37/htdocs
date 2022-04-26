
<?php  
                include 'phpqrcode/qrlib.php';
                exec("ipconfig /all", $out, $res);

               foreach (preg_grep('/^\s*IPv4 Address[^:]*:\s*([0-9a-f-]+)/i', $out) as $line) {
    
                }
                echo "<br> <br> <hr>";

                $path = 'images/';
                $file = $path.uniqid().".png";

                $scan =   var_dump($out[80]);
                echo $scan;
                
                $text = $line;
                $path = 'images/';
                $file = $path.uniqid().".png";
  
// $ecc stores error correction capability('L')
                $ecc = 'L';
                $pixel_Size = 10;
                $frame_Size = 10;
  
// Generates QR Code and Stores it in directory given
QRcode::png($text, $file, $ecc, $pixel_Size);
  
// Displaying the stored QR code from directory
echo "<center><img src='".$file."'></center>";
?>





