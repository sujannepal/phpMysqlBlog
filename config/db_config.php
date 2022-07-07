<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "techblog";

//Create connection with database
$conn = mysqli_connect($server_name, $user_name, $password, $database_name);

// Check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else{
   // echo "Connection successfull";
}

?>