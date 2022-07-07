<?php


if(isset($_POST['postComment'])){
    $commentDetail = trim($_POST['commentDteail']);
    $postId = $_POST['postId'];
    $userId = $_POST['userId'];

   // $imagePath = "uploads/";
    $createDate = date('Y-m-d H:i:s');

   
}

require_once '../config/db_config.php';
require_once 'functions.inc.php';


//Call function to Post a comment
postComment($conn, $commentDetail, $postId, $userId, $createDate);