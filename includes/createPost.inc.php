<?php

if(isset($_POST['createPost'])){
    $postTitle = trim($_POST['postTitle']);
    $postDesc = trim($_POST['postDesc']);
    $imagePath = "uploads/";
    $createDate = date('Y-m-d H:i:s');

    //handle image uplaod
    //print_r($_FILES['postImage']);
    $imgName =  $_FILES['postImage']['name'];
    $imgOrgPath = $_FILES['postImage']['tmp_name'];

    //For random numbers to append as prefix in filename
    $digits = 5; 
    $randomFive = random_int( 10 ** ( $digits - 1 ), ( 10 ** $digits ) - 1);

    $imgNewPath = '../uploads/' . $randomFive."_". $imgName;
    move_uploaded_file($imgOrgPath, $imgNewPath);

    $imgPathForDB = 'uploads/' . $randomFive."_".$imgName;

}

require_once '../config/db_config.php';
require_once 'functions.inc.php';


//Call function to Create a Post
createPost($conn, $postTitle, $postDesc,$imgPathForDB, $createDate);