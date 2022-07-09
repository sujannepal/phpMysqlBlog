<?php
  require_once '../config/db_config.php';
  require_once 'functions.inc.php';
  if(isset($_POST['login'])){
      $useremail = $_POST["user_email"];
      $userpwd = $_POST["user_pwd"];
      
      loginUser($conn, $useremail, $userpwd);

  }

?>



