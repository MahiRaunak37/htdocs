<?php
define('UPLOAD_DIR','images/');
$id = $_POST['idOfPhotos'];
$data = $_POST['data'];
$Photos = base64_decode($data);
$file = UPLOAD_DIR.$id.'.jpg';
file_put_contents($file,$Photos);

?>