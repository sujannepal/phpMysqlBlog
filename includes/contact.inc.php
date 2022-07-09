<?php
    require_once('../config/db_config.php');
    require_once('functions.inc.php');

    if(isset($_POST['feedbackSubmit'])){
        $fbByName = $_POST['name'];
        $fbByEmail = $_POST['email'];
        $fbMessage = $_POST['message'];
        $createdDate = date('Y-m-d H:i:s');
        submitUserFeedback($conn, $fbByName, $fbByEmail, $fbMessage, $createdDate);
        
    }
?>
