<?php

if(isset($_POST['contactSubmit'])){
    $fbByName = $_POST['fb_by_name'];
    $fbByEmail = $_POST['fb_by_email'];
    $fbMessage = $_POST['fb_msg'];

    $createdDate = date('Y-m-d H:i:s');
}

include '../config/db_config.php';
include 'functions.inc.php';

submitUserFeedback($conn, $fbByName, $fbByEmail, $fbMessage, $createdDate);


