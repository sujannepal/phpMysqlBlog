<?php

if(isset($_POST['updatePost'])){
    $postId = $_POST['postId'];
    $postTitle = trim($_POST['postTitle']);
    $postDesc = trim($_POST['postDesc']);
    $imagePath = "uploads/";
    $createDate = date('Y-m-d H:i:s');

    //handle image uplaod
   // print_r($_FILES['postImage']);
   if(!empty($_FILES['postImage']['name'])){
    $imgName =  $_FILES['postImage']['name'];
    $imgOrgPath = $_FILES['postImage']['tmp_name'];
    $imgNewPath = '../uploads/' . $imgName;
    move_uploaded_file($imgOrgPath, $imgNewPath);

    $imgPathForDB = 'uploads/' . $imgName;
   }
   else{
    $imgPathForDB = trim($_POST['imagePath']);
   }
    


}

require_once '../config/db_config.php';
require_once 'functions.inc.php';


//Function to update a Post
updatePost($conn, $postId, $postTitle, $postDesc,$imgPathForDB);