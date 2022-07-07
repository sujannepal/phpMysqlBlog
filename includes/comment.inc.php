<?php


if(isset($_POST['postComment'])){
    session_start();
    if(isset($_SESSION["userId"])){
       
        $commentDetail = trim($_POST['commentDteail']);
        $postId = $_POST['postId'];
        $userId = $_POST['userId'];
        $createDate = date('Y-m-d H:i:s');
       
    }
    else{
        header('location: ../login.php');
    }
   
}

require_once '../config/db_config.php';
require_once 'functions.inc.php';


//Call function to Post a comment
postComment($conn, $commentDetail, $postId, $userId, $createDate);