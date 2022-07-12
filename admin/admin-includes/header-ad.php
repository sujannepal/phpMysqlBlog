<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../index.php"><i class="fas fa-globe" style="font-size: 15px; padding-bottom:-5px; color:#9b9d9e;"></i>&nbsp;Website</a>
                    <a class="nav-link" href="index.php"><i class="fas fa-newspaper" style="font-size: 15px; padding-bottom:-5px; color:#9b9d9e;"></i>&nbsp;Posts</a>
                    <a class="nav-link" href="feedback.php"><i class="fas fa-comment-dots" style="font-size: 15px; padding-bottom:-5px; color:#9b9d9e;"></i>&nbsp;Feedbacks</a>
                    <a class="nav-link" href="comment.php"><i class="fas fa-comments" style="font-size: 15px; padding-bottom:-5px; color:#9b9d9e;"></i>&nbsp;Comments</a>
                    <a class="nav-link" href="user.php"><i class="fas fa-users" style="font-size: 15px; padding-bottom:-5px; color:#9b9d9e;"></i>&nbsp;Users</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="#"><?php 
                            if(isset($_SESSION["username"])){
                                echo '<i class="fas fa-user" style="font-size: 15px; padding-bottom:-5px; color:#9b9d9e;"></i>&nbsp; '. $_SESSION["username"];
                            } 
                                
                        ?></a>
                    <a class="nav-link" href="../includes/logout.inc.php"><i class="fas fa-sign-out-alt" style="font-size: 15px; padding-bottom:-5px; color:#9b9d9e;"></i>&nbsp;Logout</a>
                </div>

            </div>
        </div>
        </div>
    </nav>