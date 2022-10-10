<?php
$servername="localhost";
$username="root";
$password="root";
$database="social_network";
$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn){
    echo "Connection established";
}

?>