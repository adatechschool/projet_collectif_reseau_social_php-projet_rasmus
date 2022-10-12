<?php
$servername="localhost";
$username="root";
$password="root";
$database="social_network";
$connn=mysqli_connect($servername,$username,$password,$database);
if (!$connn){
    echo "Connection established";
}

?>