<?php

if(isset($_POST['login'])){
    $useremail = $_POST["user_email"];
    $userpwd = $_POST["user_pwd"];

//    echo var_dump($useremail);
  //  echo var_dump($userpwd);

    require_once '../config/db_config.php';
    require_once 'functions.inc.php';

    loginUser($conn, $useremail, $userpwd);

}



