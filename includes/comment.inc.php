<?php
    require_once '../config/db_config.php';
    require_once 'functions.inc.php';

    session_start();
    if(isset($_POST['postComment'])){
        if(isset($_SESSION["userId"])){
            $commentDetail = trim($_POST['commentDetail']);
            $postId = $_POST['postId'];
            $userId = $_SESSION['userId'];

            $createDate = date('Y-m-d H:i:s');

            if(!empty($commentDetail)){
                postComment($conn, $commentDetail, $postId, $userId, $createDate);
            }
            else{
                echo '<script>
                alert("Please write something on comment !");
                window.location = "../login.php";
            </script>';
            exit();
            }
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
