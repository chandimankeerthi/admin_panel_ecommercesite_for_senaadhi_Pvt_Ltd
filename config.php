<?php
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "senaadhi";

$conn = mysqli_connect("$servername","$username","$password","$dbname");

if($conn->connect_error){
    die("connection failed: ". $conn->connect_error);
}

?>