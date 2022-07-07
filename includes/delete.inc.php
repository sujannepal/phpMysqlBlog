<?php


if(isset($_GET['id'])){
    $postId = $_GET['id'];

    //echo $postId;
    require_once '../config/db_config.php';
    require_once 'functions.inc.php';

    //Function to delete the post
    deletePost($conn, $postId);
}




