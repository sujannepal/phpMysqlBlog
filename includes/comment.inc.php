<?php
    require_once '../config/db_config.php';
    require_once 'functions.inc.php';
    if(isset($_POST['postComment'])){
        if(isset($_SESSION["userId"])){
            $commentDetail = trim($_POST['commentDetail']);
            $postId = $_POST['postId'];
            $userId = $_SESSION['userId'];
            postComment($conn, $commentDetail, $postId, $userId);
        }
        else{
            echo '<script>
                alert("You must have to login to comment on any post");
                window.location = "../login.php";
            </script>';
            exit();
        }
    }

?>
